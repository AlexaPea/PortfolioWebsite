/*
Template Name: Segovia
Author: VictorTheme
Version: 1.0
Email: support@victortheme.com
*/

(function($){
'use strict';

/*----- ELEMENTOR LOAD FUNTION CALL ---*/

$( window ).on( 'elementor/frontend/init', function() {
	//Obra Owl Carousel Slider Script
	var owl_carousel = function(){
		$('.owl-carousel').each( function() {
	    var $carousel = $(this);
	    var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 1;
	    var $items_tablet = ($carousel.data('items-tablet') !== undefined) ? $carousel.data('items-tablet') : 1;
	    var $items_mobile_landscape = ($carousel.data('items-mobile-landscape') !== undefined) ? $carousel.data('items-mobile-landscape') : 1;
	    var $items_mobile_portrait = ($carousel.data('items-mobile-portrait') !== undefined) ? $carousel.data('items-mobile-portrait') : 1;
	    $carousel.owlCarousel ({
	      loop : ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : true,
	      items : $carousel.data('items'),
	      margin : ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
	      dots : ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : true,
	      nav : ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
	      navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
	      autoplay : ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
	      autoplayTimeout : ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
	      animateIn : ($carousel.data('animatein') !== undefined) ? $carousel.data('animatein') : false,
	      animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
	      mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
	      autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
	      autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
	      center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
	      responsiveClass: true,
	      dotsEachNumber: true,
	      smartSpeed: 600,
	      autoplayHoverPause: true,
	      responsive : {
	        0 : {
	          items : $items_mobile_portrait,
	        },
	        480 : {
	          items : $items_mobile_landscape,
	        },
	        768 : {
	          items : $items_tablet,
	        },
	        992 : {
	          items : $items,
	        }
	      }
	    });
	    var totLength = $('.owl-dot', $carousel).length;
	    $('.total-no', $carousel).html(totLength);
	    $('.current-no', $carousel).html(totLength);
	    $carousel.owlCarousel();
	    $('.current-no', $carousel).html(1);
	    $carousel.on('changed.owl.carousel', function(event) {
	      var total_items = event.page.count;
	      var currentNum = event.page.index + 1;
	      $('.total-no', $carousel ).html(total_items);
	      $('.current-no', $carousel).html(currentNum);
	    });
	  });
		
	}; // end

	//Segovia Preloader Script
  $('.segva-preloader').fadeOut(500);
	
	var item_hover_class = function( selector ){
		$(selector).on({
		  mouseenter : function() {
			$(this).addClass('segva-hover');
		  },
		  mouseleave : function() {
			$(this).removeClass('segva-hover');
		  }
		});
	};

	var EqualHeight = function(){
		$('.segva-item').matchHeight ({
	    property: 'height'
	  });
	  $('.segva-inner-item').matchHeight ({
	    property: 'height'
	  });
	};
	
	//Segovia client
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_client.default', function($scope, $){
		owl_carousel();
		item_hover_class('.client-item');
	} );
	
	//Segovia Apps
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_apps.default', function($scope, $){
		
		var $grid = $('.segva-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
      isFitWidth: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
      }
    };
    $('.masonry-filters').on('click', 'li a', function() {
      var filterValue = $(this).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
      $('.segva-masonry').find('.first').removeClass('first');
      $($grid.data('isotope').filteredItems[0].element).addClass('first');
      $grid.isotope('layout');
    });
    $('.masonry-filters').each(function(i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
		
	} );

	//Segovia Webinars
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_webinars.default', function($scope, $){
		
		var $grid = $('.segva-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
      isFitWidth: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
      }
    };
    $('.masonry-filters').on('click', 'li a', function() {
      var filterValue = $(this).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
      $('.segva-masonry').find('.first').removeClass('first');
      $($grid.data('isotope').filteredItems[0].element).addClass('first');
      $grid.isotope('layout');
    });
    $('.masonry-filters').each(function(i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });
		item_hover_class('.video-wrap-inner');
		
	} );

	// Progress Bar 
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_progress_bar.default', function($scope, $){
		//Exeter Progress Bar Script
	  $('.progress-wrap').waypoint(function() {
	    var delay = 600;
	    $('.progress-bar').each(function(i) {
	      $(this).delay( delay*i ).animate ({
	        width: $(this).attr('aria-valuenow') + '%'
	      }, delay);
	      $(this).prop('Counter',0).animate ({
	        Counter: $(this).text()
	      },
	      {
	        duration: delay,
	        easing: 'swing',
	      });
	    });
	  },
	  {
	    offset: '100%',
	    triggerOnce: true,
	  });
	} );
	
	// Segovia Looking
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_looking.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.looking-item');
	} );
	// Segovia Job
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_job.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.job-item');
	} );

	// Segovia Promoting
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_promoting.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.promote-item');
	} );

	// Segovia Environment
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_environment.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.environment-item');
	} );

	// Segovia Resource
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_resource.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.resource-item');
	} );

	// Segovia Classes
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_classes.default', function($scope, $){
		//Obra Hover Script
		item_hover_class('.class-item');
	} );

	//Segovia Pricing
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_service_list.default', function($scope, $){
		$('.serv-class').matchHeight ({
	    property: 'height'
	  });
	} );

	//Segovia Analytics
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_analytics.default', function($scope, $){
		$('.segva-item').matchHeight ({
	    property: 'height'
	  });
	} );
	
	//Segovia Analytics
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_identifying.default', function($scope, $){
		$('.segva-item').matchHeight ({
	    property: 'height'
	  });
	} );

	//Segovia Sitemap
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_sitemap.default', function($scope, $){
  	$('.sitemap-item .bullet-list li, .sitemap-item .bullet-list ul').removeAttr("class");
	} );
	
	//Segovia Testimonial Carousel
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_testimonial_carousel.default', function($scope, $){
		owl_carousel();
		$('.segva-item').matchHeight ({
	    property: 'height'
	  });
	} );
	//Segovia Features
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_features.default', function($scope, $){
		owl_carousel();
	} );
	//Segovia Marketing
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_marketing.default', function($scope, $){
		owl_carousel();
	} );
	//Segovia Team
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_team.default', function($scope, $){
		owl_carousel();
		item_hover_class('.mate-item');
	} );
	//Segovia Slider
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_slider.default', function($scope, $){
		//Segovia Swiper Slider Script
    $('.swiper-slides').each(function (index) {
      //Segovia Swiper Slider Script
      var animEndEv = 'webkitAnimationEnd animationend';
      var swipermw = $('.swiper-container.swiper-mousewheel').length ? true : false;
      var swiperkb = $('.swiper-container.swiper-keyboard').length ? true : false;
      var swipercentered = $('.swiper-container.swiper-center').length ? true : false;
      var swiperautoplay = $('.swiper-container').data('autoplay');
      var swiperinterval = $('.swiper-container').data('interval');
      var swiperloop = $('.swiper-container').data('loop');
      var swipermousedrag = $('.swiper-container').data('mousedrag');
      var swipereffect = $('.swiper-container').data('effect');
      var swiperclikable = $('.swiper-container').data('clickpage');
      var swiperspeed = $('.swiper-container').data('speed');
      var swiperinteraction = $('.swiper-container').data('interaction');

      //Segovia Swiper Slides Script
      var autoplay = swiperinterval;
      var swiper = new Swiper($(this), {
        autoplayDisableOnInteraction: swiperinteraction,
        effect: swipereffect,
        speed: swiperspeed,
        loop: swiperloop,
        paginationClickable: swiperclikable,
        watchSlidesProgress: true,
        autoplay: swiperautoplay,
        simulateTouch: swipermousedrag,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        mousewheelControl: swipermw,
        keyboardControl: swiperkb,
      });
      swiper.on('slideChange', function (s) {
        var currentSlide = $(swiper.slides[swiper.activeIndex]);
          var elems = currentSlide.find('.animated')
          elems.each(function() {
            var $this = $(this);
            var animationType = $this.data('animation');
            $this.addClass(animationType, 100).on(animEndEv, function() {
              $this.removeClass(animationType);
            });
          });
      });      
    });
	} );
	//Segovia Additional Features
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_additional_features.default', function($scope, $){
		$('[data-toggle="tooltip"]').tooltip();
	  var Tooltip = $.fn.tooltip.Constructor;
	  $.extend( Tooltip.Default, {
	    customClass: '',
	  });
	  var _show = Tooltip.prototype.show;
	  Tooltip.prototype.show = function () {
	    _show.apply(this,Array.prototype.slice.apply(arguments));
	    if ( this.config.customClass ) {
	      var tip = this.getTipElement();
	      $(tip).addClass(this.config.customClass);
	    }
	  };
	  $('.plan-feature-item > label input').on('click', function () {
	    $('.plan-feature-item input[type="checkbox"]').not(this).prop('checked', this.checked);
	  });
	} );
	//Segovia List
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_list.default', function($scope, $){
		$('[data-toggle="tooltip"]').tooltip();
	  var Tooltip = $.fn.tooltip.Constructor;
	  $.extend( Tooltip.Default, {
	    customClass: '',
	  });
	  var _show = Tooltip.prototype.show;
	  Tooltip.prototype.show = function () {
	    _show.apply(this,Array.prototype.slice.apply(arguments));
	    if ( this.config.customClass ) {
	      var tip = this.getTipElement();
	      $(tip).addClass(this.config.customClass);
	    }
	  };
	} );

	// Segovia Typewriter
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_type_writers.default', function($scope, $){
	 Typed.new('#typed', {
      stringsElement: document.getElementById('typed-strings'),
      typeSpeed: 100,
      backDelay: 1500,
      loop: true,
      contentType: 'html',
      loopCount: null,
      cursorChar:"",
      callback: function() {
        foo();
      },
      resetCallback: function() {
        newTyped();
      }
    });
    var resetElement = document.querySelector('.reset');
    if(resetElement) {
      resetElement.addEventListener('click', function() {
        document.getElementById('typed')._typed.reset();
      });
    }
    function newTyped() {}
    function foo() {
      console.log('Callback');
    }
  } ); 

  // Swiper Slider
  elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_portfolio.default', function($scope, $){
	  var animEndEv = 'webkitAnimationEnd animationend';
	  var swipermw = $('.swiper-container.mousewheel').length ? true : false;
	  var swiperkb = $('.swiper-container.keyboard').length ? true : false;
	  var swipercentered = $('.swiper-container.center').length ? true : false;
	  var swiperautoplay = $('.swiper-container').data('autoplay');
	  var swiperinterval = $('.swiper-container').data('interval'),
	  swiperinterval = swiperinterval ? swiperinterval : 7000;
	  swiperautoplay = swiperautoplay ? swiperinterval : false;
	  var autoplay = 500000;
	  var swiper = new Swiper('.fadeslides', {
	    autoplayDisableOnInteraction: true,
	    effect: 'fade',
	    speed: 800,
	    loop: true,
	    paginationClickable: true,
	    watchSlidesProgress: true,
	    autoplay: autoplay,
	    simulateTouch: false,
	    nextButton: '.swiper-button-next',
	    prevButton: '.swiper-button-prev',
	    pagination: '.swiper-pagination',
	    mousewheelControl: swipermw,
	    keyboardControl: swiperkb,
	    onSlideChangeStart: function(s) {
	      var currentSlide = $(s.slides[s.activeIndex]);
	      var elems = currentSlide.find('.animated')
	      elems.each(function() {
	        var $this = $(this);
	        var animationType = $this.data('animation');
	        $this.addClass(animationType, 100).on(animEndEv, function() {
	          $this.removeClass(animationType);
	        });
	      });
	    },
	    onSlideChangeEnd: function(s) {
	      var currentSlide = $(s.slides[s.activeIndex]);
	    }
	  });
	  

	  //Segva Swiper Horizontal Slider Script
	  var autoplay = 5000;
	  var swiperHorizontal = $('.horizontalslides').swiper ({
	    autoplayDisableOnInteraction: false,
	    effect: 'slide',
	    speed: 500,
	    loop: true,
	    spaceBetween: 0,
	    paginationClickable: true,
	    watchSlidesProgress: true,
	    autoplay: false,
	    nextButton: '.swiper-button-next',
	    prevButton: '.swiper-button-prev',
	    pagination: '.swiper-pagination',
	    paginationType: 'fraction',
	    mousewheelControl: swipermw,
	    keyboardControl: swiperkb,
	    slidesPerView: 3,
	    loopedSlides: 3,
	    noSwipingClass: 'noswipe',
	    centeredSlides: swipercentered,
	    breakpoints: {
	      1199: {
	        slidesPerView: 2,
	      },
	      767: {
	        slidesPerView: 1,
	      }
	    }
	  });
	} );

	// Ceremony Countdown
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_countdown.default', function($scope, $){
  	//Crmny Countdown Script
    $('.segva-countdown.static, .segva-countdown.dynamic').each( function() {
      var $countdown = $(this);
      var date = $countdown.data("date");
      var format = $countdown.data("format");
      var count_format = format ? format : 'dHMS';
      // Plural Labels
      var years = $countdown.data("years");
      var months = $countdown.data("months");
      var weeks = $countdown.data("weeks");
      var days = $countdown.data("days");
      var hours = $countdown.data("hours");
      var minutes = $countdown.data("minutes");
      var seconds = $countdown.data("seconds");
      // Singular Labels
      var year = $countdown.data("year");
      var month = $countdown.data("month");
      var week = $countdown.data("week");
      var day = $countdown.data("day");
      var hour = $countdown.data("hour");
      var minute = $countdown.data("minute");
      var second = $countdown.data("second");

      var austDay = new Date();
      austDay = new Date(date);

      $countdown.countdown({
        until: austDay,
        labels: [years,months,weeks,days,hours,minutes,seconds],
        labels1: [year,month,week,day,hour,minute,second],
        format: count_format,
      });
    });

    // Crmny Fake COuntdown Script
    $('.segva-countdown.fake').each( function() {
      var $countdown = $(this);
      var date = $countdown.data("date");
      var today = new Date();
      var newdate = new Date();
      newdate.setDate(today.getDate() + date);
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();
      today =  new Date(newdate);


      // Plural Labels
      var years = $countdown.data("years");
      var months = $countdown.data("months");
      var weeks = $countdown.data("weeks");
      var days = $countdown.data("days");
      var hours = $countdown.data("hours");
      var minutes = $countdown.data("minutes");
      var seconds = $countdown.data("seconds");
      // Singular Labels
      var year = $countdown.data("year");
      var month = $countdown.data("month");
      var week = $countdown.data("week");
      var day = $countdown.data("day");
      var hour = $countdown.data("hour");
      var minute = $countdown.data("minute");
      var second = $countdown.data("second");

      $('.segva-countdown.fake').countdown({
        until: today,
        labels: [years,months,weeks,days,hours,minutes,seconds],
        labels1: [year,month,week,day,hour,minute,second],
      });
    });

	} );


	//Segovia Marketing
	elementorFrontend.hooks.addAction( 'frontend/element_ready/vt-segovia_tab_title.default', function($scope, $){
		//Segovia Onclick Get Text Script
	  $('.pricing-plan .nav-link').click(function() {
	    $('.pricing-plan-title span').text($(this).text());
	  });
	  if($('.pricing-plan .nav-link').hasClass('active')) {
	    $('.pricing-plan-title span').text($('.pricing-plan .nav-link.active').text());
	  };
	} );

	
	
} );


})(jQuery);  