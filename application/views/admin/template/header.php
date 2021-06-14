<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GIS SANGGAR SENI KOTA PEKALONGAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-navy navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url() ?>assets/index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('auth/logout') ?>" class="nav-link">Logout</a>
        </li>
      </ul>



      <!-- SEARCH FORM -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-navy elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>assets/index3.html" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/avatar.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $this->session->userdata('nama') ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <?php if (!$this->session->userdata('role_id')) { ?>
             <li class="nav-item">
              <a href="<?php echo base_url('pengelola') ?>" class="nav-link <?php echo $side == 'home' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('pengelola/kelolaSanggar') ?>" class="nav-link <?php echo $side == 'kelola' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-house-user"></i>
                <p>
                  Kelola Sanggar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('pengelola/kegiatan') ?>" class="nav-link <?php echo $side == 'kegiatan' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-skating"></i>
                <p>
                  Kelola Kegiatan
                </p>
              </a>
            </li>
             <li class="nav-item">
            <a href="<?php echo base_url('pengelola/ubahPassword') ?>" class="nav-link <?php echo $side == 'password' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ubah Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('auth/logout') ?>" class="nav-link <?php echo $side == '' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <?php }else{ ?>
           <li class="nav-item">
            <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php echo $side == 'home' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/kelolaPengajuan') ?>" class="nav-link <?php echo $side == 'pengajuan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kelola Pengajuan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/kelolaSanggar') ?>" class="nav-link <?php echo $side == 'sanggar' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kelola Sanggar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/kelolaKategori') ?>" class="nav-link <?php echo $side == 'kategori' ? 'active' : '' ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Kelola Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/laporan') ?>" class="nav-link <?php echo $side == 'laporan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cetak Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/ubahPassword') ?>" class="nav-link <?php echo $side == 'password' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Ubah Password
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dashboard/ubahPassword') ?>" class="nav-link <?php echo $side == '' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        <?php  } ?>
      </ul>
    </li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<div class="content-wrapper">