
document.addEventListener('DOMContentLoaded', function(){
  if($('#loader').modal('show')) {
    setTimeout(function(){
      if( $('#loader').modal('hide') ) {
        $('#c-overlay').fadeOut('fast');
      }
    }, 1000);
  }
});
  
