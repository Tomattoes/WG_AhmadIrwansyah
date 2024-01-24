<?php 
include 'koneksi.php';

$id = $_GET['id'];
$user = $_GET['user'];
$tgl = date('Y-m-d');
mysqli_query($koneksi, "INSERT INTO save VALUES('', '$id', '$user', '$tgl')");
header("Location: View.php?id=$id");
?>