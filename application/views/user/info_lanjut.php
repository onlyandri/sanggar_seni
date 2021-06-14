  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>informasi lanjut</h2>
                        <?= $this->session->flashdata('message'); ?>
                        <p>Cari<span>/</span>Informasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-md-12">

                  <form action="<?php echo base_url('user/pengajuanDetail/') ?>" class="form-group" method="post" >
                    <div class="row">
                    <div class="col-md-6">
                        <div class="mt-10">
                            <p>Nomor Pengajuan</p>
                            <input type="text" id="nomor" name="id_otomatis" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama sanggar'"
                            required class="single-input" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-10">
                            <p>NIK</p>
                            <input type="text" id="nik" name="nik" placeholder="" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Ketua Sanggar'"
                            required class="single-input" value="">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <a id="cari" class="button button-contactForm btn_1">Cari Data Pengajuan</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<!--================Blog Area =================-->
