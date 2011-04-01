<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');


Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'pi1'
);

//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
//t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_pi1.xml');





t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'JDAV Schulungsverwaltung');




t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_event', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_event.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_event');
$TCA['tx_jdavsv_domain_model_event'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event',
		'label' 			=> 'titel',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Event.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_event.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_registration', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_registration.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_registration');
$TCA['tx_jdavsv_domain_model_registration'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Registration.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_registration.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_category', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_category.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_category');
$TCA['tx_jdavsv_domain_model_category'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_category',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_category.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_eventstate', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_eventstate.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_eventstate');
$TCA['tx_jdavsv_domain_model_eventstate'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_eventstate',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/EventState.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_eventstate.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_eventcategoryregistrationstate', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_eventcategoryregistrationstate.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_eventcategoryregistrationstate');
$TCA['tx_jdavsv_domain_model_eventcategoryregistrationstate'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_eventcategoryregistrationstate',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/EventCategoryRegistrationState.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_eventcategoryregistrationstate.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_registrationstate', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_registrationstate.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_registrationstate');
$TCA['tx_jdavsv_domain_model_registrationstate'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registrationstate',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/RegistrationState.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_registrationstate.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_accommodation', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_accommodation.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_accommodation');
$TCA['tx_jdavsv_domain_model_accommodation'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_accommodation',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Accommodation.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_accommodation.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_catering', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_catering.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_catering');
$TCA['tx_jdavsv_domain_model_catering'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_catering',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Catering.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_catering.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_eventfee', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_eventfee.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_eventfee');
$TCA['tx_jdavsv_domain_model_eventfee'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_eventfee',
		'label' 			=> 'uid',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> TRUE,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',
		'transOrigPointerField' 	=> 'l18n_parent',
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/EventFee.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_eventfee.gif'
	)
);


?>