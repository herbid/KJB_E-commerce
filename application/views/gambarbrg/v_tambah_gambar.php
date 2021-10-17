<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title"> Gambar <?= $barang->nama_barang?></h3>

			<div class="card-tools">

				</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->


		<div class="card-body">
			<?php
			
			if($this->session->flashdata('pesan')){
				echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses !';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			};
			
			?>
			<?php
            echo validation_errors(' <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-info"></i> ','</h5></div>');

             if (isset($error_upload)) {
                echo '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> ' . $error_upload . '</h5></div>';
             }   

            echo form_open_multipart('gambarbrg/add/'.$barang->id_barang) ?>

			<div class="form-group">
				<label>Keterangan Barang</label>
				<input type="text" name="keterangan" class="form-control" placeholder="Keterangan Gambar Barang"
					value="<?= set_value('keterangan')?>">

			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label ">Gambar</label>
							<div class=" input-group">
							<div class="custom-file">
								<label class="custom-file-label">Choose file</label>
								<input type="file" name="gambar" class="custom-file-input" id="preview_gambar" required>

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
			<a href="<?=base_url('gambarbrg')?>" class="btn  btn-sm btn-outline-warning  "> kembali</a>
		</div>


    <?php echo form_close()?>
	<hr>
    <div class="row">

		<?php 
		foreach ($gambar as $key => $value) { ?>
            <div class="col-sm-3">
				<div class="form-group">
					<img src="<?=base_url('assets/gambarbrg/' . $value->gambar) ?>"
					 id="gambar_load" width="200px" height="150px">
                     <p for="">Keterangan : <?=$value-> keterangan?></p>
				</div>
                <button   data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>" 
                class="btn  btn-sm btn-outline-danger"><i class="fa fa-trash"></i>Hapus</button>
			</div>
			
            <?php }?>
		
			</div>
			

	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
</div>



<!-- /.modal hapus -->
<?php foreach ($gambar as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_gambar ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus <?= $value->keterangan ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
            <div class="form-group ">
					<img src="<?=base_url('assets/gambarbrg/'. $value->gambar)?>" id="gambar_load" width="200px" height="150px">
				</div>
			<h5>Anda Yakin Untuk Menghapus Hapus <?= $value->keterangan ?> !!! </h5>	

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="<?=base_url('gambarbrg/delete/'.  $value->id_barang . '/' . $value->id_gambar) ?>" 
                class="btn btn-primary">Hapus</a>


			</div>
		

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php }?>


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
