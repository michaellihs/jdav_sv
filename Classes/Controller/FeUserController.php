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
 * Controller for the FeUser object
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_FeUserController extends Tx_JdavSv_Controller_AbstractAdminController {

	/**
	 * Action for showing FeUser details
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function showAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->view->assign('feUser', $feUser);
	}



	/**
	 * Action renders FeUser list
	 *
	 * @param bool $resetFilters If set to true, filters will be reset
	 */
	public function listAction($resetFilters = FALSE) {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['feUsersAdmin'], 'feUsersAdmin'
		);

		// Reset filters
		if ($resetFilters) {
			$extlistContext->resetFilterboxCollection();
		}

		$this->view->assign('usernameFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('usernameFilter'));
		$this->view->assign('emailFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('emailFilter'));
		$this->view->assign('teamerFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('teamerFilter'));
		$this->view->assign('traineeFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('traineeFilter'));
		$this->view->assign('kitchenGroupFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('kitchenGroupFilter'));
		$this->view->assign('adminFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('adminFilter'));
		$this->view->assign('listData', $extlistContext->getListData());
		$this->view->assign('listHeader', $extlistContext->getList()->getListHeader());
		$this->view->assign('listCaptions', $extlistContext->getRendererChain()->renderCaptions($extlistContext->getList()->getListHeader()));
	}



	/**
	 * Updates given FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->feUserRepository->update($feUser);
		$this->flashMessageContainer->add('Der Benutzer wurde gespeichert.');
		$this->redirect('list');
	}



	/**
	 * Actions shows edit form for FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function editAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->view->assign('feUser', $feUser);
	}



	/**
	 * Action for creating a new FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function createAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->feUserRepository->add($feUser);
		$this->flashMessageContainer->add('Der Benutzer wurde angelegt.');
		$this->redirect('list');
	}



	/**
	 * Creates a new FeUser
	 *
	 * @param null|Tx_JdavSv_Domain_Model_FeUser $feUser
	 * @dontValidate $feUser
	 */
	public function newAction(Tx_JdavSv_Domain_Model_FeUser $feUser = null) {
		$this->view->assign('feUser', $feUser);
	}



	/**
	 * Deletes FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->feUserRepository->remove($feUser);
		$this->flashMessageContainer->add('Der Benutzer wurde gelöscht.');
		$this->redirect('list');
	}

}
?>