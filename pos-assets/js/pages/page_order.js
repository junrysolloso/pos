(function($){
  'use strict';
  $(document).ready(function() {

    var baseUrl = $('#base_url').val();
    var table   = $('#ord-added-table').DataTable();

    $('#form_add_order').submit(function(event){
      /**
       * Prevent the form being submitted
       */
      event.preventDefault();
      var url = baseUrl + 'orders';

      /**
       * Assing input data
       */
      var data = {
        item_id               : $('input[name="item_id"]').val(),
        order_date            : $('input[name="order_date"]').val(),
        price_per_unit        : $('input[name="price_per_unit"]').val(),
        orderdetails_quantity : $('input[name="orderdetails_quantity"]').val(),
        inv_item_srp          : $('input[name="inv_item_srp"]').val(),
        expiration_date       : $('input[name="expiration_date"]').val(),
      }

      /**
       * Check if SRP is greater than the default value
       */
      var srp     = parseFloat($('input[name="inv_item_srp"]').val());
      var e_unit  = parseFloat($('select[name="select_code"]').children(':selected').attr('e-unit'));
      var def     = parseFloat($('input[name="price_per_unit"]').val())/e_unit;
      if( srp <= def.toFixed(2) ) {
        showWarningToast( 'SRP must be greater than ₱' + srp );
      } else {
        /**
         * Check and save temporary orders
         */
        if(data_checker(data)) {
          data_sender(data, url);
        }
      }
    });

    /**
     * Reset orders
     */
    $('input[name="discard_orders"]').on('click', function(){
      if ( table.data().any() ) {
        $.ajax({
          type    : 'POST',
          url     : baseUrl + 'orders/reset-orders',
          async   : true,
          data    : {
            reset_orders: 'Reset Orders'
          },
          dataType: 'json',
          error: function(){
            showErrorToast('Error processing request.');
          },
          success: function(){
            showSuccessToast('Orders reset successfully.');
          } 
        }).done(function(data){
          if ( data.msg == 'success' ) {
            /**
             * Clear table
             */
            $('#ord-added-table').DataTable().clear().draw();

            /**
             * Reset form and input icons
             */
            $('#form_add_order').trigger('reset');
            input_icon_reset();
          } else {
            showWarningToast( 'Request successfully executed but with errors.' );
          }
        });
      } else {
        showWarningToast( 'Sorry! order table is empty.' );
      }

      // Generate suggested SRP
      $('input[name="price_per_unit"]').on('keyup', function(){
        if(e_unit != 0) {
          var suggest = parseFloat($(this).val())/e_unit;
          $('input[name="inv_item_srp"]').val(suggest.toFixed(2));
        }
      });

    });

    /**
     * Save orders
     */
    $('input[name="save_orders"]').on( 'click', function() {
      if ( table.data().any() ) {
        $.ajax({
          type    : 'POST',
          url     : baseUrl + 'orders',
          async   : true,
          data    : {
            save_orders: 'Save Orders',
          },
          dataType: 'json',
          error: function(){
            showErrorToast('Error processing request.');
          },
          success: function(){
            showSuccessToast('Orders successfully save.');
          } 
        }).done(function( data ){
          if ( data.msg == 'success' ) {
            /**
             * Clear table
             */
            $('#ord-added-table').DataTable().clear().draw();

            /**
             * Reset form and input icons
             */
            $('#form_add_order').trigger('reset');
            input_icon_reset();

            /**
             * Reload page after 3 seconds
             */
            setTimeout(function(){
              window.location.reload();
            }, 3000);
          } else {
            showWarningToast( 'Request successfully executed but with errors.' );
          }
        });
      } else {
        showWarningToast( 'Sorry! order table is empty.' );
      }
    });

  });

  /**
   * Data sender
   * 
   * Send a data using ajax.
   * 
   * @param {Array} data 
   * @param {string} url 
   */
  function data_sender(data, url) {
    $.ajax({
      type    : 'POST',
      url     : url,
      async   : true,
      data    : data,
      dataType: 'json',
      error: function(responseText) {
        showErrorToast('Error processing request.');
        console.log(responseText);
      },
      success: function(){
        showSuccessToast('Order successfully added.');
      },
    }).done(function(data){
      /**
       * Populate table
       */
      data_show($('#ord-added-table').DataTable(), data[0]);

      /**
       * Reset form inputs
       */
      $('#form_add_order').trigger('reset');

      /**
       * Add value to date and total input
       */
      $('input[name="order_total"]').val(data[1]);
      $('input[name="order_date"]').val(data[2]);

      /**
       * Reset input icon status
       */
      input_icon_reset();
    });
  }

  /**
   * Show table data
   * 
   * @param {table} table 
   * @param {json} data 
   */
  function data_show(table, data) {
    table.clear();
    var result = data.map(function (item) {
      var result = [];
      
      /**
       * Map json value
       */
      result.push(capitalize( item.item_name ) + ' ' + capitalize( item.item_description ) );
      result.push(item.tmp_date);
      result.push(item.tmp_quantity);
      result.push(item.tmp_price);
      result.push(item.tmp_srp);
      result.push(item.tmp_expiry);
      result.push('<i class="mdi mdi-square-edit-outline mdi-18px btn-edit"></i>');

      return result;
    });

    /**
     * Add to table
     */
    table.rows.add(result);
    table.draw()
  }

})(jQuery);
