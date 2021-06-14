
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <form method="POST" action="<?php echo base_url('dashboard/cetak_laporan') ?>">
      <div class="row">
        <div class="col-md-4">
         <div class="form-group">
          <select class="form-control select2" style="width: 100%;" name="kategori" id="jenis">
            <option value="semua">--semua kategori--</option>
            <?php $query = $this->db->query("SELECT * FROM kategori")->result();

            foreach ($query as $key => $value) {
             # code...
              ?>
              <option value="<?php echo $value->id_kategori ?>"><?php echo $value->nama_kategori ?></option>

            <?php } ?>
          </select>
        </div>
      </div>

      <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Cetak</button>
      </div>

  </div> 

</form>




</div>
<div class="row">
 <div class="col-md-12">
   <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Pasien</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th>no</th>
            <th>ID sanggar</th>
            <th>Kategori</th>
            <th>Nama Sanggar</th>
            <th>Nama Ketua</th>
            <th>Email Ketua</th>
            <th>Kelurahan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kecamatan</th>
          </tr>
        </thead>
        <tbody id="tbl">

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
</div>
</section>