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
 * Controller for the Accommodation object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Controller_AccommodationController extends Tx_JdavSv_Controller_AbstractAdminController {
	
	/**
	 * categoryRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_AccommodationRepository
	 */
	protected $accommodationRepository;



	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function postInitializeAction() {
		// TODO use injection here!
		$this->accommodationRepository = $this->objectManager->get('Tx_JdavSv_Domain_Repository_AccommodationRepository');
	}
	
	
		
	/**
	 * Displays all Accommodations
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
				$this->settings['listConfig']['accommodationAdmin'], 'accommodationAdmin'
			);

		$this->view->assign('listData', $extlistContext->getListData());
		$this->view->assign('listHeader', $extlistContext->getList()->getListHeader());
		$this->view->assign('listCaptions', $extlistContext->getRendererChain()->renderCaptions($extlistContext->getList()->getListHeader()));
	}
	
		
	/**
	 * Creates a new Category and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation $newAccommodation a fresh Category object which has not yet been added to the repository
	 * @return string An HTML form for creating a new Category
	 * @dontvalidate $newAccommodation
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Accommodation $newAccommodation = NULL) {
		$this->view->assign('newAccommodation', $newAccommodation);
	}
	
		
	/**
	 * Creates a new accommodation and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation $newAccommodation a fresh accommodation object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Accommodation $newAccommodation) {
		$this->accommodationRepository->add($newAccommodation);
		$this->flashMessageContainer->add('Die Unterkunft wurde angelegt.');
		
		$this->forward('edit', NULL, NULL, array('accommodation' => $newAccommodation));
	}
	
		
	
	/**
	 * Updates an existing accommodation and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation $accommodation the accommodation to display
	 * @return string A form to edit a accommodation
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Accommodation $accommodation) {
		$this->view->assign('accommodation', $accommodation);
	}
	
		

	/**
	 * Updates an existing accommodation and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation $accommodation accommodation to be updated
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Accommodation $accommodation) {
		$this->accommodationRepository->update($accommodation);
		$this->flashMessageContainer->add('Die Unterkunft wurde gespeichert.');
		$this->forward('edit', NULL, NULL, array('accommodation' => $accommodation));
	}
	
		
	/**
	 * Deletes an existing accommodation
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation $accommodation the accommodation to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Accommodation $accommodation) {
		$this->accommodationRepository->remove($accommodation);
		$this->flashMessageContainer->add('Die Unterkunft wurde gelöscht.');
		$this->redirect('list');
	}



	/**
	 * Sorting action for accomodation list
	 */
	public function sortAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['accommodationAdmin'], 'accommodationAdmin'
		);
		$extlistContext->getDataBackend()->getSorter()->reset();
		$this->forward('list');
	}

}