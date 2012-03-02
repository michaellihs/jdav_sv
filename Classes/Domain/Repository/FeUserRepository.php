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
 * Repository for fe_users table
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Repository_FeUserRepository extends Tx_Extbase_Domain_Repository_FrontendUserRepository {

	/**
	 * Returns all fe_users
	 *
	 * @param bool $respectStoragePage If set to true, storage page is respected
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getAllFeUsers($respectStoragePage = FALSE) {
		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage($respectStoragePage);
		$this->setDefaultQuerySettings($query->getQuerySettings());
		return $this->findAll();
	}



	/**
	 * Returns all fe_users that are teamers
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getAllTeamers() {
		return $this->findByIsTeamer(1);
	}



	/**
	 * Returns all fe_users that are trainees
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getAllTrainees() {
		return $this->findByIsTrainee(1);
	}



	/**
	 * Returns all fe_users that are kitchen group interested
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getAllKitchenGroups() {
		return $this->findByIsKitchenGroup(1);
	}

}
?>