<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Pemetaan Sanggat Seni Kota Pekalongan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Bukti Pengajuan Sanggar Seni</h3>
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
        <h5>KATEGORI</h5>
        <h5>KELURAHAN</h5>
        <h5>RT/RW</h5>
        <h5>KECAMATAN</h5>
        <h5>STATUS</h5>
      </div>
      <div class="col-md-4">
        <?php if($bukti['status'] == 1){
          $status = 'Belum Terkonfirmasi';
        }else if($bukti['status'] == 2){
          $status = 'Diterima';
        }else if($bukti['status'] == 3){
          $status = 'Menunggu Aktifasi';
        }else{
          $status = 'Ditolak';
        } ?>
        <h5> : &nbsp <?php echo $bukti['id_otomatis'] ?> </h5>
        <h5> : &nbsp <?php echo $bukti['nik'] ?> </h5>
        <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['nama_sanggar'] ?> </h5>
        <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['nama_ketua'] ?> </h5>
         <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['email_ketua'] ?> </h5>
        <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['nama_kategori'] ?> </h5>
        <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['nama_kelurahan'] ?> </h5>
        <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['rw'] ?>/<?php echo $bukti['rw'] ?></h5>
        <h5 style="text-transform: capitalize;"> : &nbsp <?php echo $bukti['nama_kecamatan'] ?> </h5>
        <h5> : &nbsp <?php echo $status ?> </h5>
      </div>
    </div>
    <div class="row mt-5 text-center">
      <div class="col-md-8"></div>
      <div class="col-md-4">
        <p>Pekalongan, <?=date('d M Y')?></p>
        <p>TTD</p>
        <p>&nbsp</p>
        <p>&nbsp</p>
        <p>&nbsp</p>
         <p style="text-transform: capitalize;"><?php echo $bukti['nama_ketua'] ?></p>
      </div>
    </div>

    <div class="row" style="margin-top: 120px">
      <div class="col-md-12">
        <p>** catatan</p>
        <p style="font-weight: 200">- Simpan Tanda Bukti Ini Sebagai Alat Bukti Yang sah.</p>
        <p style="font-weight: 200">- Gunakan tanda bukti ini apabila ada kendala dalam penyelenggaraan sanggar seni.</p>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purpose -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function(){

     window.print();

   })

   window.onafterprint = function(){window.history.back()}
 </script>
</body>
</html>
