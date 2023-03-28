 
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
							<li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Deskripsi</a></li>
							<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
						</ul>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content">
							<!-- /.tab-pane -->
							<div class="active tab-pane" id="timeline">
								<!-- The timeline -->
								<div class="card card-primary">
									<!-- /.card-header -->
									<div class="card-body">
										<strong><i class="fas fa-book mr-1"></i> Nama Sanggar</strong>

										<p class="text-muted">
											<?php echo $sanggar['nama_sanggar'] ?>
										</p>

										<hr>

										<strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

										<p class="text-muted"><?php echo $sanggar['alamat'] ?>,<?php echo $sanggar['nama_kelurahan'] ?>,<?= $sanggar['nama_kecamatan'] ?>, Kota Pekalongan , Jawa Tengah</p>

										<hr>

										<strong><i class="fas fa-pencil-alt mr-1"></i> Kategori</strong>

										<p class="text-muted">
											<?php echo $sanggar['nama_kategori'] ?>
										</p>

										<hr>

										<strong><i class="far fa-file-alt mr-1"></i> Nama Ketua</strong>

										<p class="text-muted"><?php echo $sanggar['nama_ketua'] ?></p>
										<hr>

										<strong><i class="far fa-file-alt mr-1"></i> Email</strong>

										<p class="text-muted"><?php echo $sanggar['email_ketua'] ?></p>
										<hr>
										<strong><i class="far fa-file-alt mr-1"></i> No Handphone</strong>

										<p class="text-muted"><?php echo $sanggar['no_hp'] ?></p>
										<hr>
										<strong><i class="far fa-file-alt mr-1"></i> Prestasi</strong>

										<p class="text-muted"><?php echo $sanggar['prestasi'] ?></p>
										<hr>
									</div>
									<!-- /.card-body -->
								</div>
							</div>
							<!-- /.tab-pane -->

							<div class="tab-pane" id="settings">
								<form class="form-horizontal" method="POST" action="<?php echo base_url('pengelola/editSanggar') ?>">
									<div class="form-group row">
										<label for="inputName" class="col-sm-2 col-form-label">Nama Sanggar</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="nama_sanggar" id="inputName" placeholder="Name" value="<?php echo $sanggar['nama_sanggar'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
										<div class="col-sm-10">
											<input readonly type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $sanggar['email_ketua'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputEmail" class="col-sm-2 col-form-label">No Handphone</label>
										<div class="col-sm-10">
											<input type="number" name="noHp" class="form-control" id="noHp" placeholder="No Handphone" value="<?php echo $sanggar['no_hp'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputName2" class="col-sm-2 col-form-label">Kategori</label>
										<div class="col-sm-10">
										<select class="form-control" id="inputName2" name="kategori">
											<?php foreach ($kategori as $key => $value) {
												# code...
											?>
											<option value="<?php echo $value->id_kategori ?>" <?= $value->id_kategori == $sanggar['id_kategori'] ? 'selected' : ''; ?> ><?= $value->nama_kategori ?></option>
										<?php } ?>
										</select>
									</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Nama Ketua</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputSkills" name="nama_ketua" placeholder="nama ketua" value="<?php echo $sanggar['nama_ketua'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label for="inputSkills" class="col-sm-2 col-form-label">Alamat Lengkap</label>
										<div class="col-sm-10">
											<textarea type="text" class="form-control" id="inputSkills" name="alamat" placeholder="nama ketua""><?php echo $sanggar['alamat'] ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
										<div class="col-sm-10">
											<textarea class="form-control" id="inputExperience" placeholder="Experience" name="pesan"><?php echo $sanggar['pesan'] ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label for="inputExperience" class="col-sm-2 col-form-label">Ulasan Prestasi</label>
										<div class="col-sm-10">
											<textarea class="form-control" id="inputExperience" placeholder="Experience" name="prestasi"><?php echo $sanggar['prestasi'] ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-sm-2 col-sm-10">
											<button type="submit" class="btn btn-danger"><i class="far fa-edit mr-1"></i>Edit</button>
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