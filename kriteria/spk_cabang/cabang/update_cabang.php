<?php 
 
include '../aksilogin/config.php';
$id_tempat = $_POST['id_tempat'];
$nama_tempat = $_POST['nama_tempat'];
$alamat = $_POST['alamat'];


mysqli_query($koneksi,"UPDATE tb_tempat SET id_tempat='$id_tempat', nama_tempat='$nama_tempat', alamat='$alamat'  WHERE id_tempat='$id_tempat'");
 
header("location:../data_cabang.php?pesan=update");
?>