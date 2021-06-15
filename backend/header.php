<?php 
require("controller/config.php");
require("session_control.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="docs/assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="plugins/jquery/jquery.min.js"></script>
</head>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Istifadeci</span>
          <div class="dropdown-divider"></div>
          <a href="profil.php" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> Profil
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="cixis.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Cixis
           
          </a>
          
          
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="docs/assets/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="docs/assets/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin_username']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
                  <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Anasehife</p>
                  </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                 Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="seo_ayarlar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO Ayarlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="media_ayarlar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Media Ayarları</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logo_ayarlar.php
                " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo Ayarlari</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-blogger"></i>
              <p>
                 Yazilar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="yazilar_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yazi elave et</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="yazilar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yazilari goruntule</p>
                </a>
              </li>
            
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 Kateqoriler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kateqori_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kateqori elave et</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kateqori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kateqorileri goruntule</p>
                </a>
              </li>
            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="mesajlar.php" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                 Mesajlar
                 <?php
                    $mesajlar=$conn->prepare("SELECT * FROM mesajlar");
                    $mesajlar->execute();
                    $mesaj_say=$mesajlar->rowCount();
                   
                    $messaj=$conn->prepare("SELECT * FROM mesajlar WHERE mesaj_oxuma=?");
                    $messaj->execute(array(1));
                    $oxunmamis_say=$messaj->rowCount();
                   
                 ?>
            <span class="badge bg-primary right"><?php echo $mesaj_say-$oxunmamis_say; ?></span>              </p>
            </a>
          </li>
          




         
          
         
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- //address-card   sliders-h    th -->