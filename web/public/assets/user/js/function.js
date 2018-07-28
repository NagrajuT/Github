/**
 * Created by Vijay Kolar on 23-06-2016.
 */

// SMOOTH SCROLLING

$(document).ready(function(){
    // Add smooth scrolling to all links
    $(".navbar-list a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});




//Changing Header Background color

$(window).on("scroll", function() {
    if($(window).scrollTop() > 60) {
        $(".navbar-menu").addClass("header-is-active");
    } else {
        $(".navbar-menu").removeClass("header-is-active");
    }
});

//Video Modal 

$(function () {
    $('.play-video').click(function(){
        $('#intro').addClass("modal-is-open ");
        return false;
    });
    $('.play-profile-video').click(function(){
        $('#profile').addClass("modal-is-open ");
        return false;
    });
    $('.play-promotion-video').click(function(){
        $('#promotion').addClass("modal-is-open ")
        return false;
    });
    $('.play-affiliate-video').click(function(){
        $('#affiliate').addClass("modal-is-open ")
        return false;
    });
    $('.close-btn').click(function(){
        $('.modal-overlay').removeClass("modal-is-open");
        return false;
    });
});



//signup modal
$(function () {
    $('.login ').click(function(){
        $('.sign-up-modal-overlay').addClass("signup-modal-is-open");
        return false;
    });
    $('.close-btn-1').click(function(){
        $('.sign-up-modal-overlay').removeClass("signup-modal-is-open ");
        return false;
    });
});


//Mobile menu toggle

$(function(){
    $('.mobile-navbar-menu').on('click', function () {
        var status = $(this).hasClass('mobile-navbar-is-open');
        if (status) {
            $('.mobile-navbar-menu, .mobile-navbar').removeClass('mobile-navbar-is-open');
        }
        else {
            $('.mobile-navbar-menu, .mobile-navbar').addClass('mobile-navbar-is-open');
        }
    });
});

//Form Label

//Avoiding floating label

$(function(){
    $('.contact-form .input-group input, .contact-form textarea').focusout(function(){
        var text_val= $(this).val();
        if(text_val===""){
            $(this).removeClass("has-value");
        }
        else{
            $(this).addClass("has-value");
        }
    });
});


//Service Description


$(function(){
  $('.thumb-btn').click(function(){
      $('.work-belt').css('left','-100%');
      $('.work-container').css('display','block');


  });

    $('.work-return').click(function(){
        $('.work-belt').css('left','0%');
        $('.work-container').hide();

    });
});

//Smooth  Scrolling

  /*  $(function() {
        jQuery.scrollSpeed(100, 800);
    });*/

(function($) {

    jQuery.scrollSpeed = function(step, speed) {

        var $document = $(document),

            $window = $(window),

            $body = $('html, body'),

            viewport = $window.height(),

            top = 0,

            scroll = false;

        if (window.navigator.msPointerEnabled)

            return false;

        $window.on('mousewheel DOMMouseScroll', function(e) {

            scroll = true;

            if (e.originalEvent.wheelDeltaY < 0 || e.originalEvent.detail > 0)

                top = (top + viewport) >= $document.height() ? top : top += step;

            if (e.originalEvent.wheelDeltaY > 0 || e.originalEvent.detail < 0)

                top = top <= 0 ? 0 : top -= step;

            $body.stop().animate({

                scrollTop: top

            }, speed, 'default', function() {

                scroll = false;

            });

            return false;

        }).on('scroll', function() {

            if (!scroll) top = $window.scrollTop();

        }).on('resize', function() {

            viewport = $window.height();

        });
    };

    jQuery.easing.default = function (x,t,b,c,d) {

        return -c * ((t=t/d-1)*t*t*t - 1) + b;
    };

})(jQuery);




//Signin Work belt

$(function(){
    $('.signup').click(function(){
        $('.sign-work-belt').css('left','-100%');
        $('.signin-wrap').css('opacity','0');
        $('.signup-wrap').css('opacity','1');

    });

    $('.signin-return,.login').click(function(){
        $('.sign-work-belt').css('left','0%');
        $('.signin-wrap').css('opacity','1');
        $('.signup-wrap').css('opacity','0');


    });
});
