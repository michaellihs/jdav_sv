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
 * Controller for the Registration object
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */

class Tx_JdavSv_Controller_RegistrationController extends Tx_JdavSv_Controller_AbstractController {
	
	/**
	 * registrationRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_RegistrationRepository
	 */
	protected $registrationRepository;



	/**
	 * Holds sektion repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_SektionRepository
	 */
	protected $sektionRepository;
	
	
	
	/**
	 * Holds an instance of registration manager
	 *
	 * @var Tx_JdavSv_Domain_RegistrationManager
	 */
	protected $registrationManager;
	
	

	/**
	 * Injects registration manager
	 *
	 * @param Tx_JdavSv_Domain_RegistrationManager $registrationManager
	 */
	public function injectRegistrationManager(Tx_JdavSv_Domain_RegistrationManager $registrationManager) {
		$this->registrationManager = $registrationManager;
	}



	/**
	 * Injects registration repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository
	 */
	public function injectRegistrationRepository(Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository) {
		$this->registrationRepository = $registrationRepository;
	}



	/**
	 * Injects sektion repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_SektionRepository $sektionRepository
	 */
	public function injectSektionRepository(Tx_JdavSv_Domain_Repository_SektionRepository $sektionRepository) {
		$this->sektionRepository = $sektionRepository;
	}

	
		
	/**
	 * Creates a new Registration and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $newRegistration a fresh Registration object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Registration $newRegistration) {
		$this->registrationRepository->add($newRegistration);
		$this->flashMessageContainer->add('Your new Registration was created.');

		$this->redirect('list');
	}
	

	
	/**
	 * Deletes an existing Registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->registrationRepository->remove($registration);
		$this->flashMessageContainer->add('Your Registration was removed.');
		$this->redirect('list');
	}
	
	
	
	/**
	 * Registers logged in user to given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string Rendered HTML source
	 */
	public function registerAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->checkForLoggedInFesUserAndRedirect();
		$this->checkForRegistrationAndRedirectIfAlreadyRegistered($event);

		$otherRegistrations = $this->registrationManager->getCountingRegistrationsByUser($this->feUser);

		// Check whether user has dav_nr set
		if ($this->feUser->hasNoDavNrSet()) {
			$this->view->assign('missingDavNr', 1);
		}

		// Check whether user has julei_nr set
		if ($this->feUser->hasNoJuleiNrSet()) {
			$this->view->assign('missingJuleiNr', 1);
		}

		// Check whether user has sektion set
		if ($this->feUser->hasNoSektionSet()) {
			$this->view->assign('sektionen', $this->sektionRepository->findAll());
			$this->view->assign('missingSektion', 1);
		}

		$this->view->assign('otherRegistrations', $otherRegistrations);
		$this->view->assign('feUser', $this->feUser);
		$this->view->assign('event', $event);
	}
	
	
	
	/**
	 * Unregisters logged in user from given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string Rendered HTML source
	 */
	public function unregisterAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->checkForLoggedInFesUserAndRedirect();
		$this->checkForRegistrationAndRedirectIfNotAlreadyRegistered($event);
		$this->registrationManager->unregisterUserForEvent($this->feUser, $event);
		$this->flashMessageContainer->add('Deine Anmeldung wurde storniert!');
		$this->redirect('list', 'Event');
	}
	
	
	
	/**
	 * Confirms a registration for logged in user at given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @param int $firstChoiceEvent
	 * @param string $davNr
	 * @param string $juleiNr
	 * @param boolean $vegetarian
	 * @param int $sektion
	 * @return string Rendered HTML source
	 */
	public function confirmRegistrationAction(Tx_JdavSv_Domain_Model_Event $event, $firstChoiceEvent = NULL,
											  $davNr = NULL, $juleiNr = NULL, $vegetarian = NULL, $sektion = NULL) {

		$this->checkForLoggedInFesUserAndRedirect();
        $this->checkForRegistrationAndRedirectIfAlreadyRegistered($event);

        $newRegistration = $this->registrationManager->registerUserForEventRespectingFirstChoice($this->feUser, $event, $firstChoiceEvent);

		if ($sektion) {
			$this->feUser->setSektion($this->sektionRepository->findByUid($sektion));
		}

		if ($vegetarian) {
			$newRegistration->setVegetarian(TRUE);
			$this->registrationRepository->update($newRegistration);
		}

		if ($davNr) {
			$this->feUser->setDavNr($davNr);
		}

		if ($juleiNr) {
			$this->feUser->setJuleiNr($juleiNr);
		}

		$this->feUserRepository->update($this->feUser);

        $this->view->assign('feUser', $this->feUser);
        $this->view->assign('event', $event);
	}
	
	
	
	/**
	 * Checks, whether there is a logged in user and redirects if not.
	 *
	 */
	protected function checkForLoggedInFesUserAndRedirect() {
	    if (is_null($this->feUser)) {
            $this->flashMessageContainer->add('Für die An- oder Abmeldung zu einer Schulung muss man eingeloggt sein!', '', t3lib_FlashMessage::ERROR);
            $this->redirect('list', 'Event');
        }
	}
	
	
	
	/**
	 * Checks, whether logged in user is already registered for given event.
	 * Redirects, if user is already registered.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	protected function checkForRegistrationAndRedirectIfAlreadyRegistered(Tx_JdavSv_Domain_Model_Event $event) {
	    if ($this->registrationManager->isUserRegisteredForEvent($this->feUser, $event)) {
            $this->flashMessageContainer->add('Anmeldung zur Schulung ist bereits erfolgt!', '', t3lib_FlashMessage::ERROR);
            $this->forward('list', 'Event');
        }
	}
	
	
	
	/**
	 * Checks whether currently logged in user is NOT registered for a given event.
	 * Redirects, if user is not yet registered.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	protected function checkForRegistrationAndRedirectIfNotAlreadyRegistered(Tx_JdavSv_Domain_Model_Event $event) {
		if (!$this->registrationManager->isUserRegisteredForEvent($this->feUser, $event)) {
			$this->flashMessageContainer->add('Du kannst dich nicht von einer Schulung abmelden, zu der du nicht angemeldet warst!', '', t3lib_FlashMessage::ERROR);
			$this->forward('list', 'Event');
		}
	}
	
}