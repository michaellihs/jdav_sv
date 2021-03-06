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
		$formErrors = array();
		if ($this->feUser->getUid() == $feUser->getUid()) {
			if ($feUser->getMobilePhone() != '') {
				$this->feUserRepository->update($feUser);
				$this->flashMessageContainer->add('Die Änderungen an den Benutzerdaten wurden gespeichert!');
			} else {
				$formErrors['mobilePhoneIsMissing'] = 1;
				$this->flashMessageContainer->add('Die Änderungen konnten nicht gespeichert werden, du musst eine Handynummer angeben!','', t3lib_FlashMessage::ERROR);
			}
		} else {
			$this->flashMessageContainer->add('Die Änderungen konnten nicht gespeichert werden!','' , t3lib_FlashMessage::ERROR);
		}
		$this->forward('edit', NULL, NULL, array('feUser' => $feUser, 'formErrors' => $formErrors));
	}



	/**
	 * Actions shows edit form for FeUser
	 * @param Tx_JdavSv_Domain_Model_FeUser $feUser
	 * @param array $formErrors
	 */
	public function editAction(Tx_JdavSv_Domain_Model_FeUser $feUser = NULL, array $formErrors = NULL) {
		$feGroups = $this->feGroupRepository->findAll();
		if ($formErrors) {
			$this->view->assignMultiple($formErrors);
		}
		$this->view->assign('feGroups', $feGroups);
		$this->view->assign('feUser', ($feUser == NULL ? $this->feUser : $feUser));
		$this->view->assign('sektionen', $this->sektionRepository->findAll());
	}



	/**
	 *
	 *
	 * @param string $oldPassword
	 * @param string $newPassword1
	 * @param string $newPassword2
	 */
	public function changePasswordAction($oldPassword, $newPassword1, $newPassword2) {
		$saltedPwObject = tx_saltedpasswords_salts_factory::getSaltingInstance($this->feUser->getPassword());
		if ($saltedPwObject->checkPassword($oldPassword, $this->feUser->getPassword())) {
			if ($newPassword1 == $newPassword2) {
				$this->feUser->setPassword($newPassword1);
				$this->feUserRepository->update($this->feUser);
				$this->flashMessageContainer->add('Passwort wurde geändert!');
				$this->forward('edit');
			} else {
				$this->flashMessageContainer->add('Die beiden neuen Passwörter stimmen nicht überein!');
			}
		} else {
			$this->flashMessageContainer->add('Das eingegebene alte Passwort ist ungültig!');
		}
		$this->forward('password');
	}



	/**
	 * Nothing to do here, only show template
	 */
	public function passwordAction() {

	}



	/**
	 * Nothing to do here, only show template
	 */
	public function forgotPasswordAction() {

	}



	/**
	 * @param string $email
	 */
	public function forgotPasswordSendMailAction($email) {
		$this->feUserManager->sendPasswortForgottenMail($email);
	}

}