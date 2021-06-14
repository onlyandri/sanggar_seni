    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>PENGAJUAN SANGGAR</h2>
                             <?= $this->session->flashdata('message'); ?>
                            <p>pengajuan<span>/</span>form</p>
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
            <div class="section-top-border">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <h3 class="mb-30">Form Input Data Sanggar</h3>
                        <form method="POST" action="<?php echo base_url('user/insert') ?>" class="form-group" enctype="multipart/form-data">
                            <div class="mt-10">
                                <input type="hidden" name="password" placeholder="Nama Sanggar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama sanggar'"
                                required readonly class="single-input" value="<?php echo $kode ?>">
                            </div>
                            <div class="mt-10">
                                <p>Nama Sanggar</p>
                                <input type="text" name="nama_sanggar" placeholder="Nama Sanggar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama sanggar'"
                                required class="single-input">
                            </div>
                            <div class="mt-10">
                                <p>Nama Ketua Sanggar</p>
                                <input type="text" name="nama_ketua" placeholder="Nama Ketua Sanggar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Ketua Sanggar'"
                                required class="single-input">
                            </div>
                             <div class="mt-10">
                                <p>NIK</p>
                                <input type="text" name="nik" placeholder="masukan NIK" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Ketua Sanggar'"
                                required class="single-input">
                            </div>
                            <div class="mt-10">
                                <p>Email Ketua Sanggar</p>
                                <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                                required class="single-input">
                            </div>
                            <div class="mt-10">
                                <p>Kategori</p>
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                    <div>
                                        <select name="kategori" class="form-control" required>
                                            <option value="">--Pilih Kategori--</option>
                                            <?php foreach ($kategori as $key => $value) {
                                                # code...
                                                ?>
                                                <option value="<?= $value->id_kategori ?>"><?php echo $value->nama_kategori; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10"> 
                                <p>Kecamatan</p>
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                    <div>
                                        <select class="form-control" id="pilihkec" name="kecamatan" required>
                                            <option value="">--Pilih Kecamatan--</option>
                                            <?php
                                            $no=0;
                                             foreach ($kecamatan as $key => $value) {
                                                $no++;
                                                # code...
                                                ?>
                                                <option value="<?= $value->id_kecamatan ?>"><?php echo $value->nama_kecamatan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <p>Kelurahan</p>
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-plane" aria-hidden="true"></i></div>
                                    <div>
                                        <select class="form-control" id="pilihkel" name="kelurahan" required>
                                            <option value="">--Pilih Kelurahan--</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>RT</p>
                                    <input type="number" name="rt" placeholder="RT" onfocus="this.placeholder = ''" onblur="this.placeholder = 'RT'"
                                    required class="single-input">
                                </div>
                                <div class="col-md-6">
                                    <P>RW</P>
                                    <input type="number" name="rw" placeholder="RW" onfocus="this.placeholder = ''" onblur="this.placeholder = 'RW'"
                                    required class="single-input">
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Klik Pada Peta Untuk Titik Lokasi</p>
                                    <div id="map" style="height: 250px;"></div>  
                                </div>
                            </div>
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Longitude</p>
                                    <input type="text" id="longitude" name="longitude" placeholder="Klik Pada Peta" onfocus="this.placeholder = ''" readonly  onblur="this.placeholder = 'Tap pada Peta'"
                                    required class="single-input">
                                </div>
                                <div class="col-md-6">
                                    <P>Latitude</P>
                                    <input type="text" id="latitude" name="latitude" placeholder="Klik Pada Peta" onfocus="this.placeholder = ''"  readonly onblur="this.placeholder = 'Klik Pada Peta'"
                                    required class="single-input">
                                </div>
                            </div>
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="false"></i></div>
                        </div>

                        <div class="mt-10">
                            <p>KTP</p>
                            <input type="file" name="ktp" placeholder="Primary color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Primary color'"
                            required class="single-input-primary">
                        </div>
                        <div class="mt-10">
                            <P>File Pengantar Kelurahan</P>
                            <input type="file" name="berkas" placeholder="Accent color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Accent color'"
                            required class="single-input-accent">
                        </div>
                        <div class="mt-10">
                            <P>Foto Sanggar</P>
                            <input type="file" name="foto" placeholder="Accent color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Accent color'"
                            required class="single-input-accent">
                        </div>
                         <div class="mt-10">
                            <P>Foto Ketua</P>
                            <input type="file" name="foto_ketua" placeholder="Accent color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Accent color'"
                            required class="single-input-accent">
                        </div>
                        <div class="mt-10">
                            <p>Deskripsi Singkat</p>
                            <textarea class="single-textarea" name="pesan" placeholder="Deskripsi Singkat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Singkat'"
                            required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm btn_1">Kirim Pengajuan</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-md-5 mt-sm-30 MT-5">
                    <div class="single-element-widget">
                        <h3 class="mb-30 text-center">Syarat Pengajuan</h3>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>1. Input Data Sanggar Dengan benar dan Sesuai</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>2. Lengkapi Berkas Pengajuan terlebih Dahulu Sebelum Mengajukan</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>3. Berkas Pengantar Dari Kelurahan harus berstempel resmi</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>4. Jika Data tidak sesuai maka pengajuan tidak akan terkonfirmasi</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>5. Konfirmasi Pengajuan akan diumumkan min 7 hari setelah pengajuan</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>6. Pilih Kategori sanggar sesuai dengan kolom yang ada pada form</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>6. Isi Form pesan pengajuan semeyakinkan mungkin sebagai pertimbangan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--================Blog Area =================-->
    