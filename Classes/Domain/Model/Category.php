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
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractValueObject {

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

}
?>