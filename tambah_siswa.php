<?php 
include './aksilogin/config.php'; 
 // mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
?>

<?php $page = 'data_siswa'; include './template/header.php';
?>

<?php include './template/navbar.php';
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
                                    <h4 class="card-title">Tambah Siswa</h4>
                                </div>
								<div class="card-body">
									<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <form action="./siswa/input_siswa.php" method="post">
                                      
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <input type="text" class="form-control" name="nis" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <input type="text" class="form-control" name="kelas" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password" required>
                                                <input type="hidden" class="form-control" name="dokumen" value="belum upload" required>
                                                <input type="hidden" class="form-control" name="status_dokumen" value="Menunggu pengecekan dokumen" required>
                                            </div>

                             </div>

                                      </div>      
                                
                                    <button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></button>
                            </tr>
                       
                    </form>


<?php
include './template/footer.php';
?>