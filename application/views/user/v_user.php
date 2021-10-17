<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data User</h3>

			<div class="card-tools">
				<a href="<?=base_url('user/add')?>" type="button" class="btn btn-primary btn-x"><i
						class="fas fa-plus"> Tambah</i>
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
                    if ($this->session->flashdata('error')){ 
                        echo '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-times"></i> Error !</h5>';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                      }
                      if (isset($error_upload)) {
                        echo '<div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-info"></i> ' . $error_upload . '</h5></div>';
                     }  
			
			?>


			<table class="table  table-hover" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama User</th>
						<th>Username</th>
						<th>Email</th>
                        <th>Gambar</th>
						<!-- <th>Password</th> -->
						<!-- <th>Level</th> -->
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php  $no=1;
            
            foreach ($user as $key => $value) { ?>


					<tr class="text-center">
						<td><?= $no++; ?></td>
						<td><?= $value->nama_user ?></td>
						<td><?= $value->username ?></td>
						<td><?= $value->email ?></td>
                        <td><img src="<?=base_url('assets/gambar/' . $value->gambar) ?>" width="80px"></td>
						<!-- <td><?= $value->password ?></td> -->
						<!-- <td><?php if($value->level==1){
                  echo '<span class="badge bg-danger">Admin</span>';
            }else{
              echo '<span class="badge bg-success">Pelanggan</span>';
            } ?></td> -->
						<td><a href="<?=base_url('user/edit/' . $value->id_user)?>" class="btn  btn-sm btn-outline-warning" > <i class="fa fa-edit"></i>Edit</a>
							<button type="button" class="btn  btn-sm btn-outline-danger" data-toggle="modal"
								data-target="#delete<?= $value->id_user ?>"><i
									class="fa fa-trash"></i>Hapus</button>
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

<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_user ?>">
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
		

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php }?>