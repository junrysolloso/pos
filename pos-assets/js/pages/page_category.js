(function($){
  'use strict';
  $(document).ready(function() {

    var baseUrl   = $('#base_url').val();
    $('#add_cat_form').submit(function(event){
      /**
       * Prevent the form being submitted
       */
      event.preventDefault();
      var subcat = {};
      var url    = baseUrl + 'settings';

      /**
       * Get all value from subcategory input array
       */
      var subInputs = $('input[name="subcat_name[]"]');
      for (let i = 0; i < subInputs.length; i++) {
        subcat[i] = subInputs[i].value;
      }

      /**
       * Assing input data
       */
      var data = {
        category_name : $('input[name="category_name"]').val(),
        subcat_name   : subcat,
        submit        : 'Save Category Details',
      }
      
      /**
       * Check and save temporary orders
       */
      if(data_checker(data)) {
        data_sender(data, url);
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
        showSuccessToast('Category successfully added.');
      },
    }).done(function(data){
      /**
       * Populate table
       */
      var catCol = ['category_name'];
      var subCol = ['subcat_name'];

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

})(jQuery);
