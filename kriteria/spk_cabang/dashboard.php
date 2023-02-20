<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'home'; include 'template_user/menubar.php'; ?>



  <!-- END nav -->
  
  <section class="hero-wrap js-fullheight" style="background-image: url('assets_user/images/bg.jpeg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-lg-6 ftco-animate">
          <div class="mt-5">
            <h1 class="mb-4">SELAMAT DATANG <i><?php echo $_SESSION['username']; ?></i> </h1>
           
          </div>
        </div>
      </div>
    </div>
  </section>

  
  
  
      </div>
    </div>

  </section>

  <?php include 'template_user/footer.php'; ?>





