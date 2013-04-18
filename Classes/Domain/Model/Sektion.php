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
 * Domain model for Sektion
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Model_Sektion extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of sektion
	 *
	 * @var string $name
	 */
	protected $name;



	/**
	 * ZIP for sektion
	 * @var string
	 */
	protected $zip;



	/**
	 * @var string
	 */
	protected $address;



	/**
	 * @var string
	 */
	protected $email;



	/**
	 * @var Tx_JdavSv_Domain_Model_FeUser
	 */
	protected $vorstand;



	/**
	 * @var Tx_JdavSv_Domain_Model_FeUser
	 */
	protected $jugendreferent;



	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}



	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}



	/**
	 * @param string $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}



	/**
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}



	/**
	 * @param \Tx_JdavSv_Domain_Model_FeUser $jugendreferent
	 */
	public function setJugendreferent($jugendreferent) {
		$this->jugendreferent = $jugendreferent;
	}



	/**
	 * @return \Tx_JdavSv_Domain_Model_FeUser
	 */
	public function getJugendreferent() {
		return $this->jugendreferent;
	}



	/**
	 * @param \Tx_JdavSv_Domain_Model_FeUser $vorstand
	 */
	public function setVorstand($vorstand) {
		$this->vorstand = $vorstand;
	}



	/**
	 * @return \Tx_JdavSv_Domain_Model_FeUser
	 */
	public function getVorstand() {
		return $this->vorstand;
	}



	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}



	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}



	/**
	 * @param string $zip
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}



	/**
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}

}