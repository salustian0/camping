import Search from "./search.class.js";

//Instanciando e inicializando ações de busca e paginação
const search_default = new Search({
    required:{
        btn_search: '#mdl-list-btn-search',
        input_search: '#mdl-list-input-search',
        pagination_container: '#mdl-list-pagination-container',
        list_container: '#mdl-list-list-container',
        el_total_results: '#mdl-list-total-results',
        search_url: `${MODULE_URL}/search`
    }
});


const List = {};
//configuração padrão dos módulos de listagem
$(document).ready(function(){
    List.init();
});

List.init = function(){
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

