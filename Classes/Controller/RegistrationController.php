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
 * Controller for the Registration object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_JdavSv_Controller_RegistrationController extends Tx_JdavSv_Controller_AbstractController {
	
	/**
	 * registrationRepository
	 * 
	 * @var Tx_JdavSv_Domain_Repository_RegistrationRepository
	 */
	protected $registrationRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	protected function initializeAction() {
		parent::initializeAction();
		$this->registrationRepository = t3lib_div::makeInstance('Tx_JdavSv_Domain_Repository_RegistrationRepository');
	}
	
	
		
	/**
	 * Displays all Registrations
	 *
	 * @return string The rendered list view
	 */
	public function listAction() {
		$registrations = $this->registrationRepository->findAll();
		
		$this->view->assign('registrations', $registrations);
	}
	
		
	/**
	 * Displays a single Registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to display
	 * @return string The rendered view
	 */
	public function showAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->view->assign('registration', $registration);
	}
	
		
	/**
	 * Creates a new Registration and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $newRegistration a fresh Registration object which has not yet been added to the repository
	 * @return string An HTML form for creating a new Registration
	 * @dontvalidate $newRegistration
	 */
	public function newAction(Tx_JdavSv_Domain_Model_Registration $newRegistration = NULL) {
		$this->view->assign('newRegistration', $newRegistration);
	}
	
		
	/**
	 * Creates a new Registration and forwards to the list action.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $newRegistration a fresh Registration object which has not yet been added to the repository
	 * @return void
	 */
	public function createAction(Tx_JdavSv_Domain_Model_Registration $newRegistration) {
		$this->registrationRepository->add($newRegistration);
		$this->flashMessageContainer->add('Your new Registration was created.');
		
		$this->redirect('list');
	}
	
		
	
	/**
	 * Updates an existing Registration and forwards to the index action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to display
	 * @return string A form to edit a Registration 
	 */
	public function editAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->view->assign('registration', $registration);
	}
	
		

	/**
	 * Updates an existing Registration and forwards to the list action afterwards.
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to display
	 */
	public function updateAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->registrationRepository->update($registration);
		$this->flashMessageContainer->add('Your Registration was updated.');
		$this->redirect('list');
	}
	
		
			/**
	 * Deletes an existing Registration
	 *
	 * @param Tx_JdavSv_Domain_Model_Registration $registration the Registration to be deleted
	 * @return void
	 */
	public function deleteAction(Tx_JdavSv_Domain_Model_Registration $registration) {
		$this->registrationRepository->remove($registration);
		$this->flashMessageContainer->add('Your Registration was removed.');
		$this->redirect('list');
	}
	
	
	
	/**
	 * Registers logged in user to given event
	 *
	 * @param Tx_JdavSv_Domain_Model_Event $event
	 * @return string Rendered HTML source
	 */
	public function registerAction(Tx_JdavSv_Domain_Model_Event $event) {
		if (is_null($this->feUser)) {
			$this->flashMessages->add('Für die Anmeldung zu einer Schulung muss man eingeloggt sein!');
			$this->forward('list', 'Event');
		}
		$this->view->assign('feUser', $this->feUser);
		$this->view->assign('event', $event);
	}
	
}

?>