 

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
                      echo form_open_multipart(base_url('back/produk/gambar/'.$produk->id_produk),' class="form-horizontal"');
                      ?>

                          <div class="form-group form-group-sm">
                            <label class="col-md-2 control-label">Judul Gambar</label>
                            <div class="col-md-8">
                              <input type="text" class="form-control" name="judul_gambar" placeholder="Judul Gambar Produk" value="<?php echo set_value('judul_gambar') ?>" required>
                            </div>
                          </div>

                          <div class="form-group form-group-sm">
                            <label class="col-md-2 control-label">Unggah Gambar</label>
                            <div class="col-md-3">
                              <input type="file" class="form-control" name="gambar" placeholder="Gambar Produk" value="<?php echo set_value('gambar') ?>" required>
                            </div>
                            <br>
                            <div class="col-md-5">
                               <button type="submit" class="btn btn-success btn-sm" name="submit"><i class="fa fa-save"></i> Simpan dan Unggah Gambar</button>
                               <a href="<?php echo base_url('back/produk') ?>" class="btn btn-danger btn-sm" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
                            </div>
                          </div>
                          <hr>

                        <?php echo form_close(); ?>

                         <?php 
                           if($this->session->flashdata('pesan')){
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                           }
                           ?>

                             <table class="table table-bordered" id="mytable">
                                <thead>
                                  <tr>
                                      <th>NO</th>
                                      <th>GAMBAR</th>
                                      <th>JUDUL</th>
                                      <th>ACTION</th>
                                  </tr>
                                </thead>
                              <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="<?php echo base_url('upload/produk/thumbs/'.$produk->gambar) ?>" class="img img-responsive img-thumbnail" width="60"></td>
                                    <td><?php echo $produk->nama ?></td>
                                   <td></td>
                                </tr>
                                <?php 
                                $no=2;
                                foreach($gambar as $u) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><img src="<?php echo base_url('upload/produk/thumbs/'.$u->gambar) ?>" class="img img-responsive img-thumbnail" width="60"> </td>
                                    <td><?php echo $u->judul_gambar  ?></td> 
                                    <td>                        
                                      <a href="<?php echo base_url('back/produk/delete_gambar/'.$produk->id_produk.'/'.$u->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini ?')"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                              <?php } ?>
                              </tbody>
                             </table>


               
   
                        </div>
                    </div>
                </div>
                <!-- Textual inputs end -->

 


                   
            </div>
        </div>
    </div>
</div>
