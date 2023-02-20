<?php 
include 'aksilogin/config.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        <?php
    if (isset($page_title)) {
        echo $page_title;
    } else {
        echo 'SPK Pemilihan Transportasi';
    }
    ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


 
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>



					<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
       
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                         <h4 class="text-center">Hasil Penilaian</h4><br><br>


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
   echo "
  </tr>
  </thead>
  <tbody>
  ";
 $no = 1;
 while ($dt = mysqli_fetch_array($sql)) {
 
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt['id_alternatif'])."</td>
   <td style='text-align:center;'>$dt[kriteria1]</td>
   <td style='text-align:center;'>$dt[kriteria2]</td>
   <td style='text-align:center;'>$dt[kriteria3]</td>
   <td style='text-align:center;'>$dt[kriteria4]</td>
   <td style='text-align:center;'>$dt[kriteria5]</td>

  
  
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
      min(kriteria5) as minK5,
 
      max(kriteria1) as maxK1,
      max(kriteria2) as maxK2,
      max(kriteria3) as maxK3,
      max(kriteria4) as maxK4,
      MAX(kriteria5) as maxK5
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
$k5 = "";


$qk = mysqli_query($koneksi, "SELECT * FROM kriteria");
while ($row = mysqli_fetch_array($qk)) {
    if ($row['atribute'] == "cost") {
      if ($row['id_kriteria'] == 1) {
        $k1 = "cost";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "cost";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "cost";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "cost";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "cost";
      }
    } else {
      if ($row['id_kriteria'] == 1) {
        $k1 = "benefit";
      } elseif ($row['id_kriteria'] == 2) {
        $k2 = "benefit";
      } elseif ($row['id_kriteria'] == 3) {
        $k3 = "benefit";
      } elseif ($row['id_kriteria'] == 4) {
        $k4 = "benefit";
      } elseif ($row['id_kriteria'] == 5) {
        $k5 = "benefit";
      }
    }
}


 $no = 1;
 while ($dt2 = mysqli_fetch_array($sql2)) {
  echo "<tr>
   <td style='text-align:center;'>$no</td>
   <td>".getNama($dt2['id_alternatif'])."</td>
   <td style='text-align:center;'>";
        if ($k1 == "cost") {
          echo round($atribut['minK1']/$dt2['kriteria1'],4);
        } else {
          echo round($dt2['kriteria1']/$atribut['maxK1'],4);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k2 == "cost") {
          echo round($atribut['minK2']/$dt2['kriteria2'],4);
        } else {
          echo round($dt2['kriteria2']/$atribut['maxK2'],4);
        }
   echo "</td>
   <td style='text-align:center;'>";
        if ($k3 == "cost") {
          echo round($atribut['minK3']/$dt2['kriteria3'],4);
        } else {
          echo round($dt2['kriteria3']/$atribut['maxK3'],4);
        }
   echo "</td>
      <td style='text-align:center;'>";
        if ($k4 == "cost") {
          echo round($atribut['minK4']/$dt2['kriteria4'],4);
        } else {
          echo round($dt2['kriteria4']/$atribut['maxK4'],4);
        }
   echo "</td>
      <td style='text-align:center;'>";
        if ($k5 == "cost") {
          echo round($atribut['minK5']/$dt2['kriteria5'],4);
        } else {
          echo round($dt2['kriteria5']/$atribut['maxK5'],4);
        }
   echo "</td>

  
  </tr>";
 $no++;
 }
 echo "</tbody></table>";


 //Proses perangkingan dengan rumus langkah 3
 $sql3 = mysqli_query($koneksi,"SELECT * FROM tb_nilai");

 //Buat tabel untuk menampilkan hasil
 echo "<H3>Perangkingan</H3>
 <table class='table table-bordered'>
  <tr>
   <td style='text-align:center;'>no</td>
   <td>Nama</td>
   <td style='text-align:center;'>Jumlah Perhitungan Metode SAW</td>
   <td style='text-align:center;'>ket</td>
  </tr>
  ";


$bobotArray = array('');

$qb = mysqli_query($koneksi,"SELECT * from kriteria");

while ($b = mysqli_fetch_array($qb)) {
  // $bobotArray = $bobot['bobot'];
  array_push($bobotArray, $b['bobot']);
}

while ($dt3 = mysqli_fetch_array($sql3)) {
  //$jumlah= ($dt3['kriteria1'])+($dt3['kriteria2'])+($dt3['kriteria3'])+($dt3['kriteria4']);

  $normalisasi1 = 0;
  $normalisasi2 = 0;
  $normalisasi3 = 0;
  $normalisasi4 = 0;
  $normalisasi5 = 0;

 

if ($k1 == "benefit") {
    $normalisasi1 = $dt3['kriteria1']/$atribut['maxK1'];
} else {
  $normalisasi1 = $atribut['minK1']/$dt3['kriteria1'];
} 
if ($k2 == "benefit") {
    $normalisasi2 = $dt3['kriteria2']/$atribut['maxK2'];
} else {
  $normalisasi2 = $atribut['minK2']/$dt3['kriteria2'];
}
if ($k3 == "benefit") {
    $normalisasi3 = $dt3['kriteria3']/$atribut['maxK3'];
} else {
  $normalisasi3 = $atribut['minK3']/$dt3['kriteria3'];
}
if ($k4 == "benefit") {
    $normalisasi4 = $dt3['kriteria4']/$atribut['maxK4'];
} else {
  $normalisasi4 = $atribut['minK4']/$dt3['kriteria4'];
}
if ($k5 == "benefit") {
    $normalisasi5 = $dt3['kriteria5']/$atribut['maxK5'];
} else {
  $normalisasi5 = $atribut['minK5']/$dt3['kriteria5'];
}






$poin= round(
   ($normalisasi1*$bobotArray[1])+
   ($normalisasi2*$bobotArray[2])+
   ($normalisasi3*$bobotArray[3])+
   ($normalisasi4*$bobotArray[4])+
   ($normalisasi5*$bobotArray[5]),2);
   
  //  $poin= round(
  //  (($dt3['kriteria1']/$atribut['minK1'])*$bobotArray[1])+
  //  (($dt3['kriteria2']/$atribut['minK2'])*$bobotArray[2])+
  //  (($dt3['kriteria3']/$atribut['maxK3'])*$bobotArray[3])+
  //  (($dt3['kriteria4']/$atribut['maxK4'])*$bobotArray[4]),3);

  $data[]=array('nama_alternatif'=>getNama($dt3['id_alternatif']),
      'poin'=>$poin);

 }

 //mengurutkan data
   foreach ($data as $key => $isi) {
    $nama[$key]=$isi['nama_alternatif'];
    
    $poin1[$key]=$isi['poin'];
   }
   array_multisort($poin1,SORT_DESC,$data);
   $no=1;
   $h="peringkat";
   $peringkat=1;
   $hr=1;

   foreach ($data as $item) { ?>
   <tr>
   <td style='text-align:center;'><?php echo $no ?></td>
   <td><?php echo$item['nama_alternatif'] ?></td>
   
   <td style='text-align:center;'><?php echo$item['poin'] ?></td>
   <td style='text-align:center;'><?php echo"$h $peringkat" ?></td>
   </tr>
   <?php
   $no++;
   if ($no>=100) {
    $h="  ";
    $peringkat=" ";
   }else{
    $peringkat++;
   }

   }
   echo "</table>";


?>

</div>
</div>
</div>
</div>
             </div>
              </div>
            </div>
          </div>
        </div>



<script>
    window.print();
  </script>








<?php
include './template/footer.php';
?>
