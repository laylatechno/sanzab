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
                        echo form_open_multipart(base_url('back/team/edit/'.$team->id_team),' class="form-horizontal"');
                        ?>
                        <form class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" minlength="3" placeholder="Masukkan Nama" value="<?php echo $team->nama ?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="no_telp" minlength="11" placeholder="Masukkan No Telp/Handphone" value="<?php echo $team->no_telp ?>" required>
                              </div>
                            </div>

                            <div class="form-group"> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" minlength="6" placeholder="Masukkan Email" value="<?php echo $team->email ?>" required> 
                              </div>
                            </div>

                            <div class="form-group">
                               <div class="col-sm-10">
                                  <textarea name="alamat" class="form-control" minlength="4" placeholder="Masukkan Alamat" required><?php echo $team->alamat ?></textarea>
                               </div>
                            </div>

                            <div class="form-group"> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="jabatan" minlength="4" placeholder="Masukkan Jabatan" value="<?php echo $team->jabatan ?>" required> 
                              </div>
                            </div>

                            <div class="form-group">
                               <div class="col-sm-10">
                                  <textarea name="deskripsi" class="form-control" minlength="5" placeholder="Masukkan Deskripsi" required><?php echo $team->deskripsi ?></textarea>
                               </div>
                            </div>

                            <div class="form-group">
                               <div class="col-sm-10">
                                  <textarea name="motto" class="form-control" minlength="4" placeholder="Masukkan Motto" required><?php echo $team->motto ?></textarea>
                               </div>
                            </div>

                            <div class="form-group"> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="instagram" minlength="4" placeholder="Masukkan Profil Instagram" value="<?php echo $team->instagram ?>" required> 
                              </div>
                            </div>

                            <div class="form-group"> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="facebook" minlength="6" placeholder="Masukkan Facebook" value="<?php echo $team->facebook ?>" required> 
                              </div>
                            </div>

                            <div class="form-group"> 
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="urutan" minlength="1" placeholder="Masukkan Urutan Tampil" value="<?php echo $team->urutan ?>" required> 
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
                                <a href="<?php echo base_url('back/team') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
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