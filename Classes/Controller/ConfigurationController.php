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
 * Controller for the jdav_sv configuration
 */
class Tx_JdavSv_Controller_ConfigurationController extends Tx_JdavSv_Controller_AbstractAdminController {

	protected $templatesBasePath;



	protected $templatesArray = array(
		'confirmReservationAttendee' => array(
			'label' => 'Reservierungsbestätigung Teilnehmer',
			'path' => 'Email/confirm.html',
			'variables' => array(
				'{registration.attendee.firstName}' => 'Vorname des Teilnehmers',
				'{registration.event.title}' => 'Titel der Schulung',
				'<f:uri.action pageUid="{settings.frontendPluginPid}" absolute="1" noCacheHash="1" pluginName="pi1" extensionName="jdavsv" controller="Event" action="show" arguments="{event: registration.event.uid}" />' => 'Link zu den Schulungsdetails'
			)
		),
		'confirmReservationAdmin' => array(
			'label' => 'Reservierungsbenachrichtigung für GS',
			'path' => 'Email/confirmReservationAdmin.html',
			'variables' => array(
				'{registration.event.fullName}' => 'Titel der Veranstaltung',
				'{registration.attendee.fullName}' => 'Vor- und Nachname des Teilnehmers',
				'<f:uri.action pageUid="{settings.administrationPluginPid}" absolute="1" noCacheHash="1" pluginName="pi1" extensionName="jdavsv" controller="RegistrationAdmin" action="edit" arguments="{registration: registration}" />' => 'Link zum Bearbeiten der Anmeldung'
			)
		),
		'confirm.html' => array(
			'label' => 'Bestätigung der verbindlichen Anmeldung',
			'path' => 'Email/confirm.html',
			'variables' => array(
				'{registration.attendee.firstName}' => 'Vorname des Teilnehmers',
				'{registration.event.title}' => 'Titel der Schulung',
				'<f:uri.action pageUid="{settings.frontendPluginPid}" absolute="1" noCacheHash="1" pluginName="pi1" extensionName="jdavsv" controller="Event" action="show" arguments="{event: registration.event.uid}" />' => 'Link zu den Schulungsdetails'
			)
		),
		'confirmUnregisterAdmin.html' => array(
			'label' => 'Abmeldebestätigung GS',
			'path' => 'Email/confirmUnregisterAdmin.html',
			'variables' => array(
				'{registration.event.fullName}' => 'Titel der Veranstaltung',
				'{registration.attendee.fullName}' => 'Vor- und Nachname des Teilnehmers',
			)
		),
		'confirmUnregisterAttendee.html' => array(
			'label' => 'Abmeldebestätigung Teilnehmer',
			'path' => 'Email/confirmUnregisterAttendee.html',
			'variables' => array(
				'{registration.attendee.firstName}' => 'Vorname des Teilnehmers',
				'{registration.event.title}' => 'Titel der Schulung',
			)
		),
		'forgotPassword.html' => array(
			'label' => 'Passwort vergessen E-Mail',
			'path' => 'Email/forgotPassword.html',
			'variables' => array(
				'{feUser.attendee.firstName}' => 'Vorname des Benutzers',
				'{feUser.email}' => 'E-Mail Adresse des Benutzers',
				'<f:uri.action pageUid="{settings.passwordForgottenPid}" absolute="1" noCacheHash="1" pluginName="pi1" extensionName="jdavsv" controller="ForgotPassword" action="showChangePasswordForm" arguments="{passwordForgottenHash: passwordForgottenHash}" />' => 'Link zum Passwort Neu-Setzen'
			)
		)
	);



	public function __construct(Tx_PtExtbase_Lifecycle_Manager $lifeCycleManager) {
		parent::__construct($lifeCycleManager);
		$this->templatesBasePath = PATH_site . 'typo3conf/ext/jdav_sv/Resources/Private/Templates/';
	}




	/**
	 * Displays edit forms for the E-Mail templates
	 *
	 * @return string The rendered html
	 */
	public function editMailTemplatesAction() {
		foreach($this->templatesArray as &$templateConfiguration) {
			$absoluteTemplatePath = $this->templatesBasePath . $templateConfiguration['path'];
			if (file_exists($absoluteTemplatePath)) {
				$templateConfiguration['templateContent'] = file_get_contents($absoluteTemplatePath);
			}
		}
		$this->view->assign('templates', $this->templatesArray);
	}



	/**
	 * @param string $templateKey
	 * @param string $templateContent
	 */
	public function updateEmailTemplatesAction($templateKey, $templateContent) {
		$templatePath = $this->templatesBasePath . $this->templatesArray[$templateKey]['path'];
		if (file_exists($templatePath)) {
			rename($templatePath, $templatePath . date('Ymd', time()));
			file_put_contents($templatePath, $templateContent);
			$this->flashMessageContainer->add('Vorlage "' . $this->templatesArray[$templateKey]['label'] . '" wurde gespeichert!');
		} else {
			$this->flashMessageContainer->add('Vorlage konnte nicht gespeichert werden!', t3lib_FlashMessage::ERROR);
		}
		$this->forward('editMailTemplates');
	}

}