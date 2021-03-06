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
 * Controller for administration of Registrations
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */

class Tx_JdavSv_Controller_RegistrationAdminController extends Tx_JdavSv_Controller_AbstractAdminController {
	
	/**
	 * registrationRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_RegistrationRepository
	 */
	protected $registrationRepository;
	
	
	
	/**
	 * Holds an instance of registration manager
	 *
	 * @var Tx_JdavSv_Domain_RegistrationManager
	 */
	protected $registrationManager;



	/**
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;

	

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
	 * Displays all Registrations
	 *
	 * @param boolean $resetFilters If set to TRUE, filters will be reset
	 * @param boolean $resetPager If set to TRUE, pagers will be reset
	 * @return string The rendered list view
	 */
	public function listAction($resetFilters = FALSE, $resetPager = FALSE) {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['registrationsAdmin'], 'registrationsAdmin'
		);

		if ($resetPager) {
			$extlistContext->resetPagerCollection();
		}

		if ($resetFilters) {
			$extlistContext->resetFilterboxCollection();
		}

		$this->view->assign('listData', $extlistContext->getListData());
		$this->view->assign('listHeader', $extlistContext->getList()->getListHeader());
		$this->view->assign('listCaptions', $extlistContext->getRendererChain()->renderCaptions($extlistContext->getList()->getListHeader()));
		$this->view->assign('pager', $extlistContext->getPager());
		$this->view->assign('pagerCollection', $extlistContext->getPagerCollection());
		$this->view->assign('eventFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('registrationAdminFilters')->getFilterByFilterIdentifier('eventFilter'));
		$this->view->assign('dateFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('registrationAdminFilters')->getFilterByFilterIdentifier('dateFilter'));
		$this->view->assign('userFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('registrationAdminFilters')->getFilterByFilterIdentifier('userFilter'));
		$this->view->assign('stateFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('registrationAdminFilters')->getFilterByFilterIdentifier('stateFilter'));
	}
	
	
		
	/**
	 * Displays a single Registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to display
	 * @return string The rendered view
	 */
	public function showAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->view->assign('registration', $registration);
	}
	
	
		
	/**
	 * Creates a new Registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $newRegistration a fresh Registration object which has not yet been added to the repository
     * @param Tx_JdavSv_Domain_Model_Event $event event for which registration should be made
	 * @return string An HTML form for creating a new Registration
	 * @dontvalidate $newRegistration
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Registration $newRegistration = NULL, Tx_JdavSv_Domain_Model_Event $event = NULL) {
		$this->view->assign('event', $event);
		$this->view->assign('newRegistration', $newRegistration);
		$this->view->assign('events', $this->objectManager->get('Tx_JdavSv_Domain_Repository_EventRepository')->findAll());
		$this->view->assign('feUsers', $this->feUserRepository->getAllFeUsers());
	}
	
	
		
	/**
	 * Creates a new Registration and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $newRegistration a fresh Registration object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Registration $newRegistration) {
		$this->registrationRepository->add($newRegistration);
		$this->persistenceManager->persistAll();
		$this->flashMessageContainer->add('Die Anmeldung wurde erfolgreich angelegt.');
		
		$this->redirect('edit', NULL, NULL, array('registration' => $newRegistration));
	}
	
		
	
	/**
	 * Updates an existing Registration and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to display
	 * @return string A form to edit a Registration 
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->view->assign('registration', $registration);
		$this->view->assign('feUsers', $this->feUserRepository->getAllFeUsers());
		$this->view->assign('events', $this->objectManager->get('Tx_JdavSv_Domain_Repository_EventRepository')->findAll());
	}
	
		

	/**
	 * Updates an existing Registration and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to display
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		// Save prerequisite fulfillments
		if ($this->request->hasArgument('prerequisite')) {
			$prerequisites = $this->request->getArgument('prerequisite');
		} else {
			$prerequisites = array();
		}
		$registration->setCategoryPrerequisiteFulfillmentsByArgumentsArray($prerequisites);
		$this->registrationRepository->update($registration);

		$this->flashMessageContainer->add('Die Anmeldung wurde gespeichert.');
		$this->redirect('list', NULL, NULL, array('registration' => $registration));
	}
	

	
	/**
	 * Deletes an existing Registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->registrationRepository->remove($registration);
		$this->flashMessageContainer->add('Die Anmeldung wurde gelöscht!');
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
		$this->forward('list', 'Event');
	}
	
	
	
	/**
	 * Confirms a registration for logged in user at given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string Rendered HTML source
	 */
	public function confirmRegistrationAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->checkForLoggedInFesUserAndRedirect();
        $this->checkForRegistrationAndRedirectIfAlreadyRegistered($event);
        $this->registrationManager->registerUserForEvent($this->feUser, $event);
        $this->view->assign('feUser', $this->feUser);
        $this->view->assign('event', $event);
	}



	/**
	 * Moves registration from waiting list to registrations
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function moveToRegistrationsAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$registration->setWaitingList(false);
		$this->registrationRepository->update($registration);
		$this->persistenceManager->persistAll();
		$this->forward('show', 'EventAdmin', null, array('event' => $registration->getEvent()));
	}



	/**
	 * Moves registration from waiting list to registrations
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function moveToWaitinglistAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$registration->setWaitingList(true);
		$this->registrationRepository->update($registration);
		$this->persistenceManager->persistAll();
		$this->forward('show', 'EventAdmin', null, array('event' => $registration->getEvent()));
	}



	/**
	 * Sends confirmation email to attendee
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 * @param string Controller and action to forward to after
	 * @param Tx_JdavSv_Domain_Model_Event $event Event to show after forwarding
	 */
	public function sendConfirmationAction(Tx_JdavSv_Domain_Model_Registration $registration, $from = '', $event = NULL) {
		$mailer = Tx_JdavSv_Utility_FluidMailer::getInstance();
		$mailer->setTo(array($registration->getAttendee()->getEmail() => $registration->getAttendee()->getEmailName()))
			->setSubject('Anmeldebestätigung für Veranstaltung ' . $registration->getEvent()->getFullName())
			->setTemplateByTsDefinedTemplate('confirmation')
			->assignToView('registration', $registration)
			->send();
		$this->flashMessageContainer->add('Bestätigungsemail wurde versendet!');
		$registration->setRegistrationConfirmationSent(TRUE);
		$this->registrationRepository->update($registration);
		$this->persistenceManager->persistAll();
		if ($from == '') {
			$this->forward('list');
		} else {
			list($controller, $action) = explode('::', $from);
			$this->forward($action, $controller, null, array('event' => $event));
		}
	}



	/**
	 * Sort action for registrations
	 */
	public function sortAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['registrationsAdmin'], 'registrationsAdmin'
		);
		$extlistContext->getDataBackend()->getSorter()->reset();
		$this->forward('list');
	}
	
	
	
	/**
	 * Checks, whether there is a logged in user and redirects if not.
	 *
	 */
	protected function checkForLoggedInFesUserAndRedirect() {
	    if (is_null($this->feUser)) {
            $this->flashMessageContainer->add('Für die An- oder Abmeldung zu einer Schulung muss man eingeloggt sein!');
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
            $this->flashMessageContainer->add('Anmeldung zur Schulung ist bereits erfolgt!');
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
			$this->flashMessageContainer->add('Du kannst dich nicht von einer Schulung abmelden, zu der du nicht angemeldet warst!');
			$this->forward('list', 'Event');
		}
	}
	
}
