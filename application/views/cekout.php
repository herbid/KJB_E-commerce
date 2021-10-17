<script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-mUGxvfKsVfzRKuCF"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Main content -->

<form id="payment-form" method="post" action="<?=site_url()?>snap/finish">
      <input type="hidden" name="result_type" id="result-type" value=""></div>
      <input type="hidden" name="result_data" id="result-data" value=""></div>	
	  
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



<div class="bg0  p-b-85">
	<div class="container">

		<div class="invoice p-3 mb-3">
			<!-- title row -->
			<div class="row">
				<div class="col-12">
					<h4>
						<i class="fas fa-cart"></i>
						<?php 
						$palue = $this->m_home->get_cart();
						$itel = $this->m_home->pelanggan_k();
						$no_transaksi="KJB-".random_string('numeric',5).date('dmY');?> 
						<small class="float-left"><b></b></small>
						<small class="float-right"><?=$tgl=date('Y-m-d')?></small>
					</h4>
				</div>
				<!-- /.col -->
			</div>
			<div class="row invoice-info">
		
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?=$this->session->userdata('nama_pelanggan')?></strong><br>
                   	<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                   <?=$this->session->userdata('email')?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Order ID:</b> <?=$no_transaksi?><br>
                  <b>Payment Due:</b> <?=$tgl?><br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->

				
              </div>
              <!-- /.row -->
			<!-- /.row -->

			<!-- Table row -->
			<div class="row">
			<div class=" col-lg-12 col-14 m-lr-auto m-b-50 ">
				
				<div class="m-l-10 m-r--38 m-lr-0-xl">
				<div class="wrap-table-shopping-cart">
					<table class=" table-shopping-cart center">
						
							<tr class="table_head">
								<th  class="column-1 ">Qty</th>
								<th  class="column-6 ">Barang</th>
								<th class="column-6 ">Harga </th>
								<th class="column-6 ">Total Harga</th>
								<th class="column-6 ">berat</th>
							</tr>
						
						
							<?php $i = 1; ?>

							<?php 

			
                    $tober=0;
					$palue = $this->m_home->get_cart();
					$sub_ttl=null;
					$berat=null;
					$all_ttl=null;
					foreach ($palue as $key => $value) {
					
				   ?>



								<tr class="table_row_2 ">
								<td  class="column-1 "><?=$value->jumlah?></td>
								<td class="column-6 "><?=$value->nama_barang?></td>
								<td class="column-6 "><?=rupiah($value->harga)?></td>
								<td class="column-6 "><?=rupiah($value->harga*$value->jumlah); $sub_ttl= $sub_ttl+($value->jumlah*$value->harga);?>
								</td>
								<td class="column-6 "><?=$value->berat*$value->jumlah;  $berat=$berat+($value->jumlah*$value->berat);?>
									gram </td>
								<!-- <td>$64.50</td> -->
								<tr>
							<?php } ?>
							
						
					</table>
				</div>
			</div>
			</div>
				<!-- /.col -->
			</div>
		
			<!-- /.row -->

			<div class="row">
				<!-- accepted payments column -->
				<div class="col-8">
					<p class="lead"></p>
					<div class="col-sm-12 ">
						<div class="row">
							<div class="col-sm-6">
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Tujuan
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="provinsi" id="provinsi">

										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="kota" id="kota">

										</select>
										<div class="dropDownSelect2"></div>
									</div>



								</div>
							</div>


							<div class="col-sm-6">
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Jasa Pengiriman
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="ekspedisi" id="ekspedisi">

										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="paket" id="paket">

										</select>
										<div class="dropDownSelect2"></div>
									</div>

								</div>


							</div>


						</div>

					</div>
					

				<?php foreach ($itel as $key => $value) {?>
	
					<div class="col-sm-12" hidden>
						<div class="p-t-15">
							<span class="stext-112 cl8" hidden>
								Nama
							</span>
							
							<div class="bor8 bg0 m-b-12 m-t-9" hidden>
						<input class="stext-111 cl2 plh3 size-116 p-lr-28 p-r-30" value="<?=$value->nama_pelanggan?>" id="nama" name="nama" placeholder="nomor telepon" hidden> 
						</div>

						</div>
					</div>
					<div class="col-sm-12">
						<div class="p-t-15">
							<span class="stext-112 cl8">
								Alamat
							</span>
							
							<div class="bor8 bg0 m-b-12 m-t-9">
						<input class="stext-111 cl2 plh3 size-116 p-lr-28 p-r-30" value="<?=$value->alamat?>" id="alamat" name="alamat" placeholder="Alamat">
						</div>

						</div>
					</div>
						<div class="col-sm-12">
						<div class="p-t-15">
							<span class="stext-112 cl8">
								nomor telepin
							</span>
							
							<div class="bor8 bg0 m-b-12 m-t-9">
						<input class="stext-111 cl2 plh3 size-116 p-lr-28 p-r-30" value="<?=$value->nohp?>" id="nohp" name="nohp" placeholder="nomor telepon">
						</div>

						</div>
					</div>
					<div class="col-sm-12"hidden>
						<div class="p-t-15"hidden>
							<span class="stext-112 cl8"hidden>
								Email
							</span>
							
							<div class="bor8 bg0 m-b-12 m-t-9"hidden>
						<input class="stext-111 cl2 plh3 size-116 p-lr-28 p-r-30" value="<?=$value->email?>" id="email" name="email" placeholder="nomor telepon" hidden>
						</div>

						</div>
					</div>
				<?php }?>
				</div>


				<!-- /.col -->
				<div class="col-4">
					<!-- <p class="lead">Amount Due 2/22/2014</p> -->

					<div class="table-responsive">
						<table class="table">
							<tr>
								<th style="width:50%">Subtotal:</th>
								<td><?=rupiah($sub_ttl)?></td>
							</tr>
							<tr>
								<th>Total Berat</th>
								<td><?= $berat?> Gramm</td>
							</tr>
							<tr>
								<th>Ongkos Kirim:</th>
								<td><label id="ongkir"></label></td>
							</tr>
							<tr>
								<th>Total:</th>
								<td><label id="total_bayar"></label></td>
							</tr>
						</table>
					</div>

					<div class="row no-print">
							<div class="col-12">

								<button type="button" id="pay-button" class="btn btn-success float-right"><i
										class="far fa-credit-card"></i>
									Checkout
								</button>

							</div>

			</div>
				</div>
				
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- this row will not appear when printing -->
			<table>
				<tr>
					<!-- <th>Estimasi</th>
				<th>Ongkir</th>
				<th>AllTTL</th>
				<th>TTLBerat</th>
				<th>SubTTL</th>
				<th>kodeTranski</th> -->
				</tr>
				<tbody>
				<td></td>
					<td><input type="text" id="estimasi" name="estimasi" hidden></td>
					<td><input type="text" id="ongkir_r" name="ongkir_r" hidden></td>
					<td><input type="text" id="all_total" name="all_total" hidden></td>
					<td><input type="text" id="berat" name="berat" value="<?=$berat?>" hidden></td>
					<td><input type="text" id="sub_total" name="sub_total" value="<?=$sub_ttl?>" hidden></td>
					<td><input type="text" id="notr" name="notr" value="<?=$no_transaksi?>" hidden></td>
				</tbody>
			</table>

			<table>
				<tr>
					<!-- <th>tgl</th> -->
				</tr>
				<tbody> 
					<td><input type="text" id="tgl" value="<?=$tgl?>" hidden></td>
				
				</tbody>
			</table>
		
		</div>
		<!-- /.invoice -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>

</div>
</div>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
	$(document).ready(function () {
		$.ajax({
			type: "POST",
			url: "<?=base_url('rajaongkir/provinsi')?>",
			success: function (hasil_provinsi) {
				// console.log(hasil_provinsi);
				$("select[name=provinsi]").html(hasil_provinsi);
			}

		});

		$("select[name=provinsi]").on("change", function () {
			var id_pilih_provinsi = $("option:selected", this).attr("id_provinsi");

			$.ajax({
				type: "POST",
				url: "<?=base_url('rajaongkir/kota') ?>",
				data: 'id_provinsi=' + id_pilih_provinsi,
				success: function (hasil_kota) {
					$("select[name=kota]").html(hasil_kota);
				}
			});

		});
		$("select[name=kota]").on("change", function() {
			$.ajax({
				type: "POST",
				url: "<?=base_url('rajaongkir/jasa_pengiriman_ekspedisi') ?>",
				
				success: function (hasil_ekspedisi) {
					$("select[name=ekspedisi]").html(hasil_ekspedisi);
				}
			});
		});

		$("select[name=ekspedisi]").on("change", function() {
			//mendapatkan ekspedisi
			var ekspedisi_terpilih= $("select[name=ekspedisi]").val()
			//mendapatkan id kota tujuan
			var $id_kota_tujuan_terpilih=$("option:selected","select[name=kota]").attr('id_kota');
			//mengambil data ongkir
			var total_berat=<?=$berat?>;
			
			$.ajax({
				type: "POST",
				url: "<?=base_url('rajaongkir/paket') ?>",
				data : "ekspedisi="+ekspedisi_terpilih+'&id_kota='+$id_kota_tujuan_terpilih+'&berat='+total_berat,
				success: function (hasil_paket) {
					$("select[name=paket]").html(hasil_paket);
				}
			});
		});

		$("select[name=paket]").on("change", function() {
			//menampilkan ongkir
			var dataongkir=$("option:selected",this).attr('ongkir');
			var reverse = dataongkir.toString().split('').reverse().join(''),
			ribu_ongkir=reverse.match(/\d{1,3}/g);
			ribu_ongkir=ribu_ongkir.join(',').split('').reverse().join('');

			$("#ongkir").html("Rp . "+ribu_ongkir);
			//ngehitung total
			// var ongkir=$("option:selected",this).attr('ongkir');
			var dt_total_bayar	= parseInt(dataongkir)+parseInt(<?=$sub_ttl ?>);
			var reverse2=dt_total_bayar.toString().split('').reverse().join(''),
			ribu_tober=reverse2.match(/\d{1,3}/g);
			ribu_tober=ribu_tober.join(',').split('').reverse().join('');
			$("#total_bayar").html("Rp . "+ribu_tober);

			///estimasi dan ongkir yang di oper ke input masuk ke-db
			var estimasi =  $("option:selected", this).attr('estimasi');
			$("input[name=estimasi]").val(estimasi);
			$("input[name=ongkir_r]").val(dataongkir);
			$("input[name=all_total]").val(dt_total_bayar);

		});

	});


	//prosescheckout

	// $(document).on('click','#pay-button',function(){
    //     var estimasi = $('#estimasi').val()
    //     var ongkir_r = $('#ongkir_r').val()
    //     var all_total = $('#all_total').val()
    //     var berat = $('#berat').val()
    //     var sub_total = $('#sub_total').val()
	// 	var no_transaksi = $('#no_transaksi').val()
	// 	var kota = $('#kota').val()
	// 	var provinsi = $('#provinsi').val()
	// 	var ekspedisi = $('#ekspedisi').val()
	// 	var paket = $('#paket').val()
	// 	var tgl = $('#tgl').val()
	// 	var alamat = $('#alamat').val()
    //     var nohp = $('#nohp').val()
	// 	//var alamat = $('#alamat').val()
		
    //    // var uang_muka = $('#uang_muka').val()

  
    //         if(confirm('Yakin Proses Transaksi ini ?')){
    //             $.ajax({
    //                 type:'POST',
    //                 url:'<?=site_url('transaksi/proses')?>',
    //                 data : {'pay-button':true,
	// 					'estimasi':estimasi,
	// 					'ongkir_r':ongkir_r,
	// 					'all_total':all_total,
	// 					'berat':berat,
    //                     'sub_total':sub_total,
	// 					'no_transaksi':no_transaksi,
	// 					'kota':kota,
	// 					'provinsi':provinsi,
    //                     'ekspedisi':ekspedisi,
	// 					'paket':paket,
	// 					'alamat':alamat,
	// 					'nohp':nohp,
	// 					'tgl':tgl
	// 				},
    //                 dataType:'json',
    //                 success:function(result){
    //                         if(result.success){
    //                             alert('transaksi berhasil');
    //                         }else{
    //                             alert('transaksi gagal');
    //                         }
    //                         location.href='<?=site_url('home')?>'
    //                 }
    //             })
    //         }
        
    // })

	$('#pay-button').click(function (event) {
      event.preventDefault();
	    var estimasi = $('#estimasi').val()
        var ongkir_r = $('#ongkir_r').val()	
        var all_total = $('#all_total').val()
        var berat = $('#berat').val()
        var sub_total = $('#sub_total').val()
		var notr = $('#notr').val()
		var kota = $('#kota').val()
		var provinsi = $('#provinsi').val()
		var ekspedisi = $('#ekspedisi').val()
		var paket = $('#paket').val()
		var tgl = $('#tgl').val()
		var nama = $('#nama').val()
		var alamat = $('#alamat').val()
		var email = $('#email').val()
		var nohp = $('#nohp').val()
     // $(this).attr("disabled", "disabled");
    
    $.ajax({
		type:"POST",
      url: '<?=site_url()?>snap/token',
	  data:{
		estimasi:estimasi,
		ongkir_r:ongkir_r,
		all_total:all_total,
		berat:berat,
        sub_total:sub_total,
		notr:notr,
		kota:kota,
		provinsi:provinsi,
        ekspedisi:ekspedisi,
		paket:paket,
		email:email,
		nama:nama,
		alamat:alamat,
		nohp:nohp,
		tgl:tgl,					
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
