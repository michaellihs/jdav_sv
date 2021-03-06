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
 * Controller for forgot password actions
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_ForgotPasswordController extends Tx_PtExtbase_Controller_AbstractActionController {

	/**
	 * @var Tx_JdavSv_Utility_FeUserManager
	 */
	protected $feUserManager;



	/**
	 * @var Tx_JdavSv_Domain_Repository_FeUserRepository
	 */
	protected $feUserRepository;



	/**
	 * Injects fe_user manager
	 *
	 * @param Tx_JdavSv_Utility_FeUserManager $feUserManager
	 */
	public function injectFeUserManager(Tx_JdavSv_Utility_FeUserManager $feUserManager) {
		$this->feUserManager = $feUserManager;
	}



	/**
	 * @param Tx_JdavSv_Domain_Repository_FeUserRepository $feUserRepository
	 */
	public function injectFeUserRepository(Tx_JdavSv_Domain_Repository_FeUserRepository $feUserRepository) {
		$this->feUserRepository = $feUserRepository;
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



	/**
	 * @param string $passwordForgottenHash Hash that is generated to find the user whose password should be changed.
	 * @param bool $passwordTooShort
	 */
	public function showChangePasswordFormAction($passwordForgottenHash, $passwordTooShort = FALSE) {
		$this->view->assign('passwordForgottenHash', $passwordForgottenHash);
		if ($passwordTooShort) {
			$this->view->assign('passwordTooShort', 1);
		}
	}



	/**
	 * Shows a form to set a new password
	 *
	 * @param string $passwordForgottenHash Hash that is generated to find the user whose password should be changed.
	 * @param string $newPassword1 New password to be set
	 * @param string $newPassword2 New password to be set (must be the same as $newPassword1)
	 */
	public function setNewPasswordAction($passwordForgottenHash, $newPassword1, $newPassword2) {
		$feUser = $this->feUserRepository->findOneByForgotPasswordHash($passwordForgottenHash); /* @var Tx_JdavSv_Domain_Model_FeUser $feUser */
		if ($feUser) {
			if ($newPassword1 == $newPassword2) {
				if (strlen($newPassword1) < 6) {
					$this->forward('showChangePasswordForm', NULL, NULL, array('passwordForgottenHash' => $passwordForgottenHash, 'passwordTooShort' => TRUE));
				}
				$feUser->setPassword($newPassword1);
				$feUser->setForgotPasswordHash('');
				$this->feUserRepository->update($feUser);
			} else {
				$this->flashMessageContainer->add('Die beiden neuen Passwörter stimmen nicht überein!');
			}
		} else {
			$this->flashMessageContainer->add('Die Änderung des Passworts ist nicht möglich, der benutzte Link ist nicht gültig!');
		}
		$this->view->assign('changedPassword', TRUE);
		$this->flashMessageContainer->add('Passwort wurde geändert!');
	}

}