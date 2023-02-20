<?php

include '../aksilogin/config.php';


$id_siswa = $_POST['id_siswa'];
$lokasi_file = $_FILES['dokumen']['tmp_name'];
$dokumen   = $_FILES['dokumen']['name'];
// Tentukan folder untuk menyimpan file
$folder = "files/$dokumen";
// tanggal sekarang




// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo "Nama File : <b>$dokumen</b> sukses di upload";
  
  // Masukkan informasi file ke database
 $koneksi = mysqli_connect("localhost","root", "", "db_spk_contoh");

$query =  "UPDATE tb_siswa SET dokumen='$dokumen' WHERE id_siswa='$id_siswa'";
  
            
  mysqli_query($koneksi,$query);
  header("location:../dokumen_siswa.php?pesan=input");

}
else{
  echo "File gagal di upload";
  header("location:../dokumen_siswa.php?pesan=input");
}



  ?>

