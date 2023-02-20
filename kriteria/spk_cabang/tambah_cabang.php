<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'cabang'; include 'template_user/menubar.php'; ?>
<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
     
         
          
      <div class="row justify-content-center mb-5 pb-3">
      
          
       <h2 class="mb-4">Tambah Cabang</h2>

   
        <div class="col-md-12">

            <div class="row">
                        <div class="col-md-12">
                            
									<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <form action="./cabang/tambah_cabang.php" method="post">
                                       
                                        <div class="form-group">
                                                <label>Nama Cabang / Tempat</label>
                                                <input type="text" class="form-control" name="nama_tempat" required>
                                            </div>
                                        <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" name="alamat" required>
                                            </div>
               
                                
                                    <td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>


<?php
include './template_user/footer.php';
?>