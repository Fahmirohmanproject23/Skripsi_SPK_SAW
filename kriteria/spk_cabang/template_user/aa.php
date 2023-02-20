		<form enctype="multipart/form-data" action="./pendaftaran/input_pendaftaran.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<label>No. Pendaftaran</label>
								<div class="form-group">
									<input  type="text" class="form-control" name="no_pendaftar" placeholder="masukkan nisn anda" value="<?php echo $noDaftar ?>" readonly>
								</div>
							</div>

							<div class="col-md-6">
								<label>NISN</label>
								<div class="form-group">
									<input type="text" class="form-control" name="nisn" placeholder="masukkan nisn anda">
								</div>
							</div>
							<div class="col-md-6">
								<label>Nama Lengkap</label>
								<div class="form-group">
									<input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap anda">
								</div>
							</div>
							<div class="col-md-6">
								<label>Jenis Kelamin</label>
								<div class="form-group">
									    <select name="jenis_kelamin" placeholder="Pilih Kriteria..." class="form-control" required>
                                    <option value="">---Pilih Jenis Kelamin---</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    
                                 </select>
								</div>
							</div>
							<div class="col-md-6">
								<label>Agama</label>
								<div class="form-group">
									<select name="agama" placeholder="... Pilih ..." class="form-control" required>
                                    <option value="">---Pilih Agama---</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                  
                                    
                                 </select>
								</div>
							</div>
							<div class="col-md-12">
								<label>Alamat Rumah</label>
								<div class="form-group">
									<textarea name="alamat_rumah" id="" cols="10" rows="3" class="form-control" placeholder="Masukkan alamat rumah anda"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<label>Nama Orangtua</label>
								<div class="form-group">
									<input type="text" class="form-control" name="nama_orangtua" placeholder="masukkan nisn anda">
								</div>
							</div>
							<div class="col-md-6">
								<label>No. Telephone Orangtua</label>
								<div class="form-group">
									<input type="text" class="form-control" name="no_hp_orangtua" placeholder="Masukkan nama lengkap anda">
								</div>
							</div>
							<div class="col-md-6">
								<label>Sekolah Asal</label>
								<div class="form-group">
									<input type="text" class="form-control" name="sekolah_asal" placeholder="masukkan nisn anda">
									<input type="hidden" class="form-control" name="dokumen" value="belum upload" required>
								</div>
							</div>
							
							<div class="col-md-6">
								<label>Uaername</label>
								<div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="Subject">
								</div>
							</div>
							<div class="col-md-6">
								<label>Password</label>
								<div class="form-group">
									<input type="text" class="form-control" name="password" placeholder="Subject">
								</div>
							</d>