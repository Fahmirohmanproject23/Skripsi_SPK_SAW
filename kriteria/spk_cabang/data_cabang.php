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
      
          
       <h2 class="mb-4">Data Cabang</h2>

   
        <div class="col-md-12">

            <div class="row">
						<div class="col-md-12">
							
						
								
								<div class="card-body">
									
									  <h4><a class="btn btn-primary btn-sm" href="tambah_cabang.php">+ Tambah data</a></h4> 
									
							
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
												    <th>Nama Cabang / Tempat</th>
													<th>Alamat</th>
												
													<th style='text-align:center;'>Opsi</th>												
												</tr>
											</thead>
											<tbody>
											<?php 
											include 'aksilogin/config.php';
												$data = mysqli_query($koneksi,"SELECT * FROM tb_tempat");
												$nomor = 1;
												while($dad = mysqli_fetch_array($data))
												{ 
											?>
												  <tr>
												  <td><?php echo $nomor++; ?></td>
												  <td><?php echo $dad['nama_tempat']; ?></td>
												  <td><?php echo $dad['alamat']; ?></td>
								
												
												  
												<td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_cabang.php?id_tempat=<?php echo $dad['id_tempat']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./cabang/hapus_cabang.php?id_tempat=<?php echo $dad['id_tempat']; ?>"><i class="far fa-window-close"> Hapus</i></a></td>
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
include './template_user/footer.php';
?>
