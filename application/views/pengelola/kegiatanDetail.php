 

<?php
$id_kegiatan = $kegiatan['id_kegiatan'];
$queryKoment = $this->db->query("SELECT * FROM komentar where id_kegiatan = '$id_kegiatan'")->result(); ?>
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
							<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Detail Kegiatan</a></li>
							<!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Deskripsi</a></li> -->
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<div class="active tab-pane" id="activity">         

								<!-- Post -->
								<div class="row">
									<div class="col-md-12">
										<!-- Box Comment -->
										<div class="card card-widget">
											<div class="card-header">
												<div class="user-block">
													<img class="img-circle" src="<?php echo base_url('assets/') ?>dist/img/user1-128x128.jpg" alt="User Image">
													<span class="username"><a href="#"><?php echo $kegiatan['nama_kegiatan'] ?></a></span>
													<span class="description">diposting pada tanggal - <?php echo $kegiatan['tanggal_posting'] ?></span>
												</div>
												<!-- /.user-block -->
												<div class="card-tools">
													<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
														<i class="far fa-circle"></i></button>
														<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
														</button>
														<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
														</button>
													</div>
													<!-- /.card-tools -->
												</div>
												<!-- /.card-header -->
												<div class="card-body">
													<img style="height: 400px; width: 100%" class="img-fluid pad" src="<?php echo base_url('upload/') ?>kegiatan/<?php echo $kegiatan['foto_kegiatan'] ?>" alt="Photo">
													<h4 class="text-center font-weight-bold mt-3"><?php echo $kegiatan['nama_kegiatan'] ?></h4>
													<p><?php echo $kegiatan['deskripsi_kegiatan'] ?></p>
													<?php
													$id_kegiatan = $kegiatan['id_kegiatan'];
													 $queryJumlah = $this->db->query("SELECT count(id_komentar) as jumlah_komentar from komentar where id_kegiatan = $id_kegiatan")->row_array(); ?>
													<span class="float-right text-muted"><?php echo $queryJumlah['jumlah_komentar'] ?> comments</span>
												</div>
												<!-- /.card-body -->
												<div class="card-footer card-comments">
													<?php foreach ($queryKoment as $key => $value): ?>
														

														<div class="card-comment">
															<!-- User image -->
															<img class="img-circle img-sm" src="<?php echo base_url('assets/') ?>dist/img/user3-128x128.jpg" alt="User Image">

															<div class="comment-text">
																<span class="username">
																	<?php echo $value->nama_komentar ?>
																	<span class="text-muted float-right"><?php echo date('d M Y', strtotime($value->tanggal_komentar)) ?></span>
																</span><!-- /.username -->
																<?php echo $value->komen ?>
															</div>
															<!-- /.comment-text -->
															

															<div class="balas ml-5 mt-2 mb-2">
																<?php
																$id_komentar = $value->id_komentar;
																$queryBalas = $this->db->query("SELECT * FROM balas_komentar where id_komentar = '$id_komentar'")->result();
																foreach ($queryBalas as $key => $value2): ?>
																	<img class="img-circle img-sm" src="<?php echo base_url('assets/') ?>dist/img/user3-128x128.jpg" alt="User Image">

																	<div class="comment-text">
																		<span class="username">
																			balasan anda
																			<span class="text-muted float-right"><?php echo date('d M Y', strtotime($value2->tanggal_balasan)) ?></span>
																		</span><!-- /.username -->
																		<?php echo $value2->balas_komen ?>
																	</div>
																<?php endforeach ?>
																<form action="<?php echo base_url('pengelola/balasKomentar/'.$kegiatan['id_kegiatan'].'/'.$value->id_komentar) ?>" method="post" class="mt-2">
																	<div class="input-group input-group-sm">
																		<input type="text" class="form-control form-control-sm" name="balas" placeholder="balas komentar">
																		<span class="input-group-append">
																			<button type="submit" class="btn btn-info btn-flat">Balas</button>
																		</span>
																	</div>
																</form>
															</div>
														</div>
														<!-- /.card-comment -->
													<?php endforeach ?>
												</div>
												<!-- /.card-footer -->
												<div class="card-footer">
												</div>
												<!-- /.card-footer -->
											</div>
											<!-- /.card -->
										</div>
									</div>
								</div>

								<div class="tab-pane" id="settings">
									<form class="form-horizontal" method="POST" action="<?php echo base_url('pengelola/kegiatan') ?>" enctype="multipart/form-data">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Nama Kegiatan</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="nama_kegiatan" id="inputName" placeholder="Name" value="<?php echo $kegiatan['nama_kegiatan'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputSkills" class="col-sm-2 col-form-label">Foto Kegiatan</label>
											<div class="col-sm-10">
												<input type="file" class="form-control" id="inputSkills" name="foto" placeholder="nama ketua" value="<?php echo $kegiatan['foto_kegiatan'] ?>">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
											<div class="col-sm-10">
												<textarea class="textarea" name="deskripsi" placeholder="Place some text here"
												style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $kegiatan['deskripsi_kegiatan']; ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger"><i class="far fa-plus mr-1"></i>Edit</button>
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