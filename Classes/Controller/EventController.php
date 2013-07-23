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
class Tx_JdavSv_Controller_EventController extends Tx_JdavSv_Controller_AbstractController {
	
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
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		$this->eventRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_EventRepository');
		$this->registrationRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_RegistrationRepository');
	}
	
	
		
	/**
	 * Displays all Events
	 *
	 * @param boolean $resetFilters If set to true, filters will be reset
	 * @return string The rendered list view
	 */
	public function listAction($resetFilters = FALSE) {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['publicEvents'], 'publicEvents');

		$eventDateFilter = $extlistContext->getFilterByFullFiltername('hiddenEventsFilter.eventsDateFilter'); /* @var $eventDateFilter Tx_JdavSv_Extlist_Filters_EventDateFilter */

		if ($resetFilters) {
			$extlistContext->resetFilterboxCollection();
		}

		// Check for start date in flexform settings
		if ($this->settings['dateStart']) {
			$eventDateFilter->setStartDate(new DateTime($this->settings['dateStart']));
			$eventDateFilter->init();
		}

		// Check for end date in flexform settings
		if ($this->settings['dateEnd']) {
			$eventDateFilter->setEndDate(new DateTime($this->settings['dateEnd']));
			$eventDateFilter->init();
		}

		$categoryFilter = $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('filterbox')->getFilterByFilterIdentifier('categoryFilter');

		$this->view->assign('listData', $extlistContext->getListData());
		$this->view->assign('categoryFilter', $categoryFilter);
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
	 * Displays a registrations list for attendees
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string The rendered view
	 */
	public function attendeeRegistrationsListAction(Tx_JdavSv_Domain_Model_Event $event) {
		$registrations = $this->registrationRepository->getAcceptedRegistrationsByEvent($event);
		$this->view->assign('registrations', $registrations);
	}

}