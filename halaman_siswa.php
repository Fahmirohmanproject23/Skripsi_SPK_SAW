<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login2"){
  header("location:index.php");
}

  ?>

<?php
include './template/header.php';
?>

<?php include './template/navbar.php';
?>


  <?php $page = 'halaman_siswa';
include './template/sidebar_siswa.php';
?>

      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <!-- ============================================-->
    <div class="main-panel">
      <div class="content">
        <div class="panel-header bg-secondary-gradient">
          <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
              <div>
                                      
                <h2 class="text-white pb-2 fw-bold">Home</h2>
                <h5 class="text-white op-7 mb-2" >Selamat Datang <i><?php echo $_SESSION['username']; ?></i> di Sistem Pendukung Keputusan Pemilihan Calon Penerima Bantuan PIP</h5>
                
              </div>
            
            
            </div>
          </div>
        </div>
      <!-- <section> close ============================-->
      

<?php
include './template/footer.php';
?>

      <!-- <section> close ============================-->
      <!-- ============================================-->





      <!-- <section> close ============================-->
      <!-- ============================================-->



