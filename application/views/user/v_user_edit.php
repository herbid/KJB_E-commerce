<div class="col-md-12">
	<!-- general form elements disabled -->
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Tambah User</h3>
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
              if($this->session->flashdata('pesan')){
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses !';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            };

              

            echo form_open_multipart('user/edit/'.$user->id_user) ?>
			<form role="form">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" name="nama_user" class="form-control" placeholder="Nama User"
								value="<?php echo $user->nama_user ?> ">
						</div>
					</div>

					<div class="col-sm-3">
						<!-- text input -->
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" placeholder="Username"
								value="<?php echo $user->username?>" readonly>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" placeholder="Email"
								value="<?php echo $user->email?>"readonly>
						</div>
					</div>
				</div>

				<div class="row">

					<div class="col-sm-3">
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password"
								value="<?php echo $user->password?>">
						</div>
					</div>

					<div class="col-sm-6">
						<!-- text input -->
						<div class="form-group">
							<label>No Telepon</label>
							<input type="number" name="nohp" class="form-control" placeholder="No Telepon"
								value="<?php echo $user->nohp?>">
						</div>

					</div>
                    <div class="col-sm-3">
                    <div class="form-group">
					<label>Level </label>
					<select name="level"  class="form-control">
						<option value="<?php echo $user->level?>">Admin</option>
						
					</select>
				</div>
                    </div>
                </div>

					<div class="row">

                    <div class="col-sm-6">
						<div class="form-group">
							<label for="exampleInputFile">Gambar</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" name="gambar" class="custom-file-input" id="preview_gambar">
									<label class="custom-file-label" for="exampleInputFile">Choose file</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<img src="<?=base_url('assets/gambar/' . $user->gambar) ?>" id="gambar_load"
								width="400px">
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
