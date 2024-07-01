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
                    echo form_open_multipart(base_url('back/kategori_berita/edit/'.$kategori_berita->id_kategori_berita),' class="form-horizontal"');
                    ?>    
                        <form class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_kategori_berita" minlength="3" placeholder="Masukkan Nama Kategori" value="<?php echo $kategori_berita->nama_kategori_berita ?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="urutan" minlength="11" placeholder="Masukkan Urutan" value="<?php echo $kategori_berita->urutan ?>" required>
                              </div>
                            </div>

                              <hr>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/kategori_berita') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
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