<?php
/* Smarty version 3.1.36, created on 2021-05-21 23:55:12
  from 'C:\wamp64\www\camping\app\views\modules\orders\modal-add-item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a88eb086fcc4_50138771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '619049390b6d6fde34bb5eda23f55de46e12a591' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\orders\\modal-add-item.tpl',
      1 => 1621658949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a88eb086fcc4_50138771 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modal-add-item" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Filtros</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-6">
                            <label for="input-search">Busca</label>
                            <div class="input-group input-group-sm">
                                <input id="input-search-modal" type="text" name="table_search" class="form-control" placeholder="Filtrar por <?php echo $_smarty_tpl->tpl_vars['ref']->value['single'];?>
">

                                <div class="input-group-append">
                                    <button id="btn-search-modal"  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--CARD -->

                <form id="main-form" action="<?php echo site_url($_smarty_tpl->tpl_vars['pathMod']->value);?>
/submit" method="POST">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Listagem de <?php echo $_smarty_tpl->tpl_vars['ref']->value['plural'];?>
 <span id="total-results">(<?php echo $_smarty_tpl->tpl_vars['total_results']->value;?>
)</span></h3>
                            <div class="card-tools">

                                <div class="">
                                    <a class="btn btn-default" href="<?php echo site_url($_smarty_tpl->tpl_vars['pathMod']->value);?>
/form">
                                        <i class="fas fa-plus mr-2 text-success"></i>
                                        Novo
                                    </a>
                                    <button disabled type="submit" class="btn btn-default" name="action" value="form" id="btn-edit">
                                        <i class="fas fa-save mr-2 text-info"></i>
                                        Editar
                                    </button>
                                    <button disabled type="submit" class="btn btn-default open-modal-delete" name="action" value="delete" id="btn-delete">
                                        <i class="fas fa-trash mr-2 text-danger"></i>
                                        Deletar
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="card-body list-container">

                        </div>
                        <div class="card-footer pagination-container">
                            <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

                        </div>
                    </div> <!--CARD -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ok</button>
            </div>
        </div>
    </div>
</div><?php }
}
