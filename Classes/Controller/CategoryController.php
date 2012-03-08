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
 * Controller for the Category object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Controller_CategoryController extends Tx_JdavSv_Controller_AbstractAdminController {
	
	/**
	 * categoryRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_CategoryRepository
	 */
	protected $categoryRepository;



	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function postInitializeAction() {
		// TODO use injection here!
		$this->categoryRepository = $this->objectManager->get('Tx_JdavSv_Domain_Repository_CategoryRepository');
	}
	
	
		
	/**
	 * Displays all Categories
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
				$this->settings['listConfig']['categoryAdmin'], 'categoryAdmin'
			);

			$this->view->assign('listData', $extlistContext->getListData());
			$this->view->assign('listHeader', $extlistContext->getList()->getListHeader());
			$this->view->assign('listCaptions', $extlistContext->getRendererChain()->renderCaptions($extlistContext->getList()->getListHeader()));
	}
	
		
	/**
	 * Creates a new Category and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $newCategory a fresh Category object which has not yet been added to the repository
	 * @return string An HTML form for creating a new Category
	 * @dontvalidate $newCategory
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Category $newCategory = NULL) {
		$this->view->assign('newCategory', $newCategory);
	}
	
		
	/**
	 * Creates a new Category and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $newCategory a fresh Category object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Category $newCategory) {
		$this->categoryRepository->add($newCategory);
		$this->flashMessageContainer->add('Die Kategorie wurde angelegt.');
		
		$this->redirect('list');
	}
	
		
	
	/**
	 * Updates an existing Category and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category the Category to display
	 * @return string A form to edit a Category 
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Category $category) {
		$this->view->assign('category', $category);
	}
	
		

	/**
	 * Updates an existing Category and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category Category to be updated
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Category $category) {
		$this->categoryRepository->update($category);
		$this->flashMessageContainer->add('Die Kategorie wurde gespeichert.');
		$this->redirect('list');
	}
	
		
	/**
	 * Deletes an existing Category
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category the Category to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Category $category) {
		$this->categoryRepository->remove($category);
		$this->flashMessageContainer->add('Die Kategorie wurde gelöscht.');
		$this->redirect('list');
	}

}
?>