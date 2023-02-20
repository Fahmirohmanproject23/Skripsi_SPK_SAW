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
$page = 'data_siswa'; include './template/sidebar.php';
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							
								<div class="card-header">
									<h4 class="card-title">Data Siswa</h4>
								</div>
								<div class="card">
								<div class="card-body">
									<h4><a class="btn btn-primary btn-sm" href="tambah_siswa.php">+ Tambah data</a></h4>
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
												    <th>NISN</th>
												    <th>Nama Lengkap</th>
												    <th style='text-align:center;'>Kelas</th>
												    <th style='text-align:center;'>Status</th>
													<th style='text-align:center;'>Opsi</th>												
												</tr>
											</thead>
											<tbody>
											<?php 
												$query_mysqli = mysqli_query($koneksi, "SELECT * FROM tb_siswa")or die(mysqli_error());
												$nomor = 1;
												while($data = mysqli_fetch_array($query_mysqli))
												{ 
											?>
												  <tr>
												  <td><?php echo $nomor++; ?></td>
												  <td><?php echo $data['nis']; ?></td>
												  <td><?php echo $data['nama_siswa']; ?></td>
												  <td style='text-align:center;'><?php echo $data['kelas']; ?></td>
												  
												<td><?php 
													if 
													($data['status_dokumen'] == 'Menunggu pengecekan dokumen') {
													          echo '<a class="badge badge-secondary"> <div class="text-white"><i class="
													fas fa-info-circle"> Menunggu pengecekan dokument</i></div></a>';
													        } elseif($data['status_dokumen'] == 'Diterima'){
													        	echo '<a class="badge badge-success"> <div class="text-white"><i class="far fa-check-square"> Diterima</i></div></a> Silahkan';
													        } elseif($data['status_dokumen'] == 'Ditolak'){
													        	echo '<a class="badge badge-danger"> <div class="text-white"><i class="far fa-window-close"> Ditolak</i></div></a>';
													        } elseif($data['status_dokumen'] == 'Sudah input nilai'){
													        	echo '<a class="badge badge-warning"> <div class="text-white"><i class="far fa-window-close"> Diterima dan Sudah input nilai</i></div></a>';
													     
													        } elseif($data['status_dokumen'] == 'Diterima dan sudah input'){
													        	echo '<a class="badge badge-primary"> <div class="text-white"><i class="far fa-window-close">Diterima dan sudah input nilai</i></div></a>';
													        } 
													?> 

												<?php if 
													($data['status_dokumen'] == 'Diterima') { ?>
													          <a class="btn btn-secondary btn-sm" href="tambah_nilai.php?id_siswa=<?php echo $data['id_siswa']; ?>"> <div class="text-white"><i class="
													fab fa-dochub"> Input Nilai</i></div></a><?php } ?></td>
													<td style='text-align:center;'> <?php if 
													($data['status_dokumen'] == 'Menunggu pengecekan dokumen') { ?>
													          <a class="btn btn-secondary btn-sm" href="detail_dokumen.php?id_siswa=<?php echo $data['id_siswa']; ?>"> <div class="text-white"><i class="
													fab fa-dochub"> Cek Dokumen</i></div></a><?php } ?> 
													<a class="btn btn-warning btn-sm" href="edit_siswa.php?id_siswa=<?php echo $data['id_siswa']; ?>"><i class="fas fa-cloud-upload-alt">  Edit</i></a> 
													<a class="btn btn-danger btn-sm" href="./siswa/hapus_siswa.php?id_siswa=<?php echo $data['id_siswa']; ?>"><i class="far fa-window-close">  Hapus</i></a>   
													   </td>

												 </tr>
											<?php } ?>
											</tbody>	
										</table>
										<a href="cetak_data_siswa.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>

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
