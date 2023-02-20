
<?php 


// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
 
?>


<?php  include  './template/header.php';
?>

<?php
 include './template/navbar.php';
?>
<?php
$page = 'data_calon'; include './template/sidebar.php';
?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							
								<div class="card-header">
									<h4 class="card-title">Data Calon Sudah Input Nilai</h4>
								</div>
								<div class="card">
								<div class="card-body">
									
									<div class="table-responsive">
										<table id="basic-datatables" class="isplay table table-striped table-bordered table-hover" >
<?php 
if(isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	if($pesan == "input"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di tambah.</div>';
	}else if($pesan == "update"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di update.</div>';
	}else if($pesan == "hapus"){
		echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di hapus.</div>';
	}
}
?>
											<thead>
												<tr>
												    <th>No</th>
												    <th>Nis</th>
												    <th>Nama</th>
													<th>Kelas</th>
												    <th style='text-align:center;'>Status</th>
													<th style='text-align:center;'>Ubah Status</th>												
												</tr>
											</thead>
											<tbody>
											<?php 
											include 'aksilogin/config.php';
												
												$data = mysqli_query($koneksi, "SELECT * FROM tb_siswa where status_bantuan='Sudah input nilai'");
												$nomor = 1;
												while($dt = mysqli_fetch_array($data))
												{ 
											?>
												  <tr>
												  <td><?php echo $nomor++; ?></td>
												 <td style='text-align:center;'><?php echo $dt['nis']; ?></td>
												  <td><?php echo $dt['nama_siswa']; ?></td>
												  <td style='text-align:center;'><?php echo $dt['kelas']; ?></td>
												  <td style='text-align:center;'> 
													<a class="badge badge-secondary"> <div class="text-white"><i class="far fa-check-square"> <?php echo $dt['status_bantuan']; ?></i></div></a> </td>
												

												    <td style='text-align:center;'> 
													 <a class="btn btn-success btn-sm" href="./siswa/status_didanai.php?id_siswa=<?php echo $dt['id_siswa']; ?>" onclick="return confirm('Apakah anda yakin ingin merubah status menjadi Didanai?')"> <div class="text-white"><i class="
													fab fa-dochub"> Didanai</i></div></a> |
													
													          <a class="btn btn-danger btn-sm" href="siswa/status_tidak_didanai.php?id_siswa=<?php echo $dt['id_siswa']; ?>" onclick="return confirm('Apakah anda yakin ingin merubah status menjadi Tidak Didanai?')"> <div class="text-white"><i class="
													fab fa-dochub"> Tidak Didanai</i></div></a>
													   </td>

												 </tr>
											<?php } ?>
											</tbody>	
										</table>
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
