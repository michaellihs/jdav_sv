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
 * Password utility
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Utility_Password {

	public static function getSaltedPassword($password) {
		if (t3lib_extMgm::isLoaded('saltedpasswords')) {
			$saltedpasswordsInstance = tx_saltedpasswords_salts_factory::getSaltingInstance();
			$encryptionKey = $GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey'];
			$encryptedPassword = $saltedpasswordsInstance->getHashedPassword($password, $encryptionKey);
			return $encryptedPassword;
		} else {
			throw new Exception('Required extension saltedpasswords is not installed.');
		}
	}

}