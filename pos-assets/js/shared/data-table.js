(function ($) {
  
  // Initialize tables
  // Settings Table
  $(function () {
    $('#dmg-table, #cahier-table, #users-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: false,
      "iDisplayLength": 10,
      "bLengthChange": false,
      "language": {
        search: "Search :"
      }
    });
  });

  // Sales Table
  $(function () {
    $('#pharma-table, #grocs-table, #beauty-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: false,
      "iDisplayLength": 15,
      "bLengthChange": false,
      "language": {
        search: "Search :"
      }
    });
  });

  // Orders Table
  $(function () {
    $('#history-table, #items-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: false,
      "iDisplayLength": 7,
      "bLengthChange": false,
      "language": {
        search: "Search :"
      }
    });
  });

  // Logs Table
  $(function () {
    $('#log-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: false,
      "iDisplayLength": 30,
      "bLengthChange": false,
      "language": {
        search: "Search :"
      }
    });
  });

  // Inventorys Table
  $(function () {
    $('#inv-grocs-table, #inv-pharm-table, #inv-beaut-table, #inv-damag-table').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      bFilter: true,
      "iDisplayLength": 50,
    });
  });
  
})(jQuery);

$(document).ready(function () {
  // Append search input and print button
  // if ($('.inventory .table-responsive').length) {
  //   $('.dataTables_paginate ul.pagination').prepend('<li><input type="submit" name="inv_print" value="Print Inventory" id="print-btn" class="btn btn-success submit-btn"></li>');
  //   $('.table-responsive').prepend('<div class="form-group"><div class="input-group"><input type="text" name="inv_search" class="form-control" placeholder="Search anything in the column.." /><div class="input-group-append"><span class="input-group-text"><i class="mdi mdi-magnify-plus"></i></span></div></div></div>');
  // }
  
  // Add event on mouseleave in print button
  // $('input[name="inv_print"]').on('mouseover', function() {
  //   var print_q = $(this).parents('.table-responsive').attr('lnk');
  //   var print_n = 'Print ' + print_q + ' Inventory';
  //   $(this).val( print_n );
  // });

  // $('body').delegate('input.btn', 'mouseover', function(){
  //   var attr_n = 'Print ' + attr_p + ' Inventory';
  //   $(this).val( attr_n );
  // });

  // Add event on keyup in seach input
  $('input[name="inv_search"]').on('keyup', function () {
    var attr_p =  $(this).attr('id');
    if( attr_p == "grocery" ) {
      $( '#inv-grocs-table' ).DataTable().search( $(this).val() ).draw();
    } else if ( attr_p == "pharmacy" ) {
      $( '#inv-pharm-table' ).DataTable().search( $(this).val() ).draw();
    } else if ( attr_p == "damage" ) {
      $( '#inv-damag-table' ).DataTable().search( $(this).val() ).draw();
    } else if ( attr_p == "beauty" ) {
      $( '#inv-beaut-table' ).DataTable().search( $(this).val() ).draw();
    } else {
      console.log('Nothing.');
    }
  });

});

