$(document).ready(function(){

  var base_url = $('input#base_url').val();
  var baseUrl = base_url + 'officials/data';

  // Load default data for the first time
  var text = 'Officials <span class="mdi mdi-menu-right"></span> National';
  $('#breadcrumb').html(text);

  var data = { id: 'national' }
  $.post(baseUrl, data ).done(function(data){
    officialTree(data);
  })

  $('#chapter_id').on('change', function() {
    // Set breadcrumb
    if ($(this).children(':selected').attr('c-name')) {
      var text = 'Officials <span class="mdi mdi-menu-right"></span>' + $(this).children(':selected').attr('c-name');
      $('#breadcrumb').html(text);
    }

    var data = { id: $(this).val() }
    $.post(baseUrl, data ).done(function(data){
      officialTree(data);
    })
  });

  $('#orgprint').on('click', function(){
    printJS('orgchart','html');
  });

  // Populate organizational chart
  function officialTree(data) {
    var chart = new OrgChart(document.getElementById("orgchart"), {
      enableSearch: false,
      template: 'isla',
      nodeBinding: {
        field_0: "Position",
        field_1: "Name",
        field_2: "Phone",
        field_3: "Email",
        field_4: "Address",
        field_5: "Update Link"
      },
      nodes: data
    });
    chart.zoom(1, [52,52]);
  }

});
