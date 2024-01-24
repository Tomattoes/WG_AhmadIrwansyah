<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$alamat = $_POST['alamat'];

$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password', '$email', '$nama', '$alamat')");
echo "<script>alert('Gagal Register'); window.location='sign-up.php';</script>";

