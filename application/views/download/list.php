
<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Download</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
 
        <section class="about-us-area mt-0 section-padding-100">
        <div class="container"> 
           
             <div class="row">
                <div class="col-12">
                    <div class="about-slides owl-carousel mt-100 wow fadeInUp" data-wow-delay="600ms">
                          <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <span>BAZNAS</span>
                        <h3>List Download</h3>
                          
                    </div>
                    </div>
                </div>
            </div>

             <div class="row">
                <div class="col-12">
                       <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                  <tr>
                                    <th width="10%" >No</th>
                                    <th>Nama Dokumen</th>
                                    <th width="30%" style="text-align: center;">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                     $no=1;
                                     foreach($download as $p) { ?>
                                  <tr class="gradeA">
                                    <td><?php echo $no++ ?></td>
                                     <td><?php echo $p->nama ?></td>
                                                        
                                     <td style="text-align: center;">
                                       <a href="<?php echo $p->link ?>" class="btn btn-primary btn-xs" target="_blank" ><i class="fa fa-download"></i> Download</a>
                                        
                                       
                                    </td>
                                  </tr>
                                    <?php } ?>
                                  

                                </tbody>
                              </table>
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
    </section>
    <!-- ##### About Us Area End ##### -->

