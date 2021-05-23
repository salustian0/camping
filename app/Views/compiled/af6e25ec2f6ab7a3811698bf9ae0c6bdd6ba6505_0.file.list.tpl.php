<?php
/* Smarty version 3.1.36, created on 2021-05-21 22:13:00
  from 'C:\wamp64\www\camping\app\views\modules\\settings\users\users_orders\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a876bc160305_89364088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af6e25ec2f6ab7a3811698bf9ae0c6bdd6ba6505' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\settings\\users\\users_orders\\list.tpl',
      1 => 1621652659,
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
function content_60a876bc160305_89364088 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <button disabled type="submit" class="btn btn-default" name="action" value="register_users_orders">
                            <i class="fas fa-plus mr-2 text-success"></i>
                            Adicionar
                        </button>
                     </div>

                </div>
            </div>
            <div class="card-body list-container">
                <!-- Renderização da tabela -->
                <?php $_smarty_tpl->_subTemplateRender("file:modules/".((string)$_smarty_tpl->tpl_vars['pathMod']->value)."/table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
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
