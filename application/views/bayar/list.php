<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Bayar</h2>
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
                                        <h3>Bayar/Konfirmasi</h3>
                                        <p class="mt-30">Bagi siapa saja yang akan mnyalurkan zakat melalui BAZNAS Kota Tasikmalaya, bisa kirim melalui rekening berikut dan setelah melakukan transfer, harap melakukan konfirmasi pembayaran</p>
                                    </div>

                                  
                                 
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="fa fa-archive"></i>
                                        </div>
                                        <p><?php echo $konfigurasi->rekening_1 ?></p>
                                    </div>

                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="fa fa-archive"></i>
                                        </div>
                                        <p><?php echo $konfigurasi->rekening_2 ?></p>
                                    </div>

                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="fa fa-archive"></i>
                                        </div>
                                        <p><?php echo $konfigurasi->rekening_3 ?></p>
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


                                        echo form_open_multipart(base_url('bayar/bayar'),' class="form-horizontal"');
                                        ?>
                                    <form action="" method="">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                                        <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telepon" required>
                                        <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank" required>
                                        <input type="file" name="gambar" class="form-control"  value="<?php echo set_value('gambar') ?>"required>
                                        <p>*Bukti Bayar/Transfer</p>
                                      
                                        <button class="btn academy-btn mt-30" type="submit" name="submit">Konfirmasi</button>
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