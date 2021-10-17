<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url(assets/slider/batik_slide.jpg);" width="1920"
				height="900">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Women Collection 2018
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								NEW SEASON
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href="product.html"
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(assets/slider/malam1.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Men New-Season
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Jackets & Coats
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="product.html"
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(assets/slider/batik2.png);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Men Collection 2018
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								New arrivals
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							<a href="product.html"
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Shop Now
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="p-b-32">
            <h3 class="ltext-105 cl5 txt-center respon1">
                Store Overview
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <?php $kategori = $this->m_home->get_all_data_kategori();?>
            <ul class="nav nav-tabs" role="tablist">
                <?php foreach ($kategori as $key => $value) {?>
                <li class="nav-item p-b-10">
                    <a class="nav-link active" data-toggle="tab" href="#<?= $value->id_kategori ?>" role="tab"><?= $value->nama_kategori ?></a>
                </li>

                <?php } ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-t-50">
                <!-- - -->
                <div class="tab-pane fade show active" id="<?php foreach ($barang as $key => $value) {?> <?= $value->id_kategori ?>  <?php } ?>" role="tabpanel">

                    <div class="wrap-slick2">
                        <div class="slick2">

                            <?php foreach ($barang as $key => $value) {?>
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <a href="product-detail.html" class="stext-104 cl4  hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <?= $value->nama_kategori ?>
                                        </a>
                                        <img src="<?=base_url('assets/gambar/'. $value->gambar)?>" alt="IMG-PRODUCT" width="296" height="367">

                                        <a href="<?=base_url('home/detailbarang/'.$value->id_barang)?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
											Lihat Barang
										</a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.html" class="stext-104 cl4  hov-cl1 trans-04 js-name-b2 js-name-detail p-b-6">
                                                <?= $value->nama_barang ?>
                                            </a>

                                            <span class="stext-104 cl0 hov-cl1 trans-04 js-name-b2  badge bg-danger ">
												Rp. <?=number_format( $value->harga,2,",",".")?>
											</span>

                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3">


                                            <!-- <div class=" flex-r p-t-8"> -->
                                            <div class="text-right">
                                                <!-- <button type="submit"
										class="stext-104 cl0 hov-cl1 trans-04 js-name-b2 btn btn-sm btn-primary js-addcart-detail 
										"> -->
                                                <button type="button" class="stext-104 cl0 hov-cl1 trans-04 js-name-b2 btn btn-sm btn-primary js-addcart-detail" data-nama_barang="<?=$value->nama_barang?>" data-id_barang="<?=$value->id_barang?>" data-harga="<?=$value->harga?>" data-berat="<?=$value->berat?>"
                                                    data-jumlah="1" id="add_cart">
													<i class="fa fa-cart-plus"> Keranjang </i></button>
                                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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