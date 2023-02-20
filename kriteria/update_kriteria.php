<?php 
 
include '../aksilogin/config.php';
$id= $_POST['id_kriteria'];

$nama_kriteria = $_POST['nama_kriteria'];


mysqli_query($koneksi, "UPDATE kriteria SET id_kriteria='$id', nama_kriteria='$nama_kriteria' WHERE id_kriteria='$id'");
 
header("location:../kriteria.php?pesan=update");
 
?>