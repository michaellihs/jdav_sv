<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jdavsv_domain_model_event'] = array(
	'ctrl' => $TCA['tx_jdavsv_domain_model_event']['ctrl'],
	'interface' => array(
		'showRecordFieldList'	=> 'title,subtitle,description,date_start,date_end,duration,place,travelling,accreditation_number,requirements,contents,education_objective,first_teamer,second_teamer,trainee,kitchen_group,price,max_registrations,min_registrations,att_teamer_ratio,announcement,tour_report_required,registration_deadline,unregister_deadline,registration_open_date,accommodation,catering,fee,category,registrations,is_proposal,teamer_input_finished,is_proofread,is_accepted,counts_in_max_registrations,is_public,comment,archived, event_year',
	),
	'types' => array(
		'1' => array('showitem'	=> 'title,subtitle,description,date_start,date_end,duration,place,travelling,accreditation_number,requirements,contents,education_objective,first_teamer,second_teamer,trainee,kitchen_group,price,max_registrations,min_registrations,att_teamer_ratio,announcement,tour_report_required,registration_deadline,unregister_deadline,registration_open_date,accommodation,catering,fee,category,registrations,is_proposal,teamer_input_finished,is_proofread,is_accepted,counts_in_max_registrations,is_public,comment,archived, event_year'),
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
				'foreign_table' => 'tx_jdavsv_domain_model_event',
				'foreign_table_where' => 'AND tx_jdavsv_domain_model_event.uid=###REC_FIELD_l18n_parent### AND tx_jdavsv_domain_model_event.sys_language_uid IN (-1,0)',
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
		'title' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.title',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'subtitle' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.subtitle',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.description',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'date_start' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.date_start',
			'config'	=> array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'date_end' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.date_end',
			'config'	=> array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'duration' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.duration',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			),
		),
		'place' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.place',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'travelling' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.travelling',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'accreditation_number' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.accreditation_number',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'requirements' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.requirements',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'contents' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.contents',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'education_objective' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.education_objective',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'first_teamer' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.first_teamer',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'second_teamer' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.second_teamer',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'event_year' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.event_year',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'trainee' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.trainee',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'kitchen_group' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.kitchen_group',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'price' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.price',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'double2'
			),
		),
		'max_registrations' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.max_registrations',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'min_registrations' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.min_registrations',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'att_teamer_ratio' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.att_teamer_ratio',
			'config'	=> array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'announcement' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.announcement',
			'config'	=> array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'tour_report_required' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.tour_report_required',
			'config'	=> array(
				'type' => 'check',
				'default' => 0
			),
		),
		'registration_deadline' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.registration_deadline',
			'config'	=> array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'registration_open_date' => array(
			'exclude'	=> 0,
			'label'		=> 'Anmeldung möglich ab',
			'config'	=> array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'accommodation' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.accommodation',
			'config'	=> array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'catering' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.catering',
			'config'	=> array(
				'type' => 'inline',
				'foreign_table' => 'tx_jdavsv_domain_model_catering',
				'foreign_field' => 'event',
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
        'is_proposal' => array(
            'exclude'   => 0,
            'label'     => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.is_proposal',
            'config'    => array(
                'type' => 'check',
                'default' => 0
            ),
        ),
        'teamer_input_finished' => array(
            'exclude'   => 0,
            'label'     => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.teamer_input_finished',
            'config'    => array(
                'type' => 'check',
                'default' => 0
            ),
        ),
        'is_proofread' => array(
            'exclude'   => 0,
            'label'     => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.is_proofread',
            'config'    => array(
                'type' => 'check',
                'default' => 0
            ),
        ),
        'is_accepted' => array(
            'exclude'   => 0,
            'label'     => 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.is_accepted',
            'config'    => array(
                'type' => 'check',
                'default' => 0
            ),
        ),
		'counts_in_max_registrations' => array(
			'exclude'   => 0,
			'label'     => 'Counts in max registrations',
			'config'    => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'is_public' => array(
			'exclude'   => 0,
			'label'     => 'Is public',
			'config'    => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'archived' => array(
			'exclude'   => 0,
			'label'     => 'Is archived',
			'config'    => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'fee' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.fee',
			'config'	=> array(
				'type' => 'inline',
				'foreign_table' => 'tx_jdavsv_domain_model_eventfee',
				'foreign_field' => 'event',
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
		'category' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.category',
			'config'	=> array(
				'type' => 'select',
				'foreign_table' => 'tx_jdavsv_domain_model_category',
		        'minitems' => 0,
				'maxitems'      => 1,
                'wizards' => array(
                    '_PADDING' => 1,
                    '_VERTICAL' => 0,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'Edit',
                        'script' => 'wizard_edit.php',
                        'icon' => 'edit2.gif',
                        'popup_onlyOpenIfSelected' => 1,
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                    'add' => Array(
                        'type' => 'script',
                        'title' => 'Create new',
                        'icon' => 'add.gif',
                        'params' => array(
                            'table'=>'tx_jdavsv_domain_model_category',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                            ),
                        'script' => 'wizard_add.php',
                    ),
                ),
				'appearance' => array(
					'collapse' => 0,
					'newRecordLinkPosition' => 'bottom',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'registrations' => array(
			'exclude'	=> 0,
			'label'		=> 'LLL:EXT:jdav_sv/Resources/Private/Language/locallang_db.xml:tx_jdavsv_domain_model_event.registrations',
			'config'	=> array(
				'type' => 'inline',
				'foreign_table' => 'tx_jdavsv_domain_model_registration',
		        'foreign_field' => 'event',
				'minitems' => 0,
				'maxitems' => 9999,
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