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
 * Controller for administration of Events
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_EventAdminController extends Tx_JdavSv_Controller_AbstractController {
	
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
	 * categoryRepository
	 *
	 * @var Tx_JdavSv_Domain_Repository_CategoryRepository
	 */
	protected $categoryRepository;



	/**
	 * accomodationRepository
	 *
	 * @var Tx_JdavSv_Domain_Repository_AccommodationRepository
	 */
	protected $accommodationRepository;
	
	

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		parent::initializeAction();
		$this->eventRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_EventRepository');
		$this->registrationRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_RegistrationRepository');
		$this->categoryRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_CategoryRepository');
		$this->accommodationRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_AccommodationRepository');
	}
	
	
		
	/**
	 * Displays all Events
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
		$extlistContextForEventAdminList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
		    $this->settings['listConfig']['publicEvents'], 'publicEvents');

        $extlistContextForRegistrationsTeamerList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
            $this->settings['listConfig']['registrationsTeamer'],
            'registrationsTeamer'
        );
        $registrationsByEventFilterForTeamerList = $extlistContextForRegistrationsTeamerList->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('filterbox1')->getFilterByFilterIdentifier('registrationsByEventFilter');

        $extlistContextForRegistrationsParticipantsList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
            $this->settings['listConfig']['registrationsParticipants'],
            'registrationsParticipants'
        );
        $registrationsByEventFilterForParticipantsList = $extlistContextForRegistrationsParticipantsList->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('filterbox1')->getFilterByFilterIdentifier('registrationsByEventFilter');
		    
		$this->view->assign('listData', $extlistContextForEventAdminList->getListData());
        $this->view->assign('listCaptions', $extlistContextForEventAdminList->getRendererChain()->renderCaptions($extlistContextForEventAdminList->getList()->getListHeader()));
        $this->view->assign('listHeader', $extlistContextForEventAdminList->getList()->getListHeader());
        $this->view->assign('registrationsByEventFilterForTeamerList', $registrationsByEventFilterForTeamerList);
        $this->view->assign('registrationsByEventFilterForParticipantsList', $registrationsByEventFilterForParticipantsList);
	}


		
	/**
	 * Displays a single Event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to display
	 * @return string The rendered view
	 */
	public function showAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->view->assign('event', $event);
	}
	
	
	
	/**
	 * Displays a registrations list for teamers
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string The rendered view
	 */
	public function teamerRegistrationsListAction(Tx_JdavSv_Domain_Model_Event $event) {
		$registrations = $this->registrationRepository->getAcceptedRegistrationsByEvent($event);
		$waitingListRegistrations = $this->registrationRepository->getWaitingListRegistrationsByEvent($event);
		
		$this->view->assign('registrations', $registrations);
		$this->view->assign('waitingListRegistrations', $waitingListRegistrations);
	}
	
	
	
	/**
	 * Displays a registrations list for attendees
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string The rendered view
	 */
	public function attendeeRegistrationsListAction(Tx_JdavSv_Domain_Model_Event $event) {
		$registrations = $this->registrationRepository->getAcceptedRegistrationsByEvent($event);
		$this->view->assign('registrations', $registrations);
	}
	
	
		
	/**
	 * Creates a new Event and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $newEvent a fresh Event object which has not yet been added to the repository
	 * @return string An HTML form for creating a new Event
	 * @dontvalidate $newEvent
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Event $newEvent = NULL) {
		$this->view->assign('newEvent', $newEvent);
		$this->view->assign('categories', $this->categoryRepository->findAll());
		$this->view->assign('accommodations', $this->accommodationRepository->findAll());
		$this->view->assign('teamers', $this->feUserRepository->getAllTeamers());
		$this->view->assign('trainees', $this->feUserRepository->getAllTrainees());
		$this->view->assign('kitchenGroups', $this->feUserRepository->getAllKitchenGroups());
	}
	
		
	/**
	 * Creates a new Event and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $newEvent a fresh Event object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Event $newEvent) {
		$this->eventRepository->add($newEvent);
		$this->flashMessageContainer->add('Die Veranstaltung wurde angelegt.');
		
		$this->redirect('list');
	}
	
		
	
	/**
	 * Updates an existing Event and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to display
	 * @return string A form to edit a Event 
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->view->assign('event', $event);
		$this->view->assign('categories', $this->categoryRepository->findAll());
		$this->view->assign('accommodations', $this->accommodationRepository->findAll());
		$this->view->assign('teamers', $this->feUserRepository->getAllTeamers());
		$this->view->assign('trainees', $this->feUserRepository->getAllTrainees());
		$this->view->assign('kitchenGroups', $this->feUserRepository->getAllKitchenGroups());
	}
	
		

	/**
	 * Updates an existing Event and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to display
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->eventRepository->update($event);
		$this->flashMessageContainer->add('Die Veranstaltung wurde gespeichert.');
		$this->redirect('list');
	}
	
		
	/**
	 * Deletes an existing Event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Event $event) {
		$this->eventRepository->remove($event);
		$this->flashMessageContainer->add('Die Veranstaltung wurde gelöscht.');
		$this->redirect('list');
	}

}
?>