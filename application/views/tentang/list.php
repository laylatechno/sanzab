 
<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Profil Baznas</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Us Area Start ##### -->
    <section class="about-us-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span>BAZNAS</span>
                        <h3>Tentang BAZNAS</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <p><?php echo $konfigurasi->deskripsi_1 ?></p>
                </div>
                
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                <br>
                    <p><?php echo $konfigurasi->deskripsi_2 ?></p>
                </div>
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
    <!-- ##### About Us Area End ##### -->

 