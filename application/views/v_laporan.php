
<div class="col-md-4">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Laporan Harian</h3>

		</div>
		<!-- /.card-header -->
		<div class="card-body">
            <?php echo form_open('laporan/harian') ?>
			<div class="row">
            
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Tanggal</label>
						<select class="custom-select" name="tanggal" class="form-control">
						<?php
                        $start=1;
                        for ($i=$start; $i < $start+31 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?></select>
					</div>
				</div>
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Bulan</label>
						<select class="custom-select" name="bulan" class="form-control">
                        <?php
                        $start=1;
                        for ($i=$start; $i < $start+12 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        </select>
					</div>
				</div>
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Tahun</label>
						<select class="custom-select" name="tahun" class="form-control">
                        <?php
                        $start=date('Y')-1;
                        for ($i=$start; $i < $start+7 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        
                        </select>
					</div>
				</div>
				<!-- <div class="col-sm-12">
					<div class="form-group">
						
						<label class="control-label" for="date">Date</label>
						<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" />
					</div>

				</div> -->
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Cetak</button>
					</div>
				</div>
                
			</div>
			<?php  echo form_close() ?>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>


<div class="col-md-4">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Laporan Bulanan</h3>

		</div>
		<!-- /.card-header -->
		<div class="card-body">
            <?php echo form_open('laporan/bulanan') ?>
			<div class="row">
            
			
				<div class="col-sm-6">
					<!-- text input -->
					<div class="form-group">
						<label>Bulan</label>
						<select class="custom-select" name="bulan" class="form-control">
                        <?php
                        $start=1;
                        for ($i=$start; $i < $start+12 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        </select>
					</div>
				</div>
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Tahun</label>
						<select class="custom-select" name="tahun" class="form-control">
                        <?php
                        $start=date('Y')-1;
                        for ($i=$start; $i < $start+7 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        
                        </select>
					</div>
				</div>
				
				<div class="col-sm-6">
					<!-- text input -->
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Cetak</button>
					</div>
				</div>
                
			</div>
			<?php echo form_close() ?>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>


<div class="col-md-4">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Laporan Tahunan</h3>

		</div>
		<!-- /.card-header -->
		<div class="card-body">
            <?php echo form_open('laporan/tahunan') ?>
			<div class="row">
            
			
				<div class="col-sm-4">
					<!-- text input -->
					<div class="form-group">
						<label>Tahun</label>
						<select class="custom-select" name="tahun" class="form-control">
                        <?php
                        $start=date('Y')-1;
                        for ($i=$start; $i < $start+7 ; $i++) { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                        
                        </select>
					</div>
				</div>
				
				<div class="col-sm-6">
					<!-- text input -->
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Cetak</button>
					</div>
				</div>
                
			</div>
			<?php echo form_close() ?>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>

