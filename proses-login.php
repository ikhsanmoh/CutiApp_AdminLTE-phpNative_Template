<?php
  session_start();
  require_once("koneksi.php");

  //Ambil Data Login
  $username = $_POST['username'];
  $pass = $_POST['password'];
  
  //Query untuk ambil data dari tb_user
  $query = "SELECT * FROM tb_users WHERE email = '$username'";
  
  $sql = $koneksi->query($query);
  
  $data = $sql->fetch_assoc();
  
  if($sql->num_rows == 0) {
    header('location: login.php?status=email_err');
  } else {
    if($pass <> $data['pass']) {
      header('location: login.php?status=pass_err');
    } else {

      $_SESSION['username'] = $data['nama'];
      header('location: index.php');

    }
  }
?>