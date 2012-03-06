<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jdavsv_domain_model_categoryprerequisite'] = array(
	'ctrl' => $TCA['tx_jdavsv_domain_model_categoryprerequisite']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'category, required, shortcut, title, sorting'
	),
	'types' => array(
		'1' => array('showitem'	=> 'category, required, shortcut, title, sorting')
	),
	'palettes' => array(
		'1' => array('showitem'	=> '')
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
					array('', 0)
				),
				'foreign_table' => 'tx_jdavsv_domain_model_categoryprerequisite',
				'foreign_table_where' => 'AND tx_jdavsv_domain_model_categoryprerequisite.uid=###REC_FIELD_l18n_parent### AND tx_jdavsv_domain_model_categoryprerequisite.sys_language_uid IN (-1,0)'
			)
		),
		'l18n_diffsource' => array(
			'config'		=>array(
				'type'		=>'passthrough'
			)
		),
		't3ver_label' => array(
			'displayCond'	=> 'FIELD:t3ver_label:REQ:true',
			'label'			=> 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config'		=> array(
				'type'		=>'none',
				'cols'		=> 27
			)
		),
		'hidden' => array(
			'exclude'	=> 1,
			'label'		=> 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'	=> array(
				'type'	=> 'check'
			)
		),
		'category' => array(
			'exclude'	=> 0,
			'label'		=> 'Kategorie',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'required' => array(
			'exclude'	=> 1,
			'label'		=> 'Voraussetzung',
			'config'	=> array(
				'type'	=> 'check'
			)
		),
		'shortcut' => array(
			'exclude'	=> 0,
			'label'		=> 'Kürzel',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'title' => array(
			'exclude'	=> 0,
			'label'		=> 'name',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			)
		),
		'sorting' => array(
			'exclude'	=> 0,
			'label'		=> 'Sortierung',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		)
	)
);
?>