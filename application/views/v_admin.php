<!-- <div class="col-lg-12">


	<div class="card card-primary card-outline">
		<div class="card-body">
			<h5 class="card-title">Card title</h5>

			<p class="card-text">
				Some quick example text to build on the card title and make up the bulk of the card's
				content.
			</p>

		</div>
	</div><!--</div>  /.card -->



<!-- /.col-md-6 -->


<!-- /.content-wrapper -->
<!-- Main content -->
<div class="col-md-12">
    <!-- Content Header (Page header) -->
   

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $tot_pesanan_masuk ?></h3>

                <p>Pesanan Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-basket"></i>
              </div>
                            <a href="<?=base_url('admin/pesanan_masuk')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$total_barang?></h3>

                <p>Barang</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-shopping-cart"></i> -->
				<i class="fas fa-truck-loading"></i>
				
              </div>
              <a href="<?=base_url('barang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?=$tot_pel?></h3>
                
                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$total_kategori?></h3>

                <p>Kategori</p>
              </div>
              <div class="icon">
               
				      <i class="fas fa-list"></i>
              </div>
              <a href="<?=base_url('kategori') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
     
          
            
   <?php
		foreach ($pendapatan as $data) {
			$bln[] = $data->bulan;
			$ttl[] = $data->total;
		}

    
		// echo	json_encode($bln);
		// echo	json_encode($ttl);
		// echo'<br>';
	?>

              

  
 <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">PENDAPATAN PER-BULAN (<?=date('Y')?>)</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
           
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <!-- <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span> -->
                </div>
              </div>
            </div>   
  </section>
</div>
<?php
		foreach ($useraktif as $data) {
			$bln_user[] = $data->bulan_user;
			$ttl_user[] = $data->total_user;
		}

    
		// echo	json_encode($bln);
		// echo	json_encode($ttl);
		// echo'<br>';
	?>
<canvas id="myChart" width="30" height="10" ></canvas>
            <!-- <canvas id="kopet" width="80" ></canvas> -->
  <script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=json_encode($bln_user)?>,
        datasets: [{
            label: 'Jumlah Pelanggan PER-BULAN (<?=date('Y')?>)',
            data: <?=json_encode($ttl_user)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

  

</script>
<script>
 $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : <?=json_encode($bln)?>,
      datasets: [{
        type                : 'line',
        data                : <?=json_encode($ttl)?>,
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          // data                : [60, 80, 70, 67, 80, 77, 100],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})

</script>