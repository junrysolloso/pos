(function ($) {
  'use strict';
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

  // Sales
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

  // Orders
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

  // Logs table
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
})(jQuery);
