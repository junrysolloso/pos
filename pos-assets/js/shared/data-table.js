( function ($) {
  
  // Initialize tables
  // Settings Table
  $(function () {
    $('#set-damag-table, #cahier-table, #set-users-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: true,
      "iDisplayLength": 10,
      "bLengthChange": false,
    });
  });

  $(function () {
    $('#set-logss-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: true,
      "iDisplayLength": 30,
      "bLengthChange": false,
    });
  });

  // Dashboard
  $(function () {
    $('#das-cahie-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: true,
      "iDisplayLength": 10,
      "bLengthChange": false,
    });
  });

  // Sales Table
  $(function () {
    $('#sal-pharma-table, #sal-grocs-table, #sal-beauty-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: false,
      "iDisplayLength": 15,
      "bLengthChange": false,
    });
  });

  // Orders Table
  $(function () {
    $('#ord-histo-table, #ord-items-table, #ord-added-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: true,
      "iDisplayLength": 7,
      "bLengthChange": false,
    });
  });

  // Inventory Table
  $(function () {
    $('#inv-grocs-table, #inv-pharm-table, #inv-beaut-table, #inv-damag-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: true,
      "iDisplayLength": 50,
      "bLengthChange": false,
    });
  });
  
})(jQuery);

$(document).ready(function () {

  // Use DataTable in searching tables
  $('input[name="data_search"]').on('keyup', function () {
    var s_value =  $(this).attr('id');

    switch ( s_value ) {
      // Inventory
      case 'inv-grocery':
        $( '#inv-grocs-table' ).DataTable().search( $(this).val() ).draw();
        break;
      case 'inv-pharmacy':
        $( '#inv-pharm-table' ).DataTable().search( $(this).val() ).draw();
        break;
      case 'inv-damage':
        $( '#inv-damag-table' ).DataTable().search( $(this).val() ).draw();
        break;
      case 'inv-beauty':
        $( '#inv-beaut-table' ).DataTable().search( $(this).val() ).draw();
        break;

      // Orders
      case 'ord-history':
        $( '#ord-histo-table' ).DataTable().search( $(this).val() ).draw();
        break;
      case 'ord-items':
        $( '#ord-items-table' ).DataTable().search( $(this).val() ).draw();
        break;

      // Settings
      case 'set-users':
        $( '#set-users-table' ).DataTable().search( $(this).val() ).draw();
        break;
      case 'set-logss':
        $( '#set-logss-table' ).DataTable().search( $(this).val() ).draw();
        break;
      default:
        console.log( 'Error seaching data!' );
        break;
    }
  });

  // Set icon color and size on input
  function input_icon(obj) {
    obj.each(function(){ 
      if ( obj.val().length > 1 ) {
        obj.closest('.input-group').find('.mdi').removeClass('mdi-close-circle-outline');
        obj.closest('.input-group').find('.input-group-text').removeClass('text-danger');
        
        obj.closest('.input-group').find('.input-group-text').addClass('text-success');
        obj.closest('.input-group').find('.mdi').addClass('mdi-check-circle-outline');
        obj.closest('.input-group').find('.mdi').addClass('mdi-18px');
      } else {
        obj.closest('.input-group').find('.input-group-text').removeClass('text-success');
        obj.closest('.input-group').find('.mdi').removeClass('mdi-check-circle-outline');
        obj.closest('.input-group').find('.mdi').removeClass('mdi-18px');

        obj.closest('.input-group').find('.mdi').addClass('mdi-close-circle-outline');
        obj.closest('.input-group').find('.input-group-text').addClass('text-danger');
      }
    });
  }

  // Input events
  $('input').on('keyup', function(){
    input_icon( $(this) );
  });

  $('select').on('change', function(){
    input_icon( $(this) );
  });

});

