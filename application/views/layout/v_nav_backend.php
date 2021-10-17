<!-- Main Sidebar Container -->
<!--  -->
<?php 
// Loading konfigurasi website
// $site = $this->m_user->listing();
 ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?=base_url('admin')?>" class="brand-link">
		<img src="<?=base_url()?>assets/gambar/kjb2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

		<span>admin</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?=base_url('assets/gambar/' . $this->m_user->listing()->gambar) ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"> <?=$_SESSION['nama_user']?> </a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-item">
					<a href="<?=base_url('admin')?>" class="nav-link <?php if($this->uri->segment(1) =='admin' and 
										$this->uri->segment(2)=="") {
                                                            echo "active";
                                                             } ?> ">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?=base_url('kategori')?>" class="nav-link <?php if($this->uri->segment(1) =='kategori') {
                                                            echo "active";
                                                             } ?> ">
						<i class="nav-icon fas fa-list-alt"></i>
						<p>
							Kategori

						</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?=base_url('barang')?>" class="nav-link <?php if($this->uri->segment(1) =='barang') {
                                                            echo "active";
                                                             } ?> " class="nav-link ">
						<i class="nav-icon fas fa-box-open"></i>
						<p>
							Barang
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?=base_url('gambarbrg')?>" class="nav-link <?php if($this->uri->segment(1) =='gambarbrg') {
                                                            echo "active";
                                                             } ?> " class="nav-link ">
						<i class="nav-icon fas fa-image"></i>
						<p>
							Gambar Barang
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?=base_url('admin/pesanan_masuk')?>" class="nav-link <?php if($this->uri->segment(2) =='pesanan_masuk' and 
										$this->uri->segment(1)=='admin') {
                                                            echo "active";
                                                             } ?> " class="nav-link ">

						<i class="nav-icon fas fa-cart-arrow-down"></i>
						<p>
							Pesanan Masuk
						</p>
					</a>
				</li>


				<!-- <li class="nav-item">
					<a href="<?=base_url('laporan')?>" class="nav-link <?php if($this->uri->segment(1) =='laporan') {
                                                            echo "active";
                                                             } ?> ">
						<i class="nav-icon fas fa-scroll"></i>
						<p>
							Laporan

						</p>
					</a>
				</li> -->

				<li class="nav-item">
					<a href="<?=base_url('laporan_test')?>" class="nav-link <?php if($this->uri->segment(1) =='laporan_test') {
                                                            echo "active";
                                                             } ?> ">
						<i class="nav-icon fas fa-scroll"></i>
						<p>
							Laporan

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?=base_url('admin/set_lokasi')?>"  class="nav-link <?php if($this->uri->segment(2) =='set_lokasi' and 
										$this->uri->segment(1)=='admin') {
                                                            echo "active";
                                                             } ?> " class="nav-link ">
					<i class="nav-icon fas fa-map-marked-alt"></i>
						<p>
							Setting Lokasi

						</p>
					</a>
				</li>


				<li class="nav-item">
					<a href="<?=base_url('user')?>" class="nav-link <?php if($this->uri->segment(1) =='user') {
                                                            echo "active";
                                                             } ?> ">
						<i class="nav-icon fas fa-users"></i>
						<p>
							User

						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?=base_url('admin/data_pelanggan')?>" class="nav-link <?php if($this->uri->segment(2) =='data_pelanggan' and 
										$this->uri->segment(1)=='admin') {
                                                            echo "active";
                                                             } ?> " class="nav-link ">
						<i class="nav-icon fas fa-users"></i>
						<p>
							Data Pelanggan

						</p>
					</a>
				</li>

				
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-wrench"></i>
						<p>
							Konfigurasi
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=base_url('konfigurasi')?>"" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Konfigurasi Utama</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
						<a href="" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									Slider
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('konfigurasi/slider_1')?>" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Slider 1</p>
									</a>
								</li>
								<li class="nav-item">
								<a href="<?=base_url('konfigurasi/slider_2')?>" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Slider 2</p>
									</a>
								</li>
								<li class="nav-item">
								<a href="<?=base_url('konfigurasi/slider_3')?>" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Slider 3</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
						<a href="" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									Header Banner
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?=base_url('konfigurasi/kontak')?>" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>Kontak</p>
									</a>
								</li>
								<li class="nav-item">
								<a href="<?=base_url('konfigurasi/about')?>" class="nav-link">
										<i class="far fa-dot-circle nav-icon"></i>
										<p>About</p>
									</a>
								</li>
							
							</ul>
						</li>
					
					</ul>
				</li>


				<li class="nav-item">
					<a href="<?=base_url('auth/logout_user')?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Exit
						</p>
					</a>
				</li>


			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?=$title ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?=$title ?></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
