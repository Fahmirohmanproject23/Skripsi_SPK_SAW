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
      
          
       <h2 class="mb-4">Edit Cabang</h2>

   
        <div class="col-md-12">

            <div class="row">
                        <div class="col-md-12">
                            
<div class="card-body">
									<div class="row">
										  <?php 
										  include 'aksilogin/config.php';
										  $id_tempat = $_GET['id_tempat'];
										  $data = mysqli_query($koneksi, "SELECT * FROM tb_tempat WHERE id_tempat='$id_tempat'");
										  $nomor = 1;
										  while($d = mysqli_fetch_array($data)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./cabang/update_cabang.php" method="post">
											<div class="form-group">
												<label>Nama Cabang / Tempat</label>
												<input type="hidden" name="id_tempat" value="<?php echo $d['id_tempat'] ?>">
                        						<input type="text" class="form-control" name="nama_tempat" value="<?php echo $d['nama_tempat'] ?>">
											</div> 
											<div class="form-group">
												<label>Alamat</label>
                        						<input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>">
											</div>
									
 
								
										
											
								
									<td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
							
							</form>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
					</div>
					</div>
				</div>
			</div>

<?php
include './template_user/footer.php';
?>