<?php
include 'koneksi.php';
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE AlbumID='$id'");
while ($data = mysqli_fetch_array($sql)) {
    $foto = $data['Foto'];
    if (file_exists('assets/file/'.$foto)) {
        unlink('assets/file/' . $data['Foto']);
        mysqli_query($koneksi, "DELETE FROM album WHERE AlbumID='$id'");
        header("location:create.php");
    }
    mysqli_query($koneksi, "DELETE FROM album WHERE AlbumID='$id'");
    header("location:create.php");
}
