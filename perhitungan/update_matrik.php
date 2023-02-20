<?php 
 
include '../aksilogin/config.php';
if($_POST){// jika tombol update ditekan
    //update data di tabel product

    $sql = mysqli_query($koneksi, "select max(id_alternatif) as id_alternatif from tb_nilai limit 1");
($row = mysqli_fetch_array($sql));
$id_alternatif = $row['id_alternatif'];

$sql1 = mysqli_query($koneksi, "select max(id_nilai) as id_nilai from tb_nilai limit 1");
($row = mysqli_fetch_array($sql1));
$id_nilai = $row['id_nilai'];



    //update data di tabel buku
    $sql2 = mysqli_query($koneksi,"update tb_matrik set id_nilai='{$_POST['id_nilai']}', id_alternatif='{$_POST['id_alternatif']}', kriteria1='{$_POST['kriteria1']}',kriteria2='{$_POST['kriteria2']}',
    kriteria3='{$_POST['kriteria3']}',kriteria4='{$_POST['kriteria4']}',kriteria5='{$_POST['kriteria5']}' where id_alternatif='{$_POST['id_alternatif']}'");
    mysqli_query($sql2);
    echo "Data telah di edit";
}

header("location:../alternatif.php?pesan=update");
 
?>