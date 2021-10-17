<!-- Navbar -->
<header class="header-v4">

	<!-- Header desktop -->

	<div class="container-menu-desktop">
		<!-- Topbar -->
		
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					<marquee behavior="scroll" direction="left">JL. Gendekan Rt:02 Rw:09 Tlogoadi Mlati Sleman,
							Yogyakarta</marquee>
				</div>

				<div class="right-top-bar flex-w h-full">

					
				
					<?php if ($this->session->userdata('email')==""){?>
						
						<a href="<?=base_url('pelanggan/login')?>" class="flex-c-m trans-04 p-lr-25">
						Login/register
						</a>
					<?php } else {?>
						<a href= "<?=base_url('pelanggan/profil')?>" class="flex-c-m trans-04 p-lr-25">
					
						<?=$_SESSION['nama_pelanggan']?>
						<!-- <img src="<?=base_url()?>assets/gambar/avatar92.jpg" alt="Avatar" style="width:20px"> -->
						</a>
					<?php }?>
					
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop p-l-45">
				<!-- Logo desktop -->
				<a href="<?=base_url()?>" class="logo">
					<img src="<?=base_url()?>templates/images/icons/kjb.png" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
					<li>
								<a href="<?=base_url()?>">Home</a>
						
						<li>
							<a href="<?=base_url('home/kategori_home')?>">Kategori</a>
						</li>

						<!-- <li class="label1" data-label1="hot"> -->
						<li>
							
							<a href="<?=base_url('pesanan_pelanggan/pesanan')?>">Pesanan</a>
						</li>

						<li>
							<a href="<?=base_url('about')?>">About</a>
						</li>

						<li>
							<a href="<?=base_url('kontak')?>">Contact</a>
						</li>
						<?php if ($this->session->userdata('email')==""){?>
						<li>
								
						</li>
						<?php } else {?>
							<li>
								<a ><i class="far fa-user-circle"></i> <?=$this->session->userdata('nama_pelanggan')?></a>
								<ul class="sub-menu">
									<li><a href="<?=base_url('pelanggan/profil')?>"><i class="fas fa-user"></i> Profil</a></li>
									<li><a href="<?=base_url('pelanggan/logout')?>"><i class="fas fa-power-off"></i> Keluar</a></li>
									
								</ul>
						</li>
							<?php }?>
					
					</ul>
				</div>

				<?php $cart_nav = $this->m_home->get_nav();
								$jumlah_belanja=0;
								foreach ($cart_nav as $key => $value) {
									$jumlah_belanja = $jumlah_belanja + $value->jumlah;
								}
								?>

				<!-- Icon header -->


				<div class="wrap-icon-header flex-w flex-r-m h-full">
						
			
								

					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
						data-notify=<?=$jumlah_belanja?>>
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
							
						<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>
					</div>

				<!-- <div class="wrap-icon-header flex-w flex-r-m">


					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
						data-notify=<?=$jumlah_belanja?>>
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>

					<div class="flex-c-m h-full p-lr-19">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
								<i class="zmdi zmdi-menu"></i>
							</div>
						</div>

				</div> -->

			</nav>
		</div>
	</div>
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Account
						</a>
					</li>

					
				</ul>

			

			
			</div>
		</div>
	</aside>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<img src="<?=base_url()?>templates/images/icons/kjb.png" alt="IMG-LOGO">
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">


			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
				data-notify=<?=$jumlah_belanja?>>
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>


		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
					Free shipping for standard order over $100
				</div>
			</li>

			<li>
				<div class="right-top-bar flex-w h-full">
					<a href="#" class="flex-c-m p-lr-10 trans-04">
						Help & FAQs
					</a>

					<a href="#" class="flex-c-m p-lr-10 trans-04">
						My Account
					</a>

					<a href="#" class="flex-c-m p-lr-10 trans-04">
						EN
					</a>

					<a href="#" class="flex-c-m p-lr-10 trans-04">
						USD
					</a>
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">
			<li>
				<a href="index.html">Home</a>
				<ul class="sub-menu-m">
					<li><a href="index.html">Homepage 1</a></li>

				</ul>
				<span class="arrow-main-menu-m">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</span>
			</li>

			<li>
				<a href="product.html">Shop</a>
			</li>

			<li>
				<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
			</li>

			<li>
				<a href="blog.html">Blog</a>
			</li>

			<li>
				<a href="about.html">About</a>
			</li>

			<li>
				<a href="contact.html">Contact</a>
			</li>
		</ul>
	</div>

	<!-- Modal Search -->
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Keranjang Anda
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<?php 
				
				$keranjang = $this->m_home->get_cart(); if ($keranjang==null) { 	 ?>
				<li class="header-cart-item flex-w flex-t m-b-12">
					<span class="mtext-101 alert alert-danger">
						<p width="100%" direction="up" height="300px">Keranjang Belanja Anda Kosong!!!</p>
					</span>

					<img src="assets/gif/emptycart.gif" alt="" srcset="">
				</li>
				<?php	} else { ?>


				<ul class="header-cart-wrapitem w-full">
					<?php 
					 $keranjang = $this->m_home->get_cart();
					 $sub_ttl=null;
					 $all_ttl=null;
					 foreach ($keranjang as $key => $value) {
					 
					?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="<?=base_url('assets/gambar/' . $value->gambar) ?>" alt="IMG">

						</div>

						<div class="header-cart-item-txt p-t-8">

							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?=$value->nama_barang?>
							</a>

							<span class="header-cart-item-info">
								<?=$value->jumlah ?>  x   <?=rupiah($value->harga); $sub_ttl=($value->jumlah*$value->harga); ?>
							</span>

							<span class="header-cart-item-info p-t-8">
							<?=rupiah($sub_ttl); $all_ttl=$all_ttl+($value->jumlah*$value->harga)?>
							</span>
						</div>
					</li>

					<?php } ?>
				</ul>
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?=rupiah($all_ttl)?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="<?=base_url('keranjangbelanja')?>"
							class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="<?=base_url('keranjangbelanja/checkout')?>"
							class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
				<?php	} ?>



			</div>
		</div>
		
	</div>




</header>
