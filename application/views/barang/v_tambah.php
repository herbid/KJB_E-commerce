<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah Barang</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">

			<?php
            echo validation_errors(' <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-info"></i> ','</h5></div>');

             if (isset($error_upload)) {
                echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> ' . $error_upload . '</h5></div>';
             }   

            echo form_open_multipart('barang/add') ?>
			<form role="form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang"
								value="<?= set_value('nama_barang')?>">
						</div>
					</div>

					<div class="col-sm-6">
						<!-- text input -->
						<div class="form-group">
							<label>Kategori Barang</label>
							<select name="id_kategori" class="form-control">
								<option value=""> Pilih Kategori</option>
								<?php  foreach ($kategori as $key => $value) { ?>
								<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
								<?php   }   ?>
							</select>
						</div>
					</div>
				</div>
				
				<div class="row">


					<div class="col-sm-6">
						<div class="form-group">
							<label>Harga</label>
							<input type="harga" name="harga" class="form-control" placeholder="Harga Barang"
								value="<?= set_value('harga')?>">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Berat</label>
							<input type="number" min="0" name="berat" class="form-control" placeholder="Gram"
								value="<?= set_value('berat')?>">
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Stock</label>
							<input type="number" min="0" name="stok" class="form-control" placeholder="Stock"
							value="<?= set_value('stok')?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="deskripsi" class="form-control" rows="3"
						placeholder="Deskripsi"><?= set_value('deskripsi')?></textarea>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label >Gambar</label>
							<div class=" input-group">
								<div class="custom-file">
									<label class="custom-file-label">Choose file</label>
									<input type="file" name="gambar" class="custom-file-input" id="preview_gambar"
										required>

								</div>
						</div>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="form-group">
						<img src="<?=base_url('assets/gambar/noimage.png')?>" id="gambar_load" width="400px">
					</div>
				</div>
		</div>



		<div class="form-group">
			<button type="submit" class="btn  btn-sm btn-outline-primary">Simpan</button>
			<a href="<?=base_url('barang')?>" class="btn  btn-sm btn-outline-warning  "> kembali</a>
		</div>

		<?php echo form_close() ?>
		</form>

	</div>
</div>

</div>


<script>
	function deteksiImage(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#preview_gambar").change(function () {
		deteksiImage(this);
	});

</script>
