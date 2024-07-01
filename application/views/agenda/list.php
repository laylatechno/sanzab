 <!-- ##### Breadcumb Area Start ##### -->
 <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>AGENDA | PROGRAM</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
 <!-- ##### Testimonials Area Start ##### -->
    <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/bg_agenda.jpg); ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                        <span>BAZNAS</span>
                        <h3>Program-program dari Baznas Kota Tasikmalaya</h3>
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
                           
                            <p><?php echo  $p->deskripsi  ?></p>
                            <h6><span><?php echo $p->waktu_mulai ?> S/D <?php echo $p->waktu_selesai ?> </span>  </h6>

                        </div>
                    </div>
                </div>
             
            <?php } ?>
            </div>
            
        </div>
    </div>
    <!-- ##### Testimonials Area End ##### -->

 