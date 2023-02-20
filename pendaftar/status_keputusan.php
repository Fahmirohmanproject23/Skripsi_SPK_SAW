<?php 
 
include '../aksilogin/config.php';
$id_pendaftar = $_POST['id_pendaftar'];
$status_dokumen = $_POST['status_dokumen'];

// $bobot = $_POST['bobot'];

mysqli_query($koneksi, "UPDATE tb_pendaftar SET  status_dokumen='$status_dokumen' WHERE id_pendaftar='$id_pendaftar'");
 
header("location:../calon.php?pesan=update");
 
?>