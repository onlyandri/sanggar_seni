
<!--================Blog Area =================-->
<section class="blog_area section_padding">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <h3 class="mb-30">DETAIL PENGAJUAN</h3>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="<?php echo base_url('user/insert') ?>" class="form-group" enctype="multipart/form-data">
                        <div class="mt-10">
                            <input type="hidden" name="password" placeholder="Nama Sanggar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama sanggar'"
                            required readonly class="single-input" value="<?php echo $pengajuan['id_otomatis'] ?>">
                        </div>
                        <div class="mt-10">
                            <p>Nama Sanggar</p>
                            <input type="text" name="nama_sanggar" placeholder="Nama Sanggar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama sanggar'"
                            required class="single-input" value="<?php echo $pengajuan['nama_sanggar'] ?>" readonly>
                        </div>
                        <div class="mt-10">
                            <p>Nama Ketua Sanggar</p>
                            <input type="text" name="nama_ketua" placeholder="Nama Ketua Sanggar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Ketua Sanggar'"
                            required class="single-input" value="<?php echo $pengajuan['nama_ketua'] ?>" readonly>
                        </div>
                        <div class="mt-10">
                            <p>NIK</p>
                            <input type="text" name="nik" placeholder="masukan NIK" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Ketua Sanggar'"
                            required class="single-input" value="<?php echo $pengajuan['nik'] ?>" readonly>
                        </div>
                        <div class="mt-10">
                            <p>Email Ketua Sanggar</p>
                            <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                            required class="single-input" value="<?php echo $pengajuan['email_ketua'] ?>" readonly>
                        </div>
                        <div class="mt-10">
                            <p>Kecamatan</p>
                            <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                            required class="single-input" value="<?php echo $pengajuan['nama_kecamatan'] ?>" readonly>
                        </div>
                        <div class="mt-10">
                            <p>Kelurahan</p>
                            <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'alamat Email'"
                            required class="single-input" value="<?php echo $pengajuan['nama_kelurahan'] ?>" readonly>
                        </div>
                        <div class="mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>RT</p>
                                    <input type="number" name="rt" placeholder="RT" onfocus="this.placeholder = ''" onblur="this.placeholder = 'RT'"
                                    required class="single-input" value="<?php echo $pengajuan['rt'] ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <P>RW</P>
                                    <input type="number" name="rw" placeholder="RW" onfocus="this.placeholder = ''" onblur="this.placeholder = 'RW'"
                                    required class="single-input" value="<?php echo $pengajuan['rw'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="input-group-icon mt-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Longitude</p>
                                    <input type="text" id="longitude" name="longitude" placeholder="Klik Pada Peta" onfocus="this.placeholder = ''" readonly  onblur="this.placeholder = 'Tap pada Peta'"
                                    required class="single-input" value="<?php echo $pengajuan['longitude'] ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <P>Latitude</P>
                                    <input type="text" id="latitude" name="latitude" placeholder="Klik Pada Peta" onfocus="this.placeholder = ''"  readonly onblur="this.placeholder = 'Klik Pada Peta'"
                                    required class="single-input" value="<?php echo $pengajuan['latitude'] ?>" readonly>
                                </div>
                            </div>
                            <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="false"></i></div>
                        </div>
                        <div class="form-group mt-3">
                            <a href="<?php echo base_url('user/cetakBukti/'.$pengajuan['id_otomatis']) ?>" type="submit" class="button button-contactForm btn_1">Cetak Bukti</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-md-5 mt-sm-30 MT-5">
                    <div class="single-element-widget">
                        <h3 class="mb-30 text-center">Syarat Pengajuan</h3>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>1. Simpan Bukti Pengajuan Sebagai Bukti Pengajuan yang sah</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>2. Konfirmasi akan dikirim melalui email</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>3. cek email pada kotak masuk atau span</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>4. Keputusan hasil pengajuan tidak bisa diganggu gugat </p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>5. Konfirmasi Pengajuan akan diumumkan min 7 hari setelah pengajuan</p>
                        </div>
                        <div class="switch-wrap d-flex justify-content-between">
                            <p>6. Dengan ini syarat dan ketentua telah disetujui</p>
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
