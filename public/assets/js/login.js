$(document).ready(function(){
    /* Validações login */
   $("#frm-login").validate({
       rules:{
           email: {
                required: true,
                email: true
           },
           password: {
               required: true,
               minlength: 6
           }
       },
       messages:{
           email: 'Verifique este campo',
           password: 'Verifique este campo'
       },
        errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
    }); 
});