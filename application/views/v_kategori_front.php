<link rel="stylesheet" href="<?=base_url()?>template/dist/css/adminlte.min.css">

<!-- Product -->
<!-- <form class="bg0 p-t-75 p-b-85">
		<div class="container"> -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">

			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<?php $kategori = $this->m_home->get_all_data_kategori();?>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>
				<?php foreach ($kategori as $key => $value) {?>
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?=$value->id_kategori ?>">
					<?= $value->nama_kategori ?>
				</button>
				<?php } ?>

			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<!-- <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Filter
					</div> -->

				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
						placeholder="Search">
				</div>
			</div>

			<!-- Filter -->
			<!-- <div class="dis-none panel-filter w-full p-t-10">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
					<div class="filter-col1 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Sort By
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									Default
								</a>
							</li>


						</ul>
					</div>
                    
					<div class="filter-col2 p-r-15 p-b-27">
						<div class="mtext-102 cl2 p-b-15">
							Price
						</div>

						<ul>
							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
									All
								</a>
							</li>

							<li class="p-b-6">
								<a href="#" class="filter-link stext-106 trans-04">
									$0.00 - $50.00
								</a>
							</li>


						</ul>
					</div>



				
					</div>
				</div>
			</div> -->
		</div>

		<div class="row isotope-grid">
			<?php foreach ($barang as $key => $value) {?>
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?=$value->id_kategori?>">

				<!-- Block2 -->
				<div class="block2">
					<div class="block2-pic hov-img0">
						<a href="product-detail.html" class="stext-104 cl4  hov-cl1 trans-04 js-name-b2 p-b-6">

						</a>
						<img src="<?=base_url('assets/gambar/'. $value->gambar)?>" alt="IMG-PRODUCT" width="296"
							height="367">

						<a href="<?=base_url('home/detailbarang/'.$value->id_barang)?>"
							class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
							Lihat Barang
						</a>
					</div>

					<div class="block2-txt flex-w flex-t p-t-14">
						<div class="block2-txt-child1 flex-col-l ">
							<a href="<?=base_url('home/detailbarang/'.$value->id_barang)?>"
								class="stext-104 cl4  hov-cl1 trans-04 js-name-b2 js-name-detail p-b-6">
								<?= $value->nama_barang ?>
							</a>
							<!-- <span class="stext-105 cl3"> -->
							<span class="stext-105 cl3 hov-cl1  bg-danger ">
								Rp. <?=number_format( $value->harga,2,",",".")?>
							</span>

						</div>
						<div class="block2-txt-child2 flex-r p-t-3">


							<!-- <div class=" flex-r p-t-8"> -->
							<?php if ($this->session->userdata('email')==""){?>
							<div class="text-right">

								<button type="button" class=" btn btn-sm btn-primary "
									data-nama_barang="<?=$value->nama_barang?>" data-id_barang="<?=$value->id_barang?>"
									data-harga="<?=$value->harga?>" data-berat="<?=$value->berat?>" data-jumlah="1"
									id="add_cart">
									<i class="fa fa-cart-plus"> </i></button>



							</div>
							<!-- </div> -->
							<?php } else {?>
							<div class="text-right">
								<button type="button" class=" btn btn-sm btn-primary js-addcart-detail"
									data-nama_barang="<?=$value->nama_barang?>" data-id_barang="<?=$value->id_barang?>"
									data-harga="<?=$value->harga?>" data-berat="<?=$value->berat?>" data-jumlah="1"
									id="add_cart">
									<i class="fa fa-cart-plus"> </i></button>
							</div>
							<?php
											
												}?>

							<!-- </div> -->



							<!-- <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
								<img class="icon-heart1 dis-block trans-04"
									src="<?=base_url()?>templates/images/icons/icon-heart-01.png" alt="ICON">
								<img class="icon-heart2 dis-block trans-04 ab-t-l"
									src="<?=base_url()?>templates/images/icons/icon-heart-02.png" alt="ICON">


							</a> -->


						</div>
					</div>
				</div>
			</div>





			<?php } ?>

		</div>


		<!-- Pagination -->

		<!-- Load more -->

	</div>

</div>
<!-- Modal -->
<div class="modal fade" id="login_dulu">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Untuk Melanjutkan Aktivitas Selanjutnya Di Mohon Login Terlebih Dahulu !!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="<?=site_url('pelanggan/login')?>" type="button" class="btn btn-primary">Login</a>
			</div>
		</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
	
$(document).on('click', '#add_cart', function () {
	
    		var id_barang = $(this).data('id_barang');
    		var nama_barang = $(this).data('nama_barang');
    		var jumlah = $(this).data('jumlah');
    		var harga = $(this).data('harga');
			var berat = $(this).data('berat');

    		$.ajax({
				
                type: 'POST',
			
    			url: '<?=site_url('keranjangbelanja/proses_keranjang')?>',
				
    			data: {
					'add_cart': true,
    				'id_barang': id_barang,
					'berat':berat,
    				'nama_barang': nama_barang,
    				'harga': harga,	
    				'jumlah': jumlah,
    			},
    			dataType: 'json',
				
				success: function(result){
					if (result.status == "blmlogin") {
    					$('#login_dulu').modal('show');

    				}  else{
						if(result.success == true ){
                      
							location.reload();
						}else{
							alert('Gagal Tambah Item')
						}
					}
                   
                }
    			
    			// }
    		})
    	})
		


	// 	$('.js-addcart-detail').each(function () {
			
	// 	var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
		
	// 	$(this).on('click', function () {
			
	// 		swal(nameProduct, "ditambahkan ke keranjang !", "success",);
	// 	});
	// });
	$('.js-addcart-detail').each(function () {
			
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			
			$(this).on('click', function () {
				
				swal(nameProduct, "ditambahkan ke keranjang !", "success",);
			});
		});


</script>	
