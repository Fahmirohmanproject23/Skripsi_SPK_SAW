<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'kriteria'; include 'template_user/menubar.php'; ?>


<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
     
         
          
      <div class="row justify-content-center mb-5 pb-3">
      
          
       <h2 class="mb-4">Edit Kriteria</h2>

   
        <div class="col-md-12">

            <div class="row">
                <?php 
										  include 'aksilogin/config.php'; 

										  $id = $_GET['id_kriteria'];
									      $data = mysqli_query($koneksi, "SELECT * FROM kriteria where id_kriteria='$id'");
	                                      $nomor = 1;
	                                      while($d = mysqli_fetch_array($data)){
										 
										  ?>

<div class="card-body">
									<div class="row">
										  
										<div class="col-md-6 pr-1">
											<form action="./kriteria/update_kriteria.php" method="post">
											<div class="form-group">
												<label>Code</label>
												<input type="hidden" name="id_kriteria" value="<?php echo $d['id_kriteria'] ?>">
                        						<input disabled="" class="form-control" name="code" value="<?php echo $d['code'] ?>">
											</div> 
											<div class="form-group">
												<label>Nama Kriteria</label>
												<input type="text" class="form-control" name="nama_kriteria" value="<?php echo $d['nama_kriteria'] ?>" required>
												
											</div>
											<div class="form-group">
												<label>Atribute</label>
												<input type="text" class="form-control" name="atribute" value="<?php echo $d['atribute'] ?>" required>
												
											</div>
											<div class="form-group">
												<label>Bobot</label>
												<input class="form-control" class="form-control" name="bobot" value="<?php echo $d['bobot'] ?>" required>
											</div>
											
								
									<td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle">Simpan</i></td>
							
							</form>
							
							</div>

						</div>

					</div>
						<?php

							}
							?>
				</div>
			</div>
					</div>
					</div>
				</div>
			</div>

<?php
include './template_user/footer.php';
?>