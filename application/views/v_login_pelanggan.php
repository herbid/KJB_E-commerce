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



	 <section class="content">
	 	<div class="bg0 p-t-75 p-b-85">
	 		<div class="container">

	 			<p class="alert alert-danger">Belum memiliki akun? Silahkan <a
	 					href="<?php echo base_url('pelanggan/register') ?>" class=""><button type="button"
	 						class="stext-104 cl0 hov-cl1 trans-04 js-name-b2 btn btn-sm btn-primary ">
	 						Silahkan Daftar Disini</button></a></p>
	 			<div class="text-right">
	 				

	 			</div>
	 			
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Login Pelanggan </h3>
				</div>
				<!-- /.card-header -->
	 			<!-- form start -->
	 			<?php 
				  echo validation_errors('<div class="alert alert-warning alert-dismissible">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
				  </button>
				  <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>','</div>')  ;

				  if ($this->session->flashdata('pesan')){ 
					echo '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-check"></i> Berhasil !</h5>';
					echo $this->session->flashdata('pesan');
					echo '</div>';
				  }

                  if ($this->session->flashdata('error')){ 
					echo '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-times"></i> Error !</h5>';
					echo $this->session->flashdata('error');
					echo '</div>';
				  }
				
				echo form_open('pelanggan/login')?>
	 			<div class="card-body">

	 				<label>E-mail</label>
	 				<div class="bor8 m-b-20 how-pos4-parent">
	 					<input class="stext-111 cl2 plh3 size-116 p-lr-28 p-r-30" value="<?=set_value('email')?>"
	 						type="text" name="email" placeholder="Your Email Address">

	 				</div>

	 				<label>Password</label>
	 				<div class="bor8 m-b-20 how-pos4-parent">
	 					<input class="stext-111 cl2 plh3 size-116 p-lr-28 p-r-30" value="<?=set_value('password')?>"
	 						type="password" name="password" placeholder="Password">

	 				</div>



	 			</div>
	 			<!-- /.card-body -->


	 			<div class="card-footer">
	 				<tr>
	 					<td></td>
	 					<td>
	 						<button type="submit"
	 							class=" stext-101 cl0 size-119 bg3 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10  ">
	 							Login
	 						</button>
	 						<a href="<?php echo base_url('pelanggan/reset_password') ?>">
	 								Lupa Password? </a>
	 					</td>
	 				</tr>

	 			</div>

	 			<?php echo form_close() ?>
	 		</div>


	 	</div>
	 	</div>
	 	</div>

	 </section>
