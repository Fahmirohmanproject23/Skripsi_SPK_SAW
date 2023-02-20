<?php
include '../aksilogin/config.php';

$id = $_POST['id'];

$username = $_POST['username'];
$password = $_POST['password'];


mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password' WHERE id='$id'");
header("location:../profil_admin.php?pesan=update")

?>