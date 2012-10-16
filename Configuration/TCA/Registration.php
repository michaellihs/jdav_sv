<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jdavsv_domain_model_registration'] = array(
	'ctrl' => $TCA['tx_jdavsv_domain_model_registration']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'date,attendee,reserved_until,waiting_list,registration_order,vegetarian,state,payment_method,event,comment,is_reservation,paid, registration_confirmation_sent',
	),
	'types' => array(
		'1' => array('showitem'	=> 'date,attendee,reserved_until,waiting_list,registration_order,vegetarian,state,payment_method,event,comment,is_reservation,paid, registration_confirmation_sent'),
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
				'foreign_table' => 'tx_jdavsv_domain_model_registration',
				'foreign_table_where' => 'AND tx_jdavsv_domain_model_registration.uid=###REC_FIELD_l18n_parent### AND tx_jdavsv_domain_model_registration.sys_language_uid IN (-1,0)',
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
		'date' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.date',
			'config'	=> array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'attendee' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.attendee',
			'config'	=> array(
                'type' => 'inline',
                'foreign_table' => 'fe_users',
		        'foreign_class' => 'Tx_Extbase_Domain_Model_FrontendUser', 
                'maxitems'      => 1,
                'minitems'      => 1,
                'appearance' => array(
                    'collapse' => 0,
                    'newRecordLinkPosition' => 'bottom',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ),
			),
		),
		'reserved_until' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.reserved_until',
			'config'	=> array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'waiting_list' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.waiting_list',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
        'is_accepted' => array(
            'exclude'   => 0,
            'label'     => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.is_accepted',
            'config'    => array(
                'type' => 'check',
                'default' => 0
            ),
        ),
		'is_reservation' => array(
			'exclude'   => 0,
			'label'     => 'Is Reservation',
			'config'    => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'registration_order' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.registration_order',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'vegetarian' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.vegetarian',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'paid' => array(
			'exclude'	=> 0,
			'label'		=> 'bezahlt',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'registration_confirmation_sent' => array(
			'exclude'	=> 0,
			'label'		=> 'Anmeldebestätigung verschickt',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'event' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_registration.event',
			'config'	=> array(
				'type' => 'inline',
				'foreign_table' => 'tx_jdavsv_domain_model_event',
		        'minitems' => 1,
				'maxitems' => 1,
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'comment' => array(
			'exclude'	=> 0,
			'label'		=> 'Comment',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
	),
);
?>