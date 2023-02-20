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
    $_SESSION["nama_siswa"] = $data["nama_siswa"];
    $_SESSION["dokumen"] = $data["dokumen"];
    
     $_SESSION["nis"] = $data["nis"];
      $_SESSION["kelas"] = $data["kelas"];
  }

  ?>

<?php
include './template/header.php';
?>
<?php include './template/navbar.php';
?>

  <?php $page='dokumen_siswa';
include './template/sidebar_siswa.php';
?>

<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              
                <div class="card-header" >
                  <h4 class="card-title">Dokumen Saya</h4>
                </div>
                <div class="card">
                <div class="card-body" >


<?php

                          if 
                          ($_SESSION['dokumen'] == 'belum upload') {
                                    echo ' 


                                    <div class="text-danger"><h5>Dokumen Belum Diupload</h5></div>';
                                  } else{
                                    echo '<embed src="./siswa/files/'. $_SESSION['dokumen'] .'" width="800px" height="1000px"></embed>';

                                  } ?>

            
                    
                     <br>
                    <div class="col-md-6 pr-1">
                      <form  enctype="multipart/form-data" action="./siswa/edit_dokumen.php" method="post">
                  
                      <div class="form-group">
                        <label>Upload Disini :</label>
                        <input type="hidden" class="form-control" name="id_siswa" value="<?php echo $_SESSION['id_siswa'] ?>" required> 
                        <input type="file" class="form-control" name="dokumen">

                      </div>
                      <h6><div class="text-danger">*Catatan : File yang diterima dalam bentuk pdf yang terdiri berupa foto atau dokumen sesuai kriteria yang ditentukan</div></h6>
                   
                      <br>
                
                  <button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i>
              
              </form>
               
              </div>


    <?php
include './template_siswa/footer.php';
?>


