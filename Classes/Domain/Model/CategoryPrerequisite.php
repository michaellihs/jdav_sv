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
 * Class implements prerequisites that have to be fulfilled by a registration of an event in this category to be completed.
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Model_CategoryPrerequisite extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Associated category
	 *
	 * @var Tx_JdavSv_Domain_Model_Category
	 */
	protected $category;



	/**
	 * If set to true, prerequisite is required
	 *
	 * @var boolean
	 */
	protected $required;


	
	/**
	 * Holds a shortcut for a category
	 *
	 * @var string
	 */
	protected $shortcut;



	/**
	 * Description of prerequisite
	 *
	 * @var string
	 */
	protected $title;



	/**
	 * Holds description for prerequisite
	 *
	 * @var string
	 */
	protected $description;



	/**
	 * @var int
	 */
	protected $sorting;



	/**
	 * If set to true, prerequisite is for internal use only
	 *
	 * @var boolean
	 */
	protected $internal;



	/**
	 * @param \Tx_JdavSv_Domain_Model_Category $category
	 */
	public function setCategory($category) {
		$this->category = $category;
	}



	/**
	 * @return \Tx_JdavSv_Domain_Model_Category
	 */
	public function getCategory() {
		return $this->category;
	}



	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}



	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}



	/**
	 * @param boolean $required
	 */
	public function setRequired($required) {
		$this->required = $required;
	}



	/**
	 * @return boolean
	 */
	public function getRequired() {
		return $this->required;
	}



	/**
	 * @param string $shortcut
	 */
	public function setShortcut($shortcut) {
		$this->shortcut = $shortcut;
	}



	/**
	 * @return string
	 */
	public function getShortcut() {
		return $this->shortcut;
	}



	/**
	 * @param int $sorting
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}



	/**
	 * @return int
	 */
	public function getSorting() {
		return $this->sorting;
	}



	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}



	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}



	/**
	 * @param boolean $internal
	 */
	public function setInternal($internal) {
		$this->internal = $internal;
	}



	/**
	 * @return boolean
	 */
	public function getInternal() {
		return $this->internal;
	}



	/**
	 * Returns TRUE if prerequisite is not internal
	 *
	 * @return boolean
	 */
	public function getNotInternal() {
		return !$this->getInternal();
	}

}
?>