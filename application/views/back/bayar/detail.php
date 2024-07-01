<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title"><?php echo $title; ?></h4>
                            <hr>

                            <?php 
                              if(isset($error)){
                                echo '<p class="alert alert-warning">';
                                echo $error;
                                echo '</p>';
                              }

                              echo validation_errors('<div class="alert alert-success">','</div>');
                              echo form_open_multipart(base_url('back/bayar/cetak_detail/'.$bayar->id_bayar),' class="form-horizontal"');
                              ?>
                        <form class="form-horizontal">
                              
                          <div class="box-body">
               
                                <div class="form-group">
                                  <label   class="col-sm-2 control-label">Nama Pengirim</label> 
                                  <div class="col-sm-10">
                                    <textarea class="form-control"><?php echo $bayar->nama ?></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label   class="col-sm-2 control-label">No Telp</label> 
                                  <div class="col-sm-10">
                                    <textarea class="form-control"><?php echo $bayar->no_telp ?></textarea>
                                  </div>
                                </div>

                                 <div class="form-group">
                                  <label   class="col-sm-2 control-label">Bank</label> 
                                  <div class="col-sm-10">
                                    <textarea class="form-control"><?php echo $bayar->bank ?></textarea>
                                  </div>
                                </div>
                 
                               <div class="form-group">
                                  <label   class="col-sm-2 control-label">Bukti Bayar</label> 
                                  <div class="col-sm-10">
                                  <a href="<?php echo base_url('upload/bayar/'.$bayar->gambar) ?>" target="_blank" title="Lihat Gambar"><img src="<?php echo base_url('upload/bayar/'.$bayar->gambar) ?>" class="img img-thumbnail text-center" width="100"></a>
                                  </div>
                                </div>

                              <hr>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-print" ></i> Cetak</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/bayar') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
                             </div>
                              <!-- /.box-footer -->
                        </form>
                        <?php echo form_close(); ?>      
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->


                   
            </div>
        </div>
    </div>
</div>