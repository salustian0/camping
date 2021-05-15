<?php
/* Smarty version 3.1.36, created on 2021-05-08 16:09:20
  from 'C:\wamp64\www\camping\app\views\modules\\\companions\modal-select-user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6096fe00dcc733_43278236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc42f296fce9ba709a2b7612c81fe11672dcb6dc' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\companions\\modal-select-user.tpl',
      1 => 1620508148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6096fe00dcc733_43278236 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modalSelectUser" class="modal fade" id="modal-xl" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            
            <div class="card" style="box-shadow:none">
            <div class="card-header">
             
            <div>
            </div>
          
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 500px;">
          
          
                  <input id="input-search" type="text" name="table_search" class="form-control" placeholder="Filtrar por <?php echo $_smarty_tpl->tpl_vars['ref']->value['single'];?>
">
          
                  <div class="input-group-append">
                    <button id="btn-search"  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
          
                </div>
              </div>
          
            </div>
            
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 list-container">

            </div>
            <!-- /.card-body -->
          </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div><?php }
}
