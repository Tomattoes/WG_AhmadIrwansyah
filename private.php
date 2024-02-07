<?php 
include 'koneksi.php';

$id = $_GET['id'];
$user = $_GET['user'];
$tgl = date('Y-m-d');
mysqli_query($koneksi, "UPDATE foto SET Publish=0 WHERE FotoID='$id' and UserID='$user' ");
header("Location: ViewFoto.php?id=$id");
?>