<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_news',
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
        'searchFields' => 'pubdate,realyear,title,author,image,file,joinid, refid, pressrelease,publinktext,bodytext,contacts,groups,isscientific',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_news.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, featured, breaking, pubdate, realyear, title, fulltexten, author, image, file, joinid, refid, pressrelease, publinktext, bodytext, contacts, groups, isscientific, shorttexten',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, pubdate, realyear, featured, breaking, title, fulltexten, author, image, file, joinid, refid, pressrelease, publinktext, bodytext, contacts, groups, isscientific, shorttexten, starttime, endtime'),
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
        'refid' => array(
            'label' => 'Refid',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'joinid' => array(
            'label' => 'Joinid',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'realyear' => array(
            'label' => 'Jahr',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'groups' => array(
            'exclude' => 0,
            'label' => 'Category',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_project',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_project.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
            )
        ),
        'isscientific' => array(
            'label' => 'Type',
            'config' => array(
                'type' => 'select',
                'size' => '1',
                'eval' => 'int',
                'items' => array(
                    array('Team', '0'),
                    array('Scientific', '1'),
                    array('Graduation', '2'),
                )
            )
        ),
        /*
          'isscientific' => array(
          'exclude' => 1,
          'label' => 'Scientific',
          'config' => array(
          'type' => 'check',
          ),
          ),
         */
        'featured' => array(
            'exclude' => 1,
            'label' => 'Featured',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'breaking' => array(
            'exclude' => 1,
            'label' => 'Is Breaking?',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'pubdate' => array(
            'label' => 'Date of Publication',
            'config' => array(
                'type' => 'input',
                'size' => '50',
                'eval' => 'datetime',
            )
        ),
        'fulltexten' => array(
            'label' => 'Fulltext',
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
        'shorttexten' => array(
            'label' => 'Shorttext',
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
        'contacts' => array(
            'label' => 'Contacts',
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
        'publinktext' => array(
            'label' => 'Publinktext',
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
            'label' => 'Verknüpftes Pressrelease',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_pressrelease',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_pressrelease.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 1,
            )
        ),
        'author' => array(
            'label' => 'Authors',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'file' => array(
            'label' => 'File',
            'exclude' => 0,
            'config' => array(
                'type' => 'group',
                'internal_type' => 'file',
                "allowed" => "pdf",
                "max_size" => 50000,
                // "uploadfolder" => "fileadmin/user_upload/tx_attoworld",
                "show_thumbs" => 1,
                "size" => 5,
                "minitems" => 0,
                "maxitems" => 5,
            )
        ),
        'image' => array(
            'label' => 'Image',
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
                'foreign_table' => 'tx_attoworld_domain_model_news',
                'foreign_table_where' => 'AND tx_attoworld_domain_model_news.pid=###CURRENT_PID### AND tx_attoworld_domain_model_news.sys_language_uid IN (-1,0)',
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
