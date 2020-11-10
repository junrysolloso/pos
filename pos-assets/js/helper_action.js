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

  // Remove whitespace
  $('input[name="item_id"]').on('mouseleave', function(){
    $(this).val( trim_whitespace($(this).val()) );
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


  /**
   * User edit
   */
  $('.user-edit').on( 'click', function(){

    $('input[name="userinfo_id"]').val( $(this).attr('id') );
    $('input[name="userinfo_name"]').val( $(this).attr('f-name') );
    $('input[name="userinfo_nickname"]').val( $(this).attr('n-name') );
    $('input[name="username"]').val( $(this).attr('u-name') );
    $('input[name="userinfo_address"]').val( $(this).attr('address') );

    $('input').each(function(){
      input_icon($(this));
    });

  } );

  $('#user-submit').on( 'mouseover', function(){
    var f_pass = $('input[name="user_pass"]').val();
    var s_pass = $('input[name="con_pass"]').val();

    if ( f_pass != "" && s_pass != "" ) {
      if ( f_pass != s_pass ) {
        showWarningToast( 'Password does not match.' );
        $('input[name="con_pass"]').val("");
      }
    }
  });

});
