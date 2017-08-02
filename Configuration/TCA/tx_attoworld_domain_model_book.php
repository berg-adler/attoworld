<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_book',
		'label' => 'featured',
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
		'searchFields' => 'featured,pubdate,title,type,file,description,journal,pageref,volume,publications,authors,publicationcategory,picture,pubtstamp,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_book.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, featured, pubdate, title, type, file, description, journal, pageref, volume, publications, authors, firstauthor, lastauthor, sectolastauthor, publicationcategory, picture, pubtstamp',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, featured, pubdate, title, type, file, description, journal, pageref, volume, publications, authors, firstauthor, lastauthor, sectolastauthor, publicationcategory, picture, pubtstamp, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
                'lastauthor' => array(
                    'exclude' => 0,
                    'label' => 'Letzter Author',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_person',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_person.surname',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 1,
                    )
                ),
            
                'firstauthor' => array(
                    'exclude' => 0,
                    'label' => 'Erster Author',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_person',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_person.surname',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 1,
                    )
                ),
            
                'sectolastauthor' => array(
                    'exclude' => 0,
                    'label' => 'Vorletzter Author',
                    'config' => array(
                        'type' => 'select',
                        'foreign_table' => 'tx_attoworld_domain_model_person',
                        'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_person.surname',
                        'size' => 10,
                        'minitems' => 0,
                        'maxitems' => 1,
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
				'foreign_table' => 'tx_attoworld_domain_model_book',
				'foreign_table_where' => 'AND tx_attoworld_domain_model_book.pid=###CURRENT_PID### AND tx_attoworld_domain_model_book.sys_language_uid IN (-1,0)',
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