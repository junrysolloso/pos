$(document).ready(function () {

  // Input events
  $('input').on('keyup', function () {
    addInputIcon($(this));
  });

  // Select events
  $('select').on('change', function () {
    addInputIcon($(this));
  });

  // Inputmask
  $(":input").inputmask();

  //Initialize Select2 Elements
  $('.select2').select2({width: 'calc(100% - 65px)'});

  // Reset input icons
  resetInputIcon();

  // Table pagination button click
  $('.paginate_button').on('click', function(){
    $('body').delegate('.deleteForm', 'submit', function(ev){
      ev.preventDefault();
      action_delete($(this));
    });
  })

  // Trim whitespace
  if ($('input[name="item_id"]').length) {
    $('input[name="item_id"]').on('mouseleave', function(){
      $(this).val( trimWhitespace($(this).val()) );
    });
  } 

  // Initialize form
  $('.dataForm').validate(validateOptions);

  // Delete action
  $('.deleteForm').submit(function(ev) {
    ev.preventDefault();
    caution($(this));
  });

  // Reset action
  $('.resetForm').submit(function(ev) {
    ev.preventDefault();
    caution($(this));
  });

  // Save action
  $('.saveForm').submit(function(ev) {
    ev.preventDefault();
    caution($(this));
  });

  // Do something
  function caution(form) {
    swal({
      title: "Warning",
      text: "This action cannot be reverted.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      closeOnClickOutside: false,
    })
    .then((value) => {
      if (value) {
        form.ajaxSubmit(ajaxOptions);
      } else {
        swal.close();
      }
    });
  }

  // Image lazy loading
  var lazyLoad = function() {
    $('.lazy').Lazy({
      effect: 'fadeIn',
      effectTime: 1500,
      delay: 2000,
      visibleOnly: true,
      scrollDirection: 'vertical'
    });
  }
  lazyLoad();

  // Upload button click
  $('.file-upload-browse').on('click', function() {
    var file = $(this).parent().parent().find('.file-upload-default');
    file.trigger('click');
  });

  // File upload
  $('.file-upload-default').on('change', function(event) {
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    var id = $(this).attr('id');
    var imgPath = URL.createObjectURL(event.target.files[0]);

    if ( $(this).attr('name') == 'photo' ) {
      var img = $('.photo-input');
    } else {
      var img = $(this).parent().parent().parent().parent().find('.' + id);
    }

    img.attr('src', imgPath);
  });

  // Access
  $('.not-role').on('click', function(){
    swal({
      title: 'Warning!',
      text: "Your account is not eligible to access this.",
      icon: 'warning',
      dangerMode: true,
      closeOnClickOutside: false
    })
  });
  
});
