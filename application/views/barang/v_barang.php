<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Barang</h3>

			<div class="card-tools">
				<a href="<?=base_url('barang/add')?>" type="button" class="btn btn-primary btn-x"><i
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
			
			?>


			<table class="table  table-hover" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Stock</th>
						<th>Gambar</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php  $no=1;            
            foreach ($barang as $key => $value) { ?>


					<tr class="text-center">
						<td><?= $no++; ?></td>
						<td><?= $value->nama_barang ?> : (  <?= $value->berat ?> gram) </td>
						<td><?= $value->nama_kategori ?></td>
						<td>Rp. <?=number_format( $value->harga,2,",",".")?></td>
						<td><?=$value->stok?></td>
						<td><img src="<?=base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                        
						<td>
                            <a href="<?=base_url('barang/edit/' . $value->id_barang)?>" class="btn  btn-sm btn-outline-warning" > <i class="fa fa-edit"></i>Edit</a>
							<!-- <a href="" class="btn  btn-sm btn-outline-danger" ><i class="fa fa-trash"></i>Hapus</a> -->
							<button type="button" class="btn  btn-sm btn-outline-danger" data-toggle="modal"
							data-target="#delete<?= $value->id_barang ?>"><i class="fa fa-trash"></i>Hapus</button>
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


<!-- /.modal hapus -->
<?php foreach ($barang as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_barang ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus <?= $value->nama_barang ?></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			<h5>Anda Yakin Untuk Menghapus Hapus <?= $value->nama_barang ?> !!! </h5>	

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="<?=base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-primary">Hapus</a>


			</div>
		
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<?php }?>