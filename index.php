<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Test</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <script>
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
         
         function sendFormData(formId) {
            $.ajax({
               method: "POST",
               url: "ajax.php",
               data: $('#' + formId).serialize()
            }).done(function( msg ) {
               alert( "Data Saved: " + msg );
            });
         }

         function validateForm(formId) {
            var validationError = false;
            $('#' + formId + ' .form-control').each(function( index, element ) {
               if($(element).hasClass('validate-empty') && !_validateEmpty($(element).val())) {
                  validationError = true;
                  showFieldError(element);
               }
               if($(element).hasClass('validate-email')) {
                  validationError = true;
               }
               if($(element).hasClass('validate-phone')) {
                  validationError = true;
               }
               console.log(validationError);
            });
            return validationError;
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
      </script>
   </head>
   <body>
      <div class="container">
         <h1>Hello, world!</h1>
         <div class="col-md-4">
            <form onsubmit="submitForm('frmFeedback'); return false;" id="frmFeedback">
               <div class="form-group">
                  <label for="inputName">Имя*</label>
                  <input name="name" type="text" class="form-control validate-empty" id="inputName" placeholder="Имя">
               </div>
               <div class="form-group">
                  <label for="inputPhone">Телефон*</label>
                  <input name="phone" type="text" class="form-control validate-empty validate-email" id="inputPhone" placeholder="Телефон">
               </div>
               <div class="form-group">
                  <label for="inputEmail">Email*</label>
                  <input name="email" type="text" class="form-control validate-empty validate-phone" id="inputEmail" placeholder="Email">
               </div>
               <div class="form-group">
                  <label for="inputComment">Комментарий</label>
                  <textarea name="comment" id="inputComment" class="form-control" rows="3" style="margin: 0 0 15px 0;"></textarea>
                  <button type="submit" class="btn btn-default">Отправить</button>
               </div>
            </form>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>