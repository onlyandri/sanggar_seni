
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>Sistem Informasi Geografi</h5>
                        <h1>Sanggar Seni <br>
                        kota pekalongan</h1>
                        <p>Tingkatkan kreatifitas dengan melestarikan budaya leluhur</p>
                        <a href=" #" class="btn_1">Daftar Sanggar</a>
                        <a href="<?php echo base_url('auth') ?>" class="btn_2">Login </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->

<!-- member_counter counter start -->
<section class="member_counter">
    <div class="container">
        <div class="row">
            <?php $queryKec = $this->db->query("SELECT * FROM kecamatan")->result();

            foreach ($queryKec as $key => $value) {
                $id_kecamatan = $value->id_kecamatan;
                $querySanggar = $this->db->query("SELECT COUNT(id_sanggar) as jumlah_sanggar from sanggar s join kelurahan kl on kl.id_kelurahan = s.id_kelurahan join kecamatan kc on kc.id_kecamatan = kl.id_kecamatan where kc.id_kecamatan = $id_kecamatan and s.status = 2")->row_array();
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $querySanggar['jumlah_sanggar'] ?></span>
                        <p style="color: white;">sanggar</p>
                        <h4><?php echo $value->nama_kecamatan ?></h4>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</section>
<!-- member_counter counter end -->

<section class="mt-5">
    <div class="container">
        <div class="row align-items-sm-center align-items-lg-stretch">
            <div class="col-md-7 col-lg-7">
               <div id="map" style="height: 480px;"></div>
              
        </div>
        <div class="col-md-5 col-lg-5">
         <div class="learning_member_text m-4">
            <h5>Pemetaan Sanggar Seni</h5>
        </div>
        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
                <div class="col-sm-9  mt-2">
                  <h6>Cari Berdasarkan Kecamatan</h6>
                  <div class="input-group-icon">
                    <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                    <div>
                        <select class="form-control" id="kecamatan">
                            <option value="">--Pilih kecamatan--</option>
                            <?php foreach ($kecamatan as $key => $value) {
                            # code...
                               ?>
                               <option value="<?php echo $value->id_kecamatan ?>"><?php echo $value->nama_kecamatan ?></option>
                           <?php } ?>
                       </select>
                   </div>
               </div>
           </div>
           <div class="col-sm-9 mt-5">
               <h6>Cari Berdasarkan Kategori</h6>
               <div class="input-group-icon">
                <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                <div>
                    <select class="form-control" id="jenis">
                        <option value="">--Pilih-Kategori--</option>
                        <?php foreach ($kategori as $key => $value) {
                        # code...
                           ?>
                           <option value="<?php echo $value->id_kategori ?>"><?php echo $value->nama_kategori ?></option>
                       <?php } ?>
                   </select>
               </div>
           </div>
       </div>
       <div class="col-md-9 col-lg-9">
        <div class="learning_member_text mt-5">
            <h3>LEGENDA</h3>
        </div>
        <?php foreach ($kategori as $key => $value) {
        # code...
         ?>
         <div class="media contact-info mt-3">
           <img style="height: 40px; width: 30px; margin-right: 30px" src="<?php echo base_url('upload/icons/') ?><?= $value->icon ?>" alt="">
           <div class="media-body">
              <h3><?php echo $value->nama_kategori ?></h3>
          </div>
      </div>
  <?php } ?>
</div>

</div>
</form>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="section-top-border">
            <h3 class="mb-30">Data Berdasarkan Kategori</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#</div>
                        <div class="country">Katogori</div>
                        <div class="visit">Jumlah</div>
                        <div class="percentage">Persentase</div>
                    </div>
                    <?php $queryKategori = $this->db->query("SELECT * FROM KATEGORI")->result();
                    $querKategoriSemua = $this->db->query("SELECT count(id_sanggar) as jumlah_semua from sanggar")->row_array();
                    $no = 1;
                    foreach ($queryKategori as $key => $value) {
                             # code...
                        $id_kategori = $value->id_kategori;

                        $queryJumlahKategori = $this->db->query("SELECT count(id_sanggar) as jumlah_kategori from sanggar s join kategori k on k.id_kategori = s.id_kategori where k.id_kategori = $id_kategori")->row_array();

                        $persentase = $queryJumlahKategori['jumlah_kategori'] * 100 / $querKategoriSemua['jumlah_semua'];
                        ?>
                        <div class="table-row">
                            <div class="serial"><?php echo $no ?></div>
                            <div class="country"><?php echo $value->nama_kategori ?></div>
                            <div class="visit"><?php echo $queryJumlahKategori['jumlah_kategori'] ?></div>
                            <div class="percentage">
                                <div class="progress">
                                    <div class="progress-bar color-2" role="progressbar" style="width: <?php echo $persentase ?>%" aria-valuenow="30" aria-valuemin="0"
                                       aria-valuemax="100"></div>
                                   </div>
                               </div>
                           </div>
                           <?php $no++; } ?>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- learning part start-->
<section class="advance_feature learning_part mt-0">
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch">
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text">
                    <h5>Kategori Sanggar</h5>
                    <h2>Mengenal Jenis-jenis Sanggar
                    Seni Di Kota Pekalongan</h2>
                    <div class="row">
                        <?php foreach ($kategori as $key => $value) {
                            # code...
                         ?>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="learning_member_text_iner">
                                <span class="ti-stamp"></span>
                                <h4><?php echo $value->nama_kategori ?></h4>
                                <p><?php echo $value->deskripsi ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="learning_img" style="display: flex; align-items: center; justify-content: center;">
                    <img style="height: 500px; width: 900px" src="<?php echo base_url('upload/icons/') ?>sgr.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- member_counter counter start -->
<!-- member_counter counter end -->

<!-- learning part start-->

<!--::review_part start::-->