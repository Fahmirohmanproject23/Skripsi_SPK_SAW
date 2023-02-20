<?php 
include 'aksilogin/config.php';

session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }
 
?>


<?php include 'template_user/header.php'; ?>
<?php $page = 'kriteria'; include 'template_user/menubar.php'; ?>


<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
     
         
          
      <div class="row justify-content-center mb-5 pb-3">
      
          
       <h2 class="mb-4">Data Kriteria</h2>

   
        <div class="col-md-12">

            <div class="row">




<?php 
  if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
      echo "Data berhasil di input.";
    }else if($pesan == "update"){
      echo "Data berhasil di update.";
    }else if($pesan == "hapus"){
      echo "Data berhasil di hapus.";
    }
  }
  ?>





                  
                  <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-bordered table-hover" >
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

  <thead><tr>
    <th>No</th>
    <th>Code</th>
    <th>Nama Kriteria</th>
    <th>Atribute</th>
    <th>Bobot</th>
    <th class="text-center">Opsi</th>   
  </tr>
</thead>
<?php 
include 'aksilogin/config.php';
$data = mysqli_query($koneksi, "SELECT * FROM kriteria")or die(mysqli_error());
$nomor = 1;
while($d = mysqli_fetch_array($data)){
?>
<tr>
  <td><?php echo $nomor++; ?></td>
  <td><?php echo $d['code']; ?></td>
  <td><?php echo $d['nama_kriteria']; ?></td>
  <td><?php echo $d['atribute']; ?></td>
  <td><?php echo $d['bobot']; ?></td>
  <td class="text-center"> <a class="btn btn-warning btn-sm" href="edit_kriteria.php?id_kriteria=<?php echo $d['id_kriteria']; ?>"><i class="far fa-edit"> Edit</i></a>
  <a class="btn btn-secondary btn-sm" href="data_sub_kriteria.php?id_kriteria=<?php echo $d['id_kriteria']; ?>"><i  class="fas icon-magnifier"> Sub Kriteria</i></a></td>
  </td>
  </tr>
    <?php
}
?>
 



  </table>
   

</div>
</div>
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
