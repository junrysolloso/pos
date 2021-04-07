/**
 * Reset input icon
 */
resetInputIcon = function () {
  $('input').each(function(){
    addInputIcon($(this));
  });
  $('select').each(function(){
    addInputIcon($(this));
  });
}

/**
 * Set icon color
 */
addInputIcon = function (obj) {
  obj.each(function () {
    if ((obj.val()).length > 0) {
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
 * Check input values
 */
checkData = function (data) {
  var flag = true, j, i;

  for (i=0; i < data.length; i++) {
    if ( ! data[i].value ) {
      flag = false;
    } else {
      for (j = 0; j < data[i].length; j++) {
        if ( ! data[i][j].length ) {
          flag = false;
        }
      }
    }
  }

  if ( ! flag ) {
    showWarningSwal('Please provide a valid data.')
    resetInputIcon();
    return false;
  } else {
    return true;
  }
}

/**
 * Capitalize first letter
 */
const capitalize = (str, lower = false) => (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, match => match.toUpperCase()); 

/**
 * Remove space on words
 */
const trimWhitespace = (str) => str.replace(/\s/g,'');

/**
 * Base url
 */
const base_url = $('input#base_url').val();
