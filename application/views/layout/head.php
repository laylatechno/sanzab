
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Layla Techno, Muhammad Rafi Heryadi">
    <meta name="keyword" content="<?php echo $konfigurasi->keywords ?>"> 
    <meta name="tagline" content="<?php echo $konfigurasi->tagline ?>">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->icon) ?>">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/style.css">
    
     <style type="text/css" media="screen">
  .pagination a, .pagination b{
    padding: 10px 20px;
    background-color: green;
    color: white;
    text-decoration: none;
    float: left;
  }
  .pagination a:hover{
    background-color: green;
    color: black;

  }
   .pagination a {
    background-color: lightgreen;
    color: black;

  }

  .pagination b:hover{
    background-color: black;
    color: white;

  }
  .owl-theme .owl-dots, .owl-theme .owl-nav {
    text-align: center;
    -webkit-tap-highlight-color: transparent;
}
.owl-theme .owl-dots .owl-dot {
    display: inline-block;
    zoom: 1;
}
.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
    background: #869791;
}
.owl-theme .owl-dots .owl-dot span {
    width: 10px;
    height: 10px;
    margin: 5px 7px;
    background: #D6D6D6;
    display: block;
    -webkit-backface-visibility: visible;
    transition: opacity .2s ease;
    border-radius: 30px;
}
.donation-img {
    height: 167px;
    object-fit: cover;
    -o-object-fit: cover;
    object-position: center;
    -o-object-position: center;
}
</style>
<style>
    .hide {
      opacity: 0;
    }
  </style>

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="<?php echo base_url('home') ?>"><img style="width:300px;" src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->logo) ?>" alt=""></a>
                            </div>
                            <div class="login-content">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url('home') ?> ">BERANDA</a></li>
                                    <li><a href="<?php echo base_url() ?>">TENTANG</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url('tentang') ?>">Profil Baznas</a></li> 
                                            <li><a href="<?php echo base_url('team') ?>">Anggota</a></li> 
                                            <li><a href="<?php echo base_url('faq') ?>">FAQ</a></li>
                                            
                                          
                                        </ul>
                                    </li>

                                    <?php 
                                        $listing_berita_favorit = $this->Berita_model->listing_berita_favorit();
                                        
                                        ?>
                                   
                                    <li><a href="<?php echo base_url() ?>">ZAKAT</a>
                                        <ul class="dropdown">
                                        <?php foreach($listing_berita_favorit as $p ) {?>
                                            <li><a href="<?php echo base_url('berita/detail/'.$p->slug) ?>"><?php echo $p->judul ?></a></li>
                                        <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url() ?>">KABAR</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url('agenda') ?>">AGENDA</a></li>
                                            <li><a href="<?php echo base_url('berita') ?>">BERITA</a></li>
                                         
                                         
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('kontak') ?>">Kontak Kami</a></li>
                                    <li><a href="<?php echo base_url('home/download') ?>" >Download</a></li>
                                    <li><a href="<?php echo base_url('donasi') ?>" >Donasi</a></li>
                                
                                  
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="https://wa.me/<?php echo $konfigurasi->wa ?>?text=Assalamualaikum Warohmatulloh Wa Barokatuh. Saya ingin bertanya mengenai Zakat" target="_blank"><i class="fa fa-whatsapp"></i>Chat WA</a>
                                
                                 
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
 