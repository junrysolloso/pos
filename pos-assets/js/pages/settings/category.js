(function($){
  'use strict';

  var url = base_url + 'settings/category';

  $(document).ready(function(){

    $('#add_cat_form').submit(function(event){
      /**
       * Prevent the form being submitted
       */
      event.preventDefault();
      var subcat = {};

      /**
       * Get all value from subcategory input array
       */
      $('input[name="subcat_name[]"]').each(function(i){
        subcat[i] = $(this).val();
      });

      /**
       * Assign input data
       */ 
      var data = {
        cat_name  : $('input[name="category_name"]').val(),
        sub_name  : subcat,
        add_submit: 'Add',
      }
      
      /**
       * Check and save category
       */
      if(data_checker(data)) {
        data_sender(data, url);
      }
    });

    /**
     * Edit category
     */
    $('.in-edit').on('click', function(){

      set_category_values($(this));

    });

    /**
     * Submit category edit form
     */
    $('#edit_category_modal').submit(function(event){
      event.preventDefault();

      var id =  $('input[name="edit_category_id"]').val();
      var cat_name =  $('input[name="edit_category_name"]').val();
      var cat = $('input[name="edit_category_cat"]').val();

      var data = {
        cat_id: id,
        cat_name: cat_name
      }

      if ( cat === 'cat' ) {
        data.update_cat = 'update';

        $.post(url, data).done(function(data){
          if ( data.msg === 'success' ) {

            $('#edit_category_modal').modal('hide');
            showSuccessToast('Category successfully updated.');
            cat_data_show($('#cat-table').DataTable(), data.cat );

          }
        });

      } else {
        data.update_sub = 'update';
        
        $.post(url, data).done(function(data){
          if ( data.msg === 'success' ) {

            $('#edit_category_modal').modal('hide');
            showSuccessToast('Sub-category successfully updated.');
            sub_data_show($('#cat-sub-table').DataTable(), data.sub );

          }
        });
      }

    });

    /**
     * Assign values to the
     * @param {*} obj 
     */
    function set_category_values(obj) {

      var cat = obj.attr('c-id');

      $('input[name="edit_category_cat"]').val(obj.attr('c-id'));
      $('input[name="edit_category_id"]').val(obj.attr('e-id'));
      $('input[name="edit_category_name"]').val(obj.attr('n-cat'));

      if ( cat === 'cat' ) {
        $('label[for="edit_category_name"]').text('Category Name');
      } else {
        $('label[for="edit_category_name"]').text('Sub-category Name');
      }

      $('#edit_category_modal').modal('show');

    }

    /**
     * Delegat event
     */
    $('.paginate_button').on('click', function(){
      $('body').delegate('.in-edit', 'click', function () {
        set_category_values($(this));
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
      $.post(url, data).done(function(data){
        if ( data.msg === 'success' ) {
          /**
           * Populate table
           */
          cat_data_show($('#cat-table').DataTable(), data.cat );
          sub_data_show($('#cat-sub-table').DataTable(), data.sub );

          /**
           * Reset form inputs
           */
          $('#add_cat_form').trigger('reset');

          /**
           * Reset input icon status
           */
          input_icon_reset();

          showSuccessToast('Data successfully Added');
        } else {
          showWarningToast( 'Please check for duplicate inputs.' );
        }
      });
    }

    /**
     * Show table data for category
     * 
     * @param {table} table 
     * @param {json} data 
     */
    function cat_data_show(table, data) {
      table.clear();
      var result = data.map(function (item) {
        var result = [];
        
        /**
         * Map json value
         */
        result.push( capitalize( item.category_name) );
        result.push( '<a class="in-edit" e-id="'+ item.category_id +'" n-cat="'+ item.category_name +'" c-id="cat"><i class="mdi mdi-pencil-outline mdi-18px"></i></a>' );
        
        return result;
      });

      /**
       * Add to table
       */
      table.rows.add(result);
      table.draw();

      $('body').delegate('.in-edit', 'click', function () {
        set_category_values($(this));
      });
    }

    /**
     * Show table data for sub-category
     * 
     * @param {table} table 
     * @param {json} data 
     */
    function sub_data_show(table, data) {
      table.clear();
      var result = data.map(function (item) {
        var result = [];
        
        /**
         * Map json value
         */
        result.push( capitalize( item.subcat_name) );
        result.push( '<a class="in-edit" e-id="'+ item.subcat_id +'" n-cat="'+ item.subcat_name +'" c-id="sub"><i class="mdi mdi-pencil-outline mdi-18px"></i></a>' );

        return result;
      });

      /**
       * Add to table
       */
      table.rows.add(result);
      table.draw();

      $('body').delegate('.in-edit', 'click', function () {
        set_category_values($(this));
      });
    }

  });
})(jQuery);