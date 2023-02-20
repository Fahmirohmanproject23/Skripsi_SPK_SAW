<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'user'; include 'template_user/menubar.php'; ?>


<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
     
         
          
      <div class="row justify-content-center mb-5 pb-3">
      
          
       <h2 class="mb-4">Tambah User</h2>

   
        <div class="col-md-12">

            <div class="row">

               <div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
											<form action="./user/input_user.php" method="post">
											<div class="form-group">
												<label>Nama</label>
												
                        						<input type="text" class="form-control" name="nama" required>
											</div> 
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="username" required>
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" required>
											</div>
												<div class="form-group">
												<label>Sebagai</label>
												<select name="level"  placeholder="Pilih Kriteria..." class="form-control" required>
                                                <option value="">Pilih Alternatif</option>
                                                <option value="admin">admin</option>

                                            </select>
											</div>
											
								
									<td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
							
							</form>
								
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
include './template/footer.php';
?>
