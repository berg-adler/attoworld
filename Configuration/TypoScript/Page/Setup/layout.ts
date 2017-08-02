/*
 * Basis-Layout-Datei
 */





// Haupt-Navigation
lib.Navigation = HMENU
lib.Navigation {
    # einstiegs level
    entryLevel = 0

    1 = TMENU
    1 {
        wrap = <ul class="clearfix">|</ul>
        expAll = 1
        # kein onfocus="blurLink(this);" bei den links, sonst Tabulator Probleme im IE
        noBlur = 1

        NO {
            wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
            stdWrap.htmlSpecialChars = 1
            /*
            ATagTitle {
                field = abstract // title
                htmlSpecialChars = 1
            }
            */
            ATagParams.cObject = TEXT
            ATagParams.cObject {
                value = class="unselected"
                insertData = 1
            }
        }

        CUR < .NO
        CUR = 1
        CUR {
            wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
            ATagParams.cObject.value = class="selected"
        }

        ACT < .NO
        ACT = 1
        ACT {
            wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
            ATagParams.cObject.value = class="selected"
        }
    }
/*
    2 < .1
    2 {
        wrap = <ul class="clearfix">|</ul>
        NO {
            wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
            ATagParams = class="subSubLink"
        }
        CUR < .NO
        CUR = 1

        CUR {
            doNotLinkIt = 1
        }
    }
*/
}

// Projekt-Navigation
lib.ProjectNavigation = COA
lib.ProjectNavigation {

    10 = HMENU
    10 {

        special = directory
        special.value = 3

        # einstiegs level
        entryLevel = 0

        1 = TMENU
        1 {
            wrap = <ul class="clearfix">|</ul>
            expAll = 1
            # kein onfocus="blurLink(this);" bei den links, sonst Tabulator Probleme im IE
            noBlur = 1

            NO {
                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
                stdWrap.htmlSpecialChars = 1
                /*
                ATagTitle {
                    field = abstract // title
                    htmlSpecialChars = 1
                }
                */
                ATagParams.cObject = TEXT
                ATagParams.cObject {
                    value = class="unselected"
                    insertData = 1
                }
            }

            CUR < .NO
            CUR = 1
            CUR {
                stdWrap.field = title
                ATagTitle.field = nav_title

                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
                ATagParams.cObject.value = class="selected"
            }

            ACT < .NO
            ACT = 1
            ACT {
                stdWrap.field = title
                ATagTitle.field = nav_title

                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
                ATagParams.cObject.value = class="selected"
            }
        }
    }
    
    
    
    19 = TEXT
    19 {
          dataWrap = <div class="projecttitle">     
    }
    20 = TEXT
    20 {
        value.field = title
        dataWrap = |
    }
    30 = TEXT
    30 {
        value.field = subtitle
        dataWrap = <span class="projectcoordinator">&nbsp;—&nbsp;|</span>
    }
    31 = TEXT
    31 {
          dataWrap = </div>     
    }
    
    insertData = 1
    
/*
    2 < .1
    2 {
        wrap = <ul class="clearfix">|</ul>
        NO {
            wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
            ATagParams = class="subSubLink"
        }
        CUR < .NO
        CUR = 1

        CUR {
            doNotLinkIt = 1
        }
    }
*/
}

// Footer-Navigation
lib.FooterNavigation = COA
lib.FooterNavigation {

    1 = HMENU
    1 {
        special = directory
        special.value = 53

        # einstiegs level
        entryLevel = 0

        1 = TMENU
        1 {
            wrap = <ul class="clearfix">|</ul>
            expAll = 1
            # kein onfocus="blurLink(this);" bei den links, sonst Tabulator Probleme im IE
            noBlur = 1

            lib.xy = LOAD_REGISTER
            lib.xy  {
                Counter.cObject = TEXT
                Counter.cObject.data = register:Counter
                Counter.cObject.wrap = |+1
                Counter.prioriCalc = intval
            }

            NO {
                 
                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li class="">|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
               
                stdWrap.htmlSpecialChars = 1
                /*
                ATagTitle {
                    field = abstract // title
                    htmlSpecialChars = 1
                }
                */
                ATagParams.cObject = TEXT
                ATagParams.cObject {
                    value = class="unselected"
                    insertData = 1
                }
            }

            CUR < .NO
            CUR = 1
            CUR {
                wrapItemAndSub = <li class="first">|</li>|*|<li>|</li>|*|<li class="last">|</li>
                ATagParams.cObject.value = class="selected"
            }

            ACT < .NO
            ACT = 1
            ACT {
                wrapItemAndSub = <li class="first">|</li>|*|<li>|</li>|*|<li class="last">|</li>
                ATagParams.cObject.value = class=""
            }
        }

        2 < .1
        2 {
            wrap = <ul class="clearfix">|</ul>
            NO {
                wrapItemAndSub = <li class="first">|</li>|*|<li>|</li>|*|<li class="last">|</li>
                ATagParams = class="subSubLink"
            }
            CUR < .NO
            CUR = 1

            CUR {
                doNotLinkIt = 1
            }
        }
    }

    
}


// Footer-Navigation
lib.FooterNavigation2 = COA
lib.FooterNavigation2 {

    1 = HMENU
    1 {
        special = directory
        special.value = 163

        # einstiegs level
        entryLevel = 0

        1 = TMENU
        1 {
            wrap = <ul class="clearfix">|</ul>
            expAll = 1
            # kein onfocus="blurLink(this);" bei den links, sonst Tabulator Probleme im IE
            noBlur = 1

            lib.xy = LOAD_REGISTER
            lib.xy  {
                Counter.cObject = TEXT
                Counter.cObject.data = register:Counter
                Counter.cObject.wrap = |+1
                Counter.prioriCalc = intval
            }

            NO {
                
                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li class="">|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
               
                stdWrap.htmlSpecialChars = 1
                /*
                ATagTitle {
                    field = abstract // title
                    htmlSpecialChars = 1
                }
                */
                ATagParams.cObject = TEXT
                ATagParams.cObject {
                    value = class="unselected"
                    insertData = 1
                }
            }

            CUR < .NO
            CUR = 1
            CUR {
                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
                ATagParams.cObject.value = class="selected"
            }

            ACT < .NO
            ACT = 1
            ACT {
                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
                ATagParams.cObject.value = class=""
            }
        }

        2 < .1
        2 {
            wrap = <ul class="clearfix">|</ul>
            NO {
                wrapItemAndSub = <li class="first">|</li><li class="divider">&#47;</li>|*|<li>|</li><li class="divider">&#47;</li>|*|<li class="last">|</li>
                ATagParams = class="subSubLink"
            }
            CUR < .NO
            CUR = 1

            CUR {
                doNotLinkIt = 1
            }
        }
    }

    
}






lib.HeaderContent = COA
lib.HeaderContent {
    20 = CONTENT
    20 < styles.content.get
    20 {
        table = tt_content
        select {
            where = colPos = 0
            orderBy = sorting
            #languageField = sys_language_uid
        }
        wrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
    }
}

lib.BeforeContent = COA
lib.BeforeContent {
    20 = CONTENT
    20 < styles.content.get
    20 {
        table = tt_content
        select {
            where = colPos = 1
            orderBy = sorting
            #languageField = sys_language_uid
        }
        wrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
    }
}

lib.BodyContent = COA
lib.BodyContent {
    20 = CONTENT
    20 < styles.content.get
    20 {
        table = tt_content
        select {
            where = colPos = 2
            orderBy = sorting
            #languageField = sys_language_uid
        }
        wrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
    }
}

lib.FooterContent = COA
lib.FooterContent {

    20 = CONTENT
    20 < styles.content.get
    20 {
        table = tt_content
        select {
            
            where = colPos = 3
	    
            orderBy = sorting
            #languageField = sys_language_uid
        }
        
        wrap = <!--TYPO3SEARCH_begin-->|<!--TYPO3SEARCH_end-->
    }
    
    20.slide = -1
}



page = PAGE
page {
    10 = FLUIDTEMPLATE
    10 {
        templateRootPaths.0 = typo3conf/ext/attoworld/Resources/Private/Templates/
        layoutRootPaths.0 = typo3conf/ext/attoworld/Resources/Private/Layouts/
        partialRootPaths.0 = typo3conf/ext/attoworld/Resources/Private/Partials/
        
        file.stdWrap.cObject = CASE
        file.stdWrap.cObject {
            key.data = levelfield:-1, backend_layout_next_level, slide
            key.override.field = backend_layout
            default = TEXT
            default.value = typo3conf/ext/attoworld/Resources/Private/Layouts/default.html
            1 = TEXT
            1.value = typo3conf/ext/attoworld/Resources/Private/Layouts/default.html
        }
        variables {
            navigation < lib.Navigation
            projectnavigation < lib.ProjectNavigation
            footernavigation < lib.FooterNavigation
            footernavigation2 < lib.FooterNavigation2
            headercontent < lib.HeaderContent
            beforecontent < lib.BeforeContent
            bodycontent < lib.BodyContent
            footercontent < lib.FooterContent
        }
    }
}

tt_content.image.10.maxW = 1920
tt_content.image.10.maxH = 640
tt_content.image.10.maxWInText = 1920

tt_content.image.20.maxW = 1920
tt_content.image.20.maxH = 640
tt_content.image.20.maxWInText = 1920

tt_content.image.30.maxW = 1920
tt_content.image.30.maxH = 640
tt_content.image.30.maxWInText = 1920

lib.math = TEXT
  lib.math {
  current = 1
  prioriCalc = 1
}