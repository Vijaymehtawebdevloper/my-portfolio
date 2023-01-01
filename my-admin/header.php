<?php
  include "php-files/config.php";
  session_start();
    if(!session_id()){ session_start(); }
    if(!isset($_SESSION['admin_name'])) {
        header("location:{$base_url}/my-admin");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css"> 
  <link rel="stylesheet" href="css/bootstrap.css"> 
  <style>
      .active{
          background-color: red;
      }
      #ul li{
        margin-top: 5px;
        border-radius: 5px;
      }
      #ul li a{
        font-weight: 500;
      }
      #ul li:hover{
        background-color: #878080;
        
      }
      #ul li:hover a{
        color: #fff;
      }
      .dropdown-menu li a{
        text-decoration: none;
        color: #605f5f;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
  $db = new database;
  $db->select('banner','*',null, null, null, null);
  $result = $db->getResult();
  if(count($result) > 0){
    $number = 0;
    foreach($result as $row){
      
    }
  }
?>
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../image/img/<?php echo $row ['logo']?>" alt="AdminLTELogo" height="60" width="60">
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
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
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
        </div>
      </li>
        <!-- user admin dropdown -->
      <div class="btn-group">
        <div class="btn btn-danger dropdown-toggle" role="button"  data-bs-toggle="dropdown" area-expanded="false" data-bs-display="static">
          <i class="far fa-bell"></i>
        </div>
        <ul class="dropdown-menu dropdown-menu-end " >
          <li class="dropdown-item"><a href="logout.php">Logout</a></li>
          <li class="dropdown-item"><a href="">Change password</a></li>
          <li class="dropdown-item"><a href="">Logout</a></li>
          <li class="dropdown-item"><a href="">Logout</a></li>
        </ul>
      </div>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../image/img/<?php echo $row ['logo']?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <?php
      $db = new database;
      $db->select('about','*',null, null, null, null);
      $result = $db->getResult();
      if(count($result) > 0){
        foreach($result as $row){
          
        }
      }
    ?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../image/img/<?php echo $row ['profile']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"><?php echo $row ['name']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" id="ul">
          <li <?php if(basename($_SERVER['PHP_SELF']) == ("home.php")) echo 'class="active"'; ?>><a class="nav-link" href="home.php">Home-banner</a></li>
          <li <?php if(basename($_SERVER['PHP_SELF']) == "about-section.php") echo 'class="active"'; ?>><a class="nav-link" href="about-section.php">About us</a></li>
          <li <?php if(basename($_SERVER['PHP_SELF']) == "skill-section.php") echo 'class="active"'; ?>><a class="nav-link" href="skill-section.php">My skill</a></li>
          <li <?php if(basename($_SERVER['PHP_SELF']) == "service.php") echo 'class="active"'; ?>><a class="nav-link" href="service.php">My service</a></li>
          <li <?php if(basename($_SERVER['PHP_SELF']) == "register.php") echo 'class="active"'; ?>><a class="nav-link" href="register.php">Register form</a></li>
          <li <?php if(basename($_SERVER['PHP_SELF']) == "user.php") echo 'class="active"'; ?>><a class="nav-link" href="user.php">User Detail</a></li>
          
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    
