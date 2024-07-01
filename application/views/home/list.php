<div class="row">
    <div class="col-12">
        <div class="about-slides owl-carousel mt-100 wow fadeInUp" data-wow-delay="600ms">
            <?php foreach($slide as $p ) {?>
                <img src="<?php echo base_url('upload/slide/'.$p->gambar) ?>" alt="">
            <?php } ?>
        </div>
    </div>
</div>

<br><br><br><br> <br><br><br><br>
<!-- ##### Top Feature Area Start ##### -->
<div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="features-content">
                    <div class="row no-gutters">
                        <!-- Single Top Features -->
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="fa  fa-star"></i>
                                <h5>Jujur</h5>
                            </div>
                        </div>
                        <!-- Single Top Features -->
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="icon-assistance"></i>
                                <h5>Amanah</h5>
                            </div>
                        </div>
                        <!-- Single Top Features -->
                        <div class="col-12 col-md-4">
                            <div class="single-top-features d-flex align-items-center justify-content-center">
                                <i class="fa fa-info-circle"></i>
                                <h5>Akuntabel</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Top Feature Area End ##### -->

<!-- ##### Course Area Start ##### -->
<div class="academy-courses-area section-padding-100-0">
    <div class="container">
        <div class="row">
                    <?php foreach($layanan as $p ) {?>
            <!-- Single Course Area -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                    <div class="course-icon">
                        <i class="<?php echo $p->icon ?>"></i>
                    </div>
                    <div class="course-content">
                        <h4><?php echo $p->nama ?></h4>
                        <p><?php echo $p->isi ?></p>
                    </div>
                </div>
            </div>
                <?php } ?>

        </div>
    </div>
</div>
<!-- ##### Course Area End ##### -->

<div class="top-popular-courses-area section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <span></span>
                    <h3>Donasi Online BAZNAS Kota Tasikmalaya</h3>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="academy-cool-facts-area mb-2">
                <div class="donation owl-theme owl-carousel wow fadeInUp" data-wow-delay="300ms"">
                    <?php foreach($sum_donasi as $sd ): ?>
                        <div class="card mb-4">
                            <img class="card-img-top donation-img" src="<?= base_url('upload/donasi/' . $sd->gambar) ?>" alt="Card image cap" onerror="this.src='<?= base_url('assets/front/img/no-image.png') ?>'">
                            <div class="card-body">
                                <h5 class="card-title"><?= $sd->nama ?></h5>
                                <p class="card-text">
                                    Dana Terkumpul
                                    <div class="text-right"><h5 class="text-success">Rp <?= number_format($sd->total) ?></h3></div>
                                </p>
                                <a href="<?= base_url('donasi?donasi=' . $sd->slug) ?>" class="btn academy-btn w-100">Donasi Sekarang</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Testimonials Area Start ##### -->
<div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                    <!-- <span>our testimonials</span> -->
                    <h3>AGENDA | PROGRAM</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($agenda as $p ) {?>
            <!-- Single Testimonials Area -->
            <div class="col-12 col-md-6">
                <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                    <div class="testimonial-thumb">
                        <img src="<?php echo base_url('upload/agenda/'.$p->gambar) ?>" alt="" style="width: 100%; height: 100%;">
                    </div>
                    <div class="testimonial-content">
                        <a href="" title=""> <h5><?php echo $p->nama ?></h5></a>
                        <p><?php echo character_limiter($p->deskripsi,80) ?></p>
                        <h6><span><?php echo $p->waktu_mulai ?> S/D <?php echo $p->waktu_selesai?> </span>  </h6>
                        
                    </div>
                </div>
            </div>
            
        <?php } ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="800ms">
                    <a href="<?php echo base_url('agenda') ?>" class="btn academy-btn">Selengkapnya...</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Testimonials Area End ##### -->
                <!-- ========== Milestones ========== -->
<div class="top-popular-courses-area section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                    <span></span>
                    <h3>Statistik Tahun <script>document.write(new Date().getFullYear());</script></h3>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="academy-cool-facts-area mb-2">
                <div class="row">
                    <?php foreach($statistik as $p ) {?>
                        <!-- Single Cool Fact-->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="single-cool-fact text-center">
                                <i class="<?php echo $p->icon ?>"></i>
                                <h6><span class="counter"><?php echo $p->isi ?></span> <?php echo $p->satuan ?></h6>
                                <p><?php echo $p->nama  ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- ##### Top Popular Courses Area Start ##### -->
<div class="top-popular-courses-area section-padding-50-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        
                    <h3>Berita</h3>
                </div>
            </div>
        </div>
        <div class="row">
            
            <?php foreach($berita as $p ) {?>
            <!-- Single Top Popular Course -->
            <div class="col-12 col-lg-6">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                    <div class="popular-course-content">
                        <a href="<?php echo base_url('berita/detail/'.$p->slug) ?>" title=""><h5><?php echo $p->judul ?></h5></a>
                        <span>By <?php echo $p->pengguna ?>   |  <?php echo $p->tanggal_input ?> </span>
                        <div class="course-ratings">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <p><?php echo character_limiter($p->deskripsi,80) ?></p>
                        <a href="<?php echo base_url('berita/detail/'.$p->slug) ?>" class="btn academy-btn btn-sm">Detail</a>
                    </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url(<?php echo base_url('upload/berita/'.$p->gambar) ?>);"></div>
                </div>
            </div>
            
        <?php } ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="800ms">
                    <a href="<?php echo base_url('berita') ?>" class="btn academy-btn">Selanjutnya...</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<!-- ##### Top Popular Courses Area End ##### -->

<!-- ##### Partner Area Start ##### -->
<!--   <div class="partner-area section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                    <a href="<?php echo base_url() ?>assets/front/#"><img src="<?php echo base_url() ?>assets/front/img/clients-img/partner-1.png" alt=""></a>
                    <a href="<?php echo base_url() ?>assets/front/#"><img src="<?php echo base_url() ?>assets/front/img/clients-img/partner-2.png" alt=""></a>
                    <a href="<?php echo base_url() ?>assets/front/#"><img src="<?php echo base_url() ?>assets/front/img/clients-img/partner-3.png" alt=""></a>
                    <a href="<?php echo base_url() ?>assets/front/#"><img src="<?php echo base_url() ?>assets/front/img/clients-img/partner-4.png" alt=""></a>
                    <a href="<?php echo base_url() ?>assets/front/#"><img src="<?php echo base_url() ?>assets/front/img/clients-img/partner-5.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ##### Partner Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="call-to-action-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                    <h3>SUCIKAN HARTA SUCIKAN JIWA</h3>
                    <a href="<?php echo base_url('bayar') ?>" class="btn academy-btn">Bayar Zakat / Konfirmasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->