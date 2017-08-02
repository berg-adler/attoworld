<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi1',
	array(
		'Ajax' => 'filterpublications, getpublications, publicationsearch, newssearch, getjobs, filtermagazins, image, filternews, magazinsearch',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => 'filterpublications, getpublications, publicationsearch, filternews, newssearch, filtermagazins, magazinsearch',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi2',
	array(
		'Elements' => 'publications',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi3',
	array(
		'Elements' => 'filtermaincontent',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi4',
	array(
		'Elements' => 'headerslideshow',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi5',
	array(
		'Elements' => 'contentslideshow',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi6',
	array(
		'Elements' => 'news',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi7',
	array(
		'Elements' => 'jobs',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi8',
	array(
		'Elements' => 'persons',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi9',
	array(
		'Elements' => 'projectcontentslideshow',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi10',
	array(
		'Elements' => 'latestnews',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi11',
	array(
		'Elements' => 'linkonsubpage',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi12',
	array(
		'Elements' => 'linkonsubgroups',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi13',
	array(
		'Elements' => 'breakingnews',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi14',
	array(
		'Elements' => 'featuredpublication',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi15',
	array(
		'Elements' => 'magazines',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi16',
	array(
		'Elements' => 'projectadresses',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi17',
	array(
		'Elements' => 'latestnewsfeature',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi18',
	array(
		'Elements' => 'singlenewsitem',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi19',
	array(
		'Elements' => 'infoaddressbox',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi20',
	array(
		'Elements' => 'personfilter',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi21',
	array(
		'Elements' => 'newsfilter',
		
	),
	// non-cacheable actions
	array(
		'Elements' => 'newsfilter',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi22',
	array(
		'Elements' => 'subsitecontentslideshow',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi23',
	array(
		'Elements' => 'picturewithscrolldown',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi24',
	array(
		'Elements' => 'createowncache',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi25',
	array(
		'Elements' => 'javascriptconfiguration',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi26',
	array(
		'Elements' => 'nextappearances',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi27',
	array(
		'Elements' => 'coverstories',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi28',
	array(
		'Elements' => 'milestones',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi29',
	array(
		'Elements' => 'graphicalabstract',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi30',
	array(
		'Elements' => 'zitat',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi31',
	array(
		'Elements' => 'progressreports',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi32',
	array(
		'Elements' => 'slideshow',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi33',
	array(
		'Elements' => 'pictureforsubsitewithlink',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ferenckrausz.' . $_EXTKEY,
	'Pi34',
	array(
		'Elements' => 'paperarchiv',
		
	),
	// non-cacheable actions
	array(
		'Elements' => '',
		'Ajax' => '',
		
	)
);