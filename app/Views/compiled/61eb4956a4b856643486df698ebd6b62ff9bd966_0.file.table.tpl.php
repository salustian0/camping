<?php
/* Smarty version 3.1.36, created on 2021-05-17 23:30:01
  from 'C:\wamp64\www\camping\app\views\modules\\\orders\products\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a342c93fbde4_48880766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61eb4956a4b856643486df698ebd6b62ff9bd966' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\modules\\\\\\orders\\products\\table.tpl',
      1 => 1621312200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a342c93fbde4_48880766 (Smarty_Internal_Template $_smarty_tpl) {
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value['listing'], 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
  <tr <?php if ($_smarty_tpl->tpl_vars['v']->value['active'] === "L" || $_smarty_tpl->tpl_vars['v']->value['stock'] == 0) {?>class="inactive" style="cursor: no-drop"<?php }?>>
  <td class="align-middle">
    <?php if ($_smarty_tpl->tpl_vars['v']->value['active'] === "Y" && intval($_smarty_tpl->tpl_vars['v']->value['stock']) > 0) {?>
    <input style="width:20px; height:20px" type="checkbox" class="form-control" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
      <?php } else { ?>
      indisponível
    <?php }?>
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
    <?php if ($_smarty_tpl->tpl_vars['v']->value['active'] === "Y" && intval($_smarty_tpl->tpl_vars['v']->value['stock']) > 0) {?>
    <div class="form-group">
      <label>Quantidade (valor máximo:<?php echo $_smarty_tpl->tpl_vars['v']->value['stock'];?>
)</label>
      <input class="form-control" name="quantity[<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
]" id="quantity" type="number" data-max="<?php echo $_smarty_tpl->tpl_vars['v']->value['stock'];?>
" value="">
    </div>
    <?php } else { ?>
      <?php echo $_smarty_tpl->tpl_vars['v']->value['stock'];?>

    <?php }?>
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
