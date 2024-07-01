

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <!-- <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form> -->
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view" title="Lihat Full Screen"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <a href="<?php echo base_url('home') ?>" target="_blank"><li class="dropdown" title="Lihat Web">
                                <i class="fa fa-globe">
                                  </i>
                             </li></a>
                           <!--  <a href="<?php echo base_url('back/pengguna') ?>"><li class="dropdown" title="Pengguna">
                                 <?php 
                                $no=1;
                                foreach($total_pengguna as $u) { ?>
                                <i class="fa fa-users"><span><?php echo $u->total_pengguna?></span></i>
                                 <?php } ?>
                            </li></a> -->
                             <a href="<?php echo base_url('back/konfigurasi') ?>"><li title="Lihat Konfigurasi">
                                <i class="ti-settings"></i>
                            </li></a>
                            <li class="dropdown">
                                <div class="user-profile pull-right">
                                    <img class="" src="<?php echo base_url('upload/pengguna/thumbs/'.$this->session->userdata('gambar')) ?>" alt="user" width="20">&nbsp;&nbsp;
                                    <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama') ?> <i class="fa fa-angle-down"></i></h4>
                                    <div class="dropdown-menu">
                                         <a class="dropdown-item" href="<?php echo base_url('back/profil/edit/'.$this->session->userdata('id_pengguna')) ?>">Profil</a>
                                         <a class="dropdown-item" href="<?php echo base_url('back/login/logout') ?>">Log Out</a>
                                    </div>
                                </div>
                            </li>
                            
                           
                        </ul>


                    </div>
                </div>
            </div>
            <!-- header area end -->