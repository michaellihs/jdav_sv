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
 * Abstract Controller for JDAV SV Controllers
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_AbstractController extends Tx_PtExtbase_Controller_AbstractActionController {

	/**
	 * Holds currently logged in feUser (if there is one)
	 *
	 * @var Tx_JdavSv_Domain_Model_FeUser
	 */
	protected $feUser;



	/**
	 * Holds fe_user repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_FeUserRepository
	 */
	protected $feUserRepository;



	/**
	 * Holds instance of persistence manager
	 *
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;



	/**
	 * Holds fe_user manager
	 *
	 * @var Tx_JdavSv_Utility_FeUserManager
	 */
	protected $feUserManager;
	


	/**
	 * Injects persistence manager
	 *
	 * @param Tx_Extbase_Persistence_Manager $persistenceManager
	 */
	public function injectPersistenceManager(Tx_Extbase_Persistence_Manager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}



	/**
	 * Injects fe_user repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_FeUserRepository $feUserRepository
	 */
	public function injectFeUserRepository(Tx_JdavSv_Domain_Repository_FeUserRepository $feUserRepository) {
		$this->feUserRepository = $feUserRepository;
	}



	/**
	 * Injects feUserManager
	 *
	 * @param Tx_JdavSv_Utility_FeUserManager $feUserManager
	 */
	public function injectFeUserManager(Tx_JdavSv_Utility_FeUserManager $feUserManager) {
		$this->feUserManager = $feUserManager;
	}


	
	/**
	 * Initializes the controller
	 *
	 */
	protected function initializeAction() {
		$this->initializeFeUser();
 	}



	/**
	 * Sets currently logged in user in view
	 *
	 * @param Tx_Extbase_MVC_View_ViewInterface $view
	 */
	protected function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {
		parent::initializeView($view);
		if ($this->feUser) {
			$view->assign('feUser', $this->feUser);
		}
	}
 	
 	
 	
	/**
	 * Initializes feUser object by looking up currently
	 * logged-in user from T3 environment
	 */
	protected function initializeFeUser() {
		$this->feUser = $this->feUserManager->getCurrentlyLoggedInFeUser();
	}
	
}
?>