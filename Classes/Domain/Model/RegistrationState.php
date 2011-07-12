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
 * RegistrationState
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Domain_Model_RegistrationState extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string $name
	 */
	protected $name;

	/**
	 * isRequired
	 *
	 * @var boolean $isRequired
	 */
	protected $isRequired;

	/**
	 * Attendee has to meet requirements of state
	 *
	 * @var boolean $isExternal
	 */
	protected $isExternal;

	/**
	 * Internal state of registration
	 *
	 * @var boolean $isInternal
	 */
	protected $isInternal;

	/**
	 * prerequisites
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites> $prerequisites
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
	 * @param string $name name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Getter for name
	 *
	 * @return string name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Setter for isRequired
	 *
	 * @param boolean $isRequired isRequired
	 * @return void
	 */
	public function setIsRequired($isRequired) {
		$this->isRequired = $isRequired;
	}

	/**
	 * Getter for isRequired
	 *
	 * @return boolean isRequired
	 */
	public function getIsRequired() {
		return $this->isRequired;
	}

	/**
	 * Returns the state of isRequired
	 *
	 * @return boolean the state of isRequired
	 */
	public function isIsRequired() {
		return $this->getIsRequired();
	}

	/**
	 * Setter for isExternal
	 *
	 * @param boolean $isExternal Attendee has to meet requirements of state
	 * @return void
	 */
	public function setIsExternal($isExternal) {
		$this->isExternal = $isExternal;
	}

	/**
	 * Getter for isExternal
	 *
	 * @return boolean Attendee has to meet requirements of state
	 */
	public function getIsExternal() {
		return $this->isExternal;
	}

	/**
	 * Returns the state of isExternal
	 *
	 * @return boolean the state of isExternal
	 */
	public function isIsExternal() {
		return $this->getIsExternal();
	}

	/**
	 * Setter for isInternal
	 *
	 * @param boolean $isInternal Internal state of registration
	 * @return void
	 */
	public function setIsInternal($isInternal) {
		$this->isInternal = $isInternal;
	}

	/**
	 * Getter for isInternal
	 *
	 * @return boolean Internal state of registration
	 */
	public function getIsInternal() {
		return $this->isInternal;
	}

	/**
	 * Returns the state of isInternal
	 *
	 * @return boolean the state of isInternal
	 */
	public function isIsInternal() {
		return $this->getIsInternal();
	}

	/**
	 * Setter for prerequisites
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites> $prerequisites prerequisites
	 * @return void
	 */
	public function setPrerequisites(Tx_Extbase_Persistence_ObjectStorage $prerequisites) {
		$this->prerequisites = $prerequisites;
	}

	/**
	 * Getter for prerequisites
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites> prerequisites
	 */
	public function getPrerequisites() {
		return $this->prerequisites;
	}

	/**
	 * Adds a RegistrationStateTransitionPrerequisites
	 *
	 * @param Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites the RegistrationStateTransitionPrerequisites to be added
	 * @return void
	 */
	public function addPrerequisite(Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites $prerequisite) {
		$this->prerequisites->attach($prerequisite);
	}

	/**
	 * Removes a RegistrationStateTransitionPrerequisites
	 *
	 * @param Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites the RegistrationStateTransitionPrerequisites to be removed
	 * @return void
	 */
	public function removePrerequisite(Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites $prerequisiteToRemove) {
		$this->prerequisites->detach($prerequisiteToRemove);
	}

}
?>