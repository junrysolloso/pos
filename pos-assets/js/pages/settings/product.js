(function($){
  'use strict';

  var url = base_url + 'settings/product';

  $(document).ready(function(){

    // Check product if already exist
    $('#item_id').on('mouseleave', function(){
      var data = {
        item_code: $(this).val(),
        check: 'check'
      }

      $.post(url, data).done(function(data){
        if (data.msg === 'exist') {
          $('#item_id').val('');
          showWarningToast( 'Product already exist.' );
        }
      });
    });

  });
})(jQuery);