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
 * Class implements filter that filters registrations by given registration status
 *
 * - paid
 * - reservation
 * - accepted
 * - finished
 *
 * @author Michael Knoll
 * @package Extlist
 * @subpackag Filters
 */
class Tx_JdavSv_Extlist_Filters_RegistrationsByStateAdminFilter extends Tx_PtExtlist_Domain_Model_Filter_AbstractSingleValueFilter {

	/**
	 * If set to true, only reservations are shown
	 *
	 * @var bool
	 */
	protected $isReservation = FALSE;



	/**
	 * If set to true, only waitinglist registrations are shown
	 * @var bool
	 */
	protected $isWaitinglist = FALSE;



	/**
	 * If set to true, only accepted registrations are shown
	 *
	 * @var bool
	 */
	protected $isAccepted = FALSE;



    /**
     * Build the filterCriteria for a single field
     *
     * @api
     * @param Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier
     * @return Tx_PtExtlist_Domain_QueryObject_SimpleCriteria
     */
    protected function buildFilterCriteria(Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier) {
		$criteria = NULL;
		if ($this->isAccepted) {
			$criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::equals('isAccepted', 1);
		}

		if ($this->isReservation) {
			if ($criteria) {
				$criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::orOp(
					$criteria,
					Tx_PtExtlist_Domain_QueryObject_Criteria::equals('isReservation', 1)
				);
			} else {
				$criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::equals('isReservation', 1);
			}
		}

		if ($this->isWaitinglist) {
			if ($criteria) {
				$criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::orOp(
					$criteria,
					Tx_PtExtlist_Domain_QueryObject_Criteria::equals('waitingList', 1)
				);
			} else {
				$criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::equals('waitingList', 1);
			}
		}

        return $criteria;
    }



	/**
	 * Initialize filter by given GP vars
	 */
	protected function initFilterByGpVars() {
		if (array_key_exists('isReservation', $this->gpVarFilterData)) {
			$this->isReservation = $this->gpVarFilterData['isReservation'];
		}

		if (array_key_exists('isWaitinglist', $this->gpVarFilterData)) {
			$this->isWaitinglist = $this->gpVarFilterData['isWaitinglist'];
		}

		if (array_key_exists('isAccepted', $this->gpVarFilterData)) {
			$this->isAccepted = $this->gpVarFilterData['isAccepted'];
		}

	}



	/**
	 * Returns true, if filter is set to reservations only
	 *
	 * @return boolean
	 */
	public function getIsReservation() {
		return $this->isReservation;
	}



	/**
	 * Returns true, if filter is set to waitinglist only
	 *
	 * @return boolean
	 */
	public function getIsWaitinglist() {
		return $this->isWaitinglist;
	}



	/**
	 * Returns true, if filter ist set to waitinglist only
	 *
	 * @return boolean
	 */
	public function getIsAccepted() {
		return $this->isAccepted;
	}



	/**
	 * Filter is always active, if called
	 */
	protected function setActiveState() {
		$this->isActive = true;
	}

}
?>