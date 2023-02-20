<?php 
 
include '../aksilogin/config.php';
$id_pendaftar = $_GET['id_pendaftar'];


// $bobot = $_POST['bobot'];

mysqli_query($koneksi, "UPDATE tb_pendaftar SET  status_dokumen='Diterima' WHERE id_pendaftar='$id_pendaftar'");
 
header("location:../calon.php?");
 
?>