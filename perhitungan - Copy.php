<?php
 // Koneksi
include 'aksilogin/config.php';
// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
?>

<?php $page = 'perhitungan'; include './template/header.php';
?>      


<?php
include './template/navbar.php';
?>

<?php
$page = 'perhitungan'; include './template/sidebar.php';
?>

      <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
                <div class="card-header" >
                  <h4 class="card-title">Data Perhitungan</h4>
                </div>
                <div class="card">
                <div class="card-body" >
<?php
// $bobot = array(0.30,0.20,0.30,0.20);



 //Buat fungsi tampilkan nama
 function getNama($id){
  include 'aksilogin/config.php';
  $q =mysqli_query($koneksi, "SELECT * FROm tb_alternatif where id_alternatif = '$id'");
  $d = mysqli_fetch_array($q);
  return $d['nama_alternatif'];
 }
 
 //Setelah bobot terbuat select semua di tabel Matrik


 $qkriteria = mysqli_query($koneksi, "SELECT * from kriteria");

 $sql = mysqli_query($koneksi,"SELECT * FROM tb_nilai");
 //Buat tabel untuk menampilkan hasil
 echo "<H3>Matrik Awal</H3>
 <table class='table table-bordered table-striped' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";

   while ($qk = mysqli_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$qk['nama_kriteria']."</td>";
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
   echo "<td style='text-align:center;'>jumlah poin</td>
  </tr>
  </thead>
  <tbody>
  ";
 $no = 1;
 while ($dt = mysqli_fetch_array($sql)) {
  $jumlah= ($dt['kriteria1'])+($dt['kriteria2'])+($dt['kriteria3'])+($dt['kriteria4']);
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt['id_alternatif'])."</td>
   <td style='text-align:center;'>$dt[kriteria1]</td>
   <td style='text-align:center;'>$dt[kriteria2]</td>
   <td style='text-align:center;'>$dt[kriteria3]</td>
   <td style='text-align:center;'>$dt[kriteria4]</td>
   <td style='text-align:center;'>$jumlah</td>
  </tr>";
 $no++;
 }
 echo "</tbody></table>";

 //Lakukan Normalisasi dengan rumus pada langkah 2
 //Cari Max atau min dari tiap kolom Matrik
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
 echo "<br><H3>Matrik Normalisasi</H3>
 <table class='table table-bordered' >
 <thead>
  <tr>
   <td style='text-align:center;'>No</td>
   <td>Nama</td>";

   while ($k = mysqli_fetch_array($qkriteria)) {
     echo "<td style='text-align:center;'>".$k['nama_kriteria']."</td>";
    // var_dump($k['nama_kriteria']);
   }
   // <td style='text-align:center;'>C1</td>
   // <td style='text-align:center;'>C2</td>
   // <td style='text-align:center;'>C3</td>
   // <td style='text-align:center;'>C4</td>
  echo "</tr>
  </thead>
  <tbody>
  ";

$k1 = "";
$k2 = "";
$k3 = "";
$k4 = "";



$qk = mysqli_query($koneksi, "SELECT * FROM kriteria");
while ($row = mysqli_fetch_array($qk)) {
    if ($row['atribute'] == "benefit") {
    if ($row['id_kriteria'] == 1) {
        $k1 = "benefit";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "benefit";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "benefit";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "benefit";
      }  
    } else {
      if ($row['id_kriteria'] == 1) {
        $k1 = "cost";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "cost";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "cost";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "cost";
      } 
  }  
}

 $no = 1;
 while ($dt2 = mysqli_fetch_array($sql2)) {
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt2['id_alternatif'])."</td>
   <td style='text-align:center;'>";
        if ($k1 == "benefit") {
          echo round($dt2['kriteria1']/$atribut['maxK1'],2);
        } else {
          echo round($atribut['minK1']/$dt2['kriteria1'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k2 == "benefit") {
          echo round($dt2['kriteria2']/$atribut['maxK2'],2);
        } else {
          echo round($atribut['minK2']/$dt2['kriteria2'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k3 == "benefit") {
          echo round($dt2['kriteria3']/$atribut['maxK3'],2);
        } else {
          echo round($atribut['minK3']/$dt2['kriteria3'],2);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k4 == "benefit") {
          echo round($dt2['kriteria4']/$atribut['maxK4'],2);
        } else {
          echo round($atribut['minK4']/$dt2['kriteria4'],2);
        }
   echo "</td>

  </tr>";
 $no++;
 }
 echo "</tbody></table>";


 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysqli_query($koneksi,"SELECT * FROM tb_nilai");

 //Buat tabel untuk menampilkan hasil
?>
<h3>Perankingan :</h3>
<div class="table-responsive">
                    <table class="isplay table table-striped table-bordered table-hover" >

<thead><tr>
  
  <th class="text-center">Nama</th>
  <th class="text-center">Hasil</th> 
  <th class="text-center">Ranking</th>  
  </tr>
</thead>
<?php 
include 'aksilogin/config.php';
$data = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_hasil_saw ON tb_alternatif.id_alternatif = tb_hasil_saw.id_alternatif ORDER BY hasil DESC LIMIT 10");
$lima = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_hasil_saw ON tb_alternatif.id_alternatif = tb_hasil_saw.id_alternatif ORDER BY hasil DESC LIMIT 5");
// var_dump($data); die;
$nomor = 1;

$nama = "";
while($l = mysqli_fetch_array($lima)) {
  $nama .= $l['nama_alternatif'].", ";
}

while($h = mysqli_fetch_array($data)){
?>
<tr>
  
  <td><?php echo $h['nama_alternatif']; ?></td>
  <td class="text-center"><?php echo $h['hasil']; ?></td>
  <td class="text-center"><?php echo $nomor++; ?></td>
  </tr>
    <?php
}
?>
  </table>

Dari hasil diatas maka yang berhak didanai dalam bantuan PIP adalah peringkat 5 terbaik, yaitu <?=$nama?>
      
 </p>
</div>

<a href="cetak_perhitungan.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak Hasil</i></a>
 </div>
  </div>
   </div>
    </div>
      </div>
<?php
include './template/footer.php';
?>