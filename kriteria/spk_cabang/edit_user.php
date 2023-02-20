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
      
          
       <h2 class="mb-4">Edit User</h2>

   
        <div class="col-md-12">

            <div class="row">
								
								<div class="card-body">
									<div class="row">
										  <?php 
										  $id = $_GET['id'];
										  $query_mysql = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'")or die(mysql_error());
										  $nomor = 1;
										  while($data = mysqli_fetch_array($query_mysql)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./user/update_user.php" method="post">
											<div class="form-group">
												<label>Nama</label>
												<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
											</div> 
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>">
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>">
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
