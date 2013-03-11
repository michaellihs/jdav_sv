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
	 * Set to true, if username has been set and hence email != username
	 *
	 * @var bool
	 */
	private $_usernameHasBeenSet = false;


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
	 * True, if user is interested in kitchen group
	 *
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
	 * True, if user is proofreader
	 *
	 * @var bool
	 */
	protected $isProofreader;



	/**
	 * Holds date of birth of user
	 *
	 * @var DateTime
	 */
	protected $dateOfBirth;



	/**
	 * Holds mobile phone number of user
	 *
	 * @var string
	 */
	protected $mobilePhone;



	/**
	 * Holds sektion of user
	 *
	 * @var Tx_JdavSv_Domain_Model_Sektion
	 */
	protected $sektion;



	/**
	 * Holds DAV nr of user
	 *
	 * @var string
	 */
	protected $davNr;



	/**
	 * Holds julei nr of user
	 *
	 * @var string
	 */
	protected $juleiNr;



	/**
	 * Holds sex of user
	 *
	 * @var string
	 */
	protected $sex;



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



	/**
	 * Returns full name as 'firstName lastName'
	 *
	 * @return string
	 */
	public function getEmailName() {
		return $this->firstName . ' ' . $this->lastName;
	}



	/**
	 * @param boolean $isProofreader
	 */
	public function setIsProofreader($isProofreader) {
		$this->isProofreader = $isProofreader;
	}



	/**
	 * @return boolean
	 */
	public function getIsProofreader() {
		return $this->isProofreader;
	}



	/**
	 * We only set username once, whether here or in setEmail()
	 *
	 * @param string $username
	 */
	public function setUsername($username) {
		if ($username !== '') {
			$this->_usernameHasBeenSet = true;
		}
		parent::setUsername($username);
	}



	/**
	 * E-Mail == Username here!
	 *
	 * @param $email
	 */
	public function setEmail($email) {
		if (!$this->_usernameHasBeenSet) {
			$this->setUsername($email);
		}
		parent::setEmail($email);
	}




	/**
	 * Setter for password. As we have encrypted passwords here, we need to encrypt them before storing!
	 *
	 * @param $password
	 */
	public function setPassword($password) {
		if (t3lib_extMgm::isLoaded('saltedpasswords')) {
			$saltedpasswordsInstance = tx_saltedpasswords_salts_factory::getSaltingInstance();
			$encryptedPassword = $saltedpasswordsInstance->getHashedPassword($password);
			$this->password = $encryptedPassword;
		} else {
			parent::setPassword($password);
		}
	}



	/**
	 * @param DateTime $dateOfBirth
	 */
	public function setDateOfBirth(DateTime $dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}



	/**
	 * @return DateTime
	 */
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}



	/**
	 * @param string $mobilePhone
	 */
	public function setMobilePhone($mobilePhone) {
		$this->mobilePhone = $mobilePhone;
	}



	/**
	 * @return string
	 */
	public function getMobilePhone() {
		return $this->mobilePhone;
	}



	/**
	 * @param Tx_JdavSv_Domain_Model_Sektion $sektion
	 */
	public function setSektion(Tx_JdavSv_Domain_Model_Sektion $sektion) {
		$this->sektion = $sektion;
	}



	/**
	 * @return Tx_JdavSv_Domain_Model_Sektion
	 */
	public function getSektion() {
		return $this->sektion;
	}



	/**
	 * @return string
	 */
	public function getSektionName() {
		if ($this->sektion) {
			return $this->getSektion()->getName();
		} else {
			return '';
		}
	}



	/**
	 * @param string $davNr
	 */
	public function setDavNr($davNr) {
		$this->davNr = $davNr;
	}



	/**
	 * @return string
	 */
	public function getDavNr() {
		return $this->davNr;
	}



	/**
	 * @param string $juleiNr
	 */
	public function setJuleiNr($juleiNr) {
		$this->juleiNr = $juleiNr;
	}



	/**
	 * @return string
	 */
	public function getJuleiNr() {
		return $this->juleiNr;
	}



	/**
	 * @param string $sex
	 */
	public function setSex($sex) {
		$this->sex = $sex;
	}



	/**
	 * @return string
	 */
	public function getSex() {
		return $this->sex;
	}



	/**
	 * Returns true, if user has dav-nr set
	 *
	 * @return boolean
	 */
	public function hasDavNrSet() {
		if ($this->davNr !== NULL && $this->davNr !== '') {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	/**
	 * Returns TRUE, if user has no dav-nr set
	 *
	 * @return bool
	 */
	public function hasNoDavNrSet() {
		return !$this->hasDavNrSet();
	}



	/**
	 * Returns TRUE, if user has julei nr set
	 *
	 * @return bool
	 */
	public function hasJuleiNrSet() {
		if ($this->juleiNr !== NULL && $this->juleiNr !== '') {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	/**
	 * Returns TRUE, if user has no julei-nr set
	 *
	 * @return bool
	 */
	public function hasNoJuleiNrSet() {
		return !$this->hasJuleiNrSet();
	}



	/**
	 * Returns TRUE, if user has sektion set
	 *
	 * @return bool
	 */
	public function hasSektionSet() {
		if ($this->sektion !== NULL) {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	/**
	 * Returns TRUE, if user has NO sektion set
	 *
	 * @return bool
	 */
	public function hasNoSektionSet() {
		return !$this->hasSektionSet();
	}

}
?>