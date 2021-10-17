

	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" />
	<!-- Load file css jquery-ui -->
	<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
	


	<div class="col-md-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Laporan Harian</h3>

			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form method="get" action="">
					<div class="row">

						<div class="col-sm-4">
							<!-- text input -->
							<div class="form-group">
								<label>Filter Berdasarkan</label><br>
								<select class="custom-select" name="filter" id="filter" class="form-control">
									<option value="">Pilih</option>
									<option value="1">Per Tanggal</option>
									<option value="2">Per Bulan</option>
									<option value="3">Per Tahun</option>
								</select>
							</div>

					
							<!-- text input -->
							<div class="form-group">

								<div id="form-tanggal">
									<label>Tanggal</label><br>
									<input type="text" name="tanggal" class="input-tanggal form-control" />
    
								</div>

							</div>
						</div>


						<div class="col-sm-4">
							<!-- text input -->
						
								<div class="form-group" id="form-bulan">
									<label>Bulan</label><br>
									<select class="custom-select" name="bulan" class="form-control">
										<option value="">Pilih</option>
										<option value="1">Januari</option>
										<option value="2">Februari</option>
										<option value="3">Maret</option>
										<option value="4">April</option>
										<option value="5">Mei</option>
										<option value="6">Juni</option>
										<option value="7">Juli</option>
										<option value="8">Agustus</option>
										<option value="9">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
								</div>
                                </div>

                                
                               
                        <div class="col-sm-4">
				
							<div class="form-group">
								<div id="form-tahun">
									<label>Tahun</label><br>
									<select class="custom-select" name="tahun" class="form-control">
										<option value="">Pilih</option>
										<?php
                                        foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                                        }
                                        ?>
									</select>

								</div>
							</div>
						</div>



					</div>
                    <div class="btn-group">
						<!-- text input -->
						<div class="form-group">
                        <button class="btn  btn-sm btn-outline-warning" type="submit">Tampilkan</button>
                        <a href="<?php echo base_url('laporan_test'); ?>" class="btn  btn-sm btn-outline-primary">Reset Filter</a>
						</div>
					
						<!-- text input -->
					
					</div>
                   
				</form>

                <div class="btn-group">
						<!-- text input -->
						<div class="form-group">
							<a href="<?php echo $url_cetak; ?>" class="btn  btn-sm btn-outline-primary">CETAK PDF</a>
							<a href="<?php echo $url_export; ?>" class="btn  btn-sm btn-outline-success">CETAK EXCEL</a>
						</div>
					
						

						
					</div>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>


    <div class="col-12">
	<!-- Main content -->
	<div class="invoice p-3 mb-3">
	<div class="row">
    <div class="row">
			<div class="col-12">
				<h4>
					<i class="fas fa-globe"></i> <?=$title?>
					<!-- <small class="float-right">Date:<?=$bulan?>/<?=$tahun?></small> -->
				</h4>
			</div>
			<!-- /.col -->
		</div>
		<div class="col-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Kode Transaksi</th>
						<th>Barang</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
                    $total=0;
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tothar=$data->harga * $data->jumlah;
            $total=$total+$tothar;
            $tgl = date('d-m-Y', strtotime($data->tanggal_beli));?>

					<tr>
						<td><?= $tgl ?></td>
                        <td><?= $data->kode_penjualan?></td>
						<td><?= $data->nama_barang?></td>
						<td><?= rupiah($data->harga)?></td>
						<td><?= $data->jumlah?></td>
						<td><?=rupiah($tothar)?></td>
					</tr>
                    <?php } 
                 } ?>
				

 	
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
	</tbody>
	<tr>
			<td colspan="5	" >Total </td>
			<td colspan="6" >  <?=rupiah($total)?></td>
		</tr>
	</table>

	</div>
	
	</div>

    </div>
	<!-- /.invoice -->
</div><!-- /.col -->
