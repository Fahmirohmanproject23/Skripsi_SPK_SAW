




<?php $page = 'alternatif'; include './template/header.php';

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}

?>

<?php include './template/navbar.php';
?>
<?php
$page = 'alternatif'; include './template/sidebar.php';
?>

 <?php
 include './aksilogin/config.php';
$sql = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_nilai ON tb_alternatif.id_alternatif = tb_nilai.id_alternatif");

$nomor = 1;
?>


 <div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
                <div class="card-header">
                  <h4 class="card-title">Data Alternatif</h4>
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
                            <th class="text-center">No</th>
                            
                            <th class="text-center">Nama</th>
                          
                                               
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      include 'aksilogin/config.php';
                        
                        $data = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_hasil_saw ON tb_alternatif.id_alternatif = tb_hasil_saw.id_alternatif");
                        $nomor = 1;
                        while($dt = mysqli_fetch_array($data))
                        { 
                      ?>
                          <tr>
                          <td class="text-center"><?php echo $nomor++; ?></td>
                         
                          <td><?php echo $dt['nama_alternatif']; ?></td>
                          
                          
                        

                           

                         </tr>
                      <?php } ?>
                      </tbody>  
                    </table>
                    <a href="cetak_alternatif.php" target="_blank" class="btn btn-danger"><i class="fas fa-print"> Cetak</i></a>

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
