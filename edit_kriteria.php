

<?php
// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
 $page = 'kriteria'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>
<?php
$page = 'kriteria'; include './template/sidebar.php';
?>
                  <!-- End Navbar -->
 <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Kriteria</h4>
								</div>
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
include './template/footer.php';
?>