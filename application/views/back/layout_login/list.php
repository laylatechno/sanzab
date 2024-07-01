

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo base_url() ?>assets/back/srtdash/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
   
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
                 <?php echo form_open(base_url('back/login/masuk')); ?>
                <form>
           
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <p>Hello, silahkan login dengan akun anda, tetap hati-hati</p>
                    </div>
                    <div class="login-form-body">
                                 <?php  
                                 if($this->session->flashdata('pesan')){
                                  echo '<div class="alert alert-success">';
                                  echo $this->session->flashdata('pesan');
                                  echo '</div>';
                                 }
                                 ?>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <br>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <br>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                 
                            </div>
                             
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login <i class="ti-arrow-right"></i></button>
                        </div>

                          

                       
                    </div>
                     <?php 
                    echo form_close();
                    ?>
                </form>
            </div>
        </div>
    </div>
 