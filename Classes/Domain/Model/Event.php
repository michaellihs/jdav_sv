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
 * Event
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Domain_Model_Event extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Event's title
	 *
	 * @var string $title
	 */
	protected $title;

	/**
	 * Event's subtitle
	 *
	 * @var string $subtitle
	 */
	protected $subtitle;

	/**
	 * Event's description
	 *
	 * @var string $description
	 */
	protected $description;

	/**
	 * When does event start
	 *
	 * @var DateTime $dateStart
	 */
	protected $dateStart;

	/**
	 * When does event end
	 *
	 * @var DateTime $dateEnd
	 */
	protected $dateEnd;

	/**
	 * Length of event (in days)
	 *
	 * @var float $duration
	 */
	protected $duration;

	/**
	 * Where does event take place
	 *
	 * @var string $place
	 */
	protected $place;

	/**
	 * How is the place reached where event takes place
	 *
	 * @var string $travelling
	 */
	protected $travelling;

	/**
	 * Internal identifier for event
	 *
	 * @var string $accreditationNumber
	 */
	protected $accreditationNumber;

	/**
	 * Requirements to be fullfilled for attending event
	 *
	 * @var string $requirements
	 */
	protected $requirements;

	/**
	 * Contents of event
	 *
	 * @var string $contents
	 */
	protected $contents;

	/**
	 * What is to be learned during event
	 *
	 * @var string $educationObjective
	 */
	protected $educationObjective;

	/**
	 * First teamer for event
	 *
	 * @var integer $firstTeamer
	 */
	protected $firstTeamer;

	/**
	 * Second teamer for event
	 *
	 * @var integer $secondTeamer
	 */
	protected $secondTeamer;

	/**
	 * Hospitant for event
	 *
	 * @var integer $trainee
	 */
	protected $trainee;

	/**
	 * Kitchen group for event
	 *
	 * @var integer $kitchenGroup
	 */
	protected $kitchenGroup;

	/**
	 * Price of event
	 *
	 * @var float $price
	 */
	protected $price;

	/**
	 * Maximum number of registrations
	 *
	 * @var integer $maxRegistrations
	 */
	protected $maxRegistrations;

	/**
	 * Minimum number of registrations
	 *
	 * @var integer $minRegistrations
	 */
	protected $minRegistrations;

	/**
	 * Ration of teamers / attendee
	 *
	 * @var string $attTeamerRatio
	 */
	protected $attTeamerRatio;

	/**
	 * Text for announcing the event
	 *
	 * @var string $announcement
	 */
	protected $announcement;

	/**
	 * Is it required to send a tour report for attending
	 *
	 * @var boolean $tourReportRequired
	 */
	protected $tourReportRequired;

	/**
	 * Last date for registration
	 *
	 * @var DateTime $registrationDeadline
	 */
	protected $registrationDeadline;

	/**
	 * Accommodation for event (Huette / Haus...)
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Accommodation> $accomodation
	 */
	protected $accomodation;

	/**
	 * Selbstverpflegung / Halb- / Vollpension
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Catering> $catering
	 */
	protected $catering;

	/**
	 * State the event is in
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_EventState> $state
	 */
	protected $state;

	/**
	 * fee
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_EventFee> $fee
	 */
	protected $fee;

	/**
	 * category
	 *
	 * @var Tx_JdavSv_Domain_Model_Category $category
	 */
	protected $category;

	/**
	 * registrations
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Registration> $registrations
	 */
	protected $registrations;

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
		$this->accomodation = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->catering = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->state = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->fee = new Tx_Extbase_Persistence_ObjectStorage();
		
		$this->registrations = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Setter for title
	 *
	 * @param string $title Event's title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Getter for title
	 *
	 * @return string Event's title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Setter for subtitle
	 *
	 * @param string $subtitle Event's subtitle
	 * @return void
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Getter for subtitle
	 *
	 * @return string Event's subtitle
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * Setter for description
	 *
	 * @param string $description Event's description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Getter for description
	 *
	 * @return string Event's description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Setter for dateStart
	 *
	 * @param DateTime $dateStart When does event start
	 * @return void
	 */
	public function setDateStart(DateTime $dateStart) {
		$this->dateStart = $dateStart;
	}

	/**
	 * Getter for dateStart
	 *
	 * @return DateTime When does event start
	 */
	public function getDateStart() {
		return $this->dateStart;
	}

	/**
	 * Setter for dateEnd
	 *
	 * @param DateTime $dateEnd When does event end
	 * @return void
	 */
	public function setDateEnd(DateTime $dateEnd) {
		$this->dateEnd = $dateEnd;
	}

	/**
	 * Getter for dateEnd
	 *
	 * @return DateTime When does event end
	 */
	public function getDateEnd() {
		return $this->dateEnd;
	}

	/**
	 * Setter for duration
	 *
	 * @param float $duration Length of event (in days)
	 * @return void
	 */
	public function setDuration($duration) {
		$this->duration = $duration;
	}

	/**
	 * Getter for duration
	 *
	 * @return float Length of event (in days)
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Setter for place
	 *
	 * @param string $place Where does event take place
	 * @return void
	 */
	public function setPlace($place) {
		$this->place = $place;
	}

	/**
	 * Getter for place
	 *
	 * @return string Where does event take place
	 */
	public function getPlace() {
		return $this->place;
	}

	/**
	 * Setter for travelling
	 *
	 * @param string $travelling How is the place reached where event takes place
	 * @return void
	 */
	public function setTravelling($travelling) {
		$this->travelling = $travelling;
	}

	/**
	 * Getter for travelling
	 *
	 * @return string How is the place reached where event takes place
	 */
	public function getTravelling() {
		return $this->travelling;
	}

	/**
	 * Setter for accreditationNumber
	 *
	 * @param string $accreditationNumber Internal identifier for event
	 * @return void
	 */
	public function setAccreditationNumber($accreditationNumber) {
		$this->accreditationNumber = $accreditationNumber;
	}

	/**
	 * Getter for accreditationNumber
	 *
	 * @return string Internal identifier for event
	 */
	public function getAccreditationNumber() {
		return $this->accreditationNumber;
	}

	/**
	 * Setter for requirements
	 *
	 * @param string $requirements Requirements to be fullfilled for attending event
	 * @return void
	 */
	public function setRequirements($requirements) {
		$this->requirements = $requirements;
	}

	/**
	 * Getter for requirements
	 *
	 * @return string Requirements to be fullfilled for attending event
	 */
	public function getRequirements() {
		return $this->requirements;
	}

	/**
	 * Setter for contents
	 *
	 * @param string $contents Contents of event
	 * @return void
	 */
	public function setContents($contents) {
		$this->contents = $contents;
	}

	/**
	 * Getter for contents
	 *
	 * @return string Contents of event
	 */
	public function getContents() {
		return $this->contents;
	}

	/**
	 * Setter for educationObjective
	 *
	 * @param string $educationObjective What is to be learned during event
	 * @return void
	 */
	public function setEducationObjective($educationObjective) {
		$this->educationObjective = $educationObjective;
	}

	/**
	 * Getter for educationObjective
	 *
	 * @return string What is to be learned during event
	 */
	public function getEducationObjective() {
		return $this->educationObjective;
	}

	/**
	 * Setter for firstTeamer
	 *
	 * @param integer $firstTeamer First teamer for event
	 * @return void
	 */
	public function setFirstTeamer($firstTeamer) {
		$this->firstTeamer = $firstTeamer;
	}

	/**
	 * Getter for firstTeamer
	 *
	 * @return integer First teamer for event
	 */
	public function getFirstTeamer() {
		return $this->firstTeamer;
	}

	/**
	 * Setter for secondTeamer
	 *
	 * @param integer $secondTeamer Second teamer for event
	 * @return void
	 */
	public function setSecondTeamer($secondTeamer) {
		$this->secondTeamer = $secondTeamer;
	}

	/**
	 * Getter for secondTeamer
	 *
	 * @return integer Second teamer for event
	 */
	public function getSecondTeamer() {
		return $this->secondTeamer;
	}

	/**
	 * Setter for trainee
	 *
	 * @param integer $trainee Hospitant for event
	 * @return void
	 */
	public function setTrainee($trainee) {
		$this->trainee = $trainee;
	}

	/**
	 * Getter for trainee
	 *
	 * @return integer Hospitant for event
	 */
	public function getTrainee() {
		return $this->trainee;
	}

	/**
	 * Setter for kitchenGroup
	 *
	 * @param integer $kitchenGroup Kitchen group for event
	 * @return void
	 */
	public function setKitchenGroup($kitchenGroup) {
		$this->kitchenGroup = $kitchenGroup;
	}

	/**
	 * Getter for kitchenGroup
	 *
	 * @return integer Kitchen group for event
	 */
	public function getKitchenGroup() {
		return $this->kitchenGroup;
	}

	/**
	 * Setter for price
	 *
	 * @param float $price Price of event
	 * @return void
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * Getter for price
	 *
	 * @return float Price of event
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * Setter for maxRegistrations
	 *
	 * @param integer $maxRegistrations Maximum number of registrations
	 * @return void
	 */
	public function setMaxRegistrations($maxRegistrations) {
		$this->maxRegistrations = $maxRegistrations;
	}

	/**
	 * Getter for maxRegistrations
	 *
	 * @return integer Maximum number of registrations
	 */
	public function getMaxRegistrations() {
		return $this->maxRegistrations;
	}

	/**
	 * Setter for minRegistrations
	 *
	 * @param integer $minRegistrations Minimum number of registrations
	 * @return void
	 */
	public function setMinRegistrations($minRegistrations) {
		$this->minRegistrations = $minRegistrations;
	}

	/**
	 * Getter for minRegistrations
	 *
	 * @return integer Minimum number of registrations
	 */
	public function getMinRegistrations() {
		return $this->minRegistrations;
	}

	/**
	 * Setter for attTeamerRatio
	 *
	 * @param string $attTeamerRatio Ration of teamers / attendee
	 * @return void
	 */
	public function setAttTeamerRatio($attTeamerRatio) {
		$this->attTeamerRatio = $attTeamerRatio;
	}

	/**
	 * Getter for attTeamerRatio
	 *
	 * @return string Ration of teamers / attendee
	 */
	public function getAttTeamerRatio() {
		return $this->attTeamerRatio;
	}

	/**
	 * Setter for announcement
	 *
	 * @param string $announcement Text for announcing the event
	 * @return void
	 */
	public function setAnnouncement($announcement) {
		$this->announcement = $announcement;
	}

	/**
	 * Getter for announcement
	 *
	 * @return string Text for announcing the event
	 */
	public function getAnnouncement() {
		return $this->announcement;
	}

	/**
	 * Setter for tourReportRequired
	 *
	 * @param boolean $tourReportRequired Is it required to send a tour report for attending
	 * @return void
	 */
	public function setTourReportRequired($tourReportRequired) {
		$this->tourReportRequired = $tourReportRequired;
	}

	/**
	 * Getter for tourReportRequired
	 *
	 * @return boolean Is it required to send a tour report for attending
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
	 * Setter for registrationDeadline
	 *
	 * @param DateTime $registrationDeadline Last date for registration
	 * @return void
	 */
	public function setRegistrationDeadline(DateTime $registrationDeadline) {
		$this->registrationDeadline = $registrationDeadline;
	}

	/**
	 * Getter for registrationDeadline
	 *
	 * @return DateTime Last date for registration
	 */
	public function getRegistrationDeadline() {
		return $this->registrationDeadline;
	}

	/**
	 * Setter for accomodation
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Accommodation> $accomodation Accommodation for event (Huette / Haus...)
	 * @return void
	 */
	public function setAccomodation(Tx_Extbase_Persistence_ObjectStorage $accomodation) {
		$this->accomodation = $accomodation;
	}

	/**
	 * Getter for accomodation
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Accommodation> Accommodation for event (Huette / Haus...)
	 */
	public function getAccomodation() {
		return $this->accomodation;
	}

	/**
	 * Adds a Accommodation
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation the Accommodation to be added
	 * @return void
	 */
	public function addAccomodation(Tx_JdavSv_Domain_Model_Accommodation $accomodation) {
		$this->accomodation->attach($accomodation);
	}

	/**
	 * Removes a Accommodation
	 *
	 * @param Tx_JdavSv_Domain_Model_Accommodation the Accommodation to be removed
	 * @return void
	 */
	public function removeAccomodation(Tx_JdavSv_Domain_Model_Accommodation $accomodationToRemove) {
		$this->accomodation->detach($accomodationToRemove);
	}

	/**
	 * Setter for catering
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Catering> $catering Selbstverpflegung / Halb- / Vollpension
	 * @return void
	 */
	public function setCatering(Tx_Extbase_Persistence_ObjectStorage $catering) {
		$this->catering = $catering;
	}

	/**
	 * Getter for catering
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Catering> Selbstverpflegung / Halb- / Vollpension
	 */
	public function getCatering() {
		return $this->catering;
	}

	/**
	 * Adds a Catering
	 *
	 * @param Tx_JdavSv_Domain_Model_Catering the Catering to be added
	 * @return void
	 */
	public function addCatering(Tx_JdavSv_Domain_Model_Catering $catering) {
		$this->catering->attach($catering);
	}

	/**
	 * Removes a Catering
	 *
	 * @param Tx_JdavSv_Domain_Model_Catering the Catering to be removed
	 * @return void
	 */
	public function removeCatering(Tx_JdavSv_Domain_Model_Catering $cateringToRemove) {
		$this->catering->detach($cateringToRemove);
	}

	/**
	 * Setter for state
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_EventState> $state State the event is in
	 * @return void
	 */
	public function setState(Tx_Extbase_Persistence_ObjectStorage $state) {
		$this->state = $state;
	}

	/**
	 * Getter for state
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_EventState> State the event is in
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Adds a EventState
	 *
	 * @param Tx_JdavSv_Domain_Model_EventState the EventState to be added
	 * @return void
	 */
	public function addState(Tx_JdavSv_Domain_Model_EventState $state) {
		$this->state->attach($state);
	}

	/**
	 * Removes a EventState
	 *
	 * @param Tx_JdavSv_Domain_Model_EventState the EventState to be removed
	 * @return void
	 */
	public function removeState(Tx_JdavSv_Domain_Model_EventState $stateToRemove) {
		$this->state->detach($stateToRemove);
	}

	/**
	 * Setter for fee
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_EventFee> $fee fee
	 * @return void
	 */
	public function setFee(Tx_Extbase_Persistence_ObjectStorage $fee) {
		$this->fee = $fee;
	}

	/**
	 * Getter for fee
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_EventFee> fee
	 */
	public function getFee() {
		return $this->fee;
	}

	/**
	 * Adds a EventFee
	 *
	 * @param Tx_JdavSv_Domain_Model_EventFee the EventFee to be added
	 * @return void
	 */
	public function addFee(Tx_JdavSv_Domain_Model_EventFee $fee) {
		$this->fee->attach($fee);
	}

	/**
	 * Removes a EventFee
	 *
	 * @param Tx_JdavSv_Domain_Model_EventFee the EventFee to be removed
	 * @return void
	 */
	public function removeFee(Tx_JdavSv_Domain_Model_EventFee $feeToRemove) {
		$this->fee->detach($feeToRemove);
	}

	/**
	 * Getter for category
	 *
	 * @return Tx_JdavSv_Domain_Model_Category category
	 */
	public function getCategory() {
		return $this->category;
	}
	
	/**
	 * Setter for category
	 *
	 * @param Tx_JdavSv_Domain_Model_Category $category
	 */
	public function setCategory(Tx_JdavSv_Domain_Model_Category $category) {
		$this->category = $category;
	}

	/**
	 * Setter for registrations
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Registration> $registrations registrations
	 * @return void
	 */
	public function setRegistrations(Tx_Extbase_Persistence_ObjectStorage $registrations) {
		$this->registrations = $registrations;
	}

	/**
	 * Getter for registrations
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Registration> registrations
	 */
	public function getRegistrations() {
		return $this->registrations;
	}
	
	/**
	 * Adds registration for this event
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function addRegistration(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->registrations->add($registration);
	}
	
	/**
	 * Removes registration from this event
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function removeRegistration(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->registrations->remove($registration);
	}

	/**
	 * Returns number of registrations for this event
	 *
	 * @return int Number of registrations for this event
	 */
	public function getRegistrationsCount() {
        return $this->registrations->count();
	}
	
	/**
	 * Returns 'traffic-lights' for event's registration status
	 *
	 * @return string
	 */
	public function getLights() {
		if ($this->maxRegistrations - $this->getRegistrationsCount() < -2) return '#FFB6C1';
		if ($this->maxRegistrations - $this->getRegistrationsCount() <= 2) return '#FFDAB9';
		if ($this->maxRegistrations - $this->getRegistrationsCount() <= 5) return '#FAFAD2';
		if ($this->maxRegistrations - $this->getRegistrationsCount() > 5) return '#7FFFD4';
	}

}

?>