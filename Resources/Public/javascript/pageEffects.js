$grid = null;   // Überprüfung via Browser

$.fn.equals = function (compareTo) {
    if (!compareTo || this.length != compareTo.length) {
        return false;
    }
    for (var i = 0; i < this.length; ++i) {
        if (this[i] !== compareTo[i]) {
            return false;
        }
    }
    return true;
};

$(document).ready(function () {

    // MathJax-Workaround
    MathJax.Hub.config.root = '/typo3conf/ext/attoworld/Resources/Public/javascript/jsMath';

    // Variable um Dennis provisorische Designänderungen freizugeben
    var dennisTestDesign = true;

    var containerDetailHeight = 40.625;

    var correcturProjectSubsiteDennis = 100;                    // Korrekturwert des Scroll-Events der Überschriften auf den Projektunterseiten

    var standardWindowSizePerDesignDefiniton = 80;              // Standard-Window-Breite nach Designvorgaben von Dennis
    var standardNavigationHeightPerDesignDefiniton = 99.11;        // Standard-Navigationshöhe nach Designvorgaben von Dennis

    var maxGridElementsOnStartSite = 7; // Wieviele Elemente werden auf der Startseite angezeigt?
    var nextElements = 9; // Wieviele Elemente soll der SHow-More-Button anzeigen?

    // Hauptkonfiguration
    var mainConfig = {
        'filter': {
            'technicalstaff': 'Technical staff'
        }
    }

    // Leiter der Gruppe Technik
    var technicalLeaderSelector = $('.technical-leader');
    var technicalLeaderFilter = 'Technical staff';

    var limit = 50;         // Maximal anzuzeigende Datensätze
    var position = 50;      // Position bei Klick auf Show More

    // Auflösung des Kopfbereiches
    var headerResolution = {
        'x': 1920,
        'y': 755
    };
    var basisFontSize = 16;     // Basisfontsize der Webseite
    var naviHeight = 51.59;        // Höhe der Navigation

    var changeNavigationHeightOnThisScrollPosition = 450;   // Scrollposition, an welcher die Höhe der Navigation geändert werden soll

    /**
     * Initialisiert das IsoTope-Framework
     */
    var isoTope = function () {
        var gridSizer = $('.grid-sizer');
        var value = (434 / 1920) * $(window).width();

        // Holen der Font-Size aus dem BODY-Element
        var fontSize = parseInt($('body').css('font-size'));

        /*
         
         434 : 16
         407 : 15
         380 : 14
         352 : 13
         325 : 12
         298 : 11
         270 : 10
         243.67291666666668 : 9
         216.77395833333333 : 8
         189.875 : 7
         162.75 : 6
         135.39895833333333 : 5
         108.27395833333334 : 4
         
         */

        // Einzelne Font-Stufen, definieren die Breite des Initial-Grid-Elementes ei verschiedenen FontSize-Stufen des Body-Elementes
        var fontArray = {
            '4': 108.27395833333334,
            '5': 135.39895833333333,
            '6': 162.75,
            '7': 189.875,
            '8': 216.77395833333333,
            '9': 243.67291666666668,
            '10': 270,
            '11': 298,
            '12': 326,
            '13': 353,
            '14': 380,
            '15': 407,
            '16': 434
        };

        // Kleinste mögliche Fontsize
        if (fontSize < 4) {
            fontSize = 4;
        }
        // Größte mögliche Fontsize
        if (fontSize > basisFontSize) {
            fontSize = basisFontSize;
        }

        // Breite der Grid-Elemente für die Lap-Staff-Seite setzen
        if ($('.page-55').length > 0) {
            value = 314.09;
        }

        // Grid-System initialisieren
        $grid = $('.grid').isotope({
            itemSelector: '.color-shape',
            percentPosition: true,
            masonry: {
                // columnWidth: fontArray[fontSize]
                columnWidth: value
            }
        });
    }
    // Aufruf der isoTope-Extension
    isoTope();

    // store filter for each group
    var filters = {};

    // Initialisierung des Click-Events für den Filter
    $('.filters').on('click', '.button', function () {
        var $this = $(this);
        // get group key
        var $buttonGroup = $this.parents('.button-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        // set filter for group
        filters[ filterGroup ] = $this.attr('data-filter');
        // combine filters
        var filterValue = concatValues(filters);
        // set filter for Isotope
        $grid.isotope({filter: filterValue});
    });

    // change is-checked class on buttons
    $('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'button', function () {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
    });

    // flatten object by concatting values
    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += obj[ prop ];
        }
        return value;
    }

    /**
     * Setzt die Breiten der einzelnen Slideshows auf der Webseite dynamisch (An resize-Event gekoppelt)
     */
    setHeaderSlideshowWidth = function () {
        var hss = $('#header-slideshow');
        var ww = $(window).innerWidth();

        var sliderHeader = $('#header-slideshow').data("plugin_tinycarousel");


        if (typeof (sliderHeader) !== 'undefined') {
            sliderHeader.update();

            // Breite setzen
            $.each($('ul.overview li', hss), function (i, n) {
                $(n).width(ww);
            });

            // HTML->CSS aktualisieren
            $('ul.overview', hss).width($('ul.overview li', hss).length * ww);
            $('ul.overview', hss).css('left', sliderHeader.slideCurrent * ww * -1);

            // Tinycarousel aktualisieren
            sliderHeader.update();
        }

        // Slideshows der Unetrseiten der Projekte
        var hss = $('.sub-slideshow');
        var ww = $('.viewport', hss).innerWidth();

        var slider = $('.sub-slideshow').data("plugin_tinycarousel");

        if (typeof (slider) !== 'undefined') {
            slider.update();

            // Tinycarousel aktualisieren
            slider.SET(slider.currentSlide, 'SET');
            slider.update();
        }


        // Slideshows, wie die der Featured Publications
        var hss = $('.slideshow');
        var ww = $('.viewport', hss).innerWidth();

        var slider = $('.slideshow').data("plugin_tinycarousel");

        if (typeof (slider) !== 'undefined') {

            if (hss.hasClass('fullwidth')) {
                ww = window.innerWidth;

                $.each($('ul.overview li', hss), function (i, n) {
                    $(n).width(ww);
                });

                // HTML->CSS aktualisieren
                $('ul.overview', hss).width($('ul.overview li', hss).length * ww);
                $('ul.overview', hss).css('left', slider.slideCurrent * ww * -1);
            }

            slider.update();

            // Tinycarousel aktualisieren
            slider.SET(slider.currentSlide, 'SET');
            slider.update();
        }


        var hss = $('.slideshow-withbullets');
        var ww = $('.viewport', hss).innerWidth();

        var slider = $('.slideshow-withbullets').data("plugin_tinycarousel");

        if (typeof (slider) !== 'undefined') {

            if (hss.hasClass('fullwidth')) {
                ww = window.innerWidth;

                $.each($('ul.overview li', hss), function (i, n) {
                    $(n).width(ww);
                });

                // HTML->CSS aktualisieren
                $('ul.overview', hss).width($('ul.overview li', hss).length * ww);
                $('ul.overview', hss).css('left', slider.slideCurrent * ww * -1);
            }

            slider.update();

            // Tinycarousel aktualisieren
            slider.SET(slider.currentSlide, 'SET');
            slider.update();
        }


        // Timeline-Slideshows, wie die der Featured Publications
        var hss = $('.timeline-slideshow');
        var ww = $('.viewport', hss).innerWidth();

        var slider = $('.timeline-slideshow').data("plugin_tinycarousel");

        if (typeof (slider) !== 'undefined') {
            slider.update();
            // Breite setzen
            $.each($('ul.overview li', hss), function (i, n) {
                $(n).width(ww);
            });

            // HTML->CSS aktualisieren
            $('ul.overview', hss).width($('ul.overview li', hss).length * ww);
            $('ul.overview', hss).css('left', slider.slideCurrent * ww * -1);

            // Tinycarousel aktualisieren
            slider.update();
        }


        // Timeline-Sub-Slideshows
        var hss = $('body .slideshow-container.active .timeline-sub-slideshow');
        var ww = $('.viewport', hss).innerWidth();

        var slider = $('body .slideshow-container.active .timeline-sub-slideshow').data("plugin_tinycarousel");

        // Prüfung ob Slideshow auch vorhanden ist
        if (typeof (slider) !== 'undefined') {
            /*
             slider.update();
             // Breite setzen
             $.each($('ul.overview li', hss), function (i, n) {
             $(n).width(ww);
             });
             
             var fullsizeValue = standardWindowSizePerDesignDefiniton * parseFloat($('body').css('font-size'));
             var startWithWidth = ($(window).width() - fullsizeValue) / 2;
             var startPoint = (0 - startWithWidth) * -1;
             
             console.log(slider.slideCurrent);
             
             // HTML->CSS aktualisieren
             $('ul.overview', hss).width($('ul.overview li', hss).length * ww);
             $('ul.overview', hss).css('left', slider.slideCurrent * getPx(standardWindowSizePerDesignDefiniton) * -1 + startPoint);
             
             // Tinycarousel aktualisieren
             slider.update();
             */

            // Slideshow aktualisieren
            slider.update();

            // Tinycarousel aktualisieren
            slider.SET(slider.currentSlide, 'SET');

            // Slideshow aktualisieren
            slider.update();
        }

    }

    /**
     * Setzen der BODY-Fontsize, ahängig von Browserbreite
     */
    var setMainFontSize = function () {
        var factor = 1920 / basisFontSize;
        var fontSize = ($(window).width() / factor);

        document.body.style.fontSize = fontSize + 'px';

        // Minimum = 10
        // if(fontSize > 10) {
        document.getElementsByTagName('html')[0].setAttribute('style', 'font-size: ' + fontSize + 'px');
        // }
    }

    /**
     * Prüft ob es sich bei der aktuellen Webseite um eine Unterseite handelt
     */
    var checkForSubSites = function () {
        if ($('body.page-81').length > 0 || // BIRD, Mihaela
                $('body.page-77').length > 0 || // FRM, Hanieh
                $('body.page-78').length > 0 || // TAP, Yakovlev
                $('body.page-79').length > 0 || // ATTO, Martin & Nick
                $('body.page-80').length > 0 || // HFS, Pronin
                $('body.page-82').length > 0 || // FRM, Pupeza
                $('body.page-83').length > 0) {     // Associated

            return true;
        } else {
            return false;
        }
    }

    /**
     * Prüft darauf, ob es sich bei der Seite um eine Seite handelt, welche eine Headerslideshow enthält
     */
    var checkForHeadSlideshowSites = function () {
        if (($('body.page-1').length > 0 || // Hauptseite
                $('body.page-3').length > 0 || // Researchseite
                $('body.page-50').length > 0 || // Join-Us-Seite
                $('body.page-81').length > 0 || // BIRD, Mihaela 
                $('body.page-77').length > 0 || // FRM, Hanieh
                $('body.page-78').length > 0 || // TAP, Yakovlev
                $('body.page-79').length > 0 || // ATTO, Martin & Nick
                $('body.page-80').length > 0 || // HFS, Pronin
                $('body.page-82').length > 0 || // FRM, Pupeza
                $('body.page-83').length > 0) && // Associated
                ($('#header-slideshow').length > 0)) {        // Prüfung ob Slideshow vorhanden

            return true;
        } else {

            if ($('body.page-111').length > 0 ||
                    $('body.page-112').length > 0 ||
                    $('body.page-113').length > 0 ||
                    $('body.page-115').length > 0 ||
                    $('body.page-116').length > 0 ||
                    $('body.page-121').length > 0 || // Pupeza, 2. Seite keine Headerslideshow gewünscht
                    $('body.page-114').length > 0 ||
                    $('body.page-49').length > 0 ||
                    $('body.page-118').length > 0) {     // Unterseite von Hanieh

                return true;
            }

            return false;
        }
    }

    /**
     * Funktion welche bei jedem Seitenaufruf bzw. Reload-Event geladen wird
     */
    loadSite = function () {
        setMainFontSize();

        /*
         var reso = headerResolution.y / headerResolution.x;
         var result = $(window).width() * reso;
         $('#header-slideshow .viewport').height(result);
         $('.attoworld-content').css('margin-top',result+'px');
         
         var deleteFromScrollEventHeight = result;
         */

        var elementAmount = $('.bullet-menu .bullets li').length;       // Anzahl an Listenelementen in der Bulletliste der Headerslideshow
        var siteWidth = standardWindowSizePerDesignDefiniton;     // Standardseitebreite (1280px), Angabe in rem
        var result = siteWidth / elementAmount - 0.01;

        if (dennisTestDesign == true) {
            if ($('body.page-1').length > 0 || // Hauptseite
                    $('body.page-3').length > 0) {       // Researchseite

                siteWidth = 112.2563;                    // Breite erhöhen, Designänderung von Dennis

                $('.bullet-menu .bullets .headline').css('height', '2.8125rem');
                $('.bullet-menu').css('height', '2.8125rem');
                $('.bullet-menu .bullets').css('width', '112.2563rem');   // Breite erhöhen

                result = 15.4874;
            }
        }

        var liElements = $('.bullet-menu .bullets li');

        var elementTitles = $('.bullet-menu .bullets li .headline');
        var elementContents = $('.bullet-menu .bullets li .content');





        liElements.css('width', result + 'rem');
        var marginAmount = elementAmount * 2 - 2;

        /*
         var factor = 15.44 * 5;
         var width = factor / elementAmount;
         */

        // 5 ist der Faktor aus dem Original-Design (5 Elemente in einer Reihe)
        // Die anderen Angaben sind REM-Angaben

        var factor = 6.688 * 5;
        var heightContent = factor / elementAmount;
        var factor = 3.313 * 5;
        var heightHeadline = factor / elementAmount;
        var factor = 0.4485 * 5;
        var margin = factor / elementAmount;

        /*
         elementTitles.css('width',width+'rem');
         elementContents.css('width',width+'rem');
         */

        //elementTitles.css('height',heightHeadline+'rem');
        //elementContents.css('height',heightContent+'rem');

        // AUsschluss der About-Us seite
        if ($('.page-118').length == 0) {
            $('.bullet-menu .bullets li').css('padding', '0rem ' + margin + 'rem');
            $('.bullet-menu .bullets li.first').css('padding-left', '0rem');
            $('.bullet-menu .bullets li.last').css('padding-right', '0rem');
        }

        setHeaderSlideshowWidth();

        // Teaser auf Startseite
        var correcturPixel = 1;

        var innerHeight = window.innerHeight;

        var viewportCurrentHeight = $('#header-slideshow').innerHeight();
        var headerText = $('#header-slideshow .viewport .text');
        var headerTextInitialMarginTop = 4.5625;
        var bulletMenuOuterHeight = ($('.bullet-menu').outerHeight(true));
        var viewportHeight = $('#header-slideshow .viewport').outerHeight() + $('.attoworld-navigation').outerHeight();

        if ($('.plugin-picturewithscrolldown').length > 0) {
            viewportCurrentHeight = $('.plugin-picturewithscrolldown').innerHeight();
            headerText = $('.plugin-picturewithscrolldown .scroll-down');
            headerTextInitialMarginTop = 1.6340625;
            bulletMenuOuterHeight = 0;
            viewportHeight = $('.plugin-picturewithscrolldown').outerHeight() + $('.attoworld-navigation').outerHeight();
        }

        if (checkForHeadSlideshowSites()) {
            if (window.innerHeight <= viewportHeight) {
                var marginTop = 0;
                marginTop = viewportCurrentHeight - (viewportCurrentHeight - (innerHeight - naviHeight - bulletMenuOuterHeight));

                var textBottomValue = viewportCurrentHeight + standardNavigationHeightPerDesignDefiniton - window.innerHeight + getPx(headerTextInitialMarginTop) + window.scrollY;
                headerText.css('bottom', getRem(textBottomValue) + 'rem');

                $('.attoworld-content').css('margin-top', getRem(marginTop) + 'rem');
            } else {
                $('.attoworld-content').css('margin-top', '41.4375rem');
                headerText.css('margin-top', headerTextInitialMarginTop + 'rem');
            }
        } else {
            $('.attoworld-content').css('margin-top', '0rem');
        }

        var height = viewportCurrentHeight;
        var scrollHeight = height - window.scrollY;

        var test = $('.button-overlay-left');
        var test2 = $('.button-overlay-right');

        var OverFlow = (window.innerHeight - viewportCurrentHeight - naviHeight);
        if (OverFlow < 0) {
            OverFlow = 0;
        }

        var innerHeight = window.innerHeight - window.scrollY - naviHeight - OverFlow;

        if (innerHeight > viewportCurrentHeight) {
            innerHeight = viewportCurrentHeight;
        }

        test.css('height', getRem(innerHeight) + 'rem');
        test.css('top', getRem(height - innerHeight - (viewportCurrentHeight - innerHeight)) + 'rem');
        test2.css('height', getRem(innerHeight) + 'rem');
        test2.css('top', getRem(height - innerHeight - (viewportCurrentHeight - innerHeight)) + 'rem');

        isoTope();

        // scroll-down auf Projektunterseite mit verschieben
    }

    /*
     var showProjectmenu = function(e) {
     if(checkForSubSites()) {
     if($(e.target).text() == 'Research') {
     $('.attoworld-projectnavigation').show();
     } else {
     $('.attoworld-projectnavigation').hide();
     }
     }
     }
     */

    /*
     var closeProjectmenu = function(e) {
     $('.attoworld-projectnavigation').hide();
     }
     */

    /**
     * Git den REM-Wert einer Pixelangabe zurück
     * 
     * @param integer rem       Der REM-Wert
     * @returns integer         Der Pixelwert
     */
    getPx = function (rem) {
        var base = parseFloat($('body').css('font-size'));
        return rem * base;
    }

    /**
     * Git den PX-Wert einer Pixelangabe zurück
     * 
     * @param integer rem       Der Pixelwert
     * @returns integer         Der REM-wert
     */
    getRem = function (px) {
        var base = parseFloat($('body').css('font-size'));
        return px / base;
    }


    /**
     * Toggelt die Jobs auf und zu (Version 2)
     */
    var toggleJob2 = function () {
        var _this = $(this);
        var innerHeight = 0;
        var listing = _this.parents('.listing');

        // Noch aktive Elemente schließen bzw. zurücksetzen
        if ($('.list-element .active', listing).length > 0 &&
                !_this.hasClass('active')) {

            $.each($('.list-element ', listing), function (i, n) {
                if (!$(n).is(_this)) {
                    $(n).removeClass('active');

                    $(n).css('height', getRem($(n).prop('height')) + 'rem');
                }
            });
        }

        if (!_this.hasClass('active')) {
            _this.addClass('active');
            _this.prop('height', _this.outerHeight());

            setAutoHeightInRem(_this);
            //_this.css('height',getRem(innerHeight)+'rem');

            listing.addClass('oneIsActive');

        } else {
            _this.removeClass('active');

            _this.css('height', getRem(_this.prop('height')) + 'rem');

            listing.removeClass('oneIsActive');
        }

        if (typeof (params) !== 'undefined') {
            if (typeof (params.jump) !== 'undefined') {
                if (buffer.length > 0) {
                    var scrollPosition = buffer.offset().top;
                    scrollPosition = scrollPosition - ((window.innerHeight - buffer.height()) / 2);

                    $('html, body').finish().animate({
                        'scrollTop': getRem(scrollPosition) + 'rem'
                    }, {
                        'duration': 100
                    });
                }
            }
        }
    }


    /**
     * Toggelt die Jobs auf und zu (Version 1)
     * 
     * @param object e
     */
    var toggleJob = function (e) {
        var _this = $(this);
        _this.prop('initialHeight', _this.outerHeight())

        // Kurzfristiger Umbau wegen kurzfristiger Konzeptänderung!

        var pdfFile = $('div.apply a', _this).attr('href');
        if (pdfFile) {
            window.open(pdfFile);
        }

        /*
         if(!$(this).hasClass('noToggle')) {
         $(this).unbind('click',toggleJob);
         $('.close',$(this)).fadeIn();
         // $('.plugin-jobs .listing ul.list li').removeClass('active');
         
         $(this).addClass('active');
         $(this).removeClass('inactive');
         $('.plugin-jobs .listing ul.list li:not(.active)').addClass('inactive');
         
         if($(this).hasClass('active')) {
         var heights = [
         (($('.title',$(this)).length > 0) ? $('.title',$(this)).outerHeight(true) : 0),
         (($('.location',$(this)).length > 0) ? $('.location',$(this)).outerHeight(true) : 0),
         (($('.group',$(this)).length > 0) ? $('.group',$(this)).outerHeight(true) : 0),
         (($('.description',$(this)).length > 0) ? $('.description',$(this)).outerHeight(true) : 0),
         (($('.fulltext',$(this)).length > 0) ? $('.fulltext',$(this)).outerHeight(true) : 0),
         (($('.apply',$(this)).length > 0) ? $('.apply',$(this)).outerHeight(true) : 0),
         
         parseFloat($(this).css('padding-top')),
         parseFloat($(this).css('padding-bottom'))
         ];
         
         var fullHeight = 0;
         for(var i = 0; i < heights.length; i++) {
         fullHeight += heights[i];
         }
         
         _this.finish().animate({
         'height' : fullHeight
         }, function() {
         //$(this).height(fullHeight);
         });
         } else {
         _this.finish().animate({
         'height' : getRem(_this.prop('initialHeight'))
         }, function() {
         $(this).css('height',getRem(_this.prop('initialHeight')));
         });
         }
         }
         
         if($('.plugin-jobs .listing ul.list li.active').length == 0) {
         $('.plugin-jobs .listing ul.list li').removeClass('inactive');
         }
         */
    }

    /**
     * Schließt einen Job
     */
    var closeJob = function () {
        var _this = $(this);
        var _parent = _this.parents('.list-element');

        var li = $(this).parents('li.list-element');

        li.finish().animate({
            'height': getRem(_parent.prop('initialHeight')) + 'rem'
        }, function () {
            li.css('height', getRem(_parent.prop('initialHeight')) + 'rem');
            li.removeClass('active');
            $('.close', li).fadeOut();
            // li.bind('click', toggleJob);
            li.bind('click', toggleJob2);
            $('.plugin-jobs .listing ul.list li').removeClass('inactive');
        });
    }

    /**
     * Zeigt Filter an
     */
    var toggleFilters = function () {
        $(this).toggleClass('active');

        $('.filters').slideToggle();
        $('.filter').slideToggle();

        $('.filter-content.active').toggle();
    }

    /**
     * Zeigt mehr News-Elemente an
     */
    var showMoreNews = function () {
        var _this = $(this);
        var _parent = _this.parents('.plugin-latestnewsfeature');
        var listing = $('.listing', _parent);

        var hiddenCounter = 0;
        var items = $('.news-item', listing);
        /*
         for(var i = 0; i <= items.length; i++) {
         var n = items[i];
         
         if($(n).css('display') == 'none') {
         hiddenCounter++;
         
         // $(n).removeClass('hidden');
         $(n).show('scale', 400, function() {
         $(n).css('display','inline-block');
         });
         $(n).css('display','inline-block');
         }
         
         if(hiddenCounter == nextElements) {
         break;
         }
         }
         */
    }

    /**
     * Zeigt mehr Publiaktionselemente an
     * 
     * @param object e
     */
    var showMorePublications = function (e) {
        var _this = $(this);
        var internCounter = (_this.prop('internCounter') > 0) ? _this.prop('internCounter') : 1;

        var tmpposition = limit * internCounter

        // Aktiven Bereich initialisieren
        var activeFilter = $('.filter button.active').attr('data-filter');
        var data = activeFilter;

        // Latest oder Feature
        var dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
        var action = 'getpublications';

        // Filter
        if (activeFilter == 'author' ||
                activeFilter == 'year' ||
                activeFilter == 'subject') {

            data = JSON.stringify(filterVar);
            dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
            action = 'filterpublications';
        }

        // Suche
        if (typeof (activeFilter) == 'undefined') {
            dataString = 'tx_attoworld_pi1[sword]=' + $('.search .search-bar').val() + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
            action = 'publicationsearch';
        }

        ajaxCall({
            'showloadingin': $('.mainFilter'),
            'reset': false,
            'action': action,
            'data': dataString,
            'callback': function (response) {
                // Hide Show More-Button
                PublicationsCallbackAjax(response, 'sm', e);
            }
        });

        _this.prop('internCounter', ++internCounter);
    }

    /**
     * Zeigt mehr Elemente an
     * 
     * @param object e
     */
    var showMore = function (e) {
        var _this = $(this);
        var _parent = _this.parents('.mainFilter');

        // Internen Counter setzen
        var internCounter = (_this.prop('internCounter') > 0) ? _this.prop('internCounter') : 1;

        // Vorhandene Fehler-Meldung vom Server löschen
        $('.listing .list .message', _parent).remove();

        // Aufruf von einzelnen Seiten
        if ($('body.page-81').length > 0) {
            var items = $('.plugin-latestnews .plugin-latestnews-item');

            var hiddenCounter = 0;
            $.each(items, function (i, n) {
                if ($(n).css('display') == 'none') {
                    hiddenCounter++;

                    if (hiddenCounter <= nextElements) {
                        $(n).show('scale', 400, function () {
                            $(n).css('display', 'inline-block');
                        });
                        $(n).css('display', 'inline-block');
                    }
                }
            });

        } else if ($('body.page-54').length > 0) {
            var items = $('.plugin-latestnewsfeature .news-item');

            var hiddenCounter = 0;
            $.each(items, function (i, n) {
                if ($(n).css('display') == 'none') {
                    hiddenCounter++;

                    // $(n).removeClass('hidden');
                    $(n).show('scale', 400, function () {
                        $(n).css('display', 'inline-block');
                    });
                    $(n).css('display', 'inline-block');

                    if (hiddenCounter == nextElements) {
                        return false;
                    }
                }
            });

            var hiddenCounter = 0;
            $.each($('.plugin-latestnewsfeature .news-item'), function (i, n) {
                if ($(n).css('display') == 'none') {
                    hiddenCounter++;
                }
            });

            if (hiddenCounter == 0) {
                $('.plugin-latestnewsfeature .show-more-button').hide();
            }
        } else if (checkForSubSites()) {

            var items = $('.plugin-latestnews .news-item');

            var hiddenCounter = 0;
            $.each(items, function (i, n) {
                if ($(n).css('display') == 'none') {
                    hiddenCounter++;

                    // $(n).removeClass('hidden');
                    $(n).show('scale', 400, function () {
                        $(n).css('display', 'inline-block');
                    });
                    $(n).css('display', 'inline-block');

                    if (hiddenCounter == nextElements) {
                        return false;
                    }
                }
            });

            var hiddenCounter = 0;
            $.each($('.plugin-latestnews .row-element'), function (i, n) {
                if ($(n).css('display') == 'none') {
                    hiddenCounter++;
                }
            });

            if (hiddenCounter == 0) {
                $('.plugin-latestnews .show-more-button').hide();
            }

        } else if ($('body.page-1').length > 0) {
            var showdElements = 0;
            var fullelements = $('.plugin-filtermaincontent .grid .color-shape');

            $.each(fullelements, function (i, n) {
                if ($(n).css('display') != 'none') {
                    showdElements++;
                }
            })

            var elements = $('.plugin-filtermaincontent .grid .color-shape').slice(showdElements, showdElements + nextElements);

            $grid.isotope('revealItemElements', elements);
            $grid.isotope('layout');

            if (showdElements + elements.length == fullelements.length) {
                $('.show-more-button').hide();
            }
        } else if ($('body.page-77').length > 0) {

            $('.plugin-latestnews .row-element').show();
            $('.plugin-latestnews .show-more-button').hide();
        } else if ($('body.page-98').length > 0) {
            var tmpposition = position * internCounter;

            // Aktiven Bereich initialisieren
            var activeFilter = $('.filter button.active').attr('data-filter');
            var data = activeFilter;

            // Latest oder Feature
            var dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
            var action = 'filternews';

            // Filter
            if (activeFilter == 'author' ||
                    activeFilter == 'year' ||
                    activeFilter == 'subject') {

                data = JSON.stringify(filterVar);
                dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
                action = 'filternews';
            }

            // Suche
            if (typeof (activeFilter) == 'undefined') {
                dataString = 'tx_attoworld_pi1[sword]=' + $('.search .search-bar').val() + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
                action = 'newssearch';
            }

            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': false,
                'action': action,
                'data': dataString,
                'callback': function (response) {
                    NewsCallbackAjax(response, 'sm', e);
                }
            });
        } else if ($('body.page-88').length > 0) {

            var tmpposition = position * internCounter;

            // Aktiven Bereich initialisieren
            var activeFilter = $('.filter button.active').attr('data-filter');
            var data = activeFilter;

            // Latest oder Feature
            var dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
            var action = 'filtermagazins';

            // Filter
            if (activeFilter == 'author' ||
                    activeFilter == 'year' ||
                    activeFilter == 'subject') {

                data = JSON.stringify(filterVar);
                dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
                action = 'filtermagazins';
            }

            // Suche
            if (typeof (activeFilter) == 'undefined') {
                dataString = 'tx_attoworld_pi1[sword]=' + $('.search .search-bar').val() + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
                action = 'magazinsearch';
            }

            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': false,
                'action': action,
                'data': dataString,
                'callback': function (response) {
                    MagazinsCallbackAjax(response, 'sm', e);
                }
            });

        } else {
            var tmpposition = position * internCounter;

            // Aktiven Bereich initialisieren
            var activeFilter = $('.filter button.active').attr('data-filter');
            var data = activeFilter;


            // Latest oder Feature
            var dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
            var action = 'getpublications';

            // Filter
            if (activeFilter == 'author' ||
                    activeFilter == 'year' ||
                    activeFilter == 'subject') {

                data = JSON.stringify(filterVar);
                dataString = 'tx_attoworld_pi1[data]=' + data + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
                action = 'filterpublications';
            }

            // Suche
            if (typeof (activeFilter) == 'undefined') {
                dataString = 'tx_attoworld_pi1[sword]=' + $('.search .search-bar').val() + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit;
                action = 'publicationsearch';
            }

            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': false,
                'action': action,
                'data': dataString,
                'callback': function (response) {
                    PublicationsCallbackAjax(response, 'sm', e, _this);
                }
            });
        }

        // Internen Counter um 1 erhöhen und speichern
        _this.prop('internCounter', ++internCounter);
    }

    

    /* Steuert fading des Textes auf der Haupt- und Researchseite
     * 
     * @param object e
     */
    var fadeCenteredTextInSlideshow = function (e) {
        var startPoint = 40;
        var scrollY = window.scrollY;

        var viewportCurrentHeight = $('#header-slideshow').innerHeight() + naviHeight;

        if (scrollY >= (viewportCurrentHeight / 100 * startPoint)) {
            $('#header-slideshow .viewport .text').fadeOut();
        } else {
            $('#header-slideshow .viewport .text').fadeIn();
        }
    }

    /**
     * Allgeimeines Mausscroll-Event
     * 
     * @param object e
     */
    var MouseWheelHandler = function (e) {
        var viewportCurrentHeight = $('#header-slideshow').innerHeight();
        var header = $('#header-slideshow .overview li img');
        var rem = parseFloat($('#header-slideshow').css('height'));
        var headerText = $('#header-slideshow .viewport .text');
        var bulletMenuHeight = parseFloat($('.bullet-menu').innerHeight());
        var initialElementMarginTop = 4.5625;

        // Bilder der Unterseiten mit schieben
        if ($('.plugin-picturewithscrolldown').length > 0) {
            viewportCurrentHeight = $('.plugin-picturewithscrolldown').innerHeight();
            header = $('.plugin-picturewithscrolldown img.mainPicture');
            rem = parseFloat($('.plugin-picturewithscrolldown').css('height'));
            headerText = $('.plugin-picturewithscrolldown .scroll-down');
            bulletMenuHeight = 0;
            initialElementMarginTop = 1.6340625;
        }

        // Berechnung der Vschiebung der einzenen Bildelemente
        var geschwindigkeit = 2.25;
        var scrolled = ($(window).scrollTop() / geschwindigkeit) * -1 + rem;

        var scrollValue = scrolled - rem;

        header.css('transform', 'translate3d(0rem, ' + getRem(scrollValue) + 'rem, 0rem)');
        header.css('-o-transform', 'translate3d(0rem, ' + getRem(scrollValue) + 'rem, 0rem)');
        header.css('-ms-transform', 'translate3d(0rem, ' + getRem(scrollValue) + 'rem, 0rem)');
        header.css('-webkit-transform', 'translate3d(0rem, ' + getRem(scrollValue) + 'rem, 0rem)');

        var scrollY = initialElementMarginTop * parseFloat($('body').css('font-size')) + window.scrollY;
        var marginTop = parseFloat($('.attoworld-content').css('margin-top')) + bulletMenuHeight;
        var result = viewportCurrentHeight - marginTop;

        scrollY = scrollY + result;
        // Setzen der Höhe des Headertextes
        headerText.css('bottom', getRem(scrollY) + 'rem');

        var direction = 1;
        if (e.deltaY < 0) {
            direction = -1;
        }

        var viewportHeight = $('.viewport').outerHeight();
        var points = {
            'start': 250,
            'end': viewportHeight - $('.attoworld-navigation').prop('originHeightPx') + (parseFloat($('.viewport').css('margin-bottom')))
        }

        var fullHeight = viewportCurrentHeight;
        if (window.innerHeight < (viewportCurrentHeight + naviHeight)) {
            fullHeight = viewportCurrentHeight - (viewportCurrentHeight - window.innerHeight) - naviHeight;
        }

        var height = fullHeight;
        var scrollHeight = height - window.scrollY;

        var test = $('.button-overlay-left');
        var test2 = $('.button-overlay-right');

        var innerHeight = window.innerHeight;
        var newTop = height - window.scrollY - (fullHeight - window.scrollY);

        test.css('height', getRem(scrollHeight) + 'rem');
        test.css('top', getRem(newTop) + 'rem');
        test2.css('height', getRem(scrollHeight) + 'rem');
        test2.css('top', getRem(newTop) + 'rem');

        fadeCenteredTextInSlideshow(e);

        if (window.scrollY > 400) {

            if (typeof (e.deltaY) != 'undefined') {
                if ($('.attoworld-projectnavigation').length > 0) {
                    if (1 / e.deltaY !== -Infinity && 1 / e.deltaY !== Infinity) {
                        if (blockProjectNaviFading === false) {
                            blockProjectNaviFading = true;

                            if (e.deltaY > 0) {
                                $('.attoworld-projectnavigation ul').fadeOut(500, function () {
                                    blockProjectNaviFading = false;
                                });
                                $('.attoworld-projectnavigation .projecttitle').fadeIn(500, function () {
                                    blockProjectNaviFading = false;
                                });
                            } else {
                                // Einzelne Projekte nur auf den Unterseiten anzeigen, nicht im "About Us"-Bereich
                                if ($('body.page-49').length > 0 ||
                                        $('body.page-118').length > 0) {

                                } else {
                                    $('.attoworld-projectnavigation ul').fadeIn(500, function () {
                                        blockProjectNaviFading = false;
                                    });
                                    $('.attoworld-projectnavigation .projecttitle').fadeOut(500, function () {
                                        blockProjectNaviFading = false;
                                    });
                                }


                            }
                        }
                    }

                } else {

                }
            }

        }

        var ChangeNavigationHeight = function() {
            var navi = $('.attoworld-navigation');
            var scrollY = window.scrollY;
            if(typeof(navi.prop('animationrun')) == 'undefined') {
                navi.prop('animationrun',false);
            }
            
            if(typeof($('.attoworld-fixed').prop('originHeight')) !== 'undefined') {
                $('.attoworld-fixed').prop('originHeight',getRem($('.attoworld-fixed').height()));
            }
            if(typeof($('.attoworld-navigation').prop('originHeight')) !== 'undefined') {
                $('.attoworld-navigation').prop('originHeightRem',getRem($('.attoworld-navigation').height()));
                $('.attoworld-navigation').prop('originHeightPx',($('.attoworld-navigation').height()));
            }
        
            if(scrollY < changeNavigationHeightOnThisScrollPosition) {
                // Navigation vergrößern
                if(getRem(navi.height()) < 4) {
                    if(navi.prop('animationrun') === false) {
                        navi.prop('animationrun',true);
                        
                        $('.logo-picture-LMU').fadeIn();
                        $('.logo-picture-MPQ').fadeIn();
                        
                        navi.finish().animate({'height':'6.25rem'}, {
                            'duration' : 250,
                            'complete' : function() {
                                navi.css('height','6.25rem');
                                navi.prop('animationrun',false);
                                
                            }
                        });
                    }
                }
            } else {
                // Navigation verkleinern
                if(getRem(navi.height()) > 4) {
                    if(navi.prop('animationrun') === false) {
                        navi.prop('animationrun',true)
                        
                        $('.logo-picture-LMU').fadeOut();
                        $('.logo-picture-MPQ').fadeOut();
                        
                        navi.finish().animate({'height':'3.25rem'}, {
                            'duration' : 250,
                            'complete' : function() {
                                navi.css('height','3.25rem');
                                navi.prop('animationrun',false);
                            }
                        });
                    }
                }
            }
        }

        var setSubHeadlines = function (selector) {
            // @dev - kurzfristige Designänderung von Dennis
            if (selector.length > 0) {
                var elements = [
                    'div.headline',
                    'h2'
                ]

                var lastElement = null;
                var correctur = getPx(0.5 + getRem(correcturProjectSubsiteDennis));     // Korrekturwert für verschiedene Zoomstufen 

                $('.attoworld-projectnavigation .site-navi a').removeClass('active');
                $.each(elements, function (i, n) {
                    $.each($(n), function (si, sn) {
                        var id = $(sn).attr('id');


                        var navi = getNavigationHeight();
                        if (Math.floor($(this).offset().top) - navi - correctur <= $(window).scrollTop()) {
                            // $('.attoworld-projectnavigation .site-navi a').removeClass('active');
                            lastElement = $('.attoworld-projectnavigation .site-navi a[data-id="' + id + '"]');
                        } else {
                            // $('.attoworld-projectnavigation .site-navi a').removeClass('active');
                            // $('.attoworld-projectnavigation .site-navi a[data-id="'+id+'"]').removeClass('active');
                        }
                    });
                });

                if (lastElement !== null) {
                    lastElement.prevAll('a.active').removeClass('active');
                    lastElement.addClass('active');
                }
            }
        }

        setSubHeadlines($('body.page-111'));
        setSubHeadlines($('body.page-112'));
        setSubHeadlines($('body.page-113'));
        setSubHeadlines($('body.page-115'));
        setSubHeadlines($('body.page-116'));
        setSubHeadlines($('body.page-121'));     // Pupeza, 2. Seite - Projektmenü nicht gewünscht
        setSubHeadlines($('body.page-114'));
        setSubHeadlines($('body.page-49'));
        setSubHeadlines($('body.page-118'));
        
        ChangeNavigationHeight();

    }
    var blockProjectNaviFading = false;

    /**
     * Scrollt zurück zum Anfang der Webseite
     */
    backToTop = function () {
        $('html, body').finish().animate({
            'scrollTop': '0rem'
        });
    }

    // Wheel-Event Initialisierung
    var myimage = window;
    if (myimage.addEventListener) {
        // IE9, Chrome, Safari, Opera
        myimage.addEventListener("mousewheel", MouseWheelHandler, false);
        // Firefox
        myimage.addEventListener("DOMMouseScroll", MouseWheelHandler, false);
    }
    // IE 6/7/8
    else
        myimage.attachEvent("onmousewheel", MouseWheelHandler);

    /**
     * 
     * @param {type} e
     * @returns {undefined}
     */
    var toggleButtons = function (e) {
        var ww = $(window).width();
        var halfWw = ww / 2;

        if (e.pageX < halfWw) {
            $('.buttons.next').css('opacity', 0)
            var opacityValue = 1 / e.pageX * 100;

            // left
            $('.buttons.prev').css('opacity', opacityValue);
        }
        if (e.pageX > halfWw) {
            $('.buttons.prev').css('opacity', 0);

            var opacityValue = 1 / halfWw;

            // right
            //$('.buttons.next').css('opacity',0)
        }
    }

    var buttonFadeAnimationLimit = 500;

    /**
     * Zeigt die Buttons eines Filters an
     */
    var ShowButtons = function () {
        // Ausnahme: Die About-Us-Seite
        if ($('.page-118').length == 0) {
            $('.buttons', $(this)).fadeIn({
                'duration': buttonFadeAnimationLimit
            });
        }
    }

    /**
     * Blendet die Buttons eines Filters aus
     */
    var HideButtons = function () {
        // Ausnahme: Die About-Us-Seite
        if ($('.page-118').length == 0) {
            $('.buttons', $(this)).fadeOut({
                'duration': buttonFadeAnimationLimit
            });
        }
    }


    /**
     * Standard-AJAXCall
     * 
     * @param array parameters      Entsprechende Parameter
     */
    var ajaxCall = function (parameters) {
        var _this = $(this);
        var _parent = _this.parents('.mainFilter');

        var controller = 'tx_attoworld_pi1[controller]=Ajax';
        var action = 'tx_attoworld_pi1[action]=' + parameters.action;
        var typeNum = 6666;
        var path = jQuery(location).attr('origin') + '/';
        var showloadingin = parameters.showloadingin;

        if (parameters.reset === true) {
            // ELemente der Listen löschen
            $('.listing .list *', showloadingin).remove();
        }
        var loadingPicture = $('<img>', {'class': 'loading', 'src': '/typo3conf/ext/attoworld/Resources/Public/images/Attosekundenuhr.gif'});
        var loadingBar = $('<div>', {'class': 'loading-container'});
        var loadingLayer = $('<div>', {'class': 'loading-layer'});

        loadingBar.append(loadingPicture);
        loadingBar.append(loadingLayer);

        /*
         showloadingin.append(loadingPicture);
         */

        var ajaxLoadingArea = parameters.showloadingin;
        if (ajaxLoadingArea.length > 0) {
            ajaxLoadingArea.append(loadingBar);
        } else {
            $('.attoworld-content').append(loadingBar);
        }

        jQuery.ajax({
            url: path + 'index.php?' + controller + '&' + action + '&type=' + typeNum,
            data: parameters.data,
            method: 'POST',
            success: function (resultData, suc) {
                if (suc == 'success') {
                    $('.loading-container').remove();

                    // console.log($('li',resultData).length);

                    parameters.callback(resultData);
                }
            },
            error: function (error) {

            }
        });
    }



    // Setzen des Intervals für die SLideshow, gemäß der aufgerufenen Seite
    var attotype = 0;
    var interval = false;
    if ($('body.page-3').length > 0) {       // Research-Slideshow
        attotype = 1;
        interval = false;
    }
    if ($('body.page-1').length > 0) {       // Header-Slideshow
        attotype = 0;
        interval = true;
    }
    if ($('body.page-81').length > 0 || // Einzelne Projektunterseiten/ BIRD, Mihaela
            $('body.page-77').length > 0 || // 4d_FRI, Hanieh
            $('body.page-78').length > 0 || // ATTO; Martin & Nick
            $('body.page-79').length > 0 || // TAP, Vlad
            $('body.page-80').length > 0 || // HFS, Pupeza
            $('body.page-82').length > 0 || // FRM, Pronin
            $('body.page-83').length > 0) {     // Associated
        interval = true;
    }

    /*
     $('.slideshow').tinycarousel({
     bullets: false,
     start: -1
     });
     */
    loadSite();

    // zeitverzögerte Initialisierung der Kopf-Slideshow sowie anzeigen des Body-Inhaltes (Wegen falschen Werten, nach laden der Webseite)
    setTimeout(function () {
        setHeaderSlideshowWidth();

        $('body').css('opacity', '1');
    }, 300);



    /**
     * Setzt die Filtervorkonfiguration auf Grundlage der aktiven Seite
     */
    var setFilterVar = function () {
        // Konfiguration der Publikationen
        if ($('.page-5').length > 0) {
            filterVar = {
                'authors': {},
                'years': {},
                'subjects': {},
                'projects': {}
            }
        }
        // Konfiguration der Jobs
        if ($('.page-50').length > 0) {
            filterVar = {
                'projects': {}
            }
        }
        // Konfiguration der Personen auf der LapStaff-Seite
        if ($('.page-55').length > 0) {
            filterVar = {
                'projects': {}
            }
        }
        // Konfiguration der InThePress-Filterung
        if ($('.page-88').length > 0) {
            filterVar = {
                'dailypresss': {},
                'magazines': {},
                'years': {},
            }
        }
        // Konfiguration der Pressrelease-Filterung
        if ($('.page-98').length > 0) {
            filterVar = {
                'authors': {},
                'years': {},
                'subjects': {},
                'projects': {}
            }
        }
    }
    setFilterVar();

    // Legt die Konfiguration der Filterung entsprechend der Inhalte der verfügbaren filter-content-Objekte an
    $.each($('.filter-content'), function (fiI, fiV) {
        var fcIndex = $(fiV).attr('data-filter');
        $.each($('ul li', $(this)), function (uliI, uliV) {
            if ($(uliV).hasClass('active')) {
                var ulivIndex = $(uliV).attr('data-uid');

                filterVar[fcIndex + 's'][ulivIndex] = true;
            }
        });
    });

    /**
     * Ein Extrafilter für die Publikationen
     */
    function initExtraFilter(element) {
        var tmpThis = $(element);
        
        var textContent = 'Discover our Publications.';
        var newContent = '';
        var resetColletion = '';
        
        $.each(filterVar, function(i, n) {
            $.each(n, function(si, sn) {
                
                var activeElement = $('.filter-content[data-filter="'+i.substr(0,i.length-1)+'"] li[data-uid="'+si+'"]').clone();
                $('.publications', activeElement).remove();
                newContent += '<span class="deleteFromFilter" data-filter="'+i+'" data-uid="'+si+'">'+activeElement.text()+' <img class="delete-sign" src="/typo3conf/ext/attoworld/Resources/Public/images/LittleX.svg" alt="x"/>&nbsp;&nbsp;&nbsp;&nbsp;</span>'
                
            })
        });
        
        if(newContent != '') {
            resetColletion = ' <span class="reset-collection">Reset selection <img class="reset-sign" src="/typo3conf/ext/attoworld/Resources/Public/images/Reset.svg" alt="o"/></span>';
            textContent = 'Discover our Publications:&nbsp;&nbsp;&nbsp;&nbsp;';
        }
        
        $('.plugin-publications .text').html('<p>'+textContent + newContent + resetColletion + '</p>');
        
        setTrigger('blockDoubleInitialization');
    }

    var deleteFromFilter = function(e) {
        var _this = $(this);
        var dataUid = _this.attr('data-uid');
        var dataFilter = _this.attr('data-filter');
        
        var elementClass = '.filter-content[data-filter="'+dataFilter.substr(0,dataFilter.length-1)+'"] ul li[data-uid="'+dataUid+'"]';
        
        $(elementClass).trigger('click');
    }
    
    /**
     * Resettet den Filter
     * 
     * @param object e
     * @returns
     */
    var resetFilter = function(e) {
        var _this = $(this);
        
        $('.filter-contents li.active').removeClass('active');
        $('.publication-filter button .counter').text('');
        $('.publication-filter button.beholdColor').removeClass('beholdColor');
        $('.publication-filter button.active').removeClass('active');
        
        $('.plugin-publications .text').html('<p>Discover our Publications.</p>');
        
        $.each(filterVar, function(i, n) {
            filterVar[i] = {};
        })
        
        $('.plugin-publications button[data-filter="feature"]').trigger('click');
    }

    /**
     * Filtert aufgrund einer getroffenen Auswahl innerhalb eines Filter-Plugins
     * 
     * @param object e
     */
    var FilterContent = function (e) {
        var _this = $(this);
        var _parent = _this.parents('.mainFilter');

        // ShowMore-Button zurücksetzen, wenn gefiltert wird
        $('.show-more-button button', _parent).prop('internCounter', 1);

        // Reseten des Container-Detail-Elementes
        resetContainerDetail(_parent);

        if ($('.page-5').length > 0) {
            var fC = $(this).parents('.filter-content');
            var filter = fC.attr('data-filter');

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                var index = $(this).attr('data-uid');
                delete filterVar[filter + 's'][index];
            } else {
                $(this).addClass('active');
                var index = $(this).attr('data-uid');

                filterVar[filter + 's'][index] = true;
            }

            // Position bei jeder neuen Filterung wieder zurücksetzen
            var position = 0;
            if($('.show-more-button-publication button',_parent).length > 0) {
                $('.show-more-button-publication button',_parent).prop('internCounter',0);
            }
            
            $('.listing ul li').remove();
            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': true,
                'action': 'filterpublications',
                'data': 'tx_attoworld_pi1[data]=' + JSON.stringify(filterVar) + '&tx_attoworld_pi1[position]=' + position + '&tx_attoworld_pi1[limit]=' + limit,
                'callback': function (response) {
                    PublicationsCallbackAjax(response, null, e);
                }
            });
        }
        if ($('.page-50').length > 0) {
            var fC = $(this).parents('.filter-content');
            var filter = fC.attr('data-filter');

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                var index = $(this).attr('data-uid');
                delete filterVar[filter + 's'][index];
            } else {
                $(this).addClass('active');
                var index = $(this).attr('data-uid');
                filterVar[filter + 's'][index] = true;
            }

            $('.listing ul li').remove();
            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': true,
                'action': 'getjobs',
                'data': 'tx_attoworld_pi1[filter]=' + JSON.stringify(filterVar),
                'callback': function (response) {
                    JobsCallbackAjax(response, null, e);
                }
            });
        }
        if ($('.page-88').length > 0) {
            var fC = $(this).parents('.filter-content');
            var filter = fC.attr('data-filter');

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                var index = $(this).attr('data-uid');
                delete filterVar[filter + 's'][index];
            } else {
                $(this).addClass('active');
                var index = $(this).attr('data-uid');

                filterVar[filter + 's'][index] = true;
            }

            var tmpposition = 0;

            $('.listing ul li').remove();


            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': true,
                'action': 'filtermagazins',
                'data': 'tx_attoworld_pi1[data]=' + JSON.stringify(filterVar) + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit,
                'callback': function (response) {
                    MagazinCallbackAjax(response, null, e);
                }
            });
        }
        if ($('.page-98').length > 0) {
            var fC = $(this).parents('.filter-content');
            var filter = fC.attr('data-filter');

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                var index = $(this).attr('data-uid');
                delete filterVar[filter + 's'][index];
            } else {
                $(this).addClass('active');
                var index = $(this).attr('data-uid');

                filterVar[filter + 's'][index] = true;
            }

            var tmpposition = 0;

            $('.listing ul li').remove();

            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': true,
                'action': 'filternews',
                'data': 'tx_attoworld_pi1[data]=' + JSON.stringify(filterVar) + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit,
                'callback': function (response) {
                    NewsCallbackAjax(response, null, e);
                }
            });
        }
        if ($('.page-55').length > 0) {
            var fC = $(this).parents('.filter-content');
            var uid = $(this).attr('data-uid');

            // Alle Kategorien einblenden (in Suche möglicherweise ausgeblendet)
            $('.plugin-people .listing .category').show();

            if ($(this).hasClass('active')) {
                $(this).removeClass('active');

                $('.plugin-people .project-listing .category[data-category="' + uid + '"]').hide();
                $('.plugin-people .director-listing .category[data-category="' + uid + '"]').hide();
            } else {

                $('.filter-contents ul li.active').removeClass('active');
                $(this).addClass('active');

                $('.plugin-people .listing').hide();
                $('.plugin-people .project-listing').show();
                $('.plugin-people .director-listing').show();
                $('.plugin-people .project-listing .category').hide();
                $('.plugin-people .director-listing .category').hide();
                $('.plugin-people .project-listing .category[data-category="' + uid + '"]').show();
                $('.plugin-people .director-listing .category[data-category="' + uid + '"]').show();

                if ($('.plugin-people .project-listing').css('display') !== 'none') {

                    // NICHT anzeigen wenn Gruppen-ID gleich 5 ist (( 
                    if (uid != 5) {
                        $($('.plugin-people .project-listing .category[data-category="' + uid + '"] .person')[0]).delay(300).trigger('click', {'preventFocus': true});
                    }
                }
                if ($('.plugin-people .director-listing').css('display') !== 'none') {
                    // $($('.plugin-people .director-listing .category[data-category="'+uid+'"] .person')[0]).delay(300).trigger('click',{'preventFocus':true});
                }
                if ($('.plugin-people .listing').css('display') !== 'none') {

                    // Detail-Container anzeigen
                    $($('.plugin-people .listing .category[data-category="' + uid + '"] .person')[0]).delay(300).trigger('click', {'preventFocus': true});

                }
            }

        }

    }

    /** 
     * Verweis auf eine Unterseite via des Aktiven Buttons in der Bullet-Liste
     * 
     * @param object e
     */
    var linkToSupage = function (e) {
        var link = $(this).attr('data-pid');

        location.href = link;
    }

    /** 
     * Verweis auf eine Unterseite
     * 
     * @param object e
     */
    var linkToSupageViaActiveBullet = function (e) {
        var uid = $(this).parents('li').attr('data-uid');
        var link = $('#header-slideshow ul.overview li[data-uid="' + uid + '"]').attr('data-pid');

        location.href = link;
    }

    /**
     * Leitet auf den Link innerhalb eines Elementes einer Slideshow weiter
     * 
     * @param object e
     */
    var slideShowClickEvent = function (e) {
        var slider = $('#header-slideshow').data("plugin_tinycarousel");

        if (typeof (slider) !== 'undefined') {
            var li = $($('ul.overview li')[slider.slideCurrent]);

            if (li.length > 0) {
                location.href = li.attr('data-pid');
            }
        }
    }

    /**
     * Callback eines Ajax-Requests auf der Publikationsfilter-Seite
     * 
     * @param string response       Der AJAX-Response
     * @param string type           ein zusätzlicher Typ, der DOM-Manipulationen steuert
     * @param object thisevent      Das aufrufende Event, zur DOM-Manipulation
     * @param string string         eine zusätzliche String-Angabe, der DOM-Manipulationen steuert
     */
    function CallbackAjax(response, type, thisevent, string, thiselement) {

        var fC = $(thisevent.target).parents('.filter-content');
        if (fC.length > 0) {
            var dF = fC.attr('data-filter');
            if (dF) {
                var fBC = $('.filter button[data-filter="' + dF + '"] .counter');
                var c = $('ul li.active', fC)

                if (c.length > 0) {
                    fBC.text('(' + c.length + ')');
                } else {
                    fBC.text('');
                }

            }
        }

        var lContainer = $('.plugin-' + string + ' .listing ul.list');
        if (type != 'sm') {
            lContainer.html('');
        }
        try {
            var json = $.parseJSON(response);

            if (typeof (json.data.respmessage) == 'undefined') {
                $('.listing div.message').remove();

                if (string == 'publications') {
                    
                    
                } else {
                    $.each(json.data, function (i, v) {

                        if (string == 'publications') {

                            var authorString = 'Authors';
                            if (typeof (v.authors) !== 'undefined') {
                                if (v.authors.length == 1) {
                                    authorString = 'Author';
                                }
                            }

                            var authors = '<span class="title">' + authorString + ':</span> ';

                            var i = 0;
                            $.each(v.authors, function (si, sv) {
                                if (i++ > 0) {
                                    authors += ', ';
                                }

                                authors += '<span class="author" data-uid="' + sv.uid + '">' + sv.name + '</span>';
                            });

                            if (v.publications.length > 0) {
                                var additionalstaff = '<ul>';

                                var i = 0;
                                $.each(v.publications, function (si, sv) {
                                    additionalstaff += '<li class="publication" data-uid="' + sv.uid + '"><span class="type">' + sv.type + '</span>: <a class="inline-link" target="_blank" href="' + sv.file + '">' + sv.title + '</a></li>';
                                });

                                additionalstaff += '</ul>';
                            } else {
                                additionalstaff = '';
                            }

                            var journal = '<span class="journal">' + v.journal + '</span>';
                            if (v.journal == '') {
                                journal = '';
                            }
                            var volume = '<span class="volume">' + v.volume + ',</span>';
                            if (v.volume == '') {
                                volume = '';
                            }
                            var pageref = '<span class="pageref">' + v.pageref + '</span>';
                            if (v.pageref == '') {
                                pageref = '';
                            }

                            var junction = {
                                'paper': 'journal',
                                'pressrelease': 'press release',
                                'report': 'report',
                                'supplementaryinformation': 'supplementary information',
                                'thesis_bachelor': 'bachelor thesis',
                                'thesis_diploma': 'diplom',
                                'thesis_master': 'master thesis',
                                'thesis_phd': 'phd thesis',
                                'book': 'book',
                                'bookarticle': 'bookarticle'
                            };

                            var type = junction[v.type];

                            // Timestamp holen
                            var timeStamp = $.now();
                            var sixMonthInSeconds = 15778463;


                            var timeStampToCompair = (v.pubtstamp + sixMonthInSeconds) + '000';
                            // Auf Journal prüfen
                            if (v.journal == 'Science' ||
                                    v.journal == 'Nature' ||
                                    v.journal == 'Nature Communications' ||
                                    v.journal == 'Nature Middle East' ||
                                    v.journal == 'NatureMilestonesPhotons' ||
                                    v.journal == 'Nature.com' ||
                                    v.journal == 'Nature Physics' ||
                                    v.journal == 'Nature Photonics' ||
                                    v.journal == 'Nature photonics technology focus') {

                                // Auf Timestamp prüfen
                                if (parseInt(timeStampToCompair) > timeStamp) {
                                    v.file = v.url;
                                }
                            } else {
                                if (v.file == '' && v.url !== '') {
                                    v.file = v.url;
                                }
                            }

                            additionalstaff = '<div class="additionalstaff">' + additionalstaff + '</div>';

                            if (type == 'bookarticle') {
                                type += ' in';
                            }

                            var editors = '';
                            if (typeof (v.editors) !== 'undefined') {
                                if (v.editors != '') {
                                    editors = '<span class="editors">, Editors: ' + v.editors + '</span>';
                                }
                            }

                            var doi = '';
                            if (typeof (v.doi) !== 'undefined') {

                                if (type == 'bookarticle in') {
                                    doi = '<div class="doi-isbn"><span class="title">ISBN:</span> ' + v.doi + '</div>';
                                } else {
                                    //doi = '<div class="doi-isbn"><span class="title">DOI:</span> '+v.doi+'</div>';
                                }
                            }

                            var bodyText = '';
                            if (journal || volume || pageref) {

                                if (journal && !volume && !pageref) {
                                    if (type == 'bookarticle in') {
                                        bodyText = journal + ' <span class="year">(' + v.pubdate + ')</span>';
                                    } else {
                                        bodyText = journal + ', <span class="volume">' + '' + v.doi + '</span>' + ' <span class="year">(' + v.pubdate + ')</span>';
                                    }
                                } else {
                                    bodyText = journal + ' ' + volume + ' ' + pageref + ' <span class="year">(' + v.pubdate + ')</span>';
                                }


                            } else {
                                if (v.locations) {
                                    bodyText = '<span class="journal">' + v.locations + '</span>, <span class="year">' + v.pubdate + '</span>';
                                } else {

                                }
                            }

                            if (v.file != '') {
                                var li = $('<li>', {'data-uid': v.uid, 'class': 'hoverText', 'data-sorting': v.pubtstamp}).html(
                                        '<div class="container">' +
                                        '<div class="title"><a href="' + v.file + '" target="_blank">' + v.title + '</a></div>' +
                                        '<div class="authors">' + authors + '</div>' +
                                        '<div class="journal"><span class="title">' + type + ':</span> ' + bodyText + '' + editors + '</div>' +
                                        doi +
                                        additionalstaff +
                                        '</div>'
                                        );
                            } else {
                                var li = $('<li>', {'data-uid': v.uid, 'class': 'hoverText', 'data-sorting': v.pubtstamp}).html(
                                        '<div class="container nolink">' +
                                        '<div class="title">' + v.title + '</div>' +
                                        '<div class="authors">' + authors + '</div>' +
                                        '<div class="journal"><span class="title">' + type + ':</span> ' + bodyText + '' + editors + '</div>' +
                                        doi +
                                        additionalstaff +
                                        '</div>'
                                        );
                            }
                        }
                        if (string == 'magazin') {
                            if (v.file != '') {
                                var li = $('<li>', {'data-uid': v.uid}).html(
                                        '<div class=\"magazin magazin-' + i + ' clearfix verticalAlign\">' +
                                        '<div class=\"picture\">' +
                                        '<img src=\"' + v.picture + '\" width=\"150\" height=\"30\" alt=\"\">' +
                                        '</div>' +
                                        '<div class=\"content\">' +
                                        '<div class=\"title\">' + v.title + '</div>' +
                                        '<div class=\"additional-info\"><span class=\"type\">' + v.type + '</span> <span class=\"journal\">' + v.journal + '</span> <span class=\"pubdate\">' + v.pubdate + '</span></div>' +
                                        '</div>' +
                                        '<div class=\"download\">' +
                                        '<a href=\"' + v.file + '\" target=\"_blank\">' +
                                        '<img src=\"/typo3conf/ext/attoworld/Resources/Public/images/pdf-download.svg\">' +
                                        '</a>' +
                                        '</div>' +
                                        '</div>'
                                        );
                            } else {
                                var li = $('<li>', {'data-uid': v.uid}).html(
                                        '<div class="nolink">' +
                                        '<div class=\"magazin magazin-' + i + ' clearfix verticalAlign\">' +
                                        '<div class=\"picture\">' +
                                        '<img src=\"' + v.picture + '\" width=\"150\" height=\"30\" alt=\"\">' +
                                        '</div>' +
                                        '<div class=\"content\">' +
                                        '<div class=\"title\">' + v.title + '</div>' +
                                        '<div class=\"additional-info\"><span class=\"type\">' + v.type + '</span> <span class=\"journal\">' + v.journal + '</span> <span class=\"pubdate\">' + v.pubdate + '</span></div>' +
                                        '</div>' +
                                        '<div class=\"download\">' +
                                        '<a href=\"' + v.file + '\" target=\"_blank\">' +
                                        '<img src=\"/typo3conf/ext/attoworld/Resources/Public/images/pdf-download.svg\">' +
                                        '</a>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>'
                                        );
                            }
                        }

                        li.hide();
                        lContainer.append(li);

                    });

                    lContainer.attr('data-counter', json.counter);

                    // "Show More"-Button ausblenden wenn keine weiteren Einträge vorhanden sind
                    if (json.counter <= $('li', lContainer).length) {
                        if ($('.show-more-button-publication').length > 0) {
                            $('.show-more-button-publication').hide();
                        }
                        if ($('.show-more-button').length > 0) {
                            $('.show-more-button').hide();
                        }
                    } else {
                        if ($('.show-more-button-publication').length > 0) {
                            $('.show-more-button-publication').show();
                        }
                        if ($('.show-more-button').length > 0) {
                            $('.show-more-button').hide();
                        }
                    }
                }
                
                function RecuEffect(element) {
                    $(element).fadeIn({
                        'duration': 250,
                        'complete': function () {
                            if ($(element).next().length > 0) {
                                RecuEffect($(element).next()[0]);
                            }
                        }
                    })

                }

                RecuEffect($('.plugin-' + string + ' .listing ul.list li')[0]);
                MathJax.Hub.Typeset();
            } else {
                $('.listing div.message').remove();

                var message = $('<div class="message">').text(json.data.respmessage);
                $('.listing').append(message);
            }
        } catch (err) {
            if (string == 'magazin') {
                var html = lContainer.html();
                lContainer.html(html + response);
            } else if (string == 'publications') {
                // Filterung & Suche der Publikationen
                
                var html = lContainer.html();
                lContainer.html(html + response);
                var counter = $(".ajax-request",lContainer).attr('data-counter');

                lContainer.attr('data-counter', counter);

                var liElements = 0;
                $.each($('.ajax-request',lContainer), function(i, n) {
                    var result = parseInt(liElements) + parseInt($('li',$(n)).length);

                    liElements = result;
                });
                if(liElements == 0) {
                    if ($('.show-more-button-publication').length > 0) {
                        $('.show-more-button-publication').hide();
                    }
                    if ($('.show-more-button').length > 0) {
                        $('.show-more-button').hide();
                    }
                } else {
                    if (counter <= liElements) {
                        if ($('.show-more-button-publication').length > 0) {
                            $('.show-more-button-publication').hide();
                        }
                        if ($('.show-more-button').length > 0) {
                            $('.show-more-button').hide();
                        }
                    } else {
                        if ($('.show-more-button-publication').length > 0) {
                            $('.show-more-button-publication').show();
                        }
                        if ($('.show-more-button').length > 0) {
                            $('.show-more-button').hide();
                        }
                    }
                }
                
                // Erzeugen der Löschfunktion über den einen Extrafilter
                initExtraFilter(thiselement);
                
            } else if (string == 'newsfilter') {
                var html = lContainer.html();
                lContainer.html(html + response);

                $('.show-more-button').show();
            } else {
                throw err;
            }
            MathJax.Hub.Typeset();
        }

        setTrigger('blockDoubleInitialization');
    }

    /**
     * Callback eines Ajax-Requests auf der Magazin-Seite
     * 
     * @param string response       Der AJAX-Response
     * @param string type           ein zusätzlicher Typ, der DOM-Manipulationen steuert
     * @param object thisevent      Das aufrufende Event, zur DOM-Manipulation
     */
    function MagazinsCallbackAjax(response, type, thisevent) {
        CallbackAjax(response, type, thisevent, 'magazin');
    }

    /**
     * Callback eines Ajax-Requests auf der News-Seite
     * 
     * @param string response       Der AJAX-Response
     * @param string type           ein zusätzlicher Typ, der DOM-Manipulationen steuert
     * @param object thisevent      Das aufrufende Event, zur DOM-Manipulation
     */
    function NewsCallbackAjax(response, type, thisevent) {
        CallbackAjax(response, type, thisevent, 'newsfilter');
    }

    /**
     * Callback eines Ajax-Requests auf der Magazin-Seite
     * 
     * @param string response       Der AJAX-Response
     * @param string type           ein zusätzlicher Typ, der DOM-Manipulationen steuert
     * @param object thisevent      Das aufrufende Event, zur DOM-Manipulation
     */
    function MagazinCallbackAjax(response, type, thisevent) {
        CallbackAjax(response, type, thisevent, 'magazin');
    }

    /**
     * Callback eines Ajax-Requests auf der Publikationsfilter-Seite
     * 
     * @param string response       Der AJAX-Response
     * @param string type           ein zusätzlicher Typ, der DOM-Manipulationen steuert
     * @param object thisevent      Das aufrufende Event, zur DOM-Manipulation
     */
    function PublicationsCallbackAjax(response, type, thisevent, thiselement) {
        CallbackAjax(response, type, thisevent, 'publications', thiselement);
    }


    /**
     * entfernt die Detailansicht auf der Lap-Staffseite Categoy-übergreifend
     * 
     * @param object _parent
     */
    var resetContainerDetail = function (_parent) {
        // Geöffnetes Container-Element entfernen
        // Kapselung, da Ferenc geöffnet bleiben muss

        $('.category.Project .container-detail', _parent).remove();      // ProjectCoordinatoren
        $('.category.team .container-detail', _parent).remove();         // Director's Team
        $('.category.Scientists .container-detail', _parent).remove();   // Wissenschaftler
        $('.category.Students .container-detail', _parent).remove();     // Studenten
        $('.category.Technical .container-detail', _parent).remove();    // Technical Staff
    }

    var preFilter = null;       // Speichert den Wert des Filters, der vorher aktiv war. Dies ist notwendig, da die Filterung nicht aktiviert wird, wenn der Filter aufklappbar ist

    /**
     * Aktiviert einen Filter
     * 
     * @param object e
     */
    function ActivateFilter(e) {

        var _this = $(this);
        var _parent = _this.parents('.mainFilter');

        var activeElement = false;
        if ($(this).hasClass('active')) {
            activeElement = true;
        }

        // ShowMore-Button zurücksetzen, wenn gefiltert wird
        if (_this.hasClass('single-filter')) { // darauf prüfen ob es ein single-filter ist, nur dann zurücksetzen
            $('.show-more-button button', _parent).prop('internCounter', 1);

            // Reseten des Container-Detail-Elementes
            resetContainerDetail(_parent);
        }


        var preFiltered = false;

        // Ausblendung aufheben, falls vorhanden (Plugin-übergreifend)
        var parents = _this.parents('.mainFilter');
        $('.listing.oneIsActive', parents).removeClass('oneIsActive');

        if ($('.plugin-people').length > 0) {
            if ($('.plugin-people .filter-contents .filter-content ul li.active').length > 0) {
                preFiltered = true;
            }

            $('.plugin-people .listing .category').show();
            $('.plugin-people .listing .category:not([data-category="Director"]) .color-shape').show();

            if (activeElement !== true) {
                if (preFilter !== null) {
                    if (preFilter.hasClass('single-filter') && !_this.hasClass('single-filter')) {

                    } else {
                        // PreFilter ist nicht single-filter & der auf den gewechselt werden soll ist ein Single-Filter

                        if (_this.hasClass('single-filter')) {

                            $('.plugin-people .listing').show();
                            $('.plugin-people .project-listing').hide();
                            $('.plugin-people .director-listing').hide();

                        }
                    }
                } else {
                    if (preFiltered === true) {
                        if (_this.hasClass('single-filter')) {

                            $('.plugin-people .listing').show();
                            $('.plugin-people .project-listing').hide();
                            $('.plugin-people .director-listing').hide();

                        }
                    }
                }
            }

            $('.plugin-people .search .search-bar').val('');
        }

        var _this = $(this);

        /**
         * Resetet die Konfiguration eines Filter-Plugins
         */
        var resetConfigElements = function () {

            $.each($('.filter button'), function (i, n) {
                var counter = $('span.counter', n).text();
                if (counter) {
                    $(n).addClass('beholdColor');
                } else {
                    $(n).removeClass('beholdColor');
                }
                $(n).removeClass('active');
                $(n).css('height', '2.875rem');
            });

            $('.filter-content').removeClass('active');
            $('.filter-content').hide();
        }

        var filter = $(this).attr('data-filter');

        // Ausnahme: Nils bei Technical-Staff anzeigen, steuert Anzeige bei entsprechender Filterung
        if (technicalLeaderSelector.length > 0) {
            if (filter == technicalLeaderFilter) {
                technicalLeaderSelector.show();
            } else {
                technicalLeaderSelector.hide();
            }
        }

        if (e.data && !e.data.method) {
            if (typeof (e.data.type) != 'undefined' && (filter != 'project' && filter != 'director')) {

                if (e.data.type == 'people') {
                    var listing = $('.plugin-people .listing');
                    var categoryContainer = $('.category[data-category="' + filter + '"]', listing);

                    $('.plugin-people .filter button').removeClass('active');
                    $(this).addClass('active');

                    if (filter == 'all') {
                        $('.category', listing).show();
                        // $('.category[data-category="Director"] .person',listing).trigger('click', {'preventFocus':true});
                    } else {
                        $('.category', listing).hide();
                        categoryContainer.show();
                    }

                } else {
                    // undefinded
                }

                // Nils 
                if (filter == mainConfig.filter.technicalstaff) {
                    $($('.plugin-people .listing .category.Technical.staff .color-shape')[0]).trigger('click', {'preventFocus': true});
                }

                $('.plugin-people .filter-content').hide();
                $('.plugin-people button[data-filter="' + filter + '"]').css('height', '2.875rem');
                $('.plugin-people .filter-content ul li.active').removeClass('active');

            } else {
                // Projectübersicht anzeigen

                $('.plugin-people .listing .category').show();

                if (activeElement === true) {

                    $('.filter-content[data-filter="' + filter + '"]').slideUp({
                        'complete': function () {
                            resetConfigElements();

                            _this.removeClass('active');

                            $('.filter-content[data-filter="' + filter + '"]').removeClass('active');

                            _this.css('height', '2.875rem');


                        }
                    });

                } else {
                    resetConfigElements();

                    $(this).addClass('active');

                    $('.filter-content[data-filter="' + filter + '"]').addClass('active');
                    $('.filter-content[data-filter="' + filter + '"]').slideDown();

                    $(this).css('height', '3.5rem');

                }
            }
        } else {

            var type = $(this).attr('data-filter');

            if ($('.filter-content[data-filter="' + type + '"]').length > 0) {

                if (activeElement === true) {
                    $('.filter-content[data-filter="' + type + '"]').slideUp({
                        'complete': function () {
                            resetConfigElements();

                            _this.removeClass('active');

                            $('.filter-content[data-filter="' + type + '"]').removeClass('active');

                            _this.css('height', '2.875rem');


                        }
                    });
                } else {
                    resetConfigElements();

                    $(this).addClass('active');

                    $('.filter-content[data-filter="' + type + '"]').addClass('active');
                    $('.filter-content[data-filter="' + type + '"]').slideDown();

                    $(this).css('height', '3.5rem');
                }

            } else {
                resetConfigElements();

                $('.plugin-people .listing ul li').remove();
                $(this).addClass('active');

                var tmpposition = position * 0;
                // Position bei jeder neuen Filterung wieder zurücksetzen
                if($('.show-more-button-publication button',_parent).length > 0) {
                    $('.show-more-button-publication button',_parent).prop('internCounter',0);
                }
                


                var string = '';
                if (e.data.method == 'filtermagazins') {
                    string = 'magazin';
                } else {
                    if (e.data.method == 'getpublications' || e.data.method == 'filterpublications') {
                        string = 'publications';
                    } else {
                        if (e.data.method == 'filternews') {
                            string = 'newsfilter';
                        } else {

                        }
                    }
                }

                ajaxCall({
                    'showloadingin': $('.mainFilter'),
                    'reset': true,
                    'action': e.data.method,
                    'data': 'tx_attoworld_pi1[data]=' + type + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit,
                    'callback': function (response) {
                        CallbackAjax(response, null, e, string);
                    }
                });
            }
        }

        preFilter = _this;

        $('.plugin-people .filter button:not(.active)').css('height', '2.875rem');
    }

    /**
     * Enter-Event für die Magazin-Suche
     */
    var searchMagazinsEnter = function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            searchMagazins(event);
        }
    }

    /**
     * Suche auf der Magazin-Seite
     */
    var searchMagazins = function (e) {
        var _this = $(e.target);
        var _parent = _this.parents('.mainFilter');


        // ShowMore-Button zurücksetzen, wenn gefiltert wird
        $('.show-more-button button', _parent).prop('internCounter', 1);

        resetMainFilter(_parent);

        var sword = convertSigns($('.plugin-magazin .search .search-bar').val());
        $('.filter button').removeClass('active');
        var tmpposition = 0;

        ajaxCall({
            'showloadingin': $('.mainFilter'),
            'reset': true,
            'action': 'magazinsearch',
            'data': 'tx_attoworld_pi1[sword]=' + sword + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit,
            'callback': function (response) {
                MagazinsCallbackAjax(response, null, e);
            }
        });
    }

    /**
     * Enter-Event für die Publikationssuche
     */
    var searchPublicationsEnter = function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            searchPublications(event);
        }
    }

    
    /**
     * Ersetzt Sonderzeichen aus anderen Alphabeten zu den jeweiligen Entsprechungen des lateinischen Alphabetes
     */
    var convertSigns = function(sword) {
        var signs = {
            "Š":"S", "š":"s", "Ž":"Z", "ž":"z", "À":"A", "Á":"A", "Â":"A", "Ã":"A", "Ä":"A", "Å":"A", "Æ":"A", "Ç":"C", "È":"E", "É":"E",
            "Ê":"E", "Ë":"E", "Ì":"I", "Í":"I", "Î":"I", "Ï":"I", "Ñ":"N", "Ò":"O", "Ó":"O", "Ô":"O", "Õ":"O", "Ö":"O", "Ø":"O", "Ù":"U",
            "Ú":"U", "Û":"U", "Ü":"U", "Ý":"Y", "Þ":"B", "ß":"Ss", "à":"a", "á":"a", "â":"a", "ã":"a", "ä":"a", "å":"a", "æ":"a", "ç":"c",
            "è":"e", "é":"e", "ê":"e", "ë":"e", "ì":"i", "í":"i", "î":"i", "ï":"i", "ð":"o", "ñ":"n", "ò":"o", "ó":"o", "ô":"o", "õ":"o",
        };
        
        $.each(signs, function(specialChar, normalChar) {
            var re = new RegExp(specialChar,"g");
            
            sword = sword.replace(re, normalChar);
        });
        
        return sword;
    }

    /**
     * Resetet allgmeine Filteroptionen innerhalb eines Filter-Plugins
     * 
     * @param object _parent
     */
    var resetMainFilter = function (_parent) {

        // ShowMore-Button zurücksetzen, wenn gefiltert wird
        $('.show-more-button button', _parent).prop('internCounter', 1);

        $('.filter-contents .filter-content li.active', _parent).removeClass('active');
        $('.filter-contents .filter-content.active', _parent).removeClass('active');
        $('.filter-contents .filter-content', _parent).hide();
        $('.filter button.active', _parent).css('height', '2.875rem');
        $('.filter button.active .button-text', _parent).css('top', '0rem');

        $('.filter button.active', _parent).removeClass('active');

        // Variable zurücksetzen
        setFilterVar()
    }

    /**
     * Suche für die Publikationen auf der Publikationsfilter-Seite
     * 
     * @param object e
     */
    var searchPublications = function (e) {
        var _this = $(e.target);
        var _parent = _this.parents('.mainFilter');

        resetMainFilter(_parent);

        $('.filter button .counter', _parent).text('');

        var sword = convertSigns($('.plugin-publications .search .search-bar').val());
        $('.filter button').removeClass('active');
        
        if(sword != '') {

            // Position bei jeder neuen Filterung wieder zur√ºcksetzen
            var tmpposition = 0;
            if($('.show-more-button-publication button',_parent).length > 0) {
                $('.show-more-button-publication button',_parent).prop('internCounter',0);
            }

            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': true,
                'action': 'publicationsearch',
                'data': 'tx_attoworld_pi1[sword]=' + sword + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit,
                'callback': function (response) {
                    PublicationsCallbackAjax(response, null, e);
                }
            });
        } else {
            
        }
    }

    /**
     * Enter-Event für die Suche auf der News-Seite
     */
    var searchNewsEnter = function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            searchNews(event);
        }
    }

    /**
     * Suche für die News auf der News-Seite
     * 
     * @param object e
     */
    var searchNews = function (e) {
        var _this = $(e.target);
        var _parent = _this.parents('.mainFilter');
        // console.log(_this, _parent, _parent[0], $('.listing.oneIsActive',_parent)[0], $('.filter button.active',_parent)[0]);

        // ShowMore-Button zurücksetzen, wenn gefiltert wird
        $('.show-more-button button', _parent).prop('internCounter', 1);

        resetMainFilter(_parent);

        $('.listing.oneIsActive', _parent).removeClass('oneIsActive');

        var sword = convertSigns($('.plugin-newsfilter .search .search-bar').val());
        var tmpposition = 0;

        ajaxCall({
            'showloadingin': $('.mainFilter'),
            'reset': true,
            'action': 'newssearch',
            'data': 'tx_attoworld_pi1[sword]=' + sword + '&tx_attoworld_pi1[position]=' + tmpposition + '&tx_attoworld_pi1[limit]=' + limit,
            'callback': function (response) {
                NewsCallbackAjax(response, null, e);
            }
        });
    }

    /**
     * Enter-Event für die Suche auf der LapStaff-Seite
     */
    var searchPeoplesEnter = function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            searchPeoples(event);
        }
    }

    /**
     * Suche für die Personen auf der LapStaff-Unetrseite
     * 
     * @param object event
     */
    var searchPeoples = function (event) {
        var _this = $(event.target);
        var _parent = _this.parents('.mainFilter');
        var directorIdLocal = directorId;
        var nilsIdLocal = nilsId;


        // ShowMore-Button zurücksetzen, wenn gefiltert wird
        $('.show-more-button button', _parent).prop('internCounter', 1);


        var sword = convertSigns($('.plugin-people .search .search-bar').val());
        $('.filter button').removeClass('active');

        $('.plugin-people  .category:not([data-category="Director"]) .container-detail .close').trigger('click');

        $('.plugin-people .project-listing').hide();
        $('.plugin-people .director-listing').hide();
        $('.plugin-people .listing').show();
        $('.plugin-people .filter-contents .filter-content').hide();
        $('.plugin-people .filter-contents .filter-content ul li').removeClass('active');
        $('.plugin-people .filter button').css('height', '2.875rem');

        $('.plugin-people .listing .category:not([data-category="Director"]) .color-shape').show();
        $('.plugin-people .listing .category').show();

        $.each($('.plugin-people .listing .category'), function (i, n) {
            var personsTotal = $('.person', $(n)).length;

            var hiddenTotal = 0;
            $.each($('.person', $(n)), function (si, sn) {
                var personUid = $(sn).attr('data-uid');

                var properties = [
                    '.name',
                    '.position',
                    '.detail .description',
                    '.detail p',
                    '.detail ul:not(.design-listing-gefriert) li',
                    '.detail .title'
                ];

                var found = false;
                var help = [];
                $.each(properties, function (ssi, ssn) {
                    if (convertSigns($(ssn, $(sn)).text().toLowerCase()).indexOf(sword.toLowerCase()) !== -1) {
                        found = true;
                        help.push(ssn);
                    }
                });

                if (found === false) {
                    $(sn).parent().hide();
                    hiddenTotal++;
                } else {
                    // Sonderbehandlung Direktor, diesen bei der Suche nicht einblenden
                    // Sonderbehandlung Nils, diesen bei der Suche beim Technical-Staff nicht einblenden

                    if (directorIdLocal == personUid) {
                        $(sn).parent().hide();
                        // hiddenTotal++;   -> Kategorie anzeigen
                    } else {
                        if (nilsIdLocal == personUid && $(n).hasClass('Technical')) {
                            $(sn).parent().hide();
                            hiddenTotal++;
                        } else {
                            $(sn).parent().show();
                        }
                    }
                }
            });

            if (personsTotal == hiddenTotal) {
                $(n).hide();
            }
        });

        $.each($('.plugin-people .category'), function (i, n) {
            var hide = true;

            $.each($('.person', $(n)), function (si, sn) {
                if ($(sn).css('display') !== 'none') {
                    hide = false;
                }
            });

            if (hide === true) {
                $(n).hide();
            }
        });
    }

    /**
     * Callback des AJAX-Requests auf der JoinUs-Seite
     * 
     * @param string response       Der AJAX-Server-Response
     * @param string type           Ein übergebener Typ, der zusätzlich DOM-Manipulationen steuert
     * @param object thisevent      Das Event aus dem allgemeinen AjaxCallback-Aufruf zur Modifierzung des DOMs
     */
    function JobsCallbackAjax(response, type, thisevent) {
        var json = $.parseJSON(response);
        var lContainer = $('.plugin-jobs .listing ul');
        lContainer.html('');

        var fC = $(thisevent.target).parents('.filter-content');
        if (fC.length > 0) {
            var dF = fC.attr('data-filter');
            if (dF) {
                var fBC = $('.filter button[data-filter="' + dF + '"] .counter');
                var c = $('ul li.active', fC)

                if (c.length > 0) {
                    fBC.text('(' + c.length + ')');
                } else {
                    fBC.text('');
                }

            }
        }

        if (typeof (json.respmessage) == 'undefined') {
            $('.listing div.message').remove();

            $.each(json, function (i, v) {
                var pSG = '';
                if (typeof (v.personsubgroup) != 'undefined') {
                    pSG = '<div class="group"><span class="title">Group:</span>' + v.personsubgroup + '</div>';
                }

                var group = '';
                if (typeof (v.personsubgroup) != 'undefined') {
                    group = '<div class="group"><span class="title">Group:</span> ' + v.personsubgroup + '</div>';
                }

                var fd = v.fulltextdescription;

                if (v.gwdglink != '') {
                    var li = $('<li>', {'class': 'list-element hoverText'}).html(
                            '<div class="close"></div>' +
                            '<div class="title">' + v.type + ' // ' + v.title + '</div>' +
                            '<div class="location">' + v.location + '</div>' +
                            group +
                            '<div class="description">' + v.description + '</div>' +
                            '<div class="fulltext">' + fd +
                            '</div>' +
                            '<div class="apply">' +
                            '<a href="' + v.gwdglink + '" target="_blank">' +
                            'Apply' +
                            '</a>' +
                            '</div>'
                            );

                    lContainer.append(li);
                }
            });

            MathJax.Hub.Typeset();
        } else {
            $('.listing div.message').remove();

            var message = $('<div class="message">').text(json.respmessage);
            $('.listing').append(message);
        }

        setTrigger();
    }

    /**
     * Filtert die Jos auf der JoinUs-Seite
     * 
     * @param object e
     */
    var filterJob = function (e) {
        var activeElement = false;
        if ($(this).hasClass('active')) {
            activeElement = true;
        }
        var _this = $(this);

        var type = $(this).attr('data-filter');

        var resetConfigElements = function () {
            $.each($('.filter button'), function (i, n) {
                var counter = $('span.counter', n).text();

                if (counter) {
                    $(n).addClass('beholdColor');
                } else {
                    $(n).removeClass('beholdColor');
                }
                $(n).removeClass('active');
                $(n).css('height', '2.875rem');
            });

            $('.filter-content').removeClass('active');
            $('.filter-content').hide();
        }

        var filter = $(this).attr('data-filter');

        $(this).addClass('active');

        if (filter !== 'project' && filter !== 'director') {
            resetConfigElements();

            $('.listing ul li').remove();
            $(this).addClass('active');

            var tmpposition = position * 0;

            ajaxCall({
                'showloadingin': $('.mainFilter'),
                'reset': true,
                'action': 'getjobs',
                'data': 'tx_attoworld_pi1[filter]=' + filter,
                'callback': function (response) {
                    JobsCallbackAjax(response, null, e);
                }
            });
        } else {


            if ($('.filter-content[data-filter="' + filter + '"]').length > 0) {

                if (activeElement === true) {
                    $('.filter-content[data-filter="' + type + '"]').slideUp({
                        'complete': function () {
                            _this.removeClass('active');

                            $('.filter-content[data-filter="' + type + '"]').removeClass('active');

                            _this.css('height', '2.875rem');

                            resetConfigElements();
                        }
                    });
                } else {
                    resetConfigElements();

                    $(this).addClass('active');

                    $('.filter-content[data-filter="' + filter + '"]').addClass('active');
                    $('.filter-content[data-filter="' + filter + '"]').slideDown();

                    $(this).css('height', '3.5rem');
                }
            }
        }

    }

    // Blendet den einzelne Elemente auf der Startseite aus, wenn es mehr sind, als die maximal vorgegebene Anzahl an Elementen die sich auf der Startseite befinden dürfen
    $.each($('.plugin-filtermaincontent .grid .color-shape'), function (i, n) {
        if (i > maxGridElementsOnStartSite - 1) {
            $(n).hide();
        }
    });

    // Blendet den Show-More-Button auf der Hauptseite aus, wenn weniger oder gleichviele Elmente sich auf der Startseite befinden als die maximal definierte Anzahl an Elementen auf der Startseite
    if ($('body.page-1').length > 0 && $('.plugin-filtermaincontent .grid .color-shape').length <= maxGridElementsOnStartSite) {
        $('.show-more-button').hide();
    }

    // Prüft, o es sich bei der aktuellen Seite u eine Projektunterseite handelt und zeigt entsprechend die Projektnavigation an oder eben nicht
    if (checkForSubSites()) {
        $('.attoworld-projectnavigation').show();
    } else {
        $('.attoworld-projectnavigation').hide();
    }

    /**
     * Aktiviert die Suche
     */
    var activateSearch = function () {
        $('div.search-bar').show();
        $('div.search-bar').finish().animate({
            'width': '100%'
        }, {
            'complete': function () {
                $('.tx-indexedsearch-searchbox-sword.sword')[0].focus();
            }
        });
    }

    /**
     * Schließt die Suche
     * 
     * @param object e
     */
    var closeSearch = function (e) {
        if (window.event) {
            window.event.returnValue = false;
        }
        e.preventDefault();

        $('div.search-bar').finish().animate({
            'width': '0rem'
        }, function () {
            $('div.search-bar').hide();
        });
    }

    /**
     * Zeigt die Projektnavigation an
     */
    var showProjectNavi = function () {
        // Unterseiten der Projekte ausschließen
        if ($('body.page-111').length == 0 &&
                $('body.page-116').length == 0 &&
                $('body.page-121').length == 0 && // Pupeza, 2. Seite Projektmenü nicht gewünscht
                $('body.page-112').length == 0 &&
                $('body.page-113').length == 0 &&
                $('body.page-115').length == 0 &&
                $('body.page-114').length == 0 &&
                $('body.page-118').length == 0 &&
                $('body.page-49').length == 0) {

            $('.attoworld-projectnavigation ul').fadeIn(500, function () {
                blockProjectNaviFading = false;
            });
            $('.attoworld-projectnavigation .projecttitle').fadeOut(500, function () {
                blockProjectNaviFading = false;
            });

        }
    }

    /**
     * Schließt die Projektnavigation
     */
    var closeProjectNavi = function () {
        $('.attoworld-projectnavigation ul').fadeOut(500, function () {
            blockProjectNaviFading = false;
        });
        $('.attoworld-projectnavigation .projecttitle').fadeIn(500, function () {
            blockProjectNaviFading = false;
        });
    }

    /**
     * Scrollt zu einem Job-Item
     */
    var scrollToJob = function () {
        if ($('.plugin-jobs').length > 0) {
            var li = $('.plugin-jobs .listing li.list-element.active');
            if (li.length > 0) {
                //li.unbind('click', toggleJob);
                li.unbind('click', toggleJob2);
                setTimeout(function () {
                    $(window).scrollTop(li.offset().top - 75);
                }, 300);
            }
        }
    }

    /**
     * Aktiviert/Öffnet die Detailinformationen zu einer Person auf der LapStaff-Seite
     * 
     * @param object event
     * @param array params      Parameter welche die Anzeige beeinflussen
     */
    var activatePersonDetail = function (event, params) {

        if ($('.plugin-people  .category:not([data-category="Director"]) .container-detail').length > 0) {
            var uid = $('.detail', $('.plugin-people  .category:not([data-category="Director"]) .container-detail')).attr('data-uid');
            $('.plugin-people .listing .person-' + uid).parent().show();
        }

        if ($('.plugin-people  .category:not([data-category="Director"]) .container-detail').length > 0) {
            $('.plugin-people  .category:not([data-category="Director"]) .container-detail .close').trigger('click');
        }

        var _this = $(this);
        var details = $('.detail', _this).clone();
        var itemsPerRow = 4;

        if (details.length > 0) {
            var pAll = _this.prevAll();
            var insertBeforeAmountOfElements = pAll.length % itemsPerRow;

            var insertBeforeElement = _this;
            if (insertBeforeAmountOfElements > 0) {
                insertBeforeElement = $(pAll[insertBeforeAmountOfElements - 1]);
            }

            var $detailContainer = $('<div>', {'class': 'container-detail', 'data-uid': details.attr('data-uid')});
            $detailContainer.append($('<div>', {'class': 'close'}));

            var $tabs = $('<div>', {'class': 'tabs clearfix'});
            var aboutPuffer = $('.tab-content.about', details);

            var showSecondTab = false;

            if (aboutPuffer.length > 0) {
                if ($('.description', aboutPuffer).html().trim() !== '' ||
                        $('.curriculumvitae a', aboutPuffer).length > 0 ||
                        $('.publicationsbefore a', aboutPuffer).length > 0) {

                    $tabs.append($('<div>', {'class': 'tab', 'data-type': 'about'}).text('About'));

                } else {
                    showSecondTab = true;
                }
            } else {
                showSecondTab = true;
            }

            if ($('.tab-content.contacts', details).length > 0) {
                $tabs.append($('<div>', {'class': 'tab', 'data-type': 'contacts'}).text('Contact'));
                if (showSecondTab === true) {
                    $('.tab-content.contacts', details).attr('style', 'display: block');
                    $('.tab-content.about', details).hide();
                }
            }
            if ($('.tab-content.research', details).length > 0) {
                $tabs.append($('<div>', {'class': 'tab', 'data-type': 'research'}).text('Research'));
            }
            if ($('.tab-content.publications', details).length > 0) {
                $tabs.append($('<div>', {'class': 'tab', 'data-type': 'publications'}).text('Publications'));
            }
            if ($('.tab-content.team', details).length > 0) {
                $tabs.append($('<div>', {'class': 'tab', 'data-type': 'team'}).text('Team'));
            }

            $('.tab:first', $tabs).addClass('first');
            $('.tab:first', $tabs).addClass('active');
            $('.tab:last', $tabs).addClass('last');

            $detailContainer.append($tabs);
            $detailContainer.append(details);
            $detailContainer.insertBefore(insertBeforeElement);

            var scrollPosition = $detailContainer.offset().top;
            scrollPosition = scrollPosition - ((window.innerHeight - $detailContainer.height()) / 2);

            if (typeof (params) == 'undefined') {
                $(window).scrollTop(scrollPosition);
            } else {
                if (params.preventFocus && params.preventFocus === false) {
                    $(window).scrollTop(scrollPosition);
                }
            }

            $(this).hide();
        }

        setTrigger('blockDoubleInitialization');
    }

    /**
     * Deaktiviert/Schließt die offenen Detailinformationen zu einer Person auf der LapStaff-Seite
     */
    var deactivatePersonDetail = function () {
        var _parentCategory = $(this).parents('.category');
        var uid = $('.detail', $(this).parents('.container-detail')).attr('data-uid');

        $('.person-' + uid, _parentCategory).parent().show();

        $('.plugin-people .category:not([data-category="Director"]) .container-detail').remove();
        setTrigger('blockDoubleInitialization');

    }

    /**
     * Setzt die Breaking News
     */
    var setBreakingNews = function () {
        // Zeitversatz, da Slideshow-Elemente noch nicht als Aktiv markiert sind, wenn Seite geladne wurde
        setTimeout(function () {
            var activeBulletElement = $('.bullet-menu .bullets li a.active');
            var uid = activeBulletElement.parent().attr('data-uid');

            $('.plugin-breakingnews .plugin-breakingnews-inner-container[data-projectuid="' + uid + '"]').show();
        }, 300);
    }

    /**
     * Wechselt den Detail-Tab in der LapStaff-Seite
     */
    var switchDetailTab = function () {
        var _this = $(this);

        var type = _this.attr('data-type');
        var parent = _this.parents('.container-detail');
        $('.tab.active', parent).removeClass('active');

        $('.detail .tab-content', parent).hide();
        $('.detail .tab-content.' + type, parent).show();
        _this.addClass('active');
    }

    /**
     * Springt zu einem Element einer Slideshow
     * 
     * @param object e
     */
    var jumpToTarget = function (e) {
        e.preventDefault();

        var _this = $(this);
        var ssid = _this.attr('data-ssid');

        if (!_this.hasClass('toTimlineSlideshow')) {
            if (_this.hasClass('toSlideshow')) {
                var slideshow = $('.sub-slideshow[data-id="ss' + ssid + '"]');
                var pos = slideshow.offset().top;

                var slider = slideshow.data("plugin_tinycarousel");
                if (typeof (slider) !== 'undefined') {
                    var dataId = _this.attr('data-id');

                    slider.move(dataId);
                }

            } else {
                var _this = $(this);
                var target = _this.attr('href');
                var hash = target.substring(target.indexOf('#') + 1);
                var pos = $('#' + hash).offset().top - $('.attoworld-navigation').prop('originHeightPx');


            }

            $('html, body').animate({
                'scrollTop': pos
            });
        }
    }

    /**
     * Resizt das Window-Objekt
     * 
     * @param object e
     */
    var resizeElement = function (e) {
        // console.log('!');
    }

    /**
     * Scrollt aufgrund einer mathematischen Berechnung im window-Objekt hinunter
     */
    var ScrollALittleBitDown = function () {
        var firstHeadline = $($('div.headline')[0]);
        var scrollToPoint = window.innerHeight / 2 - $('.attoworld-navigation').prop('originHeightPx');

        $('html, body').animate({
            'scrollTop': (scrollToPoint) + 'px'
        });
    }

    /**
     * Ermittelt die tatsächliche Höhe eines Elemente,s definiert durch den Wert "auto" in der Einheit REM
     * 
     * @param object element        Der Selektor
     */
    var setAutoHeightInRem = function (element) {
        element.css('height', 'auto');
        var cHeight = element.outerHeight(true);
        element.css('height', getRem(cHeight) + 'rem');
    }

    /**
     * Toggelt die Anzeige einzelner NEws-Elemente auf der News-Seite
     * 
     * @param object e
     * @param array params
     */
    var toggleNewsEntry = function (e, params) {
        var _this = $(this);
        var textElement = $('.text', _this);
        var innerHeight = 0;
        var listing = _this.parents('.listing');

        // Noch aktive Elemente schließen bzw. zurücksetzen
        if ($('.news-element.active', listing).length > 0 &&
                !_this.hasClass('active')) {

            $.each($('.news-element', listing), function (i, n) {
                if (!$(n).is(_this)) {
                    $(n).removeClass('active');

                    $('.text', $(n)).css('height', getRem($(n).prop('textElementHeight')) + 'rem');
                    $(n).css('height', getRem($(n).prop('height')) + 'rem');
                }
            });
        }

        if (!_this.hasClass('active')) {
            _this.addClass('active');
            _this.prop('height', _this.outerHeight());
            _this.prop('textElementHeight', textElement.outerHeight());

            $.each($('.content', _this).children(), function (i, n) {
                //textElement.css('height','auto');
                setAutoHeightInRem(textElement);

                innerHeight += $(n).outerHeight(true);
            });

            innerHeight += parseFloat($('.content', _this).css('padding-top'));
            innerHeight += parseFloat($('.content', _this).css('padding-bottom'));

            if (parseFloat(_this.css('height')) < innerHeight) {
                _this.css('height', getRem(innerHeight) + 'rem');
            }

            listing.addClass('oneIsActive');

        } else {
            _this.removeClass('active');

            textElement.css('height', getRem(_this.prop('textElementHeight')) + 'rem');
            _this.css('height', getRem(_this.prop('height')) + 'rem');

            listing.removeClass('oneIsActive');
        }

        if (typeof (params) !== 'undefined') {
            if (typeof (params.jump) !== 'undefined') {
                var buffer = $('.news-element-' + newsItemId);

                if (buffer.length > 0) {
                    var scrollPosition = buffer.offset().top;
                    scrollPosition = scrollPosition - ((window.innerHeight - buffer.height()) / 2);

                    $('html, body').finish().animate({
                        'scrollTop': scrollPosition
                    }, {
                        'duration': 100
                    });
                }
            }
        }
    }

    /**
     * Springt zu einer bestimmten Person
     */
    var jumpToPerson = function () {
        var _this = $(this);
        var uid = _this.attr('data-uid');

        var personTab = $('.listing .person-' + uid);

        if (personTab.length > 0) {
            var position = (personTab.offset().top) - getPx(containerDetailHeight);

            var parameters = {  
                'focus' : true
            };
            
            _this.parents('.container-detail').find('.close').trigger('click', parameters);
            personTab.trigger('click');
            
            /*
            $('html, body').animate({
                'scrollTop': position
            });
            */
        }
    }

    /**
     * Scrollt zu einer bestimmten Stelle innerhalb des window-Objektes
     */
    var jumpToHeadline = function () {
        var _this = $(this);
        var a = _this.find('a');
        var uid = a.attr('href').substring(a.attr('href').indexOf('#'));

        var position = $(uid).offset().top - getNavigationHeight();
        position -= correcturProjectSubsiteDennis;

        // console.log(position, $(uid).offset().top, getNavigationHeight());
        $('html, body').animate({
            'scrollTop': position
        });

    }

    /**
     * Öffnet die Navigationsleiste auf der Navigationsunterseite
     */
    var showResearchNavigationOnSubsites = function () {
        $('.attoworld-projectnavigation ul').fadeIn(500, function () {
            blockProjectNaviFading = false;
        });
        $('.attoworld-projectnavigation .projecttitle').fadeOut(500, function () {
            blockProjectNaviFading = false;
        });
    }

    /**
     * Schließt die Navigationsleiste auf der Navigationsunterseite
     */
    var closeResearchNavigationOnSubsites = function () {
        $('.attoworld-projectnavigation ul').fadeOut(500, function () {
            blockProjectNaviFading = false;
        });
        $('.attoworld-projectnavigation .projecttitle').fadeIn(500, function () {
            blockProjectNaviFading = false;
        });
    }

    /**
     * Toggelt die Boxen auf der About Us sowie den Projektunterseiten
     * 
     * @param object e
     */
    var toggleSlidebox = function (e) {
        var _this = $(this);
        var _parent = _this.parents('.slidebox');

        if (_this.prop('status') !== false) {
            $('.slidebox-toggle', _parent).css('transform', 'rotate(45deg)');
            _this.prop('status', false);
        } else {
            $('.slidebox-toggle', _parent).css('transform', 'rotate(0deg)');
            _this.prop('status', true);
        }

        $('.slidebox-content', _parent).slideToggle({
            'complete': function () {

            }
        });
    }

    var lastBodyScrollPosition = null;

    /**
     * Schließt die Jahresslideshow
     * 
     * @param object e
     */
    var closeYearSlideshow = function () {
        $('body .slideshow-container.active').hide();
        $('body .slideshow-container.active').removeClass('active');

        $('body').css('position', 'static');
        $('body').css('overflow', 'auto');

        $("body").scrollTop(lastBodyScrollPosition);
        $('body .navigation-fixed').show();
    }

    /**
     * Zeigt die Jahresslideshow auf der "About Us"-Seite an
     * 
     * @param object e
     */
    var showYearSlideshow = function (e) {

        var _this = $(this);


        if (!_this.hasClass('noLink')) {
            var slideId = _this.attr('data-id');
            // var _parent = _this.parents('li.timeline-slideitem');

            var buttonClose = $('<div>', {'class': 'close'});
            var slideShowContainer = $('.slideshow-container');

            slideShowContainer.addClass('active');
            if (slideShowContainer.length > 0) {

                var slider = $('.timeline-sub-slideshow', slideShowContainer).data("plugin_tinycarousel");

                if (typeof (slider) !== 'undefined') {
                    slider.update();

                    // Tinycarousel aktualisieren
                    slider.SET(slideId, 'SET');
                    slider.update();
                } else {
                    var sliderContainer = $('.timeline-sub-slideshow', slideShowContainer);
                    // tlSs.addClass('slideshow');
                    sliderContainer.tinycarousel({
                        'infinite': true,
                        'fkSize': 'fullsize-timeline',
                        'interval': false,
                        'start': 0,
                        'startby': 1
                    });

                    slider = sliderContainer.data("plugin_tinycarousel");
                    slider.update();
                    slider.SET(slideId, 'SET');
                    slider.update();
                }

                //slideshowContainer = slideShowContainer.clone();


                /*
                 $('body .slideshow-container.active').hide();
                 $('body .slideshow-container.active').removeClass('active');
                 */

                slideShowContainer.append(buttonClose);

                // $('body').append(slideshowContainer);
                slideShowContainer.show();

                $('.close', slideShowContainer).unbind('click', closeYearSlideshow);
                $('.close', slideShowContainer).bind('click', closeYearSlideshow);



                lastBodyScrollPosition = window.scrollY;
                $('body').css('position', 'fixed');
                $('body').css('overflow', 'hidden');

                $('body .navigation-fixed').hide();
            } else {
                // Keine Slideshow gefunden
            }
        }



    }

    /**
     * Zeigt den vollen Text der jeweiligen assozierten Gruppen an
     * Trigger liegt auf dem .text-Element
     */
    var showFullText = function () {
        var _this = $(this);
        var _parent = _this.parents('.link-single');

        if (_parent.prop('open') !== true) {
            var parentOriginalHeight = _parent.innerHeight();

            var fullText = _parent.attr('data-fulltext');
            var textInnerHeight = $('.text', _parent).innerHeight();

            _parent.prop('open_shorttext', $('.text', _parent).html());
            _parent.prop('open_parentheight', parentOriginalHeight);
            _parent.prop('open_textheight', textInnerHeight);
            _parent.prop('open_windowwidth', $(window).innerWidth());

            $('.text', _parent).css('height', getRem(textInnerHeight) + 'rem');
            $('.text', _parent).html(fullText);

            var moveToHeight = 0;

            $('.text', _parent).css('height', 'auto');
            var moveTextToHeight = $('.text', _parent).innerHeight();
            $('.text', _parent).css('height', getRem(textInnerHeight) + 'rem');

            moveToHeight += parseFloat($('.content', _parent).css('padding-top'));
            moveToHeight += parseFloat($('.content', _parent).css('padding-bottom'));

            $.each($('.content', _parent).children(), function (i, n) {
                if ($(n).hasClass('text')) {
                    moveToHeight += moveTextToHeight;
                } else {
                    moveToHeight += parseFloat($(n).innerHeight());
                }
            });

            if (moveToHeight > parentOriginalHeight) {
                _parent.finish().animate({
                    'height': getRem(moveToHeight) + 'rem'
                }, {
                    'complete': function () {

                    }
                });

                $('.text', _parent).finish().animate({
                    'height': getRem(moveTextToHeight) + 'rem'
                }, {
                    'complete': function () {

                    }
                });
            }

            _parent.prop('open', true);
        } else {
            var parentOriginalHeight = getRem(_parent.prop('open_parentheight'));
            var textInnerHeight = getRem(_parent.prop('open_textheight'));
            var shortText = _parent.prop('open_shorttext');
            var windowWidth = _parent.prop('open_windowwidth');
            var currentWindowWidth = $(window).innerWidth();

            parentOriginalHeight = parentOriginalHeight / windowWidth * currentWindowWidth;
            textInnerHeight = textInnerHeight / windowWidth * currentWindowWidth;

            _parent.finish().animate({
                'height': parentOriginalHeight + 'rem'
            }, {
                'complete': function () {

                }
            });

            $('.text', _parent).finish().animate({
                'height': textInnerHeight + 'rem'
            }, {
                'complete': function () {
                    $('.text', _parent).html(shortText);
                }
            });

            _parent.prop('open', false);
        }
    }

    var jumpBack = function () {
        window.history.back();
    }

    var jumpBackFromError = function () {
        var _this = $(this);
        var _parent = _this.parents('.Tx-Formhandler');

        $('.errors', _parent).remove();
    }

    /**
     * Setzt die Trigger sämtlicher Interaktionsobjete auf der Webseite
     * 
     * @param string string     Beeinflusst die Triggersetzung/Verhindert doppelte Initialisierungen
     */
    var setTrigger = function (string) {

        $(window).unbind('scroll', MouseWheelHandler);
        $(window).bind('scroll', MouseWheelHandler);

        $(window).unbind('resize', loadSite);
        $(window).bind('resize', loadSite);

        $(window).unbind('load', loadSite);
        $(window).bind('load', loadSite);

        $('.show-filters button').unbind('click', toggleFilters);
        $('.show-filters button').bind('click', toggleFilters);

        /*
         $('.attoworld-navigation ul li').unbind('mouseenter',showProjectmenu);
         $('.attoworld-navigation ul li').bind('mouseenter',showProjectmenu);
         
         $('.navigation-fixed').unbind('mouseleave',closeProjectmenu);
         $('.navigation-fixed').bind('mouseleave',closeProjectmenu);
         */

        $('.plugin-latestnewsfeature .show-more-button button').unbind('click', showMoreNews);
        $('.plugin-latestnewsfeature .show-more-button button').bind('click', showMoreNews);

        $('div:not(.plugin-latestnewsfeature) .show-more-button button').unbind('click', showMore);
        $('div:not(.plugin-latestnewsfeature) .show-more-button button').bind('click', showMore);

        $('.back-to-top').unbind('click', backToTop);
        $('.back-to-top').bind('click', backToTop);

        $('.button-overlay-right').unbind('mouseenter', ShowButtons);
        $('.button-overlay-right').bind('mouseenter', ShowButtons);

        $('.button-overlay-left').unbind('mouseenter', ShowButtons);
        $('.button-overlay-left').bind('mouseenter', ShowButtons);

        $('.button-overlay-right').unbind('mouseleave', HideButtons);
        $('.button-overlay-right').bind('mouseleave', HideButtons);

        $('.button-overlay-left').unbind('mouseleave', HideButtons);
        $('.button-overlay-left').bind('mouseleave', HideButtons);

        $('.Tx-Formhandler a.back').unbind('mouseleave', jumpBack);
        $('.Tx-Formhandler a.back').bind('mouseleave', jumpBack);

        $('.Tx-Formhandler a.back-error').unbind('click', jumpBackFromError);
        $('.Tx-Formhandler a.back-error').bind('click', jumpBackFromError);

        /*
         $('#header-slideshow').unbind('mousemove',toggleButtons);
         $('#header-slideshow').bind('mousemove',toggleButtons);
         */

        $('.button-overlay-left').unbind('click', slideShowClickEvent);
        $('.button-overlay-left').bind('click', slideShowClickEvent);

        $('.button-overlay-right').unbind('click', slideShowClickEvent);
        $('.button-overlay-right').bind('click', slideShowClickEvent);

        $('.filter-contents .filter-content ul li').unbind('click', FilterContent);
        $('.filter-contents .filter-content ul li').bind('click', FilterContent);

        $('.plugin-publications .deleteFromFilter').unbind('click', deleteFromFilter);
        $('.plugin-publications .deleteFromFilter').bind('click', deleteFromFilter);

        $('.plugin-publications .reset-collection').unbind('click', resetFilter);
        $('.plugin-publications .reset-collection').bind('click', resetFilter);

        $('#header-slideshow ul.overview li').unbind('click', linkToSupage);
        $('#header-slideshow ul.overview li').bind('click', linkToSupage);

        // Verhindert doppelte Initialisierung
        if (string !== 'blockDoubleInitialization') {
            $('.plugin-publications .filter button').unbind('click', {'method': 'getpublications'}, ActivateFilter);
            $('.plugin-publications .filter button').bind('click', {'method': 'getpublications'}, ActivateFilter);
        }

        // Verhindert doppelte Initialisierung
        if (string !== 'blockDoubleInitialization') {
            $('.plugin-magazin .filter button').unbind('click', {'method': 'filtermagazins'}, ActivateFilter);
            $('.plugin-magazin .filter button').bind('click', {'method': 'filtermagazins'}, ActivateFilter);
        }

        // Verhindert doppelte Initialisierung
        if (string !== 'blockDoubleInitialization') {
            $('.plugin-newsfilter .filter button').unbind('click', {'method': 'filternews'}, ActivateFilter);
            $('.plugin-newsfilter .filter button').bind('click', {'method': 'filternews'}, ActivateFilter);
        }

        $('.plugin-publications .search .search-button').unbind('click', searchPublications);
        $('.plugin-publications .search .search-button').bind('click', searchPublications);

        $('.plugin-publications .search .search-bar').unbind('keypress', searchPublicationsEnter);
        $('.plugin-publications .search .search-bar').bind('keypress', searchPublicationsEnter);

        $('.plugin-magazin .search .search-button').unbind('click', searchMagazins);
        $('.plugin-magazin .search .search-button').bind('click', searchMagazins);

        $('.plugin-magazin .search .search-bar').unbind('keypress', searchMagazinsEnter);
        $('.plugin-magazin .search .search-bar').bind('keypress', searchMagazinsEnter);

        $('.plugin-newsfilter .search .search-button').unbind('click', searchNews);
        $('.plugin-newsfilter .search .search-button').bind('click', searchNews);

        $('.plugin-newsfilter .search .search-bar').unbind('keypress', searchNewsEnter);
        $('.plugin-newsfilter .search .search-bar').bind('keypress', searchNewsEnter);

        $('.plugin-people .search .search-button').unbind('click', searchPeoples);
        $('.plugin-people .search .search-button').bind('click', searchPeoples);

        $('.plugin-people .search .search-bar').unbind('keypress', searchPeoplesEnter);
        $('.plugin-people .search .search-bar').bind('keypress', searchPeoplesEnter);

        // Verhindert doppelte Initialisierung
        if (string !== 'blockDoubleInitialization') {
            $('.plugin-people .filter button').unbind('click', {'type': 'people'}, ActivateFilter);
            $('.plugin-people .filter button').bind('click', {'type': 'people'}, ActivateFilter);
        }

        $('.plugin-people .color-shape').unbind('click', activatePersonDetail);
        $('.plugin-people .color-shape').bind('click', activatePersonDetail);

        $('.plugin-people .container-detail .tab').unbind('click', switchDetailTab);
        $('.plugin-people .container-detail .tab').bind('click', switchDetailTab);

        $('.plugin-people .category:not([data-category="Director"]) .container-detail .close').unbind('click', deactivatePersonDetail);
        $('.plugin-people .category:not([data-category="Director"]) .container-detail .close').bind('click', deactivatePersonDetail);


        $('.plugin-jobs .listing ul li.list-element').unbind('click', toggleJob2);
        $('.plugin-jobs .listing ul li.list-element').bind('click', toggleJob2);
        
        $('.plugin-jobs .listing ul li.list-element .close').unbind('click',toggleJob2);
        $('.plugin-jobs .listing ul li.list-element .close').bind('click',toggleJob2);

        $('.plugin-jobs .listing ul li.list-element .close').unbind('click', closeJob);
        $('.plugin-jobs .listing ul li.list-element .close').bind('click', closeJob);

        $('.plugin-jobs .filter button').unbind('click', filterJob);
        $('.plugin-jobs .filter button').bind('click', filterJob);

        $('.plugin-jobs .filter button').unbind('click', filterJob);
        $('.plugin-jobs .filter button').bind('click', filterJob);

        $('.attoworld-search .search').unbind('click', activateSearch);
        $('.attoworld-search .search').bind('click', activateSearch);

        $('.search-bar .close').unbind('click', closeSearch);
        $('.search-bar .close').bind('click', closeSearch);

        $('.plugin-newsfilter .news-element').unbind('click', toggleNewsEntry);
        $('.plugin-newsfilter .news-element').bind('click', toggleNewsEntry);

        $('.attoworld-projectnavigation').unbind('mouseenter', showProjectNavi);
        $('.attoworld-projectnavigation').bind('mouseenter', showProjectNavi);

        /*
         $('.attoworld-projectnavigation').unbind('mouseleave',closeProjectNavi);
         $('.attoworld-projectnavigation').bind('mouseleave',closeProjectNavi);
         */

        $('.container-detail .tab-content.team ul li').unbind('click', jumpToPerson);
        $('.container-detail .tab-content.team ul li').bind('click', jumpToPerson);

        $('a.jump').unbind('click', jumpToTarget);
        $('a.jump').bind('click', jumpToTarget);

        $('.header-line .scroll-down').unbind('click', ScrollALittleBitDown);
        $('.header-line .scroll-down').bind('click', ScrollALittleBitDown);

        $('.slidebox-toggle').unbind('click', toggleSlidebox);
        $('.slidebox-toggle').bind('click', toggleSlidebox);

        $('.attoworld-projectnavigation .projecttitle ul li').unbind('click', jumpToHeadline);
        $('.attoworld-projectnavigation .projecttitle ul li').bind('click', jumpToHeadline);

        // Reserach Hovern auf der Projektunterseite
        $($('.page-112 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-112 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        $($('.page-113 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-113 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        $($('.page-115 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-115 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        $($('.page-116 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-116 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        $($('.page-121 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-121 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        $($('.page-111 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-111 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        $($('.page-114 .attoworld-navigation ul li a')[1]).unbind('mouseover', showResearchNavigationOnSubsites);
        $($('.page-114 .attoworld-navigation ul li a')[1]).bind('mouseover', showResearchNavigationOnSubsites);

        /* Nicht auf About-Us-Seite
         $($('.page-49 .attoworld-navigation ul li a')[1]).unbind('mouseover',showResearchNavigationOnSubsites);
         $($('.page-49 .attoworld-navigation ul li a')[1]).bind('mouseover',showResearchNavigationOnSubsites);
         */

        $('.plugin-publications .show-more-button-publication button').unbind('click', showMorePublications);
        $('.plugin-publications .show-more-button-publication button').bind('click', showMorePublications);

        $('.timeline-slideshow ul li img.round').parents('a').unbind('click', showYearSlideshow);
        $('.timeline-slideshow ul li img.round').parents('a').bind('click', showYearSlideshow);

        $('.plugin-linkonsubgroup div.content div.text').unbind('click', showFullText);
        $('.plugin-linkonsubgroup div.content div.text').bind('click', showFullText);


        /*
         $($('.page-112 .attoworld-navigation ul li a')[1]).unbind('mouseout',closeResearchNavigationOnSubsites);
         $($('.page-112 .attoworld-navigation ul li a')[1]).bind('mouseout',closeResearchNavigationOnSubsites);
         
         $($('.page-112 .attoworld-projectnavigation')[1]).unbind('mouseover',showResearchNavigationOnSubsites);
         $($('.page-112 .attoworld-projectnavigation')[1]).bind('mouseover',showResearchNavigationOnSubsites);
         
         $($('.page-112 .attoworld-projectnavigation')[1]).unbind('mouseout',closeResearchNavigationOnSubsites);
         $($('.page-112 .attoworld-projectnavigation')[1]).bind('mouseout',closeResearchNavigationOnSubsites);
         
         $($('.page-114 .attoworld-navigation ul li a')[1]).unbind('mouseout',closeResearchNavigationOnSubsites);
         $($('.page-114 .attoworld-navigation ul li a')[1]).bind('mouseout',closeResearchNavigationOnSubsites);
         
         $($('.page-114 .attoworld-projectnavigation')[1]).unbind('mouseover',showResearchNavigationOnSubsites);
         $($('.page-114 .attoworld-projectnavigation')[1]).bind('mouseover',showResearchNavigationOnSubsites);
         
         $($('.page-114 .attoworld-projectnavigation')[1]).unbind('mouseout',closeResearchNavigationOnSubsites);
         $($('.page-114 .attoworld-projectnavigation')[1]).bind('mouseout',closeResearchNavigationOnSubsites);
         */
        
        $(window).on('hashchange',initSitePersons);
        
    }

    setTrigger();           // Trigger erstmalig initalisieren
    scrollToJob();          // Scrollt zu einem Job, falls dieser übergeben wurde
    setBreakingNews();      // Setzt die Breaking News

    /**
     * Baut die Menüs dynamisch auf Grundlage der verschiedener Seitenelemente für die Projektunterseiten sowie die About Us-Seite zusammen
     * 
     * @param object buffer     Der Selektor, in welchem das Menü erzeugt werden soll
     * @param object finalSite  Parameter welcher den Menüaufbau steuert, wichtig, für Seiten die kein reines HTML mehr sind (About US und Projektunterseiten)
     */
    function buildBufferMenu(buffer, finalSite) {
        if (buffer.length > 0) {

            buffer.html('');
            var headlinesArr = new Array();

            // Diese Elemente innerhalb des DOM werden ausgelesen und als Menü deklariert bzw. definiert
            var elements = [
                '.headline',
                'h2'
            ];

            if (finalSite === true) {
                elements = [
                    'h2'
                ];
            }

            $.each(elements, function (i, n) {

                if ($(n).length > 1) {
                    $.each($(n), function (si, sn) {

                        var makeIt = true;
                        if (finalSite === true) {

                            if ($(sn).parents('header').length > 0) {
                                makeIt = false;
                            }
                        }

                        if (makeIt === true) {
                            $(sn).attr('id', 'cs' + si);

                            var type = 'sub';
                            if (n == '.headline') {
                                var type = 'main';
                            }

                            var text = $(sn).text();
                            if ($(sn).attr('data-menutext')) {
                                text = $(sn).attr('data-menutext');
                            }

                            headlinesArr.push({
                                'value': text,
                                'type': type,
                                'id': 'cs' + si
                            });
                        }
                    });
                } else {
                    $(n).attr('id', 'c' + i);

                    var type = 'sub';
                    if (n == '.headline') {
                        var type = 'main';
                    }

                    var text = $(n).text();
                    if ($(n).attr('data-menutext')) {
                        text = $(n).attr('data-menutext');
                    }

                    headlinesArr.push({
                        'value': text,
                        'type': type,
                        'id': 'c' + i
                    });
                }


            });

            var navigation = $('<ul>', {'class': 'clearfix site-navi'});
            $.each(headlinesArr, function (i, n) {
                var value = n.value;
                
                var li = $('<li>');
                var divider = $('<li>', {'class': 'divider'}).text('/');
                if (i == 0) {
                    li.addClass('first');
                } else {
                    if(value !== '') {
                        navigation.append(divider);
                    }
                }

                // Hauptüberschrift auf Research Activities immer ändern - Aussage von Dennis
                // AUßER es ist die "About Us"-Seite oder Pupezas zweite Subseite -_-
                if (n.type == 'main' &&
                    ($('body.page-49').length == 0 ||
                     $('body.page-118').length == 0)) {

                    if($('body.page-121').length == 0) {
                        value = 'Research Activities';
                    }
                }

                if(value !== '') {
                    var a = $('<a>', {'data-id': n.id, 'href': location.pathname + '#' + n.id, 'class': 'unselected'}).text(value);
                    li.append(a);

                    navigation.append(li);
                }
            });
            buffer.append(navigation);

            setTrigger();
        }
    }

    buildBufferMenu($('.page-111 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-112 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-113 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-115 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-116 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-121 .attoworld-projectnavigation .projecttitle'));      // Pupeza, 2. Seite, Projektmenü nicht gewünscht
    buildBufferMenu($('.page-114 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-49 .attoworld-projectnavigation .projecttitle'));
    buildBufferMenu($('.page-118 .attoworld-projectnavigation .projecttitle'), true);

    /**
     * Initialisierung der einzelnen Slideshows
     */
    var initSlideShows = function () {

        var min = -1;
        var max = $('.bullet-menu .bullets li').length - 1;
        // var x = Math.ceil((Math.random() * (max - min)) + min);

        // Das Slideshow-Element mit dem gestartet werden soll
        var x = $('#header-slideshow ul.overview').attr('data-startwith');

        // Slideshow der Zeitleiste auf der AboutUs-Seite
        $('.timeline-slideshow').tinycarousel({
            'startby': 0,
            'bullets': true,
            'fkSize': 'fullsize-time'
        });

        // Standard-Slideshows, bspw. auf der AboutUs-Übersichtseite
        $('.slideshow-withbullets').tinycarousel({
            'startby': 0,
            'start': -1,
            'bullets': true
        });

        $('.slideshow').tinycarousel({
            'bullets': false,
            'start': -1
        });

        // Slideshow auf den Unterseiten
        $('.sub-slideshow').tinycarousel({
            'infinite': true,
            'fkSize': 'fullsize',
            'interval': false,
            'start': 0
        });

        // Coverstories auf der About Us-Seite
        $('.coverstories-slideshow').tinycarousel({
            'infinite': true,
            'fkSize': 'fullsize',
            'interval': false,
            'start': 0,
            'startby': 1,
            'bullets': true,
            'fkType': 'coverstory',
        });

        // Initialisierung der Hauptslideshow im Kopfbereich der Webseite
        $('#header-slideshow').tinycarousel({
            bullets: true,
            start: x,
            interval: interval,
            attotype: attotype,
            intervalTimeInitial: 10000,
            intervalTimeInitialByClick: 16000,
            animationTime: 750,
        });
    }

    /**
     * Initialisierung von einzelnen Elementen auf der "About Us"-Seite
     */
    var initSiteAboutUs = function () {
        // Blendet die Unterprojekte aus und zeigt die Seitennavigation an
        $('.page-49 .attoworld-projectnavigation .verticalAlign ul.clearfix').hide();
        $('.page-49 .attoworld-projectnavigation .verticalAlign .projecttitle').show();

        $('.page-118 .attoworld-projectnavigation .verticalAlign ul.clearfix').hide();
        $('.page-118 .attoworld-projectnavigation .verticalAlign .projecttitle').show();

        // Bullet-Menü der Coverstories mittig ausrichten

        var bullets = $('.coverstories-slideshow .bullets');
        bullets.css('margin-left', '-' + (getRem(bullets.width()) / 2) + 'rem');

        // Bulletmenüs für About-Us Seite Milestones und Coverstories zentrieren
        $.each($('.slideshow-bullet-menu'), function (i, n) {
            var width = $(n).width();
            $(n).css('margin-left', (-1 * getRem(width / 2)) + 'rem');
        });
        
        $.each($('.text-content sup.footnote'), function(i, n) {
            
            
            var content = $(n).attr('data-footnotetext');
            var number = $(n).text();
            var parent = $(n).parents('.text-content');
            var liUid = $(n).parents('li').attr('data-uid');
            
            if($('.footnote-divider',parent).length == 0) {
                var hr = $('<hr>',{'class':'footnote-divider'});
                parent.append(hr);
            }
            
            $(n).html('<a class="footnote-jump" href="/about-us.html#footnote-'+liUid+'-'+number+'">'+number+'</a>')
            
            var p = $('<p>',{'class':'footnote'}).html('<b>'+number+'</b> '+content);
            
            //var idString = 'footnote-'+liUid+'-'+number;
            var idString = 'footnote-'+number;
            p.attr('id',idString);
            
            parent.append(p);
        });
        
        var fullHeight = 0;
        $.each($('.text-content'), function(i, n) {
            var imageHeight = $(n).prev().height();
            
            imageHeight += parseFloat($(n).prev().css('margin-top'));
            imageHeight += parseFloat($(n).prev().css('margin-bottom'));
            
            var contentHeight = $(n).height();
            
            if(fullHeight < imageHeight + contentHeight) {
                fullHeight = imageHeight + contentHeight;
            }
        });
        $('.plugin-milestones .viewport').css('height',getRem(fullHeight)+'rem');
        
        function jumpToFootnote() {
            var _this = $(this);
            var liUid = _this.parents('li').attr('data-uid');
            var target = $('#footnote-'+liUid+'-'+_this.text());
            
            if(target.length > 0) {
                $('html, body').finish().animate({
                    'scrollTop' : $(target).offset().top - getNavigationHeight()
                });
            }
        }
        
        $('.footnote-jump').unbind('click',jumpToFootnote);
        $('.footnote-jump').bind('click',jumpToFootnote);
    }

    /**
     * Dynamische Initalisierung der Publikationsfilter-Seite
     */
    var initSitePublicationFilter = function () {

        // Fokus auf die Suche setzen
        if ($('body.page-5').length > 0) {   // 5 ist die ID der Publikationsfilter-Seite
            $('.plugin-publications .search .search-bar')[0].focus();
        }

    }

    /**
     * Dynamische Initalisierung der LapStaff-Seite
     */
    var initSitePersonFilter = function () {

        // Ferenc ausklappen
        if ($('body.page-55').length > 0) {   // 55 ist die ID der LapStaff-Seite
            $($('.plugin-people .listing .person')[0]).trigger('click',{'preventFocus':true});
        }

    }

    /**
     * Dynamische Initialisierung der Contact-Seite
     */
    var initSiteContact = function () {

        if ($('.Tx-Formhandler #message').length > 0) {  // Formhandler-ID

            /**
             * Dynamisches Wachsen des textarea-Elementes
             */
            function autosize() {
                var el = this;
                setTimeout(function () {
                    el.style.cssText = 'height:auto; padding:0';
                    // for box-sizing other than "content-box" use:
                    // el.style.cssText = '-moz-box-sizing:content-box';
                    el.style.cssText = 'height:' + el.scrollHeight + 'px';

                    if (parseFloat($(el).css('max-height')) < el.scrollHeight) {
                        $(el).css('overflow-y', 'scroll')
                    } else {
                        $(el).css('overflow-y', 'hidden')
                    }

                }, 0);
            }

            var textarea = $('.Tx-Formhandler #message')[0];
            textarea.addEventListener('keydown', autosize);
            textarea.focus();

            // Kontaktformular, Fokus auf textarea setzen
            $('.Tx-Formhandler #message').focus();
        }


        // Fehler-Liste anzeigen
        setTimeout(function () {

            if ($('.errors').children().length > 1) {
                $('.errors').show();
            }

        }, 300);
    }

    /**
     * Dynamische Initialisierung der News-Seite
     */
    var initSiteNews = function () {
        if (typeof (newsItemId) !== 'undefined') {
            var buffer = $('.news-element-' + newsItemId);

            if (buffer.length > 0) {
                buffer.trigger('click', {'jump': true});
            }
        }

        // Temporäres Menü (! - laut Dennis Aussage) erstellen
        if ($('.page-54').length > 0 ||
                $('.page-98').length > 0 ||
                $('.page-88').length > 0 ||
                $('.page-89').length > 0) {

            $('.attoworld-projectnavigation ul li').remove();

            var linkResearch = $('<a>', {'href': '/newssystem/?tx_attoworld_pi21%5Bprefilter%5D=research'}).text('RESEARCH');
            var linkTeam = $('<a>', {'href': '/newssystem/?tx_attoworld_pi21%5Bprefilter%5D=team'}).text('TEAM');
            var linkGraduation = $('<a>', {'href': '/newssystem/?tx_attoworld_pi21%5Bprefilter%5D=graduation'}).text('GRADUATION');
            var linkInThePress = $('<a>', {'href': '/news/in-the-press'}).text('IN THE PRESS');

            var activeElementDataFilter = $('.plugin-newsfilter .filter button.active').attr('data-filter');

            /*
             * // Erstmal rausnehmen - Tanya (23.05.2017)
             if(activeElementDataFilter == 'research') {
             linkResearch.addClass('selected');
             } else if(activeElementDataFilter == 'team') {
             linkTeam.addClass('selected');
             } else if(activeElementDataFilter == 'graduation') {
             linkGraduation.addClass('selected');
             } else {
             if($('.page-88').length > 0) {
             linkInThePress.addClass('selected');
             }
             }
             */

            var divider = '/';

            var liDivider = $('<li>', {'class': 'divider'}).text(divider);
            var liResearch = $('<li>').append(linkResearch);
            var liTeam = $('<li>').append(linkTeam);
            var liGraduation = $('<li>').append(linkGraduation);
            var liInThePress = $('<li>').append(linkInThePress);

            $('.attoworld-projectnavigation ul').append(liResearch);
            $('.attoworld-projectnavigation ul').append(liDivider.clone());
            $('.attoworld-projectnavigation ul').append(liTeam);
            $('.attoworld-projectnavigation ul').append(liDivider.clone());
            $('.attoworld-projectnavigation ul').append(liGraduation);
            $('.attoworld-projectnavigation ul').append(liDivider.clone());
            $('.attoworld-projectnavigation ul').append(liInThePress);

            $('.attoworld-projectnavigation .projecttitle').text('Our News');

            $('.attoworld-projectnavigation').delay(500).css('display', 'block !important');
            $('.attoworld-projectnavigation').delay(500).show();
        }
    }

    var getNavigationHeight = function() {
        var navigationHeight = $('.navigation-fixed').height();
        
        if(typeof($('.attoworld-navigation').prop('originHeight')) !== 'undefined') {
            navigationHeight = $('.attoworld-navigation').prop('originHeight');
            
            console.log('origin',navigationHeight);
        } else {
            console.log('manipulated',navigationHeight);
        }
        
        return navigationHeight;
    }

    /**
     * Dynamische Initialisierung der Associated-Seite
     */
    var initAssociatedSite = function () {

        if ($('body.page-83').length > 0) {
            setTimeout(function () {
                var hashTag = window.location.hash;
                var position = $(hashTag).position().top;
                position -= getNavigationHeight();

                $('.text', hashTag).trigger('click');
                $('html, body').finish().animate({
                    'scrollTop': position
                }, {
                    'complete': function () {

                    }
                });
            }, 300);
        }

    }

    /**
     * Dynamische Initialisierung des Publikationsfilters
     */
    var initPublicationFilter = function () {
        if ($('.page-5').length > 0) {   // Publikationsfilter-Seite

            var filterAuthor = $('.filter-content[data-filter="author"]');

        }
    }

    /**
     * Initialisiert die IMG-Elemente auf einer Seite, falls nachgeladen werden soll
     */
    var makeImageElements = function () {
        var images = $('.maketoimage');

        $.each(images, function (i, n) {
            // console.log(n);
            var src = $(n).attr('data-uri');
            var img = $('<img>', {'src': src});

            img.insertAfter($(n));
            $(n).remove();
        });
    }
    
    /**
     * Initialisiert die Team-Seite
     */
    var initSitePersons = function() {
        var hash = window.location.hash;
        if(hash.substr(1,hash.length) != 'ferenc-krausz') {
            var person = $('.person[data-nameid="'+hash.substr(1,hash.length)+'"]');
        }
        person.trigger('click');
    }

    // Initialisierungs-Aufrufe
    initSiteAboutUs();
    initSitePublicationFilter();
    initSitePersonFilter();
    initSiteContact();
    initSitePersons();
    initSiteNews();
    initSlideShows();
    initAssociatedSite();
    initPublicationFilter();

    makeImageElements();

});