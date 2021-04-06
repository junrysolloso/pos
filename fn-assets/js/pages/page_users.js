'use strict';

$(document).ready(function(){

  let url = base_url + 'users';

  // Delete user
  $('.user-delete-btn').on('click', function() {
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
        var data  = { 
          id: parseInt($(this).attr('u-id'))
        }

        if (checkData(data)) {
          $.post( url + '/delete', data ).done(function(responseText){
            if (responseText.msg == 'success') {
              showSuccessSwal('User deleted successfully.');
            }            
          });
        }
      } else {
        swal.close();
      }
    });
  });

  // Check password
  if ($('input[name="user_pcon"]').length) {
    $('input[name="user_pcon"]').on('mouseleave', function(){

      var pass = $('input[name="user_pass"]').val();
      var pcon = $('input[name="user_pcon"]').val();

      if (pass != "" && pcon != "") {
        if (pass !=  pcon) {

          showWarningSwal('Password doesn\'t match.');

          $('input[name="user_pass"]').val('');
          $('input[name="user_pcon"]').val('');
        }
      }
    });
  }
});