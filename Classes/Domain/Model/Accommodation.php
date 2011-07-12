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
 * Accommodation
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Domain_Model_Accommodation extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of accomodation
	 *
	 * @var string $name
	 */
	protected $name;

	/**
	 * address of accommodation
	 *
	 * @var string $address
	 */
	protected $address;

	/**
	 * URL of website for accomodation
	 *
	 * @var string $url
	 */
	protected $url;

	/**
	 * E-Mail address for accomodation
	 *
	 * @var string $email
	 */
	protected $email;

	/**
	 * Telephone number of accomodation
	 *
	 * @var string $telephone
	 */
	protected $telephone;

	/**
	 * Setter for name
	 *
	 * @param string $name Name of accomodation
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Getter for name
	 *
	 * @return string Name of accomodation
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Setter for address
	 *
	 * @param string $address address of accommodation
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Getter for address
	 *
	 * @return string address of accommodation
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Setter for url
	 *
	 * @param string $url URL of website for accomodation
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Getter for url
	 *
	 * @return string URL of website for accomodation
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Setter for email
	 *
	 * @param string $email E-Mail address for accomodation
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Getter for email
	 *
	 * @return string E-Mail address for accomodation
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Setter for telephone
	 *
	 * @param string $telephone Telephone number of accomodation
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * Getter for telephone
	 *
	 * @return string Telephone number of accomodation
	 */
	public function getTelephone() {
		return $this->telephone;
	}

}
?>