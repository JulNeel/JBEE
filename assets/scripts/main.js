/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {


/////////////////////// ALL PAGES////////////////////////////////////

    'common': {
    init: function() {
        // JavaScript to be fired on all pages



        // Wait for window load
        $(window).load(function() {
        // Animate loader off screen
           $('body').addClass('loaded');
        });
        

       

        // SCROLL TO TOP
        jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop() === 0) {
                jQuery('#scrollToTop').fadeOut("fast");
            } else {
                if (jQuery('#scrollToTop').length === 0) {
                    jQuery('body').append('<div id="scrollToTop">' + '<a  href="#"><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></a>' + '</div>');
                }
                jQuery('#scrollToTop').fadeIn("fast");
            }
          });
          jQuery('body').on('click', '#scrollToTop a', function(event) {
              event.preventDefault();
              jQuery('html,body').animate({
                  scrollTop: 0
              }, 'slow');
          });       



        //Sticky-kit
        var stickWidth = 992;
        var win = $(window);
        var sidebar = $("#sidebar1");
        var menu = $("#nav-header");
        var options1 = {
            parent:"body",
            spacer: false
        };
        var options2 = {  
        };
        if (win.width() > stickWidth) {
          menu.stick_in_parent(options1);
          sidebar.stick_in_parent(options2);
          //sidebar.stick_in_parent(options2);
        } 
        win.resize(function () {
          if (win.width() > stickWidth) {
          menu.stick_in_parent(options1);
          sidebar.stick_in_parent(options2);
          } else {
           sidebar.trigger("sticky_kit:detach");
           menu.trigger("sticky_kit:detach");
          } 
        });
    },

    finalize: function() {
    //JavaScript to be fired on all pages, after page specific JS is fired
    }
  },
/////////////////////// END ALL PAGES////////////////////////////////////

    
///////////////////////HOME PAGES////////////////////////////////////
    'home': {

      init: function() {
    // JavaScript to be fired on the home page

      //WOW ANIMATIONS
      $(window).load(function() {
        new WOW().init();
      });


      //SKILLBAR
      $(window).scroll(function() {
         var hT = $('#skillbar-section').offset().top,
             hH = $('#skillbar-section').outerHeight(),
             wH = $(window).height(),
             wS = $(this).scrollTop();
          console.log((hT-wH) , wS);
         if (wS > (hT+hH-wH)){
        
        jQuery('.skillbar').each(function(){
          jQuery(this).find('.skillbar-bar').animate({
            width:jQuery(this).attr('data-percent')
          },1500);
        });


         }
      });

 
      //kswedberg/JQUERY SMOOTH SCROLL
      // Select all links with hashes
       $('a[href*="#"]').smoothScroll({
        offset: -50,
        easing: 'swing',
        speed: 'auto',
        autoCoefficient: 2,

      });

  

//      //CUSTOM SCROLLBAR
//      (function(jQuery){
//        jQuery(window).load(function(){
//            jQuery(".scrollbar").mCustomScrollbar({ 
//            scrollInertia: 50,
//            theme: "minimal-dark",
//            autoHideScrollbar: true
//            });   
//          });
//        })(jQuery);


      //MIXITUP
      var mixer = mixitup('#portfoliolist', {
        selectors: {
        target: '.portfolio',
        control: '.filter' 
        }
      });


      //COLLAPSE CONTACT FORM
      $('#contactForm').on('hidden.bs.collapse', function () {
      $(window).trigger('resize');

      });
      $('#contactForm').on('shown.bs.collapse', function () {
      $(window).trigger('resize');

      });
      $('#collapse-content').on('hidden.bs.collapse', function () {
      $(window).trigger('resize');

      });
      $('#collapse-content').on('shown.bs.collapse', function () {
      $(window).trigger('resize');

      });

    //SLIDESHOW Slick
    //$('.slides').slick({
    //  
    //  adaptiveHeight:false,
    //  dots: true,
    //  mobileFirst:true,
    //  
    //    // the magic
    //  responsive: [
    //  {
    //    breakpoint: 300,
    //    settings: {
    //    }
    //  },

    //  {
    //    breakpoint: 576,
    //    settings: {
    //      arrows:true
    //    }
    //  }, 

    //  {
    //    breakpoint: 1200,
    //    settings: {
    //    }
    //  }]
    //});

      },

      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      
      }
    },

/////////////////////// END HOME PAGES////////////////////////////////////


    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }


  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.



