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
                                echo form_open_multipart(base_url('back/berita/edit/'.$berita->id_berita),' class="form-horizontal"');
                                ?>    
                           <form class="form-horizontal">
                                                       
                       <div class="form-group">
                              <label   class="col-sm-4 control-label">Kategori</label> 
                              <div class="col-sm-12">
                                <select name="id_kategori_berita" class="form-control" >
                                  <?php foreach ($kategori_berita as $kategori_berita) {?>
                                  <option value="<?php echo $kategori_berita->id_kategori_berita?>" <?php if($berita->id_kategori_berita==$kategori_berita->id_kategori_berita){echo "selected";} ?>><?php echo $kategori_berita->nama_kategori_berita?></option>
                                  <?php }; ?>
                                </select>
                              </div>
                            </div>


                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Judul</label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="judul" minlength="5" placeholder="Masukkan Judul Berita" value="<?php echo $berita->judul ?>" required>
                              </div>
                            </div>


                             <div class="form-group">
                                <label   class="col-sm-4 control-label">Deskripsi</label> 
                                <div class="col-sm-12" style="border: 5px;" > 
                                 <textarea name="deskripsi" id="editor1" placeholder="Masukkan Deskripsi" ><?php echo $berita->deskripsi ?></textarea>
                                 </div>
                              </div>

                        
                                                                 
                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Keywords</label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" minlength="5" name="keywords" placeholder="Masukkan Keywords Berita" value="<?php echo $berita->keywords ?>"  required>
                              </div>
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
                            
                            <div class="form-group">
                                <label   class="col-sm-6 control-label">Status</label> 
                                <div class="col-sm-10">
                                   <select name="status" class="form-control">
                                     <option value="Publish">Publikasikan</option>
                                     <option value="Draft" <?php if($berita->status=="Draft"){ echo "selected" ; } ?>>Simpan sebagai Draft</option>
                                   </select>
                                </div>
                              </div>

                                <div class="form-group">
                                    <label   class="col-sm-6 control-label">Rekomendasi</label> 
                                    <div class="col-sm-10">
                                       <select name="rekomendasi" class="form-control">
                                         <option value="Ya">Ya</option>
                                         <option value="Tidak" <?php if($berita->rekomendasi=="Tidak"){ echo "selected" ; } ?>>Tidak</option>
                                       </select>
                                    </div>
                                  </div>

                                   <div class="form-group">
                                    <label   class="col-sm-6 control-label">Favorit</label> 
                                    <div class="col-sm-10">
                                       <select name="favorit" class="form-control">
                                         <option value="Ya">Ya</option>
                                         <option value="Tidak" <?php if($berita->favorit=="Tidak"){ echo "selected" ; } ?>>Tidak</option>
                                       </select>
                                    </div>
                                  </div>

                              <div class="form-group">
                                <label   class="col-sm-4 control-label">Urutan</label> 
                                <div class="col-sm-12">
                                  <input type="number" class="form-control" name="urutan" placeholder="Masukkan Urutan" value="<?php echo $berita->urutan ?>"   required>
                                </div>
                              </div>

                            <div class="form-group">
                                  <label   class="col-sm-6 control-label">Gambar</label> 
                                  <div class="col-sm-12">
                                   <input type="file" name="gambar" class="form-control"  >
                                  </div>
                                </div>

                              <hr>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/berita') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
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