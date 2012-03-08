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
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_CategoryPrerequisitesController extends Tx_JdavSv_Controller_AbstractAdminController {
	
	/**
	 * categoryRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_CategoryRepository
	 */
	protected $categoryRepository;



	/**
	 * categoryPrerequisiteRepository
	 *
	 * @var Tx_JdavSv_Domain_Repository_CategoryPrerequisiteRepository
	 */
	protected $categoryPrerequisiteRepository;



	/**
	 * categoryPrerequisiteRepository
	 *
	 * @var Tx_JdavSv_Domain_Repository_CategoryPrerequisiteRepository
	 */
	protected $categoryPrerequisiteFulfillmentRepository;



	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function postInitializeAction() {
		// TODO use injection here!
		$this->categoryRepository = $this->objectManager->get('Tx_JdavSv_Domain_Repository_CategoryRepository');
		$this->categoryPrerequisiteRepository = $this->objectManager->get('Tx_JdavSv_Domain_Repository_CategoryPrerequisiteRepository');
		$this->categoryPrerequisiteFulfillmentRepository = $this->objectManager->get('Tx_JdavSv_Domain_Repository_CategoryPrerequisiteFulfillmentRepository');
	}


		
	/**
	 * Creates a new Category Prerequisite and forwards to category edit action
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category Category to add prerequisite to and to forward afterwards
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite a fresh Category Prerequisite object which has not yet been added to the repository
	 * @return string An HTML form for creating a new Category
	 * @dontvalidate $categoryPrerequisite
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Category $category, Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite = NULL) {
		$this->view->assign('categoryPrerequisite', $categoryPrerequisite);
		$this->view->assign('category', $category);
	}


		
	/**
	 * Creates a new Category and redirects to category edit action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category Category to add prerequisite to and to forward afterwards
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite Category Prerequisite object that has to be created
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Category $category, Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite) {
		$this->categoryPrerequisiteRepository->add($categoryPrerequisite);
		$this->flashMessageContainer->add('Die Voraussetzung wurde angelegt.');

		$this->redirect('edit', 'Category', NULL, array('category' => $category));
	}
	
		
	
	/**
	 * Updates an existing Category and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category Category to add prerequisite to and to forward afterwards
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite Category Prerequisite object that has to be edited
	 * @return string A form to edit a Category
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Category $category, Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite) {
		$this->view->assign('category', $category);
		$this->view->assign('categoryPrerequisite', $categoryPrerequisite);
	}
	
		

	/**
	 * Updates an existing Category and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category Category to add prerequisite to and to forward afterwards
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite Category Prerequisite object that has to be updated
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Category $category, Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite) {
		$this->categoryPrerequisiteRepository->update($categoryPrerequisite);
		$this->flashMessageContainer->add('Die Voraussetzung wurde gespeichert.');

		$this->redirect('edit', 'Category', NULL, array('category' => $category));
	}
	
		
	/**
	 * Deletes an existing Category
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category Category to add prerequisite to and to forward afterwards
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite Category Prerequisite object that has to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Category $category, Tx_JdavSv_Domain_Model_CategoryPrerequisite $categoryPrerequisite) {
		$this->categoryPrerequisiteRepository->remove($categoryPrerequisite);
		$this->flashMessageContainer->add('Die Voraussetzung wurde gelöscht.');

		$this->redirect('edit', 'Category', NULL, array('category' => $category));
	}

}
?>