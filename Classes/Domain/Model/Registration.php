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
 * Registration
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_JdavSv_Domain_Model_Registration extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * When was registration made
	 *
	 * @var DateTime $date
	 */
	protected $date;



	/**
	 * Person that made registration
	 *
	 * @var Tx_JdavSv_Domain_Model_FeUser $attendee
	 */
	protected $attendee;



	/**
	 * If Registration is reservation only, this is the time, reservation ends
	 *
	 * @var DateTime $reservedUntil
	 */
	protected $reservedUntil;



	/**
	 * Registration is for waiting list only
	 *
	 * @var boolean $waitingList
	 */
	protected $waitingList;



	/**
	 * Sorting of registration compared to other registrations
	 *
	 * @var integer $registrationOrder
	 */
	protected $registrationOrder;



	/**
	 * Is attendee a vegetarian
	 *
	 * @var boolean $vegetarian
	 */
	protected $vegetarian;



	/**
	 * Event, registration belongs to
	 *
	 * @var Tx_JdavSv_Domain_Model_Event $event
	 */
	protected $event;



	/**
	 * Set to true, if registration is approved and accepted
	 *
	 * @var boolean
	 */
	protected $isAccepted;



	/**
	 * Internal comment for registration
	 *
	 * @var string
	 */
	protected $comment;



	/**
	 * If set to true, registration is reservation
	 *
	 * @var boolean
	 */
	protected $isReservation;



	/**
	 * If set to true, user has paid for registration
	 *
	 * @var boolean
	 */
	protected $paid;



	/**
	 * If set to true, the confirmation of registration has been sent
	 *
	 * @var boolean
	 */
	protected $registrationConfirmationSent;



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

	}



	/**
	 * Setter for date
	 *
	 * @param DateTime $date When was registration made
	 * @return void
	 */
	public function setDate(DateTime $date) {
		$this->date = $date;
	}



	/**
	 * Getter for date
	 *
	 * @return DateTime When was registration made
	 */
	public function getDate() {
		return $this->date;
	}



	/**
	 * Setter for attendee
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $attendee Person that made registration
	 * @return void
	 */
	public function setAttendee(Tx_JdavSv_Domain_Model_FeUser $attendee) {
		$this->attendee = $attendee;
	}



	/**
	 * Getter for attendee
	 *
	 * @return Tx_JdavSv_Domain_Model_FeUser Person that made registration
	 */
	public function getAttendee() {
		return $this->attendee;
	}



	/**
	 * Setter for reservedUntil
	 *
	 * @param DateTime $reservedUntil If Registration is reservation only, this is the time, reservation ends
	 * @return void
	 */
	public function setReservedUntil(DateTime $reservedUntil) {
		$this->reservedUntil = $reservedUntil;
	}



	/**
	 * Getter for reservedUntil
	 *
	 * @return DateTime If Registration is reservation only, this is the time, reservation ends
	 */
	public function getReservedUntil() {
		return $this->reservedUntil;
	}



	/**
	 * Setter for waitingList
	 *
	 * @param boolean $waitingList Registration is for waiting list only
	 * @return void
	 */
	public function setWaitingList($waitingList) {
		$this->waitingList = $waitingList;
	}



	/**
	 * Getter for waitingList
	 *
	 * @return boolean Registration is for waiting list only
	 */
	public function getWaitingList() {
		return $this->waitingList;
	}



	/**
	 * Returns the state of waitingList
	 *
	 * @return boolean the state of waitingList
	 */
	public function isWaitingList() {
		return $this->getWaitingList();
	}



	/**
	 * Setter for registrationOrder
	 *
	 * @param integer $registrationOrder Sorting of registration compared to other registrations
	 * @return void
	 */
	public function setRegistrationOrder($registrationOrder) {
		$this->registrationOrder = $registrationOrder;
	}



	/**
	 * Getter for registrationOrder
	 *
	 * @return integer Sorting of registration compared to other registrations
	 */
	public function getRegistrationOrder() {
		return $this->registrationOrder;
	}



	/**
	 * Setter for vegetarian
	 *
	 * @param boolean $vegetarian Is attendee a vegetarian
	 * @return void
	 */
	public function setVegetarian($vegetarian) {
		$this->vegetarian = $vegetarian;
	}



	/**
	 * Getter for vegetarian
	 *
	 * @return boolean Is attendee a vegetarian
	 */
	public function getVegetarian() {
		return $this->vegetarian;
	}



	/**
	 * Returns the state of vegetarian
	 *
	 * @return boolean the state of vegetarian
	 */
	public function isVegetarian() {
		return $this->getVegetarian();
	}



	/**
	 * Setter for event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event Event, registration belongs to
	 * @return void
	 */
	public function setEvent(Tx_JdavSv_Domain_Model_Event $event) {
		$this->event = $event;
	}



	/**
	 * Getter for event
	 *
	 * @return Tx_JdavSv_Domain_Model_Event Event, registration belongs to
	 */
	public function getEvent() {
		return $this->event;
	}



	/**
	 * Getter for isAccepted property.
	 *
	 * Returns true, if registration has been approved and is accepted
	 *
	 * @return boolean
	 */
	public function getIsAccepted() {
		return $this->isAccepted;
	}



	/**
	 * Setter for isAccepted property.
	 *
	 * Set this property to true, if registration has been approved and is accepted.
	 *
	 * @param boolean $isAccepted
	 */
	public function setIsAccepted($isAccepted) {
		$this->isAccepted = $isAccepted;
	}



	/**
	 * Returns an array of ALL prerequisites for this registration.
	 *
	 * PrerequisitesFulfillments will be flagged with 'isFulfilled' if prerequisite is already
	 * fulfilled. Non-fulfilled prerequisites will have isFulfilled=false.
	 *
	 * @return array
	 */
	public function getAllPrerequisiteFulfillments() {
		// All prerequisites for event-category of attached event
		$prerequisites = $this->event->getCategory()->getPrerequisites();
		$categoryFulfillmentRepository = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager')->get('Tx_JdavSv_Domain_Repository_CategoryPrerequisiteFulfillmentRepository');
		/* @var $categoryFulfillmentRepository Tx_JdavSv_Domain_Repository_CategoryPrerequisiteFulfillmentRepository*/
		$fulfilledPrerequisites = $categoryFulfillmentRepository->findByRegistration($this);

		$fulfilledPrerequisitesMap = array();
		foreach ($fulfilledPrerequisites as $fulfilledPrerequisite) {
			/* @var $fulfilledPrerequisite Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment */
			$fulfilledPrerequisitesMap[$fulfilledPrerequisite->getPrerequisite()->getUid()] = $fulfilledPrerequisite;
		}

		$allPrerequisites = array();
		foreach ($prerequisites as $prerequisite) {
			/* @var $prerequisite Tx_JdavSv_Domain_Model_CategoryPrerequisite */
			if (array_key_exists($prerequisite->getUid(), $fulfilledPrerequisitesMap)) {
				$allPrerequisites[] = $fulfilledPrerequisitesMap[$prerequisite->getUid()];
			} else {
				$prerequisiteFulfillment = new Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment();
				$prerequisiteFulfillment->setRegistration($this);
				$prerequisiteFulfillment->setPrerequisite($prerequisite);
				$prerequisiteFulfillment->setIsFulfilled(false);
				$allPrerequisites[] = $prerequisiteFulfillment;
			}
		}

		#echo '<pre>';
		#var_dump($allPrerequisites);
		#echo '</pre>';

		return $allPrerequisites;
	}



	/**
	 * Sets fulfillments of prerequisites by an array with following format:
	 *
	 *  array
	 *  1 => string '1'
	 *  2 => string '1'
	 *  3 => string '1'
	 *
	 * where key is uid of fulfillment and value is equal to '1' if fulfillment is fullfilled
	 *
	 * @param array $prerequisitesFulfillmentsArray
	 */
	public function setCategoryPrerequisiteFulfillmentsByArgumentsArray(array $prerequisitesFulfillmentsArray) {
		// All prerequisites for event-category of attached event
		$prerequisites = $this->event->getCategory()->getPrerequisites();
		$categoryFulfillmentRepository = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager')->get('Tx_JdavSv_Domain_Repository_CategoryPrerequisiteFulfillmentRepository');
		/* @var $categoryFulfillmentRepository Tx_JdavSv_Domain_Repository_CategoryPrerequisiteFulfillmentRepository*/
		$fulfilledPrerequisites = $categoryFulfillmentRepository->findByRegistration($this);

		$fulfilledPrerequisitesMap = array();
		foreach ($fulfilledPrerequisites as $fulfilledPrerequisite) {
			/* @var $fulfilledPrerequisite Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment */
			// Reset old prerequisite fulfillements
			$fulfilledPrerequisite->setIsFulfilled(FALSE);
			$fulfilledPrerequisitesMap[$fulfilledPrerequisite->getPrerequisite()->getUid()] = $fulfilledPrerequisite;
		}

		foreach ($prerequisites as $prerequisite) {
			/* @var $prerequisite Tx_JdavSv_Domain_Model_CategoryPrerequisite */
			if (array_key_exists($prerequisite->getUid(), $prerequisitesFulfillmentsArray)
					&& intval($prerequisitesFulfillmentsArray[$prerequisite->getUid()]) === 1
			) {
				if (array_key_exists($prerequisite->getUid(), $fulfilledPrerequisitesMap)) {
					// First case: Fulfillment already existed
					$prerequisiteFulfillment = $fulfilledPrerequisitesMap[$prerequisite->getUid()];
					$prerequisiteFulfillment->setIsFulfilled(TRUE);
					$categoryFulfillmentRepository->update($prerequisiteFulfillment);
				} else {
					// Second case: Fulfillment does not already exist
					$prerequisiteFulfillment = new Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment();
					$prerequisiteFulfillment->setRegistration($this);
					$prerequisiteFulfillment->setPrerequisite($prerequisite);
					$prerequisiteFulfillment->setIsFulfilled(TRUE);
					$categoryFulfillmentRepository->add($prerequisiteFulfillment);
				}
			} else {
				// Second case: Fulfillment is NOT fulfilled in current request
				if (array_key_exists($prerequisite->getUid(), $fulfilledPrerequisitesMap)) {
					// We delete already existing fulfillment
					$categoryFulfillmentRepository->remove($fulfilledPrerequisitesMap[$prerequisite->getUid()]);
				}
			}
		}
	}



	/**
	 * Returns true, if all prerequisites for this registration are fulfilled
	 *
	 * @return bool
	 */
	public function getAllPrerequisitesAreFulfilled() {
		$allPrerequisistesAreFulfilled = TRUE;
		foreach ($this->getAllPrerequisiteFulfillments() as $prerequisiteFulfillment) {
			/* @var $prerequisiteFulfillment Tx_JdavSv_Domain_Model_CategoryPrerequisiteFulfillment */
			$allPrerequisistesAreFulfilled = ($allPrerequisistesAreFulfilled && $prerequisiteFulfillment->getIsFulfilled());
		}
		return $allPrerequisistesAreFulfilled;
	}



	/**
	 * Returns true, if not all prerequisites for this registration are fulfilled
	 *
	 * @return bool
	 */
	public function getNotAllPrerequisitesAreFulfilled() {
		return !($this->getAllPrerequisitesAreFulfilled());
	}



	/**
	 * A registration is finished, if all prerequisites are fulfilled and it is paid and accepted
	 *
	 * @return bool
	 */
	public function getIsFinished() {
		$isFinished = ($this->getAllPrerequisitesAreFulfilled() && $this->paid);
		return $isFinished;
	}



	/**
	 * A registration is not finished, if prerequisites are not fulfilled or it is not paid
	 *
	 * @return bool
	 */
	public function getIsNotFinished() {
		return !($this->getIsFinished());
	}



	/**
	 * Returns true, if
	 * - registration is accepted
	 * - all prerequisites are fulfilled
	 * - is not waiting list registration
	 *
	 * @return bool
	 */
	public function getIsConfirmed() {
		return ($this->getAllPrerequisitesAreFulfilled() && !$this->waitingList && $this->isAccepted);
	}



	/**
	 * Returns true, if registration is accepted and not waiting list
	 *
	 * @return bool
	 */
	public function getIsAcceptedAndNotOnWaitinglist() {
		return ($this->isAccepted && !$this->isWaitingList());
	}



	/**
	 * Returns true, if registration is reservation only
	 *
	 * - not yet accepted
	 * - not on waiting list
	 *
	 * @return bool
	 */
	public function getIsReservationOnly() {
		return !($this->isWaitingList() || $this->isAccepted);
	}



	/**
	 * @param string $comment
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}



	/**
	 * @return string
	 */
	public function getComment() {
		return $this->comment;
	}



	/**
	 * @param boolean $isReservation
	 */
	public function setIsReservation($isReservation) {
		$this->isReservation = $isReservation;
	}



	/**
	 * @return boolean
	 */
	public function getIsReservation() {
		return $this->isReservation;
	}



	/**
	 * @param boolean $paid
	 */
	public function setPaid($paid) {
		$this->paid = $paid;
	}



	/**
	 * @return boolean
	 */
	public function getPaid() {
		return $this->paid;
	}



	/**
	 * @param boolean $registrationConfirmationSent
	 */
	public function setRegistrationConfirmationSent($registrationConfirmationSent) {
		$this->registrationConfirmationSent = $registrationConfirmationSent;
	}



	/**
	 * @return boolean
	 */
	public function getRegistrationConfirmationSent() {
		return $this->registrationConfirmationSent;
	}

}
?>