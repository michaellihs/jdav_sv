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
class Tx_JdavSv_Controller_FeUserController extends Tx_JdavSv_Controller_AbstractController {

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
	 * Updates given FeUser
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_FeUser $feUser) {
		if ($this->feUser->getUid() == $feUser->getUid()) {
			$this->feUserRepository->update($feUser);
			$this->flashMessageContainer->add('Die Änderungen an den Benutzerdaten wurden gespeichert!');
		} else {
			$this->flashMessageContainer->add('Die Änderungen konnten nicht gespeichert werden!','' , t3lib_FlashMessage::ERROR);
		}
		$this->redirect('edit');
	}



	/**
	 * Actions shows edit form for FeUser
	 */
	public function editAction() {
		$feGroups = $this->feGroupRepository->findAll();
		$this->view->assign('feGroups', $feGroups);
		$this->view->assign('feUser', $this->feUser);
		$this->view->assign('sektionen', $this->sektionRepository->findAll());
	}

}