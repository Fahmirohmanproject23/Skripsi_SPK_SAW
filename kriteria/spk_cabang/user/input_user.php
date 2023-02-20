<?php 
 
include '../aksilogin/config.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
// $bobot = $_POST['bobot'];


mysqli_query($koneksi, "INSERT INTO user VALUES('','$nama','$username','$password','level')");
header("location:../user.php?pesan=input");
 
?>