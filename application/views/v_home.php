<!-- Slider -->


<!-- Ionicons -->

<!-- Theme style -->
<link rel="stylesheet" href="template/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->

<!-- Theme style -->



<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url(<?php echo base_url('assets/slider/'.$konfigurasi->slider_1) ?>)" width="1920"
				height="900">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Selamat Datang Di
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								Kusuma Jaya Batik
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							<a href=<?php echo base_url('home/kategori_home/')?>
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Belanja Sekarang
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(<?php echo base_url('assets/slider/'.$konfigurasi->slider_2) ?>)" width="1920">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-101 cl2 respon2">
							Selamat Datang Di
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
							Kusuma Jaya Batik
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
						<a href=<?php echo base_url('about')?>
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Tentang Kami
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(<?php echo base_url('assets/slider/'.$konfigurasi->slider_3) ?>)" width="1920">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Selamat Datang Di
							</span>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
							Kusuma Jaya Batik
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
						<a href=<?php echo base_url('kontak')?>
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								Contact
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
                Produk Kami
            </h3>
        </div>

        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <?php $kategori = $this->m_home->get_all_data_kategori();?>
            <!-- <ul class="nav nav-tabs" role="tablist">
                <?php foreach ($kategori as $key => $value) {?>
                <li class="nav-item p-b-10">
                    <a class="nav-link active" data-toggle="tab" href="#<?= $value->id_kategori ?>" role="tab"><?= $value->nama_kategori ?></a>
                </li>

                <?php } ?>
            </ul> -->

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
                                       
                                        <img src="<?=base_url('assets/gambar/'. $value->gambar)?>" alt="IMG-PRODUCT" width="296" height="367">

                                        <a href="<?=base_url('home/detailbarang/'.$value->id_barang)?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
											Lihat Barang
										</a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="<?=base_url('home/detailbarang/'.$value->id_barang)?>" class="stext-104 cl4  hov-cl1 trans-04 js-name-b2 js-name-detail p-b-6">
                                                <?= $value->nama_barang ?>
                                            </a>

											<span class="stext-105 cl3 hov-cl1  bg-danger ">
												Rp. <?=number_format( $value->harga,2,",",".")?>
											</span>

                                        </div>
                                        <div class="block2-txt-child2 flex-r p-t-3">


                                            <!-- <div class=" flex-r p-t-8"> -->
											<?php if ($this->session->userdata('email')==""){?> 
                                            <div class="text-right">
											
                                                <button  type="button" class=" btn btn-sm btn-primary " data-nama_barang="<?=$value->nama_barang?>" data-id_barang="<?=$value->id_barang?>" data-harga="<?=$value->harga?>" data-berat="<?=$value->berat?>"
                                                    data-jumlah="1" id="add_cart">
													<i class="fa fa-cart-plus">  </i></button>
													
													
                                               
                                            </div>
                                            <!-- </div> -->
											<?php } else {?>
											<div class="text-right">
											 <button  type="button" class=" btn btn-sm btn-primary js-addcart-detail" data-nama_barang="<?=$value->nama_barang?>" data-id_barang="<?=$value->id_barang?>" data-harga="<?=$value->harga?>" data-berat="<?=$value->berat?>"
                                                    data-jumlah="1" id="add_cart">
													<i class="fa fa-cart-plus">  </i></button>
											</div>
													<?php
											
												}?>



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

		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="home/kategori_home" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Lihat SelengkapNya
			</a>
		</div>

    </div>
</section>

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
        <a  href="<?=site_url('pelanggan/login')?>" type="button" class="btn btn-primary">Login</a>
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


