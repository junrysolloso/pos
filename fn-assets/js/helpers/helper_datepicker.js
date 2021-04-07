$(document).ready(function () {
  if ($('#rangedate').length) {
    var start = moment().subtract(29, 'days');
    var end = moment();

    $('#rangedate').daterangepicker({
      startDate: start,
      endDate: end,
      locale: { 
        format: 'YYYY-MM-DD'
      },
      ranges: {
        'This Week':  [moment().startOf('week'), moment().endOf('week')],
        'Last Week':  [moment().subtract(6, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        'This Year':  [moment().startOf('year'), moment().endOf('year')],
        'Last Year':  [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
      }
    });
  }
});
