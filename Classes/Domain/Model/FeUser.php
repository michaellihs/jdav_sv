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
 * FeUser
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Model_FeUser extends Tx_Extbase_Domain_Model_FrontendUser {

	/**
	 * True, if user is teamer
	 *
	 * @var bool
	 */
	protected $isTeamer;



	/**
	 * True, if user is trainee
	 *
	 * @var bool
	 */
	protected $isTrainee;



	/**
	 * True, if user is kitchen group interested
	 * @var bool
	 */
	protected $isKitchenGroup;



	/**
	 * True, if user is admin
	 *
	 * @var bool
	 */
	protected $isAdmin;



	/**
	 * @param boolean $isTeamer
	 */
	public function setIsTeamer($isTeamer) {
		$this->isTeamer = $isTeamer;
	}



	/**
	 * @return boolean
	 */
	public function getIsTeamer() {
		return $this->isTeamer;
	}



	/**
	 * @param boolean $isTrainee
	 */
	public function setIsTrainee($isTrainee) {
		$this->isTrainee = $isTrainee;
	}



	/**
	 * @return boolean
	 */
	public function getIsTrainee() {
		return $this->isTrainee;
	}



	/**
	 * @param boolean $isKitchenGroup
	 */
	public function setIsKitchenGroup($isKitchenGroup) {
		$this->isKitchenGroup = $isKitchenGroup;
	}



	/**
	 * @return boolean
	 */
	public function getIsKitchenGroup() {
		return $this->isKitchenGroup;
	}



	/**
	 * @param boolean $isAdmin
	 */
	public function setIsAdmin($isAdmin) {
		$this->isAdmin = $isAdmin;
	}



	/**
	 * @return boolean
	 */
	public function getIsAdmin() {
		return $this->isAdmin;
	}



	/**
	 * Returns full name as 'lastName, firstName'
	 *
	 * @return string
	 */
	public function getFullName() {
		return $this->lastName . ', ' . $this->firstName;
	}

}
?>