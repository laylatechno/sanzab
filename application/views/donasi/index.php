<div class="breadcumb-area bg-img" style="background-image: url(<?php echo base_url() ?>assets/front/img/bg-img/breadcumb.jpg);">
    <div class="bradcumbContent">
        <h2>Donasi</h2>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                <div class="section-heading text-left">
                                    <span>BAZNAS</span>
                                    <h3>Donasi</h3>
                                    <p class="mt-30">Bagi siapa saja yang akan menyalurkan zakat melalui BAZNAS Kota Tasikmalaya, bisa kirim melalui rekening berikut dan setelah melakukan transfer, harap melakukan konfirmasi pembayaran</p>
                                </div>

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

                                <div class="single-contact-info d-flex">
                                    <div class="contact-icon mr-15">
                                        <i class="icon-contract"></i>
                                    </div>
                                    <p><?php echo $konfigurasi->email ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-7">
                            <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                <?php 
                                    if($this->session->flashdata('pesan')){
                                        echo '<div class="alert alert-success">';
                                        echo $this->session->flashdata('pesan');
                                        echo '</div>';
                                    }
                                     
                                    if(isset($error)){
                                        echo '<p class="alert alert-warning">';
                                        echo $error;
                                        echo '</p>';
                                    }
                                    echo validation_errors('<div class="alert alert-success">','</div>');
                                ?>
                                <form class="form-donation">
                                    <div class="form-group">
                                        <label for=""><b>Pilih Donasi</b></label>
                                        <select name="jenis_donasi" id="" class="form-control" style="height:55px;margin-bottom:0" required>
                                            <?php foreach($jenis_donasi as $jd): ?>
                                                <option value="<?= $jd->id ?>" <?= $this->input->get('donasi') == $jd->slug ? 'selected' : '' ?>><?= $jd->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <div><small class="text-danger err-msg err-msg-jenis_donasi mb-2"></small></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-number" name="jumlah" id="jumlah" placeholder="Jumlah Donasi (Rp)*" style="margin-bottom:0"  autocomplete="off" required>
                                        <div><small class="text-danger err-msg err-msg-jumlah mb-2"></small></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan Donasi" minlength="5" maxlength="100" style="height:unset;margin-bottom:0" autocomplete="off"></textarea>
                                        <div><small class="text-danger err-msg err-msg-keterangan mb-2"></small></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="mt-2" for=""><b>Profil Donatur</b></label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap*" style="margin-bottom:0"  autocomplete="off" required>
                                        <div><small class="text-danger err-msg err-msg-nama mb-2"></small></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control input-phone-number" name="nomor_handphone" id="nomor_handphone" placeholder="No Handphone*" style="margin-bottom:0"  autocomplete="off" required>
                                        <div><small class="text-danger err-msg err-msg-nomor_handphone mb-2"></small></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*" style="margin-bottom:0" autocomplete="off" required>
                                        <div><small class="text-danger err-msg err-msg-email mb-2"></small></div>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <button class="btn academy-btn mt-30 btn-submit" type="button">Lanjut ke Pembayaran</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>