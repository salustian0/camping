<?php
/* Smarty version 3.1.36, created on 2021-05-17 22:31:43
  from 'C:\wamp64\www\camping\app\views\modules\\\orders\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a3351f11c779_37891914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6376e5877bfc165461c9d45f429bac440afa64ed' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\orders\\form.tpl',
      1 => 1621308701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/sidebar.tpl' => 1,
    'file:elements/content-header.tpl' => 1,
    'file:modules/".((string)$_smarty_tpl->tpl_vars[\'pathMod\']->value)."/products/table.tpl' => 1,
    'file:modules/".((string)$_smarty_tpl->tpl_vars[\'pathMod\']->value)."/users/table.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_60a3351f11c779_37891914 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:elements/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="content-wrapper" style="padding: 30px"> <!--content-wrapper -->
<?php $_smarty_tpl->_subTemplateRender("file:elements/content-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('module_part'=>"form"), 0, false);
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
    <form action="<?php echo site_url($_smarty_tpl->tpl_vars['pathMod']->value);?>
/submit" method="POST">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
        <div class="card">
            <div class="card-header">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['id']) {?><i class="float-left fas fa-edit mr-2"></i><?php } else { ?><i class="float-left fas fa-address-book fa-lg mr-2"></i><?php }?>
                <h3 class="card-title mr-2"><?php if ($_smarty_tpl->tpl_vars['data']->value['id']) {?>Edição<?php } else { ?>Registro<?php }?> de <?php echo $_smarty_tpl->tpl_vars['ref']->value['plural'];?>
</h3>
                <div class="float-right">
                    <a class="btn btn-info mr-2" href="<?php echo site_url($_smarty_tpl->tpl_vars['pathMod']->value);?>
">
                      <i class="fas fa-undo mr-2"></i>
                      Voltar
                    </a>
                    <button type="submit" class="btn btn-success" name="action" value="save">
                    <i class="fas fa-save mr-2"></i>
                      Salvar
                    </button>
                 </div>
            </div>
            <div class="card-body">
                  <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item ">
                    <a data-pag-cont-target="#pagination-products" class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#products-tab" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Produtos</a>
                  </li>
                  <li class="nav-item">
                    <a data-pag-cont-target="#pagination-users" class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#users-tab" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="true">Clientes</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="products-tab" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                      <?php $_smarty_tpl->_subTemplateRender("file:modules/".((string)$_smarty_tpl->tpl_vars['pathMod']->value)."/products/table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                  </div>
                  <div class="tab-pane fade" id="users-tab" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                      <?php $_smarty_tpl->_subTemplateRender("file:modules/".((string)$_smarty_tpl->tpl_vars['pathMod']->value)."/users/table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
            </div>
            <div class="card-footer pagination-container">
                <div class="pagination_" id="pagination-products">
                     <?php echo $_smarty_tpl->tpl_vars['products']->value['pagination'];?>

                </div>
                <div style="display:none" class="pagination_" id="pagination-users">
                     <?php echo $_smarty_tpl->tpl_vars['users']->value['pagination'];?>

                </div>
            </div>
        </div> <!--CARD -->


    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->
<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
