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
class Tx_JdavSv_Domain_AbstractManager {

	/**
	 * Holds instance of persistence manager
	 *
	 * @var Tx_Extbase_Persistence_Manager
	 */
	protected $persistenceManager;



	/**
	 * Holds instance of configuration manager
	 * @var Tx_Extbase_Configuration_ConfigurationManager
	 */
	protected $configurationManager;



	/**
	 * Holds TS settings for this extension
	 *
	 * @var array
	 */
	protected $settings;



	/**
	 * Injects persistence manager
	 *
	 * @param Tx_Extbase_Persistence_Manager $persistenceManager
	 */
	public function injectPersistenceManager(Tx_Extbase_Persistence_Manager $persistenceManager) {
		$this->persistenceManager = $persistenceManager;
	}



	/**
	 * Injects configuration manager
	 *
	 * @param Tx_Extbase_Configuration_ConfigurationManager $configurationManager
	 */
	public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManager $configurationManager) {
		$this->configurationManager = $configurationManager;
	}



	/**
	 * Initializes object
	 */
	public function initializeObject() {
		$this->settings = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
	}



	/**
	 * Sends email with given parameters
	 *
	 * @param array $to array('email' => 'name')
	 * @param array $from array('email => 'name')
	 * @param string $subject
	 * @param string $template Template as defined in settings!
	 * @param array $templateAssignments
	 */
	protected function sendMail($to, $from=NULL, $subject, $template, array $templateAssignments = array()) {
		$mailer = Tx_JdavSv_Utility_FluidMailer::getInstance();
		$mailer->setTemplateByTsDefinedTemplate($template)
			->setTo($to)
			->setSubject($subject);

		if ($from) {
			$mailer->setFrom($from);
		}

		foreach ($templateAssignments as $key => $value) {
			$mailer->assignToView($key, $value);
		}

		// assign settings to view (TS)
		$mailer->assignToView('settings', $this->settings);

		#try {
			$mailer->send();
		#} catch (Exception $e) {
		#	// We prevent exception if mail cannot be send
		#}
	}



	/**
	 * Returns email adress of admin as set in settings
	 *
	 * @return array
	 */
	protected function getAdminEmailArray() {
		return array($this->settings['email']['adminTo']['email'] => $this->settings['email']['adminTo']['name']);
	}

}