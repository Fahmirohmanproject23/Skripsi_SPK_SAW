             
<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login2"){
  header("location:index.php");
}

$username = $_SESSION['username'];

$query = "SELECT * FROM tb_siswa WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        
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


<br>
<br>

                <div class="card-header">
                  <h4 class="card-title">Pengumuman</h4>
                </div>
                <div class="card">
                <div class="card-body">
                  Dari hasil perhitungan dengan metode SAW didapatkan hasil sebagai berikut :<br>
 <div class="card">
                <div class="card-body">
<div class="table-responsive">
                    <table id="basic-datatables" class="isplay table table-striped table-bordered table-hover" >

<thead><tr>
   
  <th>Nama</th>
  <th>Hasil</th> 
  <th>Ranking</th>  
  </tr>
</thead>
<?php 
include 'aksilogin/config.php';
$data = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_hasil_saw ON tb_alternatif.id_alternatif = tb_hasil_saw.id_alternatif ORDER BY hasil DESC LIMIT 10");
$lima = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_hasil_saw ON tb_alternatif.id_alternatif = tb_hasil_saw.id_alternatif ORDER BY hasil DESC LIMIT 5");

$nomor = 1;

$nama = "";
while($l = mysqli_fetch_array($lima)) {
  $nama .= $l['nama_alternatif'].", ";
}

while($h = mysqli_fetch_array($data)){
?>
<tr>

  <td><?php echo $h['nama_alternatif']; ?></td>
  <td><?php echo $h['hasil']; ?></td>
  <td><?php echo $nomor++; ?></td>
  </tr>
    <?php
}
?>
  </table>

<div class="text-success"><h4>Dari hasil diatas maka yang berhak menerima bantuan PIP di SD Negeri Kalisalak 03 adalah peringkat 5 terbaik, yaitu <?=$nama?><h4>
      
 </p>
</div>

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
