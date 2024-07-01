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
                        echo form_open_multipart(base_url('back/profil/edit/'.$pengguna->id_pengguna),' class="form-horizontal"');
                        ?>
                        <form class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" minlength="3" placeholder="Masukkan Nama" value="<?php echo $pengguna->nama ?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" minlength="3" placeholder="Masukkan Email" value="<?php echo $pengguna->email ?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" minlength="3" placeholder="Masukkan Password Dan Perhatikan Baik-Baik"required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_telp" minlength="11" placeholder="Masukkan No Telp/Handphone" value="<?php echo $pengguna->no_telp ?>" required>
                              </div>
                            </div>
                                                       
                            <div class="form-group "> 
                                <div class="col-sm-10">
                                  <select name="level" class="form-control"> 
                                    <option value="Admin" <?php if($pengguna->level=="Admin"){ echo "selected" ; } ?>>Admin</option>
                                    <option value="User">User</option>
                                  </select>
                                </div>
                              </div>

                             <div class="form-group "> 
                                <div class="col-sm-10">
                                  <select name="aktif" class="form-control"> 
                                    <option value="Aktif" <?php if($pengguna->aktif=="Aktif"){ echo "selected" ; } ?>>Aktif</option>
                                    <option value="Tidak">Tidak</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group"> 
                                <div class="col-sm-10">
                                 <input type="file" name="gambar" class="form-control">
                                </div>
                              </div>
                              <hr>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/dashboard') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
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