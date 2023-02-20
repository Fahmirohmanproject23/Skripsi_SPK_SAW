<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
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
                  <h4 class="card-title">Data Siswa</h4>
                </div>
                <div class="card">
                <div class="card-body">
                  
                  
                    <table  class="isplay table table-striped table-bordered table-hover" >
<?php 
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == "input"){
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di tambah.</div>';
  }else if($pesan == "update"){
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di update.</div>';
  }else if($pesan == "hapus"){
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di hapus.</div>';
  }
}
?>
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th>
                            <th style='text-align:center;'>Kelas</th>
                            <th style='text-align:center;'>Status</th>
                                                
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $query_mysqli = mysqli_query($koneksi, "SELECT * FROM tb_siswa")or die(mysqli_error());
                        $nomor = 1;
                        while($data = mysqli_fetch_array($query_mysqli))
                        { 
                      ?>
                          <tr>
                          <td><?php echo $nomor++; ?></td>
                          <td><?php echo $data['nis']; ?></td>
                          <td><?php echo $data['nama_siswa']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kelas']; ?></td>
                          
                        <td><?php 
                          if 
                          ($data['status_dokumen'] == 'Menunggu pengecekan dokumen') {
                                    echo '<a class="badge badge-secondary"> <div class="text-white"><i class="
                          fas fa-info-circle"> Menunggu pengecekan dokument</i></div></a>';
                                  } elseif($data['status_dokumen'] == 'Diterima'){
                                    echo '<a class="badge badge-success"> <div class="text-white"><i class="far fa-check-square"> Diterima</i></div></a> Silahkan';
                                  } elseif($data['status_dokumen'] == 'Ditolak'){
                                    echo '<a class="badge badge-danger"> <div class="text-white"><i class="far fa-window-close"> Ditolak</i></div></a>';
                                  } elseif($data['status_dokumen'] == 'Sudah input nilai'){
                                    echo '<a class="badge badge-warning"> <div class="text-white"><i class="far fa-window-close"> Diterima dan Sudah input nilai</i></div></a>';
                               
                                  } elseif($data['status_dokumen'] == 'Diterima dan sudah input'){
                                    echo '<a class="badge badge-primary"> <div class="text-white"><i class="far fa-window-close">Diterima dan sudah input nilai</i></div></a>';
                                  } 
                          ?> 

                       

                         </tr>
                      <?php } ?>
                      </tbody>  
                    </table>
   






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
