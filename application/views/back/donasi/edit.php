<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-6 mt-5">
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
                                echo form_open_multipart(base_url('back/donasi/edit/'.$donasi->id),' class="form-horizontal"');
                                ?>    
                            <form class="form-horizontal">
                              <div class="form-group">
                                  <label   class="col-sm-4 control-label">Nama</label> 
                                  <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama" minlength="5" placeholder="Masukkan Nama Donasi" value="<?php echo $donasi->nama ?>" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label   class="col-sm-4 control-label">Keterangan</label> 
                                  <div class="col-sm-12" style="border: 5px;" > 
                                    <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan" ><?php echo $donasi->keterangan ?></textarea>
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <hr>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Gambar</label> 
                                <div class="col-sm-12">
                                  <input type="file" name="gambar" class="form-control"  >
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/donasi') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
                            </div>
                        </form>
                        <?php echo form_close(); ?>      
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>