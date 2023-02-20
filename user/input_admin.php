<?php 
 
include '../aksilogin/config.php';

$id_siswa = $_POST['id_siswa'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];



mysqli_query($koneksi, "INSERT INTO user VALUES('','$id_siswa','$username','$password','$level')");
header("location:../user.php?pesan=input");
 
?>

