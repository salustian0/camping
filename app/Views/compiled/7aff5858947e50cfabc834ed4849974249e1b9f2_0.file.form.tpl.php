<?php
/* Smarty version 3.1.36, created on 2021-05-12 19:17:08
  from 'C:\wamp64\www\camping\app\views\modules\\\products\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_609c7004b01730_46251135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7aff5858947e50cfabc834ed4849974249e1b9f2' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\products\\form.tpl',
      1 => 1620865026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/header.tpl' => 1,
    'file:elements/sidebar.tpl' => 1,
    'file:elements/content-header.tpl' => 1,
    'file:elements/footer.tpl' => 1,
  ),
),false)) {
function content_609c7004b01730_46251135 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:elements/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="content-wrapper" style="padding: 30px"> <!--content-wrapper -->
<?php $_smarty_tpl->_subTemplateRender("file:elements/content-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('module_part'=>"form"), 0, false);
?>

<div class="container-fluid"> <!-- container-fluid -->
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
              <div class="row">
                  <div class="form-group col-6">
                    <label for="name">Nome</label>
                    <input placeholder="Barraca azul ..." name="name" type="text" id="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
                  </div>

                  <div class="form-group col-6">
                    <label for="price">Preço</label>
                    <input placeholder="R$:0,00" name="price" type="number" id="price" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
">
                  </div>

                  <div class="form-group col-4">
                    <label for="category">Categorias</label>
                    <?php echo $_smarty_tpl->tpl_vars['slc_category']->value;?>

                  </div>

                  <div class="form-group col-4">
                    <label for="active">Status</label>
                    <?php echo $_smarty_tpl->tpl_vars['slc_status']->value;?>

                  </div>

                  <div class="form-group col-4">
                    <label for="stock">Quantidade em estoque</label>
                    <input placeholder="Ex: 45" name="stock" type="number" id="stock" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['stock'];?>
">
                  </div>

                  <div class="form-group col-12">
                    <label for="description">Descrição</label>
                    <textarea name="description" placeholder="ex: Barraca de..." class="form-control" id="description" style="resize:none;height:300px"><?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
</textarea>
                  </div>


                </div>
            </div>
        </div> <!--CARD -->
    </form>

</div> <!-- /container-fluid -->

</div> <!-- /conent-wrapper -->
<?php echo '<script'; ?>
 class="text-javascript">
    const types = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['types']->value,true);?>
');
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
