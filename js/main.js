$(document).ready(function() {

  var body = $('body'),
      pageWrapper = $('.js-page-wrapper');


  //mobile menu
  $('.js-sandwich').on('click', function() {
    body.toggleClass('is-opened');
  });


  //header
  var banner = $('.js-banner'),
      subNav = $('.js-subnav'),
      lastScrollTop = 0,
      showcaseHeader = $('.header--showcase').length,
      bannerHeight;

  banner.length ? bannerHeight = banner.outerHeight() : bannerHeight = 0;

  /*$(window).scroll(function() {

    var scrollTopMove = $(window).scrollTop(),
      bannerHeightTwo = bannerHeight + 100;

    
    if ( scrollTopMove > bannerHeight ) {
      body.addClass('nav-sticky');
    } else {
      body.removeClass('nav-sticky');
    }

    if ( scrollTopMove > bannerHeightTwo ) {
      body.addClass('nav-small');
    } else {
      body.removeClass('nav-small');
    }

    //visible subnav
    if ( scrollTopMove > lastScrollTop && scrollTopMove > 300 ) {
      subNav.addClass('subnav--visible');
    } else {
      subNav.removeClass('subnav--visible');
    }

    //showcase header
    if ( showcaseHeader ) {
      if ( scrollTopMove > bannerHeightTwo ) {
        subNav.removeClass('header--showcase');
      } else {
        subNav.addClass('header--showcase');
      }
    }

    lastScrollTop = scrollTopMove;
  });*/


  if ( $('.js-article-header').length ) {
    $(window).scroll(function() {
      if ( $(window).scrollTop() > $('.js-article-header').outerHeight() + $('.js-article-header').offset().top + 200 ) {
        if ( !subNav.hasClass('subnav--visible') ) {
          subNav.addClass('subnav--visible');
        }
      } else {
        if ( subNav.hasClass('subnav--visible') ) {
          subNav.removeClass('subnav--visible');
        }
      }
    });
  }



  //woodstock article day switcher
  var dayLink = $('.js-day-link');
  if ( dayLink.length ) {
    dayLink.on('click', function() {
      if ( !$(this).hasClass('day_link--active') ) {
        var currentMember = $(this).attr('data-number'),
          parentBlock = $(this).parent().parent();
        $(this).parent().find('.day_link--active').removeClass('day_link--active');
        $(this).addClass('day_link--active');
        parentBlock.find('.day_songs').hide();
        parentBlock.find('.js-day-songs' + currentMember).fadeIn(300);
      }
      return false
    });
  }



  //event slick slider
  //$(window).on('resize', function() {
    if ( body.width() < 1140 ) {

     /* $('.js-event').slick({
        infinite: true,
        speed: 200,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 10000
      });*/

    }
  //});



  //new post img onload fadein
/*  $('img').each(function () {
    $(this).on("load", function () {
      $(this).addClass('img--visible');
    }).attr('src', $(this).attr('src'));
  });*/





  //showcase header
  /*if ( $('.header--showcase').length ) {

   if ($(document).scrollTop() > 100) {
   subNav.removeClass('header--showcase');
   }

   $(window).scroll(function() {

   var scrollTopMove = $(window).scrollTop();

   if (scrollTopMove > 100) {
   subNav.removeClass('header--showcase');
   } else {
   subNav.addClass('header--showcase');
   }

   lastScrollTop = scrollTopMove;

   });

   }*/




  /*if ( navigator.platform.toUpperCase().indexOf( 'MAC' ) >= 0 ) { $( 'body' ).addClass( 'mac-os' ); }*/

  /*    if ( scrollTop > lastScrollTop ) {
   subNav.addClass( 'header--visible' );
   } else if ( scrollTop === 0 ) {
   subNav.removeClass( 'header--visible' );
   } else {
   subNav.removeClass( 'header--hidden' );
   }*/


});