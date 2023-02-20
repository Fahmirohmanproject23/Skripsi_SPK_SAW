<?php 
 
include '../aksilogin/config.php';
$id_pendaftar = $_POST['id_pendaftar'];
$status_dokumen = $_POST['id_pendaftar'];


// $bobot = $_POST['bobot'];

$id_pendaftar = $_GET['id_pendaftar'];

$i = mysqli_query($koneksi, "SELECT * FROM tb_pendaftar WHERE id_pendaftar='$id_pendaftar'");

mysqli_query($koneksi, "UPDATE tb_pendaftar SET  status_dokumen='$status_dokumen' WHERE id_pendaftar='$id_pendaftar'");



 
header("location:../data_pendaftar.php?");
 
?>