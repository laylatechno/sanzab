  <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Staff/Anggota</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
 
    <br><br><br><br>
    <!-- ##### Team Area Start ##### -->
    <section class="teachers-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span>BAZNAS</span>
                       
                    </div>
                </div>
            </div>

            <div class="row">
         <?php foreach($team as $p ) {?>
                <!-- Single Teachers -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-teachers-area text-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <!-- Thumbnail -->
                        <div class="teachers-thumbnail">
                            <img src="<?php echo base_url('upload/team/'.$p->gambar) ?>" alt="">
                        </div>
                        <!-- Meta Info -->
                        <div class="teachers-info mt-30">
                            <h5><?php echo $p->nama ?></h5>
                            <span><?php echo $p->jabatan ?></span>
                        </div>
                    </div>
                </div>
         <?php } ?>         
              
            </div>

           <div class="row">
                <div class="col-12">
                    <div class="about-slides owl-carousel mt-100 wow fadeInUp" data-wow-delay="600ms">
                        <?php foreach($slide as $p ) {?>
                        <img src="<?php echo base_url('upload/slide/'.$p->gambar) ?>" alt="">
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Features Area Start ##### -->