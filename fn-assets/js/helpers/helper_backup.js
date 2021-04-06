$(document).ready(function(){
  /**
   * Database backup
   */
  $('#db-backup').on('click', function() {
    $.post( base_url + 'backup', { backup: 'Db Backup' } ).done( function( data ) {

      // Get server response
      if ( data.msg == 'success' ) {
        
        // Show success message
        swal({
          title: "Done!",
          text: "Database backup successful.",
          icon: "success",
          buttons: {
            cancel: true,
            confirm: {
              text: 'Download Backup',
            }
          },
          closeOnClickOutside: false,
        })
        .then(( value ) => {
  
          // Fire the callback
          if ( value ) {
            open( base_url + 'fn-backup/' + data.file );
          } else {
            swal.close();
          }
        });
      }
    });
  });
});