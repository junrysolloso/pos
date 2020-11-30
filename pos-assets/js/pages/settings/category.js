(function($){
  'use strict';
  $(document).ready(function(){

    $('#add_cat_form').submit(function(event){
      /**
       * Prevent the form being submitted
       */
      event.preventDefault();
      var subcat = {};
      var url    = base_url + 'settings/category';

      /**
       * Get all value from subcategory input array
       */
      $('input[name="subcat_name[]"]').each(function(i){
        subcat[i] = $(this).val();
      });

      /**
       * Assing input data
       */
      var data = {
        cat_name : $('input[name="category_name"]').val(),
        sub_name : subcat,
        cat_add  : 'Add',
      }
      
      /**
       * Check and save temporary orders
       */
      if(data_checker(data)) {
        data_sender(data, url);
      }
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
        /**
         * Populate table
         */

        cat_data_show($('#cat-table').DataTable(), data.category );
        sub_data_show($('#cat-sub-table').DataTable(), data.subcategory );

        console.log(data);

        /**
         * Reset form inputs
         */
        $('#add_cat_form').trigger('reset');

        /**
         * Reset input icon status
         */
        input_icon_reset();
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
        result.push(item.category_name);

        return result;
      });

      /**
       * Add to table
       */
      table.rows.add(result);
      table.draw()
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
        result.push(item.subcat_name);

        return result;
      });

      /**
       * Add to table
       */
      table.rows.add(result);
      table.draw()
    }

  });
})(jQuery);