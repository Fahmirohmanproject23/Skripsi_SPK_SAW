<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'alternatif'; include 'template_user/menubar.php'; ?>
 <?php
 include './aksilogin/config.php';
$sql = mysqli_query($koneksi, "SELECT * FROM tb_alternatif INNER JOIN tb_nilai ON tb_alternatif.id_alternatif = tb_nilai.id_alternatif");

$nomor = 1;
?>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
     
         
          
      <div class="row justify-content-center mb-5 pb-3">
      
          
       <h2 class="mb-4">Data Alternatif</h2>

   
        <div class="col-md-12">
      <h4><a class="btn btn-primary btn-sm" href="tambah_alternatif.php">+ Tambah data</a></h4>
            <div class="row">




                  
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
                            <th style='text-align:center;'>No</th>
                            <th>Nama Alternatif</th>
                            <?php
                                include './aksilogin/config.php'; 
                                $qkriteria = mysqli_query($koneksi, "SELECT * from kriteria");
                                while ($k = mysqli_fetch_array($qkriteria)) {
                                  echo "<th style='text-align:center;'>".$k['nama_kriteria']."</th>";
                                }
                            // <th style='text-align:center;'>C1</th>
                            // <th style='text-align:center;'>C2</th>
                            // <th style='text-align:center;'>C3</th>
                            // <th style='text-align:center;'>C4</th>
                          ?>
                          <th style='text-align:center;'>Opsi</th>                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($data = mysqli_fetch_array($sql)) {
                        ?>
                      
                          <tr>
                          <td style='text-align:center;'><?php echo $nomor++; ?></td>
                          <td><?php echo $data['nama_alternatif']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria1']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria2']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria3']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria4']; ?></td>
                          <td style='text-align:center;'><?php echo $data['kriteria5']; ?></td>
             
               
                          
                          
                          
                        <td style='text-align:center;'><a class="btn btn-danger btn-sm" href="./alternatif/hapus_alternatif.php?id=<?php echo $data['id_alternatif']; ?>"><i class="far fa-window-close"> Hapus</i></a></td>
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
