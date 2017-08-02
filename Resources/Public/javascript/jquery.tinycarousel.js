;(function(factory) {
    if(typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    }
    else if(typeof exports === 'object') {
        module.exports = factory(require('jquery'));
    }
    else {
        factory(jQuery);
    }
}
(function($) {
    var pluginName = "tinycarousel"
    ,   defaults   =
        {
            start: 0
        ,   startby: null
        ,   axis: "x"
        ,   buttons: true
        ,   bullets: false
        ,   interval: false
        ,   intervalTime: 0
        ,   intervalTimeInitialByClick: 8000
        ,   intervalTimeInitial: 5000
        ,   animation: true
        ,   easing: 'easeInOutCubic'
        ,   animationTime: 750
        ,   infinite: true
        ,   fkSize: 'normal'    // normal oder fullsize oder fullsize-timeline
        }
    ;

    function Plugin($container, options) {
        /**
         * The options of the carousel extend with the defaults.
         *
         * @property options
         * @type Object
         * @default defaults
         */
        this.options = $.extend({}, defaults, options);

        /**
         * @property _defaults
         * @type Object
         * @private
         * @default defaults
         */
        this._defaults = defaults;

        /**
         * @property _name
         * @type String
         * @private
         * @final
         * @default 'tinycarousel'
         */
        this._name = pluginName;

        var self = this
        ,   $viewport = $container.find(".viewport:first")
        ,   $overview = $container.find(".overview:first")
        ,   $slides = null
        ,   $next = $container.find(".next:first")
        ,   $prev = $container.find(".prev:first")
        //,   $bullets = $container.find(".bullet")
        ,   $bullets = $('.bullet-menu .bullets .bullet',$container.parents('body'))

        ,   viewportSize = 0
        ,   contentStyle = {}
        ,   slidesVisible = 0
        ,   slideSize = 0
        ,   slideIndex = 0

        ,   isHorizontal = this.options.axis === 'x'
        ,   sizeLabel = isHorizontal ? "Width" : "Height"
        ,   posiLabel = isHorizontal ? "left" : "top"
        ,   intervalTimer = null
        ,   attotype = 0
        ;


        /**
         * Startet mit diesem Punkt
         */
        this.startPoint = 0;

        /**
         * The index of the current slide.
         *
         * @property slideCurrent
         * @type Number
         * @default 0
         */
        this.slideCurrent = -1;

        /**
         * The number of slides the carousel is currently aware of.
         *
         * @property slidesTotal
         * @type Number
         * @default 0
         */
        this.slidesTotal = 0;
        
        this.slideSize = 0;
        
        this.slideIndex = 0;

        /**
         * If the interval is running the value will be true.
         *
         * @property intervalActive
         * @type Boolean
         * @default false
         */
        this.intervalActive = false;

        /**
         * @method _initialize
         * @private
         */
        function _initialize() {
            
            self.options.intervalTime = self.options.intervalTimeInitial;
            
            if(options.fkSize == 'fullsize-time' || $('.page-118').length > 0) {
                $bullets = $container.find(".bullet");
            }
            
            // Ermitteln und setzen der FullsizeValue
            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline') {
                
                var fullsizeValue = 80 * parseFloat($('body').css('font-size'));
                var startWithWidth = ($(window).width() - fullsizeValue) / 2;
                self.startPoint = (0 - startWithWidth) * -1;
            }
            
            self.update();
            
            self.slideIndex = slideIndex = self.slideCurrent;
            self.slideCurrent = slideIndex % self.slidesTotal;
            
            if(typeof(self.options.startby) == 'number') {
                self.SET(self.options.startby, 'SET');
            } else {
                if(!self.options.start) {
                    self.SET(self.slideCurrent, 'SET');
                    //self.SET(self.slideCurrent);
                } else {
                    self.SET(self.slideCurrent, 'SET');
                }
            }

            
            
            _setEvents();

            

            if(options.fkSize == 'fullsize-time') {
                
                // Delay von 500ms berücksichtigen
                setTimeout(function() {
                    var viewportHeight = 0;
                    var bulletsHeight = $('.bullets').height();

                    $.each($('li.timeline-slideitem',$overview), function(i, n) {
                        var liElement = $(n);

                        if(liElement.innerHeight() > viewportHeight) {
                            viewportHeight = liElement.innerHeight();
                        }
                    });
                    viewportHeight += getRem(bulletsHeight);

                    $viewport.css('height',getRem(viewportHeight)+'rem'); 
                }, 500);
                
            }

			// Aktuelle Bildunterschrift anzeigen, falls vorhanden
            $('li .picturecaption',$overview).hide();
            
            var cElement = $($('li .picturecaption',$overview)[self.slideCurrent]);
            var dataUid = cElement.parents('li').attr('data-uid');
            
            $('.picturecaption',cElement).show();
            $('li[data-uid="'+dataUid+'"] .picturecaption',$overview).show();

            setTimeout(function() {
                // Korrektur der SlideSize (falsche Werte bei Seiteninitialisierung)
                self.slideSize = slideSize = $slides.first()["outer" + sizeLabel](true);
            }, 300);
            
            return self;
        }

        /**
         * You can use this method to add new slides on the fly. Or to let the carousel recalculate itself.
         *
         * @method update
         * @chainable
         */
        this.update = function() {
            
            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
           
                var fullsizeValue = 80 * parseFloat($('body').css('font-size'));
                var startWithWidth = ($(window).width() - fullsizeValue) / 2;
                self.startPoint = (0 - startWithWidth) * -1;
            }
            
            $overview.find(".mirrored").remove();

            $slides = $overview.children();
            viewportSize = $viewport[0]["offset" + sizeLabel];
            self.slideSize = slideSize = $slides.first()["outer" + sizeLabel](true);
            
            self.slidesTotal = $slides.length;
           
            if(self.options.start) {
                if(self.slideCurrent == -1) {
                    self.slideCurrent = self.options.start || 0;
                }
            }
            slidesVisible = Math.ceil(viewportSize / slideSize);

            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
                // console.log(self.slidesTotal, '!', $slides.slice(self.slidesTotal - 1, -2).clone().addClass("mirrored"), self.slidesTotal, $slides, $slides.slice(self.slidesTotal, -4));
                // var slideVars = $slides.clone();
                // $overview.prepend($slides.clone().reverse().addClass("mirrored"));
                
                var slidesArr = $slides.clone().get().reverse();
                $overview.prepend($(slidesArr[0]).addClass("mirrored"));
                $overview.prepend($(slidesArr[1]).addClass("mirrored"));
                
                $overview.append($slides.slice(0, 3).clone().addClass("mirrored"));
            } else {
                $overview.append($slides.slice(0, slidesVisible).clone().addClass("mirrored"));
            }
            
            
            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
                $overview.css(sizeLabel.toLowerCase(), slideSize * (self.slidesTotal + slidesVisible + 3));
            } else {
                $overview.css(sizeLabel.toLowerCase(), slideSize * (self.slidesTotal + slidesVisible));
            }
            
            _setButtons();

            return self;
        };

        this.blockSetIntervalTime = false;
        this.setIntervalTime = function(time) {
            self.options.intervalTime = time;
        }

        /**
         * @method _setEvents
         * @private
         */
        function _setEvents() {
            if(self.options.buttons) {
                $prev.click(function() {
                    
                    self.move(--slideIndex, self.options.intervalTimeInitialByClick);

                    return false;
                });
                $next.click(function(e) {
                    e.preventDefault();
                    
                    self.move(++slideIndex,self.options.intervalTimeInitialByClick);

                    return false;
                });
            }

            $(window).resize(self.update);

            if(self.options.bullets) {
                if(options.fkSize == 'fullsize-time') {
                    $container.on("click", ".bullet", function() {
                        
                        self.move(slideIndex = +$(this).attr("data-slide"), self.options.intervalTimeInitialByClick);

                        return false;
                    });
                } else {
                    
                    if(options.fkType == 'coverstory') {
                        $('.bullets',$container).on("click", ".bullet", function() {

                            var dataSlide = $(this).attr("data-slide");
                            self.move(slideIndex = +$(this).attr("data-slide"), self.options.intervalTimeInitialByClick);

                            var uid = $(this).parent().attr("data-uid");

                            $('.bullets .bullet',$container).removeClass('active');
                            $(this).addClass('active');

                            $('.plugin-breakingnews .plugin-breakingnews-inner-container').hide()
                            if($('.plugin-breakingnews .plugin-breakingnews-inner-container[data-projectuid="'+uid+'"]').length > 0) {
                                $('.plugin-breakingnews .plugin-breakingnews-inner-container[data-projectuid="'+uid+'"]').show();
                            }

                            return false;
                        });
                    } else {
                        
                        $('.bullet-menu .bullets',$container.parents('body')).on("click", ".bullet", function() {

                            var dataSlide = $(this).attr("data-slide");
                            
                            self.move(slideIndex = +$(this).attr("data-slide"), self.options.intervalTimeInitialByClick);

                            var uid = $(this).parent().attr("data-uid");
                            
                            if(typeof(uid) !== 'undefined') {
                                $('.plugin-breakingnews .plugin-breakingnews-inner-container').hide()
                                if($('.plugin-breakingnews .plugin-breakingnews-inner-container[data-projectuid="'+uid+'"]').length > 0) {
                                    $('.plugin-breakingnews .plugin-breakingnews-inner-container[data-projectuid="'+uid+'"]').show();
                                }
                            }

                            return false;
                        });
                    }
                    
                    
                }
            }
        }


        /**
         * If the interval is stoped start it.
         *
         * @method start
         * @chainable
         */
        this.start = function() {
            if(self.options.interval) {
                clearTimeout(intervalTimer);

                self.intervalActive = true;

                intervalTimer = setTimeout(function() {
                    self.move(++slideIndex, self.options.intervalTimeInitial);

                }, self.options.intervalTime);
            }

            return self;
        };

        /**
         * If the interval is running stop it.
         *
         * @method start
         * @chainable
         */
        this.stop = function() {
            clearTimeout(intervalTimer);

            self.intervalActive = false;

            return self;
        };


        this.linkToSupageViaActiveBullet = function() {
            var uid = $(this).parents('li').attr('data-uid');
            var link = $('#header-slideshow ul.overview li[data-uid="'+uid+'"]').attr('data-pid');

            if(typeof(link) !== 'undefined') {
                location.href = link;
            }
        }

        /**
         * Move to a specific slide.
         *
         * @method move
         * @chainable
         * @param {Number}  [index] The slide to move to.
         */
        this.move = function(index, intervalTime) {
            
            $('.attoworld-content .bullet-menu ul.bullets li a').unbind('click',self.linkToSupageViaActiveBullet);
            
            self.slideIndex = slideIndex = isNaN(index) ? self.slideCurrent : index;
            self.slideCurrent = slideIndex % self.slidesTotal;

            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
                if(slideIndex < 1) {
                    self.slideCurrent = slideIndex = self.slidesTotal;
                    $overview.css(posiLabel, -(self.slidesTotal) * slideSize + self.startPoint - slideSize);
                }
            } else {
                
                if(slideIndex < 0) {
                    self.slideCurrent = slideIndex = self.slidesTotal - 1;
                    $overview.css(posiLabel, -(self.slidesTotal) * slideSize + self.startPoint);
                }
            }

            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
                if(slideIndex > self.slidesTotal + 1) {
                    self.slideCurrent = slideIndex = 2;
                    $overview.css(posiLabel, self.startPoint - slideSize);
                }
            } else {
                
                if(slideIndex > self.slidesTotal) {
                    self.slideCurrent = slideIndex = 1;
                    $overview.css(posiLabel, self.startPoint);
                }
            }
            
            contentStyle[posiLabel] = -slideIndex * slideSize + self.startPoint;
            
            
            if(typeof(intervalTime) == 'number') {
                self.setIntervalTime(intervalTime);
            } else {
                self.setIntervalTime(self.options.intervalTime);
            }
            
            $('li .picturecaption',$overview).hide();
        
            var cElement = $($('li .picturecaption',$overview)[self.slideCurrent]);
            var dataUid = cElement.parents('li').attr('data-uid');
            
            $('.picturecaption',cElement).show();
            $('li[data-uid="'+dataUid+'"] .picturecaption',$overview).show();
            
            /*
            var picCap = $('li[data-uid="'+index+'"] .picturecaption',$overview).attr('data-uid');
            // console.log(picCap, index);
            if(index == picCap) {
                $('li[data-uid="'+(index-1)+'"] .picturecaption',$overview).show();
            }
            */
            
            $overview.animate(
                    
                contentStyle
            ,   {
                
                    easing: self.options.easing, 
                    
                    queue : false
                ,   duration : self.options.animation ? self.options.animationTime : 0
                ,   always : function() {
                       /**
                        * The move event will trigger when the carousel slides to a new slide.
                        *
                        * @event move
                        */
                        $container.trigger("move", [$slides[self.slideCurrent], self.slideCurrent]);
                    },
                    complete : function() {
                        
                        if(options.fkSize == 'fullsize-time') {
                            if(self.options.bullets === true) {
                                $bullets.removeClass("active");
                                $($bullets[self.slideCurrent]).addClass("active");
                            }
                        } else {
                            
                            if(self.options.bullets === true) {
                                $bullets.removeClass("active");
                                $($bullets[self.slideCurrent]).addClass("active");
                                // console.log($bullets, $bullets[self.slideCurrent],$($bullets[self.slideCurrent]),self.slideCurrent);
                            }
                        }
                        
                        $('.attoworld-content .bullet-menu ul.bullets li a.active').unbind('click',self.linkToSupageViaActiveBullet);
                        $('.attoworld-content .bullet-menu ul.bullets li a.active').bind('click',self.linkToSupageViaActiveBullet);
                    }
                });

            _setButtons();
            self.start();

            if(self.options.attotype == 1) {
                self.SlideAtto(self.slideCurrent);
            }

            if(options.fkSize == 'fullsize-timeline') {
                var selSlideCurrent = self.slideCurrent;
                
                if(self.slideCurrent == 0) {
                    selSlideCurrent = self.slidesTotal;
                }
                
                var currentSlideIndex = $('.current-slide-index',$overview.parents('.slideshow-container.active'));
                currentSlideIndex.text(selSlideCurrent+'/'+self.slidesTotal)
                
                $('.texts-to-slide .text-container',$overview.parents('.slideshow-container.active')).hide();
                var currentTextIndex = $('.texts-to-slide .text-container[data-uid="'+selSlideCurrent+'"]',$overview.parents('.slideshow-container.active'));
                currentTextIndex.show();
            }

            return self;
        };
        
        this.SlideAtto = function(index) {
            $('.data-set').hide();
            $('.data-set[data-slide="'+index+'"]').show();
        }
        
        this.SET = function(index, shouldbesethard) {
            
            $('.attoworld-content .bullet-menu ul.bullets li a').unbind('click',self.linkToSupageViaActiveBullet);
            
            if(typeof(self.startPoint) == 'undefined') {
                self.startPoint = 0;
            }
            
            
            
            self.slideIndex = slideIndex = isNaN(index) ? self.slideCurrent : index;
            self.slideCurrent = slideIndex % self.slidesTotal;

            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
                if(slideIndex < 1) {
                    self.slideCurrent = slideIndex = self.slidesTotal;
                    $overview.css(posiLabel, -(self.slidesTotal) * slideSize + self.startPoint - slideSize);
                }
            } else {
                if(slideIndex < 0) {
                    self.slideCurrent = slideIndex = self.slidesTotal - 1;
                    $overview.css(posiLabel, -(self.slidesTotal) * slideSize + self.startPoint);
                }
            }

            

            if(options.fkSize == 'fullsize' ||
               options.fkSize == 'fullsize-timeline' ) {
                if(slideIndex > self.slidesTotal + 1) {
                    self.slideCurrent = slideIndex = 2;
                    $overview.css(posiLabel, self.startPoint - slideSize);
                }
            } else {
                if(slideIndex > self.slidesTotal) {
                    self.slideCurrent = slideIndex = 1;
                    $overview.css(posiLabel, self.startPoint);
                }
            }
            
            contentStyle[posiLabel] = -slideIndex * slideSize + self.startPoint;

            if(shouldbesethard == 'SET') {
                $overview.delay(300).css(posiLabel,contentStyle[posiLabel]);
            } else {
                $overview.animate(
                contentStyle
            ,   {
                    queue : false
                ,   duration : 300
                ,   always : function() {
                       /**
                        * The move event will trigger when the carousel slides to a new slide.
                        *
                        * @event move
                        */
                       
                        $container.trigger("move", [$slides[self.slideCurrent], self.slideCurrent]);
                    }
                });
            }

            
           
            _setButtons();
            self.start();

            if(self.options.attotype == 1) {
                self.SlideAtto(self.slideCurrent);
            }

            if(options.fkSize == 'fullsize-timeline') {
                var selSlideCurrent = self.slideCurrent;
                
                if(self.slideCurrent == 0) {
                    selSlideCurrent = self.slidesTotal;
                }
                
                var currentSlideIndex = $('.current-slide-index',$overview.parents('.slideshow-container.active'));
                currentSlideIndex.text(selSlideCurrent+'/'+self.slidesTotal)
                
                $('.texts-to-slide .text-container',$overview.parents('.slideshow-container.active')).hide();
                var currentTextIndex = $('.texts-to-slide .text-container[data-uid="'+selSlideCurrent+'"]',$overview.parents('.slideshow-container.active'));
                currentTextIndex.show();
            }

            $('.attoworld-content .bullet-menu ul.bullets li a.active').unbind('click',self.linkToSupageViaActiveBullet);
            $('.attoworld-content .bullet-menu ul.bullets li a.active').bind('click',self.linkToSupageViaActiveBullet);

            return self;
        };

        /**
         * @method _setButtons
         * @private
         */
        function _setButtons() {
            if(self.options.buttons && !self.options.infinite) {
                $prev.toggleClass("disable", self.slideCurrent <= 0);
                $next.toggleClass("disable", self.slideCurrent >= self.slidesTotal - slidesVisible);
            }

            if(self.options.bullets) {
                
                $bullets.removeClass("active");
                
                $($bullets[self.slideCurrent]).addClass("active");
                
                $.each($('.bullet-menu .bullet'), function(i, n) {
                    var dataShort = $(n).parent().attr('data-short');
                    $('.box .centered',$(n)).text(dataShort);
                });
                
                var dataFull = $($bullets[self.slideCurrent]).parent().attr('data-full');
                
                $('.box .centered',$($bullets[self.slideCurrent])).text(dataFull);
            }
        }

        return _initialize();
    }

    /**
    * @class tinycarousel
    * @constructor
    * @param {Object} options
        @param {Number}  [options.start=0] The slide to start with.
        @param {String}  [options.axis=x] Vertical or horizontal scroller? ( x || y ).
        @param {Boolean} [options.buttons=true] Show previous and next navigation buttons.
        @param {Boolean} [options.bullets=false] Is there a page number navigation present?
        @param {Boolean} [options.interval=false] Move to another block on intervals.
        @param {Number}  [options.intervalTime=3000] Interval time in milliseconds.
        @param {Boolean} [options.animate=true] False is instant, true is animate.
        @param {Number}  [options.animationTime=1000] How fast must the animation move in ms?
        @param {Boolean} [options.infinite=true] Infinite carousel.
    */
    $.fn[pluginName] = function(options) {
        return this.each(function() {
            if(!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin($(this), options));
            }
        });
    };
}));