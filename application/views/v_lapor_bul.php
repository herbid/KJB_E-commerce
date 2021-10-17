<div class="col-12">
	<!-- Main content -->
	<div class="invoice p-3 mb-3">
		<!-- title row -->
		<div class="row">
			<div class="col-12">
				<h4>
					<i class="fas fa-globe"></i> <?=$title?>
					<small class="float-right">Date:<?=$bulan?>/<?=$tahun?></small>
				</h4>
			</div>
			<!-- /.col -->
		</div>
		<!-- info row -->

		<div class="row">
			<div class="col-12 table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Transaksi</th>
							<th>Barang</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
					<?php  $no =1;
           			 $total=0;
                    foreach ($laporan as $key => $value) {
						$total=$total+$value->total_bayar;
                      ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->kode_penjualan?></td>
							<td><?= $value->nama_barang?></td>
							<td><?= rupiah($value->harga)?></td>
							<td><?= $value->jumlah?></td>
							<td><?=rupiah($value->total_bayar)?></td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
					Total : <?=rupiah($total)?>
				</div>
				<!-- /.col -->
			</div>
	
		<!-- /.row -->


		<!-- /.row -->

		<!-- this row will not appear when printing -->
		<div class="row no-print">
			<div class="col-12">
				<button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>

			</div>
		</div>
	</div>
	<!-- /.invoice -->
</div><!-- /.col -->

