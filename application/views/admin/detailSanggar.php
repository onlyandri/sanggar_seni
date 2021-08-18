 
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

		<?php 

		$id_sanggar = $sanggar['id_sanggar'];

		 $queryPost = $this->db->query("SELECT COUNT(id_kegiatan) as jumlahPosting from kegiatan where id_sanggar = $id_sanggar and status_Posting = 0")->row_array();

		 ?>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header p-2">
						<ul class="nav nav-pills">
							<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Detail Sanggar</a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Deskripsi</a></li> -->
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Kegiatan  <?php if($queryPost['jumlahPosting'] != 0){?>
                      <span class="right badge badge-warning"><?php echo $queryPost['jumlahPosting'] ?></span>
                    <?php } ?></a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">							<!-- /.tab-pane -->
							<div class="active tab-pane" id="activity">
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
										<strong> Jumlah Postingan</strong>

										<p class="text-muted">
											<?php echo $jumlahPosting['jumlahKegiatan'] ?>
										</p>

										<hr>

										<strong>Alamat</strong>

										<p class="text-muted"><?php echo $sanggar['alamat'] ?>, <?php echo $sanggar['nama_kelurahan'] ?>, <?= $sanggar['nama_kecamatan'] ?>, Kota Pekalongan , Jawa Tengah</p>

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

										<strong> No Handphone</strong>

										<p class="text-muted"><?php echo $sanggar['no_hp'] ?></p>
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
										<a href="<?php echo base_url('dashboard/hapussanggar/'.$sanggar['id_sanggar']) ?>" type="button" class="btn btn-danger">Hapus Sanggar</a>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="settings">
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
														<span class="description mt-2">
															<?php if($value->status_posting == 0){ ?>
															<button type="button" class="btn btn-warning btn-sm">menunggu konfirmasi</button></span>
														<?php }else{ ?>
															<button type="button" class="btn btn-danger btn-sm">ditolak</button></span>
														<?php } ?>
													</div>

												</div>
												<!-- /.card-header -->
												<div class="card-body">
													<img style="height: 250px; width: 100%" class="img-fluid pad" src="<?= base_url('upload/') ?>kegiatan/<?php echo $value->foto_kegiatan ?>" alt="Photo">

													<p><?php echo $value->nama_kegiatan ?></p>
													<a href="<?php echo base_url('dashboard/detailKegiatan/'.$value->id_kegiatan) ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Lihat Postingan</a>
													<!-- <a href="<?php echo base_url('pengelola/hapusKegiatan/'.$value->id_kegiatan) ?>" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a> -->
												</div>
											</div>
											<!-- /.card -->
										</div>
									<?php } ?>
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