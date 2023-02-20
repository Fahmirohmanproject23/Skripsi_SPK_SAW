
<?php 

// mengaktifkan session
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
$page = 'data_siswa'; include './template/sidebar.php';
?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
									<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Cek Dokumen</div>
									
								</div>
								<div class="card-body">
									<div class="form">
										



										<?php 
										  include 'aksilogin/config.php';
										  $id_siswa = $_GET['id_siswa'];
										  $data = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'");
										  $nomor = 1;
										  while($d = mysqli_fetch_array($data)){
										  ?>


									




								  <div class="col-lg-4 col-md-9 col-sm-12"><b>Keputusan :</b> 
								  	<a class="btn btn-warning btn-sm" href="./siswa/status_diterima.php?id_siswa=<?php echo $d['id_siswa']; ?>" onclick="return confirm('Apakah anda yakin ingin merubah status Diterima?')"><i class="far fa-edit"> Diterima</i></a> | <a class="btn btn-danger btn-sm" href="./siswa/status_ditolak.php?id_siswa=<?php echo $d['id_siswa']; ?>" onclick="return confirm('Apakah anda yakin ingin merubah status Ditolak?')"><i class="far fa-window-close"> Ditolak</i></a>

												
											</div>
									<br>
													<?php 
													if 
													($d['dokumen'] == 'belum upload') {
													          echo ' 


													          <div class="text-danger"><h5>Dokumen Belum Diupload</h5></div>';
													        } else{
													        	echo '<embed src="./siswa/files/'. $d['dokumen'] .'" width="800px" height="1000px"></embed>';

													        } ?>
											

										
								</div>
								<div class="card-footer">
									<div class="form">
										<div class="form-group from-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-12">

											</div>
											
										</div>
									</div>
									
								</div>
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
			</div>
		</div>

