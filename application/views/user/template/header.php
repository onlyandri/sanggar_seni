<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pemetaan Sanggar Seni Kota Pekalongan</title>
    <link rel="icon" href="<?php echo base_url('upload/icons/') ?>fav.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/flaticon.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/nice-select.css"> -->
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/slick.css">

     <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/css/select2.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/pengguna/') ?>css/style.css">
</head>

<style type="text/css">

</style>

<body>
    <!--::header part start::-->

    <?php if($nav == 'home'){

        ?>
        <header class="main_menu home_menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href= index.html" style="font-weight: bold; color: #556172"> <img style="width: 30px; height: 40px; margin-right: 7px" src="<?php echo base_url('upload/') ?>logo.png" alt="logo">Kota Pekalongan </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link active" href= "<?php echo base_url('user') ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href= "<?php echo base_url('user/jelajah') ?>">Jelajah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('user/pengajuan') ?>">Pengajuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href= "<?php echo base_url('user/info_lanjut') ?>">Info Lanjut</a>
                            </li>
                            <li class="d-none d-lg-block">
                                <a class="btn_1" href="<?php echo base_url('auth') ?>">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<?php }else{ ?>
    <!-- Header part end-->

    <header class="main_menu single_page_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href= index.html" style="font-weight: bold; color: #556172"> <img style="width: 30px; height: 40px" src="<?php echo base_url('upload/') ?>logo.png" alt="logo">Kota Pekalongan </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href= "<?php echo base_url('user') ?>">Home</a>
                        </li>
                        <li class="nav-item <?php echo $nav == 'jelajah' ? '' : '' ?>">
                            <a class="nav-link" href= "<?php echo base_url('user/jelajah') ?>">Jelajah</a>
                        </li>
                        <li class="nav-item <?php echo $nav == 'pengajuan' ? '' : '' ?>">
                            <a class="nav-link" href="<?php echo base_url('user/pengajuan') ?>">Pengajuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $nav == 'info' ? '' : '' ?>" href="<?php echo base_url('user/info_lanjut') ?>">Info Lanjut</a>
                        </li>
                        <li class="d-none d-lg-block">
                            <a class="btn_1" href="<?php echo base_url('auth') ?>">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>


<?php } ?>