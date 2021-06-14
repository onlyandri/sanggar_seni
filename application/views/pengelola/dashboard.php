 
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
 					<span class="info-box-icon bg-info elevation-1"><i class="fas fa-skating"></i></span>

 					<div class="info-box-content">
 						<span class="info-box-text">Jumlah Kegiatan</span>
 						<span class="info-box-number">
 							<?php echo $kegiatan['jumlah_kegiatan'] ?>
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
 						<span class="info-box-text">Jumlah Komentar</span>
 						<span class="info-box-number"><?= $komentar['jumlah_komentar'] ?></span>
 					</div>
 					<!-- /.info-box-content -->
 				</div>
 				<!-- /.info-box -->
 			</div>
 			<!-- /.col -->
 		</div>
 	</div>
 </section>