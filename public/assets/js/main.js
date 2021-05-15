
const Main = {};

$(document).ready(function(){
  Main._init();
  Main._delete();
  Main._menu();
});

Main._menu = function(){

  $.ajax({
    url: `${BASE_URL}/system/getActiveMenus`,
    method: 'post',
    dataType: 'json',
    success: function(resp){
      if(resp !== false){
        if(typeof resp.actives !== "undefined"){
          for(let key in resp.actives){
            let current_id = resp.actives[key];
            $(current_id).addClass("active");
          }
        }
        if(typeof resp.opened !== "undefined"){
          $(resp.opened).addClass("menu-is-opening menu-open");
        }
      }
    }
  })


  $(".nav-link").on("click",function(e){

    let actives = [];
    let data = {};

    actives.push("#"+$(this).attr('id'));
    let $parent = $(this).parent().parent().siblings('.nav-link');
    if($parent.length){
      actives.push("#"+$parent.attr('id'));
      data.opened = "#"+$parent.parent().attr('id');
    }

    data.actives = actives;

    $.ajax({
       url: `${BASE_URL}/system/setActiveMenus`,
       method: 'POST',
       data: data,
       dataType: 'json',

       success: function(resp){
        console.log(resp);
       }
     })
  });



}

//Verifica a sessão antes de realizar consultas
const verifySession = function(callback){
  $.ajax({
    url: `${BASE_URL}/system/verify_session`,
    dataType: 'json',
    success: function(resp){
        if(resp !== false){
          if(typeof resp.status !== "undefined"){
              let status = resp.status;
              if(status === false)
              {
                location.replace(`${BASE_URL}/logout`);
                return;
              }else
              {
                callback();
              }
          }
        }
    }
  });
}


Main.f_action_delete = function(){
  console.log("delete ...");
}

Main._delete = function(){

  const $modal_delete =  $('#modalDelete');
  if($modal_delete.length) {

    $('.open-modal-delete').on('click', function (e) {
      e.preventDefault();
      $modal_delete.modal('show');
    });

    $('#deleteInput').on('keyup', function () {
      if ($(this).val().toLowerCase() === "excluir") {
        $('#btn-action-delete').removeAttr('disabled');
      } else {
        $('#btn-action-delete').attr('disabled', true);
      }
    });

    $('#btn-action-delete').on('click', function (e) {
      $('#deleteInput').val('');
      $modal_delete.modal('hide');
      $('#btn-action-delete').attr('disabled',true);
       //Verificando sessão antes de realizar exclusão
        verifySession(Main.f_action_delete);
    });
  }
}




Main._init = function(){
  // verificando se as mensagens toasts estão ativas no módulo
  if(typeof active_toast !== undefined){
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $.ajax({
      url:`${BASE_URL}/system/get_toasts`,
      dataType: 'json',
      success: function(res){
        Object.keys(res).forEach(function(item){
          let type = res[item].type;
          let message = res[item].message;
          toastr[type](message)
        });
      },
      error: function(err){
        alert("Houve um problema na visualização do erro, por favor tente novamente mais tarde.");
      }
    })
  }
}


//alert('a');
/* Reference
$(document).ready(function(){

        $.validator.setDefaults({
          submitHandler: function () {
            alert( "Form successful submitted!" );
          }
        });
        $('#quickForm').validate({
          rules: {
            email: {
              required: true,
              email: true,
            },
            password: {
              required: true,
              minlength: 5
            },
            terms: {
              required: true
            },
          },
          messages: {
            email: {
              required: "Please enter a email address",
              email: "Please enter a vaild email address"
            },
            password: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            },
            terms: "Please accept our terms"
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
})
*/

