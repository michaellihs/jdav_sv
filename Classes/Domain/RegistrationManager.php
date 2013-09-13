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
 * Registration manager handles event registrations
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_RegistrationManager implements t3lib_Singleton {
	
	/**
	 * Holds a singleton instance of this class
	 *
	 * @var Tx_JdavSv_Domain_RegistrationManager
	 */
	protected static $instance = null;
	
	

	/**
	 * Holds instance of event repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_EventRepository
	 */
	protected $eventRepository;
	
	
	
	/**
	 * Holds instance of registration repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_RegistrationRepository
	 */
	protected $registrationRepository;



	/**
	 * Holds instance of persistence manager
	 *
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;



	/**
	 * Holds instance of configuration manager
	 * @var Tx_Extbase_Configuration_ConfigurationManager
	 */
	protected $configurationManager;



	/**
	 * Holds TS settings for this extension
	 *
	 * @var array
	 */
	protected $settings;
	
	
	
	/**
	 * Injects instance of event repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_EventRepository $eventRepository
	 */
	public function injectEventRepository(Tx_JdavSv_Domain_Repository_EventRepository $eventRepository) {
		$this->eventRepository = $eventRepository;
	}
	
	
	
	/**
	 * Injects instance of registration repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository
	 */
	public function injectRegistrationRepository(Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository) {
		$this->registrationRepository = $registrationRepository;
	}



	/**
	 * Injects persistence manager
	 *
	 * @param Tx_Extbase_Persistence_Manager $persistenceManager
	 */
	public function injectPersistenceManager(Tx_Extbase_Persistence_Manager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}



	/**
	 * Injects configuration manager
	 *
	 * @param Tx_Extbase_Configuration_ConfigurationManager $configurationManager
	 */
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManager $configurationManager) {
		$this->configurationManager = $configurationManager;
	}



	/**
	 * Initializes object
	 */
	public function initializeObject() {
		$this->settings = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
	}
	
	
	
	/**
	 * Returns true, if given user is already registerd for given event
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function isUserRegisteredForEvent(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event) {
		if (count($this->registrationRepository->getRegistrationsByEventAndFeUser($event, $feUser))) {
			return true;
		} else {
			return false;
		}
	}
	
	
	
	/**
	 * Registers given user for given event and returns registration.
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @param boolean $isReservation If set to true, registration is set to be reservation
	 * @return Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function registerUserForEvent(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event, $isReservation = TRUE) {
		$registration = new Tx_JdavSv_Domain_Model_Registration();
		$registration->setEvent($event);
		$registration->setAttendee($feUser);
		$date = new DateTime(); // empty argument takes now() as date

		// TODO only works with PHP >= 5.3.0
		# $date->setTimestamp(time());

		$registration->setDate($date);


		// TODO only works with PHP >= 5.3.0
		# $registration->setReservedUntil($date->add(new DateInterval('P10D')));
		$reservationDate = new DateTime();
		$reservationDate->modify('+14 day'); // we add 14 days to now()
		$registration->setReservedUntil($reservationDate);

		$registration->setIsReservation($isReservation);
		$this->registrationRepository->add($registration);
		return $registration;
	}



	/**
	 * Creates registration for given user and given event respecting given choices and setting waitinglist attribute respectively
	 *
	 * If a user tries to register for an event although he had registrations before,
	 * he needs to select one event on which he does NOT want to be registered on the
	 * waiting list. This event is given in $firstChoiceEvent. All other registrations are set to waiting list.
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @param int $firstChoiceEvent
	 * @return Tx_JdavSv_Domain_Model_Registration
	 */
	public function registerUserForEventRespectingFirstChoice(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event, $firstChoiceEvent) {
		$registrationsForUser = $this->getCountingRegistrationsByUser($feUser, $event);
		$newRegistration = $this->registerUserForEvent($feUser, $event);
		$registrationsForUser[] = $newRegistration;

		foreach ($registrationsForUser as $registration) { /* @var $registration Tx_JdavSv_Domain_Model_Registration */
			if (intval($registration->getEvent()->getUid()) === intval($firstChoiceEvent)) {
				$registration->setWaitingList(FALSE);
			} else {
				$registration->setWaitingList(TRUE);
			}
			if ($registration->getUid()) {
				$this->registrationRepository->update($registration);
			}
		}

		$this->persistenceManager->persistAll();

		$this->sendReservationConfirmationMailToAttendee($newRegistration);
		$this->sendReservationConfirmationMailToAdmin($newRegistration);


		return $newRegistration;
	}
	
	
	
	/**
	 * Removes a registration from an event.
	 * 
	 * TODO there should be a field 'cancelled' on Registration object, which we should use, if a user cancels his registration.
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function unregisterUserForEvent(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event) {
		$query = $this->registrationRepository->createQuery();
		$query->matching(
		    $query->logicalAnd(
		        $query->equals('attendee', $feUser),
		        $query->equals('event', $event)
		    )
		);
		$registrations = $query->execute();
		if ($registrations->count() == 1) {
		    $this->registrationRepository->remove($registrations->getFirst());
			$this->sendUnregisterConfirmationToAttendee($registrations->getFirst());
			$this->sendUnregisterConfirmationToAdmin($registrations->getFirst());
		    t3lib_div::makeInstance('Tx_Extbase_Persistence_Manager')->persistAll();
		} elseif ($registrations->count() > 1) {
			throw new Exception('We have more than one registration of a single user for an event. This should never happen!');
		}

	}



	/**
	 * Returns all registrations for a given user
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $user
	 * @return array<Tx_JdavSv_Domain_Model_Registration>
	 */
	public function getRegistrationsByUser(Tx_JdavSv_Domain_Model_FeUser $user) {
		// TODO respect current year / event-cycle
		return $this->registrationRepository->findByAttendee($user)->toArray();
	}



	/**
	 * Returns only registrations of events that are set to be counting in max number of registrations per User.
	 *
	 * To respect only registrations from different event years, the event for which a user wants to register
	 * can be given as a second parameter. If it is not given,
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $user
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return array
	 */
	public function
	getCountingRegistrationsByUser(Tx_JdavSv_Domain_Model_FeUser $user, Tx_JdavSv_Domain_Model_Event $event) {
		$eventYearForOtherEvent = NULL;
		if ($event !== NULL) {
			$eventYearForOtherEvent = $event->getEventYear();
		}

		$allRegistrations = $this->getRegistrationsByUser($user);
		$countingRegistrations = array();
		foreach($allRegistrations as $registration) { /* @var $regisration Tx_JdavSv_Domain_Model_Registration */
			if ($registration->getEvent()->getCountsInMaxRegistrations()) {
				if ($eventYearForOtherEvent != NULL
						&& $registration->getEvent()->getEventYear() !== NULL
						&& $eventYearForOtherEvent->getName() == $registration->getEvent()->getEventYear()->getName()) {
					$countingRegistrations[] = $registration;
				}
			}
		}

		return $countingRegistrations;
	}



	/**
	 * Sends reservation confirmation email to attendee
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	protected function sendReservationConfirmationMailToAttendee(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->sendMail(
				array($registration->getAttendee()->getEmail() => $registration->getAttendee()->getEmailName()),
				null,
				'Reservierungsbestätigung für "' . $registration->getEvent()->getFullName() . '"',
				'confirmReservationAttendee',
				array('registration' => $registration)
		);
	}



	/**
	 * Sends reservation confirmation email to administrator
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	protected function sendReservationConfirmationMailToAdmin(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->sendMail(
			$this->getAdminEmailArray(),
			null,
			'Neue Reservierung für "' . $registration->getEvent()->getFullName() . '"',
			'confirmReservationAdmin',
			array('registration' => $registration)
		);
	}



	/**
	 * Sends confirmation of unregistering to attendee
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	protected function sendUnregisterConfirmationToAttendee(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->sendMail(
			array($registration->getAttendee()->getEmail() => $registration->getAttendee()->getEmailName()),
			null,
			'Bestätitung der Stornierung von "' . $registration->getEvent()->getFullName() . '"',
			'confirmUnregisterAttendee',
			array('registration' => $registration)
		);
	}




	/**
	 * Sends confirmation of unregistering to admin
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	protected function sendUnregisterConfirmationToAdmin(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->sendMail(
			$this->getAdminEmailArray(),
			null,
			'Neue Stornierung: "' . $registration->getEvent()->getFullName() . '"',
			'confirmUnregisterAdmin',
			array('registration' => $registration)
		);
	}




	/**
	 * Sends email with given parameters
	 *
	 * @param array $to array('email' => 'name')
	 * @param array $from array('email => 'name')
	 * @param string $subject
	 * @param string $template Template as defined in settings!
	 * @param array $templateAssignments
	 */
	protected function sendMail($to, $from=NULL, $subject, $template, array $templateAssignments = array()) {
		$mailer = Tx_JdavSv_Utility_FluidMailer::getInstance();
		$mailer->setTemplateByTsDefinedTemplate($template)
			->setTo($to)
			->setSubject($subject);

		if ($from) {
			$mailer->setFrom($from);
		}

		foreach ($templateAssignments as $key => $value) {
			$mailer->assignToView($key, $value);
		}

		// assign settings to view (TS)
		$mailer->assignToView('settings', $this->settings);

		try {
			$mailer->send();
		} catch (Exception $e) {
			// We prevent exception if mail cannot be send
		}
	}



	/**
	 * Returns email adress of admin as set in settings
	 *
	 * @return array
	 */
	protected function getAdminEmailArray() {
		return array($this->settings['email']['adminTo']['email'] => $this->settings['email']['adminTo']['name']);
	}
	
}
?>