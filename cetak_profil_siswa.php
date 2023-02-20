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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


 
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>


<br>
<br>
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
            </div>
          </div>
        </div>



<script>
    window.print();
  </script>








<?php
include './template/footer.php';
?>
