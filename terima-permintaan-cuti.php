<?php

  require_once("koneksi.php");
  
  if ( !isset($_SESSION) ) {
    session_start();
  }
  
  if ( !isset( $_SESSION['username'] ) && isset( $_GET['id'] ) ) {
    header('location: index.php');
  }
  
  $id = $_GET['id'];

  //Query Update
  $query = "UPDATE tb_cuti SET status_pengajuan = 'Diterima' WHERE id = '$id'"; 

  //Eksekusi Query
  $sql = mysqli_query($koneksi, $query);

  if ($sql) {
    header('location: pengajuan-cuti.php?status=update_sukses');
  } else {
    header('location: pengajuan-cuti.php?status=update_gagal');
  }
?>