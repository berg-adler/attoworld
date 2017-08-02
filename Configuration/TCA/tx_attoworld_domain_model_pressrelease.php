<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_pressrelease',
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
        'searchFields' => 'featured,pubdate,title,type,file,description,journal,pageref,volume,publications,authors,publicationcategory,picture,pubtstamp,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_pressrelease.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, featured, pubdate, title, showinpubfilter, type, file, description, journal, pageref, volume, publications, authors, publicationcategory, picture, pubtstamp',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, featured, pubdate, title, showinpubfilter, type, file, description, journal, pageref, volume, publications, authors, publicationcategory, picture, pubtstamp, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
        'showinpubfilter' => array(
            'exclude' => 1,
            'label' => 'Im Publiaktionsfilter anzeigen?',
            'config' => array(
                'type' => 'check',
            ),
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
        'title' => array(
            'label' => 'Title',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'type' => array(
            'label' => 'Type',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => array(
                    array('Press Release', 'pressrelease')
                ),
            ),
        ),
        'pubtstamp' => array(
            'label' => 'Publikations-Timestamp',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        /*
          'publicationcategory' => array(
          'label' => 'Category',
          'config' => array(
          'type' => 'select',
          'foreign_table' => 'tx_attoworld_domain_model_publicationcategory',
          'foreign_table_where' => 'AND tx_attoworld_domain_model_publicationcategory.pid=###CURRENT_PID### AND tx_attoworld_domain_model_publicationcategory.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_attoworld_domain_model_publicationcategory.title DESC',
          'eval' => 'int',
          'checkbox' => '0',
          'default' => 0
          )
          ),
         */
        'featured' => array(
            'label' => 'Featured?',
            'config' => array(
                'type' => 'check',
                "default" => "0"
            )
        ),
        'publicationcategory' => array(
            'exclude' => 0,
            'label' => 'Category',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_publicationcategory',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_publicationcategory.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_publicationcategory_mm",
            )
        ),
        'authors' => array(
            'exclude' => 0,
            'label' => 'Authors',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_person',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_person.surname',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_publicationperson_mm",
            )
        ),
        'publications' => array(
            'exclude' => 0,
            'label' => 'Publication-Junctions',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_publication',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_publication.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_pressreleasepublication_mm",
            )
        ),
        'description' => array(
            'label' => 'Description',
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
        'pubdate' => array(
            'label' => 'Date of Publication',
            'config' => array(
                'type' => 'input',
                'size' => '50',
                'eval' => 'date',
            )
        ),
        'file' => array(
            'label' => 'File',
            'exclude' => 0,
            'config' => array(
                'type' => 'group',
                'internal_type' => 'file',
                "allowed" => "pdf,gif,png,jpeg,jpg",
                "max_size" => 50000,
                // "uploadfolder" => "fileadmin/user_upload/tx_attoworld/publications",
                "show_thumbs" => 1,
                "size" => 5,
                "minitems" => 0,
                "maxitems" => 5,
            )
        ),
        'url' => array(
            'label' => 'URI/URL/Hyperlink',
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
                'foreign_table' => 'tx_attoworld_domain_model_pressrelease',
                'foreign_table_where' => 'AND tx_attoworld_domain_model_pressrelease.pid=###CURRENT_PID### AND tx_attoworld_domain_model_pressrelease.sys_language_uid IN (-1,0)',
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
