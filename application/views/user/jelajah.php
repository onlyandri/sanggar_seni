
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2><?php echo $sanggar['nama_sanggar'] ?></h2>
                            <p>Jelajah<span>/</span>Kegiatan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php foreach ($kegiatan as $key => $value) {
                            # code...
                            $id_kegiatan = $value->id_kegiatan;
                            $queryJumlah = $this->db->query("SELECT COUNT(id_komentar)as jumlah_komen from komentar where id_kegiatan = '$id_kegiatan'")->row_array();
                           ?>
                           <article class="blog_item">
                            <div class="blog_item_img">
                                <img style="height: 400px; width: 100%" class="card-img rounded-0" src="<?php echo base_url('upload/kegiatan/') ?><?php echo $value->foto_kegiatan ?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?php echo date('d', strtotime($value->tanggal_posting)) ?></h3>
                                    <p><?php echo date('M', strtotime($value->tanggal_posting)) ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php echo base_url('user/kegiatan/'.$value->id_sanggar.'/'.$value->id_kegiatan) ?>">
                                    <h2><?php echo $value->nama_kegiatan ?></h2>
                                </a>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i>  <?php echo $sanggar['nama_sanggar'] ?></a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> <?php echo $queryJumlah['jumlah_komen']; ?> Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php } ?>
                 <!--    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
           <div class="col-lg-5">
                <div class="blog_right_sidebar">
                  <!--  <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Tentang Sanggar</h3>
                     <div class="media post_item">
                       <h4>pendiri</h4>
                        <div class="media-body">
                            <a href="single-blog.html">
                                <h3>andri</h3>
                            </a>
                        </div>
                    </div>
                </aside> -->

                 <aside class="single_sidebar_widget post_category_widget">
                <h4 class="widget_title">Tentang <?php echo $sanggar['nama_sanggar'] ?></h4>
                <ul class="list cat-list">
                    <li>
                        <a href="#" class="d-flex">
                            <p class="font-weight-bold">Diketuai oleh :</p>
                            <p>&nbsp <?php echo $sanggar['nama_ketua'] ?></p>
                        </a>
                    </li>
                     <li>
                        <a href="#" class="d-flex">
                            <p class="font-weight-bold">Kategori :</p>
                            <p>&nbsp <?php echo $sanggar['nama_kategori'] ?></p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex">
                            <p class="font-weight-bold">No Handphone :</p>
                            <p>&nbsp <?php echo $sanggar['no_hp'] ?></p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex">
                            <p class="font-weight-bold">Alamat </p>
                            <p>&nbsp &nbsp <?php echo $sanggar['alamat'] ?>, Kelurahan <?php echo $sanggar['nama_kelurahan'] ?>, Kecamatan <?php echo $sanggar['nama_kecamatan'] ?>, Kota Pekalongan</p>
                        </a>
                    </li>
                </ul>
            </aside>
            <aside class="single_sidebar_widget instagram_feeds">
                <h4 class="widget_title">Galeri Sanggar</h4>
                <ul class="instagram_row flex-wrap">
                    <?php foreach ($kegiatan as $key => $value) {
                    
                     ?>
                   
                    <li>
                        <a href="#">
                            <img class="img-fluid" src="<?php echo base_url('upload/kegiatan/') ?><?php echo $value->foto_kegiatan ?>" alt="">
                        </a>
                    </li>
                   
                    <?php } ?>
                </ul>
            </aside>
            <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Jelajah Sanggar Lain</h3>
                    <?php $querySanggar = $this->db->query("SELECT * FROM sanggar where status = 2")->result();

                    foreach ($querySanggar as $key => $value) {
                     # code...
                       ?>
                       <div class="media post_item">
                        <img style="height: 70px; width: 90px;" src="<?php echo base_url('upload/sanggar/') ?><?php echo $value->foto ?>" alt="post">
                        <div class="media-body">
                            <a href="single-blog.html">
                                <h3><?php echo $value->nama_sanggar; ?></h3>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </aside>
        </div>
    </div>
</div>
</div>
</section>
    <!--================Blog Area =================-->