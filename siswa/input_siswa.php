<?php 
 
include '../aksilogin/config.php';

$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$username = $_POST['username'];
$password = $_POST['password'];
$dokumen= $_POST['dokumen'];
$status_dokumen= $_POST['status_dokumen'];
// $bobot = $_POST['bobot'];


mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES('','$nis','$nama_siswa','$kelas','$username','$password','$dokumen','$status_dokumen')");
header("location:../data_siswa.php?pesan=input");
 
?>