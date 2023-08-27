<?php
session_start();
require "../../lib/validation.php";
require "../../lib/user.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Itrax | Adminstrator</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="../../design/frontend/css/core.min.css" rel="stylesheet">
<!--    <link href="../../design/frontend/css/thesaas.min.css" rel="stylesheet">-->
    <link href="../../design/frontend/css/style.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../design/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../design/backend/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../../design/backend/plugins/summernote/summernote-bs4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../design/backend/index.php" class="brand-link">
      <img src="../../design/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">itrax</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../design/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['user']['name']?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../category/category.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../content/content.php" class="nav-link">
              <i class="nav-icon fas fa-pen-nib"></i>
              <p>
                Content
              </p>
            </a>
          </li>


            <li class="nav-item">
                <a href="../comment/comment.php" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Comment
                    </p>
                </a>
            </li>

            <li class="nav-header">Settings</li>

            <li class="nav-item">
                <a href="../setting/setting.php" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Setting
                    </p>
                </a>
            </li>

            <?php if ($_SESSION['is_admin']):?>
            <li class="nav-item">
                <a href="../user/user.php" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a href="../../logout.php" class="nav-link">
                    <i class="nav-icon fas fa-outdent"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
