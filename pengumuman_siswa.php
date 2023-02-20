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


  

<?php
include './template/header.php';
?>

<?php
include './template/navbar.php';
?>

  <?php $page='pengumuman_siswa';
include './template/sidebar_siswa.php';
?>

   <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
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
<a href="cetak_perhitungan_siswa.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>


    <?php
include './template_siswa/footer.php';
?>