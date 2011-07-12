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
*  the Free Software Foundation; either version 2 of the License, or
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
 * Testcase for class Tx_JdavSv_Domain_Model_EventCategoryRegistrationState.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage JDAV Schulungsverwaltung
 * 
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Domain_Model_EventCategoryRegistrationStateTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_JdavSv_Domain_Model_EventCategoryRegistrationState
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_JdavSv_Domain_Model_EventCategoryRegistrationState();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_Category() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForObjectStorageContainingTx_JdavSv_Domain_Model_CategorySetsCategory() { 
		$category = new Tx_JdavSv_Domain_Model_Category();
		$objectStorageHoldingExactlyOneCategory = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->setCategory($objectStorageHoldingExactlyOneCategory);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategory()
		);
	}
	
	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategory() {
		$category = new Tx_JdavSv_Domain_Model_Category();
		$objectStorageHoldingExactlyOneCategory = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->addCategory($category);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory() {
		$category = new Tx_JdavSv_Domain_Model_Category();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($category);
		$localObjectStorage->detach($category);
		$this->fixture->addCategory($category);
		$this->fixture->removeCategory($category);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCategory()
		);
	}
	
	/**
	 * @test
	 */
	public function getStateReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_RegistrationState() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getState()
		);
	}

	/**
	 * @test
	 */
	public function setStateForObjectStorageContainingTx_JdavSv_Domain_Model_RegistrationStateSetsState() { 
		$state = new Tx_JdavSv_Domain_Model_RegistrationState();
		$objectStorageHoldingExactlyOneState = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneState->attach($state);
		$this->fixture->setState($objectStorageHoldingExactlyOneState);

		$this->assertSame(
			$objectStorageHoldingExactlyOneState,
			$this->fixture->getState()
		);
	}
	
	/**
	 * @test
	 */
	public function addStateToObjectStorageHoldingState() {
		$state = new Tx_JdavSv_Domain_Model_RegistrationState();
		$objectStorageHoldingExactlyOneState = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneState->attach($state);
		$this->fixture->addState($state);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneState,
			$this->fixture->getState()
		);
	}

	/**
	 * @test
	 */
	public function removeStateFromObjectStorageHoldingState() {
		$state = new Tx_JdavSv_Domain_Model_RegistrationState();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($state);
		$localObjectStorage->detach($state);
		$this->fixture->addState($state);
		$this->fixture->removeState($state);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getState()
		);
	}
	
}
?>