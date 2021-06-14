 
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 <section class="content">
 	<div class="container-fluid">
 		<!-- Info boxes -->
 		<div class="row">
 			<div class="col-12 col-sm-6 col-md-3">
 				<div class="info-box">
 					<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">SANGGAR</span>
 						<span class="info-box-number">
 							<?php echo $sanggar['jumlah_sanggar']; ?>
 							<small>sanggar</small>
 						</span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>
 			<!-- /.col -->
 			<div class="col-12 col-sm-6 col-md-3">
 				<div class="info-box mb-3">
 					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">Pengajuan</span>
 						<span class="info-box-number"><?php echo $pengajuan['jumlah_pengajuan'] ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>
 			<!-- /.col -->

 			<!-- fix for small devices only -->
 			<div class="clearfix hidden-md-up"></div>

 			<div class="col-12 col-sm-6 col-md-3">
 				<div class="info-box mb-3">
 					<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">Kategori</span>
 						<span class="info-box-number"><?php echo $kategori['jumlah_kategori']; ?>
 							<small>kategori</small>
 						</span>

 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>
 			<!-- /.col -->
 			<div class="col-12 col-sm-6 col-md-3">
 				<div class="info-box mb-3">
 					<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">Jumlah Postingan</span>
 						<span class="info-box-number"><?php echo $postingan['jumlah_kegiatan'] ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>

 			<div class="col-12 col-sm-6 col-md-3">
 				<div class="info-box mb-3">
 					<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">Jumlah Kecamatan</span>
 						<span class="info-box-number"><?php echo $kecamatan['jumlah_kecamatan'] ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>

 			<div class="col-12 col-sm-6 col-md-3">
 				<div class="info-box mb-3">
 					<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">Jumlah Kelurahan</span>
 						<span class="info-box-number"><?php echo $kelurahan['jumlah_kelurahan'] ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>
 			<!-- /.col -->
 		</div>
 	</div>
 </section>