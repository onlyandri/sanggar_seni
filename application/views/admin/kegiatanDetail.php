 
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
												<!-- /.card-footer -->
												<div class="card-footer">
													<?php if($kegiatan['status_posting'] == 0){?>
													<a href="<?php echo base_url('dashboard/izin/'.$kegiatan['id_kegiatan']) ?>" type="button" class="btn btn-success">Izinkan Post</a>
													<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalTambah">TolaK Postingan</button>
												<?php }else{ ?>
															<a href="<?php echo base_url('dashboard/izin/'.$kegiatan['id_kegiatan']) ?>" type="button" class="btn btn-success">izinkan kembali</a>
															<a href="<?php echo base_url('dashboard/hapusKegiatan/'.$kegiatan['id_kegiatan']) ?>" type="button" class="btn btn-danger">Hapus Postingan</a>
												<?php } ?>
												</div>
												<!-- /.card-footer -->
											</div>
											<!-- /.card -->
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

	<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="<?php echo base_url('dashboard/tolak/'.$kegiatan['id_kegiatan']) ?>">
			<div class="modal-header">
				<h4 class="modal-title">Tambahkan Pesan Penolakan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Alasan Penolakan Postingan</label>
					<textarea id="deskripsi" class="form-control" placeholder="Masukan Alasan penolakan" name="alasan"  required 
					style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Tolak</button>
			</div>
		</form>
	</div>
</div>