      <div class="col-sm-12">
      	<?php
			
			if($this->session->flashdata('pesan')){
				echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses !';

				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			};
			
			?>




      	<!-- ./row -->

      	<div class="card card-primary card-tabs">
      		<div class="card-header p-0 pt-1">
      			<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
      				<li class="nav-item">
      					<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
      						href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
      						aria-selected="true">Pesanan Masuk </a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
      						href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
      						aria-selected="false">Proses</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
      						href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
      						aria-selected="false">Dikirim</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
      						href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
      						aria-selected="false">Selesai</a>
      				</li>
      			</ul>
      		</div>
      		<div class="card-body">
      			<div class="tab-content" id="custom-tabs-one-tabContent">
      				<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
      					aria-labelledby="custom-tabs-one-home-tab">

      					<div class="card-body table-responsive p-0">
      						<table class="table table-hover text-nowrap">
      							<thead>
      								<tr>
      									<th>No Transaksi</th>
      									<th>Nama</th>
										<th>ALamat</th>
      									<th>Tanggal</th>
      									<th>Expedisi</th>
      									<th>Total Bayar</th>
      									<th>Action</th>
      								</tr>
      							</thead>
      							<?php foreach ($pesanan as $key => $value) {?>


      							<tbody>
      								<tr>
      									<td><?=$value->kode_penjualan; ?></td>
      									<td><?=$value->nama; ?></td>
										<td><?=$value->alamat; ?>	</td>
      									<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>
      									<td>
      										<b><?=$value->expedisi; ?></b><br>
      										Paket : <?=$value->paket; ?><br>
      										Ongkir : <?=rupiah($value->ongkir)?>

      									</td>



      									<td><?=rupiah($value->total_bayar) ?><br>
      										<?php
										 	if ($value->status_bayar=="pending") {
											?>
      										<span class="badge bg-warning">Menunggu Pembayaran</span><br>

      										<?php }
										else if ($value->status_bayar=="settlement") {
											?>
      										<span class="badge bg-success"> Sudah Bayar </span> <br>
      										<span class="badge bg-primary">Menunggu Confrim </span>
      										<?php }else { ?>

      										<span class="badge bg-danger">Expire/Kaldaluarsa </span><br>

      										<?php } ?>
      									</td>

      									<td>
      										<?php if ($value->status_bayar=="settlement") {?>
      										<a href="<?=base_url('admin/konfirmasi/' . $value->id_penjualan)?>"
      											class="btn btn-primary"></i>Konfirmasi</a>
      										<?php }?>

      									</td>
      								</tr>
      								<?php   } ?>
      							</tbody>
      						</table>
      					</div>
      				</div>
      				<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
      					aria-labelledby="custom-tabs-one-profile-tab">
      					<div class="card-body table-responsive p-0">
      						<table class="table table-hover text-nowrap">
      							<thead>
      								<tr>
      									<th>No Transaksi</th>
      									<th>Nama</th>
      									 <th>Alamat</th>
      									<th>Tanggal</th>
      									<th>Expedisi</th>
      									<th>Total Bayar</th>
      									<th>Action</th>
      								</tr>
      							</thead>
      							<?php foreach ($pesanan_diproses as $key => $value) {?>


      							<tbody>
      								<tr>
      									<td><?=$value->kode_penjualan; ?></td>
      									<td><?=$value->nama; ?></td>
      									 <td><?=$value->alamat; ?>	</td>
      									<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>
      									<td>
      										<b><?=$value->expedisi; ?></b><br>
      										Paket : <?=$value->paket; ?><br>
      										Ongkir : <?=rupiah($value->ongkir)?>

      									</td>



      									<td><?=rupiah($value->total_bayar) ?><br>
      										<span class="badge bg-primary">DiKemas </span>
      									</td>

      									<td>
      										<?php if ($value->status_bayar=="settlement") {?>
      										<!-- <button type="button" class="btn btn-default" data-toggle="modal"
											  data-target="#kirim<?=$value->id_penjualan?>">
      											Launch Default Modal
      										</button> -->
      										<button class="btn btn-primary" data-toggle="modal" data-target="#kirim<?=$value->id_penjualan?>">Kirim</button>
      										<?php }?>

      									</td>
      								</tr>
      								<?php   } ?>
      							</tbody>
      						</table>
      					</div>
      				</div>
      				<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
      					aria-labelledby="custom-tabs-one-messages-tab">
      					<div class="card-body table-responsive p-0">
      						<table class="table table-hover text-nowrap">
      							<thead>
      								<tr>
      									<th>No Transaksi</th>
      									<th>Nama</th>
      									<th>Tanggal</th>
      									<th>Expedisi</th>
      									<th>Total Bayar</th>
      									<th>No resi</th>
      								</tr>
      							</thead>
      							<?php foreach ($pesanan_dikirim as $key => $value) {?>


      							<tbody>
      								<tr>
      									<td><?=$value->kode_penjualan; ?></td>
      									<td><?=$value->nama; ?></td>
      									<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>
      									<td>
      										<b><?=$value->expedisi; ?></b><br>
      										Paket : <?=$value->paket; ?><br>
      										Ongkir : <?=rupiah($value->ongkir)?>

      									</td>



      									<td><?=rupiah($value->total_bayar) ?><br>
      										<span class="badge bg-success">DiKirim </span>
      									</td>

      									<td>
										 <h5><?=$value->no_resi; ?></h5> 

      									</td>
      								</tr>
      								<?php   } ?>
      							</tbody>
      						</table>
      					</div>
      				</div>
      				<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
      					aria-labelledby="custom-tabs-one-settings-tab">
      					<div class="card-body table-responsive p-0">
      						<table class="table table-hover text-nowrap">
      							<thead>
      								<tr>
      									<th>No Transaksi</th>
      									<th>Nama</th>
      									<th>Tanggal</th>
      									<th>Expedisi</th>
      									<th>Total Bayar</th>
      									<th>No resi</th>
      								</tr>
      							</thead>
      							<?php foreach ($pesanan_selesai as $key => $value) {?>


      							<tbody>
      								<tr>
      									<td><?=$value->kode_penjualan; ?></td>
      									<td><?=$value->nama; ?></td>
      									<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>
      									<td>
      										<b><?=$value->expedisi; ?></b><br>
      										Paket : <?=$value->paket; ?><br>
      										Ongkir : <?=rupiah($value->ongkir)?>

      									</td>



      									<td><?=rupiah($value->total_bayar) ?><br>
      										<span class="badge bg-success">Diterima </span>
      									</td>

      									<td>
										 <h5><?=$value->no_resi; ?></h5> 

      									</td>
      								</tr>
      								<?php   } ?>
      							</tbody>
      						</table>
      					</div>
      				</div>
      			</div>
      		</div>
      		<!-- /.card -->
      	</div>
      </div>


      <?php foreach ($pesanan_diproses as $key => $value) {?>
      <div class="modal fade" id="kirim<?=$value->id_penjualan?>">
      	<div class="modal-dialog">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h4 class="modal-title"><?=$value->kode_penjualan?></h4> <button type="button" class="close"
      					data-dismiss="modal" aria-label="Close">
      					<span aria-hidden="true">&times;</span>
      					</button>
      			</div>
      			<div class="modal-body">
      			<?php echo form_open('admin/kirim/' . $value->id_penjualan) ?>
				  <table class="table">
					<tr>
						<th>Expedisi</th>
						<th>:</th>
						<th><?=$value->expedisi?></th>
					</tr>				
					<tr>
						<th>Paket</th>
						<th>:</th>
						<th><?=$value->paket?></th>
					</tr>				
					<tr>
						<th>Ongkir</th>
						<th>:</th>
						<th> <?=rupiah($value->ongkir)?></th>
					</tr>
					<tr>
						<th>No Resi</th>
						<th>:</th>
						<th> <input name="no_resi" class="form-control" placeholder="No Resi" required></th>
					</tr>				

				  </table>
				 
					
      			</div>
      			<div class="modal-footer justify-content-between">
      				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      				<button type="submit" class="btn btn-primary">Kirim</button>
      			</div>
				  <?php echo form_close()?>
      		</div>
      		<!-- /.modal-content -->
      	</div>
      	<!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php } ?>

	  
      <!-- <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          
        </div>
       
      </div>
       -->
