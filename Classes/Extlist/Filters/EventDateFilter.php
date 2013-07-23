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
 * Class implements filter that filters events by date
 *
 * @author Michael Knoll
 * @package Extlist
 * @subpackag Filters
 */
class Tx_JdavSv_Extlist_Filters_EventDateFilter extends Tx_PtExtlist_Domain_Model_Filter_AbstractSingleValueFilter {

	/**
	 * @var DateTime
	 */
	protected $startDate;



	/**
	 * @var DateTime
	 */
	protected $endDate;



	public function setStartDate(DateTime $startDate) {
		$this->startDate = $startDate;
		$this->isActive = TRUE;
	}



	public function setEndDate(DateTime $endDate) {
		$this->endDate = $endDate;
		$this->isActive = TRUE;
	}



	/**
	 * (non-PHPdoc)
	 * @see Classes/Domain/Model/Filter/Tx_PtExtlist_Domain_Model_Filter_AbstractFilter::setActiveState()
	 */
	protected function setActiveState() {
		// don't change active state here!
	}



	/**
	 * Returns date range filtering for start and end date.
	 *
	 * @param Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier
	 * @return null|Tx_PtExtlist_Domain_QueryObject_SimpleCriteria
	 */
	protected function buildFilterCriteria(Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier) {
		$fieldName = Tx_PtExtlist_Utility_DbUtils::getSelectPartByFieldConfig($fieldIdentifier);
		$startCriteria = NULL;
		$endCriteria = NULL;
		if ($this->startDate) {
			$startCriteria = Tx_PtExtlist_Domain_QueryObject_Criteria::greaterThanEquals($fieldName, $this->startDate->getTimestamp());
		}

		if ($this->endDate) {
			$endCriteria = Tx_PtExtlist_Domain_QueryObject_Criteria::lessThanEquals($fieldName, $this->endDate->getTimestamp());
		}

		if ($startCriteria) {
			if ($endCriteria) {
				return Tx_PtExtlist_Domain_QueryObject_Criteria::andOp($startCriteria, $endCriteria);
			} else {
				return $startCriteria;
			}
		} elseif ($endCriteria) {
			return $endCriteria;
		} else {
			return NULL;
		}

	}

}