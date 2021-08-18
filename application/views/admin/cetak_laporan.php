<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SANGGAR SENI KOTA PEKALONGAN</title>
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
        <h3>Laporan Sanggar Seni Kota Pekalongan</h3>
      </div>
      <div class="col-md-12 text-center">
        <h4>SANGGAR SENI KOTA PEKALONGAN</h4>
      </div>
    </div>
    <div class="row  mt-5">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>no</th>
            <th>ID sanggar</th>
            <th>Kategori</th>
            <th>Nama Sanggar</th>
            <th>Nama Ketua</th>
            <th>Email Ketua</th>
            <th>Kelurahan</th>
            <th>ALmat Lengkap</th>
            <th>No Hp</th>
            <th>Kecamatan</th>
          </tr>
        </thead>
        <tbody>

         <?php
         $no = 0;
           foreach ($km as $key => $dt) {

          $no++;
          ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $dt->id_otomatis ?></td>
            <td><?= $dt->nama_kategori ?></td>
            <td><?= $dt->nama_sanggar ?></td>
            <td><?= $dt->nama_ketua ?></td>
            <td><?= $dt->email_ketua ?></td>
            <td><?= $dt->nama_kelurahan ?></td>
            <td><?= $dt->alamat ?></td>
            <td><?= $dt->no_hp ?></td>
            <td><?= $dt->nama_kecamatan ?></td>
          </tr>;

        <?php } ?>

        </tbody>
      </table>
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
