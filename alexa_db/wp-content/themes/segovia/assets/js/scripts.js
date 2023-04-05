jQuery(document).ready(function($) {
  "use strict";
  //Segva Get Height Script
  $(window).resize(function() {
    if (screen.width >= 768) {
      if ($('.segva-main-wrap').hasClass('sticky-footer')) {
        $('.main-wrap-inner').css('margin-bottom', $('.segva-footer').height());
      };
      $('.my-info-wrap').css('padding-bottom', $('.my-info .segva-social.square').height()*2);
    }
    if (screen.width >= 1200) {
      $('.segva-main-wrap').css('margin-left', $('.segva-sidebar-nav').width());
    }
    $('html:has(.segva-sidebar-nav)').addClass('has-sidebarnav');

    // Mean Toggle Top Value
    var $meantop = $('.segva-header').outerHeight()/2;
    $('.mean-container a.meanmenu-reveal').css('top', $meantop );

    //Segva Get Window Height Script
    jQuery('.windowheight, .segva-about-me').height(jQuery(window).height());

  });
  $(window).trigger('resize');

   // Mean Menu
  var $navmenu = $('nav');
  var $menu_starts = ($navmenu.data('nav') !== undefined) ? $navmenu.data('nav') : 1199;
  $('.segva-header .segva-navigation, .segva-sidebar-nav .segva-navigation').meanmenu({
    meanMenuContainer: '.segva-header > .container, .segva-header.class-add-header .header-wrap, .segva-sidebar-nav .sidebar-nav-wrap',
    meanMenuOpen: '<span></span>',
    meanMenuClose: '<span></span>',
    meanExpand: '<i class="fa fa-angle-down"></i>',
    meanContract: '<i class="fa fa-angle-up"></i>',
    meanScreenWidth: $menu_starts,
  });

  //Segva Sticky Header Script
  $('.sticky-header').SegoviaSticky ({
    topSpacing: 0,
    zIndex: 4
  });

  //Segovia Nice Select Script
  $('select').niceSelect();
  $('.comment-form-rating select, .shipping-calculator-form select').niceSelect('destroy');
  $('.segva-widget.woocommerce select, .woocommerce-billing-fields select, .woocommerce-shipping-fields select, .footer-widget.woocommerce select, .footer-widget .woocommerce select').niceSelect('destroy');

  $(document).scroll(function() {
    if($(this).scrollTop() >= 10) {
      $('.sticky-header').addClass('sticky');
    }
    else {
      $('.sticky-header').removeClass('sticky');
    }
  });

  if ($('.segva-navigation ul.dropdown-nav li').hasClass('has-dropdown')) {
    $('.segva-navigation ul.dropdown-nav li.has-dropdown').addClass('sub');
  }

// Mobile Main Menu
  $('.segovia-toggle').on('click', function () {
    $(this).toggleClass('active');
  });

  //Segva Navigation Hover Script

  $('.segva-header .segva-navigation .has-dropdown').on ({
    mouseenter : function() {
      $(this).find('ul.dropdown-nav').first().stop(true, true).slideDown(450);
    },
    mouseleave : function() {
      $(this).find('ul.dropdown-nav').first().stop(true, true).slideUp(450);
    }
  });

  $( ".segva-sidebar-nav ul li.has-dropdown" ).prepend('<span class="sidebar-dropdown-arrow"></span>');

  $('.sidebar-dropdown-arrow').on('click', function() {
    var element = $(this).parent('.has-dropdown');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.has-dropdown').removeClass('open');
      element.find('.dropdown-nav').slideUp();
    }
    else {
      element.addClass('open');
      element.children('.dropdown-nav').slideDown();
      element.siblings('.has-dropdown').children('.dropdown-nav').slideUp();
      element.siblings('.has-dropdown').removeClass('open');
      element.siblings('.has-dropdown').find('.has-dropdown').removeClass('open');
      element.siblings('.has-dropdown').find('.dropdown-nav').slideUp();
    }
  });

   $('.segva-banner').on ({
    mouseenter : function() {
      $(this).find('.banner-info').first().stop(true, true).slideDown(300);
    },
    mouseleave : function() {
      $(this).find('.banner-info').first().stop(true, true).slideUp(300);
    }
  });

  //Segva Add Remove Classes Script
    $('.search-link').on('click', function() {
    $('.segva-search').fadeIn(400);
    $('.segva-search').addClass('open');
    $('.segva-search').find('input[type="text"]').focus();
    setTimeout(function() {
      $('.search-wrap').addClass('open')
    }, 500);
  });
    $('.search-closer').on('click', function() {
    $('.search-wrap').removeClass('open')
    setTimeout(function() {
      $('.segva-search').fadeOut(400);
      $('.segva-search').removeClass('open');
    }, 1000);
  });
  $('.toggle-link').on('click', function() {
    $('.segva-fixed-navigation').addClass('open');
  });
    $('.close-btn a').on('click', function() {
    $('.segva-fixed-navigation').removeClass('open');
    $('.toggle-link').removeClass('active');
  });
    $('.has-sidebarnav .toggle-link').on('click', function() {
    $(this).toggleClass('active');
    $('.has-sidebarnav .segva-main-wrap').toggleClass('sidebarnav-open');
  });

  $('.action-links').on('click', function(){
    $('.segva-sidebar-nav').toggleClass('open');
    $('.sidebar-toggle-link').toggleClass('active');
  });

  // Contact Item Hover
  if ($('div').hasClass('contact-item-wrap')) {
    var $NA_el, NA_leftPos, NA_newWidth,
    $NA_mainNav = $(".narep-tab-links");
    var $NA_TabLine = $(".contact-address-line");
    
    $NA_TabLine
      .width(205)
      .css("left", 75)
      .data("origLeft", $NA_TabLine.position().left)
      .data("origWidth", $NA_TabLine.width());

    $(".contact-item-wrap").on({
      mouseenter : function() {
        $NA_el = $(this);
        $(".contact-item-wrap").removeClass("active");
        $NA_el.addClass("active");
        NA_leftPos = $NA_el.position().left;
        NA_newWidth = 205;
        $NA_TabLine.stop().animate({
          left: NA_leftPos+75,
          width: NA_newWidth
        });
      },
      mouseleave : function() {
        $NA_el = $('.contact-item-wrap.active');
        NA_leftPos = $NA_el.position().left;
        NA_newWidth = 205;
        $NA_TabLine.stop().animate({
          left: NA_leftPos+75,
          width: NA_newWidth
        }); 
      }
    });
  }


  //Segva Hover Script
  $(window).load(function() {

    $('.nav-item, .project-item, .service-item, .swiper-slide, .linkbox-item, .blog-item, .about-item, .mate-item, .process-item, .pricing-item, .segva-project-detail .masonry-item .segva-image, .contact-item-wrap, li.product').mouseenter(function(){
      $(this).addClass('segva-hover');
    });
    $('.nav-item, .project-item, .service-item, .swiper-slide, .linkbox-item, .blog-item, .about-item, .mate-item, .process-item, .pricing-item, .segva-project-detail .masonry-item .segva-image, .contact-item-wrap, li.product').mouseleave(function(){
      $(this).removeClass('segva-hover');
    });

    //Segovia Add Class In Previous Items
    $(".process-item-wrap").mouseenter(function(){
      $(this).prevAll('.process-item-wrap').addClass('process-done');
    });
    $(".process-item-wrap").mouseleave(function(){
      $(this).prevAll('.process-item-wrap').removeClass('process-done');
    });

    //Segva Masonry Script
    var $grid = $('.segva-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };
    $('.masonry-filters').on( 'click', 'li a', function() {
      var filterValue = $( this ).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
    });
    $('.masonry-filters').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });

    // Segva type eraser function
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

    //Segovia Swiper Slider Script
    $('.swiper-container').each( function() {
      var $segvaswiper = $(this);
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
      var swiper = new Swiper('.swiper-container', {
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
          type: 'bullets',
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
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
      swiper.on('transitionEnd', function() {
        var start_num = ((swiper.activeIndex+1) < 10 ? '0' : '') + (swiper.activeIndex+1);
        $('.start_index').html(start_num);
      });

      var length = (swiper.slides.length < 10 ? '0' : '') + swiper.slides.length;
      var start_num = ((swiper.activeIndex+1 < 10) ? '0' : '') + (swiper.activeIndex+1);
     
      $(".swiper-pagination-wrap").prepend($("<span class='start_index'></span>", $segvaswiper).html(start_num));
      $(".swiper-pagination-wrap").append($("<span class='end_index'></span>", $segvaswiper).html(length));

    });

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

    if ($('div').hasClass('segva-popup')) {
      $('.segva-popup').find('a').attr("data-elementor-open-lightbox","no");
    }

  //Segovia Countdown Script
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

  // Segovia Fake Countdown Script
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

  }); // window load end

  //Segovia Boostrap Video Modal Script
  $('<div class="modal modal-video fade" id="SegoviaVideoModal"><div class="modal-dialog modal-lg modal-dialog-centered"><div class="modal-content"><div class="modal-body"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item sahub-video-iframe" id="ModalVideoWrap"></iframe></div></div></div></div></div>').appendTo('body');
  var $videoSrc;
  $('[data-target="#SegoviaVideoModal"]').on('click', function () {
    $videoSrc = $(this).data('src');
  });
  
  $('#SegoviaVideoModal').on('shown.bs.modal', function (e) {
    $('#ModalVideoWrap').attr('src',$videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
  });
  $('#SegoviaVideoModal').on('hide.bs.modal', function (e) {
    $('#ModalVideoWrap').attr('src',$videoSrc);
  });

 // Segva Owl Carousel
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
        animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
        mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
        autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
        autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
        center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
        responsiveClass: true,
        dotsEachNumber: true,
        smartSpeed: 600,
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
          991 : {
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

   //Segovia Progress Bar Script
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

  //Segovia Circle Progress Bar Script
  $('.circle-progressbar').each(function() {
  var $circle = $(this);
  var $fill_color = ($circle.data('color') !== undefined) ? $circle.data('color') : '#101014';
  var $empty_fill_color = ($circle.data('empty') !== undefined) ? $circle.data('empty') : '#ffffff';
  var $size = ($circle.data('size') !== undefined) ? $circle.data('size') : '220';

    $circle.waypoint(function() {
      $circle.circleProgress ({
        size: $size,
        fill: {
          color: $fill_color,
        },
        thickness: 1,
        emptyFill: $empty_fill_color,
        startAngle: 300,
        reverse: true,
        lineCap: 'squre',
        animation: {
          duration: 1800
        }
      })
      .on('circle-animation-progress', function (event, progress, stepValue) {
        $(this).find('.circle-counter').text((stepValue * 100).toFixed(0));
      });
    },
    {
      offset: '100%'
    });
  });

  //Segva Set Equal Height Script
  $('.segva-item, .serv-class').matchHeight ({
    property: 'height'
  });

  //Segva Parallax Script
  $('.segva-parallax').jarallax ({
    speed: 0.6,
  })

  //Segva Outside Click Remove Class Script
  $(document).on('click', function(e) {
    if ($(e.target).is('.segva-sidebar-nav, .segva-sidebar-nav *, .toggle-link, .toggle-link *') === false) {
      $('.segva-main-wrap').removeClass('sidebarnav-open');
      $('.has-sidebarnav .toggle-link').removeClass('active');
    }
  });

  //Segva Counter Script
  $('.counter-number').counterUp ({
    delay: 1,
    time: 1000,
  });

  //Segva Popup Picture Script
  $('.segva-popup').magnificPopup ({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
      }
    },
    gallery: {
      enabled: true,
      arrowMarkup:'<div title="%title%" class="mfp-arrow mfp-arrow-%dir%"></div>',
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('*');
      }
    }
  });

  //Segva Sticky Sidebar Script
  $('.segva-sticky-sidebar').theiaStickySidebar ({
    additionalMarginTop: 150
  });

  //Segva Floating Sidebar Script
  $(window).scroll(function() {
    var $window = jQuery(window),
    $flotingbar = jQuery('.segva-floating-sidebar'),
    offset = jQuery('.segva-mid-wrap, .page-float-bar').offset(),
    $scrolling = jQuery('.segva-primary').height(),
    $offsetHeight = jQuery('.segva-primary').offset(),
    $topHeight = 0;
    if (jQuery('.segva-floating-sidebar').length > 0) {
      if ($window.width() > 1023) {
        if (($window.scrollTop() + $topHeight) > offset.top) {
          if ($window.scrollTop() + $topHeight + $flotingbar.height() + 50 < $offsetHeight.top + $scrolling) {
            $flotingbar.stop().animate ({
              marginTop: ($window.scrollTop() - offset.top) + $topHeight + 26,
            });
          }
          else {
            $flotingbar.stop().animate ({
              marginTop: ($scrolling - $flotingbar.height() - 80) + 26,
            });
          }
        }
        else {
          $flotingbar.stop().animate ({
            marginTop: 0,
          });
        }
      }
      else {
        $flotingbar.css('margin-top', 0);
      }
    }
  });

  //Segva Back Top Script
  var backtop = $('.segva-back-top');
  $(window).scroll(function() {
    var windowposition = $(window).scrollTop();
    if(windowposition + $(window).height() == $(document).height()) {
      backtop.removeClass('active');
    }
    else if (windowposition > 150) {
      backtop.addClass('active');
    }
    else {
      backtop.removeClass('active');
    }
  });
    jQuery('.segva-back-top a').on('click', function() {
    jQuery('body,html').animate ({
      scrollTop: 0
    }, 2000);
    return false;
  });

});