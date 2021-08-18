 
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">kegiatan</a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Deskripsi</a></li> -->
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tambah</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="activity">         

								<!-- Post -->
								<div class="row">
									<?php foreach ($kegiatan as $key => $value) {
										# code...
									 ?>
									<div class="col-md-6">
										<!-- Box Comment -->
										<div class="card card-widget">
											<div class="card-header">
												<div class="user-block">
													<img class="img-circle" src="<?= base_url('assets/') ?>dist/img/user1-128x128.jpg" alt="User Image">
													<span class="username"><a href="<?php echo base_url('pengelola/detailKegiatan/'.$value->id_kegiatan) ?>"><?php echo $value->nama_kegiatan; ?></a></span>
													<span class="description">Diposting pada tgl - <?php echo $value->tanggal_posting ?></span>
												</div>
												
											</div>
											<!-- /.card-header -->
											<div class="card-body">
												<img style="height: 250px; width: 100%" class="img-fluid pad" src="<?= base_url('upload/') ?>kegiatan/<?php echo $value->foto_kegiatan ?>" alt="Photo">

												<p><?php echo $value->nama_kegiatan ?></p>
												<a href="<?php echo base_url('pengelola/detailKegiatan/'.$value->id_kegiatan) ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>  Detail</a>
												<a href="<?php echo base_url('pengelola/hapusKegiatan/'.$value->id_kegiatan) ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
												<?php if($value->status_posting == 2){?>
												<span class="float-right badge badge-danger ml-2">ditolak</span>
											<?php }else if($value->status_posting == 0){?>
												<span class="float-right badge badge-warning ml-2">menunggu</span>
											<?php }else{?>
													<span class="float-right badge badge-success ml-2">diizinkan</span>
											<?php } ?>
											</div>
										</div>
										<!-- /.card -->
									</div>
									<?php } ?>
								</div>
							</div>

							<div class="tab-pane" id="settings">
								<form class="form-horizontal" method="POST" action="<?php echo base_url('pengelola/kegiatan') ?>" enctype="multipart/form-data">
									<div class="form-group row">
										<label for="inputName" class="col-sm-2 col-form-label">Nama Kegiatan</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama_kegiatan" id="inputName" placeholder="Name" value="">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Foto Kegiatan</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" id="inputSkills" name="foto" placeholder="nama ketua" value="">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-sm-10">
											<textarea class="textarea" name="deskripsi" placeholder="Place some text here"
											style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<button type="submit" class="btn btn-danger"><i class="far fa-plus mr-1"></i>Tambahkan</button>
										</div>
									</div>
								</form>
							</div>
							<!-- /.tab-pane -->
						</div>
						<!-- /.tab-content -->
					</div><!-- /.card-body -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->
		</div>
	</div>
</section>