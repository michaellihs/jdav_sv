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
 * Class implements filter that filters registrations by given event
 *
 * @author Michael Knoll
 * @package Extlist
 * @subpackag Filters
 */
class Tx_JdavSv_Extlist_Filters_RegistrationsByEventAdminFilter extends Tx_PtExtlist_Domain_Model_Filter_AbstractSingleValueFilter {

	/**
	 * Returns all events currently public
	 *
	 * @return mixed
	 */
	public function getEvents() {
		$eventRepository = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager')->get('Tx_JdavSv_Domain_Repository_EventRepository'); /* @var $eventRepository Tx_JdavSv_Domain_Repository_EventRepository */
		$events = $eventRepository->findByIsPublic(1);
		return $events;
	}



    /**
     * Build the filterCriteria for a single field
     *
     * @api
     * @param Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier
     * @return Tx_PtExtlist_Domain_QueryObject_SimpleCriteria
     */
    protected function buildFilterCriteria(Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier) {
        if ($this->filterValue == 0) {
            return NULL;
        }
		if ($this->filterValue === NULL) {
			return NULL;
		}

        $fieldName = Tx_PtExtlist_Utility_DbUtils::getSelectPartByFieldConfig($fieldIdentifier);
        $filterValue = intval($this->filterValue, 10);
        $criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::equals($fieldName, $filterValue);
        return $criteria;
    }

}
?>