<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_filterelement',
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
		'searchFields' => 'title,subtitle,image,size,linkjobs,linknews,linknextappearance,linkextern,oneliner,pageid,linkreference,anchor,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_filterelement.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, subtitle, image, size, linkjobs, linknews, linknextappearance, linkextern, oneliner, pageid, linkreference, anchor',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, subtitle, image, size, linkjobs, linknews, linknextappearance, linkextern, oneliner, pageid, linkreference, anchor, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
                'subtitle' => array(
                    'label' => 'Subtitle',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
                    )
                ),
                'linkreference' => array(
                    'exclude' => 0,
                    'label' => 'Link to page',
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
                'image' => array(
                    'label' => 'File',
                    'exclude' => 0,
                    'config' => array(
                        'type' => 'group',
                        'internal_type' => 'file',
                        "allowed" => "gif,png,jpeg,jpg",
                        "max_size" => 50000,
                        // "uploadfolder" => "fileadmin/user_upload/tx_attoworld/filterelements",
                        "show_thumbs" => 1,
                        "size" => 5,
                        "minitems" => 0,
                        "maxitems" => 5,
                    )
                ),
                'size' => array(
                    'label' => 'Size',
                    'config' => array(
                        'type' => 'select',
                        'size' => '1',
                        'eval' => 'int',
                        'items' => array(
                            array('small', '0'),
                            array('tall', '1'),
                            array('big', '2'),
                        )
                    )
                ),

                'linknews' => array(
                    'exclude' => 0,
                    'label' => 'Link News-Item',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_news',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_news.title',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50
                    )
                ),
                'linkjobs' => array(
                    'exclude' => 0,
                    'label' => 'Link Job',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_jobs',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_jobs.title',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50
                    )
                ),
                'linknextappearance' => array(
                    'exclude' => 0,
                    'label' => 'Link Next Appearance',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_nextappearance',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_nextappearance.elementtitle',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 50
                    )
                ),
                'linkextern' => array(
                    'label' => 'Link extern',
                    'config' => array(
                        'type' => 'input',
                        'size' => '255',
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
				'foreign_table' => 'tx_attoworld_domain_model_filterelement',
				'foreign_table_where' => 'AND tx_attoworld_domain_model_filterelement.pid=###CURRENT_PID### AND tx_attoworld_domain_model_filterelement.sys_language_uid IN (-1,0)',
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