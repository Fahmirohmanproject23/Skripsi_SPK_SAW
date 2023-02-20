<?php 
 
include '../aksilogin/config.php';

$nama_tempat = $_POST['nama_tempat'];
$alamat = $_POST['alamat'];




mysqli_query($koneksi, " INSERT INTO tb_tempat VALUES ('','$nama_tempat','$alamat')");
header("location:../data_cabang.php?pesan=input");
 
?>


