<?php 
include 'koneksi.php';

$id = $_GET['id'];
$user = $_GET['user'];
mysqli_query($koneksi, "DELETE FROM save WHERE FotoID=$id and UserID=$user");
header("Location: View.php?id=$id");
?>