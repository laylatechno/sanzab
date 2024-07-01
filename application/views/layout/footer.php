

        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                            <a href="<?php echo base_url('home') ?>"><img src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->logo) ?>" alt=""></a>
                            </div>
                            <p><?php echo $konfigurasi->deskripsi_3 ?></p>
                            <div class="footer-social-info">
                                 <a href="<?php echo $konfigurasi->facebook ?>"target="_blank"><i class="fa fa-facebook"></i></a>
                                 <a href="<?php echo $konfigurasi->instagram ?>"target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Link Pintasan</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="<?php echo base_url('home') ?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url('agenda') ?>">Program</a></li>
                                    <li><a href="<?php echo base_url('berita') ?>">Kabar</a></li>
                                    <li><a href="<?php echo base_url('tentang') ?>">Tentang Baznas</a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Gallery</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                            <?php foreach($galeri_footer as $p ) {?>
                                <a href="<?php echo base_url('upload/galeri/'.$p->gambar) ?>" class="gallery-img" title="<?php echo $p->nama ?> - <?php echo $p->deskripsi ?>"><img src="<?php echo base_url('upload/galeri/'.$p->gambar) ?>" alt=""></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Kontak</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p><?php echo $konfigurasi->alamat ?></p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>Main: <?php echo $konfigurasi->no_telp ?> <br>Office: <?php echo $konfigurasi->no_telp ?></p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p><?php echo $konfigurasi->email ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="https://ltpresent.com">LT Present</a> All rights reserved | This template is made </i> by <a href="<?php echo base_url() ?>assets/front/https://colorlib.com" target="_blank">this</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url() ?>assets/front/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <!--<script src="<?php echo base_url() ?>assets/front/js/bootstrap/popper.min.js"></script>-->
    <!-- Bootstrap js -->
    <script src="<?php echo base_url() ?>assets/front/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url() ?>assets/front/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url() ?>assets/front/js/active.js"></script>
    <?php isset($script) ? $this->load->view($script) : '' ?>
</body>

</html>