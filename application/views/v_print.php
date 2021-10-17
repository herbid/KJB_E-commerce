<html>
<head>
	<title>Cetak PDF</title>
	<style>
			table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 14%;
		}
		p {
		    margin: 2;
		    padding: 2;
		}
		.laporan {
    font-weight: bold;
    color: #00F;
    font-size: 18px;
}
.laporan table tr th {
    color: #000;
}

.laporan table tr td {
    color: #000;
    font-weight: normal;
}

.laporan table {
    font-size: 14px;
}

/*.tandatangan{
    text-align:center; width:425px;float:left;
}

.tandatangan2{
    text-align:center; margin-left:545px;
}*/

.kop{
    text-align:center;
    margin-left:0px;
    width:270px;
    margin-bottom:-10px;
}
 body{
        font-size:11px;   
    }
    .tandatangan{
        text-align:center; width:325px;float:left;
    }
    .tandatangan2{
        text-align:center; width:125px; margin-left:545px;
    }  
	</style>
	
</head>
<body>
<p align="right" style="color: black; font-size: 11px;"> <?=$_SESSION['nama_user']?> , <?php echo (new \DateTime())->format('d-m-Y:H:i:s');?></p><br><br><p align="center" style="color: black; font-size: 18px;"><b>KUSUMA JAYA BATIK</b></p>
			<p align="center" style="color: black; font-size: 14px;">Desa Gendekan 02/09 Tlogoadi Mlati Sleman Yogyakarta 55284</p>
			<p align="center" style="color: black; font-size: 12px;">Telp : (0274) 44157 E-mail : kusumajayabatik@yahoo.co.id HP : (+62) 0877 0212 0111</p>
			<p><hr></p><br>
			<p style='text-align:center; font-size: 18px;'><b>Laporan pendapatan</b></p><br>
			 Kepada :<br>
			 Yth. Pimpinan Kusuma Jaya Batik<br>
			 Hal : Laporan pendapatan<br>
			 Ket : Laporan pendapatan  <?php echo $ket; ?><br /><br />
    <b><?php echo $ket; ?></b><br /><br />
	<table border="1" cellpadding="8">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Kode Transaksi</th>
						<th>Barang</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
				<?php
                    $total=0;
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tothar=$data->harga * $data->jumlah;
            $total=$total+$tothar;
            $tgl = date('d-m-Y', strtotime($data->tanggal_beli));?>

					<tr>
						<td><?= $tgl ?></td>
                        <td><?= $data->kode_penjualan?></td>
						<td><?= $data->nama_barang?></td>
						<td><?= rupiah($data->harga)?></td>
						<td><?= $data->jumlah?></td>
						<td><?=rupiah($tothar)?></td>
					</tr>
                    <?php } 
                 } ?>
	</tbody>
	>
	</table>
    
	<div class="">
		<br>
		Laporan Keuangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya. Laporan ini dibuat oleh <?=$_SESSION['nama_user']?> pada tanggal <?php echo (new \DateTime())->format('d-m-Y');?> , dengan Total pendapatan : <b><?=rupiah($total)?></b>
	</div>
<br><br>
<div class="tandatangan2">
    <br/>
    Sleman, <?php echo (new \DateTime())->format('d-m-Y');?><br>
    Mengetahui<br/><br/><br/><br/>
  <br />
<br/><hr/>
    Nur Alifah<br>
    Bag. Keuangan 
</div>
	</div>
	
	</div>
</body>
</html>
