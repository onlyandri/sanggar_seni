    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>JELAJAH SANGGAR</h2>
                            <p>Sanggar<span>/</span>Kota Pekalongan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <!-- upcoming_event part start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top mb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Sanggar Seni</p>
                        <h2>Kota Pekalongan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($sanggar as $key => $value) {
                # code...
                   ?>
                   <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img style="height: 250px; width: 100%" src="<?php echo base_url('upload/sanggar/') ?><?php echo $value->foto ?>" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href=" course-details.html" class="btn_4"><?php echo $value->nama_kategori ?></a>
                            <a href="<?php echo base_url('user/sanggar/'.$value->id_sanggar) ?>"><h3><?php echo $value->nama_sanggar ?></h3></a>
                            <p><?php echo $value->pesan ?></p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img style="border-radius: 50%; height:50px; width: 50px" src="<?php echo base_url('upload/sanggar/') ?><?php echo $value->foto_ketua ?>" alt="">
                                    <div class="author_info_text">
                                        <p>Diketuai oleh:</p>
                                        <h5><a href=" #"><?php echo $value->nama_ketua ?></a></h5>
                                    </div>
                                </div>
                                <div class="author_rating">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--::blog_part end::-->

<!-- learning part start-->
<!-- learning part end-->
    <!--::blog_part end::-->