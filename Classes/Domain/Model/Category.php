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
 * Category
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Name of event category
	 *
	 * @var string $name
	 */
	protected $name;



	/**
	 * Is a tour report required for registration
	 *
	 * @var boolean $tourReportRequired
	 */
	protected $tourReportRequired;


	
	/**
	 * Holds a shortcut for a category
	 *
	 * @var string
	 */
	protected $shortcut;



	/**
	 * Prerequisites that need to be fulfilled in order to complete a registration for this event type
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_CategoryPrerequisite>
	 */
	protected $prerequisites;



	/**
	 * The constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}



	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the kickstarter
		 * You may modify the constructor of this class instead
		 */
		$this->prerequisites = new Tx_Extbase_Persistence_ObjectStorage();
	}



	/**
	 * Setter for name
	 *
	 * @param string $name Name of event category
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}



	/**
	 * Getter for name
	 *
	 * @return string Name of event category
	 */
	public function getName() {
		return $this->name;
	}



	/**
	 * Setter for tourReportRequired
	 *
	 * @param boolean $tourReportRequired Is a tour report required for registration
	 * @return void
	 */
	public function setTourReportRequired($tourReportRequired) {
		$this->tourReportRequired = $tourReportRequired;
	}



	/**
	 * Getter for tourReportRequired
	 *
	 * @return boolean Is a tour report required for registration
	 */
	public function getTourReportRequired() {
		return $this->tourReportRequired;
	}



	/**
	 * Returns the state of tourReportRequired
	 *
	 * @return boolean the state of tourReportRequired
	 */
	public function isTourReportRequired() {
		return $this->getTourReportRequired();
	}


	
	/**
	 * Returns shortcut for this category
	 *
	 * @return string
	 */
	public function getShortcut() {
		return $this->shortcut;
	}


	
	/**
	 * Setter for shortcut
	 *
	 * @param string $shortcut
	 */
	public function setShortcut($shortcut) {
		$this->shortcut = $shortcut;
	}



	/**
	 * Attaches a prerequisite to prerequisites of this category
	 *
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $prerequisite
	 */
	public function addPrerequisite(Tx_JdavSv_Domain_Model_CategoryPrerequisite $prerequisite) {
		$this->prerequisites->attach($prerequisite);
	}



	/**
	 * Removes given prerequisite from attached prerequisites
	 *
	 * @param Tx_JdavSv_Domain_Model_CategoryPrerequisite $prerequisite
	 */
	public function removePrerequisite(Tx_JdavSv_Domain_Model_CategoryPrerequisite $prerequisite) {
		$this->prerequisites->detach($prerequisite);
	}



	/**
	 * Sets all prerequisites for this category
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage $prerequisites
	 */
	public function setPrerequisites(Tx_Extbase_Persistence_ObjectStorage $prerequisites) {
		$this->prerequisites = $prerequisites;
	}



	/**
	 * Returns all prerequisites for this category
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getPrerequisites() {
		return $this->prerequisites;
	}

}
?>