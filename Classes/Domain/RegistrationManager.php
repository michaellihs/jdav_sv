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

class Tx_JdavSv_Domain_RegistrationManager implements t3lib_Singleton {
	
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
	
	
	
	/**
	 * Removes a registration from an event.
	 * 
	 * TODO there should be a field 'cancelled' on Registration object, which we should use, if a user cancels his registration.
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 */
	public function unregisterUserForEvent(Tx_Extbase_Domain_Model_FrontendUser $feUser, Tx_JdavSv_Domain_Model_Event $event) {
		$query = $this->registrationRepository->createQuery();
		$query->matching(
		    $query->logicalAnd(
		        $query->equals('attendee', $feUser),
		        $query->equals('event', $event)
		    )
		);
		$registrations = $query->execute();
		if ($registrations->count() == 1) {
		    $this->registrationRepository->remove($registrations->getFirst());
		    t3lib_div::makeInstance('Tx_Extbase_Persistence_Manager')->persistAll();
		} elseif ($registrations->count() > 1) {
			throw new Exception('We have more than one registration of a single user for an event. This should never happen!');
		}
	}



	/**
	 * Returns all registrations for a given user
	 *
	 * @param Tx_JdavSv_Domain_Model_FeUser $user
	 * @return array<Tx_JdavSv_Domain_Model_Registration>
	 */
	public function getRegistrationsByUser(Tx_JdavSv_Domain_Model_FeUser $user) {
		// TODO don't respect events that do not count like LJLT or Bouldernight
		// TODO think about how to handle reservations
		// TODO respect current year / event-cycle
		return $this->registrationRepository->findByAttendee($user);
	}
	
}
?>