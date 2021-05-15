//By Renan Salustiano
const List = {};
let page = 1    ;

$(document).ready(function(){
    List._actions();
    List._search();
    List._pagination();
    List._delete();
});


List._pagination = function(){


    $default_link = $('.default-link');
    const max_page = (parseInt($('.pagination').data('maxPage')) -1 );
    
    //adicionando classe active ao link clicado
    $(".pagination-container").on("click",".default-link",function(e){
        e.preventDefault();
        $(".default-link").parent().removeClass("active");
        page = parseInt($(this).data('index'));
        if(page > 0 && !$('.previous-link').is('visible')){
            $('.previous-link').parent().show();
        }
        if(page < max_page && !$('.next-link').is('visible')){
            $('.next-link').parent().show();
        }
        $(this).parent().addClass('active');
        search();
    });

    $(".pagination-container").on("click",".next-link",function(e){
        e.preventDefault();
        if(page < max_page){
            page++;
            console.log(page * 4);
            $(".default-link").parent().removeClass('active');
            $(".default-link").eq(page).parent().addClass('active');
            $('.previous-link').removeAttr('disabled');
            if(page == max_page){
                $('.next-link').parent().hide();
            }
            $('.previous-link').parent().show();
        }
        search();

    });

    $('.pagination-container').on('click','.previous-link',function(e){
        e.preventDefault();
        if(page > 0){
            page--;
            $(".default-link").parent().removeClass('active');
            $(".default-link").eq(page).parent().addClass('active');
            $('.next-link').removeAttr('disabled');
            if(page == 0){
                $('.previous-link').parent().hide();
            }
            $('.next-link').parent().show();
        }
        search();

    });

}
List._search = function(){
    const $btn_search = $('#btn-search');
    const $input_search = $('#input-search');


    let allowed_new_toast =true;
    if($btn_search.length && $input_search.length){
        $btn_search.click(function(e){
            e.preventDefault();
            page = 0;
            search();
        });

        $input_search.on("keyup", function(){
            if($(this).val() == ""){
                search();
            }
        });
        $input_search.on('keydown',function(e){
            if(e.key == "Enter"){
                page = 0;
                search();
            }
        });
        
         search  = function(){
             //verificando se o administrador esta logado
             verifySession(function(){
                 let search_text = $input_search.val().trim();
                 $('#btn-delete').attr('disabled',true)
                 $('#btn-edit').attr('disabled',true);

                 $.ajax({
                     method: "POST",
                     url: `${MODULE_URL}/search`,
                     dataType: 'json',
                     data: {'search': search_text,'page': page},
                     success: function(resp){
                         if(resp !== false){

                             if(typeof resp.table !== "undefined"){
                                 $('.list-container').html(resp.table);
                             }
                             if(typeof resp.pagination != "undefined"){
                                 $('.pagination-container').html(resp.pagination);
                             }
                             if(typeof resp.total_results != "undefined"){
                                 $('#total-results').html(`(${resp.total_results})`);
                             }

                         }else
                         {
                             $('.table-body').html("");
                             $('.pagination-container').html("");
                             $('.list-container').html("<div class='alert alert-info col-12 text-center'>Nenhum dado para ser mostrado.</div>");
                             $('#total-results').html("(0)");

                             toastr.options.onHidden = function(){
                                 allowed_new_toast = true;
                             }

                             if(allowed_new_toast){
                                 toastr.error("Nenhum registro encontrado para a pesquisa em questão.");
                                 allowed_new_toast = false;
                             }
                         }
                     },
                     error: function(err){
                         console.log(err);
                         alert("Houve um erro durante a tentativa de pesquisa, por favor tente novamente mais tarde.");
                     }
                 });
             });
        }
    }
  }

List._actions = function(){

    $('[name="id[]"]').prop('checked', false);

    $('.list-container').on('click','[name="id[]"]',function(e){
        //e.preventDefault();
        let checked_ids_count = $('[name="id[]"]:checked').length;

        /* Botão editar */
        if(checked_ids_count != 1){
            if(!$('#btn-edit').attr('disabled')){
                $('#btn-edit').attr('disabled',true);
            }
        }else
        {
            $('#btn-edit').removeAttr('disabled');
        }
        /* Botão editar */

        /* Botão excluir */

        if(checked_ids_count > 0){
            if($('#btn-delete').attr('disabled')){
                $('#btn-delete').removeAttr('disabled');
            }
        }else{
            $('#btn-delete').attr('disabled',true)
        }

        /* Botão excluir */

    });
    
}
List._delete = function(){

    Main.f_action_delete = function(){
        let ids = [];
        $('[name="id[]"]:checked').each(function(el){
            ids.push($(this).val());
        });


        $.ajax({
            url: `${MODULE_URL}/delete`,
            data: {'id' : ids},
            method: 'POST',
            dataType: 'json',
            success: function(resp){
                if(resp != false){
                    toastr[resp.type](resp.message);
                    page = 0;
                    search();
                }
                else
                {
                    alert("Houve um erro durante a tentativa de exclusão, por favor tente novamente mais tarde.");
                }
            }
        });
    }

  }


