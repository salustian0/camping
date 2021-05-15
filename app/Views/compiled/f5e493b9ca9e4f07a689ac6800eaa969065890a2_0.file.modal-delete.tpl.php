<?php
/* Smarty version 3.1.36, created on 2021-05-09 17:50:07
  from 'C:\wamp64\www\camping\app\views\elements\modal-delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6098671fd605f4_02391759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5e493b9ca9e4f07a689ac6800eaa969065890a2' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\elements\\modal-delete.tpl',
      1 => 1620600606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6098671fd605f4_02391759 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDelete">Tem certeza que deseja excluir?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Para confirmar a exclusão do(s) item(ns) selecionados digite EXCLUIR, no campo abaixo.</p>

        <input type="text" class="form-control" id="deleteInput" autofocus>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button id="btn-action-delete" class="btn btn-danger text-white btn-modal-delete" type="submit" name="action" value="delete" disabled="true">
            <i class="fa fa-trash-o"></i> Deletar
        </button>
      </div>
    </div>
  </div>
</div><?php }
}
