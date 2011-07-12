<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jdavsv_domain_model_registrationstate'] = array(
	'ctrl' => $TCA['tx_jdavsv_domain_model_registrationstate']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'name,is_required,is_external,is_internal,prerequisites',
	),
	'types' => array(
		'1' => array('showitem'	=> 'name,is_required,is_external,is_internal,prerequisites'),
	),
	'palettes' => array(
		'1' => array('showitem'	=> ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude'			=> 1,
			'label'				=> 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config'			=> array(
				'type'					=> 'select',
				'foreign_table'			=> 'sys_language',
				'foreign_table_where'	=> 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0)
				),
			)
		),
		'l18n_parent' => array(
			'displayCond'	=> 'FIELD:sys_language_uid:>:0',
			'exclude'		=> 1,
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config'		=> array(
				'type'			=> 'select',
				'items'			=> array(
					array('', 0),
				),
				'foreign_table' => 'tx_jdavsv_domain_model_registrationstate',
				'foreign_table_where' => 'AND tx_jdavsv_domain_model_registrationstate.uid=###REC_FIELD_l18n_parent### AND tx_jdavsv_domain_model_registrationstate.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => array(
			'config'		=>array(
				'type'		=>'passthrough',
			)
		),
		't3ver_label' => array(
			'displayCond'	=> 'FIELD:t3ver_label:REQ:true',
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config'		=> array(
				'type'		=>'none',
				'cols'		=> 27,
			)
		),
		'hidden' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'	=> array(
				'type'	=> 'check',
			)
		),
		'name' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registrationstate.name',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'is_required' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registrationstate.is_required',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'is_external' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registrationstate.is_external',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'is_internal' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registrationstate.is_internal',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'prerequisites' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registrationstate.prerequisites',
			'config'	=> array(
				'type' => 'inline',
				'foreign_table' => 'tx_jdavsv_domain_model_registrationstatetransitionprerequisites',
				'foreign_field' => 'registrationstate',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'registration' => array(
			'config' => array(
				'type'	=> 'passthrough',
			),
		),
		'eventcategoryregistrationstate' => array(
			'config' => array(
				'type'	=> 'passthrough',
			),
		),
	),
);
?>