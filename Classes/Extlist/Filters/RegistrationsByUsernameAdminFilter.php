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
class Tx_JdavSv_Extlist_Filters_RegistrationsByUsernameAdminFilter extends Tx_PtExtlist_Domain_Model_Filter_AbstractSingleValueFilter {

	/**
     * Build the filterCriteria for a single field
     *
     * @api
     * @param Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier
     * @return Tx_PtExtlist_Domain_QueryObject_SimpleCriteria
     */
    protected function buildFilterCriteria(Tx_PtExtlist_Domain_Configuration_Data_Fields_FieldConfig $fieldIdentifier) {
        if ($this->filterValue === '') {
            return NULL;
        }

		$feUserRepository = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager')->get('Tx_JdavSv_Domain_Repository_FeUserRepository'); /* @var $feUserRepository Tx_JdavSv_Domain_Repository_FeUserRepository */

		$query = $feUserRepository->createQuery(); /* @var $query Tx_Extbase_Persistence_QueryInterface */

		list($firstName, $lastName) = explode(' ', $this->filterValue);
		if ($firstName && $lastName) {
			$query->matching($query->logicalAnd($query->like('firstName', '%' . $firstName . '%'), $query->like('lastName', '%' . $lastName . '%')));
		} else {
			$query->matching($query->logicalOr($query->like('firstName', '%' . $firstName . '%'), $query->like('lastName', '%' . $firstName . '%')));
		}
		$feUsers = $query->execute();
		$feUserUids = array();
		foreach ($feUsers as $feUser) {
			$feUserUids[] = $feUser->getUid();
		}

        $fieldName = Tx_PtExtlist_Utility_DbUtils::getSelectPartByFieldConfig($fieldIdentifier);
        $criteria = Tx_PtExtlist_Domain_QueryObject_Criteria::in($fieldName, $feUserUids);
        return $criteria;
    }

}
?>