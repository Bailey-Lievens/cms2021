(function ($, Drupal) {
    'use strict';

    //Create behavior for form
    Drupal.behaviors.formBehavior = {
        attach: function (context, settings) {
            $('.bread-form', context).once('formbehavior').each(function () {

                var dessertContainer = $(".dessert-options");
                var breadContainer = $(".bread-options");

                var breadForm = $(".bread-form");
                
                $('input[type=radio][name=what_type]').change(function() {
                    if (this.value == 'bread') {
                        breadContainer.css("display", "inline");
                        $('.bread-options select').prop('required',true);

                        dessertContainer.css("display", "none");
                    }
                    else if (this.value == 'dessert') {
                        dessertContainer.css("display", "inline");

                        breadContainer.css("display", "none");
                        $('.bread-options select').prop('required',false);
                    }
                });

                breadForm.submit(function(e){
                    var formData = breadForm.serializeArray();
                    if(formData[0].value == "dessert"){
                        if(formData.length < 4){
                            alert("Select at least one type of dessert.🍦");
                        }
                    }
                    console.log(formData);
                    e.preventDefault();
                })

            });
        }
      };

})(jQuery, Drupal);