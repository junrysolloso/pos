
document.addEventListener('DOMContentLoaded', function(){
  $('#loader').modal('show');
  setTimeout(function(){
    if( $('#loader').modal('hide') ) {
      $('#c-overlay').fadeOut('fast');
    }
  }, 1000);
});
  
