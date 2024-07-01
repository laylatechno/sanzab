<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Kontak</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Google Maps ##### -->
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-content">
                        <div class="row">
                            <!-- Contact Information -->
                            <div class="col-12 col-lg-5">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                    <div class="section-heading text-left">
                                        <span>BAZNAS</span>
                                        <h3>Kontak Kami</h3>
                                        <p class="mt-30">Kirimkan kritik saran dan pengaduan kepada kami, dengan menyertakan data diri dan maksud yang jelas dan lengkap. Terima Kasih</p>
                                    </div>

                                

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <p><?php echo $konfigurasi->alamat ?></p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-telephone-1"></i>
                                        </div>
                                        <p>Main: <?php echo $konfigurasi->no_telp ?> <br> Office: <?php echo $konfigurasi->no_telp ?></p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-contract"></i>
                                        </div>
                                        <p><?php echo $konfigurasi->email ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                     <?php 

                                       if($this->session->flashdata('pesan')){
                                        echo '<div class="alert alert-success">';
                                        echo $this->session->flashdata('pesan');
                                        echo '</div>';
                                       }
                                       ?>
                                        <?php  
                                    if(isset($error)){
                                          echo '<p class="alert alert-warning">';
                                          echo $error;
                                          echo '</p>';
                                        }

                                        echo validation_errors('<div class="alert alert-success">','</div>');


                                        echo form_open_multipart(base_url('kontak/tambah'),' class="form-horizontal"');
                                        ?>
                                    <form action="#" method="post">
                                        <input type="text" class="form-control" name="nama" id="name" placeholder="Nama Anda">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Anda">
                                         <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek Pesan Anda">
                                        <textarea name="isi" class="form-control" id="isi" cols="30" rows="10" placeholder="Isi Pesan"></textarea>
                                        <button class="btn academy-btn mt-30" type="submit">Kirim</button>
                                    </form>
                                    <?php  echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->