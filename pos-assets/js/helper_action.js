$(document).ready(function () {
  
  var e_unit = 0;
  // Remove alert container
  if( $('div.alert').length ) {
    setTimeout(function(){
      $('div.alert').each(function(){
        $(this).remove();
      });  
    }, 5000);
  }

  // Set barcode when item name is selected
  $('select[name="select_code"]').on('change', function(){

    e_unit = parseFloat($(this).children(':selected').attr('e-unit'));

    $('input[name="item_id"]').val($(this).val());
    $('input[name="category_name"]').val($(this).children(':selected').attr('c-name'));
    $('input[name="order_unit"]').val($(this).children(':selected').attr('o-unit'));
    $('input[name="selling_unit"]').val($(this).children(':selected').attr('s-unit'));

    $('input').each(function(){
      input_icon($(this));
    });
  });

  // Generate suggested SRP
  $('input[name="price_per_unit"]').on('keyup', function(){
    if(e_unit != 0) {
      var suggest = parseFloat($(this).val())/e_unit;
      $('input[name="inv_item_srp"]').val(suggest.toFixed(2));
    }
  });

  // Get values from an array input
  // var values = $("input[name='pname[]']").map(function(){return $(this).val();}).get();

  // Add sub-category
  $('.sub-add').on('click', function () {
    $(this).closest('.sub-main').append('<div class="form-group sub-added"><div class="input-group mt-3"><input type="text" name="subcat_name[]" class="form-control" required /><div class="input-group-append"><span class="input-group-text sub-minus"><i class="mdi mdi-minus-circle-outline mdi-18px"></i>&nbsp;Remove&nbsp;</span></div></div></div>');
    $('body').delegate('.sub-minus', 'click', function () {
      $(this).closest('.sub-added').remove();
    });
  });

  $('#ord-added-table_wrapper .row').closest('.row').find('.col-sm-12.col-md-5').prepend('<div class="form-group mt-4"><form action="#" method="post"><input type="button" name="discard_orders" value="Reset Orders" class="btn btn-danger submit-btn" />&nbsp;&nbsp;<input type="button" name="save_orders" value="Save Orders" class="btn btn-success submit-btn" /></form></div>');

  // Remove sub-category
  $('.sub-minus').on('click', function () {
    $(this).closest('.sub-added').remove();
  });

  // Reset icon size
  $('input').closest('.input-group').find('.mdi').addClass('mdi-18px');
  $('select').closest('.input-group').find('.mdi').addClass('mdi-18px');

  // Input events
  $('input').on('keyup', function () {
    input_icon($(this));
  });

  // Select events
  $('select').on('change', function () {
    input_icon($(this));
  });

  // Inputmask
  $(":input").inputmask();

  //Initialize Select2 Elements
  $('.select2-lg').select2({width: '93.6%'});
  $('.select2-md').select2({width: '86.8%'});

});
