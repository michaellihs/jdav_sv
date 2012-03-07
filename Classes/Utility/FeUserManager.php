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
 * FeUser manager
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Utility_FeUserManager implements t3lib_Singleton {

	/**
	 * If set to true, we did not yet try to get logged in user
	 *
	 * @var bool
	 */
	protected $notYetCheckedForCurrentlyLoggedInUser = true;



	/**
	 * Holds instance of currently logged in fe_user if there is one
	 *
	 * @var Tx_JdavSv_Domain_Model_FeUser
	 */
	protected $currentlyLoggedInFeUser = NULL;



	/**
	 * Holds fe_user repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_FeUserRepository
	 */
	protected $feUserRepository;



	/**
	 * Injects fe_user repository
	 * @param Tx_JdavSv_Domain_Repository_FeUserRepository $feUserRepository
	 */
	public function injectFeUserRepository(Tx_JdavSv_Domain_Repository_FeUserRepository $feUserRepository) {
		$this->feUserRepository = $feUserRepository;
	}



	/**
	 * Returns currently logged in fe_user
	 *
	 * @return Tx_JdavSv_Domain_Model_FeUser
	 */
	public function getCurrentlyLoggedInFeUser() {
		if ($this->notYetCheckedForCurrentlyLoggedInUser && $this->currentlyLoggedInFeUser === null) {
			$this->notYetCheckedForCurrentlyLoggedInUser = FALSE;
			$feUserUid = $GLOBALS['TSFE']->fe_user->user['uid'];
			if ($feUserUid > 0) {
				$query = $this->feUserRepository->createQuery();
				$query->getQuerySettings()->setRespectStoragePage(FALSE);
				$queryResult = $query->matching($query->equals('uid', $feUserUid))->execute();
				if (count($queryResult) > 0) {
					$this->currentlyLoggedInFeUser = $queryResult[0];
				}
			} else {
				$this->currentlyLoggedInFeUser = null;
			}
		}
		return $this->currentlyLoggedInFeUser;
	}

}
?>