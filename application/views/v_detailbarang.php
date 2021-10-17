


<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


<!-- Back to top -->
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
	

<div class="container">
	<div class="bg0 p-t-75 p-b-85">
		
			<button class="how-pos3 hov3 trans-04 js-hide-modal1">
				<img src="<?=base_url()?>templates/images/icons/icon-close.png" alt="CLOSE">
			</button>

			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3"
									data-thumb="<?=base_url('assets/gambar/'.$barang->gambar)?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?=base_url('assets/gambar/'.$barang->gambar)?>"
											alt="IMG-PRODUCT" width="419"	height="500">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
											href="<?=base_url('assets/gambar/'.$barang->gambar)?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

                                <?php foreach ($gambar as $key => $value) {?>
                                
								<div class="item-slick3"
									data-thumb="<?=base_url('assets/gambarbrg/'.$value->gambar)?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?=base_url('assets/gambarbrg/'. $value->gambar)?>"
											alt="IMG-PRODUCT" width="419"	height="500">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
											href="<?=base_url('assets/gambarbrg/'.$value->gambar)?>">   
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
                                
                               <?php }?>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?= $barang->nama_barang?>
						</h4>

						<span class="mtext-106 cl0  badge bg-danger">
                        Rp. <?=number_format( $barang->harga,2,",",".")?>
						</span>

                        <p class="stext-102 cl3 p-t-23">
                      
						<B>Kategori Barang : <?= $barang->nama_kategori?></B>
                        
						</p>                

						<p class="stext-102 cl3 p-t-23">
                      
						<B>Stock  : <?= $barang->stok?></B>
                        
						</p>                


						<p class="stext-102 cl3 p-t-23">
                        <hr>
						<?= $barang->deskripsi?>
                        <hr>
						</p>

						<!--  -->
						<!-- <div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div> -->

							<!-- <div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Red</option>
											<option>Blue</option>
											<option>White</option>
											<option>Grey</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div> -->
						
										
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number"
											name=" qty" value="1" id="jumlah" min="1">
											<!-- name="num-product " value="1" min="1"> -->

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<button type="button"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail"
								
										data-nama_barang="<?=$barang->nama_barang?>"
										data-id_barang="<?=$barang->id_barang?>"
										data-harga="<?=$barang->harga?>"
										data-berat="<?=$barang->berat?>"
									
									 id="add_cart" >
										Add to cart
									</button><br>
								</div>
							</div>
						</div>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
								data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
								data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
								data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>




			</div>




		</div>

	</div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).on('click', '#add_cart', function () {
    		var id_barang = $(this).data('id_barang');
    		var nama_barang = $(this).data('nama_barang');
    		var jumlah = $('#jumlah').val();
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
                    if(result.success == true){
                      location.reload();
                    }else{
                        alert('Gagal Tambah Item')
                    }
                }
    			
    			// }
    		})
    	})


</script>	
