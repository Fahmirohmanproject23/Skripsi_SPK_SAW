<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
 
?>

<?php 
include  './template/header.php';
?>

<?php
include './template/navbar.php';
?>

<?php
$page = 'profil_admin'; include './template/sidebar.php';
?>
<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
                <div class="card-header">
                  <h4 class="card-title">Profil</h4>
                </div>
                <div class="card">
                <div class="card-body">
                 
                 
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

  
<div class="card card-profile">
                
                <div class="card-body">
<div class="user-profile text-center">
  <div class="col-md-12 pr-1">

    <?php 
                     
                      $query_mysql = mysqli_query($koneksi, "SELECT * FROM tb_admin ")or die(mysql_error());
                      $nomor = 1;
                      while($data = mysqli_fetch_array($query_mysql)){
                      ?>
                      <form action="./admin/update_admin.php" method="post">
                      <div class="form-group">
                        <label>Nama</label>
                     
                                    <input disabled="" type="text" class="form-control" value="<?php echo $data['nama'] ?>" required>
                      </div> 
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input disabled="" type="text" class="form-control" value="<?php echo $data['jabatan'] ?>" required>
                      </div>
                        
                
               
              
              </form>
                    
    
                    
                  </div>
                </div>
                
                  </div>
                </div>
                <a href="cetak_profil_admin.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>

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













<?php
include './template/footer.php';
?>
