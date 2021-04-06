/**
 * Toast popups
 */

// Success
showSuccessToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Success',
    text: msg,
    showHideTransition: 'fade',
    icon: 'success',
    loaderBg: '#f96868',
    position: 'bottom-right',
    hideAfter: 5000,
    allowToastClose: false,
  })
};

// Warning
showWarningToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Warning',
    text: msg,
    showHideTransition: 'fade',
    icon: 'warning',
    loaderBg: '#57c7d4',
    position: 'bottom-right',
    hideAfter: 5000,
    allowToastClose: false,
  })
};

// Error
showErrorToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Error',
    text: msg,
    showHideTransition: 'fade',
    icon: 'error',
    loaderBg: '#f2a654',
    position: 'bottom-right',
    hideAfter: 5000,
    allowToastClose: false,
  })
};

// Info
showInfoToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Message',
    text: msg,
    showHideTransition: 'fade',
    icon: 'info',
    loaderBg: '#46c35f',
    position: 'bottom-right',
    hideAfter: 5000,
    allowToastClose: false,
  })
};

/**
 * Swal popups
 */

// Warning
showWarningSwal = function(msg) {
  'use strict';
  swal({
    title: 'Warning',
    text: msg,
    icon: 'warning',
    dangerMode: false,
    closeOnClickOutside: false,
  })
}

// Success
showSuccessSwal = function(msg) {
  'use strict';
  swal({
    title: 'Success',
    text: msg,
    icon: 'success',
    dangerMode: false,
    closeOnClickOutside: false,
  }).then((value) => {
    if(value) {
      location.reload();
    }
  });
}

// Danger
showErrorSwal = function(msg) {
  'use strict';
  swal({
    title: 'Error',
    text: msg,
    icon: 'error',
    dangerMode: true,
    closeOnClickOutside: false,
  })
}

// Info
showInfoSwal = function(msg) {
  'use strict';
  swal({
    title: 'Message',
    text: msg,
    icon: 'info',
    dangerMode: false,
    closeOnClickOutside: false,
  })
}
