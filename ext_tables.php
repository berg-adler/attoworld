<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi1',
	'Ajax'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi2',
	'Publications'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi3',
	'Filter'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi4',
	'Header-Slideshow'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi5',
	'Content-Slideshow'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi6',
	'News'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi7',
	'Jobs'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi8',
	'Persons'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi9',
	'Projectcontentslideshow'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi10',
	'Latestnews'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi11',
	'LinkOnSubpage'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi12',
	'LinkOnSubgroups'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi13',
	'Breaking News'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi14',
	'Featuredpublications'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi15',
	'Magazines'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi16',
	'ProjectAdresses'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi17',
	'LatestNewsFeature'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi18',
	'SingleNewsItem'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi19',
	'InfoAddressBox'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi20',
	'Personfilter'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi21',
	'Newsfilter'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi22',
	'Subsite-Contentslideshow'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi23',
	'PictureWithScrollDown'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi24',
	'Create Cache'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi25',
	'Javascript-Configuration'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi26',
	'Next Appearances'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi27',
	'Coverstories'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi28',
	'Milestones'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi29',
	'Graphical Abstact'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi30',
	'Zitat'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi31',
	'Progress Reports'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi32',
	'Slideshow'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi33',
	'Picture for Subsites (with Link opportunity)'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi34',
	'Paperarchiv'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Attoworld');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_elements', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_elements.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_elements');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_ajax', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_ajax.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_ajax');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_address', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_address.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_address');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_audioorvideo', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_audioorvideo.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_audioorvideo');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_book', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_book.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_book');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_breakingnews', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_breakingnews.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_breakingnews');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_content', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_content.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_content');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_filterelement', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_filterelement.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_filterelement');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_jobs', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_jobs.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_jobs');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_linkonsubgroup', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_linkonsubgroup.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_linkonsubgroup');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_linkonsubpage', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_linkonsubpage.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_linkonsubpage');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_location', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_location.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_location');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_magazin', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_magazin.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_magazin');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_nation', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_nation.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_nation');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_news', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_news.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_news');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_newscontainer', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_newscontainer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_newscontainer');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_newspaper', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_newspaper.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_newspaper');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_nextappearance', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_nextappearance.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_nextappearance');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_person', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_person.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_person');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_personaddress', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_personaddress.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_personaddress');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_personcategory', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_personcategory.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_personcategory');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_personemail', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_personemail.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_personemail');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_personposition', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_personposition.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_personposition');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_personsubgroup', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_personsubgroup.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_personsubgroup');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_pressrelease', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_pressrelease.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_pressrelease');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_project', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_project.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_project');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_publication', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_publication.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_publication');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_publicationcategory', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_publicationcategory.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_publicationcategory');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_slide', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_slide.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_slide');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_videos', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_videos.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_videos');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_coverstory', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_coverstory.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_coverstory');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_milestone', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_milestone.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_milestone');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_attoworld_domain_model_paperarchiv', 'EXT:attoworld/Resources/Private/Language/locallang_csh_tx_attoworld_domain_model_paperarchiv.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_attoworld_domain_model_paperarchiv');