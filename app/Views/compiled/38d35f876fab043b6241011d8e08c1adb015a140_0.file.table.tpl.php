<?php
/* Smarty version 3.1.36, created on 2021-05-21 23:29:59
  from 'C:\wamp64\www\camping\app\views\modules\\\orders\users\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a888c74f89a6_20042002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38d35f876fab043b6241011d8e08c1adb015a140' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\orders\\users\\table.tpl',
      1 => 1621657777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a888c74f89a6_20042002 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-hover">
<thead>
  <tr>
  <th></th>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
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
  
  <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</br>
  <span class="small"><strong>Documento:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['docNumber'];?>
</span>
  </td>

  <td class="align-middle"><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
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
