const Table_add = {};
var id = 0;
var table_add_action = "add";
const $btn_add = $('.table-action-add');
var origin_inputs = [];
var clear_inputs = null;
var validate_inputs = null;
var current_id = 0;
var $current_add_button = null;

var inputs = {
    "#input-name" : "name[]",
    "#input-type" : "type[]",
    "[name='name']" : "names[]"
};



$(document).ready(function(){
    Table_add._create();
});

Table_add._create = function(){
    let $btn_edit = $('.table-action-edit');
    let $btn_remove = $('.table-action-remove');
    let $table_add = $('.table-add');

    clear_inputs = function(){
        for(let key in inputs){
            $(key).val('');
        }
    }
    validate_inputs = function(){
        if(origin_inputs.length){
            console.log(origin_inputs)
            for (let key in origin_inputs){
                let $input = origin_inputs[key];
                if($input.val() === ''){
                    return false;
                }
            }
        }
        return true
    }

    $btn_add.on("click", function(e){
        e.preventDefault();
        if(table_add_action === "add"){
            Table_add._add($(this));
        }else if(table_add_action === "edit"){
            Table_add._edit($(this));
        }
    });
    
    $(".table-add-container").on("click", function(){
       $current_add_button = $(this).find('.table-action-add');
    });
}
function create_row(){
    id++;
    let current_row = $('<tr>',{
        'id': id
    });

    for(let key in inputs){
        if(id === 1){
            origin_inputs.push($(key));
        }
        let input_origin = key;
        let input_name = inputs[key]

        let $td = $('<td>',{
            text: $(input_origin).val()
        });

        let input = $('<input>',{
            type: 'hidden',
            name: input_name,
            value: $(input_origin).val(),
            "data-origin-id": input_origin
        });


        current_row.append($td);
        current_row.append(input);
    }

    if(!validate_inputs()){
        toastr.error("Verifique todos os campos antes de coninuar.");
        return;
    }



    let $action_edit_icon = $("<i>",{
        class: "fas fa-edit"
    });
    let $action_delete_icon = $("<i>",{
        class: "fas fa-trash"
    });

    let $action_edit = $('<a>',{
        class: "btn btn-info table-action-edit",
        "data-target-id": `#${id}`
    });

    $action_edit.on("click",front_edit_action);
    $action_edit.append($action_edit_icon);

    let $action_delete = $('<a>',{
        class: "btn btn-danger table-action-delete",
        "data-target-id": `#${id}`
    });
    $action_delete.on("click",front_delete_action);

    $action_delete.append($action_delete_icon);

    let $div = $('<div>',{
        class: "btn-group btn-group-sm"
    });

    $div.append($action_edit);
    $div.append($action_delete);

    let $td_actions = $("<td>",{
        class: "text-right py-0 align-middle"
    });
    $td_actions.append($div);


    current_row.append($td_actions);

    return current_row;
}

const front_delete_action = function(e){
    e.preventDefault();
    let targetId = $(this).data('targetId');
    $(`${targetId}`).remove();

}
const front_edit_action = function(e){
    e.preventDefault();
    let targetId = $(this).data('targetId');
    let $input_value = $(`${targetId}`).find("input");

    $input_value.each(function(){
        let origin_id = $(this).data("originId");
        let $origin = $(`${origin_id}`);
        $origin.val($(this).val());
    });

    $current_add_button.children("i").removeClass("fa-plus").addClass("fa-edit");
    $current_add_button.children("span").text("Editar");
    table_add_action = "edit";
    current_id = targetId;
}

Table_add._add = function($el){
    let target_id = $el.data('tableTargetId');

    let $table = $(target_id);
    let $tbody = $table.find('tbody');


    let $tr = create_row();
    $tbody.append($tr);
    clear_inputs();
}

Table_add._remove = function(){

}

Table_add._edit = function(){
    if(current_id){
        let index = 0;
        for(let key in inputs){
            let $input_origin = $(key);

            let $input_target = $(current_id).find("[name='"+inputs[key]+"']");
            $(current_id).find("td").eq(index).text($input_origin.val());
            $input_target.val($input_origin.val());
            index++;
        }
        current_id = 0;
        table_add_action = "add";
        $current_add_button.children("i").removeClass("fa-edit").addClass("fa-plus");
        $current_add_button.children("span").text("Adicionar");
    }
    clear_inputs();
}

Table_add._remove = function(){

}

