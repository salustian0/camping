<?php
/* Smarty version 3.1.36, created on 2021-05-12 19:24:18
  from 'C:\wamp64\www\camping\app\views\modules\\\products\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_609c71b208e189_98125982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6399cfc8b6cce3f28b71b892f5759f76b19485b4' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\products\\table.tpl',
      1 => 1620865444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609c71b208e189_98125982 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-hover">
<thead>
  <tr>
  <th></th>
    <th>ID</th>
    <th>Nome</th>
    <th>Categorias</th>
    <th>Status</th>
    <th class="important-column">Quantidade em estoque</th>
    <th>Data de registro</th>
  </tr>
</thead>
<tbody class="table-body">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listing']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
  <tr <?php if ($_smarty_tpl->tpl_vars['v']->value['active'] === "L") {?>class="inactive"<?php }?>>
  <td class="align-middle">
    <input style="width:20px; height:20px" type="checkbox" class="form-control" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
  </td>
  <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
  <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
  <td class="align-middle">
    <?php if ($_smarty_tpl->tpl_vars['v']->value['category']) {?>
      <?php echo $_smarty_tpl->tpl_vars['v']->value['category'];?>

    <?php } else { ?>
      N/A
    <?php }?>
  </td>
    <td class="align-middle">
      <?php if ($_smarty_tpl->tpl_vars['v']->value['active'] === "Y") {?>
         Ativo
      <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['active'] === "L") {?>
        Inativo
      <?php }?>
    </td>
  <td class="important-column">
    <?php echo $_smarty_tpl->tpl_vars['v']->value['stock'];?>

  </td>
  <td class="align-middle">
    <?php echo $_smarty_tpl->tpl_vars['v']->value['dtRegister'];?>
</br>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['dtUpdate']) {?>
    <span class="small"><strong>Última atualização:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['dtUpdate'];?>
</span></br>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['lastAccess']) {?>
      <span class="small"><strong>Último acesso:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['lastAcess'];?>
</span>
      <?php }?>
  </td>
 </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table><?php }
}
