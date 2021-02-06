/**
 * Toast notifications
 */
showSuccessToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Success',
    text: msg,
    showHideTransition: 'fade',
    icon: 'success',
    loaderBg: '#f96868',
    position: 'bottom-right',
    hideAfter: 3000,
    allowToastClose: false,
  })
};

showWarningToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Warning',
    text: msg,
    showHideTransition: 'fade',
    icon: 'warning',
    loaderBg: '#57c7d4',
    position: 'bottom-right',
    hideAfter: 3000,
    allowToastClose: false,
  })
};

showErrorToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Error',
    text: msg,
    showHideTransition: 'fade',
    icon: 'error',
    loaderBg: '#f2a654',
    position: 'bottom-right',
    hideAfter: 3000,
    allowToastClose: false,
  })
};

showInfoToast = function(msg) {
  'use strict';
  $.toast({
    heading: 'Message',
    text: msg,
    showHideTransition: 'fade',
    icon: 'info',
    loaderBg: '#46c35f',
    position: 'bottom-right',
    hideAfter: 3000,
    allowToastClose: false,
  })
};

/**
 * Data checker if it has a valid input value.
 * @param {array} data 
 */
function data_checker(data) {
  for (var i=0; i < data.length; i++) {
    if (!data[i].value) {
      $.toast({
        heading           : 'Error',
        text              : 'All fields is required.',
        showHideTransition: 'fade',
        icon              : 'error',
        loaderBg          : '#f2a654',
        position          : 'bottom-right'
      });
      break;
    }
  }
  return true;
}

/**
 * Reset input icon
 */
function input_icon_reset() {
  $('input').each(function(){
    input_icon($(this));
  });
  $('select').each(function(){
    input_icon($(this));
  });
}

/**
 * Set icon color and size on event change
 * @param {obj} obj 
 */
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

/**
 * Capitalize First letter of the words
 * @param {string} str 
 * @param {bool} lower 
 */
const capitalize = (str, lower = false) => (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, match => match.toUpperCase()); 

/**
 * Remove whitespace inside letters
 * @param {string} str 
 */
const trim_whitespace = (str) => str.replace(/\s/g,''); 

/**
 * BASE URL
 */
const base_url = $('#base_url').val();
