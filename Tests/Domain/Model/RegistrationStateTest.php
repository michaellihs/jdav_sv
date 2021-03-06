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
 * Testcase for class Tx_JdavSv_Domain_Model_RegistrationState.
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
class Tx_JdavSv_Domain_Model_RegistrationStateTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_JdavSv_Domain_Model_RegistrationState
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_JdavSv_Domain_Model_RegistrationState();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getIsRequiredReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getIsRequired()
		);
	}

	/**
	 * @test
	 */
	public function setIsRequiredForBooleanSetsIsRequired() { 
		$this->fixture->setIsRequired(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getIsRequired()
		);
	}
	
	/**
	 * @test
	 */
	public function getIsExternalReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getIsExternal()
		);
	}

	/**
	 * @test
	 */
	public function setIsExternalForBooleanSetsIsExternal() { 
		$this->fixture->setIsExternal(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getIsExternal()
		);
	}
	
	/**
	 * @test
	 */
	public function getIsInternalReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getIsInternal()
		);
	}

	/**
	 * @test
	 */
	public function setIsInternalForBooleanSetsIsInternal() { 
		$this->fixture->setIsInternal(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getIsInternal()
		);
	}
	
	/**
	 * @test
	 */
	public function getPrerequisitesReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getPrerequisites()
		);
	}

	/**
	 * @test
	 */
	public function setPrerequisitesForObjectStorageContainingTx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisitesSetsPrerequisites() { 
		$prerequisite = new Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites();
		$objectStorageHoldingExactlyOnePrerequisites = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePrerequisites->attach($prerequisite);
		$this->fixture->setPrerequisites($objectStorageHoldingExactlyOnePrerequisites);

		$this->assertSame(
			$objectStorageHoldingExactlyOnePrerequisites,
			$this->fixture->getPrerequisites()
		);
	}
	
	/**
	 * @test
	 */
	public function addPrerequisiteToObjectStorageHoldingPrerequisites() {
		$prerequisite = new Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites();
		$objectStorageHoldingExactlyOnePrerequisite = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePrerequisite->attach($prerequisite);
		$this->fixture->addPrerequisite($prerequisite);

		$this->assertEquals(
			$objectStorageHoldingExactlyOnePrerequisite,
			$this->fixture->getPrerequisites()
		);
	}

	/**
	 * @test
	 */
	public function removePrerequisiteFromObjectStorageHoldingPrerequisites() {
		$prerequisite = new Tx_JdavSv_Domain_Model_RegistrationStateTransitionPrerequisites();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($prerequisite);
		$localObjectStorage->detach($prerequisite);
		$this->fixture->addPrerequisite($prerequisite);
		$this->fixture->removePrerequisite($prerequisite);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getPrerequisites()
		);
	}
	
}
?>