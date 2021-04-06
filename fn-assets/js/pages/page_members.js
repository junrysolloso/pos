$(document).ready(function(){
  let url = base_url + 'members';

  $('.paginate_button').on('click', function(){
    $('body').delegate('.user-delete-btn', 'click', function(){
      member_delete($(this));
    });
  })
  
  // Delete user
  $('.user-delete-btn').on('click', function() {
    member_delete($(this));
  });

  function member_delete(element) {
    swal({
      title: "Are you sure?",
      text: "This action cannot be reverted.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      closeOnClickOutside: false,
    })
    .then((value) => {
      if (value) {
        var data  = { 
          id: parseInt(element.attr('u-id'))
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
  }
});