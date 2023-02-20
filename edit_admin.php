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
$page = 'admin'; include './template/sidebar.php';
?>

 <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit User</h4>
								
								</div>
								
								<div class="card-body">
									<div class="row">
										  <?php 
										  $id = $_GET['id'];
										  $query_mysql = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'")or die(mysql_error());
										  $nomor = 1;
										  while($data = mysqli_fetch_array($query_mysql)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./admin/update_admin.php" method="post">
											<div class="form-group">
												<label>Nama</label>
												<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" required>
											</div> 
											<div class="form-group">
												<label>Username</label>
												<input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>" required>
											</div>
											<div class="form-group">
												<label>Password</label>
												<input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>" required>
											</div>
											
								
									<td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
							
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
include './template/footer.php';
?>
