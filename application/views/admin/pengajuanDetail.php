 
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
							<li class="nav-item "><h4 class="text-center"><?php echo $sanggar['nama_sanggar'] ?></h4></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">							<!-- /.tab-pane -->
							<div class="active tab-pane" id="timeline">
								<!-- The timeline -->
								<div class="card card-primary">
									<!-- /.card-header -->
									<div class="card-body">
										<div class="row mb-4">
											<div class="col-md-6">
												<img style="width: 100%; height: 200px" src="<?= base_url('upload/sanggar/') ?><?php echo $sanggar['ktp'] ?>" alt="User Image">
											</div>
											<hr>
										</div>
										<hr>
										<strong> Nama Sanggar</strong>

										<p class="text-muted">
											<?php echo $sanggar['nama_sanggar'] ?>
										</p>

										<hr>

										<strong>Alamat</strong>

										<p class="text-muted"><?php echo $sanggar['nama_kelurahan'] ?>, rt <?php echo $sanggar['rt'] ?>/ rw <?php echo $sanggar['rw'] ?>, <?= $sanggar['nama_kecamatan'] ?>, Kota Pekalongan , Jawa Tengah</p>

										<hr>

										<strong>Kategori</strong>

										<p class="text-muted">
											<?php echo $sanggar['nama_kategori'] ?>
										</p>

										<hr>

										<strong> Nama Ketua</strong>

										<p class="text-muted"><?php echo $sanggar['nama_ketua'] ?></p>
										<hr>

										<strong> Email</strong>

										<p class="text-muted"><?php echo $sanggar['email_ketua'] ?></p>
										<hr>
										<strong>Foto Ketua</strong></br>

										<img style="height: 100px; width: 100px" class="img-circle" src="<?= base_url('upload/sanggar/') ?><?php echo $sanggar['foto_ketua'] ?>" alt="User Image">
										<hr>

										<strong > Foto KTP dan Berkas Pengajuan</strong></br>
										<div class="row mt-3">
											<div class="col-md-6">
												<img style="width: 100%; height: 200px" src="<?= base_url('upload/sanggar/') ?><?php echo $sanggar['ktp'] ?>" alt="User Image">
											</div>
											<div class="col-md-6">
												<ul class="mailbox-attachments d-flex align-items-stretch clearfix">
													<li>
														<span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

														<div class="mailbox-attachment-info">
															<a href="<?php echo base_url('upload/sanggar/'.$sanggar['berkas']) ?>" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> berkas.pdf</a>
															<span class="mailbox-attachment-size clearfix mt-1">
																<span>1,245 KB</span>
																<a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
															</span>
														</div>
													</li>
												</ul>
											</div>
											<hr>
										</div>
									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<?php if($sanggar['status'] == 4){ ?>
											<a href="<?php echo base_url('dashboard/sendEmail/'.$sanggar['id_sanggar'].'/terima') ?>" type="button" class="btn btn-primary">Terima Pengajuan Kembali</a>
											<a href="<?php echo base_url('dashboard/hapusPengajuan/'.$sanggar['id_sanggar']) ?>" type="button" class="btn btn-danger">Hapus Pengajuan</a>
										<?php }else if($sanggar['status'] == 1){

											?>
											<a href="<?php echo base_url('dashboard/sendEmail/'.$sanggar['id_sanggar'].'/terima') ?>" type="button" class="btn btn-primary">Terima Pengajuan</a>
											<a href="<?php echo base_url('dashboard/sendEmail/'.$sanggar['id_sanggar'].'/tolak') ?>" type="button" class="btn btn-warning">TolaK Pengajuan</a>
											<a href="<?php echo base_url('dashboard/hapusPengajuan/'.$sanggar['id_sanggar']) ?>" type="button" class="btn btn-danger">Hapus Pengajuan</a>
										<?php }else{ ?>
											<a href="<?php echo base_url('dashboard/hapusPengajuan/'.$sanggar['id_sanggar']) ?>" type="button" class="btn btn-danger">Hapus Sanggar</a>
										<?php } ?>
									</div>
								</div>
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