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
                                    <h3 class="text-center">Terima kasih!</h3>
                                    <p class="mt-30">Terima kasih sudah menyalurkan donasi melalui BAZNAS Kota Tasikmalaya.</p>
                                    <?php if($donasi->transaction_status == 'pending'): ?>
                                        <p>Mohon lakukan pembayaran Anda dengan detail berikut:</p>
                                    <?php elseif($donasi->transaction_status == 'settlement'): ?>
                                        <p>Pembayaran Anda sudah diterima. Silakan lihat detail pesanan Anda di bawah ini:</p>
                                    <?php elseif($donasi->transaction_status == 'expire'): ?>
                                        <p>Maaf, tagihan Anda telah kedaluwarsa. Silakan kembali ke website Baznas Tasikmalaya untuk melakukan donasi ulang.</p>
                                    <?php endif ?>
                                    
                                    <?php if(isset($donasi->payment_code) && $donasi->transaction_status == 'pending'): ?>
                                        <div class="text-center">
                                            <b>Kode Pembayaran</b>
                                            <br>
                                            <svg id="barcode"></svg>
                                        </div>
                                    <?php endif ?>
                                    
                                    <?php if($donasi->transaction_status == 'pending'): ?>
                                        <div class="text-center"><b>Bayar sebelum <span class="text-danger" style="display: unset;font-size:unset;letter-spacing:unset"><?= isset($donasi->expiry_time) ? date('d F Y, H:i:s', strtotime($donasi->expiry_time)) : '' ?></span></b></div>
                                        <div class="alert alert-warning mt-2">
                                            <div class="row">
                                                <div class="col-1"><i class="fa fa-info-circle"></i></div>
                                                <div class="col-11">Mohon dibayarkan sebelum waktu pembayaran kedaluwarsa untuk menghindari pembatalan pesanan.</div>
                                            </div>
                                        </div>
                                    <?php endif ?>

                                    <div>
                                        <p><b>Rincian</b></p>
                                        <div class="row mb-1">
                                            <div class="col-6"><?= $donasi->nama_donasi ?></div>
                                            <div class="col-6 text-right">Rp <?= number_format($donasi->gross_amount) ?></div>
                                        </div>
                                        <hr>
                                        <div class="row mt-1">
                                            <div class="col-6"><b>Total Tagihan</b></div>
                                            <div class="col-6 text-right"><b>Rp <?= number_format($donasi->gross_amount) ?></b></div>
                                        </div>
                                    </div>

                                    <?php if($donasi->transaction_status == 'pending' && $donasi->pdf_url != null): ?>
                                        <div class="text-center mt-5">
                                            <a href="<?= $donasi->pdf_url ?>" class="btn academy-btn" target="_blank" rel="noopener noreferrer">UNDUH PANDUAN PEMBAYARAN</a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-7">
                            <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                <div class="text-center mb-2">
                                    Tanggal <b><?= date('d F Y, H:i:s', strtotime($donasi->transaction_time)) ?></b>
                                    <p><b class="text-mute">Total Pembayaran</b></p>
                                    <h2>Rp <?= number_format($donasi->gross_amount) ?></h2>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6"><b class="text-muted">Status Transaksi</b></div>
                                    <div class="col-6 text-right"><b><?= transactionStatus($donasi->transaction_status, true) ?></b></div>
                                    <div class="col-6 mt-3"><b class="text-muted">Metode Bayar</b></div>
                                    <div class="col-6 text-right mt-3"><b><?= paymentMethod($donasi) ?></b></div>
                                </div>
                                
                                <?php if($donasi->transaction_status == 'settlement'): ?>
                                    <div class="text-center mt-5">
                                        <a href="<?= base_url('donasi') ?>" class="btn academy-btn w-100">DONASI LAGI</a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>