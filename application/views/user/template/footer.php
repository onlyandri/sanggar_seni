
<!-- footer part start-->
<footer class="footer-area">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-sm-6 col-md-4 col-xl-3">
        <div class="single-footer-widget footer_1">
          <a href=" index.html"> <img style="height: 200px; width: 150px" src="<?php echo base_url('upload/') ?>logo.png" alt=""> </a>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-xl-4">
        <div class="single-footer-widget footer_2">
          <h4>Sistem Pemetaan Sanggar Seni Kota Pekalongan</h4>
          <p>Melestarikan budaya dan menggali kekayaan Kota Pekalongan
          </p>
          <div class="social_icon">
            <a href=" #"> <i class="ti-facebook"></i> </a>
            <a href=" #"> <i class="ti-twitter-alt"></i> </a>
            <a href=" #"> <i class="ti-instagram"></i> </a>
            <a href=" #"> <i class="ti-skype"></i> </a>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-md-4">
        <div class="single-footer-widget footer_2">
          <h4>Hubungi Kami</h4>
          <div class="contact_info">
            <p><span> Alamat :</span> Jl. Maninjau No.16-18 Kota Pekalongan. </p>
            <p><span> Telephon :</span>  (0285) 421878</p>
            <p><span> Email : </span>dindik@pekalongankota.go.id. </p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="copyright_part_text text-center">
          <div class="row">
            <div class="col-lg-12">
              <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Dinas Pendidikan dan Kebudayaan Kota Pekalongan <i class="ti-heart" aria-hidden="true"></i> by <a href="e https://colorlib.com" target="_blank">X-WA</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer part end-->

  <!-- jquery plugins here-->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/jquery-1.12.1.min.js"></script>
  <!-- popper js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/bootstrap.min.js"></script>
  <!-- easing js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/jquery.magnific-popup.js"></script>
  <!-- swiper js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/swiper.min.js"></script>
  <!-- swiper js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/masonry.pkgd.js"></script>
  <!-- particles js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/owl.carousel.min.js"></script>
  <!-- <script src="<?php echo base_url('assets/pengguna/') ?>js/jquery.nice-select.js"></script> -->
  <!-- swiper js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/slick.min.js"></script>
  <script src="<?php echo base_url('assets/pengguna/') ?>js/jquery.counterup.min.js"></script>
  <script src="<?php echo base_url('assets/pengguna/') ?>js/waypoints.min.js"></script>
  <!-- custom js -->
  <script src="<?php echo base_url('assets/pengguna/') ?>js/custom.js"></script> 
  <script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvtEWZ71MgdB_u_n1p0PEh7VTKcEpM6KE&callback=initMap"></script>

  <script>

   $("#pilihkec").change(function(){

    var kecamatan_id = $(this).val();
    if(kecamatan_id !==''){
      $.ajax({

        url:"<?= base_url(); ?>user/getKelurahan",
        method:"POST",
        dataType:"json",
        data:{kecamatan_id : kecamatan_id},
        success:function(data){
          $("#pilihkel").html(data);
        }
      });
    }else{
      $("#pilihkel").html('<option value="">--Pilih L--</option>');
    }
  });

   <?php if( $nav == 'home'){ ?>
     var map;
     var markers = [];

     function initMap() {
      var uluru = {lat: -6.8959407, lng: 109.6394839};
      var grayStyles = [
      {
        featureType: "all",
        stylers: [
        { saturation: -70 },
        { lightness: 40 }
        ]
      },
      {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
      ];
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -6.8959407, lng: 109.6394839},
        zoom: 12,
        styles: grayStyles,
        scrollwheel:  false
      });
    }


    function clearmap() {
      setMapOnAll(null);
    }

    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
      markers = [];
    }

    function tmpl(){

     var nama_kecamatan = 'k';
     var jenis = 's';
     $.getJSON('<?= base_url() ?>user/viewmarker/' + nama_kecamatan + '/' + jenis, function(data) {
      clearmap();
      $.each(data, function(k, v) {
        var pos = {
          lat: parseFloat(v.latitude),
          lng: parseFloat(v.longitude)
        };
        var contentString =
        '<div id="content" class="card">' +
        '<img height="150px" width="300px" style="text-align:center" src="<?= base_url('upload/sanggar/'); ?>' + v.foto + '"><br>' +
        '<div class="card"><a href="<?php echo base_url('user/sanggar/') ?>'+v.id_sanggar+'" class="btn btn-success" type="button">Lihat Detail</a></div>' +
        '<div id="bodyContent" class="p ll">' +
        '<div style="margin-left:30px; font-size:20px;" id="firstHeading" class="firstHeading"><b>Sanggar :' + v.nama_sanggar + '</b></div><br>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Nama Ketua </b> : ' + v.nama_ketua + '</div>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kecamatan </b> : ' + v.nama_kecamatan + '</div>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kelurahan </b> : ' + v.nama_kelurahan+ '</div>' +
        '<div style="margin-left: 30px; margin-bottom: 30px; font-size: 12px;">Kontak : <a href="https://api.whatsapp.com/send?phone=+62' + v.email_ketua + '" target="_blank" >Hubungi Saya</a>'
        '</div>' +
        '</div>' +
        '</div>';
        addMarker(v.nama_ketua, pos, v.icon, contentString);
      });
    });
   };

   tmpl();

   $('#kecamatan').change(function() {
    var nama_kecamatan = $(this).val()
    var jenis = 'kk';

    $.getJSON('<?= base_url() ?>user/viewmarker/' + nama_kecamatan + '/' + jenis, function(data) {
      clearmap();
      if(data == ''){
        alert('tidak ditemukan');
      }else{
        $.each(data, function(k, v) {
        var pos = {
          lat: parseFloat(v.latitude),
          lng: parseFloat(v.longitude)
        };
        var contentString =
        '<div id="content" class="card">' +
        '<img height="150px" width="300px" style="text-align:center" src="<?= base_url('upload/sanggar/'); ?>' + v.foto + '"><br>' +
        '<div class="card"><a href="<?php echo base_url('user/sanggar/') ?>'+v.id_sanggar+'" class="btn btn-success" type="button">Lihat Detail</a></div>' +
        '<div id="bodyContent" class="p ll">' +
        '<div style="margin-left:30px; font-size:20px;" id="firstHeading" class="firstHeading"><b><u>' + v.nama_sanggar + '</u></b></div><br>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Nama Ketua </b> : ' + v.nama_ketua + '</div>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kecamatan </b> : ' + v.nama_kecamatan + '</div>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kelurahan </b> : ' + v.nama_kelurahan+ '</div>' +
        '<div style="margin-left: 30px; margin-bottom: 30px; font-size: 12px;">Kontak : <a href="https://api.whatsapp.com/send?phone=+62' + v.email_ketua + '" target="_blank" >Hubungi Saya</a>'
        '</div>' +
        '</div>' +
        '</div>';
        addMarker(v.nama_ketua, pos, v.icon, contentString);
      });
      }
      
    });
  })

   $('#jenis').change(function() {
    var nama_kecamatan = $("#kecamatan").val()
    var jenis = $(this).val();


    $.getJSON('<?= base_url() ?>user/viewmarker/' + nama_kecamatan + '/' + jenis, function(data) {
      clearmap();
       if(data == ''){
        alert('tidak ditemukan');
      }
      $.each(data, function(k, v) {
        var pos = {
          lat: parseFloat(v.latitude),
          lng: parseFloat(v.longitude)
        };
        var contentString =
        '<div id="content" class="card">' +
        '<img height="150px" width="300px" style="text-align:center" src="<?= base_url('upload/sanggar/'); ?>' + v.foto + '"><br>' +
        '<div class="card"><a href="<?php echo base_url('user/sanggar/') ?>'+v.id_sanggar+'" class="btn btn-success" type="button">Lihat Detail</a></div>' +
        '<div id="bodyContent" class="p ll">' +
        '<div style="margin-left:30px; font-size:20px;" id="firstHeading" class="firstHeading"><b><u>' + v.nama_sanggar + '</u></b></div><br>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Nama Ketua </b> : ' + v.nama_ketua + '</div>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kecamatan </b> : ' + v.nama_kecamatan + '</div>' +
        '<div style="margin-left:30px; font-size:12px;" id="firstHeading" class="firstHeading"><b>Kelurahan </b> : ' + v.nama_kelurahan+ '</div>' +
        '<div style="margin-left: 30px; margin-bottom: 30px; font-size: 12px;">Kontak : <a href="https://api.whatsapp.com/send?phone=+62' + v.email_ketua + '" target="_blank" >Hubungi Saya</a>'
        '</div>' +
        '</div>' +
        '</div>';
        addMarker(v.nama_ketua, pos, v.icon, contentString);
      });
    });
  })

   function addMarker(nama, location, icon, contentString) {
    var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 400,
    });

    var marker = new google.maps.Marker({
      position: location,
      map: map,
      title: nama,
      animation: google.maps.Animation,
      icon: '<?php echo base_url('upload/icons/') ?>'+icon
    });
    markers.push(marker);
    marker.addListener("click", () => {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initMap); 

<?php }else if($nav == 'pengajuan'){ ?>

 var map;
 var markers = [];

 function initialize() {
  var mapOptions = {
    zoom: 12,
            // Center di kantor kabupaten kudus
            center: new google.maps.LatLng(-6.8959407, 109.6394839)
          };

          map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Add a listener for the click event
        google.maps.event.addListener(map, 'click', addLatLng); //ambil koordinat dengan klik kanan
        google.maps.event.addListener(map, "click", function(event) { //saat klik kanan mengambil data koordinat latitude dan longitude
          var lat = event.latLng.lat();
          var lng = event.latLng.lng();
          $('#latitude').val(lat);
          $('#longitude').val(lng);
            //alert(lat +" dan "+lng);
          });
      }

      function clearmap() {
        setMapOnAll(null);
      }

      function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
        markers = [];
      }

      function addLatLng(event) {
        var marker = new google.maps.Marker({
          position: event.latLng,
          title: 'Simple GIS',
          map: map
        });
        markers.push(marker);
      }
      google.maps.event.addDomListener(window, 'load', initialize); 
    <?php } ?>



    $(document).on('click', '#cari', function () {
      var nomor = $("#nomor").val();
      var nik = $("#nik").val();
      if(nomor == ''){
       alert('Isi nomor penyewa dan nik terlebih dahulu')
     }else{
      var url = "<?php echo base_url('user/pengajuanDetail/:nomor') ?>"
      url = url.replace(':nomor', nomor)
      url = url.replace(':nik', nik)
      $('#cari').attr('href', url)
    }

  })


</script>




</body>

</html>