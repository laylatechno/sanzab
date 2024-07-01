<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?php echo $title; ?></h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?php echo base_url('back/dashboard') ?>">Dashboard</a></li>
                    <li><span><?php echo $title; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                    
            </div>
        </div>
    </div>
</div>
    
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="data-tables">
                            <br>
                            <?php  
                                if($this->session->flashdata('pesan')){
                                    echo '<div class="alert alert-success">';
                                    echo $this->session->flashdata('pesan');
                                    echo '</div>';
                                }
                            ?>
                            <br>

                            <table id="mytable" class="display nowrap" style="width:100%">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Donasi</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Metode Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($donasi as $p) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $p->jenis_donasi ?></td>
                                            <td><?php echo $p->nama_lengkap ?></td>
                                            <td><?php echo $p->nomor_handphone ?></td> 
                                            <td><?php echo $p->email ?></td> 
                                            <td><?php echo 'Rp ' . number_format($p->gross_amount) ?></td> 
                                            <td><?php echo $p->keterangan ?></td> 
                                            <td><?= paymentMethod($p) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>