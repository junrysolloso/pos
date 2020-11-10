(function($){
  'use strict';
  $(document).ready(function() {

    var baseUrl = $('#base_url').val();
    var table   = $('#ord-added-table').DataTable();

    /**
     * Prepend buttons
     */
    $('#ord-added-table_wrapper .row').closest('.row').find('.col-sm-12.col-md-5').prepend('<div class="form-group mt-4" id="btn-orders" style="display: none;"><form action="#" method="post"><input type="button" name="discard_orders" value="Reset Orders" class="btn btn-danger submit-btn" />&nbsp;&nbsp;<input type="button" name="save_orders" value="Save Orders" class="btn btn-success submit-btn" /></form></div>');

    /**
     * Add order
     */
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
          data_sender(data, url, 'add');
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

      /**
       * Show orders button
       */
      $('#btn-orders').fadeOut('slow');
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

      /**
       * Show orders button
       */
      $('#btn-orders').fadeOut('slow');
    });

    /**
     * Submit order update
     */
    $('#form_edit_order').submit(function(event){
      event.preventDefault();

      var url  = baseUrl + 'orders/update-order'
      var data = {

        id          : $('input[name="edit_id"]').val(),
        tmp_quantity: $('input[name="edit_orderdetails_quantity"]').val(),
        tmp_price   : $('input[name="edit_price_per_unit"]').val(),
        tmp_srp     : $('input[name="edit_inv_item_srp"]').val(),
        tmp_expiry  : $('input[name="edit_expiration_date"]').val(),
    
      }

      if( data_checker(data) ) {

        /**
         * Send data to the server
         */
        data_sender( data, url, 'update' );

        /**
         * Hide the modal
         */
        $('#view_order').modal('hide');
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
  function data_sender(data, url, action) {
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
        switch (action) {
          case 'add':
            showSuccessToast('Order successfully added.');
            break;
          case 'update':
            showSuccessToast('Order successfully updated.');
            break;
          default:
            showSuccessToast('Process successfully executed.');
            break;
        }
      },
    }).done(function(data){
      /**
       * Populate table
       */
      data_show($('#ord-added-table').DataTable(), data[0]);

      /**
       * Reset form inputs
       */
      switch (action) {
        case 'add':
          $('#form_add_order').trigger('reset');
          break;
        case 'update':
          $('#form_edit_order').trigger('reset');
          break;
        default:
          showWarningToast('Cannot reset form.');
          break;
      }

      /**
       * Add value to date and total input
       */
      $('input[name="order_total"]').val(data[1]);
      $('input[name="order_date"]').val(data[2]);

      /**
       * Reset input icon status
       */
      input_icon_reset();

      /**
       * Show orders button
       */
      $('#btn-orders').fadeIn('slow');
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
      result.push('<a id="'+ item.id +'" p-name="'+ capitalize( item.item_name ) + ' ' + capitalize( item.item_description ) +'" c-name="'+ capitalize( item.category_name ) +'" o-unit="'+ capitalize( item.order_unit ) +'" s-unit="'+ capitalize( item.selling_unit ) +'" t-quan="'+ item.tmp_quantity +'" p-price="'+ item.tmp_price +'"  s-price="'+ item.tmp_srp +'" t-date="'+ item.tmp_date +'" t-expire="'+ item.tmp_expiry +'" data-target="#view_order" class="btn btn-edit" data-toggle="modal"><i class="mdi mdi-pencil-box-outline mdi-18px"></i> Edit</a>');

      return result;
    });

    /**
     * Add to table
     */
    table.rows.add(result);
    table.draw();

    /**
     * Delegate edit button
     */
    $('body').delegate('.btn-edit', 'click', function () {
      assign_values($(this));
    });
  }

  /**
   * Get object values and assign to edit inputs
   * @param {object} obj 
   */
  function assign_values(obj) {

    /**
     * Get values from object attribute
     */
    $('input[name="edit_id"]').val(obj.attr('id'));
    $('input[name="edit_item_id"]').val(obj.attr('p-name'));
    $('input[name="edit_category_name"]').val(obj.attr('c-name'));
    $('input[name="edit_order_unit"]').val(obj.attr('o-unit'));
    $('input[name="edit_price_per_unit"]').val(obj.attr('p-price'));
    $('input[name="edit_orderdetails_quantity"]').val(obj.attr('t-quan'));
    $('input[name="edit_selling_unit"]').val(obj.attr('s-unit'));
    $('input[name="edit_inv_item_srp"]').val(obj.attr('s-price'));
    $('input[name="edit_expiration_date"]').val(obj.attr('t-expire'));

    /**
     * Reset input icons
     */
    input_icon_reset();

  }

})(jQuery);
