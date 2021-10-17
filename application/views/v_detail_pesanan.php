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
	 <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
	 	data-client-key="SB-Mid-client-mUGxvfKsVfzRKuCF"></script>
	 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	 <!-- Main content -->



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



	 <div class="bg0 p-t-75 p-b-85">

	 	<div class="container">
	 		<div class="row ">


	 			<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">

	 				<div class="m-l-25 m-r--38 m-lr-0-xl">
	 					<div class="card-body">


	 						<table id="example2" class="table table-bordered table-hover">
	 							<thead>
	 								<tr>
	 									<th>No Transaksi</th>
	 									<th>No Resi</th>

	 									<th>Status Pembayaran</th>

	 								</tr>
	 							</thead>
	 							<tbody>


	 								<?php 
                   
                       
                       $dapel = $this->m_home->pelanggan_k();
                   
                       $ah=0;
                       $palue = $this->m_home->cek_stts();
                       $sub_ttl=null;
                       $berat=null;
                       $all_ttl=null;
                       foreach ($palue as $key => $value) {
                       //  echo form_hidden($i.'[rowid]', $items['rowid']); 
                       
                       
                       ?>



	 								<tr>
	 									<td><?=$value->kode_penjualan; ?></td>
	 									<td></td>


	 									<td><?=$value->status_bayar?></td>
	 									<!-- <td> <a href="<?=$value->pdf ?>" class="btn btn-primary">Lihat bukti</a></td>  -->



	 									</td>
	 								</tr>

	 								<?php } ?>
	 							</tbody>
	 						</table>

	 						
	 						vvvvv
	 					</div>

	 				</div>

	 			</div>

	 		</div>
	 	</div>
	 </div>

     <!-- Main content -->
                            <div class="content">
	 							<div class="container">
	 								<div class="row">
	 									<div class="col-lg-12">
	 										<div class="card">
	 											<div class="card-body">
	 												<h5 class="card-title">Card title</h5>

	 												<p class="card-text">
	 													Some quick example text to build on the card title and make up the
	 													bulk of the card's
	 													content.
	 												</p>

	 											</div>
	 										</div>


	 									</div>
	 									<!-- /.col-md-6 -->
	 									<div class="col-lg-6">


	 									</div>
	 									<!-- /.col-md-6 -->
	 								</div>
	 								<!-- /.row -->
	 							</div><!-- /.container-fluid -->
	 						</div>




	 </div>
	 <!-- DataTables -->
	 <script src="<?=base_url()?>template/plugins/datatables/jquery.dataTables.min.js"></script>
	 <script src="<?=base_url()?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	 <script src="<?=base_url()?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	 <script src="<?=base_url()?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	 <!-- AdminLTE App -->
	 <script src="<?=base_url()?>template/dist/js/adminlte.min.js"></script>
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
     <script>

$(document).on('click','#itik-itik', function(){

var kodebrg = $(this).data('kodebrg');
var tobar = $(this).data('tobar');
var email_p = $(this).data('email_p');
var nama = $(this).data('nama');

var nohp = $(this).data('nohp');

$('#kodebrg').val(kodebrg);
$('#tobar').val(tobar);
$('#email_p').val(email_p);
$('#nama').val(nama);
$('#nohp').val(nohp);


})

$('#pay-button').click(function (event) {
event.preventDefault();
//$(this).attr("disabled", "disabled");
var kode_trx = $('#kode_trx').val()
var ah = $('#ah').val()
var email = $('#email').val()
var nama = $('#nama').val()
var nohp = $('#nohp').val()

$.ajax({
   type:"POST",
   url: '<?=site_url()?>snap/token',
   data:{
       
       ah:ah,
       email:email,
       nama:nama,
       nohp:nohp,
       kode_trx:kode_trx,
       },
cache: false,

success: function(data) {
   //location = data;

   console.log('token = '+data);
   
   var resultType = document.getElementById('result-type');
   var resultData = document.getElementById('result-data');

   function changeResult(type,data){
   $("#result-type").val(type);
   $("#result-data").val(JSON.stringify(data));
   //resultType.innerHTML = type;
   //resultData.innerHTML = JSON.stringify(data);
   }

   snap.pay(data, {
   
   onSuccess: function(result){
       changeResult('success', result);
       console.log(result.status_message);
       console.log(result);
       $("#payment-form").submit();
   },
   onPending: function(result){
       changeResult('pending', result);
       console.log(result.status_message);
       $("#payment-form").submit();
   },
   onError: function(result){
       changeResult('error', result);
       console.log(result.status_message);
       $("#payment-form").submit();
   }
   });
}
});
});
</script>


<script>
$(function () {
$("#example1").DataTable({
"responsive": true,
"autoWidth": false,
});
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});



</script>