<?php
// include '../dash-desa/app/config/koneksi.php';
include '../../../app/models/berita_models.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Supplychain</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="../../../app/assets/as_land/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="../../../app/assets/as_land/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../app/assets/as_land/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../app/assets/as_land/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../../app/assets/as_land/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../app/assets/as_land/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../../app/assets/as_land/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.php" class="logo d-flex align-items-center me-auto">
                <img src="../../../app/assets/as_land/logo.png" alt="">
                <h1 class="sitename"><b>SUPPLYCHAIN</b> </h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="../hal_utama/index.php" class="active">HOME<br></a></li>
                    <li class="dropdown"><a href="#"><span>BERITA</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="../berita/berita_nasional.php">Nasional</a></li>
                            <li><a href="../berita/berita_internasional.php">Internasional</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>KEGIATAN</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="../keg_asperindo/">Asperindo</a></li>
                            <li><a href="#">Perusahaan</a></li>
                        </ul>
                    </li>
                    <li><a href="#">PERUSAHAAN LOGISTIK</a></li>
                    <li><a href="#">LAYANAN</a></li>
                    <li><a href="#">KNOWLAGE</a></li>
                    <!-- <li><a href="#services">Kegiatan ASPERINDO</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>

                    
                    <li class="listing-dropdown"><a href="#"><span>Listing Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li>
                                <a href="#">Column 1 link 1</a>
                                <a href="#">Column 1 link 2</a>
                                <a href="#">Column 1 link 3</a>
                            </li>
                            <li>
                                <a href="#">Column 2 link 1</a>
                                <a href="#">Column 2 link 2</a>
                                <a href="#">Column 3 link 3</a>
                            </li>
                            <li>
                                <a href="#">Column 3 link 1</a>
                                <a href="#">Column 3 link 2</a>
                                <a href="#">Column 3 link 3</a>
                            </li>
                            <li>
                                <a href="#">Column 4 link 1</a>
                                <a href="#">Column 4 link 2</a>
                                <a href="#">Column 4 link 3</a>
                            </li>
                            <li>
                                <a href="#">Column 5 link 1</a>
                                <a href="#">Column 5 link 2</a>
                                <a href="#">Column 5 link 3</a>
                            </li>
                        </ul> -->
                    </li>
                    <li><a href="#contact">CONTACT</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="btn-getstarted flex-md-shrink-0" href="../../../public_dash/" target="blank">Sign in</a>
        </div>
    </header>

    <!-- Berita Utama -->