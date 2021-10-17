<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Konfigurasi Utama
			
			</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php 
			// notifikasi
			if($this->session->flashdata('sukses')){
				echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses !';
				echo $this->session->flashdata('sukses');
				echo '</h5></div>';
			};
			// Error Upload
			if(isset($error)){
			echo '<p class="alert alert-warning">';
			echo $error;
			echo '</p>';
				}

			// notifikasi error
			echo validation_errors('<div class="alert alert-warning">','</div>');
						
			echo form_open_multipart(base_url('konfigurasi'),' class="form-horizontal"');
				?>


			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Nama Website</label>
						<input type="text" name="namaweb" class="form-control" placeholder="Nama Website"
							value="<?php echo $konfigurasi->namaweb ?>">
					</div>
				</div>

				<div class="col-sm-6">
					<div class="form-group">
						<label> Email</label>

						<input type="email" name="email" class="form-control" placeholder="Email"
							value="<?php echo $konfigurasi->email ?>" required>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label> Facebook</label>

						<input type="text" name="facebook" class="form-control" placeholder="Alamat Facebook"
							value="<?php echo $konfigurasi->facebook ?>" required>

							</div>
				</div>

							<div class="col-sm-6">
							<div class="form-group">
						<label> Instagram</label>

						<input type="text" name="instagram" class="form-control" placeholder="Instagram"
							value="<?php echo $konfigurasi->instagram ?>" required>

							</div>
				</div>
			</div>

					<div class="form-group">
						<label> Telepon</label>

						<input type="text" name="telepon" class="form-control" placeholder="Telepon"
							value="<?php echo $konfigurasi->telepon ?>" required>

					</div>

					<div class="form-group">
						<label>Alamat</label>

						<textarea type="text" name="alamat" class="form-control"
							placeholder="Alamat"><?php echo $konfigurasi->alamat ?></textarea>

					</div>
					


					<!-- <div class="form-group">
									<label >Deskripsi Website</label>
									<div class="col-md-9">
									<textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Website"><?php echo $konfigurasi->deskripsi ?></textarea>
									</div>
									</div> -->



					<!-- </div> -->

					<div class="form-group">

						<button class="btn  btn-sm btn-outline-primary" name="submit" type="submit">
							<i class="fa fa-save"></i> Simpan
						</button>
						<button class="btn  btn-sm btn-outline-warning  " name="reset" type="reset">
							<i class="fa fa-times"></i> Reset
						</button>
					</div>

					<?php echo form_close() ?>

				</div>
			</div>
		</div>
