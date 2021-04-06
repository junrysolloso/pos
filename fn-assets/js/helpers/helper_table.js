
$(document).ready(function() {

  var paging = true, len = 10;
  var page = $('input[name="current-segment"]').val();

  if ( page == 'chapters' ) {
    paging = false;
    len = 6;
  } else if ( page == 'logs' ) {
    len = 11;
  }
  
  // Table values
  var ar_tables = ['.data-table'];
  var ar_paging = [false];
  var ar_filter = [true];
  var ar_sort   = [false];
  var ar_info   = [false];
  var ar_dlen   = [len];

  // Populate DataTable if table id is present
  for (let i = 0; i < ar_tables.length; i++) {
    if ( $( ar_tables[i] ).length ) {
      $( ar_tables[i] ).DataTable({
        "aLengthMenu": [
          [5, 10, 15, -1],
          [5, 10, 15, "All"]
        ],
        paging  : ar_paging[i],
        bFilter : ar_filter[i],
        bSort   : ar_sort[i],
        bInfo   : ar_info[i],
        "iDisplayLength": ar_dlen[i],
        "bLengthChange" : false,
      });
    }
  }

  // Remove padding in table parent element when on chapter page
  if ( page == 'chapters' ) {
    $('.ctm-table').parent().addClass('p-0');
  }

  // Search table
  if ( $('input[name="search-field"]').length ) {
    $('input[name="search-field"]').on('keyup', function () {
      $('.data-table').DataTable().search($(this).val()).draw();
    });
  }
});

