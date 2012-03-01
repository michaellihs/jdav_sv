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
	 * @var Tx_Extbase_Domain_Model_FrontendUser
	 */
	protected $feUser;



	/**
	 * Holds array of fe_users
	 *
	 * @var array<Tx_Extbase_Domain_Model_FrontendUser>
	 */
	protected $feUsers;



	/**
	 * Holds fe_user repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_FeUserRepository
	 */
	protected $feUserRepository;



	/**
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;
	


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
	 * Initializes the controller
	 *
	 */
	protected function initializeAction() {
		$this->initializeFeUser();
 	}
 	
 	
 	
	/**
	 * Initializes feUser object by looking up currently
	 * logged-in user from T3 environment
	 */
	protected function initializeFeUser() {
	    $feUserUid = $GLOBALS['TSFE']->fe_user->user['uid'];
        if ($feUserUid > 0) {
            $query = $this->feUserRepository->createQuery();
            $query->getQuerySettings()->setRespectStoragePage(FALSE);
            $queryResult = $query->matching($query->equals('uid', $feUserUid))->execute();
            if (count($queryResult) > 0) {
                $this->feUser = $queryResult[0];
            }
        } else {
            $this->feUser = null;
        }
	}
	
}
?>