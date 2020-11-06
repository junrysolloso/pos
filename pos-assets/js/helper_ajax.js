$(document).ready(function(){
  var base_url = $('#base_url').val();

  /**
   * Reset temporary table using ajax
   */
  $('input[name="discard_orders"]').on('click', function(){
    $.ajax({
      type: 'GET',
      url: base_url + 'orders/reset-orders?r=true',
      dataType: 'json',
      error: function(jqXHR){
        console.log(jqXHR.responseText);
      },
      success: function(data){
        if( data.msg == 'success' ) {
          showSwal('success-message', 'Successful!', 'Orders successfully removed.', 'success', 'Ok', 'success');
        } else {
          showSwal('danger-message', 'Error!', 'Nothing to removed.', 'error', 'Ok', 'danger');
        }
      } 
    }).done(function(){
      setTimeout(function(){
        window.location = base_url + 'orders';
      }, 3000);
    });
  });

});