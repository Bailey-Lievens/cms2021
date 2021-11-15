(function ($, Drupal) {
    'use strict';

    //Create behavior for navigation
    Drupal.behaviors.navBehavior = {
        attach: function (context, settings) {
          $('.hamburger-menu', context).once('navBehavior').each(function () {
            let open = false;
    
            $(".hamburger-menu").click(function() {
                if(open){
                    $(".ul-menu").css("height", "auto");
                    $(".ul-menu .menu-item").css("display", "none");

                    $(".hamburger-stripe-open").addClass("hamburger-stripe-closed");
                    $(".hamburger-stripe-closed").removeClass("hamburger-stripe-open");
                    open = false;
                } else {
                    $(".ul-menu").css("height", "100%");
                    $(".ul-menu .menu-item").css("display", "inline");

                    $(".hamburger-stripe-closed").addClass("hamburger-stripe-open");
                    $(".hamburger-stripe-open").removeClass("hamburger-stripe-closed");
                    open = true;
                }
            });

            $( window ).resize(function() {
                $('.ul-menu').removeAttr("style");
                $('.ul-menu .menu-item').removeAttr("style");

                $(".hamburger-stripe-open").addClass("hamburger-stripe-closed");
                $(".hamburger-stripe-closed").removeClass("hamburger-stripe-open");

                open = false;
            });

          });
        }
      };

})(jQuery, Drupal);