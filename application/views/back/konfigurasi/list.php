 
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
                          echo form_open_multipart(base_url('back/konfigurasi'),'');
                          ?>
                        
                            <!-- Profile Image -->
                              <div class="box box-primary">
                                <div class="box-body box-profile">
                                  <img class="img-responsive" width="100" src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->logo) ?>" alt="User profile picture">
                                  <br>
                                  <?php echo $this->session->flashdata('pesan'); ?>
                                  <br>
                                  <p class="text-muted "><i class="fa fa-user"></i> Nama Instansi</p>
                                  <input class="form-control input-sm" placeholder="Masukkan Nama Instansi" name="nama" value="<?php echo $konfigurasi->nama ?>"required>
                                  <br>
                                  <p class="text-muted "><i class="fa fa-map-marker"></i> Alamat</p> 
                                  <textarea class="form-control" id="inputExperience" placeholder="Masukkan Alamat" name="alamat"   required><?php echo $konfigurasi->alamat ?></textarea> 
                                  <br>
                                  <p class="text-muted "><i class="fa fa-users"></i> Kota</p>
                                  <input class="form-control input-sm" placeholder="Masukkan Kota" name="kota" value="<?php echo $konfigurasi->kota ?>"required>
                                  <br>
                                <p class="text-muted "><i class="fa fa-users"></i> Website</p>
                                  <input class="form-control input-sm" placeholder="Masukkan Kota" name="website" value="<?php echo $konfigurasi->website ?>"required>
                                  <br>
                                   <p class="text-muted "><i class="fa fa-android"></i> No Telepon/HP</p>
                                  <input class="form-control input-sm" placeholder="Masukkan No Telepon/HP" name="no_telp" value="<?php echo $konfigurasi->no_telp ?>"required>
                                  <br> 
                               
                                  <button type="submit" class="btn btn-success btn-block"><b>Update</b></button>
                                  
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                              <br>
                              <!-- About Me Box -->
                              <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Media Sosial</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan Alamat Email" name="email" value="<?php echo $konfigurasi->email ?>"required>
                                  <hr>

                                  <strong><i class="fa fa-facebook margin-r-5"></i> Facebook</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan Alamat Facebook" name="facebook" value="<?php echo $konfigurasi->facebook ?>"required>
                                  <hr>

                                  <strong><i class="fa fa-instagram margin-r-5"></i> Instagram</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan Alamat Instagram" name="instagram" value="<?php echo $konfigurasi->instagram ?>"required> 
                                  <hr>

                                  <strong><i class="fa fa-twitter margin-r-5"></i> Twitter</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan Alamat Twitter" name="twitter" value="<?php echo $konfigurasi->twitter ?>" required> 
                                  <hr>

                                  <strong><i class="fa fa-youtube margin-r-5"></i> Youtube</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan Alamat Youtube" name="youtube" value="<?php echo $konfigurasi->youtube ?>" required> 
                                  <hr>

                                  <strong><i class="fa  fa-external-link margin-r-5"></i> Link Video</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan Link Video Youtube" name="link" value="<?php echo $konfigurasi->link ?>" required> 
                                  <hr>

                                  <strong><i class="fa  fa-whatsapp margin-r-5"></i> Whatsapp</strong> 
                                  <input class="form-control input-sm" placeholder="Masukkan No Whatsapp" name="wa" value="<?php echo $konfigurasi->wa ?>" required> 
                                  <hr>
                                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong> 
                                  <p><b><i>Periksa kembali semua data yang akan diperbaharui</i></b></p>
                                
                                </div>
                                <!-- /.box-body -->
                              </div>       
                                            
                                   
                       
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Textual inputs end -->


                                    <!-- Sisi Kanan -->
                                   <div class="col-6 mt-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <br>
                                                <hr>
                                                
                                            
                                 <div class="tab-content">
                                  <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                      <div class="user-block">
                                        <img class="img-fluid mr-2" src="<?php echo base_url()?>upload/deskripsi.jpg" width="40" alt="user image">
                                            <span class="username">
                                              <a href="">Deskripsi Utama</a>
                                               
                                            </span>
                                        <span class="description">Deskripsi utama untuk ditampilkan</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        <textarea  id="editor1" name="deskripsi_1" data-sample-short><?php echo $konfigurasi->deskripsi_1 ?></textarea>
                                      </p>
                                  
                                    </div>
                                    <!-- /.post -->
                                    <br>
                                    <!-- Post -->
                                    <div class="post clearfix">
                                      <div class="user-block">
                                          <img class="img-fluid mr-2" src="<?php echo base_url()?>upload/deskripsi.jpg" width="40" alt="user image">
                                            <span class="username">
                                              <a href="">Deskripsi Alternatif</a>
                                               
                                            </span>
                                        <span class="description">Deskripsi alternatif untuk ditampilkan</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        <textarea class="form-control" id="editor1" placeholder="Masukkan Deskripsi Alternatif" name="deskripsi_2" required><?php echo $konfigurasi->deskripsi_2 ?></textarea> 
                                      </p>
                     
                                    </div>
                                    <!-- /.post -->
                                    <br>
                                        <!-- Post -->
                                    <div class="post clearfix">
                                      <div class="user-block">
                                          <img class="img-fluid mr-2" src="<?php echo base_url()?>upload/deskripsi.jpg" width="40"   alt="user image">
                                            <span class="username">
                                              <a href="">Deskripsi Footer</a>
                                               
                                            </span>
                                        <span class="description">Deskripsi footer untuk ditampilkan</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        <textarea class="form-control" id="inputExperience" placeholder="Masukkan Deskripsi Footer" name="deskripsi_3" required><?php echo $konfigurasi->deskripsi_3 ?></textarea> 
                                      </p>
                     
                                    </div>
                                    <!-- /.post -->
                                    <br>
                                         <!-- Post -->
                                    <div class="post clearfix">
                                      <div class="user-block">
                                          <img class="img-fluid mr-2" src="<?php echo base_url()?>upload/deskripsi.jpg" width="40" alt="user image">
                                            <span class="username">
                                              <a href="">Copyright Footer</a>
                                               
                                            </span>
                                        <span class="description">Copyright footer untuk ditampilkan</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        <textarea class="form-control" id="inputExperience" placeholder="Masukkan Copyright Footer" name="footer" required><?php echo $konfigurasi->footer ?></textarea> 
                                      </p>
                     
                                    </div>
                                    <!-- /.post -->
                                    <br><br>
                                    <!-- Post -->
                                    <div class="post">
                                      <div class="user-block">
                                          <img class="img-fluid mr-2" src="<?php echo base_url()?>upload/gambar.jpg" width="40" alt="user image">
                                            <span class="username">
                                              <a>Logo dan Icon</a>
                                            </span>
                                        <span class="description">Anda bisa mengganti logo dan icon sesuai keinginan</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <div class="row margin-bottom">
                                        <div class="col-sm-6">
                                          <img class="img-responsive"  width="100" src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->logo) ?>" alt="Photo">
                                           <ul class="list-inline">
                                        <li><a href="" class="link-black text-sm"  data-toggle="modal" data-target="#logo"><i class="fa fa-camera-retro margin-r-5"></i> Update Logo</a></li>  
                                        
                                     
                                      </ul>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                          <img class="img-responsive"  width="100" src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->icon) ?>" alt="Photo">    
                                           <ul class="list-inline">
                                        
                                       <li><a href="" class="link-black text-sm"  data-toggle="modal" data-target="#icon"><i class="fa fa-camera-retro margin-r-5"></i> Update Icon</a></li>
                                     
                                      </ul>  
                                        </div>
                                        <!-- /.col -->
                                      </div>
                                      <!-- /.row -->

                                    

                                      <hr>
                                       <strong><i class="fa fa-file-word-o margin-r-5"></i> Keywords Instansi(CEO Google)</strong>  
                                      <input class="form-control input-sm" type="text" placeholder="Masukkan Keywords SEO" name="keywords" value="<?php echo $konfigurasi->keywords ?>" required>
                                      <br>
                                       <strong><i class="fa fa-text-width margin-r-5 "></i> Metateks</strong>  
                                      <input class="form-control input-sm" type="text" placeholder="Masukkan Metatext" name="metateks" value="<?php echo $konfigurasi->metateks ?>" required>
                                      <br>
                                       <strong><i class="fa fa-tag margin-r-5"></i> Tagline</strong>  
                                      <input class="form-control input-sm" type="text" placeholder="Masukkan Tagline" name="tagline" value="<?php echo $konfigurasi->tagline ?>" required>
                                      <br>
                                       <strong><i class="fa fa-credit-card margin-r-5"></i> Rekening 1</strong>  
                                      <input class="form-control input-sm" type="text" placeholder="Masukkan Rekening dengan bank dan atas nama" name="rekening_1" value="<?php echo $konfigurasi->rekening_1 ?>" required>
                                      <br>
                                       <strong><i class="fa fa-credit-card margin-r-5"></i> Rekening 2</strong>  
                                      <input class="form-control input-sm" type="text" placeholder="Masukkan Rekening dengan bank dan atas nama" name="rekening_2" value="<?php echo $konfigurasi->rekening_2 ?>" required>
                                      <br>
                                      <strong><i class="fa fa-credit-card margin-r-5"></i> Rekening 3</strong>  
                                      <input class="form-control input-sm" type="text" placeholder="Masukkan Rekening dengan bank dan atas nama" name="rekening_3" value="<?php echo $konfigurasi->rekening_3 ?>" required>
                                      <br>
                                    </div>
                                    <!-- /.post -->
                                  </div>
                                 
                                </div>
                                <!-- /.tab-content -->


                         <?php echo form_close(); ?> 



                        <?php 
                        echo form_open_multipart(base_url('back/konfigurasi/logo'),'');
                        ?>
                        <div class="modal fade" id="logo" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form enctype="multipart/form-data" >
                                  <div class="form-group">     
                                 <div class="form-group">
                                  <label class="col-md-3 control-label">Nama Website</label>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Website" value="<?php echo $konfigurasi->nama ?>" required>
                                  </div>
                                </div>
                                 <br><br>

                                <div class="form-group">
                                  <label class="col-md-3 control-label">Upload Logo Baru</label>
                                  <div class="col-md-8">
                                    <input type="file" class="form-control" name="logo" placeholder="Upload Logo Baru" value="<?php echo $konfigurasi->logo ?>" required>
                                    <br>
                                    Logo Lama : <br>
                                    <img src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" width="150">
                                  </div>
                                </div>
                                 </div>  
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrows-alt"></i> Tutup</button>
                              </div>
                              </form>
                            </div>  
                            
                          </div>
                        </div>
                        <?php echo form_close(); ?>  



                <?php 
                echo form_open_multipart(base_url('back/konfigurasi/icon'),'');
                ?>
                <div class="modal fade" id="icon" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" >
                          <div class="form-group">     
                         <div class="form-group">
                          <label class="col-md-3 control-label">Nama Website</label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Website" value="<?php echo $konfigurasi->nama ?>" required>
                          </div>
                        </div>
                         <br><br>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Upload Icon Baru</label>
                          <div class="col-md-8">
                            <input type="file" class="form-control" name="icon" placeholder="Upload Icon Baru" value="<?php echo $konfigurasi->icon ?>" required>
                            <br>
                            Icon Lama : <br>
                            <img src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->icon) ?>" class="img img-responsive img-thumbnail" width="150">
                          </div>
                        </div>
                         </div>  
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrows-alt"></i> Tutup</button>
                      </div>
                      </form>
                    </div>  
                    
                  </div>
                </div>
                <?php echo form_close(); ?>   
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->

                


                   
            </div>
        </div>
    </div>
</div>
