<?php
include 'koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
while ($data = mysqli_fetch_array($sql)) {
    $foto = $data['Foto'];
    if (file_exists('assets/file/' . $foto)) {
        unlink('assets/file/' . $foto);
        mysqli_query($koneksi, "DELETE FROM foto WHERE FotoID='$id'");
        header("location:create.php");
    }
    mysqli_query($koneksi, "DELETE FROM foto WHERE FotoID='$id'");
    header("location:create.php");
}
