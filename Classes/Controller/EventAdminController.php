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
class Tx_JdavSv_Controller_EventAdminController extends Tx_JdavSv_Controller_AbstractAdminController {

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
	 * @param Tx_JdavSv_Domain_Repository_AccommodationRepository $accommodationRepository
	 */
	public function injectAccommodationRepository(Tx_JdavSv_Domain_Repository_AccommodationRepository $accommodationRepository) {
		$this->accommodationRepository = $accommodationRepository;
	}



	/**
	 * @param Tx_JdavSv_Domain_Repository_CategoryRepository $categoryRepository
	 */
	public function injectCategoryRepository(Tx_JdavSv_Domain_Repository_CategoryRepository $categoryRepository) {
		$this->categoryRepository = $categoryRepository;
	}



	/**
	 * @param Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository
	 */
	public function injectRegistrationRepository(Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository) {
		$this->registrationRepository = $registrationRepository;
	}



	/**
	 * @param Tx_JdavSv_Domain_Repository_EventRepository $eventRepository
	 */
	public function injectEventRepository(Tx_JdavSv_Domain_Repository_EventRepository $eventRepository) {
		$this->eventRepository = $eventRepository;
	}



	/**
	 * Displays all Events
	 *
	 * @param bool $resetFilters
	 * @param bool $resetPager
	 * @return string The rendered list view
	 */
	public function listAction($resetFilters = FALSE, $resetPager = FALSE) {

		if (!$this->feUser->getIsAdmin()) {
			$this->forward('myEventsList');
		}

		$extlistContextForEventAdminList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['adminEvents'], 'adminEvents');

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

		$extlistContextForRegistrationsParticipantsExcelExportList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['registrationsParticipantsExcelExport'],
			'registrationsParticipantsExcelExport'
		);



		if ($resetPager) {
			$extlistContextForEventAdminList->resetPagerCollection();
		}

		if ($resetFilters) {
			$extlistContextForEventAdminList->resetFilterboxCollection();
		}


		$registrationsByEventFilterForParticipantsExcelExportList = $extlistContextForRegistrationsParticipantsExcelExportList->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('filterbox1')->getFilterByFilterIdentifier('registrationsByEventFilter');


		$this->view->assign('listData', $extlistContextForEventAdminList->getListData());
		$this->view->assign('listCaptions', $extlistContextForEventAdminList->getRendererChain()->renderCaptions($extlistContextForEventAdminList->getList()->getListHeader()));
		$this->view->assign('listHeader', $extlistContextForEventAdminList->getList()->getListHeader());
		$this->view->assign('registrationsByEventFilterForTeamerList', $registrationsByEventFilterForTeamerList);
		$this->view->assign('registrationsByEventFilterForParticipantsList', $registrationsByEventFilterForParticipantsList);
		$this->view->assign('registrationsByEventFilterForParticipantsExcelExportList', $registrationsByEventFilterForParticipantsExcelExportList);
		$this->view->assign('pager', $extlistContextForEventAdminList->getPager());
		$this->view->assign('pagerCollection', $extlistContextForEventAdminList->getPagerCollection());
		$this->view->assign('stateFilter', $extlistContextForEventAdminList->getFilterByFullFiltername('stateFilterbox.stateFilter'));
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
		$this->view->assign('waitinglist', $waitingListRegistrations);
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
	 * @param Tx_JdavSv_Domain_Model_FeUser $teamer If given, this value is set for first teamer
	 * @return string An HTML form for creating a new Event
	 * @dontvalidate $newEvent
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Event $newEvent = NULL, Tx_JdavSv_Domain_Model_FeUser $teamer = NULL) {
		$this->view->assign('newEvent', $newEvent);
		$this->view->assign('categories', $this->categoryRepository->findAll());
		$this->view->assign('accommodations', $this->accommodationRepository->findAllSorted());
		$this->view->assign('teamers', $this->feUserRepository->getAllTeamers());
		$this->view->assign('trainees', $this->feUserRepository->getAllTrainees());
		$this->view->assign('firstTeamer', $teamer);
		$this->view->assign('kitchenGroups', $this->feUserRepository->getAllKitchenGroups());
	}



	/**
	 * Creates a new Event and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $newEvent a fresh Event object which has not yet been added to the repository
	 * @param Tx_JdavSv_Domain_Model_FeUser $teamer If given, this value is set for first teamer
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Event $newEvent, Tx_JdavSv_Domain_Model_FeUser $teamer = NULL) {
		$this->eventRepository->add($newEvent);
		$this->flashMessageContainer->add('Die Veranstaltung wurde angelegt.');
		$this->persistenceManager->persistAll();

		$this->redirect('edit', null, null, array('teamer' => $teamer, 'event' => $newEvent));
	}



	/**
	 * Updates an existing Event and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to display
	 * @param Tx_JdavSv_Domain_Model_FeUser $teamer If given, this value is set for first teamer
	 * @return string A form to edit a Event
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Event $event, Tx_JdavSv_Domain_Model_FeUser $teamer = NULL) {
		$this->view->assign('event', $event);
		$this->view->assign('categories', $this->categoryRepository->findAll());
		$this->view->assign('accommodations', $this->accommodationRepository->findAll());
		$this->view->assign('teamers', $this->feUserRepository->getAllTeamers());
		$this->view->assign('firstTeamer', $teamer);
		$this->view->assign('trainees', $this->feUserRepository->getAllTrainees());
		$this->view->assign('kitchenGroups', $this->feUserRepository->getAllKitchenGroups());
	}



	/**
	 * Updates an existing Event and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to display
	 * @param Tx_JdavSv_Domain_Model_FeUser $teamer If given, this value is set for first teamer
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Event $event, Tx_JdavSv_Domain_Model_FeUser $teamer = NULL) {
		$this->eventRepository->update($event);
		$this->flashMessageContainer->add('Die Veranstaltung wurde gespeichert.');
		$this->redirect('edit', null, null, array('teamer' => $teamer, 'event' => $event));
	}



	/**
	 * Deletes an existing Event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event the Event to be deleted
	 * @param string $returnTo Action to return to after deletion
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Event $event, $returnTo = null) {
		$this->eventRepository->remove($event);
		$this->flashMessageContainer->add('Die Veranstaltung wurde gelöscht.');
		if ($returnTo) {
			$this->redirect($returnTo);
		} else {
			$this->redirect('list');
		}
	}



	/**
	 * Shows list of events for currently logged in user
	 */
	public function myEventsListAction() {
		$this->view->assign('events', $this->eventRepository->getEventsForTeamer($this->feUser));
	}



	/**
	 * Sort action for event admin list
	 */
	public function sortAction() {
		$extlistContextForEventAdminList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['adminEvents'],
			'adminEvents'
		);
		$extlistContextForEventAdminList->getDataBackend()->getSorter()->reset();
		$this->forward('list');
	}
	
	
	
	/**
	 * Sets all registrations to be paid for given event
	 * 
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function setRegistrationsPaidAction(Tx_JdavSv_Domain_Model_Event $event) {
		$event->setRegistrationsPaid();
		$this->flashMessageContainer->add('Der Status aller Anmeldungen wurde auf <b>bezahlt</b> gesetzt.');
		$this->forward('show');
	}



	/**
	 * Shows a form to compose a message sent to all participants of
	 * the given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function composeMessageAction(Tx_JdavSv_Domain_Model_Event $event) {

	}



	/**
	 * Sents given message to all participants of given event.
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @param $message
	 */
	public function sentMessageAction(Tx_JdavSv_Domain_Model_Event $event, $message) {

	}

}