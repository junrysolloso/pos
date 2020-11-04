$(document).ready(function () {
  
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
    $('input[name="item_id"]').val($(this).val());
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
  showSwal = function(type) {
    swal({
      title: 'Congratulations!',
      text: 'Backup done.',
      icon: 'success',
      button: {
        text: "Ok",
        value: true,
        visible: true,
        className: "btn btn-success"
      }
    });
  }

});