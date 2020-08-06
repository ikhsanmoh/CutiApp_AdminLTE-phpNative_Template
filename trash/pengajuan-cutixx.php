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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>App | Pengajuan Cuti</title>
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
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
          Login <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">
              Login Sebagai Admin
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
    <a href="index.php" class="brand-link">
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
          
          <li class="nav-header">Main Menu</li>
          <li class="nav-item">
            <a href="./index.php" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./pengajuan-cuti.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Pengajuan Cuti</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
