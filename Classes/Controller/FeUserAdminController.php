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
class Tx_JdavSv_Controller_FeUserAdminController extends Tx_JdavSv_Controller_AbstractAdminController {

	/**
	 * Holds fe_groups repository
	 *
	 * @var Tx_Extbase_Domain_Repository_FrontendUserGroupRepository
	 */
	protected $feGroupRepository;



	/**
	 * Holds instance of sektion repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_SektionRepository
	 */
	protected $sektionRepository;



	/**
	 * Injects fe_group repository
	 *
	 * @param Tx_Extbase_Domain_Repository_FrontendUserGroupRepository $feGroupRepository
	 */
	public function injectFeGroupRepository(Tx_Extbase_Domain_Repository_FrontendUserGroupRepository $feGroupRepository) {
		$this->feGroupRepository = $feGroupRepository;
	}



	/**
	 * Injects sektion repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_SektionRepository $sektionRepository
	 */
	public function injectSektionRepository(Tx_JdavSv_Domain_Repository_SektionRepository $sektionRepository) {
		$this->sektionRepository = $sektionRepository;
	}



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
		$this->view->assign('proofreaderFilter', $extlistContext->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('feUserFilters')->getFilterByFilterIdentifier('proofreaderFilter'));
		$this->view->assign('listData', $extlistContext->getListData());
		$this->view->assign('listHeader', $extlistContext->getList()->getListHeader());
		$this->view->assign('listCaptions', $extlistContext->getRendererChain()->renderCaptions($extlistContext->getList()->getListHeader()));
		$this->view->assign('pager', $extlistContext->getPager());
		$this->view->assign('pagerCollection', $extlistContext->getPagerCollection());
	}



	/**
	 * Updates given FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->feUserRepository->update($feUser);
		$this->flashMessageContainer->add('Der Benutzer wurde gespeichert.');
		$this->redirect('edit', NULL, NULL, array('feUser' => $feUser));
	}



	/**
	 * Actions shows edit form for FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function editAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$feGroups = $this->feGroupRepository->findAll();
		$this->view->assign('feGroups', $feGroups);
		$this->view->assign('feUser', $feUser);
		$this->view->assign('sektionen', $this->sektionRepository->findAll());
	}



	/**
	 * Action for creating a new FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function createAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		// We set default fe_groups configured in TypoScript
		if (!$feUser->getUsergroup()->count() > 0) {
			$defaultFeGroups = explode(',',$this->settings['fe_users']['defaultFeGroup']);
			foreach($defaultFeGroups as $defaultFeGroup) {
				$feUser->addUsergroup($this->feGroupRepository->findByUid($defaultFeGroup));
			}
		}

		$this->feUserRepository->add($feUser);
		$this->persistenceManager->persistAll();
		$this->flashMessageContainer->add('Der Benutzer wurde angelegt.');
		$this->redirect('edit', NULL, NULL, array('feUser' => $feUser));
	}



	/**
	 * Creates a new FeUser
	 *
	 * @param null|Tx_JdavSv_Domain_Model_FeUser $feUser
	 * @dontValidate $feUser
	 */
	public function newAction(Tx_JdavSv_Domain_Model_FeUser $feUser = null) {
		if ($feUser === null) {
			$feUser = new Tx_JdavSv_Domain_Model_FeUser();
		}
		$this->view->assign('feGroups', $this->feGroupRepository->findAll());
		$this->view->assign('feUser', $feUser);
		$this->view->assign('sektionen', $this->sektionRepository->findAll());
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



	/**
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function showChangePasswordAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		$this->view->assign('feUser', $feUser);
	}



	/**
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 * @param string $password
	 */
	public function changePasswordAction(Tx_JdavSv_Domain_Model_FeUser $feUser, $password) {
		$feUser->setPassword($password);
		$this->feUserRepository->update($feUser);
		$this->flashMessageContainer->add('Passwort wurde geändert!');
		$this->forward('showChangePassword');
	}



	/**
	 * Sort action for fe_users list
	 */
	public function sortAction() {
		$extlistContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration(
			$this->settings['listConfig']['feUsersAdmin'], 'feUsersAdmin'
		);
		$extlistContext->getDataBackend()->getSorter()->reset();
		$this->forward('list');
	}

}