
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo base_url() ?>assets/back/srtdash/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?php echo base_url('back/dashboard') ?>"><img src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->logo) ?>" alt="logo" width="50"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="<?php if($this->uri->segment(2)=='dashboard' ){ echo 'active';} ?> ">
                                <a href="<?php echo base_url('back/dashboard') ?>" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                
                            </li>
                      
                            <li class=" <?php if($this->uri->segment(2)=='pengguna' or $this->uri->segment(2)=='konfigurasi'){ echo 'active';} ?>  ">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Konfigurasi
                                    </span></a>
                                <ul class="collapse">
                                
                                <li class="<?php if($this->uri->segment(2)=='konfigurasi' ){ echo 'active';} ?> "><a href="<?php echo base_url('back/konfigurasi') ?>"><i class="ti-layout-sidebar-left"></i> Konfigurasi Umum</a></li>

                                <li class="<?php if($this->uri->segment(2)=='pengguna'){ echo 'active';} ?>"><a href="<?php echo base_url('back/pengguna') ?>"><i class="ti-user"></i> Pengguna</a></li>
                                     
                                </ul>
                            </li>
                            <li class="<?php if($this->uri->segment(2)=='team' or $this->uri->segment(2)=='slider' or $this->uri->segment(2)=='statistik' or $this->uri->segment(2)=='ikhtisar' or $this->uri->segment(2)=='kegiatan' or $this->uri->segment(2)=='layanan' or $this->uri->segment(2)=='testimoni' or $this->uri->segment(2)=='galeri' or $this->uri->segment(2)=='banner_iklan' or $this->uri->segment(2)=='fasilitas' or $this->uri->segment(2)=='portofolio' or $this->uri->segment(2)=='download' or $this->uri->segment(2)=='price' or $this->uri->segment(2)=='agenda'  or $this->uri->segment(2)=='kelebihan' or $this->uri->segment(2)=='slide' or $this->uri->segment(2)=='donasi'){ echo 'active';} ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-server"></i><span>Master Data
                                    </span></a>
                                <ul class="collapse">
                                    <li class="<?php if($this->uri->segment(2)=='team'){ echo 'active';} ?>"><a href="<?php echo base_url('back/team') ?>"><i class="ti-user"></i> Team</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='agenda'){ echo 'active';} ?>"><a href="<?php echo base_url('back/agenda') ?>"><i class="fa fa-cubes"></i> Agenda</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='layanan'){ echo 'active';} ?>"><a href="<?php echo base_url('back/layanan') ?>"><i class="fa fa-vimeo"></i> Layanan</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='statistik'){ echo 'active';} ?>"><a href="<?php echo base_url('back/statistik') ?>"><i class="ti-user"></i> Statistik</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='slide'){ echo 'active';} ?>"><a href="<?php echo base_url('back/slide') ?>"><i class="ti-image"></i> Slider</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='galeri'){ echo 'active';} ?>"><a href="<?php echo base_url('back/galeri') ?>"><i class="ti-image"></i> Galeri</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='donasi'){ echo 'active';} ?>"><a href="<?php echo base_url('back/donasi') ?>"><i class="fa fa-file-text"></i> Donasi</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='download'){ echo 'active';} ?>"><a href="<?php echo base_url('back/download') ?>"><i class="fa fa-download"></i> Download</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='faq'){ echo 'active';} ?>"><a href="<?php echo base_url('back/faq') ?>"><i class="fa fa-commenting-o"></i> FAQ</a></li>
                                </ul>
                            </li>
                           
                            <li class="<?php if($this->uri->segment(2)=='berita' or $this->uri->segment(2)=='kategori_berita' ){ echo 'active';} ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-commenting-o"></i><span>Berita
                                    </span></a>
                                <ul class="collapse">
                                    <li class="<?php if($this->uri->segment(2)=='kategori_berita'){ echo 'active';} ?>"><a href="<?php echo base_url('back/kategori_berita') ?>"><i class="fa fa-tags"></i> Kategori</a></li>
                                    <li class="<?php if($this->uri->segment(2)=='berita'){ echo 'active';} ?>"><a href="<?php echo base_url('back/berita') ?>"><i class="fa fa-hdd-o"></i> Data Berita</a></li>
                                    <li ><a href="<?php echo base_url('back/berita/tambah') ?>"><i class="fa fa-plus"></i> Tambah Berita</a></li>
                                </ul>
                            </li>
                        
                            <li class="<?php if($this->uri->segment(2)=='kontak' or $this->uri->segment(2)=='langganan' or $this->uri->segment(2)=='bayar' or $this->uri->segment(2)=='laporan_donasi'){ echo 'active';} ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-line-chart"></i><span>Laporan
                                    </span></a>
                                <ul class="collapse">
                                    <li class="<?php if($this->uri->segment(2)=='kontak'){ echo 'active';} ?>"><a href="<?php echo base_url('back/kontak')?>"><i class="fa fa-comment"></i> <span>Pesan Kontak</span></a></li>
                                    <li class="<?php if($this->uri->segment(2)=='bayar'){ echo 'active';} ?>"><a href="<?php echo base_url('back/bayar')?>"><i class="fa fa-dollar"></i> <span>Bayar</span></a></li>
                                    <li class="<?php if($this->uri->segment(2)=='laporan_donasi'){ echo 'active';} ?>"><a href="<?php echo base_url('back/laporan_donasi')?>"><i class="fa fa-dollar"></i> <span>Donasi</span></a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?php echo base_url('back/login/logout')?>" aria-expanded="true"><i class="fa fa-sign-out text-aqua"></i><span>Keluar
                                    </span></a>
                               
                            </li>
                           
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
       