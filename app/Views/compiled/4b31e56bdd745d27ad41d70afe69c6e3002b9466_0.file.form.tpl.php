<?php
/* Smarty version 3.1.36, created on 2021-05-10 23:44:59
  from 'C:\wamp64\www\camping\app\views\modules\\\companions\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_609a0bcb3ded59_61537267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b31e56bdd745d27ad41d70afe69c6e3002b9466' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\companions\\form.tpl',
      1 => 1620600603,
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
function content_609a0bcb3ded59_61537267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:elements/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:elements/sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="content-wrapper" style="padding: 30px">
<?php $_smarty_tpl->_subTemplateRender("file:elements/content-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div class="container-fluid">


<!-- form -->
<form action="<?php echo site_url($_smarty_tpl->tpl_vars['pathMod']->value);?>
/submit" method="POST">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
<div class="card">
  <div class="card-header">
  <i class="fas fa-tag mr-2"></i>
  <h3 class="card-title mr-2">Listagem de <?php echo $_smarty_tpl->tpl_vars['ref']->value['plural'];?>
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
  <div class="card card-primary" style="box-shadow: none">

  <div class="card-body">
  
    <div class="form-group col-6">
      <label for="name">Nome completo</label>
      <input name="name" type="text" id="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
    </div>
    <!--
    <div class="form-group col-6">
      <label for="email">Email</label>
      <input name="email" type="email" id="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
">
    </div>
    -->


      <div class="form-group col-6">
          <?php echo $_smarty_tpl->tpl_vars['slc_type']->value;?>

      </div>

  </div>
  <!-- /.card-body -->
</div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
</form>
<!--form -->




</div> <!-- container-fluid -->
</div> <!-- conent-wrapper -->

<?php $_smarty_tpl->_subTemplateRender("file:elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
