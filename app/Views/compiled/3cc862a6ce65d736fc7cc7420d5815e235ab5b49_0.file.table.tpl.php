<?php
/* Smarty version 3.1.36, created on 2021-05-16 23:59:14
  from 'C:\wamp64\www\camping\app\views\modules\\\orders\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a1f82230b125_10238815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cc862a6ce65d736fc7cc7420d5815e235ab5b49' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\orders\\table.tpl',
      1 => 1621227552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a1f82230b125_10238815 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-hover">
<thead>
  <tr>
  <th></th>
    <th>ID</th>
    <th>Responsável</th>
    <th>Total de pessoas</th>
    <th>Total de produtos</th>
    <th>Valor total</th>
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
  <tr>
  <td class="align-middle">
    <input style="width:20px; height:20px" type="checkbox" class="form-control" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
  </td>
  <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
  <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['user'];?>
</td>
    <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['count_users'];?>
</td>
    <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['count_product'];?>
</td>
    <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['total_price'];?>
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
