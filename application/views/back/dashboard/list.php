
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url() ?>">Beranda</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                             
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <div class="card">
                                    <a href="<?php echo base_url('back/pengguna') ?>"><div class="seo-fact sbg3">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-users"></i>Pengguna</div>
                                            <?php 
                                               $no=1;
                                               foreach($total_pengguna as $u) { ?>
                                               <h2><?php echo $u->total_pengguna?></h2>       
                                                <?php } ?>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <a href="<?php echo base_url('back/kontak') ?>"><div class="seo-fact sbg4">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="fa fa-phone"></i>Pesan Kontak</div>
                                            <?php 
                                               $no=1;
                                               foreach($total_kontak as $u) { ?>
                                               <h2><?php echo $u->total_kontak?></h2>       
                                                <?php } ?>
                                        </div>
                                    </div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->

                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="data-tables">
                                     
                                    <div class="breadcrumbs-area clearfix">
                                        <h4 class="page-title pull-left">Statistik Pengunjung</h4>
                                       
                                    </div>
                                     
                                     <br>

                                    <table id="mytable" class="responsive" style="width:100%">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                              <th>No</th>
                                              <th>IP</th>
                                              <th>Tanggal</th>
                                              <th>Hits</th>
                                              <th>Sedang Online</th>
                                              <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php $no=1; foreach($visitor as $p) { ?>
                                            <tr>
                                              <th><?php echo $no++ ?></th>
                                              <th><?php echo $p->ip ?></th> 
                                              <th><?php echo $p->date ?></th> 
                                              <th><?php echo $p->hits ?></th> 
                                              <th><?php echo $p->online ?></th> 
                                              <th><?php echo $p->time ?></th> 
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?php echo base_url('back/dashboard/resume') ?>"><button class="btn btn-success">Lihat Resume Statistik</button></a>
                            </div>
                            
                        </div>

                    </div>
                    <!-- data table end -->
                    
                </div>
            </div>
        </div>
        <!-- main content area end -->
     