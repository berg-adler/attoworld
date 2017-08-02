/*
 * Basis-Seitentyposcriptkonfiguration
 */

page {
    includeCSS {
        default = typo3conf/ext/attoworld/Resources/Public/css/default.css
        fonts = typo3conf/ext/attoworld/Resources/Public/css/fonts.css
        tanya = typo3conf/ext/attoworld/Resources/Public/css/tanya_css.css
        jqueryui = https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css
    }
    includeJSlibs {
        jquery = https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js
        jqueryuijs = https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js
        isotope = https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js
        tinycarousel = /typo3conf/ext/attoworld/Resources/Public/javascript/jquery.tinycarousel.js
        autogrow = /typo3conf/ext/attoworld/Resources/Public/javascript/jquery.autogrow.js
        
        pageeffects = /typo3conf/ext/attoworld/Resources/Public/javascript/pageEffects.js
        mathjax = https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-MML-AM_CHTML
        
        #mainconfiguration = http://testatto2.physik.uni-muenchen.de?id=122
    }
    shortcutIcon = favicon.ico
    includeJSFooter >
    includeJSFooterlibs >
    
    
    
    // Javascript zur Berechnung der Font-Size
    bodyTagCObject = TEXT
    bodyTagCObject.field= uid
    bodyTagCObject.wrap = <body class="page-|">
    headerData {
        
        101 = TEXT
        101.value = <link rel="shortcut icon" href="/typo3conf/ext/attoworld/Resources/Public/Icons/favicon.png">
            
        102 = TEXT
        102.value (
            <script type="text/x-mathjax-config;executed=true">
                MathJax.Hub.Config({
                    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
                });
            </script>
        )
    }
    
    
}
       
[globalVar = TSFE:id!=5]
page.headerData {
    100 = TEXT
    100 {
        field = title
        noTrimWrap = |<title>Attoworld / |</title>|
    }
}
[global]       
[globalVar = TSFE:id=1]
page.headerData {
    100 = TEXT
    100 {
        field = title
        noTrimWrap = |<title>Attoworld</title>|
    }
}
[global]       
                      
ajax_api = PAGE
ajax_api {
  typeNum = 6666
  config {
    disableAllHeaderCode = 1
    xhtml_cleaning = 0
    admPanel = 0
    additionalHeaders = Content-type: text/plain
    no_cache = 0
    cache = 1
    #debug = 0
  }
 
  10 < tt_content.list.20.attoworld_pi1
}

#TEMPLATE FORMHANDLER START
<INCLUDE_TYPOSCRIPT: source="FILE:fileadmin/formhandler/basic-examples/ajax-submit/ts/ts_setup.txt">
 
