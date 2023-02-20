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
                  <h4 class="card-title">Sub Kriteria </h4>
                </div>
                <div class="card">
                <div class="card-body">
                  
                    <h4><a class="btn btn-primary btn-sm" href="tambah_subkriteria.php?id_kriteria=<?php echo $_GET['id_kriteria']; ?>">+ Tambah data</a></h4> 
                  
                  <div class="table-responsive">
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
?>                                <table id="basic-datatables" class="isplay table table-striped table-bordered table-hover" >
                      <thead>
                        <tr>
                            <th style='text-align:center;'>No</th>
                            
                            <th style='text-align:center;'>Nama Sub kriteria</th>
                            <th style='text-align:center;'>nilai</th>
                            <th style='text-align:center;'>Keterangan</th>
                            <th style='text-align:center;'>Opsi</th>
                                                  
                        </tr>
                      </thead>
                      <tbody>
                    
                      <?php
                      include 'aksilogin/config.php';
                        $id_kriteria = $_GET['id_kriteria'];
                        $data = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='$id_kriteria'")or die(mysqli_error());
                        $nomor = 1;
                        while($d = mysqli_fetch_array($data))
                        { 
                      ?>

                    
                          <tr>
                          <td style='text-align:center;'><?php echo $nomor++; ?></td>
                          <td><?php echo $d['nama_subkriteria']; ?></td>
                          <td style='text-align:center;'><?php echo $d['nilai']; ?></td>
                          <td style='text-align:center;'><?php echo $d['keterangan']; ?></td>
                         
                          <td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_subkriteria.php?id_sub=<?php echo $d['id_sub']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./sub_kriteria/hapus_subkriteria.php?id_sub=<?php echo $d['id_sub'];?>&id_kriteria=<?php echo $d['id_kriteria'];?>"><i class="far fa-window-close"> Hapus</i></a></td>
                          
                    
                         </tr>
                      <?php } ?>
                      </tbody>  
                    </table>

                  </div>
                </div>


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
