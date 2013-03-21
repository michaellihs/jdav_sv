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
 * Controller for the Sektion object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Controller_SektionAdminController extends Tx_JdavSv_Controller_AbstractAdminController {
	
	/**
	 * sektionRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_SektionRepository
	 */
	protected $sektionRepository;



	/**
	 * Injects sektion repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_SektionRepository $sektionRepository
	 */
	public function injectSektionRepository(Tx_JdavSv_Domain_Repository_SektionRepository $sektionRepository) {
		$this->sektionRepository = $sektionRepository;
	}
	
	
		
	/**
	 * Displays all Sektionen
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['sektionAdmin'], 'sektionAdmin'
		);

		$this->view->assign('listData', $extlistContext->getListData());
		$this->view->assign('listHeader', $extlistContext->getList()->getListHeader());
		$this->view->assign('listCaptions', $extlistContext->getRendererChain()->renderCaptions($extlistContext->getList()->getListHeader()));
	}


		
	/**
	 * Creates a new Sektion and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Sektion $newSektion a fresh Sektion object which has not yet been added to the repository
	 * @return string An HTML form for creating a new Sektion
	 * @dontvalidate $newSektion
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Sektion $newSektion = NULL) {
		$this->view->assign('newSektion', $newSektion);
	}


		
	/**
	 * Creates a new Sektion and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Sektion $newSektion a fresh Sektion object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Sektion $newSektion) {
		$this->sektionRepository->add($newSektion);
		$this->persistenceManager->persistAll();
		$this->flashMessageContainer->add('Die Sektion wurde angelegt.');
		
		$this->forward('edit', NULL, NULL, array('sektion' => $newSektion));
	}
	
		
	
	/**
	 * Updates an existing Sektion and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Sektion $sektion the Sektion to display
	 * @return string A form to edit a Sektion 
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Sektion $sektion) {
		$this->view->assign('sektion', $sektion);
	}
	
		

	/**
	 * Updates an existing Sektion and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Sektion $sektion Sektion to be updated
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Sektion $sektion) {
		$this->sektionRepository->update($sektion);
		$this->flashMessageContainer->add('Die Sektion wurde gespeichert.');
		$this->redirect('edit', NULL, NULL, array('sektion' => $sektion));
	}


		
	/**
	 * Deletes an existing Sektion
	 *
	 * @param Tx_JdavSv_Domain_Model_Sektion $sektion the Sektion to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Sektion $sektion) {
		$this->sektionRepository->remove($sektion);
		$this->flashMessageContainer->add('Die Sektion wurde gelöscht.');
		$this->redirect('list');
	}



	/**
	 * Sorting action for Sektionen
	 */
	public function sortAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['sektionAdmin'], 'sektionAdmin'
		);
		$extlistContext->getDataBackend()->getSorter()->reset();
		$this->forward('list');
	}

}
?>