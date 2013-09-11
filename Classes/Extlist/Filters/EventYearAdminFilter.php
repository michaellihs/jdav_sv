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
 * Class implements filter that filters events by event years
 *
 * @author Michael Knoll
 * @package Extlist
 * @subpackag Filters
 */
class Tx_JdavSv_Extlist_Filters_EventYearAdminFilter extends Tx_PtExtlist_Domain_Model_Filter_AbstractOptionsFilter {

	/**
	 * Returns event years for event year filter
	 *
	 * @return mixed
	 */
	public function getOptions() {
		$eventYearRepository = t3lib_div::makeInstance('Tx_Extbase_Object_Manager')->get('Tx_JdavSv_Domain_Repository_EventYearRepository'); /* @var $eventYearRepository Tx_JdavSv_Domain_Repository_EventYearRepository */
		$eventYears = $eventYearRepository->findAllOrderedByName();
		return $eventYears;
	}



	/**
	 * Returns selected filter values
	 *
	 * @return array
	 */
	public function getValues() {
		return $this->filterValues;
	}

}