<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_project',
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
        'searchFields' => 'title,shorttitle,image,description,oneliner,address,active,member,page,pagepid,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_project.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, shorttitle, image, description, oneliner, address, active, member, page, pagepid',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, shorttitle, image, description, oneliner, address, active, member, page, pagepid, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'oneliner' => array(
            'label' => 'Oneliner-Text',
            'config' => array(
                'type' => 'input',
                'size' => '255'
            )
        ),
        'title' => array(
            'label' => 'Title',
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
        'page' => array(
            'label' => 'Typo3-Seite',
            'config' => array(
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'pages, tt_content',
                'wizards' => array(
                    'suggest' => array(
                        'type' => 'suggest',
                        'default' => array(
                            'searchWholePhrase' => 1
                        ),
                        'pages' => array(
                            'searchCondition' => 'doktype = 1'
                        )
                    ),
                ),
                'size' => 1,
                'minitems' => 1,
                'maxitems' => 1,
            )
        ),
        'pagepid' => array(
            'label' => 'Typo3-Seiten-PID',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'member' => array(
            'exclude' => 0,
            'label' => 'Category',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_person',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_person.surname',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 200,
                "MM" => "tx_attoworld_domain_model_projectperson_mm",
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
        'address' => array(
            'label' => 'Address',
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
                'foreign_table' => 'tx_attoworld_domain_model_project',
                'foreign_table_where' => 'AND tx_attoworld_domain_model_project.pid=###CURRENT_PID### AND tx_attoworld_domain_model_project.sys_language_uid IN (-1,0)',
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
