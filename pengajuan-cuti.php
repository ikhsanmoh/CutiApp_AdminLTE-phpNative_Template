<?php

  if ( !isset($_SESSION) ) {
    session_start();
  }

  //Ampil Koneksi
  include "koneksi.php";

  //Query Untuk Mengambil Data Pengajuan Cuti
  $query = "SELECT * FROM tb_cuti";

  //Eksekusi Query
  $sql = mysqli_query($koneksi, $query);

  //Var untuk Penomoran Tabel
  $no = 1;
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Cuti App | Pengajuan Cuti</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Login -->
      <li class="nav-item dropdown">
        <?php if ( isset($_SESSION['username']) ) { ?>

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <?php echo $_SESSION['username'] ?> <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">
              Logout
          </a>
        </div>
        
        <?php } else { ?>

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          User <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">
              Login
          </a>
        </div>
        <?php } ?>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Cuti App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">

          <?php if ( isset( $_SESSION['username'] ) ) { ?> 
            <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
          <?php } else { ?>
            <a href="#" class="d-block">Karyawan</a>
          <?php } ?>

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Main Menu</li>
          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./pengajuan-cuti.php" class="nav-link active">
              <i class="nav-icon fas fa-file"></i>
              <p>Pengajuan Cuti</p>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengajuan Cuti</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                
                <div class="row">
                  <?php if ( isset( $_SESSION['username'] ) ) { ?>
                    
                    <div class="col-sm-6">
                      <h3 class="card-title">Daftar Pengajuan Cuti</h3>
                    </div>
                  
                  <?php } else { ?>
      
                    <div class="col-sm-6">
                      <h3 class="card-title">Histori Pengajuan Cuti</h3>
                    </div>
      
                  <?php } ?>

                  <?php if ( !isset( $_SESSION['username'] ) ) { ?>
                    
                    <div class="col-sm-6 text-right">
                      <a href="./form-pengajuan-cuti.php" class="btn btn-primary" role="button" title="Tambah Data">Ajukan Cuti</a> <br>
                    </div>
                  
                  <?php } ?>
                </div>
    
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Lengkap</th>
                      <th>Keterangan</th>
                      <th>Tanggal Mulai Cuti</th>
                      <th>Tanggal Akhir Cuti</th>
                      <th>Status</th>
    
                      <?php if ( isset( $_SESSION['username'] ) ) { ?> 
    
                        <th>Aksi</th>
    
                      <?php } ?>
                    
                    </tr>
                  </thead>
                  <tbody>
    
                  <?php while ( $data = mysqli_fetch_assoc($sql) ) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['keterangan']; ?></td>
                      <td><?php echo $data['tanggal_mulai']; ?></td>
                      <td><?php echo $data['tanggal_akhir']; ?></td>
                      <td>
    
                        <?php if ($data['status_pengajuan'] == "Diterima") { ?>
                          
                          <button style="pointer-events: none;" class="btn btn-sm btn-success">
                            <?php echo $data['status_pengajuan']; ?>
                          </button>
    
                        <?php } elseif ($data['status_pengajuan'] == "Ditolak") { ?>
                      
                          <button style="pointer-events: none;" class="btn btn-sm btn-danger">
                            <?php echo $data['status_pengajuan']; ?>
                          </button>
                        
                        <?php } else { ?>
    
                          <button style="pointer-events: none;" class="btn btn-sm btn-secondary">
                            <?php echo $data['status_pengajuan']; ?>
                          </button>
    
                        <?php } ?>
    
                      </td>
      
                      <?php if ( isset( $_SESSION['username'] ) ) { ?> 
    
                        <td>
                          <a href="terima-permintaan-cuti.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm" role="button" title="Terima Permintaan">Terima</a> | 
                          <a href="tolak-permintaan-cuti.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" role="button" title="Tolak Permintaan">Tolak</a> | 
                          <a href="hapus-permintaan-cuti.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm" role="button" title="Hapus Permintaan">Hapus</a>
                        </td>
                      
                      <?php } ?>
                    
                    </tr>
                  <?php } ?>
    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
