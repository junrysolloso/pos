$(document).ready(function () {

  // Set nav menu active when in the specified page
  if ($('.nav').length) {
    // Add active to selected nav link
    var navItem = document.getElementsByClassName('nav-item'), i;
    let url = $(location).attr('href'),
      urlKey = url.replace(/\/\s*$/, "").split('/').pop();
    for (i = 1; i < navItem.length; i++) {
      navItem[i].getAttribute('id') == urlKey ? navItem[i].classList.add('active') : false;
    }
  }

  // Get values from an array input
  // var values = $("input[name='pname[]']").map(function(){return $(this).val();}).get();

  // Add sub-category
  $('.sub-add').on('click', function () {
    $(this).closest('.sub-main').append('<div class="form-group sub-added"><div class="input-group mt-3"><input type="text" name="subcat[]" class="form-control" required /><div class="input-group-append"><span class="input-group-text sub-minus"><i class="mdi mdi-minus-circle-outline mdi-18px"></i>&nbsp;Remove&nbsp;</span></div></div></div>');
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
      if (obj.val().length > 1) {
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

});