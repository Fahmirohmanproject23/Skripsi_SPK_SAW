<?php 
include './aksilogin/config.php'; 

 // mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
  header("location:halaman_login.php");
}
?>

<?php $page = 'alternatif'; include './template/header.php';
?>

<?php include './template/navbar.php';
?>
<?php
$page = 'alternatif'; include './template/sidebar.php';
?>
<div class="main-panel">
      <div class="content">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Tambah Alternatif</h4>
                </div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6 pr-1">
											<form action="./alternatif/input_alternatif.php" method="post">
	                     <div class="form-group">
                                <label>Nama Alternatif</label>
                                <select name="nama_alternatif" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">Pilih Alternatif...</option>
                                    
                                    <?php
                                    $hasil = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE status='Diterima'");
                                   
                                    while ($data = mysqli_fetch_array($hasil)){
                                        echo "<option value='".$data['nama_siswa']."'>".$data['nama_siswa']."</option>";
                                    }
                                    
                               

                                $kriteria = array();
                                    $kq = mysqli_query($koneksi, "SELECT * from kriteria");
                                    while ($k = mysqli_fetch_array($kq)) {
                                    	array_push($kriteria, $k['nama_kriteria']);
                                    }


                                    ?>
                                 </select>
                                 <br>
                            <label><?php echo $kriteria[0] ?></label>
                                <div>
                                    <select name="kriteria1" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='1' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>




                                </div>
                                <br>
                                <label><?php echo $kriteria[1] ?></label>
                                <div>
                                    <select name="kriteria2" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='2' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <label><?php echo $kriteria[2] ?></label>
                                <div>
                                    <select name="kriteria3" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='3' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <label><?php echo $kriteria[3] ?></label>
                                <div>
                                    <select name="kriteria4" class="form-control">
                                        <option>--- Pilih ---</option>
                                        <?php
                                        $hasil = mysqli_query($koneksi, "SELECT * FROM sub_kriteria WHERE id_kriteria='4' ORDER BY id_sub asc");
                                      
                                        while ($data = mysqli_fetch_array($hasil)){
                                            echo "<option value='".$data['nilai']."'>".$data['nama_subkriteria']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                            <tr> 
                                <td></td>
                                <td><button class="btn btn-primary" type="submit" value="Simpan"><i class="far fa-check-circle"> Simpan</i></td>
                            </tr>
                       
                    </form>


<?php
include './template/footer.php';
?>