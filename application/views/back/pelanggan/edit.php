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
                        echo form_open_multipart(base_url('back/pelanggan/edit/'.$pelanggan->id_pelanggan),' class="form-horizontal"');
                        ?>
                        <form class="form-horizontal">
                            <div class="form-group">
                              <label   class="col-sm-2 control-label">Nama</label> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama"  value="<?php echo $pelanggan->nama ?>" required>
                              </div>
                            </div>

                             <div class="form-group">
                              <label   class="col-sm-2 control-label">Email</label> 
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="<?php echo $pelanggan->email ?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label   class="col-sm-2 control-label">Password</label> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" placeholder="Jika tidak mau ganti password jangan diisi, tapi kalau mau maka isikan minimal 1 karakter ">(<b><?php echo $pelanggan->password2 ?></b>)
                              </div>
                            </div>

                          <div class="form-group">
                              <label   class="col-sm-2 control-label">No Telp</label> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telp" value="<?php echo $pelanggan->no_telp ?>" required>
                              </div>
                            </div>

                             <div class="form-group">
                              <label   class="col-sm-2 control-label">Alamat</label> 
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $pelanggan->alamat ?>" required>
                              </div>
                            </div>

                             <div class="form-group">
                              <label   class="col-sm-2 control-label">Status</label> 
                              <div class="col-sm-10">
                                 <select name="status" class="form-control">
                                   <option value="Konfirmasi">Konfirmasi</option>
                                   <option value="Belum Dikonfirmasi" <?php if($pelanggan->status=="Belum Dikonfirmasi"){ echo "selected" ; } ?>>Belum Dikonfirmasi</option>
                                 </select>
                              </div>
                            </div>

                             <div class="form-group">
                              <label   class="col-sm-2 control-label">Aktif</label> 
                              <div class="col-sm-10">
                                 <select name="aktif" class="form-control">
                                   <option value="1">Aktif</option>
                                   <option value="0" <?php if($pelanggan->aktif=="0"){ echo "selected" ; } ?>>Nonaktif</option>
                                 </select>
                              </div>
                            </div>

                              <hr>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/pelanggan') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
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