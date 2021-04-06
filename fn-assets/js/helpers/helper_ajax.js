'use strict';

var ajaxOptions  = {
  dataType: 'json',
  success: showSuccessResponse,
  error: function(response) {
    console.log(response.responseText);
  }
}

var validateOptions = {
  errorElement: 'small',
  errorClass: 'text-danger',
  errorPlacement: function(error, element) {
    error.appendTo(element.parent('.input-group').next('.input-helper'));
  },
  submitHandler: function(form){
    $(form).ajaxSubmit(ajaxOptions);
  }
}

function showSuccessResponse(response) {
  console.log(response);
  switch (response.msg) {
    case 'success':
      showSuccessSwal('Data successfully ' + response.data);
      break;
    case 'exist':
      showWarningSwal(response.data + ' already exist.');
      break;
    case 'file-error':
      showErrorSwal('File upload error. Try again!');
      break;
    default:
      break;
  }
}
