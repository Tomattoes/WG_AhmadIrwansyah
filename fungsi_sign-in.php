<?php
include 'koneksi.php';
session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE Email='$email' AND Password='$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);
    $_SESSION['UserID'] = $data['UserID'];
    $_SESSION['Email'] = $data['Email'];
    $_SESSION['Username'] = $data['Username'];
    echo "<script>alert('Berhasil Login'); window.location='home.php';</script>";
} else {
    echo "<script>alert('Gagal Login! Email atau Password tidak sesuai'); window.location='sign-in.php';</script>";
}
