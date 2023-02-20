<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'user'; include 'template_user/menubar.php'; ?>


<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
     
         
          
      <div class="row justify-content-center mb-5 pb-3">
      
          
       <h2 class="mb-4">Data User</h2>

   
        <div class="col-md-12">

            <div class="row">
                  <h4><a class="btn btn-primary btn-sm" href="tambah_user.php">+ Tambah data</a></h4>
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
                            <th style='text-align:center;'>Nama</th>
                            <th style='text-align:center;'>Username</th>
                            <th style='text-align:center;'>Password</th>
                          <th style='text-align:center;'>Opsi</th>                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      include 'aksilogin/config.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM user")or die(mysqli_error());
                        $nomor = 1;
                        while($data = mysqli_fetch_array($query))
                        { 
                      ?>
                      
                          <tr>
                          <td style='text-align:center;'><?php echo $nomor++; ?></td>
                          <td style='text-align:center;'><?php echo $data['nama']; ?></td>
                          <td style='text-align:center;'><?php echo $data['username']; ?></td>
                          <td style='text-align:center;'><?php echo $data['password']; ?></td>
                          
                          
                        <td style='text-align:center;'><a class="btn btn-warning btn-sm" href="edit_user.php?id=<?php echo $data['id']; ?>"><i class="far fa-edit"> Edit</i></a> | <a class="btn btn-danger btn-sm" href="./user/hapus_user.php?id=<?php echo $data['id']; ?>"><i class="far fa-window-close"> Hapus</i></a></td>
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
