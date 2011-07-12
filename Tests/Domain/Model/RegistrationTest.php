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
 * Testcase for class Tx_JdavSv_Domain_Model_Registration.
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
class Tx_JdavSv_Domain_Model_RegistrationTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_JdavSv_Domain_Model_Registration
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_JdavSv_Domain_Model_Registration();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getDateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDateForDateTimeSetsDate() { }
	
	/**
	 * @test
	 */
	public function getAttendeeReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getAttendee()
		);
	}

	/**
	 * @test
	 */
	public function setAttendeeForIntegerSetsAttendee() { 
		$this->fixture->setAttendee(12);

		$this->assertSame(
			12,
			$this->fixture->getAttendee()
		);
	}
	
	/**
	 * @test
	 */
	public function getReservedUntilReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setReservedUntilForDateTimeSetsReservedUntil() { }
	
	/**
	 * @test
	 */
	public function getWaitingListReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getWaitingList()
		);
	}

	/**
	 * @test
	 */
	public function setWaitingListForBooleanSetsWaitingList() { 
		$this->fixture->setWaitingList(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getWaitingList()
		);
	}
	
	/**
	 * @test
	 */
	public function getRegistrationOrderReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getRegistrationOrder()
		);
	}

	/**
	 * @test
	 */
	public function setRegistrationOrderForIntegerSetsRegistrationOrder() { 
		$this->fixture->setRegistrationOrder(12);

		$this->assertSame(
			12,
			$this->fixture->getRegistrationOrder()
		);
	}
	
	/**
	 * @test
	 */
	public function getVegetarianReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getVegetarian()
		);
	}

	/**
	 * @test
	 */
	public function setVegetarianForBooleanSetsVegetarian() { 
		$this->fixture->setVegetarian(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getVegetarian()
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
	
	/**
	 * @test
	 */
	public function getPaymentMethodReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_PaymentMethods() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getPaymentMethod()
		);
	}

	/**
	 * @test
	 */
	public function setPaymentMethodForObjectStorageContainingTx_JdavSv_Domain_Model_PaymentMethodsSetsPaymentMethod() { 
		$paymentMethod = new Tx_JdavSv_Domain_Model_PaymentMethods();
		$objectStorageHoldingExactlyOnePaymentMethod = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePaymentMethod->attach($paymentMethod);
		$this->fixture->setPaymentMethod($objectStorageHoldingExactlyOnePaymentMethod);

		$this->assertSame(
			$objectStorageHoldingExactlyOnePaymentMethod,
			$this->fixture->getPaymentMethod()
		);
	}
	
	/**
	 * @test
	 */
	public function addPaymentMethodToObjectStorageHoldingPaymentMethod() {
		$paymentMethod = new Tx_JdavSv_Domain_Model_PaymentMethods();
		$objectStorageHoldingExactlyOnePaymentMethod = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOnePaymentMethod->attach($paymentMethod);
		$this->fixture->addPaymentMethod($paymentMethod);

		$this->assertEquals(
			$objectStorageHoldingExactlyOnePaymentMethod,
			$this->fixture->getPaymentMethod()
		);
	}

	/**
	 * @test
	 */
	public function removePaymentMethodFromObjectStorageHoldingPaymentMethod() {
		$paymentMethod = new Tx_JdavSv_Domain_Model_PaymentMethods();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($paymentMethod);
		$localObjectStorage->detach($paymentMethod);
		$this->fixture->addPaymentMethod($paymentMethod);
		$this->fixture->removePaymentMethod($paymentMethod);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getPaymentMethod()
		);
	}
	
	/**
	 * @test
	 */
	public function getEventReturnsInitialValueForObjectStorageContainingTx_JdavSv_Domain_Model_Event() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getEvent()
		);
	}

	/**
	 * @test
	 */
	public function setEventForObjectStorageContainingTx_JdavSv_Domain_Model_EventSetsEvent() { 
		$event = new Tx_JdavSv_Domain_Model_Event();
		$objectStorageHoldingExactlyOneEvent = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneEvent->attach($event);
		$this->fixture->setEvent($objectStorageHoldingExactlyOneEvent);

		$this->assertSame(
			$objectStorageHoldingExactlyOneEvent,
			$this->fixture->getEvent()
		);
	}
	
	/**
	 * @test
	 */
	public function addEventToObjectStorageHoldingEvent() {
		$event = new Tx_JdavSv_Domain_Model_Event();
		$objectStorageHoldingExactlyOneEvent = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneEvent->attach($event);
		$this->fixture->addEvent($event);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneEvent,
			$this->fixture->getEvent()
		);
	}

	/**
	 * @test
	 */
	public function removeEventFromObjectStorageHoldingEvent() {
		$event = new Tx_JdavSv_Domain_Model_Event();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($event);
		$localObjectStorage->detach($event);
		$this->fixture->addEvent($event);
		$this->fixture->removeEvent($event);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getEvent()
		);
	}
	
}
?>