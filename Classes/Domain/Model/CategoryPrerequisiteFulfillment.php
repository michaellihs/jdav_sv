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
 * Class implements fulfillment of a registration for an event for a category prerequisite.
 *
 * Each event category comes with a bunch of prerequisites that have to be fulfilled by a registration in order
 * to be complete. This class implements such a fulfillment.
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Registration of this fulfillment
	 *
	 * @var Tx_JdavSv_Domain_Model_Registration
	 */
	protected $registration;



	/**
	 * Category prerequisite of this fulfillment
	 *
	 * @var Tx_JdavSv_Domain_Model_CategoryPrerequisite
	 */
	protected $prerequisite;



	/**
	 * Date when fulfillment was set
	 *w
	 * @var int
	 */
	protected $date;



	/**
	 * Optional annotation for fulfillment
	 *
	 * @var string
	 */
	protected $annotation;



	/**
	 * If set to true, fulfillment is fulfilled
	 *
	 * @var boolean
	 */
	protected $isFulfilled;



	/**
	 * @param string $annotation
	 */
	public function setAnnotation($annotation) {
		$this->annotation = $annotation;
	}



	/**
	 * @return string
	 */
	public function getAnnotation() {
		return $this->annotation;
	}



	/**
	 * @param int $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}



	/**
	 * @return int
	 */
	public function getDate() {
		return $this->date;
	}



	/**
	 * @param \Tx_JdavSv_Domain_Model_CategoryPrerequisite $prerequisite
	 */
	public function setPrerequisite($prerequisite) {
		$this->prerequisite = $prerequisite;
	}



	/**
	 * @return \Tx_JdavSv_Domain_Model_CategoryPrerequisite
	 */
	public function getPrerequisite() {
		return $this->prerequisite;
	}



	/**
	 * @param \Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function setRegistration($registration) {
		$this->registration = $registration;
	}



	/**
	 * @return \Tx_JdavSv_Domain_Model_Registration
	 */
	public function getRegistration() {
		return $this->registration;
	}



	/**
	 * @param boolean $isFulfilled
	 */
	public function setIsFulfilled($isFulfilled) {
		$this->isFulfilled = $isFulfilled;
	}



	/**
	 * @return boolean
	 */
	public function getIsFulfilled() {
		return $this->isFulfilled;
	}

}
?>