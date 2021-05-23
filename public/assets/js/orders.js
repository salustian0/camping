Orders = {};
$(document).ready(function(){
    Orders.init();
});

Orders.init = function(e){

    return;

    $modal_add_item = $('#modal-add-item');
    //Abrindo modal de adição de itens
    $('.add-item-action').on('click',function(e){
        e.preventDefault();
        let typeItem  = $(this).data('typeItem');
        let modalTitle = null;

        switch (typeItem){
            case 'users':
                search_url = `${MODULE_URL}/search_users`
                modalTitle = "Adicionar clientes";
                break;
            case 'products':
                search_url = `${MODULE_URL}/search_products`
                modalTitle = "Adicionar produtos";
                break;
            default:
                alert("Erro na ação, por favor tente novamente mais tarde.");
                return
                break;
        }

        $modal_add_item.find(".modal-title").text(modalTitle);
        $modal_add_item.modal('show');
    });
}