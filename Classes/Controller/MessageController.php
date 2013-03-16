<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Michael Knoll <mimi@kaktusteam.de>, MKLV GbR
*  	
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 3 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Controller for the Event object
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_MessageController extends Tx_JdavSv_Controller_AbstractController {
	
	/**
	 * eventRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_EventRepository
	 */
	protected $eventRepository;
	
	
	
	/**
     * registrationRepository
     * 
     * @var Tx_JdavSv_Domain_Repository_RegistrationRepository
     */
	protected $registrationRepository;



	/**
	 * @var Tx_JdavSv_Utility_FluidMailer
	 */
	protected $fluidMailer;
	
	

	/**
	 * @param Tx_JdavSv_Domain_Repository_EventRepository $eventRepository
	 */
	public function injectEventRepository(Tx_JdavSv_Domain_Repository_EventRepository $eventRepository) {
		$this->eventRepository = $eventRepository;
	}



	/**
	 * @param Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository
	 */
	public function injectRegistrationRepository(Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository) {
		$this->registrationRepository = $registrationRepository;
	}



	/**
	 * @param Tx_JdavSv_Utility_FluidMailer $fluidMailer
	 */
	public function injectFluidMailer(Tx_JdavSv_Utility_FluidMailer $fluidMailer) {
		$this->fluidMailer = $fluidMailer;
	}



	/**
	 * Shows a form to send a message to all participants of an event (in admin mode)
	 */
	public function showParticipantsMessageAdminFormAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->view->assign('event', $event);
	}



	/**
	 * Sends a given message to all participants of a given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event The event to which participants we want to send a message
	 * @param $message The message that should be sent to the participants
	 * @param string $subject The subject of the message
	 * @param string $additionalRecipients A comma-separated list of additional recipients
	 * @param bool $includeWaitingList
	 * @param bool $includeTeamers
	 * @param string $fromEmail
	 * @param string $fromName
	 * @param bool $bcc
	 * @dontvalidate
	 */
	public function sendMessageToParticipantsAction(
			Tx_JdavSv_Domain_Model_Event $event,
			$message,
			$subject='',
			$additionalRecipients='',
			$includeWaitingList=FALSE,
			$includeTeamers=TRUE,
			$fromEmail='',
			$fromName='',
			$bcc=TRUE) {

		$fromEmail = $fromEmail !== '' ? $fromEmail : $this->settings['email']['defaultFrom']['email'];
		$fromName = $fromName !== '' ? $fromName : $this->settings['email']['defaultName']['name'];
		$recipients = $this->createRecipientsList($event, $additionalRecipients, $includeTeamers, $includeWaitingList);

		$this->fluidMailer->setFrom(array($fromEmail => $fromName));
		$this->fluidMailer->setSubject('[' . $event->getCategory()->getShortcut() . ' ' . $event->getAccreditationNumber() . '] ' . $subject);
		if ($bcc) {
			$this->fluidMailer->setBcc($recipients);
		} else {
			$this->fluidMailer->setTo($recipients);
		}
		$this->fluidMailer->assignToView('message', $message);
		$this->fluidMailer->setTemplateByTsDefinedTemplate('participantsMessage');
		$this->fluidMailer->send();

		$this->flashMessageContainer->add('Nachricht wurde an Teilnehmer verschickt!');
		$this->forward('showParticipantsMessageAdminForm');
	}



	/**
	 * Creates a list of email addresses for given parameters.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @param $additionalRecipients
	 * @param $includeTeamers
	 * @param $includeWaitingList
	 * @return array An array of E-Mail Addresses
	 */
	protected function createRecipientsList(Tx_JdavSv_Domain_Model_Event $event, $additionalRecipients, $includeTeamers, $includeWaitingList) {
		$recipients = array();

		// Add participants
		if ($includeWaitingList) {
			$registrations = $event->getRegistrations();
		} else {
			$registrations = $event->getNonWaitingListRegistrations();
		}
		foreach ($registrations as $registration) { /* @var Tx_JdavSv_Domain_Model_Registration $registration */
			if ($registration->getAttendee()->getEmail()) {
				$recipients[$registration->getAttendee()->getEmail()] = $registration->getAttendee()->getFullName();
			}
		}

		// Add teamers
		if ($includeTeamers) {
			if ($event->getFirstTeamer()) {
				$recipients[$event->getFirstTeamer()->getEmail()] = $event->getFirstTeamer()->getFullName();
			}
			if ($event->getSecondTeamer()) {
				$recipients[$event->getSecondTeamer()->getEmail()] = $event->getSecondTeamer()->getFullName();
			}
			if ($event->getKitchenGroup()) {
				$recipients[$event->getKitchenGroup()->getEmail()] = $event->getKitchenGroup()->getFullName();
			}
		}

		// Add additional recipients
		if ($additionalRecipients !== '') {
			foreach(explode(',', $additionalRecipients) as $additionalRecipient) {
				$recipients[$additionalRecipient] = $additionalRecipient;
			}
		}

		return $recipients;
	}

}