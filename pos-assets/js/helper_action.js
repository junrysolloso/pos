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

  $('#ord-added-table_wrapper .row').closest('.row').find('.col-sm-12.col-md-5').prepend('<div class="form-group mt-4"><form action="#" method="post"><input type="button" name="discard_orders" value="Reset Orders" class="btn btn-danger submit-btn" />&nbsp;&nbsp;<input type="submit" name="save_orders" value="Save Orders" class="btn btn-success submit-btn" /></form></div>');

  // Remove sub-category
  $('.sub-minus').on('click', function () {
    $(this).closest('.sub-added').remove();
  });

  // Reset icon size
  $('input').closest('.input-group').find('.mdi').addClass('mdi-18px');
  $('select').closest('.input-group').find('.mdi').addClass('mdi-18px');

  // Set icon color and size on event change
  function input_icon(obj) {
    obj.each(function () {
      if (obj.val().length > 0) {
        obj.closest('.input-group').find('.mdi').removeClass('mdi-close-circle-outline');
        obj.closest('.input-group').find('.input-group-text').removeClass('text-danger');

        obj.closest('.input-group').find('.input-group-text').addClass('text-success');
        obj.closest('.input-group').find('.mdi').addClass('mdi-check-circle-outline');
      } else {
        obj.closest('.input-group').find('.input-group-text').removeClass('text-success');
        obj.closest('.input-group').find('.mdi').removeClass('mdi-check-circle-outline');

        obj.closest('.input-group').find('.mdi').addClass('mdi-close-circle-outline');
        obj.closest('.input-group').find('.input-group-text').addClass('text-danger');
      }
    });
  }

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

  // Show alert
  showSwal = function(type, title, text, icon, btntext, btnclass) {
    swal({
      title: title,
      text: text,
      icon: icon,
      button: {
        text: btntext,
        value: true,
        visible: true,
        className: "btn btn-" + btnclass,
      }
    });
  }

});