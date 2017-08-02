<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_slide',
		'label' => 'title',
            
                'sortby' => 'sorting',
                'default_sortby' => 'sorting',
            
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
		'searchFields' => 'image,shorttitle,title,titleinpicture,active,pagepid,newsid,anchor',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_slide.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, image, shorttitle, title, titleinpicture, type, active, pagepid, newsid, anchor',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, image, shorttitle, title, titleinpicture, type, active, pagepid, newsid, anchor, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
                'title' => array(
                    'label' => 'Titel',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
            
                'type' => array(
                    'label' => 'Type',
                    'config' => array(
                        'type' => 'select',
                        'size' => '1',
                        'eval' => 'int',
                        'items' => array(
                            array('Others', '0'),
                            array('Team', '1'),
                            array('Publication', '2'),
                            array('Research Activities', '3'),
                            array('Learn More', '4'),
                            array('News', '5'),
                            array('Intern-Link', '6'),
                            array('Pressrelease', '7')
                        )
                    )
                ),
            
                'newsid' => array(
                    'label' => 'ID (Entweder für die News oder die entsprechende PID der Unterseite)',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
            
                'pagepid' => array(
                    'label' => 'PagePID (Parameter für zusätzliche Informationen für Plugins wie bspw. die Filter)',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
                'anchor' => array(
                    'label' => 'Anchor',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
            
                'titleinpicture' => array(
                    'label' => 'Titel in Picture',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
                'shorttitle' => array(
                    'label' => 'Shorttitle',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
                'image' => array(
                    'label' => 'Image',
                    'exclude' => 0,
                    'config' => array(
                        'type' => 'group',
                        'internal_type' => 'file',
                        "allowed" => "gif,png,jpeg,jpg,svg,ai",
                        "max_size" => 50000,
                        // "uploadfolder" => "fileadmin/user_upload/tx_attoworld/slides",
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
				'foreign_table' => 'tx_attoworld_domain_model_slide',
				'foreign_table_where' => 'AND tx_attoworld_domain_model_slide.pid=###CURRENT_PID### AND tx_attoworld_domain_model_slide.sys_language_uid IN (-1,0)',
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