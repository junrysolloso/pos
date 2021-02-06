'use strict';

var url = base_url + 'settings/unit';

/**
 * Add unit form submit
 */
$('#add_unit_form').submit(function(event){
  
  event.preventDefault();

  var data = {
    unit_lg: $('input[name="unit_desc"]').val(),
    unit_sh: $('input[name="unit_sh"]').val(),
    add: 'add'
  }

  if ( data_checker( data ) ) {
    $.post( url, data ).done( function( data ){
      if ( data.msg === 'success' ) {
        unit_data_show( $('#unit-table').DataTable(), data.unit );

        showSuccessToast('Unit successfully added.');
      }

      if ( data.msg === 'exist' ) {
        showWarningToast( 'Unit already exist.' );
      }
    });
  }

});

/**
 * Edit unit submit
 */
$('#edit_units').submit(function(event){
  event.preventDefault();

  var data = {
    unit_id: $('input[name="edit_unit_id"]').val(),
    unit_desc: $('input[name="edit_lg_name"]').val(),
    unit_sh: $('input[name="edit_sh_name"]').val(),
    update: 'update'
  }

  $.post( url, data ).done( function( data ){
    if ( data.msg === 'success' ) {

      unit_data_show( $('#unit-table').DataTable(), data.unit );
      showSuccessToast('Unit successfully updated.');

      $('#edit_unit_modal').modal('hide');
    }
  });
  
});

/**
 * Show units on table
 */
function unit_data_show( table, data ) {

  table.clear();
  var result = data.map(function (item) {
    var result = [];
    
    /**
     * Map json value
     */
    result.push( capitalize( item.unit_desc ) );
    result.push( capitalize( item.unit_sh ) );
    result.push( '<a class="unit-edit-btn" u-id="'+ item.unit_id +'" u-sh="'+ item.unit_sh +'" u-lg="'+ item.unit_desc +'"><i class="mdi mdi-pencil-outline mdi-18px"></i></a>' );
    
    return result;
  });

  /**
   * Add to table
   */
  table.rows.add(result);
  table.draw();

  /**
   * Delegat button event
   */
  $('body').delegate('.unit-edit-btn', 'click', function () {
    set_unit_values( $( this ) );
  });
}

/**
 * Edit button click
 */
$('.unit-edit-btn').on('click', function(){
  set_unit_values( $( this ) );
});

/**
 * Unit update values
 */
function set_unit_values(obj) {

  $('input[name="edit_unit_id"]').val(obj.attr('u-id'));
  $('input[name="edit_lg_name"]').val(obj.attr('u-lg'));
  $('input[name="edit_sh_name"]').val(obj.attr('u-sh'));

  $('#edit_unit_modal').modal('show');

}
