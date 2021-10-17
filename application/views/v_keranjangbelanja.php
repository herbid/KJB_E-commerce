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
	 <div class="container">
	 	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
	 		<a href="<?=base_url()?>" class="stext-109 cl8 hov-cl1 trans-04">
	 			Home

	 			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
	 		</a>

	 		<span class="stext-109 cl4">
	 			<?=$title ?>
	 		</span>

	 	</div>
	 </div>

	 <?php if (validation_errors()) : ?>
	 <div class="alert alert-danger alert-dismissible fade show" role="alert">
	 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	 		<span aria-hidden="true">&times;</span>
	 	</button>
	 	<center><?php echo validation_errors(); ?></center>
	 </div>
	 <?php endif; ?>
	 <?php if ($this->session->flashdata('succses')) : ?>
	 <div class="alert alert-success alert-dismissible fade show" role="alert">
	 	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	 		<span aria-hidden="true">&times;</span>
	 	</button>
	 	<center><?php echo $this->session->flashdata('succses'); ?></center>
	 </div>
	 <?php endif; ?>


	 <!-- Shoping Cart -->
	 <div class="bg0 p-t-75 p-b-85">

	 	<div class="container">
	 		<div class="row ">


	 			<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">

	 				<div class="m-l-25 m-r--38 m-lr-0-xl">
	 					<div class="wrap-table-shopping-cart">
	 						<table class="table-shopping-cart center">
	 							<tr class="table_head text-center">
	 								<th class="column-1">Barang</th>
	 								<th class="column-2"></th>
	 								<th class="column-3">Harga</th>
	 								<th class="column-5 ">Quantity</th>
	 								<th class="column-5">Total</th>
	 								<th class="column-5">Berat</th>
	 								<th class="column-5 ">Action</th>

	 							</tr>


	 							<?php 
							 $i = 1;
							 $datchart = $this->m_home->get_cart();
							 $sub_ttl=null;
							 $all_ttl=null;
							 $berat=null;
							 foreach ($datchart as $key => $value) {
							//  echo form_hidden($i.'[rowid]', $items['rowid']); 
							 
							 
							 ?>

	 							<tr class="table_row ">
	 								<td class="column-1">
	 									<div class="how-itemcart1">
	 										<img src="<?php echo base_url('assets/gambar/' . $value->gambar) ?>"
	 											alt="IMG">
	 									</div>
	 								</td>
	 								<td class="column-2"><?php echo $value->nama_barang; ?></td>
	 								<td class="column-3 ">
	 									<?=rupiah($value->harga); $sub_ttl= $sub_ttl+($value->jumlah*$value->harga); ?>
	 								</td>
	 								<td class="column-5	">
	 									<!-- <div class="wrap-num-product flex-w m-l-auto m-r-0">
										<button class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" id="jumlah_item_update
											">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</button>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty"
										 value=" -->
	 									<?=$value->jumlah; $berat=$berat+($value->jumlah*$value->berat) ?>
	 									<!-- " min="0">

										<button class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</button>
									</div> -->
	 								</td>
	 								<td class="column-5 ">
	 									<?= rupiah($value->jumlah*$value->harga) ?>
	 								</td>

	 								<td class="column-5 ">
	 									<?php echo ($berat); ?> gram
	 								</td>
	 								<td class="column-5 ">
	 									<a href="<?php echo base_url('keranjangbelanja/del/'.$value->id_keranjang) ?>"
	 										onclick="return confirm('yakin Ingin Menghapus Data ?')"
	 										class="btn btn-danger btn-sm">
	 										<i class="fa fa-trash-o"></i>Hapus
	 									</a>&nbsp;

	 									<!-- <a data-modal="modal" id="update_cart" data-modal-id="#edit_jumlah"  
										class="btn btn-info btn-sm" >
										<i class="fa fa-trash-o"></i>Update -->
	 									</a>



	 									<button type="button" class="btn btn-primary" id="update_cart" data-toggle="modal"
	 										data-id_keranjang="<?=$value->id_keranjang;?>"
	 										data-nama_barang="<?=$value->nama_barang;?>" data-harga="<?=$value->harga;?>"
	 										data-jumlah="<?=$value->jumlah;?>" data-target="#edit_jumlah">
	 										update
	 									</button>
	 									<!-- <button type="button"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
								
										data-id_keranjang="<?=$value->id_keranjang;?>"
									data-nama_barang="<?=$value->nama_barang;?>"
									data-harga="<?=$value->harga;?>"
									data-jumlah="<?=$value->jumlah;?>"
									
									 id="update_cart" >
										Update
									</button> -->

	 								</td>

	 							</tr>


	 							<?php } ?>

	 							<!-- <tr class="table_row " style="font-weight: bold; color: white !important;">
							<td colspan="3" class="column-5">Total Belanja</td>
							<td colspan="1" class="column-5">Rp. <?php echo number_format($this->cart->total(), '0',',','.') ?></td>
							</tr> -->

	 						</table>
	 					</div>


	 					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

	 						<div>
	 							<a href="<?php echo base_url('keranjangbelanja/delete') ?>"
	 								class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 btn-lg pull-right"
	 								onclick="return confirm('yakin Ingin Menghapus Semua Data 	?')">
	 								<i class="fa fa-recycle"> </i>reset
	 							</a>

	 						</div>
	 						<div class="flex-c-m stext-101 cl2 size-118  p-lr-15-tb-5">
	 							<td colspan="3" class="column-5 ">Total berat</td>
	 							<td colspan="1" class="column-5"><?php echo ($berat); ?> gram</td>
	 							<tr><br>
	 								<td colspan="3" class="column-5">Total Belanja</td>
	 								<td colspan="1" class="column-5">
	 									<?=rupiah($sub_ttl);$all_ttl=$all_ttl+($value->jumlah*$value->harga)?></td>

	 						</div>
	 					</div>

	 				</div>

	 			</div>

	 			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
	 				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
	 					<h4 class="mtext-109 cl2 p-b-30">
	 						Cart Totals
	 					</h4>

	 					<div class="flex-w flex-t bor12 p-b-13">
	 						<div class="size-208">
	 							<span class="stext-110 cl2">
	 								Subtotal:
	 							</span>
	 						</div>

	 						<div class="size-209">
	 							<span class="mtext-110 cl2">
	 								<?=rupiah($sub_ttl);$all_ttl=$all_ttl+($value->jumlah*$value->harga)?>
	 							</span>
	 						</div>
	 					</div>

	 					<div class="flex-w flex-t bor12 p-b-13">
	 						<div class="size-208">
	 							<span class="stext-110 cl2">
	 								Total Berat:
	 							</span>
	 						</div>

	 						<div class="size-209">
	 							<span class="mtext-110 cl2">
	 								<?php echo ($berat); ?> gram
	 							</span>
	 						</div>
	 					</div>


	 					<div class="flex-w flex-t bor12 p-t-15 p-b-30">

	 					</div>

	 					<s></s>

	 					<a href="<?=base_url('keranjangbelanja/checkout')?>"
	 						class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
	 						Proceed to Checkout
	 					</a>
	 				</div>
	 			</div>


	 		</div>
	 	</div>
	 </div>




	 <!-- Modal -->
	 <div class="modal fade" id="edit_jumlah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 	aria-hidden="true">
	 	<div class="modal-dialog modal-dialog-centered" role="document">
	 		<div class="modal-content">
	 			<div class="modal-header">
	 				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
	 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	 					<span aria-hidden="true">&times;</span>
	 				</button>
	 			</div>
	 			<div class="modal-body">
	 				


	 					<div class='row m-b-10'>
	 						<!-- <div class='col-4'>Nama Produk</div> -->
	 						<input id="id_keranjang" class='col-8 text-uppercase font-weight-bold' hidden></input>
	 					</div>


						 <div class='row m-b-10'>
						 	<div class='col-4'>Nama Produk</div>
	 						<input id="nama_barang" class='col-8 text-uppercase font-weight-bold'>
						 </div>

						 <div class='row m-b-10'>
	 						<span class='col-4'>Harga Produk</span>
	 						<input id="harga" class="s-option__link input-text--primary-style" readonly>

	 					</div>

						 <div class='row m-b-10'>
	 						<span class='col-4'>Jumlah Produk</span>
							 <input type="number" id="jumlah_item_update" min="1" class="s-option__link input-text--primary-style">

	 					</div>

	 				<!-- <div class="col-lg-6 col-md-12">
	 					<div class="s-option">
	 						<div class="s-option__link-box">
	 							<span class="success__price">Jumlah Produk</span>
	 							
	 							<!-- `<br>
														<button class="s-option__link btn--e-white-brand-shadow" id="edit_c"  type="button">SIMPAN</button></div>` -->
	 						<!-- </div>
	 					</div>
						
	 				</div> -->
	 				<div class="modal-footer">
	 					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	 					<button type="button" id="edit_c" class="btn btn-primary">Save changes</button>
	 				</div>
	 			</div>
	 		</div>
	 	</div>

		 <script src="<?=base_url()?>template/plugins/datatables/jquery.dataTables.min.js"></script>
	 <script src="<?=base_url()?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	 <script src="<?=base_url()?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	 <script src="<?=base_url()?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	 <!-- AdminLTE App -->
	 <script src="<?=base_url()?>template/dist/js/adminlte.min.js"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	 <script>

$(document).on('click','#update_cart', function(){
	
        var id_keranjang = $(this).data('id_keranjang');
        var nama_barang = $(this).data('nama_barang');
        var harga = $(this).data('harga');
		var jumlah = $(this).data('jumlah');
		// var gambar = $(this).data('gambar');
	//	var total = $(this).data('jumlah')*$(this).data('harga');
       $('#id_keranjang').val(id_keranjang);
		$('#nama_barang').val(nama_barang);
		$('#harga').val(harga);
		// $('#gambar').val(gambar);
		$('#jumlah_item_update').val(jumlah);
	//	$('#total_harga').val(total);

      })

function hitung_edit_modal(){		
			var harga =  $('#harga').val()
			var jumlah =  $('#jumlah_item_update').val()

			total = jumlah*harga
				$('#total_harga').val(total)
			}
$(document).on('keyup mousup', '#harga,#jumlah_item_update',function(){
			hitung_edit_modal()
			})

	$(document).on('click', '#edit_c', function () {
			var id_keranjang = $('#id_keranjang').val()		
			var jumlah = $('#jumlah_item_update').val()
			var harga = $('#harga').val()
		//	var total = $('#total_harga').val()
    		$.ajax({
                type: 'POST',
    			url: '<?=site_url('Keranjangbelanja/edit')?>',
    			data: {
					'edit_c' : true,
    				'id_keranjang': id_keranjang,
				//	'total':total,
				'harga':harga,
					'jumlah':jumlah
					},
    			dataType: 'json',
				success: function(result){
					console.log(result);
                    if(result.success == true){
                        location.reload();
                        alert('Berhasil Update Item Belanja')
						$('#edit_jumlah').modal('hide');
                    }else{
                        alert('Gagal Update Item Belanja')
                    }
                }
    		})
    	})
</script>
