
<?php 

// mengaktifkan session
 
 
// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
?>

<?php $page = 'data_siswa'; include  './template/header.php';
?>

<?php
 include './template/navbar.php';
?>
<?php
$page = 'data_siswa'; include './template/sidebar.php';
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Siswa</h4>
								</div>
<div class="card-body">
									<div class="row">
										  <?php 
										  include 'aksilogin/config.php';
										  $id_siswa = $_GET['id_siswa'];
										  $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'");
										  $nomor = 1;
										  while($d = mysqli_fetch_array($data)){
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./siswa/update_siswa.php" method="post">
											<div class="form-group">
												<label>NISN</label>
												<input type="hidden" name="id_siswa" value="<?php echo $d['id_siswa'] ?>">
                        						<input type="text" class="form-control" name="nis" value="<?php echo $d['nis'] ?>" required>
											</div> 
											<div class="form-group">
												<label>Nama Siswa</label>
												<input type="text" class="form-control" name="nama_siswa" value="<?php echo $d['nama_siswa'] ?>" required>
											</div>
											<div class="form-group">
												<label>Kelas</label>
												<input type="text" class="form-control" name="kelas" value="<?php echo $d['kelas'] ?>" required>
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