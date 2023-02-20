

<?php

   
// Baca lokasi file sementar dan nama file dari form (fupload)
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

$query =  "insert into tb_pendaftar (id_siswa,dokumen,status_dokumen) values ('$_POST[id_siswa]', '$dokumen', 'Menunggu pengecekan dokumen' )";
  
            
  mysqli_query($koneksi,$query);
  header("location:../pendaftaran.php?pesan=input");

}
else{
  echo "File gagal di upload";
  header("location:../pendaftaran.php?pesan=input");
}
?>



