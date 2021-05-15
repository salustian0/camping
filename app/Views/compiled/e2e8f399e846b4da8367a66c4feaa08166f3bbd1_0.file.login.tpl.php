<?php
/* Smarty version 3.1.36, created on 2021-05-07 20:33:12
  from 'C:\wamp64\www\camping\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6095ea5843d258_85727272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2e8f399e846b4da8367a66c4feaa08166f3bbd1' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\login.tpl',
      1 => 1620437591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6095ea5843d258_85727272 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo TITLE;?>
</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/fontawesome-free/css/all.min.css');?>
">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>
">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/dist/css/adminlte.min.css');?>
">
  <?php if ($_smarty_tpl->tpl_vars['active_toast']->value) {?>
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>
">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/toastr/toastr.min.css');?>
">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/style.css');?>
">
  
      
    <?php }?>
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url();?>
"><b><?php echo TITLE;?>
</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Acesso ao painel administrativo</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <!--
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
              -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login" value="true">Entrar</button>
          </div>
          <!-- /.col -->
        </div>

      </form>
      <!--
      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Esqueci minha senha</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/jquery/jquery.min.js');?>
"><?php echo '</script'; ?>
>
<!-- Bootstrap 4 -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js');?>
"><?php echo '</script'; ?>
>
<!-- AdminLTE App necessário para o funcionamento do template -->
<?php echo '<script'; ?>
 src="<?php echo site_url('assets/adminLTE/dist/js/adminlte.js');?>
"><?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['active_toast']->value) {?>
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
   <?php echo '</script'; ?>
>
 <?php }?>

 <?php echo '<script'; ?>
 src="<?php echo site_url('assets/js/main.js');?>
"><?php echo '</script'; ?>
>


</body>
</html>

<?php }
}
