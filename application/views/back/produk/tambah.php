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
                                echo form_open_multipart(base_url('back/produk/tambah'),' class="form-horizontal"');
                                ?>    
                           <form class="form-horizontal">
                                       
                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Kode</label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="kode" minlength="3" placeholder="Masukkan Kode Produk" value="<?php echo set_value('kode') ?>"  required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Nama</label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="nama" minlength="5" placeholder="Masukkan Nama Produk" value="<?php echo set_value('nama') ?>"  required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Kategori</label> 
                              <div class="col-sm-12">
                                 <select name="id_kategori_produk" class="form-control">
                                    <option value="0">--Pilih--</option>
                                     <?php $no=1; foreach($kategori_produk as $ktg) { ?>
                                    <option value="<?php echo $ktg->id_kategori_produk?>">
                                      <?php echo $ktg->nama_kategori_produk ?> 
                                    </option>
                                  <?php } ?>  
                                  </select>
                              </div>
                            </div>

                                                                 
                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Keywords</label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" minlength="5" name="keywords" placeholder="Masukkan Keywords Produk" value="<?php echo set_value('keywords') ?>"  required>
                              </div>
                            </div>

                             <div class="form-group">
                              <label   class="col-sm-4 control-label">Harga Beli</label> 
                              <div class="col-sm-12">
                                <input type="number"  id="angka1" class="a2 form-control" minlength="2" onkeyup="hitung2();" required="" size="40" onkeyup="return isNumberKey(event)"   name="harga_beli" placeholder="Masukkan Harga Beli" value="<?php echo set_value('harga_beli') ?>" >
                              </div>
                            </div>
                            
                             <div class="form-group">
                              <label   class="col-sm-4 control-label">Harga Jual</label> 
                              <div class="col-sm-12">
                                <input type="number"  id="angka2" class="b2 form-control " minlength="2" onkeyup="hitung2();" required="" size="40" onkeyup="return isNumberKey(event)"   name="harga_jual" placeholder="Masukkan Harga Jual" value="<?php echo set_value('harga_jual') ?>"  required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Laba</label> 
                              <div class="col-sm-12">
                                <input type="number"  id="hasil" class="c2 form-control" readonly size="40"  name="laba" placeholder="Laba" value="<?php echo set_value('laba') ?>" >
                           
                              </div>
                            </div>

                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Harga Coret <i>(Kosongkan Jika Tidak Perlu)</i></label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="harga_coret" placeholder="Masukkan Harga Coret (Kosongkan Jika Tidak Perlu)" value="<?php echo set_value('harga_coret') ?>">
                              </div>
                            </div>

                             <div class="form-group">
                              <label   class="col-sm-4 control-label">Stok</label> 
                              <div class="col-sm-12">
                                <input type="number" class="form-control" name="stok" placeholder="Masukkan Stok" value="<?php echo set_value('stok') ?>" required>
                              </div>
                            </div>
                        

                             <div class="form-group">
                              <label   class="col-sm-4 control-label">Ukuran</label> 
                              <div class="col-sm-12">
                                <input type="text" class="form-control" name="ukuran" placeholder="Masukkan Ukuran" value="<?php echo set_value('ukuran') ?>"  required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label   class="col-sm-4 control-label">Berat</label> 
                              <div class="col-sm-12">
                                <input type="number" class="form-control" name="berat" placeholder="Masukkan Berat" value="<?php echo set_value('berat') ?>"  required>
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
                                <label   class="col-sm-4 control-label">Status</label> 
                                <div class="col-sm-12">
                                  <select name="status" class="form-control">
                                     <option value="">--Pilih--</option>
                                     <option value="Publish">Publikasikan</option>
                                     <option value="Draft">Simpan sebagai Draft</option>
                                   </select>
                                 </div>
                              </div>


                               <div class="form-group">
                                <label   class="col-sm-4 control-label">Rekomendasi</label> 
                                <div class="col-sm-12">
                                  <select name="rekomendasi" class="form-control" >
                                     <option value="">--Pilih--</option>
                                     <option value="Rekomendasi">Rekomendasi</option>
                                     <option value="Belum">Belum</option>
                                   </select>
                                 </div>
                              </div>

                               <div class="form-group">
                                <label   class="col-sm-4 control-label">Promo</label> 
                                <div class="col-sm-12">
                                  <select name="promo" class="form-control">
                                     <option value="">--Pilih--</option>
                                     <option value="Promo">Promo</option>
                                     <option value="Belum">Belum</option>
                                   </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                <label   class="col-sm-4 control-label">Urutan</label> 
                                <div class="col-sm-12">
                                  <input type="number" class="form-control" name="urutan" placeholder="Masukkan Urutan" value="<?php echo set_value('urutan') ?>"  required>
                                </div>
                              </div>

                            <div class="form-group">
                                <label   class="col-sm-6 control-label">Deskripsi</label> 
                                <div class="col-sm-12">
                                 <textarea name="deskripsi" id="editor1" class="form-control" placeholder="Masukkan Deskripsi" ><?php echo set_value('deskripsi') ?></textarea>
                                 </div>
                              </div>
                                             
                             <div class="form-group">
                                  <label   class="col-sm-6 control-label">Gambar</label> 
                                  <div class="col-sm-12">
                                   <input type="file" name="gambar" class="form-control" required >
                                  </div>
                                </div>

                              <hr>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" name="submit"><i class="fa fa-save"></i> Simpan</button>
                                &nbsp; &nbsp;&nbsp;
                                <a href="<?php echo base_url('back/produk') ?>" class="btn btn-danger" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
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