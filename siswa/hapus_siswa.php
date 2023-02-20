<?php 
include '../aksilogin/config.php';
$id_siswa = $_GET['id_siswa'];
mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE id_siswa='$id_siswa'");
 
header("location:../data_siswa.php?pesan=hapus");
?>

