// urls
protocol = http
[globalString = IENV:TYPO3_SSL=1]
  protocol = https
[global]
host = localhost/attoworld
[globalString = IENV:HTTP_HOST=localhost/attoworld
    host = localhost/attoworld
[global]


//rootlinerage für seitentitel -> hauptseite beginnt NICHT auf weltkugelebene
[PIDinRootline = 1]
	mpqRootlineRange = 1,-1
[else]
	mpqRootlineRange = 0,-1
[end]

//pfade anlegen
path {
	rel {
		prefix = EXT:attoworld/
		css = {$path.rel.prefix}Resources/Public/css/
		javascript = {$path.rel.prefix}Resources/Public/javascript/
		images = {$path.rel.prefix}Resources/Public/images/
		forms = {$path.rel.prefix}Resources/Private/Forms/
		templates = {$path.rel.prefix}Resources/Private/Templates/
		templatesbase = {$path.rel.prefix}Resources/Private/
		mpquserfunc = {$path.rel.prefix}Resources/Private/Userfunc/
		language = {$path.rel.prefix}Resources/Private/Language/
		icons = {$path.rel.prefix}Resources/Public/Icons/
	}

	full {
		prefix = typo3conf/ext/attoworld/
		css = {$path.full.prefix}Resources/Public/css/
		javascript = {$path.rel.prefix}Resources/Public/javascript/
		images = {$path.full.prefix}Resources/Public/images/
		forms = {$path.full.prefix}Resources/Private/Forms/
		templates = {$path.full.prefix}Resources/Private/Templates/
		templatesbase = {$path.full.prefix}Resources/Private/
		mpquserfunc = {$path.full.prefix}Resources/Private/Userfunc/
		language = {$path.full.prefix}Resources/Private/Language/
		icons = {$path.full.prefix}Resources/Public/Icons/
	}
}

//hauptseite
mpqHauptseite = 1

//formularinhalte
mpqFormPages = TSFE:id=57, TSFE:id=58

//formalien
imprintnavi = 23

//social links
socialLinks = 12

//tt_news
//storage pid
plugin.tt_news{
    useStoragePid = 11
}

//generelle definitionen für bilder im content
styles.content.imgtext.maxW = 1500
styles.content.imgtext.maxWInText = 1500
styles.content.imgtext.linkWrap.width = 1500
styles.content.loginform.pid = 0

plugin.tx_indexedsearch.searchUID = 18