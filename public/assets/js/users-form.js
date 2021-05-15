
$(document).ready(function(){
    let $name = $('[name="companions-name"]');
    let $type = $('[name="type"]');
    var ids =  typeof count_ids !== 'undefined' ? count_ids : 0;
    var addedConjuge = false;
    const registred_client_id = $("[name='id']").val();
    const $btn_add = $("#add-companions");
    var current_companion_id = 0;

    var resetBtnAdd = function(){
        $name.val("");
        $type.val("");
        $btn_add.children("span").text("Adicionar");
        $btn_add.removeAttr('data-target');
    }
    var addNewCompanion = function(id = null){
        //Comvertendo tipo para visualização ex C -> Conjugê A -> Acompanhante
        let type = types[$type.val()] !== 'undefined'  ? types[$type.val()] : null;

        ids++;
        let html = "<td class='name'><span>"+$name.val()+"</span><input type='hidden' name='companions[name][]' class='companions-name' value='"+$name.val()+"'></td>";
        html +=   "<td class='type'><span>"+type+"</span><input type='hidden' name='companions[type][]' class='companions-type' value='"+$type.val()+"'></td>";

        let database_id = id !== null ? 'data-database-id="'+id+'"' : "";

        html    +='<td class="text-right py-0 align-middle">';
        html    += '<div class="btn-group btn-group-sm">'
        html    += '<a '+database_id+' data-id="'+ids+'" href="#" class="btn btn-info edit-companions"><i class="fas fa-edit"></i></a>'
        html    += '<a '+database_id+' data-id="'+ids+'" href="#" class="btn btn-danger delete-companions"><i class="fas fa-trash"></i></a>'
        html    += '</div>';
        html    += '</td>';

        let $tr = $('<tr>',{
            html: html,
            "id": ids
        });

        $('table > tbody').append($tr);
        $name.val('');
        $type.val('');
    }

    $btn_add.click(function(e){
        e.preventDefault();

        //Verificando se ja foi registrado um conjuge -> permitido somente 1
        let hasConjuge = $('[name="companions[type][]"][value="C"]').length ? true : false;


        //Validação campos
        if($type.val() == "" || $name.val() == ""){
            toastr.error("É necessário informar o nome e tipo de acompanhante para continuar.");
            return;
        }


        //Comvertendo tipo para visualização ex C -> Conjugê A -> Acompanhante
        let type = types[$type.val()] !== 'undefined'  ? types[$type.val()] : null;

        //Validação tipo
        if(type == ""){
            toastr.error("Houve um erro durante a tentativa de registro de acompanhante, por favor tente novamente mais tarde");
            return;
        }


        //Editando somente na view -> registro de cliente
        if($btn_add.children('span').text() === 'Editar'){
            let id = $(this).data('target');

            if(registred_client_id) {
                if(current_companion_id === 0){
                    toastr.error("Houve um erro desconhecido, por favor tente novamente mais tarde.");
                    return;
                }
                if($(`#${id}`).find('.type > input').val() === "C" && $type.val() !== "C"){
                    toastr.error("Cônjugue já adicionado, você pode editar ou excluir mas não pode adicionar mais de 1");
                    return;
                }

                $.ajax({
                    url: `${MODULE_URL}/change_companions`,
                    dataType: 'json',
                    method: 'POST',
                    data: {c_id: current_companion_id, name: $name.val(), type: $type.val()},
                    success: function(resp){
                        if(resp != false){
                            $(`#${id}`).find('.type').children("[name='companions[type][]']").val($type.val()).siblings('span').text(type);
                            $(`#${id}`).find('.name').children("[name='companions[name][]']").val($name.val()).siblings('span').text($name.val());
                            resetBtnAdd();
                            toastr.success("Acompanhante atualizado com sucesso.");
                        }
                        else
                        {
                            alert("Houve um erro durante a tentativa de exclusão, por favor tente novamente mais tarde.");
                        }
                    }
                });
            }
            else
            {
                if($(`#${id}`).find('.type > input').val() === "C" && $type.val() !== "C"){
                    toastr.error("Cônjugue já adicionado, você pode editar ou excluir mas não pode adicionar mais de 1");
                    return;
                }

                $(`#${id}`).find('.type').children("[name='companions[type][]']").val($type.val()).siblings('span').text(type);
                $(`#${id}`).find('.name').children("[name='companions[name][]']").val($name.val()).siblings('span').text($name.val());

                resetBtnAdd();
                toastr.success("Acompanhante atualizado com sucesso.");
            }
            return;
        }

        if(registred_client_id){
            $.ajax({
               url: `${BASE_URL}/companions/register`,
               data:{type: $type.val(),name: $name.val(),idUserFk: registred_client_id},
                dataType: 'json',
                method:'POST',
                success: function(resp){
                   console.log(resp);
                    if(resp !== false){
                        toastr[resp.type](resp.message);
                        if(typeof  resp.id !== "undefined"){
                            addNewCompanion(resp.id);
                        }
                    }
                    else
                    {
                        alert("Houve um erro durante esta ação, por favor tente novamente mais tarde");
                    }
                }
            });
            return;
        }

        //Validação se já existe um conjugê adicionado -> registro de cliente
        if($type.val() === 'C'){
            if(hasConjuge){
                toastr.error("Cônjugue já adicionado, você pode editar ou excluir mas não pode adicionar mais de 1");
                return;
            }
        }

        toastr.success("Acompanhante adicionado.");
        addNewCompanion();
    });

    //Deletando acompanhante
    $('table > tbody').on('click', '.delete-companions',function(e){
        e.preventDefault();
        let id_database = $(this).data('databaseId');
        let id = $(this).data('id');

        if(typeof id_database !== 'undefined'){
            Main.f_action_delete = function(){
               $.ajax({
                   url: `${BASE_URL}/companions/delete`,
                   dataType: 'json',
                   method: 'POST',
                   data: {id: [id_database]},
                   success: function(resp){
                       if(resp != false){
                           toastr[resp.type](resp.message);
                           $(`#${id}`).remove();
                       }
                       else
                       {
                           alert("Houve um erro durante a tentativa de exclusão, por favor tente novamente mais tarde.");
                       }
                   }
               });
            }
            return;
        }

        $(`#${id}`).remove();
    });

    $('table > tbody').on('click', '.edit-companions',function(e){
        e.preventDefault();
        let id = $(this).data('id');

        let name = $(`#${id}`).find('.name > input').val();
        let type = $(`#${id}`).find('.type > input').val();

        $name.val(name);
        $type.val(type);

        if(registred_client_id)
        {
            current_companion_id = $(this).data('databaseId');
        }

        $btn_add.children("span").text("Editar");
        $btn_add.data('target',id);
    });



});
