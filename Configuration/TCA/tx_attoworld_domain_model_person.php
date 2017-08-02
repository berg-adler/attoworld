<?php

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:attoworld/Resources/Private/Language/locallang_db.xlf:tx_attoworld_domain_model_person',
        'label' => 'surname',
        'sortby' => 'sorting',
        'default_sortby' => 'sorting',
        'label_alt' => 'forename',
        'label_alt_force' => 1,
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
        'searchFields' => 'surname,forename,title,gender,image,curriculumvitae,publicationsbefore,address,member,onwebpage,isgroupleader,subgroup,contact,category,nation,publications,position,researchtext,projecttext',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('attoworld') . 'Resources/Public/Icons/tx_attoworld_domain_model_person.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, surname, forename, title, description, gender, image, curriculumvitae, publicationsbefore, address, member, onwebpage, isgroupleader, subgroup, contact, category, nation, publications, position, researchtext, projecttext',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, surname, forename, title, gender, description, image, curriculumvitae, publicationsbefore, address, member, onwebpage, isgroupleader, subgroup, contact, category, nation, publications, position, researchtext, projecttext --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'researchtext' => array(
            'label' => 'Research text',
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
        'projecttext' => array(
            'label' => 'Research text',
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
        'description' => array(
            'label' => 'Full text',
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
        'category' => array(
            'exclude' => 0,
            'label' => 'Category',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_personcategory',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_personcategory.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_personcategory_mm",
            )
        ),
        'position' => array(
            'exclude' => 0,
            'label' => 'Position',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_personposition',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_personposition.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_personposition_mm",
            )
        ),
        'isgroupleader' => array(
            'label' => 'Is ProjectCoordinator?',
            'config' => array(
                'type' => 'check',
                "default" => "0"
            )
        ),
        'title' => array(
            'label' => 'Titel',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'forename' => array(
            'label' => 'Forename',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'surname' => array(
            'label' => 'Surname',
            'config' => array(
                'type' => 'input',
                'size' => '255',
            )
        ),
        'subgroup' => array(
            'exclude' => 0,
            'label' => 'Subgroup',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_personsubgroup',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_personsubgroup.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_personsubgroup_mm",
            )
        ),
        'curriculumvitae' => array(
            'label' => 'CV',
            'exclude' => 0,
            'config' => array(
                'type' => 'group',
                'internal_type' => 'file',
                "allowed" => "gif,png,jpeg,jpg,pdf",
                "max_size" => 50000,
                "show_thumbs" => 1,
                "size" => 5,
                "minitems" => 0,
                "maxitems" => 5,
            )
        ),
        'publicationsbefore' => array(
            'label' => 'Publicationsbefore',
            'exclude' => 0,
            'config' => array(
                'type' => 'group',
                'internal_type' => 'file',
                "allowed" => "gif,png,jpeg,jpg,pdf",
                "max_size" => 50000,
                "show_thumbs" => 1,
                "size" => 5,
                "minitems" => 0,
                "maxitems" => 5,
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
                "show_thumbs" => 1,
                "size" => 5,
                "minitems" => 0,
                "maxitems" => 5,
            )
        ),
        'gender' => array(
            'label' => 'Gender',
            'config' => array(
                'type' => 'select',
                'size' => '1',
                'eval' => 'int',
                'items' => array(
                    array('Unknown', ''),
                    array('Female', 'female'),
                    array('Male', 'male')
                )
            )
        ),
        'member' => array(
            'label' => 'Member',
            'config' => array(
                'type' => 'select',
                'size' => '1',
                'eval' => 'int',
                'items' => array(
                    array('Unknown', '0'),
                    array('No-Member', '1'),
                    array('Ex-Member', '2'),
                    array('Member', '3'),
                )
            )
        ),
        'nation' => array(
            'exclude' => 0,
            'label' => 'Nation',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_nation',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_nation.title',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_personnation_mm",
            )
        ),
        'contact' => array(
            'exclude' => 0,
            'label' => 'Contact',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_attoworld_domain_model_person',
                'foreign_table_where' => 'ORDER BY tx_attoworld_domain_model_person.surname',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 50,
                "MM" => "tx_attoworld_domain_model_personcontact_mm",
            )
        ),
        'address' => array(
            'label' => 'Address',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_attoworld_domain_model_personaddress',
                'foreign_field' => 'tx_attoworld_domain_model_person',
                'foreign_label' => 'tx_attoworld_domain_model_location',
            ),
        ),
        'email' => array(
            'label' => 'E-Mail-Addresse',
            'config' => array(
                'type' => 'inline',
                'foreign_table' => 'tx_attoworld_domain_model_personemail',
                'foreign_field' => 'tx_attoworld_domain_model_person',
            ),
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
                'foreign_table' => 'tx_attoworld_domain_model_person',
                'foreign_table_where' => 'AND tx_attoworld_domain_model_person.pid=###CURRENT_PID### AND tx_attoworld_domain_model_person.sys_language_uid IN (-1,0)',
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
