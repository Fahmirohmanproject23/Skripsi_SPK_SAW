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
      
          
       <h2 class="mb-4">Edit Sub Kriteria</h2>

   
        <div class="col-md-12">

                                    <div class="row">
                                        <?php
                    $id_sub = $_GET['id_sub'];
                    $result = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_sub='$id_sub'") or die (mysql_error());
                    
                    $dataku = mysqli_fetch_array($result);
                    $nomor = 1;
                                            ?>
                                        <div class="col-md-6 pr-1">
                                            <form action="./sub_kriteria/update_subkriteria.php?id_sub=<?php echo $id_sub ?>" method="post">
                               <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="id_kriteria" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Kriteria...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM kriteria ORDER BY id_kriteria asc");
                                    
                                    while ($data = mysqli_fetch_array($hasil)){
                                      echo "<option value='$data[id_kriteria]'" ;
                                        if ($data['id_kriteria'] == $dataku['id_kriteria']) {
                                            echo "selected";
                                        }
                                        echo ">".$data['nama_kriteria']."</option>"; 

                                        }
                                        
                                    ?>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label>Nama Sub Kriteria</label>
                                <input type="text" class="form-control"  value="<?php echo $dataku['nama_subkriteria'] ?>" name="nama_subkriteria" value="" required >
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input class="form-control"  value="<?php echo $dataku['nilai'] ?>" name="nilai" value="" required >
                            </div>
                            
                            <div class="form-group">
                                <label>Keterangan Nilai</label>
                                <input class="form-control"  value="<?php echo $dataku['keterangan'] ?>" name="keterangan" value="" required >
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