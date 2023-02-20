<?php 
 
include '../aksilogin/config.php';

$id_siswa = $_POST['id_siswa'];
mysqli_query($koneksi, "UPDATE tb_siswa SET  status_dokumen='Diterima dan sudah input' WHERE id_siswa='$id_siswa'");

$cr = mysqli_query($koneksi, "SELECT 
      min(kriteria1) as minK1, 
      min(kriteria2) as minK2,
      min(kriteria3) as minK3,
      min(kriteria4) as minK4,
  

      max(kriteria1) as maxK1,
      max(kriteria2) as maxK2,
      max(kriteria3) as maxK3,
      max(kriteria4) as maxK4



   FROM tb_nilai");
 $atribut = mysqli_fetch_array($cr);



 //$kriteria = mysql_query("SELECT (atribute) as atr  FROM kriteria")
 
 //Hitung Normalisasi tiap Elemen
 $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
$qkriteria = mysqli_query($koneksi, "SELECT * from kriteria");
 



									$kriteria = array();
                                    $kq = mysqli_query($koneksi, "SELECT * from kriteria");
                                    while ($k = mysqli_fetch_array($kq)) {
                                      array_push($kriteria, $k['atribute']);
                                    }

$matrik1="$kriteria[0]"; if ($matrik1 == 'benefit' ) {
                            echo $matrik1 = ($_POST['kriteria1']/$atribut['maxK1']);
                          } else {
                            echo $matrik1=($atribut['minK1']/$_POST['kriteria1']);
}

$matrik2="$kriteria[1]"; if ($matrik2 == 'benefit' ) {
                            echo $matrik2 = ($_POST['kriteria2']/$atribut['maxK2']);
                          } else {
                            echo $matrik2=($atribut['minK2']/$_POST['kriteria2']);
}

$matrik3="$kriteria[2]"; if ($matrik3 == 'benefit' ) {
                            echo $matrik3 = ($_POST['kriteria3']/$atribut['maxK3']);
                          } else {
                            echo $matrik3=($atribut['minK3']/$_POST['kriteria3']);
}

$matrik4="$kriteria[3]"; if ($matrik4 == 'benefit' ) {
                            echo $matrik4 = ($_POST['kriteria4']/$atribut['maxK4']);
                          } else {
                            echo $matrik4=($atribut['minK4']/$_POST['kriteria4']);
}




$bobothasil = array();
$b = mysqli_query($koneksi, "SELECT * from kriteria");
while ($bt = mysqli_fetch_array($b)) {
array_push($bobothasil, $bt['bobot']);
}

$hasilK1 = round(
   ($matrik1*$bobothasil[0])+
   ($matrik2*$bobothasil[1])+
   ($matrik3*$bobothasil[2])+
   ($matrik4*$bobothasil[3]),2);







	
$sql11 = mysqli_query($koneksi, "insert into tb_alternatif (id_siswa, nama_alternatif) values ('{$_POST['id_siswa']}','{$_POST['nama_alternatif']}')");
mysqli_query($sql11) ;
//mencari id alternatif
$sql = mysqli_query($koneksi, "select max(id_alternatif) as id_alternatif from tb_alternatif limit 1");
($row = mysqli_fetch_array($sql));
$id_alternatif = $row['id_alternatif'];




$sql = mysqli_query($koneksi, "insert into tb_nilai
  (id_alternatif,id_siswa,kriteria1,kriteria2,kriteria3,kriteria4) 
  values ('{$id_alternatif}','{$_POST['id_siswa']}','{$_POST['kriteria1']}',
  '{$_POST['kriteria2']}','{$_POST['kriteria3']}','{$_POST['kriteria4']}')");
mysqli_query($sql);


//menyimpan data ke tabel nilai

$sql3 = mysqli_query($koneksi, "insert into tb_matrik( id_siswa,kriteria1,kriteria2,kriteria3,kriteria4) values ('{$_POST['id_siswa']}','$matrik1','$matrik2','$matrik3','$matrik4')");

 mysqli_query($sql3);




$sql5 = mysqli_query($koneksi, "insert into tb_hasil_saw(id_siswa,id_alternatif,hasil) values ('{$_POST['id_siswa']}','$id_alternatif','$hasilK1')");

 mysqli_query($sql5);




// $bobot = $_POST['bobot'];


 




header("location:../alternatif.php?pesan=input");
 
?>