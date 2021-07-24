<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin PT.Berkah</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets_admin/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets_admin/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          
        </form>
        <ul class="navbar-nav navbar-right">
        
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url() ?>assets_admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Admin</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('dashboard/home') ?>">PT.BERKAH</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">St</a>
          </div>
          <ul class="sidebar-menu">

              <li class="menu-header">Dashboard</li>
                <li class=""><a class="nav-link" href="<?= base_url('dashboard/home') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              </li>

              <li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Produk</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/produk') ?>">Data Produk</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/tambah-produk') ?>">Tambah Produk</a></li>
                 
                </ul>
              </li>

               <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Member</span></a>
                <ul class="dropdown-menu">

                   <li><a class="nav-link" href="<?= base_url('dashboard/member') ?>">Data Member</a></li>

                  <li><a class="nav-link" href="<?= base_url('dashboard/tambah-member') ?>">Tambah Member</a></li>
                 
                   <li><a class="nav-link" href="<?= base_url('dashboard/seting-member') ?>">Seting Member</a></li>
                    
                </ul>
              </li>

               <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Ecash</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/total-ecash') ?>">Total Ecash</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/seting-ecash') ?>">Seting Ecash</a></li>
                    
                </ul>
              </li>

               <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Admin</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('dashboard/admin') ?>">Data Admin</a></li>
                  <li><a class="nav-link" href="<?= base_url('dashboard/tambah-admin') ?>">Tambah Admin</a></li>
                    
                </ul>
              </li>


              <!-- <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->




              
            </ul>

           
        </aside>
      </div>
