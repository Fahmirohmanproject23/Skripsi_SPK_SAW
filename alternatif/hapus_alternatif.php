<?php 
include '../aksilogin/config.php';
	
$id_alternatif = (int) $_GET['id'];
if($id_alternatif){
    //delete data alternatif terlebih dahulu
    mysqli_query($koneksi, "delete from tb_alternatif where id_alternatif='{$id_alternatif}'");
    //delte data nilai
    mysqli_query($koneksi, "delete from tb_nilai where id_alternatif='{$id_alternatif}'");
}

header("location:../alternatif.php?pesan=hapus");
?>