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
      
          
       <h2 class="mb-4">Tambah Alternatif</h2>

   
        <div class="col-md-12">
  
            <div class="row">
                    <div class="col-md-6 pr-1">
                      <form action="./alternatif/input_alternatif.php" method="post">
                       <div class="form-group">
                                                               <label>Nama Alternatif</label>
                                <select name="nama_alternatif" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Alternatif...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tb_tempat ORDER BY id_tempat asc");
                                   
                                    while ($data = mysqli_fetch_array($hasil)){
                                        echo "<option value='".$data['nama_tempat']."'>".$data['nama_tempat']."</option>";
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
                                              <input type="text" class="form-control" name="kriteria1" placeholder="Masukkan nilai " required>
                                            </div>
                                            <div class="form-group">
                                              <label><?php echo $kriteria[1] ?></label>
                                              <input type="text" class="form-control" name="kriteria2" placeholder="Masukkan nilai " required>
                                            </div>
                                            <div class="form-group">
                                              <label><?php echo $kriteria[2] ?></label>
                                              <input type="text" class="form-control" name="kriteria3" placeholder="Masukkan nilai " required>
                                            </div>
                                              <div class="form-group">
                                              <label><?php echo $kriteria[3] ?></label>
                                              <input type="text" class="form-control" name="kriteria4" placeholder="Masukkan nilai " required>
                                            </div>
                                                   <div class="form-group">
                                              <label><?php echo $kriteria[4] ?></label>
                                              <input type="text" class="form-control" name="kriteria5" placeholder="Masukkan nilai " required>
                                            </div>
                              
                    
                            
                            <tr> 
                                <td></td>
                                <td><button class="btn btn-success" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>

<?php
include './template/footer.php';
?>