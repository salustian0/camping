<?php
/* Smarty version 3.1.36, created on 2021-05-19 16:30:14
  from 'C:\wamp64\www\camping\app\views\elements\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60a58366d0fad9_42033770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '291c7e52dcc4b9aee23de5c808550244bbe2bed7' => 
    array (
      0 => 'C:\\wamp64\\www\\camping\\app\\views\\elements\\header.tpl',
      1 => 1621459803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:elements/modal-delete.tpl' => 1,
  ),
),false)) {
function content_60a58366d0fad9_42033770 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
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
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>
">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>
">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/jqvmap/jqvmap.min.css');?>
">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/dist/css/adminlte.min.css');?>
">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>
">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/daterangepicker/daterangepicker.css');?>
">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo site_url('assets/adminLTE/plugins/summernote/summernote-bs4.min.css');?>
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo site_url('assets/adminLTE/dist/img/AdminLTELogo.png');?>
" alt="AdminLTELogo" height="60" width="60">
  </div>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>

       <!-- <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>  -->
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo site_url('assets/adminLTE/dist/img/user1-128x128.jpg');?>
" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo site_url('assets/adminLTE/dist/img/user8-128x128.jpg');?>
" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo site_url('assets/adminLTE/dist/img/user3-128x128.jpg');?>
" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- botão tela cheia
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
      <!-- botão personalize painel 
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      -->

    </ul>
  </nav>
  <!-- /.navbar -->
  
  <!-- Modal delete-->
  <?php $_smarty_tpl->_subTemplateRender("file:elements/modal-delete.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
