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
 * Abstract Controller for all controllers that require admin privileges
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
abstract class Tx_JdavSv_Controller_AbstractAdminController extends Tx_JdavSv_Controller_AbstractController {

	/**
	 * Initializes the controller and checks for admin rights on logged in feuser
	 */
	final protected function initializeAction() {
		parent::initializeAction();
		$this->checkFeUser();
		$this->preInitializeAction();
		$this->postInitializeAction();
	}



	/**
	 * Checks access rights and if we have a logged in user
	 */
	protected function checkFeUser() {
		if (!isset($this->feUser)) {
			$this->flashMessageContainer->add('Bitte überprüfen Sie Benutzername und Passwort!', 'Fehler bei der Anmeldung', t3lib_FlashMessage::ERROR);
			$this->redirect('showLoginForm', 'Login');
		} elseif(!($this->feUser->getIsAdmin() || $this->feUser->getIsTeamer() || $this->feUser->getIsProofreader())) {
			$this->flashMessageContainer->add('Sie haben nicht die nötigen Rechte um die Anwendung zu nutzen!', 'Fehler bei der Anmeldung', t3lib_FlashMessage::ERROR);
			$this->redirect('showLoginForm', 'Login');
		}
	}



	/**
	 * Template method to be run BEFORE initializeAction()
	 */
	protected function preInitializeAction() {

	}



	/**
	 * Template method to be run AFTER initializeAction()
	 */
	protected function postInitializeAction() {

	}

}
?>