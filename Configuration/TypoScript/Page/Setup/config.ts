/*
 * Basis-Konfiguration
 */

config {

    sendCacheHeaders = 1

    compressBody = 1

    concatenateJs = 1
    #concatenateCss = 1
    
    compressJs = 1
    #compressCss = 1

    // Parameter für die Suche
    index_enable = 1
    index_externals = 1

    // Parameter zum debuggen
    no_cache = 0
    cache = 1

    // Parameter für realURL
    simulateStaticDocuments = 0
    tx_realurl_enable = 1
    uniqueLinkVars = 1

    // Generierung des Titels unterdrücken
    noPageTitle = 2

    // Parameter für die Webseite
    absRefPrefix = /
    baseURL = /
    doctype = html5
    xmlprologue = none
    htmlTag_setParams = none
    xhtml_cleaning = 0
    spamProtectEmailAddresses = 2
    spamProtectEmailAddresses_atSubst = <span style="background: red x-repeat; display: none;">atom</span>&nbsp;[at]&nbsp;<span style="height: 100px; display: none; overflow: hidden;">photon</span>

    inlineStyle2TempFile = 1
    noScaleUp = 1
    meaningfulTempFilePrefix = 50
    prefixLocalAnchors = all
    disableImgBorderAttr = 1

    // Kompression der CSS- und Javascript-Dateien
    //compressCss = 1
    //concatenateCss = 1
    //compressJs = 1
    //concatenateJs = 1

    // Parameter für die Sprache
    linkVars = L(0-3)
    language = en
    locale_all = en_US.utf8
    htmlTag_langKey = en_US.utf8
    htmlTag_setParams = lang="en"
    sys_language_uid = 0
    sys_language_mode = content_fallback; 0,2
    sys_language_overlay = hideNonTranslated

}

// Extra-Parameter für die Suche
plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang = 0

// Extra.Parameter für die Sprache Deutsch
[globalVar = GP:L=1]
    config {
        sys_language_uid = 1
        language = de
        locale_all = de_DE.utf8
        htmlTag_langKey = de_DE.utf8
        htmlTag_setParams = lang="de"
    }
    // Extra-Parameter für die Suche
    plugin.tx_indexedsearch._DEFAULT_PI_VARS.lang = 1
[global]

config.tx_extbase {
    persistence{
        enableAutomaticCacheClearing = 0
        updateReferenceIndex = 0
        classes {
            Attoworld\Domain\Model\Content {
                mapping {
                    tableName = tt_content
                    columns {
                        uid.mapOnProperty = uid
                        pid.mapOnProperty = pid
                        sorting.mapOnProperty = sorting
                        CType.mapOnProperty = contentType
                        header.mapOnProperty = header
                    }
                }
            }
        }
    }
}

plugin.tx_gomapsext {
    settings {
        storagePid = 51
        apiKey = AIzaSyBPr3pl7hrmfd0wMnYCxn8fBpy63tUDOMI
    }
}

page.config.index_enable = 1
 page.config.index_externals = 1
   # Wenn gesetzt, werden externe Medien, auf die auf Seiten verlinkt wird, ebenfalls indiziert.  
    
 plugin.tx_indexedsearch {
       search.rootPidList=1
   # erweiterte Suche abschalten
      show.advancedSearchLink = 1
  
  # standardmässig mit 'Wortteil' suchen statt mit ganzem Wort
       _DEFAULT_PI_VARS.type = 1
  # standardmäßig mit erweiterter Suche starten
       _DEFAULT_PI_VARS.ext = 1
  
      
  # Anzeige regeln, ein- (1) bzw. ausgeblendet (0)
       show {
  # Suchregeln
            rules = 0
  # Erstellungsinformationen des Hashes
       #   parsetimes=1
  # Zweite ebene im Bereichs-dropdown anzeigen
              #   L2sections=1
  # Erste ebene im Bereichs-dropdown anzeigen
       #   L1sections=1
  # Alle "nicht im menü" oder "im menü verstecken"
  #(aber nicht "versteckte" seiten) mit anzeigen in section?
       #  LxALLtypes=0
       }

  # die Auswahlfelder für die Suchparameter werden ein- (0) bzw. ausgeblendet (1)
       blind {
  # Suchtyp (Ganzes, Wort, Wortteil, ..)
           type=1
  # default option (Und, Oder)
    defOp=1
  # Bereich(e) der website
            sections=1
  # Suche in Medientypen
            media=1
  # Sortierung
            order=1
  # Ansicht (Sektionshierachie / Liste)
            group=1
  # Sprachwahlbox
            lang=1
  # Auswahl Sortierung
            desc=1
  # Ergebnisse (Anzahl der Treffer pro Seite)
            results=1
  # Ansicht: Erweiterte Vorschau
            extResume = 1
   }
 }

plugin.tx_jmrecaptcha {
  public_key = xxx
  private_key = xxx
  captcha_type = recaptcha # or nocaptcha
}
 
#If you selected "nocaptcha", you have to add a JS file yourself:
page.headerData.123451123 = TEXT
page.headerData.123451123.value = <script src="https://www.google.com/recaptcha/api.js" async defer></script>


plugin.Tx_Formhandler.settings {   
    
    name = Contactformular
    templateFile = fileadmin/template/formhandler/template.html 
    formValuesPrefix = formhandler    
    finishers {     
        1 {       
            class = Finisher\Mail     
        }
        2 {       
            class = Finisher\SubmittedOK
            config.returns = 1   
        }
    }
    
    validators {
        1.class = Tx_Formhandler_Validator_Default
        1.config {
            fieldConf {
                sender_email.errorCheck.1 = required
                sender_phone.errorCheck.1 = required
            }
        }
     }
    
    1 {
      # Das erste IF...
      if.1 {
         conditions.OR1.AND1 = sender_email>0
         isTrue.validators.1.config.disableErrorCheckFields = sender_phone
      }
      # Das zweite IF...
      if.2 {
         conditions.OR1.AND1 = sender_phone.errorCheck.1>0
         isTrue.validators.1.config.disableErrorCheckFields = sender_email
      }
   }
    
    
    addErrorAnchors = 1
    singleErrorTemplate {
        totalWrap = |
        singleWrap = <span style="color: red;">|</span>
    }
    errorListTemplate {
        totalWrap = <div style="color: red;">An error has occurred: <ul>|</ul></div>
        singleWrap = <li>|</li>
    }
    langFile = fileadmin/formhandler/language.xml
    config.user {
        to_email = TEXT
        to_email.data = GP:formhandler|sender_email
        subject = TEXT
        subject.data = LLL:fileadmin/contactform/4-lang.xml:mail_subject_user
    }
}

/*
plugin.tx_jhcaptcha {
    settings {
        reCaptcha {
            siteKey = 6LdL0RgUAAAAAJk9FDr_i4DQ0lWmFV_KjBQY4uPC
            secretKey = 6LdL0RgUAAAAAP9gl0MyJGyWnW9uohd1NUSwg_MO
        }
    }
}

plugin.tx_jhcaptcha {
    settings {
        reCaptcha {
            # Beschreibung: Farbe des Captchas
            # Optionen: dark | light
            # Standard: light
            theme = light
            # Beschreibung: Der Typ des Captchas
            # Optionen: audio | image
            # Standard: image
            type = image
            # Beschreibung: Die Sprache des Captchas
            # Optionen: https://developers.google.com/recaptcha/docs/language
            # Standard: en
            lang = en
            # Beschreibung: Die Größe des Captchas
            # Optionen: normal | compact
            # Standard: normal
            size = normal
        }
    }
}
*/

plugin.tx_slindexedsearchresulttitle_pi1{
    indexedSearchResultTitle = COA
    indexedSearchResultTitle{
        5 = TEXT
        5.value = Hello 

        10 = TEXT
        10.value = World

        wrap = Test Title: |
     }
}

plugin.tx_sitemapgenerator {
    urlEntries {
        news = 1
        news {
            active = 1
            table = tx_news_domain_model_news
            additionalWhere = pid!=0
            orderBy = title DESC
            limit = 0,10
            lastmod = tstamp
            url = TEXT
            url {
                typolink.parameter = 9
                typolink.additionalParams = &tx_news_pi1[controller]=News&tx_news_pi1[action]=detail&tx_news_pi1[news]={field:uid}
                typolink.additionalParams.insertData = 1
                typolink.useCacheHash = 1
                typolink.returnLast = url
                typolink.forceAbsoluteUrl = 1
            }
        }
    }
}

plugin.tx_sitemapgenerator.urlEntries.pages {
    hidePagesIfNotTranslated = 1
}

plugin.tx_sitemapgenerator.urlEntries.news {
    hideIfNotTranslated = 1
}

plugin.tx_realurl {
    defaultToHTMLsuffixOnPrev => 0,
    acceptHTMLsuffix => 0,
}

plugin.tx_min.tinysource {
    enable = 1
    head {
        stripTabs = 0
        stripNewLines = 0
        stripDoubleSpaces = 1
        stripTwoLinesToOne = 1
    }
    body {
        stripComments = 1
        stripTabs = 1
        stripNewLines = 1
        stripDoubleSpaces = 1
        stripTwoLinesToOne = 0
        preventStripOfSearchComment = 1
        protectCode {
            10 = /(<textarea.*?>.*?<\/textarea>)/is
            20 = /(<pre.*?>.*?<\/pre>)/is
        }
    }
    oneLineMode = 1
}

tt_content.gridelements_pi1.20.10.setup {
    # ID des Gridelements
    1 < lib.gridelements.defaultGridSetup
    1 {
        # FLUIDTEMPLATE konfigurieren
        cObject = FLUIDTEMPLATE
        cObject {
            file = fileadmin/template/gridelements/layout-11rows.html
        }
    }
    2 < lib.gridelements.defaultGridSetup
    2 {
        # FLUIDTEMPLATE konfigurieren
        cObject = FLUIDTEMPLATE
        cObject {
            file = fileadmin/template/gridelements/layout-1row.html
        }
    }
    3 < lib.gridelements.defaultGridSetup
    3 {
        # FLUIDTEMPLATE konfigurieren
        cObject = FLUIDTEMPLATE
        cObject {
            file = fileadmin/template/gridelements/layout-3rows.html
        }
    }
}

page.999 < plugin.tx_slindexedsearchresulttitle_pi1