<?php

//Ambil Koneksi
include "koneksi.php";

//Perlindungan URL
if ( isset($_POST['simpan_form']) ) {
    
  //ambil data form
  $nama = $_POST['nama'];
  $keterangan = $_POST['keterangan'];
  $tgl_mulai = $_POST['tanggal_mulai'];
  $tgl_akhir = $_POST['tanggal_akhir'];
  $status_default = "Menunggu Konfirmasi";

  //Query Untuk Input Data Form
  $query = "INSERT INTO tb_cuti (nama, keterangan, tanggal_mulai, tanggal_akhir, status_pengajuan) VALUE ('$nama', '$keterangan', '$tgl_mulai', '$tgl_akhir', '$status_default')";

  //Eksekusi Queri
  $sql = mysqli_query($koneksi, $query);

  //Aksi berdasar status input
  if ($sql) {
    //Alihkan kehalaman ini jika berhasil
    header('Location: index.php?status=sukses');
  } else {
    //Alihkan kehalaman ini jika gagal
    header('Location: index.php?status=gagal');
  }
    
} else {
  header("Location: index.php");
}

?>