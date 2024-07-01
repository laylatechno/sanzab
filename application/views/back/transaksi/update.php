
            <!-- page title area start -->
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
                    <!-- data table start -->
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
                                       <?php 
                                      if(isset($error)){
                                        echo '<p class="alert alert-warning">';
                                        echo $error;
                                        echo '</p>';
                                      }

                                      echo validation_errors('<div class="alert alert-success">','</div>');
                                      echo form_open_multipart(base_url('back/transaksi/update/'.$header_transaksi->kode_transaksi),' class="form-horizontal"');
                                      ?>

                                      <form class="form-horizontal">
                                        <div class="box-body">
                                         
                                          <div class="form-group">
                                            <label   class="col-sm-2 control-label">Kode Transaksi</label> 
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="kode_transaksi"  value="<?php echo $header_transaksi->kode_transaksi ?>" disabled required>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label   class="col-sm-2 control-label">Konfirmasi</label> 
                                            <div class="col-sm-10">
                                              <select name="konfirmasi" class="form-control">
                                                 
                                                 <option value="Pending" <?php if($header_transaksi->konfirmasi=="Pending"){ echo "selected" ; } ?>>Pending</option>
                                                 <option value="Proses" <?php if($header_transaksi->konfirmasi=="Proses"){ echo "selected" ; } ?>>Proses</option>
                                                 <option value="Kirim" <?php if($header_transaksi->konfirmasi=="Kirim"){ echo "selected" ; } ?>>Kirim</option>
                                                 <option value="Selesai" <?php if($header_transaksi->konfirmasi=="Selesai"){ echo "selected" ; } ?>>Selesai</option>
                                                  
                                               </select>
                                            </div>
                                          </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                          <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-save"></i> Konfirmasi</button>
                                          <a href="<?php echo base_url('back/transaksi') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
                                        </div>
                                        <!-- /.box-footer -->
                                      </form>
                                      <?php echo form_close(); ?>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                   
                </div>
            </div>
        </div>
     


