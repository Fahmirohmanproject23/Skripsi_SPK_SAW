<?php
include '../aksilogin/config.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'")or die(mysql_error());
 
header("location:../user.php?pesan=hapus");

?>