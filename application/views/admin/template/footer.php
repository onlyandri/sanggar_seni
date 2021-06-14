</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.4
  </div>
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->

<!-- <script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>
  tabel('semua');
  $(function () {
    // Summernote
    $('.textarea').summernote()

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  })

  $(document).on('click', '#editKategori', function () {
    var id = $(this).data('id')
    const gb =  document.getElementById('gambar');
    var nama_kategori = $(this).data('nama')
    var deskripsi = $(this).data('deskripsi')
    var icon = $(this).data('icon')
    var url = "<?= base_url('dashboard/editKategori/:id') ?>"
    url = url.replace(':id', id)
    $('form').attr('action', url)
    $('#nama_kategori').val(nama_kategori)
    $('#deskripsi').val(deskripsi)
    gb.innerHTML = `<img style="height:40px;width:30px" src="<?php echo base_url('upload/icons/`+icon+`') ?>" class="img-fluid mb-2" alt="white sample"/>`;
  });

  $(document).on('change','#icon',function(){

    const isi1 = $(this).val();

    const gb =  document.getElementById('gambar');

    gb.innerHTML = `<img style="height:40px;width:30px" src="<?php echo base_url('upload/icons/`+isi1+`') ?>" class="img-fluid mb-2" alt="white sample"/>`;
  })

  $(document).on('change','#icon2',function(){

    const isi2 = $(this).val();

    const gb2 =  document.getElementById('gambar2');

    gb2.innerHTML = `<img style="height:40px;width:30px" src="<?php echo base_url('upload/icons/`+isi2+`') ?>" class="img-fluid mb-2" alt="white sample"/>`;
  })

  $(document).on('change','#jenis',function(){

   var jenis = $(this).val()

   tabel(jenis);

   
 })

  function tabel(jenis){

    $.ajax({

    url : "<?php echo base_url('dashboard/laporan_json') ?>",
    method :'POST',
    dataType : 'json',
    data : { jenis : jenis},
    success:function(data){

      $('#tbl').html(data);
    }
  })
  }

</script>
</body>
</html>
