<?php 
include 'koneksi.php';

$user = $_POST['UserID'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "UPDATE user SET Username='$username', Email='$email', NamaLengkap='$nama', Alamat='$alamat' WHERE UserID='$user'");
echo "<script>alert('Profile berhasil diperbarui!'); window.location='editProfile.php';</script>";
?>