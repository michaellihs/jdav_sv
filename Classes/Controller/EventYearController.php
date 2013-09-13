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
 * Controller for the Event Year object
 *
 * @package Controller
 * @author Michael Knoll <mimi@kaktusteam.de>
 */

class Tx_JdavSv_Controller_EventYearController extends Tx_JdavSv_Controller_AbstractAdminController {

	/**
	 * @var Tx_JdavSv_Domain_Repository_EventYearRepository
	 */
	protected $eventYearRepository;



	/**
	 * Injects event year repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_EventYearRepository $eventYearRepository
	 */
	public function injectEventYearRepository(Tx_JdavSv_Domain_Repository_EventYearRepository $eventYearRepository) {
		$this->eventYearRepository = $eventYearRepository;
	}



	/**
	 * Displays all Event Years
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
		$eventYears = $this->eventYearRepository->findAllOrderedByName();
		$this->view->assign('eventYears', $eventYears);
	}



	/**
	 * Creates a new Event Year and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_EventYear $newEventYear
	 * @dontvalidate $newEventYear
	 */
	public function newAction(Tx_JdavSv_Domain_Model_EventYear $newEventYear = NULL) {
		$this->view->assign('newEventYear', $newEventYear);
	}



	/**
	 * Creates a new Event Year and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_EventYear $newEventYear a fresh Event Year object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_EventYear $newEventYear) {
		$this->eventYearRepository->add($newEventYear);
		$this->persistenceManager->persistAll();
		$this->flashMessageContainer->add('Das Veranstaltungsjahr wurde angelegt.');

		$this->redirect('edit', NULL, NULL, array('eventYear' => $newEventYear));
	}



	/**
	 * Updates an existing Event Year and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_EventYear $eventYear the Event Year to display
	 * @return string A form to edit a Event Year
	 */
	public function editAction(Tx_JdavSv_Domain_Model_EventYear $eventYear) {
		$this->view->assign('eventYear', $eventYear);
	}



	/**
	 * Updates an existing Event Year and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_EventYear $eventYear Event Year to be updated
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_EventYear $eventYear) {
		$this->eventYearRepository->update($eventYear);
		$this->flashMessageContainer->add('Das Veranstaltungsjahr wurde gespeichert.');
		$this->forward('edit', NULL, NULL, array('eventYear' => $eventYear));
	}



	/**
	 * Deletes an existing Event Year
	 *
	 * @param Tx_JdavSv_Domain_Model_EventYear $eventYear the Event Year to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_EventYear $eventYear) {
		$this->eventYearRepository->remove($eventYear);
		$this->flashMessageContainer->add('Das Veranstaltungsjahr wurde gelöscht.');
		$this->redirect('list');
	}

}