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
  $query = "DELETE FROM tb_cuti WHERE id = '$id'"; 

  //Eksekusi Query
  $sql = mysqli_query($koneksi, $query);

  if ($sql) {
    header('location: pengajuan-cuti.php?status=hapus_sukses');
  } else {
    header('location: pengajuan-cuti.php?status=hapus_gagal');
  }
?>