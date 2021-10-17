<!-- Content Wrapper. Contains page content -->

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


<div class="bg0 p-t-29 p-b-90">

	<div class="content">
		<div class="container">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Profile</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Profil</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3">

							<!-- Profile Image -->
							<!-- <div class="card card-primary card-outline">
								<div class="card-body box-profile">
									<div class="text-center">

									</div>

									<?php $dapel = $this->m_home->pelanggan_k();
                  
                  					foreach ($dapel as $key => $value) { ?>


									<h3 class="profile-username text-center"><?=$value->nama_pelanggan?></h3>



									<?php } ?>



								</div>
								
							</div> -->
							<!-- /.card -->

							<!-- About Me Box -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title"></h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
								<center>
										<i class="fas fa-money-check fa-2x"></i>
										<p class="text-muted">Pesanan Belum Terbayar</p>
										<h4><?=$tot_belumbayar?></h4>
									</center>
								
									<hr>

                  					<center>
										<i class="fas fa-box fa-2x"></i>
										<p class="text-muted">Pesanan Diproses</p>
										<h4><?=$tot_diproses?></h4>
									</center>
									<hr>
									<center>
										<i class="fas fa-shipping-fast fa-2x"></i>
										<p class="text-muted">Pesanan Dikirim</p>
										<h4><?=$tot_dikirim?></h4>
									</center>
									<hr>
									
									<center>
										<i class="fas fa-hand-holding fa-2x"></i>
										<p class="text-muted">Pesanan Dikirim</p>
										<h4><?=$tot_selesai?></h4>
									</center>
								
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
						<div class="col-md-9">
							<div class="card">
								<div class="card-header p-2">
									<ul class="nav nav-pills">
										<li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Profil</a></li>
										<li class="nav-item"><a class="nav-link" href="<?=base_url('pesanan_pelanggan/pesanan')?>">Pesanan
												Saya</a></li>

									</ul>
								</div><!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content">
										<div class="active tab-pane" id="settings">
											<?php echo form_open('pelanggan/profil', 'class="form-horizontal"'); ?>

											<div class="form-group row">
												<label for="inputName" class="col-sm-2 col-form-label">Nama</label>
												<div class="col-sm-10">
													<input type="text " name="nama_pelanggan" class="form-control" id="nama" placeholder="Name"
														value="<?php echo $pelanggan->nama_pelanggan ?>">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10">
													<input type="text" name="email" class="form-control" id="email" placeholder="Email"
														value="<?php echo $pelanggan->email ?>">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputName2" class="col-sm-2 col-form-label">Password</label>
												<div class="col-sm-10">
													<input type="password" name="password" class="form-control" id="password" placeholder="Password"
														value="<?php echo $pelanggan->password ?>">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputSkills" class="col-sm-2 col-form-label">No Telepon</label>
												<div class="col-sm-10">
													<input type="text" name="nohp" class="form-control" id="nohp" placeholder="No Telepon"
														value="<?php echo $pelanggan->nohp ?>">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
												<div class="col-sm-10">
													<textarea name="alamat" class="form-control" id="alamat"
														placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea>
												</div>
											</div>


											<div class="form-group row">
												<div class="offset-sm-2 col-sm-10">
													<button type="submit" class="btn btn-danger">Simpan</button>
													<button class="btn btn-warning" type="reset"> <i class="fas fa-redo-alt"></i></i>
														Reset</button>
												</div>
											</div>
											<?php echo form_close(); ?>
										</div>



										<!-- /.tab-pane -->






										<!-- /.tab-pane -->


										<!-- /.tab-pane -->
									</div>
									<!-- /.tab-content -->
								</div><!-- /.card-body -->
							</div>
							<!-- /.nav-tabs-custom -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
	</div>
</div>



<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="template/dist/js/demo.js"></script>





















































