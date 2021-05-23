<?php
/* Smarty version 3.1.36, created on 2021-05-19 16:32:38
  from 'C:\wamp64\www\camping\app\views\elements\content-header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a583f638cc55_32606257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70b21d8458587050a38a1f18436af470d63facac' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\elements\\content-header.tpl',
      1 => 1621459902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a583f638cc55_32606257 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo ucfirst($_smarty_tpl->tpl_vars['ref']->value['plural']);?>
</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Painel</a></li>
              <li class="breadcrumb-item active"><?php echo $_smarty_tpl->tpl_vars['ref']->value['plural'];?>
</li>
                <?php if ($_smarty_tpl->tpl_vars['module_part']->value && $_smarty_tpl->tpl_vars['module_part']->value == "form") {?>
                <li class="breadcrumb-item active">form</li>
                <?php }?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

     <?php if ($_smarty_tpl->tpl_vars['creating_order']->value) {?>
        <div class="alert alert-info">
          Criação de pedido em andamento.
        </div>
    <?php }?>
    <!-- /.content-header --><?php }
}
