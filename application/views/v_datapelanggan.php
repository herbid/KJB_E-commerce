<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data User</h3>

			<!-- <div class="card-tools">
				<button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-x"><i
						class="fas fa-plus"> Tambah</i>
				</button>
			</div> -->
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


			<table class="table  table-hover" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama pelanggan</th>
						<th>Email</th>
				    	<th>No Telepon</th>
						<th>ALamat</th>
						<!-- <th>Level</th> -->
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php  $no=1;
            
            foreach ($data_pelanggan as $key => $value) { ?>


					<tr class="text-center">
						<td><?= $no++; ?></td>
						<td><?= $value->nama_pelanggan ?></td>
                        <td><?= $value->email ?></td>
						<td><?= $value->nohp ?></td>
						<td><?= $value->alamat ?></td>
						
						<!-- <td><?= $value->password ?></td> -->
						<!-- <td><?php if($value->level==1){
                  echo '<span class="badge bg-danger">Admin</span>';
            }else{
              echo '<span class="badge bg-success">Pelanggan</span>';
            } ?></td> -->
						<td>
                        <!-- <button type="button" class="btn  btn-sm btn-outline-warning" data-toggle="modal"
								data-target="#edit<?= $value->id_user ?>"><i class="fa fa-edit"></i>Edit</button>
							<button type="button" class="btn  btn-sm btn-outline-danger" data-toggle="modal"
								data-target="#delete<?= $value->id_user ?>"><i
									class="fa fa-trash"></i>Hapus</button> -->
						</td>

					</tr>
					<?php  } ?>
				</tbody>

			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>

<!-- /.modal tamabah -->
<!-- <div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<?php 
				echo form_open('user/add');  
				 ?>
				<div class="form-group">
					<label>Nama User </label>
					<input type="text" name="nama_user" class="form-control" placeholder="Nama User" required>
				</div>
				<div class="form-group">
					<label>Username </label>
					<input type="text" name="username" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
					<label>Email </label>
					<input type="text" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label>Password </label>
					<input type="text" name="password" class="form-control" placeholder="Password" required>
				</div> -->
				<!-- <div class="form-group">
					<label>Level </label>
					<select name="level" class="form-control">
						<option value="1" selected>Admin</option>
						<option value="2">Pelanggan</option>

					</select>
				</div> -->

			<!-- </div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>


			</div>
			<?php echo form_close('');   ?> -->

		<!-- </div> -->
		<!-- /.modal-content -->
	<!-- </div> -->
	<!-- /.modal-dialog -->
<!-- </div> -->


<!-- /.modal edit -->
<!-- <?php foreach ($data_pelanggan as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_user ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<?php 
				echo form_open('user/edit/' . $value->id_pelanggan);  
				 ?> -->
				<!-- <div class="form-group">
					<label>Nama User </label>
					<input type="text" name="nama_user" value="<?= $value->nama_pealanggan ?>" class="form-control" placeholder="Nama User" required>
				</div>
				<div class="form-group">
					<label>Username </label>
					<input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
					<label>Email </label>
					<input type="text" name="email" value="<?= $value->email ?>"class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label>Password </label>
					<input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password" required>
				</div> -->
				<!-- <div class="form-group">
					<label>Level </label>
					<select name="level" value="$value->level" class="form-control">
						<option value="1" <?php if ($value->level==1) {
							echo 'selected';
						}?>>Admin</option>
						<option value="2"<?php if ($value->level==2) {
							echo 'selected';
						}?>>Pelanggan</option>

					</select>
				</div> -->

			<!-- </div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Simpan</button>


			</div>
			<?php echo form_close('');   ?> -->

		<!-- </div> -->
		<!-- /.modal-content -->
	<!-- </div> -->
	<!-- /.modal-dialog -->
<!-- </div> -->
<!-- <?php }?> -->


<!-- /.modal hapus -->
<!-- <?php foreach ($data_pelanggan as $key => $value) { ?> -->
<!-- <div class="modal fade" id="delete<?= $value->id_user ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus <?= $value->nama_user ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			<h5>Anda Yakin Untuk Menghapus User <?= $value->nama_user ?> !!! </h5>	

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="<?=base_url('user/delete/' . $value->id_user) ?>" class="btn btn-primary">Hapus</a>


			</div>
		

		</div> -->
		<!-- /.modal-content -->
	<!-- </div> -->
	<!-- /.modal-dialog -->
<!-- </div> -->
<!-- <?php }?> -->