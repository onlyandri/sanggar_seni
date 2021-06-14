 
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
									<table id="example2" class="table table-responsive table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama kategori</th>
												<th>Icon</th>
												<th>Deskripsi</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($kategori as $key => $value) {
										# code...
												$no++;
												?>
												<tr>
													<td><?php echo $no ?></td>
													<td><?= $value->nama_kategori ?></td>
													<td><img style="height:40px;width:20px" src="<?php echo base_url('upload/icons/'.$value->icon) ?>" class="img-fluid mb-2" alt="white sample"/></td>
													<td><?= $value->deskripsi?></td>
													<td>
														<a href="<?php echo base_url('dashboard/hapusKategori/'.$value->id_kategori) ?>" type="button" class="btn btn-danger btn-sm hapus" title="Hapus">
															<i class="fas fa-trash"></i>
														</a>
														<button type="button" id="editKategori" class="btn btn-primary btn-sm hapus" title="Hapus"
														data-toggle="modal"
														data-target="#modalUbah"
														data-id="<?= $value->id_kategori ?>"
														data-nama="<?= $value->nama_kategori ?>"
														data-deskripsi="<?= $value->deskripsi ?>"
														data-icon="<?= $value->icon ?>"
														>
														<i class="fas fa-edit"></i>
													</button>
												</td>
											</tr>
										<?php  } ?>
									</tbody>
								</table>
							</div>
						</div>

						<div class="tab-pane" id="settings">
							<form class="form-horizontal" method="POST" action="<?php echo base_url('dashboard/tambahKategori') ?>">
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Nama Kategori</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama_kategori" id="inputName" placeholder="Name" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputSkills" class="col-sm-2 col-form-label">Pilih Icon Peta</label>
									<div class="col-sm-10">
										<select class="form-control" id="icon2" name="icon">
											<option value="">--Pilih Icon--</option>
											<option value="1.png">1</option>
											<option value="2.png">2</option>
											<option value="3.png">3</option>
											<option value="4.png">4</option>
											<option value="5.png">5</option>
											<option value="6.png">6</option>
											<option value="7.png">7</option>
											<option value="8.png">8</option>
											<option value="9.png">9</option>
											<option value="10.png">10</option>
											<option value="11.png">11</option>
											<option value="12.png">12</option>									
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputExperience" class="col-sm-2 col-form-label"></label>
									<div class="col-sm-10">
										<div id="gambar2">

										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="inputExperience" class="col-sm-2 col-form-label">Deskripsi</label>
									<div class="col-sm-10">
										<textarea name="deskripsi" placeholder="Place some text here"
										style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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

<div class="modal fade" id="modalUbah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="<?php echo base_url('dashboard/edit') ?>">
			<div class="modal-header">
				<h4 class="modal-title">Edit Kategori</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Nama admin" required>
				</div>
				<div class="form-group">
					<label>Icon Peta</label>
					<select class="form-control" id="icon" name="icon">
						<option value="">--Pilih Icon--</option>
						<option value="1.png">1</option>
						<option value="2.png">2</option>
						<option value="3.png">3</option>
						<option value="4.png">4</option>
						<option value="5.png">5</option>
						<option value="6.png">6</option>
						<option value="7.png">7</option>
						<option value="8.png">8</option>
						<option value="9.png">9</option>
						<option value="10.png">10</option>
						<option value="11.png">11</option>
						<option value="12.png">12</option>									
					</select>
				</div>
				<div id="gambar">
					
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="deskripsi" id="deskripsi" placeholder="Place some text here"
					style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
				</div>
			</div>
			<div class="modal-footer text-right">
				<button type="submit" class="btn btn-info">Edit</button>
			</div>
		</form>
	</div>
</div>
