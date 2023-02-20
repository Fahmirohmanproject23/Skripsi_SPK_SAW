<?php 
 
include '../aksilogin/config.php';
$id_siswa = $_POST['id_siswa'];
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];



mysqli_query($koneksi,"UPDATE tb_siswa SET nis='$nis', nama_siswa='$nama_siswa', kelas='$kelas' WHERE id_siswa='$id_siswa'");
 
header("location:../data_siswa.php?pesan=update");
 
?>