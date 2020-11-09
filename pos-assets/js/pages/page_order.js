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
       * Check and save temporary orders
       */
      if(data_checker(data)) {
        data_sender(data, url);
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
        }).done(function(){
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
      error: function() {
        showErrorToast('Error processing request.');
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
      result.push(item.tmp_barcode);
      result.push(item.tmp_date);
      result.push(item.tmp_quantity);
      result.push(item.tmp_price);
      result.push(item.tmp_srp);
      result.push(item.tmp_expiry);

      return result;
    });

    /**
     * Add to table
     */
    table.rows.add(result);
    table.draw()
  }

})(jQuery);