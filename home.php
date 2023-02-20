<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
?>

<?php include  './template/header.php';
?>

<?php
include './template/navbar.php';
?>
<?php
$page = 'home'; include './template/sidebar.php';
?>

      
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-secondary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                                      
                <h2 class="text-white pb-2 fw-bold">Home</h2>
                <h5 class="text-white op-7 mb-2" >Selamat Datang <i><?php echo $_SESSION['username']; ?></i> di Sistem Pendukung Keputusan </h5>
                
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
                        <p class="card-category">Data Siswa</p>
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
                        <p class="card-category">Admin</p>
                        <h4 class="card-title"><?php echo $jumlah_data; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <div class="page-inner">
          
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Persentasi Status Siswa</div>
                </div>
                <div class="card-body">
                  <div class="chart-container">
                    <canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
                  </div>
                </div>
              </div>
            </div>




            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Persentasi Status Alternatif</div>
                </div>
                <div class="card-body">
                  <div class="chart-container">
                    <canvas id="barChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
                

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  
              </div>
            </div>
          </div>
          </div>
<?php
include './template/footer.php';
?>