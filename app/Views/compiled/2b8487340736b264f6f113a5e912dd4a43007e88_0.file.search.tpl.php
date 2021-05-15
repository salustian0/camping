<?php
/* Smarty version 3.1.36, created on 2021-05-05 23:08:14
  from 'C:\wamp64\www\camping\app\views\modules\\settings\administrator\search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60936baeb3df93_68132311',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b8487340736b264f6f113a5e912dd4a43007e88' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\settings\\administrator\\search.tpl',
      1 => 1620271363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60936baeb3df93_68132311 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listing']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
    <tr>
      <td>
        <input style="width:20px; height:20px" type="checkbox" class="form-control" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
      </td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>  
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
      <td>
        <?php echo $_smarty_tpl->tpl_vars['v']->value['dtRegister'];?>
</br>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['dtUpdate']) {?>
        <span class="small"><strong>Última atualização:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['dtUpdate'];?>
</span>
        <?php }?>
      </td>
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
