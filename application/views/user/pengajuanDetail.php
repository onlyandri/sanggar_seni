 
<!-- breadcrumb start-->


<!--================Blog Area =================-->
<section class="blog_area section_padding">
  <!-- Site wrapper -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Detail Pengajuan Sanggar Seni</h3>
    </div>
    <div class="col-md-12 text-center">
        <h4>Kota Pekalongan</h4>
    </div>
</div>
<div class="row  mt-5 offset-2">
  <div class="col-md-5" style="right: 0">
    <h5>NOMOR Pengajuan </h5>
    <h5>NIK </h5>
    <h5>NAMA SANGGAR</h5>
    <h5>NAMA KETUA </h5>
    <h5>EMAIL </h5>
    <h5>No HP </h5>
    <h5>KATEGORI</h5>
    <h5>KELURAHAN</h5>
    <h5>ALAMAT LENGKAP</h5>
    <h5>KECAMATAN</h5>
    <h5>STATUS</h5>
</div>
<div class="col-md-7">
    <?php if($pengajuan['status'] == 1){
      $status = 'Belum Terkonfirmasi';
  }else if($pengajuan['status'] == 2){
      $status = 'Diterima';
  }else if($pengajuan['status'] == 3){
      $status = 'Menunggu Aktifasi';
  }else{
      $status = 'Ditolak';
  } ?>
  <h5> : &nbsp <?php echo $pengajuan['id_otomatis'] ?> </h5>
  <h5> : &nbsp <?php echo $pengajuan['nik'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['nama_sanggar'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['nama_ketua'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['email_ketua'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['no_hp'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['nama_kategori'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['nama_kelurahan'] ?> </h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['alamat'] ?></h5>
  <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $pengajuan['nama_kecamatan'] ?> </h5>
  <h5> : &nbsp <?php echo $status ?> </h5>
</div>
</div>
<div class="row mt-5">
    <div class="col-md-12 text-center">
        <div class="form-group mt-3">
    <a href="<?php echo base_url('user/cetakBukti/'.$pengajuan['id_otomatis']) ?>" class="button button-contactForm btn_1">Cetak Bukti</a>
</div>
    </div>
</div>
</div>
</section>
<!-- /.content-wrapper -->
<!-- ./wrapper -->

<!-- jQuery -->
