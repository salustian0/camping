<?php
/* Smarty version 3.1.36, created on 2021-05-14 18:34:26
  from 'C:\wamp64\www\camping\app\views\elements\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_609f0902ce2209_12304628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a81daf2ea5e4d3452ad6ee79d2c95ca1f3b4ffad' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\elements\\sidebar.tpl',
      1 => 1621035266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_609f0902ce2209_12304628 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo site_url('assets/adminLTE/dist/img/AdminLTELogo.png');?>
" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo TITLE;?>
</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo site_url('assets/adminLTE/dist/img/user2-160x160.jpg');?>
" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php if ($_smarty_tpl->tpl_vars['menu']->value && count($_smarty_tpl->tpl_vars['menu']->value)) {?>
            
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
            <li class="nav-item" id="item-<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
              <a href="<?php echo site_url($_smarty_tpl->tpl_vars['v']->value['route']);?>
" class="nav-link" id="link-<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
                <i class="nav-icon fas <?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
"></i>
                <p>
                  <?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>

                </p>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['childs'] && count($_smarty_tpl->tpl_vars['v']->value['childs'])) {?>
                <i class="fas fa-angle-left right"></i>
                <?php }?>
              </a>
              <?php if ($_smarty_tpl->tpl_vars['v']->value['childs'] && count($_smarty_tpl->tpl_vars['v']->value['childs'])) {?>
                <ul class="nav nav-treeview">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['v']->value['childs'], 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                    <li class="nav-item" id="item-{$c.id}">
                        <a href="<?php echo site_url($_smarty_tpl->tpl_vars['c']->value['route']);?>
" class="nav-link" id="link-<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">
                          <i class="fas <?php echo $_smarty_tpl->tpl_vars['c']->value['icon'];?>
 nav-icon"></i>
                          <p><?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
</p>
                        </a>
                    </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>

              <?php }?>
            </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
          <?php }?>
          <li class="nav-item">
          <a href="<?php echo site_url('logout');?>
" class="nav-link"> 
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Sair
            </p>
          </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php }
}
