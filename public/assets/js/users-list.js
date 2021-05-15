$(document).ready(function(){
    $(".companions-link").click(function(e){
        e.preventDefault();
        let current_action = $('#main-form').attr('action');
        $('#main-form').attr('action',current_action+"#companions-table");
        $(this).parent().parent().find('[name="id[]"]').prop('checked','checked');
        $('#btn-edit').removeAttr('disabled').trigger('click');
    });
});