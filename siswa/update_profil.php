<?php
include '../aksilogin/config.php';

$id_siswa = $_POST['id_siswa'];

$username = $_POST['username'];
$password = $_POST['password'];


mysqli_query($koneksi, "UPDATE tb_siswa SET username='$username', password='$password' WHERE id_siswa='$id_siswa'");
header("location:../profil_siswa.php?pesan=update")

?>