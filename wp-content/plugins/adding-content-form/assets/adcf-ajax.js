jQuery(function ($) {
   let form = $('#property-form');
   let buttonSubmit = $('.submit-property');

   let options = {
       url: adcf_ajax.url,
       data: {
           action: 'created_property',
           nonce: adcf_ajax.nonce,
       },
       type: 'POST',
       dataType: 'json',
       beforeSubmit: function ( arr, form, options) {
           buttonSubmit.text( 'Отправка...' );
           },
       success: function (response) {
           console.log(response);
           },
   };

   form.ajaxForm(options);
});