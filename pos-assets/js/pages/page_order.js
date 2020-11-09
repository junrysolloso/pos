(function($){
  'use strict';
  $(document).ready(function() {

    var baseUrl = $('#base_url').val();
    var data = {
     item_id               : $('input[name="item_id"]').val(),
     order_date            : $('input[name="order_date"]').val(),
     price_per_unit        : $('input[name="price_per_unit"]').val(),
     orderdetails_quantity : $('input[name="orderdetails_quantity"]').val(),
     inv_item_srp          : $('input[name="inv_item_srp"]').val(),
     expiration_date       : $('input[name="expiration_date"]').val(),
   }

    $('#formAddOrder').submit(function() {
        saveData(data);
        return false;
    });
    
    function saveData(data) {
      $.ajax({
        type: 'POST',
        url: baseUrl + 'orders',
        contentType: JSON,
        cache: false,
        async: true,
        data: data,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        },
        beforeSend: validate,
        success: function(responseText){
          // $.toast({
          //   heading: 'Success',
          //   text: 'Data successfully added.',
          //   showHideTransition: 'fade',
          //   icon: 'success',
          //   loaderBg: '#f96868',
          //   position: 'top-right'
          // });
        },
      });
    }

    function validate() {
      for (var i=0; i < data.length; i++) {
        if (!data[i].value) {
          $.toast({
            heading: 'Error',
            text: 'All fields is required.',
            showHideTransition: 'fade',
            icon: 'error',
            loaderBg: '#f2a654',
            position: 'top-right'
          });
        }
        return false;
      }
    }

  });
})(jQuery);