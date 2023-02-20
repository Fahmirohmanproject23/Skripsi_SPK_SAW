<?php 
 
include '../aksilogin/config.php';

	
$sql = mysqli_query($koneksi, "insert into tb_alternatif (nama_alternatif) values ('{$_POST['nama_alternatif']}')");
mysqli_query($sql) ;
//mencari id alternatif
$sql = mysqli_query($koneksi, "select max(id_alternatif) as id_alternatif from tb_alternatif limit 1");
($row = mysqli_fetch_array($sql));
$id_alternatif = $row['id_alternatif'];
//menyimpan data ke tabel nilai

$sql = mysqli_query($koneksi, "insert into tb_nilai(id_alternatif, kriteria1,kriteria2,kriteria3,kriteria4,kriteria5) values ('{$id_alternatif}','{$_POST['kriteria1']}','{$_POST['kriteria2']}','{$_POST['kriteria3']}','{$_POST['kriteria4']}','{$_POST['kriteria5']}')");
mysqli_query($sql);
header("location:../alternatif.php?pesan=input");
 
?>