<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>

<?php include  './template/header.php';
?>

<?php
include './template/navbar.php';
?>
<?php
$page = 'halaman_siswa'; include './template/sidebar_siswa.php';
?>

      
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-secondary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                                      
                <h2 class="text-white pb-2 fw-bold">Home</h2>
                <h5 class="text-white op-7 mb-2" >Selamat Datang <i><?php echo $_SESSION['username']; ?></i> di SPK Beasiswa SMA YPI DARUSSALAM dengan Metode SAW          
              </div>
            
            
            </div>
          </div>
        </div>

        
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
$jumlah_data = mysqli_num_rows($sql);
?>

        <div class="page-inner mt--5">
          <div class="row">
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-danger bubble-shadow-small">
                        <i class="flaticon-users"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Siswa</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php
$sql = mysqli_query($koneksi, "SELECT * FROM kriteria");
$jumlah_data = mysqli_num_rows($sql);
?>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-success bubble-shadow-small">
                        <i class="flaticon-interface-6"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Kriteria</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tb_alternatif");
$jumlah_data = mysqli_num_rows($sql);
?>

            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-primary bubble-shadow-small">
                        <i class="flaticon-analytics"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Alternatif</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM user");
$jumlah_data = mysqli_num_rows($sql);
?>
            <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center icon-warning bubble-shadow-small">
                        <i class="flaticon-user"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">User</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
                

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">About</h4>
                  
                </div>
                <div class="card-body">
                  
                
       <p class="text-justify">Beasiswa adalah</p>

                                        <p class="text-justify">Pada penelitian ini penulis menggunakan metode SAW (Simple Additive Weighting). Penggunakan metode ini disebabkan karena mudah dimengerti, bersifat fleksibel, dan dapat memecahkan persoalan secara kompleks berdasarkan pengetahuan manusia. Sistem ini nantinya diharapkan untuk bisa mempermudah mahasiswa dari Perbanas Institute untuk dapat menentukan tempat kos yang tepat.</p>
                </div>
              </div>
            </div>
          </div>
          </div>
<?php
include './template/footer.php';
?>
