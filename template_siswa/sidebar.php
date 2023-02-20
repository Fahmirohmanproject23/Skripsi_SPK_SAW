<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll" >
        <div class="container"><a class="navbar-brand" href="#"><img src="assets/img/logo_sekolah.png" alt="" width="30" /><span class="text-1000 fs-1 ms-2 fw-medium">SD Negeri Kalisalak 03</span></span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item"><a class="<?php if ($page=='home_siswa'){echo 'nav-link active active';} else {echo 'nav-link';} ?>" aria-current="page" href="halaman_siswa.php">Home</a></li>
               <li class="">
                <li class="nav-item"><a class="<?php if ($page=='dokumen_siswa'){echo 'nav-link active active';} else {echo 'nav-link';} ?>" href="dokumen_siswa.php">Upload Dokumen </a></li>
              <li class="nav-item"><a class="<?php if ($page=='pengumuman_siswa'){echo 'nav-link active active';} else {echo 'nav-link';} ?>" href="pengumuman_siswa.php">Pengumuman</a></li>
              
              <li class="nav-item"><a class="<?php if ($page=='profil_siswa'){echo 'nav-link active active';} else {echo 'nav-link';} ?>" href="profil_siswa.php">Profil</a></li>
             
            </ul>
            <form class="d-flex py-3 py-lg-0">
          
              <button class="btn btn-outline-danger rounded-pill order-0"  ><a href="./aksilogin/logout.php"> Logout</a></button>
            </form>
          </div>
        </div>
      </nav>


 