<!--  -->
<!-- Title page -->

<link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="template/plugins/sweetalert2/sweetalert2.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="template/plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="template/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url()?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- DataTables -->
<script src="<?=base_url()?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url()?>template/dist/css/adminlte.min.css">



<section class="bg-img1 txt-center p-lr-15 p-tb-92"
	style="background-image: url('<?=base_url()?>assets/banner/bannerpesanan.jpg');">
	<h2 class="ltext-105 how-active1 txt-center">
		Pesanan 
	</h2>
</section>


<!-- Content page -->
<div class="bg0 p-t-29 p-b-90">
	<section class="content">
		<div class="container-fluid">

			<div class="card-body">
				<h4>Pesanan Anda</h4>
				<div class="row">

					<div class="col-5 col-sm-3">
						<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
							aria-orientation="vertical">
							<a href="<?=base_url('pelanggan/profil')?>" class="nav-link"><i
									class="fas fa-user-circle"></i> profil</a>
							<a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home"
								role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i
									class="fas fa-money-check"></i> Belum Bayar</a>
							<a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
								role="tab" aria-controls="vert-tabs-profile" aria-selected="false"><i
									class="fas fa-box"></i> Diproses</a>
							<a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
								href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
								aria-selected="false"><i class="fas fa-shipping-fast"></i> Dikirim</a>
							<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
								href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
								aria-selected="false"><i class="fas fa-clipboard-check"></i> Selesai</a>

						</div>
					</div>
					<div class="col-7 col-sm-9">
						<?php
			
			if($this->session->flashdata('pesan')){
				echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Sukses !';

				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			};
			
			?>
						<div class="tab-content" id="vert-tabs-tabContent">
							<div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
								aria-labelledby="vert-tabs-home-tab">
								<div class="card-body">
									<?php if($belum_bayar) { ?>

									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>No Transaksi</th>
												<th>Tanggal Pembeliah</th>

												<th>Status Pembayaran</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>


											<?php
								
								foreach ($belum_bayar as $key => $value) {
								//  echo form_hidden($i.'[rowid]', $items['rowid']); 
								?>
											<tr>
												<td><?=$value->kode_penjualan; ?></td>
												<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>


												<td><?php
										 	if ($value->status_bayar=="pending") {
											?>
													<span class="badge bg-warning">Menunggu Pembayaran</span>

													<?php }
										else if ($value->status_bayar=="settlement") {
											?>
													<span class="badge bg-success">Anda Sudah Bayar </span> <br>
													<span class="badge bg-primary">Menunggu Confrim </span>
													<?php }else { ?>

													<span class="badge bg-danger">Expire/Kaldaluarsa </span><br>

													<?php } ?>
												</td>


												<!-- <td> <a href="<?=$value->pdf ?>" class="btn btn-primary">Lihat bukti</a></td>  -->


												<td class="column-5 ">
													<!-- <a href="<?=base_url('pesanan_pelanggan/detail_pesanan')?>"
														class="btn btn-primary"></i>Detail</a> -->
													<button type="button" class="btn btn-primary sx" data-toggle="modal"
														data-target="#detailpesanan<?=$value->id_penjualan?>">
														<i class="far fa-eye"></i>Detail
													</button>
												</td>

											</tr>

											<?php } ?>
										</tbody>
									</table>
									<?php }else{ ?>
									<p class="alert alert-success">
										<i class="fa fa-warning"></i> Belum ada data transaksi
									</p>

									<?php } ?>

								</div>
							</div>
							<div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
								aria-labelledby="vert-tabs-profile-tab">
								<div class="card-body">

									<?php if($diproses) { ?>
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>No Transaksi</th>
												<th>Tanggal Pembeliah</th>

												<th>Status Pembayaran</th>

											</tr>
										</thead>
										<tbody>

											<?php
								
								foreach ($diproses as $key => $value) {
								//  echo form_hidden($i.'[rowid]', $items['rowid']); 
								?>
											<tr>
												<td><?=$value->kode_penjualan; ?></td>
												<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>


												<td><?php
										 	if ($value->status_bayar=="pending") {
											?>
													<span class="badge bg-warning">Menunggu Pembayaran</span>

													<?php }
										else if ($value->status_bayar=="settlement") {
											?>
													<span class="badge bg-success">Terkonfirmasi</span> <br>
													<span class="badge bg-primary">Pesanan Anda Dalam Proses </span>
													<?php }else { ?>

													<span class="badge bg-danger">Expire/Kaldaluarsa </span><br>

													<?php } ?>
												</td>


												<!-- <td> <a href="<?=$value->pdf ?>" class="btn btn-primary">Lihat bukti</a></td>  -->



											</tr>

											<?php } ?>
										</tbody>
									</table>
									<?php }else{ ?>
									<p class="alert alert-success">
										<i class="fa fa-warning"></i> Belum ada data transaksi
									</p>

									<?php } ?>
								</div>
							</div>
							<div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
								aria-labelledby="vert-tabs-messages-tab">
								<div class="card-body">

									<?php if($dikirim) { ?>
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>No Transaksi</th>
												<th>Tanggal Pembeliah</th>
												<th>Status Pembayaran</th>
												<th>No Resi</th>
												

											</tr>
										</thead>
										<tbody>

											<?php
								
								foreach ($dikirim as $key => $value) {
								//  echo form_hidden($i.'[rowid]', $items['rowid']); 
								?>
											<tr>
												<td><?=$value->kode_penjualan; ?></td>
												<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>


												<td>


													<span class="badge bg-primary">Pesanan Anda Sedang Dikirim </span>


												</td>
												<td>
													<h4><?=$value->no_resi; ?><br>
														<button type="button" class="btn btn-primary"
															data-toggle="modal"
															data-target="#diterima<?=$value->id_penjualan?>">
															Diterima
														</button>
													</h4>
												</td>

												<!-- <td> <a href="<?=$value->pdf ?>" class="btn btn-primary">Lihat bukti</a></td>  -->



											</tr>

											<?php } ?>
										</tbody>
									</table>
									<?php }else{ ?>
									<p class="alert alert-success">
										<i class="fa fa-warning"></i> Belum ada data transaksi
									</p>

									<?php } ?>
								</div>
							</div>

							<div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
								aria-labelledby="vert-tabs-settings-tab">
								<div class="card-body">

									<?php if($diterima) { ?>
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>No Transaksi</th>
												<th>Tanggal Pembeliah</th>
												<th>Status Pembayaran</th>
												<th>No Resi</th>


											</tr>
										</thead>
										<tbody>

											<?php

											foreach ($diterima as $key => $value) {
											//  echo form_hidden($i.'[rowid]', $items['rowid']); 
											?>
											<tr>
												<td><?=$value->kode_penjualan; ?></td>
												<td><?=date( "d-m-Y", strtotime($value->tanggal_beli)) ?></td>


												<td>


													<span class="badge bg-success">Proses Pembelian Selesai </span>


												</td>
												<td>
													<h4><?=$value->no_resi; ?><br>

													</h4>
												</td>

												<!-- <td> <a href="<?=$value->pdf ?>" class="btn btn-primary">Lihat bukti</a></td>  -->



											</tr>

											<?php } ?>
										</tbody>
									</table>
									<?php }else{ ?>
									<p class="alert alert-success">
										<i class="fa fa-warning"></i> Belum ada data transaksi
									</p>

									<?php } ?>
								</div>
							</div>



						</div>
					</div>
				</div>

			</div>


		</div>
	</section>




</div>

<!-- Button trigger modal -->

<?php 
 $palue = $this->m_home->cek_stts();
 foreach ($palue as $key => $value) {
				   //  echo form_hidden($i.'[rowid]', $items['rowid']); 
 ?>
<!-- Modal -->
<div class="modal fade" id="detailpesanan<?=$value->id_penjualan?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class='row m-b-10'>
					<div class='col-4'>Metode Pembayaran</div>
					<div class='col-8 text-uppercase font-weight-bold'><?=$value->metode_pembayaran; ?></div>
				</div>
				<div class='row m-b-10'>
					<div class='col-4'>Merchant</div>
					<div class='col-8 text-uppercase font-weight-bold'><?=$value->invoice; ?></div>
				</div>
				<div class='row m-b-10'>
					<div class='col-4'>Kode Bayar</div>
					<div class='col-8 text-uppercase font-weight-bold'><?=$value->pembayaran; ?> </div>
				</div>
				<div class='row m-b-10'>
					<div class='col-4'>Jumlah Bayar</div>
					<div class='col-8 text-uppercase font-weight-bold'><?=rupiah($value->total_bayar)?></div>
				</div>

				<div class='row m-b-10'>
					<div class='col-4'>KURIR & PAKET</div>
					<div class='col-8 text-uppercase font-weight-bold'><?=$value->expedisi; ?>&nbsp<?=$value->paket; ?>
					</div>
				</div>
				<div class='row m-b-10'>
					<div class='col-4'>Nama Penerima </div>
					<div class='col-8 text-uppercase font-weight-bold'><?=$value->nama ?>
					</div>
				</div>

				<div class='row m-b-10'>
					<div class='col-4'>Alamat</div>
					<div class='col-8 text-uppercase font-weight-bold'><?=$value->alamat ?></div>
				</div>
				<div class='row m-b-10'>
					<div class='col-4'>Petunjuk Pembayaran</div>
					<div class='col-8 text-uppercase font-weight-bold'><a href="<?=$value->pdf ?>">Lihat</a></div>
				</div>
				<!-- <td> </td>  -->
			</div>

		</div>
	</div>
</div>
<?php } ?>

<?php foreach ($dikirim as $key => $value) { ?>

<div class="modal fade" id="diterima<?=$value->id_penjualan?>" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Perhatian!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				pastikan Barang sudah benar-benar Diterma !!.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<a href="<?=base_url('pesanan_pelanggan/diterima/'.$value->id_penjualan )?>"
					class="btn btn-primary">Ya</a>
			</div>
		</div>
	</div>
</div>
<?php }?>


<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="template/dist/js/demo.js"></script>
