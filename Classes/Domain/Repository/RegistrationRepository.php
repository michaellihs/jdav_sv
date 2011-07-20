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
 * Repository for Tx_JdavSv_Domain_Model_Registration
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
 
class Tx_JdavSv_Domain_Repository_RegistrationRepository extends Tx_Extbase_Persistence_Repository {

	/**
	 * Returns registrations for a given event and feUser
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feUser
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Registration>
	 */
	public function getRegistrationsByEventAndFeUser(Tx_JdavSv_Domain_Model_Event $event, Tx_Extbase_Domain_Model_FrontendUser $feUser) {
		$query = $this->createQuery();
		$query->matching($query->logicalAnd($query->equals('event', $event), $query->equals('attendee', $feUser)));
		return $query->execute();
	}
	
	
	
	/**
	 * Returns accepted registrations for a given event 
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_JdavSv_Domain_Model_Registration>
	 */
	public function getAcceptedRegistrationsByEvent(Tx_JdavSv_Domain_Model_Event $event) {
		$query = $this->createQuery();
		$query->matching(
		    $query->logicalAnd(
		        $query->equals('event', $event),
		        $query->equals('isAccepted', 1)
		    )
		);
		return $query->execute();
	}
	
}
?>