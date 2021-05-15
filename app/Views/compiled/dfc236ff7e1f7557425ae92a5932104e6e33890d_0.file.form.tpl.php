<?php
/* Smarty version 3.1.36, created on 2021-05-08 12:49:58
  from 'C:\wamp64\www\camping\app\views\modules\\settings\administrator\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6096cf464c90b5_34197631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfc236ff7e1f7557425ae92a5932104e6e33890d' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\settings\\administrator\\form.tpl',
      1 => 1620496007,
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
function content_6096cf464c90b5_34197631 (Smarty_Internal_Template $_smarty_tpl) {
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
  
  <div class="row">
  <div class="col-8">
    <div class="form-group col-6">
      <label for="name">Nome completo</label>
      <input name="name" type="text" id="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
    </div>
    <div class="form-group col-6">
      <label for="email">Email</label>
      <input name="email" type="email" id="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
">
    </div>

      <div class="form-group col-6">
        <label for="password">Senha</label>
        <input name="password" type="password" id="password" class="form-control">
      </div>
      <div class="form-group col-6">
        <label for="cpassword">Confirmar senha</label>
        <input name="cpassword" type="password" id="cpassword" class="form-control">
      </div>
    </div>
    <div class="col-12 col-sm-4">
    <?php if ($_smarty_tpl->tpl_vars['list_modules']->value && count($_smarty_tpl->tpl_vars['list_modules']->value)) {?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list_modules']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
        <div class="form-group">
          <input type="checkbox" class="control-input" name="access[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['v']->value['checked'];?>
 >
          <i class="nav-icon fa <?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
"></i>
          <label class="control-label" for="">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>

          </label>

          <?php if ($_smarty_tpl->tpl_vars['v']->value['childs'] && count($_smarty_tpl->tpl_vars['v']->value['childs'])) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v']->value['childs'], 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
              <div class="form-group" style="margin-left:30px">
                <input type="checkbox" class="control-input" name="access[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['c']->value['checked'];?>
 >
                <i class="nav-icon fa <?php echo $_smarty_tpl->tpl_vars['c']->value['icon'];?>
"></i>
                <label class="control-label" for="">
                  <?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>

                </label>
              </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <?php }?> 
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
  </div>
   
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
