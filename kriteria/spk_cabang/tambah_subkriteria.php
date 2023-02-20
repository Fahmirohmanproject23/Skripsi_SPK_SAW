<<?php 
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
      
          
       <h2 class="mb-4">Tambah Sub Kriteria</h2>

   
        <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-md-6 pr-1">
                                            <form action="./sub_kriteria/input_subkriteria.php" method="post">
                                <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="id_kriteria" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Kriteria...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM kriteria ORDER BY id_kriteria asc");
                                    
                                    while ($data = mysqli_fetch_array($hasil)){
                                        if ($_GET['id_kriteria'] == $data['id_kriteria']) {
                                            echo "<option selected value='".$data['id_kriteria']."'>".$data['nama_kriteria']."</option>";
                                        } 
                                            echo ">".$data['nama_kriteria']."</option>"; 
                                        }
                                        
                                    
                                    ?>

                                    
                                </select>
                                
                            </div>

                             <div class="form-group">
                                <label>Nama Sub Kriteria</label>
                                <input type="text" class="form-control" name="nama_subkriteria" placeholder="Masukkan nama subkriteri" required >
                            </div> 

                          
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control" name="keterangan"  placeholder="Masukkan nilai berupa angka" required >
                            </div>
                            
                              <div class="form-group">
                                                <label>Keterangan Nilai</label>
                                                <input type="text" class="form-control" name="nilai" placeholder="masukkan keterangan" required>
                                            </div>
                        
                           
                            
                            <tr> 
                                <td><button class="btn btn-success" name="Submit" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>
 


                   
  <br>
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