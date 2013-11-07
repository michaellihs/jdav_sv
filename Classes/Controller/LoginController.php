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
 * Controller for login view
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Controller_LoginController extends Tx_JdavSv_Controller_AbstractController {

	/**
	 * Renders login form for SV
	 */
	public function showLoginFormAction() {
		if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['loginFormOnSubmitFuncs'])) {
			$_params = array();
			foreach($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['loginFormOnSubmitFuncs'] as $funcRef) {
				list($onSub, $hid) = t3lib_div::callUserFunction($funcRef, $_params, $this);
				$onSubmitAr[] = $onSub;
				$extraHiddenAr[] = $hid;
			}
		}
		if (count($onSubmitAr)) {
			$onSubmit = implode('; ', $onSubmitAr).'; return true;';
		}
		if (count($extraHiddenAr)) {
			$extraHidden = implode(LF, $extraHiddenAr);
		}

		$this->view->assign('onSubmit', $onSubmit);
		$this->view->assign('extraHidden', $extraHidden);
		$this->view->assign('currentPid', t3lib_div::_GP('id'));

		// Nothing to do here - only render form
		if (isset($this->feUser) && $this->checkFeUser()) {
			$this->redirect('list', 'EventAdmin');
		}
	}



	/**
	 * Checks whether logged in user has sufficient rights
	 *
	 * @return bool
	 */
	protected function checkFeUser() {
		return ($this->feUser->getIsAdmin() || $this->feUser->getIsTeamer() || $this->feUser->getIsProofreader());
	}

}