<?php
include '../aksilogin/config.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];


mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', password='$password' WHERE id='$id'");
header("location:../user.php?pesan=update")

?>