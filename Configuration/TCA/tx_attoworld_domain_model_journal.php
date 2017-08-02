<?php
return array(
	'ctrl' => array(
		'title'	=> 'Journal',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title, show',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_jobs.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, showinfrontend',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, showinfrontend, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
                'title' => array(
                    'label' => 'Title',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
            
                'showinfrontend' => array(
                    'exclude' => 1,
                    'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
                    'config' => array(
                            'type' => 'check',
                    ),
		),
            /*
                'publication' => array(
                    'exclude' => 0,
                    'label' => 'Publication',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_publication',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_publication.title',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50,
                        "MM" => "tx_attoworld_domain_model_publicationjournal_mm",
                        'MM_opposite_field' => 'publication'
                    )
                ),
            
                'pressrelease' => array(
                    'exclude' => 0,
                    'label' => 'Pressrelease',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_pressrelease',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_pressrelease.title',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50,
                        "MM" => "tx_attoworld_domain_model_pressreleasejournal_mm",
                        'MM_opposite_field' => 'pressrelease'
                    )
                ),
            
                'audioorvideo' => array(
                    'exclude' => 0,
                    'label' => 'Audio or Video',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_audioorvideo',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_audioorvideo.title',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50,
                        "MM" => "tx_attoworld_domain_model_audioorvideojournal_mm",
                        'MM_opposite_field' => 'audioorvideo'
                    )
                ),
            
                'book' => array(
                    'exclude' => 0,
                    'label' => 'Book',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_book',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_book.title',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50,
                        "MM" => "tx_attoworld_domain_model_bookjournal_mm",
                        'MM_opposite_field' => 'book'
                    )
                ),
            */
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_attoworld_domain_model_jobs',
				'foreign_table_where' => 'AND tx_attoworld_domain_model_jobs.pid=###CURRENT_PID### AND tx_attoworld_domain_model_jobs.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		
	),
);