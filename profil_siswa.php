<?php 
include 'aksilogin/config.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login2"){
  header("location:index.php");
}

$username = $_SESSION['username'];
$query = "SELECT * FROM tb_siswa WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

  ?>


  <?php
  if(mysqli_num_rows($result)>0) {
    $data = mysqli_fetch_array($result);
    $_SESSION["id_siswa"] = $data["id_siswa"];
    $_SESSION["nis"] = $data["nis"];
    $_SESSION["nama_siswa"] = $data["nama_siswa"];
    $_SESSION["kelas"] = $data["kelas"];
    $_SESSION["password"] = $data["password"];
    $_SESSION["dokumen"] = $data["dokumen"];
    $_SESSION["status_dokumen"] = $data["status_dokumen"];

    

  }

  ?>

<?php
include './template/header.php';
?>

<?php
include './template/navbar.php';
?>

  <?php $page='profil_siswa';
include './template/sidebar_siswa.php';
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
                 
    <form action="./siswa/update_profil.php" method="post">
      <?php 
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == "input"){
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di tambah.</div>';
  }else if($pesan == "update"){
    echo '<div class="alert alert-success alert-dismissible"><button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di update.</div>';
  }else if($pesan == "hapus"){
    echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di hapus.</div>';
  }
}
?>
                    <div class="form-group">
                        <label>NISN :</label>
                        <input type="hidden" name="id_siswa" value="<?php echo $_SESSION['id_siswa'] ?>">
                        <input disabled="" type="text" class="form-control" name="nis" value="<?php echo $_SESSION['nis'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Nama Siswa :</label>
                        <input disabled="" type="text" class="form-control" name="nama_siswa" value="<?php echo $_SESSION['nama_siswa'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Kelas :</label>
                        <input disabled="" type="text" class="form-control" name="kelas" value="<?php echo $_SESSION['kelas'] ?>" required>
                      </div> 
                      
                        
                <br>
                  
              
              </form>
                    
<a href="cetak_profil_siswa.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>



</div>

    <?php
include './template/footer.php';
?>