<?php
$koneksi = mysqli_connect("localhost","root","","db_galery");
if (mysqli_connect_errno()) {
   echo "Koneksi Database Gagal! : " . mysqli_connect_error();
}
?>