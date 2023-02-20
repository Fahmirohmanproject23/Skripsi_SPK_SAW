<?php 
include './aksilogin/config.php'; 

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
?>

<?php $page = 'alternatif'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>

<?php
$page = 'alternatif'; include './template/sidebar.php';
?>
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Data Alternatif</h4>
								</div>
								<div class="card-body">
									<div class="row">
										  <?php 
										  $id_alternatif = (int) $_GET['id'];
										  $sql = mysqli_query($koneksi, "SELECT * FROM tb_alternatif p INNER JOIN tb_nilai b ON p.id_alternatif= b.id_alternatif where p.id_alternatif='$id_alternatif'");
										  ($dataku = mysqli_fetch_array($sql));
										  
										  $nomor = 1;
										  
										  ?>
										<div class="col-md-6 pr-1">
											<form action="./alternatif/update_alternatif.php" method="post">

											<div class="form-group">
												<label>Nama</label>
												<input type="hidden" name="id_alternatif" value="<?php echo $dataku['id_alternatif'] ?>">
                        						<select name="nama_alternatif" placeholder="Pilih Kriteria..." class="form-control">
                                    <option value="">Pilih Alternatif</option>
                                    
                                    <?php
                              		$query = mysqli_query($koneksi, "SELECT * FROM tb_pendaftar INNER JOIN tb_siswa ON tb_pendaftar.id_siswa = tb_siswa.id_siswa WHERE status_dokumen='Diterima'");
                                
                                    while ($data = mysqli_fetch_array($query)){
                                      echo "<option value='$data[nama_siswa]'" ;
                                        if ($dataku['nama_alternatif'] == $data['nama_siswa']) {
                                            echo "selected";
                                        }
                                        echo ">".$data['nama_siswa']."</option>"; 

                                        }

                                    $kriteria = array();
                                    $kq = mysqli_query($koneksi, "SELECT * from kriteria");
                                    while ($k = mysqli_fetch_array($kq)) {
                                    	array_push($kriteria, $k['nama_kriteria']);
                                    }
                                    ?>
                                </select>
											</div> 
											<div class="form-group">
												<label><?php echo $kriteria[0] ?></label>
												<input type="text" class="form-control" name="kriteria1" value="<?php echo $dataku['kriteria1'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[1] ?></label>
												<input type="text" class="form-control" name="kriteria2" value="<?php echo $dataku['kriteria2'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[2] ?></label>
												<input type="text" class="form-control" name="kriteria3" value="<?php echo $dataku['kriteria3'] ?>">
											</div>
											<div class="form-group">
												<label><?php echo $kriteria[3] ?></label>
												<input type="text" class="form-control" name="kriteria4" value="<?php echo $dataku['kriteria4'] ?>">
											</div>
										
										
												
								
									<td><button id="displayNotif" class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle">Simpan</i></td>
							
							</form>
							
							</div>

					</div>
					</div>
				</div>
			</div>



<script>
		$('#displayNotif').on('click', function(){
			var placementFrom = $('#notify_placement_from option:selected').val();
			var placementAlign = $('#notify_placement_align option:selected').val();
			var state = $('#notify_state option:selected').val();
			var style = $('#notify_style option:selected').val();
			var content = {};

			content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
			content.title = 'Bootstrap notify';
			if (style == "withicon") {
				content.icon = 'fa fa-bell';
			} else {
				content.icon = 'none';
			}
			content.url = 'index.html';
			content.target = '_blank';

			$.notify(content,{
				type: state,
				placement: {
					from: placementFrom,
					align: placementAlign
				},
				time: 1000,
				delay: 0,
			});
		});
	</script>
<?php
include './template/footer.php';
?>

