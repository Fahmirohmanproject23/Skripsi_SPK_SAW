 <?php 
include './aksilogin/config.php'; 
 // mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
?>

<?php $page = 'user'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>
<?php
$page = 'user'; include './template/sidebar.php';
?>
<div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">

 <h3>Tambah Data User</h3>

               <div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
											<form action="./user/input_user.php" method="post">
											<div class="form-group">
                              <div class="form-group">
                                <label>Nama Alternatif</label>
                                <select name="id_siswa" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">...Pilih Alternatif...</option>
                                    <option value="0">guru</option>
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE status_dokumen='1' ORDER BY id_siswa asc");
                                   
                                    while ($data = mysqli_fetch_array($hasil)){
                                        echo "<option value='".$data['id_siswa']."'>".$data['nama_siswa']."</option>";
                                    }
                                    
                               

                               
                                    ?>
                                 </select>
                                 <br>
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
                                <label>Nama Alternatif</label>
                                <select name="level" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">...Pilih Level...</option>
                                    <option value="siswa">siswa</option>
                                    <option value="admin">admin</option>
                                    
                                    
                               

                               
                                 </select>
                                 <br>
                             </div>

											
								
									 <td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>
								
							</div>
						</div>
					</div>

					                                   


<?php
include './template/footer.php';
?>