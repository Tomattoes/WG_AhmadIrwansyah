<?php 
include 'koneksi.php';

$id = $_POST['id'];
$user = $_POST['user'];
$komentar = $_POST['komentar'];
$tgl = date('Y-m-d');
mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES('', '$id', '$user', '$komentar', '$tgl')");
header("Location: View.php?id=$id");
?>