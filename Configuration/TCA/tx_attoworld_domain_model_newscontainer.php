<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_newscontainer',
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
		'searchFields' => 'pubdate,title,author,image,pressrelease, news, job, bodytext,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_news.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, pubdate, title, author, image, pressrelease, news, job, bodytext, isbreaking',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, pubdate, title, author, image, pressrelease, news, job, bodytext, isbreaking,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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

                'isbreaking' => array(
                    'label' => 'Breaking News?',
                    'config' => array(
                        'type' => 'check',
                        "default" => "0",
                        "eval" => "required",
                    )
                ),
            
                'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
            

                'bodytext' => array(
                    'label' => 'Bodytext',
                    'exclude' => 0,
                    'defaultExtras' => 'richtext[*]',
                    'config' => array(
                        'type' => 'text',
                        'eval' => 'trim',
                        'rows' => 30,
                        'cols' => 80,
                        'wizards' => array(
                            '_PADDING' => 4,
                            'RTE' => array(
                                'notNewRecords' => 1,
                                'RTEonly' => 1,
                                'type' => 'script',
                                'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
                                'icon' => 'wizard_rte2.gif',
                                'module' => array(
	'name' => 'wizard_element_browser',
	'urlParameters' => array(
		'mode' => 'wizard',
		'act' => 'file'
	)
)
                            ),
                        ),
                    )
                ),


                'pressrelease' => array(
                    'exclude' => 0,
                    'label' => 'Pressreleases',
                    'config' => array(
                        'items' => array(
                            array(' --- Bitte wählen --- ',0)
                        ),
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_pressrelease',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_pressrelease.title',
                        'size' => 1,
                        'minitems' => 0,
                        'maxitems' => 1,
                    )
                ),
            
                'job' => array(
                    'exclude' => 0,
                    'label' => 'Jobs',
                    'config' => array(
                        'items' => array(
                            array(' --- Bitte wählen --- ',0)
                        ),
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_jobs',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_jobs.title',
                        'size' => 1,
                        'minitems' => 0,
                        'maxitems' => 1,
                    )
                ),
            
                'news' => array(
                    'exclude' => 0,
                    'label' => 'Newsitems',
                    'config' => array(
                        'items' => array(
                            array(' --- Bitte wählen --- ',0)
                        ),
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_jobs',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_jobs.title',
                        'size' => 1,
                        'minitems' => 0,
                        'maxitems' => 1,
                    )
                ),

                'image' => array(
                    'label' => 'File',
                    'exclude' => 0,
                    'config' => array(
                        'type' => 'group',
                        'internal_type' => 'file',
                        "allowed" => "pdf,gif,png,jpeg,jpg",
                        "max_size" => 50000,
                        // "uploadfolder" => "fileadmin/user_upload/tx_attoworld",
                        "show_thumbs" => 1,
                        "size" => 5,
                        "minitems" => 0,
                        "maxitems" => 5,
                    )
                ),
            
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
				'foreign_table' => 'tx_attoworld_domain_model_newscontainer',
				'foreign_table_where' => 'AND tx_attoworld_domain_model_newscontainer.pid=###CURRENT_PID### AND tx_attoworld_domain_model_newscontainer.sys_language_uid IN (-1,0)',
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