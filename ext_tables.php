<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

// Register Extbase plugin
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'JDAV-Schulungsverwaltung'
);



// Register plugin as page content
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature]='layout,select_key,pages';



// Register static TypoScript template for this extension
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', '[jdav_sv] JDAV Schulungsverwaltung');

// Register static TypoScript template for this extension
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/AdminPageStaticTemplate', '[jdav_sv] Root Template JDAV Schulungsverwaltung');

// Register FlexForm
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Flexform_pi1.xml');
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';



/* TCA definitions */
t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_event', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_event.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_event');
$TCA['tx_jdavsv_domain_model_event'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event',
		'label' 			=> 'title',
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
		'label' 			=> 'date',
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
		'label' 			=> 'name',
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
		'label' 			=> 'name',
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
		'label' 			=> 'category',
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
		'label' 			=> 'name',
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
		'label' 			=> 'name',
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
		'label' 			=> 'name',
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
		'label' 			=> 'name',
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

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_paymentmethods', 'EXT:jdav_sv/Resources/Private/Language/locallang_csh_tx_jdavsv_domain_model_paymentmethods.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_paymentmethods');
$TCA['tx_jdavsv_domain_model_paymentmethods'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_paymentmethods',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/PaymentMethods.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_paymentmethods.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_categoryprerequisitefulfillment', 'Category Prerequisites Fulfillment');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_categoryprerequisitefulfillment');
$TCA['tx_jdavsv_domain_model_categoryprerequisitefulfillment'] = array (
	'ctrl' => array (
		'title'             => 'tx_jdavsv_domain_model_categoryprerequisitefulfillment',
		'label' 			=> 'name',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/CategoryPrerequisiteFulfillment.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_categoryprerequisitefulfillment.gif'
	)
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jdavsv_domain_model_categoryprerequisite', 'Category Prerequisites');
t3lib_extMgm::allowTableOnStandardPages('tx_jdavsv_domain_model_categoryprerequisite');
$TCA['tx_jdavsv_domain_model_categoryprerequisite'] = array (
	'ctrl' => array (
		'title'             => 'tx_jdavsv_domain_model_categoryprerequisite',
		'label' 			=> 'name',
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
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/CategoryPrerequisite.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jdavsv_domain_model_categoryprerequisite.gif'
	)
);



t3lib_div::loadTCA('fe_users');
$tempColumns = array(
	'tx_jdavsv_is_teamer' => array(
		'exclude' => 1,
		'label'   => 'Ist Teamer',
		'config' => array(
			'type' => 'check',
		)
	),
	'tx_jdavsv_is_trainee' => array(
		'exclude' => 1,
		'label'   => 'Ist Hospitant',
		'config' => array(
			'type' => 'check',
		)
	),
	'tx_jdavsv_is_kitchen_group' => array(
		'exclude' => 1,
		'label'   => 'Ist Kochgruppeninteressierter',
		'config' => array(
			'type' => 'check',
		)
	),
	'tx_jdavsv_is_proofreader' => array(
		'exclude' => 1,
		'label'   => 'Ist Korrekturleser',
		'config' => array(
			'type' => 'check',
		)
	),
	'tx_jdavsv_is_admin' => array(
		'exclude' => 1,
		'label'   => 'Ist Admin',
		'config' => array(
			'type' => 'check',
		)
	)
);
t3lib_extMgm::addTCAcolumns('fe_users', $tempColumns, 1);
t3lib_extMgm::addToAllTCAtypes('fe_users', 'tx_jdavsv_is_teamer');
t3lib_extMgm::addToAllTCAtypes('fe_users', 'tx_jdavsv_is_trainee');
t3lib_extMgm::addToAllTCAtypes('fe_users', 'tx_jdavsv_is_kitchen_group');
t3lib_extMgm::addToAllTCAtypes('fe_users', 'tx_jdavsv_is_admin');
t3lib_extMgm::addToAllTCAtypes('fe_users', 'tx_jdavsv_is_proofreader');
?>