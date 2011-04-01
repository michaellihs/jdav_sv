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
 * Testcase for class Tx_JdavSv_Domain_Model_Event.
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
class Tx_JdavSv_Domain_Model_EventTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_JdavSv_Domain_Model_Event
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_JdavSv_Domain_Model_Event();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() { 
		$this->fixture->setTitel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitel()
		);
	}
	
	/**
	 * @test
	 */
	public function getSubtitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSubtitleForStringSetsSubtitle() { 
		$this->fixture->setSubtitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSubtitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getDateStartReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDateStartForDateTimeSetsDateStart() { }
	
	/**
	 * @test
	 */
	public function getDateEndReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDateEndForDateTimeSetsDateEnd() { }
	
	/**
	 * @test
	 */
	public function getDurationReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getDuration()
		);
	}

	/**
	 * @test
	 */
	public function setDurationForFloatSetsDuration() { 
		$this->fixture->setDuration(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getDuration()
		);
	}
	
	/**
	 * @test
	 */
	public function getPlaceReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setPlaceForStringSetsPlace() { 
		$this->fixture->setPlace('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getPlace()
		);
	}
	
	/**
	 * @test
	 */
	public function getTravellingReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTravellingForStringSetsTravelling() { 
		$this->fixture->setTravelling('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTravelling()
		);
	}
	
	/**
	 * @test
	 */
	public function getAccreditationNumberReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAccreditationNumberForStringSetsAccreditationNumber() { 
		$this->fixture->setAccreditationNumber('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAccreditationNumber()
		);
	}
	
	/**
	 * @test
	 */
	public function getRequirementsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setRequirementsForStringSetsRequirements() { 
		$this->fixture->setRequirements('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getRequirements()
		);
	}
	
	/**
	 * @test
	 */
	public function getContentsReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setContentsForStringSetsContents() { 
		$this->fixture->setContents('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getContents()
		);
	}
	
	/**
	 * @test
	 */
	public function getEducationObjectiveReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setEducationObjectiveForStringSetsEducationObjective() { 
		$this->fixture->setEducationObjective('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getEducationObjective()
		);
	}
	
	/**
	 * @test
	 */
	public function getFirstTeamerReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getFirstTeamer()
		);
	}

	/**
	 * @test
	 */
	public function setFirstTeamerForIntegerSetsFirstTeamer() { 
		$this->fixture->setFirstTeamer(12);

		$this->assertSame(
			12,
			$this->fixture->getFirstTeamer()
		);
	}
	
	/**
	 * @test
	 */
	public function getSecondTeamerReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getSecondTeamer()
		);
	}

	/**
	 * @test
	 */
	public function setSecondTeamerForIntegerSetsSecondTeamer() { 
		$this->fixture->setSecondTeamer(12);

		$this->assertSame(
			12,
			$this->fixture->getSecondTeamer()
		);
	}
	
	/**
	 * @test
	 */
	public function getTraineeReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getTrainee()
		);
	}

	/**
	 * @test
	 */
	public function setTraineeForIntegerSetsTrainee() { 
		$this->fixture->setTrainee(12);

		$this->assertSame(
			12,
			$this->fixture->getTrainee()
		);
	}
	
	/**
	 * @test
	 */
	public function getKitchenGroupReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getKitchenGroup()
		);
	}

	/**
	 * @test
	 */
	public function setKitchenGroupForIntegerSetsKitchenGroup() { 
		$this->fixture->setKitchenGroup(12);

		$this->assertSame(
			12,
			$this->fixture->getKitchenGroup()
		);
	}
	
	/**
	 * @test
	 */
	public function getPriceReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getPrice()
		);
	}

	/**
	 * @test
	 */
	public function setPriceForFloatSetsPrice() { 
		$this->fixture->setPrice(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getPrice()
		);
	}
	
	/**
	 * @test
	 */
	public function getMaxRegistrationsReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getMaxRegistrations()
		);
	}

	/**
	 * @test
	 */
	public function setMaxRegistrationsForIntegerSetsMaxRegistrations() { 
		$this->fixture->setMaxRegistrations(12);

		$this->assertSame(
			12,
			$this->fixture->getMaxRegistrations()
		);
	}
	
	/**
	 * @test
	 */
	public function getMinRegistrationsReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getMinRegistrations()
		);
	}

	/**
	 * @test
	 */
	public function setMinRegistrationsForIntegerSetsMinRegistrations() { 
		$this->fixture->setMinRegistrations(12);

		$this->assertSame(
			12,
			$this->fixture->getMinRegistrations()
		);
	}
	
	/**
	 * @test
	 */
	public function getAttTeamerRatioReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAttTeamerRatioForStringSetsAttTeamerRatio() { 
		$this->fixture->setAttTeamerRatio('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAttTeamerRatio()
		);
	}
	
	/**
	 * @test
	 */
	public function getAnnouncementReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAnnouncementForStringSetsAnnouncement() { 
		$this->fixture->setAnnouncement('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAnnouncement()
		);
	}
	
	/**
	 * @test
	 */
	public function getTourReportRequiredReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getTourReportRequired()
		);
	}

	/**
	 * @test
	 */
	public function setTourReportRequiredForBooleanSetsTourReportRequired() { 
		$this->fixture->setTourReportRequired(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getTourReportRequired()
		);
	}
	
	/**
	 * @test
	 */
	public function getRegistrationDeadlineReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setRegistrationDeadlineForDateTimeSetsRegistrationDeadline() { }
	
	/**
	 * @test
	 */
	public function getAccomodationReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_Accommodation() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getAccomodation()
		);
	}

	/**
	 * @test
	 */
	public function setAccomodationForObjectStorageContainingTx_JdavSv_Domain_Model_AccommodationSetsAccomodation() { 
		$accomodation = new Tx_JdavSv_Domain_Model_Accommodation();
		$objectStorageHoldingExactlyOneAccomodation = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneAccomodation->attach($accomodation);
		$this->fixture->setAccomodation($objectStorageHoldingExactlyOneAccomodation);

		$this->assertSame(
			$objectStorageHoldingExactlyOneAccomodation,
			$this->fixture->getAccomodation()
		);
	}
	
	/**
	 * @test
	 */
	public function addAccomodationToObjectStorageHoldingAccomodation() {
		$accomodation = new Tx_JdavSv_Domain_Model_Accommodation();
		$objectStorageHoldingExactlyOneAccomodation = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneAccomodation->attach($accomodation);
		$this->fixture->addAccomodation($accomodation);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneAccomodation,
			$this->fixture->getAccomodation()
		);
	}

	/**
	 * @test
	 */
	public function removeAccomodationFromObjectStorageHoldingAccomodation() {
		$accomodation = new Tx_JdavSv_Domain_Model_Accommodation();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($accomodation);
		$localObjectStorage->detach($accomodation);
		$this->fixture->addAccomodation($accomodation);
		$this->fixture->removeAccomodation($accomodation);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getAccomodation()
		);
	}
	
	/**
	 * @test
	 */
	public function getCateringReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_Catering() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCatering()
		);
	}

	/**
	 * @test
	 */
	public function setCateringForObjectStorageContainingTx_JdavSv_Domain_Model_CateringSetsCatering() { 
		$catering = new Tx_JdavSv_Domain_Model_Catering();
		$objectStorageHoldingExactlyOneCatering = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCatering->attach($catering);
		$this->fixture->setCatering($objectStorageHoldingExactlyOneCatering);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCatering,
			$this->fixture->getCatering()
		);
	}
	
	/**
	 * @test
	 */
	public function addCateringToObjectStorageHoldingCatering() {
		$catering = new Tx_JdavSv_Domain_Model_Catering();
		$objectStorageHoldingExactlyOneCatering = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneCatering->attach($catering);
		$this->fixture->addCatering($catering);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCatering,
			$this->fixture->getCatering()
		);
	}

	/**
	 * @test
	 */
	public function removeCateringFromObjectStorageHoldingCatering() {
		$catering = new Tx_JdavSv_Domain_Model_Catering();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($catering);
		$localObjectStorage->detach($catering);
		$this->fixture->addCatering($catering);
		$this->fixture->removeCatering($catering);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCatering()
		);
	}
	
	/**
	 * @test
	 */
	public function getStateReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_EventState() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getState()
		);
	}

	/**
	 * @test
	 */
	public function setStateForObjectStorageContainingTx_JdavSv_Domain_Model_EventStateSetsState() { 
		$state = new Tx_JdavSv_Domain_Model_EventState();
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
		$state = new Tx_JdavSv_Domain_Model_EventState();
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
		$state = new Tx_JdavSv_Domain_Model_EventState();
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
	
	/**
	 * @test
	 */
	public function getRegistrationsReturnsInitialValueForTx_JdavSv_Domain_Model_Registration() { }

	/**
	 * @test
	 */
	public function setRegistrationsForTx_JdavSv_Domain_Model_RegistrationSetsRegistrations() { }
	
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
	public function getFeeReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_EventFee() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getFee()
		);
	}

	/**
	 * @test
	 */
	public function setFeeForObjectStorageContainingTx_JdavSv_Domain_Model_EventFeeSetsFee() { 
		$fee = new Tx_JdavSv_Domain_Model_EventFee();
		$objectStorageHoldingExactlyOneFee = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneFee->attach($fee);
		$this->fixture->setFee($objectStorageHoldingExactlyOneFee);

		$this->assertSame(
			$objectStorageHoldingExactlyOneFee,
			$this->fixture->getFee()
		);
	}
	
	/**
	 * @test
	 */
	public function addFeeToObjectStorageHoldingFee() {
		$fee = new Tx_JdavSv_Domain_Model_EventFee();
		$objectStorageHoldingExactlyOneFee = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneFee->attach($fee);
		$this->fixture->addFee($fee);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneFee,
			$this->fixture->getFee()
		);
	}

	/**
	 * @test
	 */
	public function removeFeeFromObjectStorageHoldingFee() {
		$fee = new Tx_JdavSv_Domain_Model_EventFee();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($fee);
		$localObjectStorage->detach($fee);
		$this->fixture->addFee($fee);
		$this->fixture->removeFee($fee);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getFee()
		);
	}
	
}
?>