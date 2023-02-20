<?php 
include '../aksilogin/config.php';
$id_tempat= $_GET['id_tempat'];
mysqli_query($koneksi,"DELETE FROM tb_tempat WHERE id_tempat='$id_tempat'");
 
header("location:../data_cabang.php?pesan=hapus");
?>

