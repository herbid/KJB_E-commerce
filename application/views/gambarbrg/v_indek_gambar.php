<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Gambar Barang Pelanggan</h3>

			<div class="card-tools">
				
					
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


			<table class="table  table-hover" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Gambar</th>
						<th>Jumlah Gambar</th>

						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php $no=1;
                     foreach ($gambarbrg as $key => $value) {?>
                        <tr class="text-center">
						<td><?= $no++?></td>
						<td><?= $value->nama_barang?> </td>
						<td><img src="<?=base_url('assets/gambar/' .$value->gambar)?>" width="100px"></td>
						<td><span class="badge bg-primary"> <?= $value->jmlh_gmbr ?> </td>

						<td>
                            <a href="<?=base_url('gambarbrg/add/'. $value ->id_barang)?>" 
							class="btn  btn-sm btn-outline-success" ><i class="fas fa-plus-circle"> Tambah Gambar </i></a>
						

                        </td>
					</tr>
                    <?php }  ?>
					

				</tbody>

			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
