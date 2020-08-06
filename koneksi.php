<?php

  $hostname = "localhost:3306";
  $username = "root";
  $pass = "";
  $dbname = "ujikom_tugas";

  $koneksi = new mysqli($hostname, $username, $pass, $dbname);

  if(!$koneksi){
    die("Gagal Terhubung Dengan Database : " . mysqli_connect_error());
  }

?>