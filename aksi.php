<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$user = $_POST['user'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];

mysqli_query($koneksi, "INSERT INTO album VALUES('', '$nama', '$deskripsi', '$tanggal', '$user')");
echo "<script>alert('Berhasil Membuat Album'); window.location='create.php';</script>";



