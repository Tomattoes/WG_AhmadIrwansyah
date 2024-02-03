<?php
include 'koneksi.php';

$user = $_POST['user'];
$tanggal = $_POST['tanggal'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$album = $_POST['album'];
$publish = $_POST['publish'];
$lokasi = 'assets/file/';

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'jfif');
$nama = $_FILES['foto']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
    if ($ukuran < 15000000 ) {
        move_uploaded_file($file_tmp, 'assets/file/' . $nama);
        $query = mysqli_query($koneksi, "INSERT INTO foto VALUES ('', '$judul', '$deskripsi', '$tanggal', '$lokasi', '$publish', '$album', '$user', '$nama')");
        echo "<script>alert('Berhasil Upload'); window.location='foto.php';</script>";
    } else {
        echo "<script>alert('Gagal Upload! Ukuran Foto Terlalu Besar'); window.location='UploadFoto.php';</script>";
    }
} else {
    echo "<script>alert('Ukuran file tidak sesuai'); window.location='UploadFoto.php';</script>";
}
