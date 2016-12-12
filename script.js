function clearFormError(formId) {
   $('#' + formId).find('.form-group').removeClass('has-error');
}

function showFieldError(element) {
   $(element).parent().addClass('has-error');
}

function submitForm(formId) {
   clearFormError(formId);
   if(validateForm(formId)) {
      sendFormData(formId);
   }
}

function handleResponse(response)
{
   switch(response.error) {
      case 'ERROR': break;
      case 'SUCCESS': break;
   }
}

function sendFormData(formId) {
   $.ajax({
      method: "POST",
      url: "ajax.php",
      data: $('#' + formId).serialize()
   }).done(function(msg) {
      alert("Data Saved: " + msg);
   });
}

function validateForm(formId) {
   var validationSuccess = true;
   $('#' + formId + ' .form-control').each(function( index, element ) {
      if($(element).hasClass('validate-empty') && !_validateEmpty($(element).val())) {
         validationSuccess = false;
         showFieldError(element);
      }
      if($(element).hasClass('validate-email')) {
         validationError = true;
      }
      if($(element).hasClass('validate-phone')) {
         validationError = true;
      }
   });
   return validationSuccess;
}

function _validateEmail(value) {
   return true;
}

function _validatePhone(value) {
   return true;
}

function _validateEmpty(value) {
   return (value.length > 0);
}