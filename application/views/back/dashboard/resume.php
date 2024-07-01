
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
                 
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="data-tables">
                                     
                                    <div class="breadcrumbs-area clearfix">
                                        <h4 class="page-title pull-left">Resume Statistik Pengunjung</h4>
                                       
                                    </div>
                                     
                                     <br>
                                        <table id="mytable" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                             
                                            <th width="33%">Pengunjung Hari Ini</th>
                                            <th width="33%">Total Pengunjung</th>
                                            <th width="33%">Pengunjung Online</th>
                                             
                                       
                                          </tr>
                                          </thead>
                                          <tbody>
                                           
                                          <tr>
                                             
                                            <th><?php echo $pengunjunghariini ?> Orang</th>
                                            <th><?php echo $totalpengunjung ?> Orang</th>
                                            <th><?php echo $pengunjungonline ?> Orang</th>
                                                                                       
                                          </tr>
                                                                                 
                                          </tfoot>
                                        </table>
                              
 

                                </div>
                                <a href="<?php echo base_url('back/dashboard') ?>"><button class="btn btn-primary">Kembali Dashboard</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->

                </div>
            </div>
        </div>
        <!-- main content area end -->
     