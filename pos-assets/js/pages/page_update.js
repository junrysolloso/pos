(function($){
  'use strict';

  var baseUrl = $('#base_url').val();

  $(document).ready(function() {

    var table   = $('#ord-added-table').DataTable();

    /**
     * Prepend buttons
     */
    $('#ord-added-table_wrapper .row').closest('.row').find('.col-sm-12.col-md-5').prepend('<div class="mt-2" id="btn-orders" style="display: none;"><form action="#" method="post"><input type="button" name="discard_orders" value="Reset Orders" class="btn btn-danger submit-btn" />&nbsp;&nbsp;<input type="button" name="save_orders" value="Save Orders" class="btn btn-success submit-btn" /></form></div>');
    $('#ord-items-table_wrapper .row').closest('.row').find('.col-sm-12.col-md-5').prepend('<div id="btn-orders"><input type="button" id="item-table-close" value="Close" class="btn btn-danger submit-btn" data-dismiss="modal" style="margin-bottom: -60px;" /></div>');

    /**
     * Generate suggested SRP
     */
    $('input[name="edit_price_per_unit"]').on('keyup', function(){
      var u_equiv = parseInt( $(this).attr('u-equiv') );

      if ( $(this).val().length >= 1 && u_equiv != 0 ) {
        var t_value = parseFloat( $(this).val() );
        var suggest = t_value / u_equiv;

        $('input[name="edit_inv_item_srp"]').val(suggest.toFixed(2));
      }
    });

    $('input[name="pro_price_per_unit"]').on('keyup', function(){
      var u_equiv = parseInt( $(this).attr('u-equiv') );

      if ( $(this).val().length >= 1 && u_equiv != 0 ) {
        var t_value = parseFloat( $(this).val() );
        var suggest = t_value / u_equiv;

        $('input[name="pro_inv_item_srp"]').val(suggest.toFixed(2));
      }
    });

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
            }, 1500);
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
    $('#form_update').submit(function(event){
      event.preventDefault();

      var url  = baseUrl + 'orders/update-order'
      var data = {

        id          : $('input[name="edit_id"]').val(),
        tmp_quantity: $('input[name="edit_orderdetails_quantity"]').val(),
        tmp_price   : $('input[name="edit_price_per_unit"]').val(),
        tmp_srp     : $('input[name="edit_inv_item_srp"]').val(),
        tmp_expiry  : $('input[name="edit_expiration_date"]').val(),
    
      }

      /**
       * Check if SRP is greater than the default value
       */
      var srp     = parseFloat($('input[name="edit_inv_item_srp"]').val());
      var e_unit  = parseInt($('input[name="edit_price_per_unit"]').attr('u-equiv'));
      var def     = parseFloat($('input[name="edit_price_per_unit"]').val())/e_unit;
      if( srp <= def.toFixed(2) ) {
        showWarningToast( 'SRP must be greater than ₱' + srp );
      } else {

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
      }
      
    });

    /**
     * View items
     */
    $('.view-order-items').on('click', function(){
      var url = baseUrl + 'orders/order-items';
      var data = {
        id: $(this).attr('o-id'),
      }

      data_sender(data, url, 'items');
      $('#view_order_items').modal('show');
    });

    /**
     * Delegat event
     */
    $('.paginate_button').on('click', function(){

      /**
       * Order items
       */
      $('body').delegate('.view-order-items', 'click', function(){
        var url = baseUrl + 'orders/order-items';
        var data = {
          id: $(this).attr('o-id'),
        }
  
        data_sender(data, url, 'items');
        $('#view_order_items').modal('show');
      })

    });

    /**
     * Item Details
     */
    $('.item-edit').on('click', function(){
      /**
       * Set values on the fields
       */
      product_values($(this));

      /**
       * Hide main modal
       */
      $('#view_order_items').modal('hide');

      /**
       * Show order details modal
       */
      $('#view_order_item').modal('show');

    });

    /**
     * Back button click
     */
    $('#back_pro_btn').on('click', function(){
      $('#view_order_item').modal('hide');
      $('#view_order_items').modal('show');
    });

    /**
     * Submit Product info
     */
    $('#form_pro_details').submit(function(event){
      event.preventDefault();

      var url  = baseUrl + 'orders/update-product'

      var stocks = parseInt( $('input[name="pro_orderdetails_quantity"]').val() ) * parseInt($('input[name="pro_price_per_unit"]').attr('u-equiv'));
      var unit_p = parseFloat( $('input[name="pro_price_per_unit"]').val() ) / parseInt($('input[name="pro_price_per_unit"]').attr('u-equiv'));

      var data = {
        id      : $('input[name="pro_id"]').val(),
        order_id: $('input[name="pro_oid"]').val(),
        item_id : $('input[name="pro_iid"]').val(),
        quantity: $('input[name="pro_orderdetails_quantity"]').val(),
        price   : $('input[name="pro_price_per_unit"]').val(),
        srp     : $('input[name="pro_inv_item_srp"]').val(),
        expiry  : $('input[name="pro_expiration_date"]').val(),
        stocks  : stocks,
        unit_p  : unit_p,
      }
      
      /**
       * Check if SRP is greater than the default value
       */
      var srp     = parseFloat($('input[name="pro_inv_item_srp"]').val());
      var e_unit  = parseInt($('input[name="pro_price_per_unit"]').attr('u-equiv'));
      var def     = parseFloat($('input[name="pro_price_per_unit"]').val())/e_unit;
      if( srp <= def.toFixed(2) ) {
        showWarningToast( 'SRP must be greater than ₱' + srp );
      } else {
        if( data_checker(data) ) {

          /**
           * Send data to the server
           */
          data_sender( data, url, 'pro' );
        }
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
          case 'pro':
            showSuccessToast('Product successfully updated.');
            break;
          default:
            
            break;
        }
      },
    }).done(function(data){

      /**
       * Reset form inputs
       */
      switch (action) {
        case 'add':

          /**
           * Populate table
           */
          data_show($('#ord-added-table').DataTable(), data[0]);

          $('#form_add_order').trigger('reset');

          /**
           * Add value to date and total input
           */
          $('input[name="order_total"]').val(data[1]);
          $('input[name="order_date"]').val(data[2]);

          /**
           * Show orders button
           */
          $('#btn-orders').fadeIn('slow');

          break;
        case 'update':
          
          /**
           * Populate table
           */
          data_show($('#ord-added-table').DataTable(), data[0]);

          $('#form_edit_order').trigger('reset');

          /**
           * Add value to date and total input
           */
          $('input[name="order_total"]').val(data[1]);
          $('input[name="order_date"]').val(data[2]);

          /**
           * Show orders button
           */
          $('#btn-orders').fadeIn('slow');

          break;
        case 'items':

          /**
           * Populate table
           */
          items_show($('#ord-items-table').DataTable(), data);

          break;
        case 'pro':

          /**
           * Updated items table
           */
          var url = baseUrl + 'orders/order-items';
          var data = {
            id: $('input[name="pro_oid"]').val(),
          }
          data_sender( data, url, 'items' );

          /**
           * Hide the modal
           */
          $('#view_order_item').modal('hide');
          $('#view_order_items').modal('show');

          break;
        default:

          showWarningToast('Request is done.');

          break;
      }

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
      result.push('<a id="'+ item.id +'" p-name="'+ capitalize( item.item_name ) + ' ' + capitalize( item.item_description ) +'" c-name="'+ capitalize( item.category_name ) +'" o-unit="'+ capitalize( item.order_unit ) +'" s-unit="'+ capitalize( item.selling_unit ) +'" t-quan="'+ item.tmp_quantity +'" p-price="'+ item.tmp_price +'"  s-price="'+ item.tmp_srp +'" t-date="'+ item.tmp_date +'" t-expire="'+ item.tmp_expiry +'" u-equiv="'+ item.equivalent +'" data-target="#view_order" class="btn-edit" data-toggle="modal"><i class="mdi mdi-pencil-outline mdi-18px"></i> Edit</a>');

      return result;
    });

    /**
     * Add to table
     */
    table.rows.add(result);
    table.draw();

    /**
     * Added orders
     */
    $('body').delegate('.btn-edit', 'click', function () {
      assign_values($(this));
    });

  }

  /**
   * Map items data
   * 
   * @param {table} table 
   * @param {json} data 
   */
  function items_show(table, data) {
    table.clear();
    var count = 1;
    var result = data.map(function (item) {
      var result = [];
      
      /**
       * Map json value
       */
      result.push( count );
      result.push( item.barcode );
      result.push( capitalize( item.name ) + ' ' + capitalize( item.desc ) );
      result.push( '₱ '+ item.price );
      result.push( item.stocks + ' ' + capitalize( item.udesc )  );
      result.push('<a id="'+ item.id +'" i-id="'+ item.barcode +'" o-id="'+ item.oid +'" p-name="'+ capitalize( item.name ) + ' ' + capitalize( item.desc ) +'" c-name="'+ capitalize( item.catname ) +'" o-unit="'+ capitalize( item.order_unit ) +'" s-unit="'+ capitalize( item.selling_unit ) +'" t-quan="'+ item.quantt +'" p-price="'+ item.price +'"  s-price="'+ item.srp +'" t-date="'+ item.odate +'" t-expire="'+ item.exdate +'" u-equiv="'+ item.equiv +'" class="item-edit"><i class="mdi mdi-pencil-outline mdi-18px"></i> Edit</a>');

      count++;

      return result;
    });

    /**
     * Add to table
     */
    table.rows.add(result);
    table.draw();

    /**
     * Added orders
     */
    $('body').delegate('.item-edit', 'click', function () {
      /**
       * Set values on the fields
       */
      product_values($(this));

      /**
       * Hide main modal
       */
      $('#view_order_items').modal('hide');
      
      /**
       * Show order details modal
       */
      $('#view_order_item').modal('show');
    });
  }

  /**
   * Get object values and assign to edit inputs
   * @param {object} obj 
   */
  function assign_values( obj ) {

    /**
     * Get values from object attribute
     */
    $('input[name="edit_id"]').val(obj.attr('id'));
    $('input[name="edit_item_id"]').val(obj.attr('p-name'));
    $('input[name="edit_category_name"]').val(obj.attr('c-name'));
    $('input[name="edit_order_unit"]').val(obj.attr('o-unit'));
    
    $('input[name="edit_price_per_unit"]').attr('u-equiv', obj.attr('u-equiv'));

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

  /**
   * Get object values and assign to edit inputs
   * @param {object} obj 
   */
  function product_values( obj ) {

    /**
     * Get values from object attribute
     */
    $('input[name="pro_id"]').val(obj.attr('id'));
    $('input[name="pro_oid"]').val(obj.attr('o-id'));
    $('input[name="pro_iid"]').val(obj.attr('i-id'));
    $('input[name="pro_item_id"]').val(obj.attr('p-name'));
    $('input[name="pro_category_name"]').val(obj.attr('c-name'));
    $('input[name="pro_order_unit"]').val(obj.attr('o-unit'));
    
    $('input[name="pro_price_per_unit"]').attr('u-equiv', obj.attr('u-equiv'));

    $('input[name="pro_price_per_unit"]').val(obj.attr('p-price'));
    $('input[name="pro_orderdetails_quantity"]').val(obj.attr('t-quan'));
    $('input[name="pro_selling_unit"]').val(obj.attr('s-unit'));
    $('input[name="pro_inv_item_srp"]').val(obj.attr('s-price'));
    $('input[name="pro_expiration_date"]').val(obj.attr('t-expire'));

    /**
     * Reset input icons
     */
    input_icon_reset();
  }

})(jQuery);
