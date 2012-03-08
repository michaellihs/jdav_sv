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
 * Class implements mailing with FLUID
 *
 * Class acts both as a wrapper for t3lib_mail_Message and as a
 * shortcut for using FLUID templates for sending emails.
 *
 * @author Michael Knoll <mimi@kaktusteam.de>
 */
class Tx_JdavSv_Utility_FluidMailer {

	/**
	 * Returns instance of this class
	 *
	 * @static
	 * @return Tx_JdavSv_Utility_FluidMailer
	 */
	public static function getInstance() {
		return t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager')->get('Tx_JdavSv_Utility_FluidMailer');
	}



	/**
	 * Holds FLUID template path to be used with this mailing
	 *
	 * @var string
	 */
	protected $templatePath;



	/**
	 * Holds FLUID template view
	 *
	 * @var Tx_Fluid_View_StandaloneView
	 */
	protected $view;



	/**
	 * Holds mailing service
	 *
	 * @var t3lib_mail_Message
	 */
	protected $mailingService;



	/**
	 * Holds extbase configuration manager
	 *
	 * @var Tx_Extbase_Configuration_ConfigurationManager
	 */
	protected $configurationManager;



	/**
	 * Holds extbase framework configuration
	 *
	 * @var array
	 */
	protected $extbaseFrameworkConfiguration;



	/**
	 * Holds TS settings for this extension
	 *
	 * @var array
	 */
	protected $settings;



	/**
	 * Holds base path for Email templates
	 *
	 * @var string
	 */
	protected $templatesBasePath;



	/**
	 * Holds array of template file names
	 *
	 * @var array
	 */
	protected $templates;



	/**
	 * Injects mailing service
	 *
	 * @param t3lib_mail_Message $t3MailMessage
	 */
	public function injectT3MailMessage(t3lib_mail_Message $t3MailMessage) {
		$this->mailingService = $t3MailMessage;
	}



	/**
	 * Injects FLUID template view
	 *
	 * @param Tx_Fluid_View_StandaloneView $view
	 */
	public function injectTemplateView(Tx_Fluid_View_StandaloneView $view) {
		$this->view = $view;
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
	 * Called by object manager after object is instantiated
	 */
	public function initializeObject() {
		$this->initializeConfiguration();
		$this->initializeView();
		$this->initializeByDefaultsFromTs();
	}



	/**
	 * Setter for FROM part in email
	 *
	 * array('email' => 'name')
	 *
	 * @param array $from
	 * @return Tx_JdavSv_Utitlity_FluidMailer
	 */
	public function setFrom(array $from) {
		$this->mailingService->setFrom($from);
		return $this;
	}



	/**
	 * Setter for TO part in email
	 *
	 * array('email' => 'name')
	 *
	 * @param array $to
	 * @return Tx_JdavSv_Utitlity_FluidMailer
	 */
	public function setTo(array $to) {
		$this->mailingService->setTo($to);
		return $this;
	}



	/**
	 * Setter for subject in email
	 *
	 * @param $subject
	 * @return Tx_JdavSv_Utitlity_FluidMailer
	 */
	public function setSubject($subject) {
		$this->mailingService->setSubject($subject);
		return $this;
	}



	/**
	 * Setter for FLUID template path
	 *
	 * @param $templatePath
	 * @return Tx_JdavSv_Utitlity_FluidMailer
	 */
	public function setTemplatePath($templatePath) {
		$this->templatePath = $templatePath;
		$this->setCustomPathsInView();
		return $this;
	}



	/**
	 * Setter for FLUID template based on TS configuration
	 *
	 * @param $templateName
	 * @throws Exception
	 */
	public function setTemplateByTsDefinedTemplate($templateName) {
		if (array_key_exists($templateName, $this->templates)) {
			$this->templatePath = $this->templatesBasePath . $this->templates[$templateName];
			$this->setCustomPathsInView();
		} else {
			throw new Exception('Template ' . $templateName . ' is not defined in plugin.tx_jdavsv.settings.email.templates! 1331207104');
		}
		return $this;
	}



	/**
	 * Assigns values to FLUID view
	 *
	 * @param $key Key to name assigned value
	 * @param $value Assigned value
	 */
	public function assignToView($key, $value) {
		$this->view->assign($key, $value);
		return $this;
	}



	/**
	 * Sends email
	 */
	public function send() {
		$body = $this->view->render();
		$this->mailingService->setBody($body);
		$this->mailingService->send();
	}



	/**
	 * Initialize configuration of this class from TS
	 */
	protected function initializeConfiguration() {
		$this->extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$this->settings = $this->configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

		// Initialize configuration for email from TS
		if (array_key_exists('email', $this->settings)) {
			$emailSettings = $this->settings['email'];
			if (array_key_exists('templatesBasePath', $emailSettings)) {
				$this->templatesBasePath = $emailSettings['templatesBasePath'];
			}
			if (array_key_exists('templates', $emailSettings)) {
				$this->templates = $emailSettings['templates'];
			}
		}
	}



	/**
	 * Initializes object with default values from TypoScript settings
	 */
	protected function initializeByDefaultsFromTs() {
		if (array_key_exists('email', $this->settings)) {

			// Set default FROM in mailer service
			if (array_key_exists('defaultFrom', $this->settings['email'])) {
				$fromArray = array($this->settings['email']['defaultFrom']['email'] => $this->settings['email']['defaultFrom']['name']);
				$this->setFrom($fromArray);
			}

		}
	}



	/**
	 * Initializes the view
	 */
	protected function initializeView() {
		if (method_exists($this->view, 'injectSettings')) {
			$this->view->injectSettings($this->extbaseFrameworkConfiguration);
		}
		$this->view->initializeView(); // In FLOW3, solved through Object Lifecycle methods, we need to call it explicitely
		$this->view->assign('settings', $this->extbaseFrameworkConfiguration); // same with settings injection.
	}



	/**
	 * Set the TS defined custom paths in view
	 *
	 * plugin.<plugin_key>.settings.controller.<Controller_Name_Without_Controller>.<action_name_without_action>.template = full_path_to_template_with.html
	 */
	protected function setCustomPathsInView() {
		$this->view->setTemplatePathAndFilename(t3lib_div::getFileAbsFileName($this->templatePath));
	}

}
?>