<?php
/* Smarty version 3.1.36, created on 2021-05-12 01:03:30
  from 'C:\wamp64\www\camping\app\views\modules\\\category\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_609b6fb296bd13_16727148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '785deb6052770860d872728b277e7a720cfda44b' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\category\\list.tpl',
      1 => 1620798677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/sidebar.tpl' => 1,
    'file:elements/content-header.tpl' => 1,
    'file:modules/".((string)$_smarty_tpl->tpl_vars[\'pathMod\']->value)."/table.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_609b6fb296bd13_16727148 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:elements/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="content-wrapper"> <!--content-wrapper -->
<?php $_smarty_tpl->_subTemplateRender("file:elements/content-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid"> <!-- container-fluid -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title mr-2 mb-2"><i class="fas fa-list mr-2"></i>Filtros</h3>
        </div>
        <div class="card-body">
                <div class="form-group col-6">
                    <label for="input-search">Busca</label>
                    <div class="input-group input-group-sm">
                        <input id="input-search" type="text" name="table_search" class="form-control" placeholder="Filtrar por <?php echo $_smarty_tpl->tpl_vars['ref']->value['single'];?>
">

                        <div class="input-group-append">
                            <button id="btn-search"  type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                <!-- Renderização da tabela -->
                <?php if ($_smarty_tpl->tpl_vars['listing']->value && count($_smarty_tpl->tpl_vars['listing']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender("file:modules/".((string)$_smarty_tpl->tpl_vars['pathMod']->value)."/table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                  <?php } else { ?>
                  <div class='alert alert-info col-12 text-center'>Nenhum dado para ser mostrado.</div>
                <?php }?>
            </div>
            <div class="card-footer pagination-container">
                <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

            </div>
        </div> <!--CARD -->
    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->

<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
