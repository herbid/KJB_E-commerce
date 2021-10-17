<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title"> banner 1 </h3>
		</div>
		<!-- /.card-header -->

		<div class="card-body">
			<?php 
	// notifikasi
if($this->session->flashdata('sukses')){
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}
?>
			<?php 
// Error Upload
if(isset($error)){
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}

// notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');
		
		echo form_open_multipart(base_url('konfigurasi/kontak'),' class="form-horizontal"');
		?>


			<div class="form-group">
				<label>Nama Website</label>
				<input type="text" name="namaweb" class="form-control" placeholder="Nama Website"
					value="<?php echo $konfigurasi->namaweb ?>" required>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Upload banner Beranda 1 Baru</label>
						<input type="file" name="kontak" class="form-control" placeholder="Upload banner Beranda 1 Baru"
							value="<?php echo $konfigurasi->kontak ?>">

					</div>
				</div>


				<div class="col-sm-6">
					<div class="form-group">
						<label> banner lama:</label>
						<br> <img src="<?php echo base_url('assets/banner/'.$konfigurasi->kontak) ?>"
							class="img img-respopnsive img-thumbnail" width="200">
					</div>
				</div>
			</div>


		</div>
		<div class="card-footer">
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
