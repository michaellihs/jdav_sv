<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jdavsv_domain_model_categoryprerequisitefulfillment'] = array(
	'ctrl' => $TCA['tx_jdavsv_domain_model_categoryprerequisitefulfillment']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'registration,prerequisite,date,annotation,is_fullfilled',
	),
	'types' => array(
		'1' => array('showitem'	=> 'registration,prerequisite,date,annotation,is_fullfilled'),
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
				)
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
				'foreign_table' => 'tx_jdavsv_domain_model_categoryprerequisitefulfillment',
				'foreign_table_where' => 'AND tx_jdavsv_domain_model_categoryprerequisitefulfillment.uid=###REC_FIELD_l18n_parent### AND tx_jdavsv_domain_model_categoryprerequisitefulfillment.sys_language_uid IN (-1,0)',
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
		'registration' => array(
			'exclude'	=> 0,
			'label'		=> 'Anmeldung',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'prerequisite' => array(
			'exclude'	=> 0,
			'label'		=> 'Voraussetzung',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'is_fulfilled' => array(
			'exclude'	=> 0,
			'label'		=> 'Erfuellt',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'annotation' => array(
			'exclude'	=> 0,
			'label'		=> 'Anmerkungen',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			)
		)
	)
);
?>