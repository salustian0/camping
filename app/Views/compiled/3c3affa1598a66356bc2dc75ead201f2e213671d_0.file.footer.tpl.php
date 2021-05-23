<?php
/* Smarty version 3.1.36, created on 2021-05-22 21:50:32
  from 'C:\wamp64\www\camping\app\views\elements\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a9c2f86aac08_94950772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c3affa1598a66356bc2dc75ead201f2e213671d' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\elements\\footer.tpl',
      1 => 1621738231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60a9c2f86aac08_94950772 (Smarty_Internal_Template $_smarty_tpl) {
?> <footer class="main-footer">
 <strong>Copyright &copy; 2021 <a href="<?php echo site_url();?>
"><?php echo COPYHIGHT;?>
</a>.</strong>
 All rights reserved.
 <div class="float-right d-none d-sm-inline-block">
   <b>Desenvolvido por</b> Renan Salustiano
 </div>
</footer>

<!-- Control Sidebar 
<aside class="control-sidebar control-sidebar-dark">
  Control sidebar content goes here 
</aside> 
 /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jquery/jquery.min.js');?>
"><?php echo '</script'; ?>
>
<!-- jQuery UI 1.11.4 -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jquery-ui/jquery-ui.min.js');?>
"><?php echo '</script'; ?>
>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<?php echo '<script'; ?>
>
$.widget.bridge('uibutton', $.ui.button)
<?php echo '</script'; ?>
>
<!-- Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js');?>
"><?php echo '</script'; ?>
>
<!-- ChartJS -->
<!--<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/chart.js/Chart.min.js');?>
"><?php echo '</script'; ?>
> -->
<!-- Sparkline -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/sparklines/sparkline.js');?>
"><?php echo '</script'; ?>
>


<!-- JQVMap -->
<!--<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jqvmap/jquery.vmap.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js');?>
"><?php echo '</script'; ?>
>-->


<!-- jQuery Knob Chart -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jquery-knob/jquery.knob.min.js');?>
"><?php echo '</script'; ?>
>
<!-- daterangepicker -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/moment/moment.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/daterangepicker/daterangepicker.js');?>
"><?php echo '</script'; ?>
>
<!-- Tempusdominus Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>
"><?php echo '</script'; ?>
>
<!-- Summernote -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/summernote/summernote-bs4.min.js');?>
"><?php echo '</script'; ?>
>
<!-- overlayScrollbars -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>
"><?php echo '</script'; ?>
>

<!-- AdminLTE App necessário para o funcionamento do template -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/dist/js/adminlte.js');?>
"><?php echo '</script'; ?>
>


<!-- AdminLTE for demo purposes -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/dist/js/demo.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jquery-validation/jquery.validate.min.js');?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jquery-validation/additional-methods.min.js');?>
"><?php echo '</script'; ?>
>

<!-- Carregando scripts personalizados -->
<?php if ($_smarty_tpl->tpl_vars['js']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['js']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
      <?php echo '<script'; ?>
 type="module" src='<?php echo site_url("assets/js/".((string)$_smarty_tpl->tpl_vars['v']->value));?>
'><?php echo '</script'; ?>
>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

 <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url('assets/adminLTE/plugins/sweetalert2/sweetalert2.min.js');?>
"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo site_url('assets/adminLTE/plugins/toastr/toastr.min.js');?>
"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
>
    const active_toast = true;
    const BASE_URL = '<?php echo site_url();?>
';
    <?php if ($_smarty_tpl->tpl_vars['MODULE_URL']->value) {?>
    const MODULE_URL = '<?php echo $_smarty_tpl->tpl_vars['MODULE_URL']->value;?>
';
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['link_ref']->value) {?>
        const link_ref = JSON.parse('<?php echo json_encode($_smarty_tpl->tpl_vars['link_ref']->value);?>
');
    <?php }?>

  <?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php ob_start();
echo time();
$_prefixVariable1=ob_get_clean();
echo site_url("assets/js/main.js#".$_prefixVariable1);?>
"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
