#
# Table structure for table 'tx_attoworld_domain_model_journal'
#
CREATE TABLE tx_attoworld_domain_model_journal (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        title varchar(255) DEFAULT '' NOT NULL,
        webcat varchar(255) DEFAULT '' NOT NULL,
        `showinpubfilter` int(11) NOT NULL DEFAULT '0',

        `picture` tinytext NOT NULL,
        showinfrontend tinyint(4) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_attoworld_domain_model_coverstory'
#
CREATE TABLE tx_attoworld_domain_model_coverstory (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        title varchar(255) DEFAULT '' NOT NULL,
        coverdate int(11) unsigned DEFAULT '0' NOT NULL,
        journal varchar(255) DEFAULT '' NOT NULL,
        journaltext varchar(255) DEFAULT '' NOT NULL,
        image tinytext NOT NULL,
        pressrelease tinytext NOT NULL,
        bodytext longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `file` tinytext NOT NULL,
        
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_attoworld_domain_model_milestone'
#
CREATE TABLE tx_attoworld_domain_model_milestone (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        title varchar(255) DEFAULT '' NOT NULL,
        image tinytext NOT NULL,
        bodytext longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_attoworld_domain_model_elements'
#
CREATE TABLE tx_attoworld_domain_model_elements (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_attoworld_domain_model_ajax'
#
CREATE TABLE tx_attoworld_domain_model_ajax (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)
);

#
# Table structure for table 'tx_attoworld_domain_model_address'
#
CREATE TABLE tx_attoworld_domain_model_address (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	zipcode varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	street varchar(255) DEFAULT '' NOT NULL,
	streetnumber varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_audioorvideo'
#
CREATE TABLE tx_attoworld_domain_model_audioorvideo (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`doi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pubdate` int(11) NOT NULL DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `pubtstamp` int(11) DEFAULT '0',
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `picture` tinytext NOT NULL,
`showinpubfilter` int(11) NOT NULL DEFAULT '0',
        `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `journal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_book'
#
CREATE TABLE tx_attoworld_domain_model_book (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
`showinpubfilter` int(11) NOT NULL DEFAULT '0',
	`doi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pubdate` int(11) NOT NULL DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `pubtstamp` int(11) DEFAULT '0',
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

        `picture` tinytext NOT NULL,
        
        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `journal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_breakingnews'
#
CREATE TABLE tx_attoworld_domain_model_breakingnews (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	image varchar(255) DEFAULT '' NOT NULL,
	bodytext varchar(255) DEFAULT '' NOT NULL,
	link varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_content'
#
CREATE TABLE tx_attoworld_domain_model_content (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	header varchar(255) DEFAULT '' NOT NULL,
	contet_type varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_filterelement'
#
CREATE TABLE tx_attoworld_domain_model_filterelement (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`pageid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
        `size` int(11) DEFAULT '0',

        `linkreference` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `anchor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `linknews` tinytext NOT NULL,
        `linkjobs` tinytext NOT NULL,
        `linknextappearance` tinytext NOT NULL,
        `linkextern` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_jobs'
#
CREATE TABLE tx_attoworld_domain_model_jobs (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `gwdglink` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `personsubgroup` tinytext NOT NULL,

        `fulltextdescription` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_linkonsubgroup'
#
CREATE TABLE tx_attoworld_domain_model_linkonsubgroup (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `leader` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `leaderj` tinytext NOT NULL,
        `shorttitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `bodytext` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `uri` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageidanchor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_linkonsubpage'
#
CREATE TABLE tx_attoworld_domain_model_linkonsubpage (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `copyright` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageid` int(11) DEFAULT '0',        
        `pageidanchor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,      

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_location'
#
CREATE TABLE tx_attoworld_domain_model_location (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `addfirstline` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `addsecondline` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `streetnumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `zipcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_magazin'
#
CREATE TABLE tx_attoworld_domain_model_magazin (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`doi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pubdate` int(11) NOT NULL DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `pubtstamp` int(11) DEFAULT '0',

        `picture` tinytext NOT NULL,
`showinpubfilter` int(11) NOT NULL DEFAULT '0',
        `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `journal` tinytext NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_nation'
#
CREATE TABLE tx_attoworld_domain_model_nation (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `iso2alpha` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_news'
#
CREATE TABLE tx_attoworld_domain_model_news (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`pubdate` int(11) NOT NULL DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `breaking` int(11) NOT NULL DEFAULT '0',

        `joinid` int(11) NOT NULL DEFAULT '0',
        `refid` int(11) NOT NULL DEFAULT '0',

        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `realyear` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `bodytext` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
        `groups` tinytext NOT NULL,

        `isscientific` int(11) NOT NULL DEFAULT '0',
        `fulltexten` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `shorttexten` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `file` tinytext NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `pressrelease` tinytext NOT NULL,
        `contacts` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `author` tinytext NOT NULL,
        `publinktext` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_newscontainer'
#
CREATE TABLE tx_attoworld_domain_model_newscontainer (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `bodytext` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
        `pressrelease` tinytext NOT NULL,
        `news` tinytext NOT NULL,
        `job` tinytext NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,
        isbreaking int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_newspaper'
#
CREATE TABLE tx_attoworld_domain_model_newspaper (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`doi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pubdate` int(11) NOT NULL DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `pubtstamp` int(11) DEFAULT '0',
        sorting int(11) unsigned DEFAULT '0' NOT NULL,
`showinpubfilter` int(11) NOT NULL DEFAULT '0',
        `picture` tinytext NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `journal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_nextappearance'
#
CREATE TABLE tx_attoworld_domain_model_nextappearance (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `organizer` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `elementtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `time` int(11) NOT NULL DEFAULT '0',
        `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_person'
#
CREATE TABLE tx_attoworld_domain_model_person (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`isgroupleader` int(11) NOT NULL DEFAULT '0',
        `forename` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
        `nation` tinytext NOT NULL,

        `researchtext` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `projecttext` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        

        `address` tinyint(4) NOT NULL DEFAULT '0',
        `subgroup` tinytext NOT NULL,
        `category` tinytext NOT NULL,
        `contact` tinytext NOT NULL,
        `email` tinytext NOT NULL,
        `position` tinytext NOT NULL,

        `curriculumvitae` tinytext NOT NULL,
        `publicationsbefore` tinytext NOT NULL,

        `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `member` int(11) DEFAULT '0',
        `onwebpage` int(11) DEFAULT '0',
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_personaddress'
#
CREATE TABLE tx_attoworld_domain_model_personaddress (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        `tx_attoworld_domain_model_person` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `person` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `data` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `phonenumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `roomnumber` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `kind` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `data` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_personcategory'
#
CREATE TABLE tx_attoworld_domain_model_personcategory (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `viewtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_personemail'
#
CREATE TABLE tx_attoworld_domain_model_personemail (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`tx_attoworld_domain_model_person` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `person` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        
`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_personposition'
#
CREATE TABLE tx_attoworld_domain_model_personposition (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_personsubgroup'
#
CREATE TABLE tx_attoworld_domain_model_personsubgroup (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `identifier` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `shortname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,
        `members` tinytext NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_pressrelease'
#
CREATE TABLE tx_attoworld_domain_model_pressrelease (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`doi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pubdate` int(11) NOT NULL DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `pubtstamp` int(11) DEFAULT '0',

        sorting int(11) unsigned DEFAULT '0' NOT NULL,
        `picture` tinytext NOT NULL,

        `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `journal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`showinpubfilter` int(11) NOT NULL DEFAULT '0',
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_project'
#
CREATE TABLE tx_attoworld_domain_model_project (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `shorttitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

        `pagepid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `image` tinytext NOT NULL,
        `address` longtext NOT NULL,
        `page` tinytext NOT NULL,
        `member` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_publication'
#
CREATE TABLE tx_attoworld_domain_model_publication (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`doi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `shorttitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `oneliner` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `editors` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
        `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `active` int(11) DEFAULT '1',
        `member` tinytext NOT NULL,
        `locations` tinytext NOT NULL,
        `page` tinytext NOT NULL,
        `pagepid` int(11) NOT NULL DEFAULT '0',
        `pubdate` int(11) NOT NULL DEFAULT '0',
        `pubtstamp` int(11) DEFAULT '0',
        `featured` int(11) NOT NULL DEFAULT '0',
        `picture` tinytext NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,
        `publicationcategory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `showinpubfilter` int(11) NOT NULL DEFAULT '0',

        `volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pageref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `journal` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

        `authors` tinytext NOT NULL,
        `publications` tinytext NOT NULL,
        `file` tinytext NOT NULL,
        `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);


#
# Table structure for table 'tx_attoworld_domain_model_paperarchiv'
#
CREATE TABLE tx_attoworld_domain_model_paperarchiv (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        `identifier` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`isarchived` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `needsarchive` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `publication` tinytext NOT NULL,
        
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);



#
# Table structure for table 'tx_attoworld_domain_model_publicationcategory'
#
CREATE TABLE tx_attoworld_domain_model_publicationcategory (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_slide'
#
CREATE TABLE tx_attoworld_domain_model_slide (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `shorttitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `titleinpicture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `pagepid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `anchor` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
        `image` tinytext NOT NULL,
	active int(11) DEFAULT '0' NOT NULL,
        newsid int(11) DEFAULT '0' NOT NULL,
        `type` int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_attoworld_domain_model_videos'
#
CREATE TABLE tx_attoworld_domain_model_videos (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

        `lastauthor` int(11) NOT NULL DEFAULT '0',
        `firstauthor` int(11) NOT NULL DEFAULT '0',
        `sectolastauthor` int(11) NOT NULL DEFAULT '0',

	title varchar(255) DEFAULT '' NOT NULL,
	videocategory varchar(255) DEFAULT '' NOT NULL,
	mediathekcategory varchar(255) DEFAULT '' NOT NULL,
	image varchar(255) DEFAULT '' NOT NULL,
	image21zu9 varchar(255) DEFAULT '' NOT NULL,
	videomp4mobile varchar(255) DEFAULT '' NOT NULL,
	videomp4sd varchar(255) DEFAULT '' NOT NULL,
	videomp4hd varchar(255) DEFAULT '' NOT NULL,
	videowebmmobile varchar(255) DEFAULT '' NOT NULL,
	videowebmsd varchar(255) DEFAULT '' NOT NULL,
	videowebmhd varchar(255) DEFAULT '' NOT NULL,
	videoogvmobile varchar(255) DEFAULT '' NOT NULL,
	videoogvsd varchar(255) DEFAULT '' NOT NULL,
	videoogvhd varchar(255) DEFAULT '' NOT NULL,
	keywords varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
        sorting int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_publicationlocation_mm`
CREATE TABLE `tx_attoworld_domain_model_publicationlocation_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_personsubgroup_mm`
CREATE TABLE `tx_attoworld_domain_model_personsubgroup_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_publicationcategory_mm`
CREATE TABLE `tx_attoworld_domain_model_publicationcategory_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_publicationperson_mm`
CREATE TABLE `tx_attoworld_domain_model_publicationperson_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_publicationpublication_mm`
CREATE TABLE `tx_attoworld_domain_model_publicationpublication_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_pressreleasepublication_mm`
CREATE TABLE `tx_attoworld_domain_model_pressreleasepublication_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_newspaperpublication_mm`
CREATE TABLE `tx_attoworld_domain_model_newspaperpublication_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_magazinpublication_mm`
CREATE TABLE `tx_attoworld_domain_model_magazinpublication_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_personaddress`
CREATE TABLE `tx_attoworld_domain_model_personaddress_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_personnation`
CREATE TABLE `tx_attoworld_domain_model_personnation_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_personcontact`
CREATE TABLE `tx_attoworld_domain_model_personcontact_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_personcategory`
CREATE TABLE `tx_attoworld_domain_model_personcategory_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_personcategory`
CREATE TABLE `tx_attoworld_domain_model_personposition_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_projectperson_mm`
CREATE TABLE `tx_attoworld_domain_model_projectperson_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_projectperson_mm`
CREATE TABLE `tx_attoworld_domain_model_assiprojectperson_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_publicationjournal_mm`
CREATE TABLE `tx_attoworld_domain_model_publicationjournal_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_pressreleasejournal_mm`
CREATE TABLE `tx_attoworld_domain_model_pressreleasejournal_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_newspaperjournal_mm`
CREATE TABLE `tx_attoworld_domain_model_newspaperjournal_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_paperarchivpublication_mm`
CREATE TABLE `tx_attoworld_domain_model_paperarchivpublication_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Tabellenstruktur für Tabelle `tx_attoworld_domain_model_magazinjournal_mm`
CREATE TABLE `tx_attoworld_domain_model_magazinjournal_mm` (
  `uid_local` int(11) unsigned DEFAULT '0',
  `uid_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL,
  `sorting` int(11) unsigned NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) unsigned NOT NULL DEFAULT '0',
  KEY `uid_local` (`uid_local`),
  KEY `uid_foreign` (`uid_foreign`),
  KEY `uid_local_2` (`uid_local`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;