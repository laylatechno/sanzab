   <!-- ##### Breadcumb Area Start ##### -->
   <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>FAQ</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
<section class="elements-area mt-50 section-padding-100-0">
        <div class="container">
            <div class="row">

             

                <!-- ========== Progress Bars & Accordions ========== -->
                <div class="col-12">
                    <div class="elements-title mb-50">
                        <span>BAZNAS</span>
                        <h2>Pertanyaan yang sering diajukan</h2>
                    </div>
                </div>

                <!-- ##### Accordians ##### -->
                <div class="col-12 col-lg-12">
                    <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- single accordian area -->
                        <?php foreach($faq as $p ) {?>
                        <div class="panel single-accordion">
                            <h6>
                                <a role="button" class="collapsed" aria-expanded="true" aria-controls="<?php echo $p->urutan ?>" data-parent="#accordion" data-toggle="collapse" href="#<?php echo $p->urutan ?>"><?php echo $p->pertanyaan ?>
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        </a>
                            </h6>
                            <div id="<?php echo $p->urutan ?>" class="accordion-content collapse">
                                <p><?php echo $p->jawaban ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

     
            </div>
        </div>
    </section>
    <!-- ***** Elements Area End ***** -->