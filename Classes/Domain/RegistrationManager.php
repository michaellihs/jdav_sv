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
 * Registration manager handles event registrations
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */

class Tx_JdavSv_Domain_RegistrationManager {
	
	/**
	 * Holds a singleton instance of this class
	 *
	 * @var Tx_JdavSv_Domain_RegistrationManager
	 */
	protected static $instance = null;
	
	

	/**
	 * Holds instance of event repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_EventRepository
	 */
	protected $eventRepository;
	
	
	
	/**
	 * Holds instance of registration repository
	 *
	 * @var Tx_JdavSv_Domain_Repository_RegistrationRepository
	 */
	protected $registrationRepository;
	
	
	
	/**
	 * Factory method for registration manager
	 *
	 * @return Tx_JdavSv_Domain_RegistrationManager
	 */
	public static function getInstance() {
		if (self::$instance === null) {
			$instance = new Tx_JdavSv_Domain_RegistrationManager();
			$instance->injectEventRepository(t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_EventRepository'));
			$instance->injectRegistrationRepository(t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_RegistrationRepository'));
			self::$instance = $instance;
		}
		return self::$instance;
	}
	
	
	
	/**
	 * Injects instance of event repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_EventRepository $eventRepository
	 */
	public function injectEventRepository(Tx_JdavSv_Domain_Repository_EventRepository $eventRepository) {
		$this->eventRepository = $eventRepository;
	}
	
	
	
	/**
	 * Injects instance of registration repository
	 *
	 * @param Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository
	 */
	public function injectRegistrationRepository(Tx_JdavSv_Domain_Repository_RegistrationRepository $registrationRepository) {
		$this->registrationRepository = $registrationRepository;
	}
	
	
	
	/**
	 * Returns true, if given user is already registerd for given event
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function isUserRegisteredForEvent(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event) {
		if (count($this->registrationRepository->getRegistrationsByEventAndFeUser($event, $feUser))) {
			return true;
		} else {
			return false;
		}
	}
	
	
	
	/**
	 * Registers given user for given event and returns registration.
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return Tx_JdavSv_Domain_Model_Registration $registration
	 */
	public function registerUserForEvent(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event) {
		$registration = new Tx_JdavSv_Domain_Model_Registration();
		$registration->setEvent($event);
		$registration->setAttendee($feUser);
		$date = new DateTime();
		$date->setTimestamp(time());
		$registration->setDate($date);
		$registration->setReservedUntil($date->add(new DateInterval('P10D')));
		$this->registrationRepository->add($registration);
		return $registration;
	}
	
}

?>