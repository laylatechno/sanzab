            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?php echo $title; ?></h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url('back/dashboard') ?>">Dashboard</a></li>
                                <li><span><?php echo $title; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                             
                        </div>
                    </div>
                </div>
            </div>
          
             <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="data-tables">
                               
                                    <br>

                                     <?php  
                                     if($this->session->flashdata('pesan')){
                                      echo '<div class="alert alert-success">';
                                      echo $this->session->flashdata('pesan');
                                      echo '</div>';
                                     }
                                     ?>
                                     <br>
                             
                                      <p class="pull-right">
                                          <div class="btn-group pull-right">
                                            <a href=" <?php echo base_url('back/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" title="Cetak" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</a>

                                            <a href=" <?php echo base_url('back/transaksi') ?>" title="Kembali" class="btn btn-primary btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                                          </div>
                                        </p>
                                         <br><br><br>
                                        <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                  <th width="20%">Nama Pelanggan</th>
                                                  <th>: <?php echo $header_transaksi->nama ?> </th>
                                                </tr>
                                                <tr>
                                                  <th width="20%">KODE TRANSAKSI</th>
                                                  <th>: <?php echo $header_transaksi->kode_transaksi ?> </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>Tanggal</td>
                                                  <td>: <?php echo date($header_transaksi->tanggal_transaksi) ?> </td>
                                                </tr>
                                                <tr>
                                                  <td>Jumlah Transaksi</td>
                                                 <td>: Rp.  <?php echo number_format($header_transaksi->jumlah_transaksi,'0',',','.') ?> </td>
                                                </tr>
                                                <tr>
                                                  <td>Status Bayar</td>
                                                  <td>: <?php echo $header_transaksi->status_bayar ?> </td>
                                                </tr>
                                                <tr>
                                                  <td>Bukti Bayar</td>
                                                  <td>: <?php if($header_transaksi->bukti_bayar=="") { echo 'Belum Ada'; }else{ ?>
                                                  <a href="<?php echo base_url('upload/konfirmasi/'.$header_transaksi->bukti_bayar) ?>"><img src="<?php echo base_url('upload/konfirmasi/'.$header_transaksi->bukti_bayar) ?>" alt="" class="img img-thumbnail" width="200"></a>  
                                                <?php } ?>
                                                </td>
                                                <tr>
                                                  <td>Tanggal Bayar</td>
                                                  <td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_bayar ))?> </td>
                                                </tr>
                                                <tr>
                                                  <td>Jumlah Bayar</td>
                                                  <td>: Rp.  <?php echo number_format($header_transaksi->jumlah_bayar,'0',',','.') ?> </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>Pembayaran dari :</td>
                                                  <td>: <?php echo $header_transaksi->nama_bank_pelanggan ?> No  Rekening <?php echo $header_transaksi->rekening_pelanggan ?> a.n <?php echo $header_transaksi->atas_nama ?> </td>
                                                </tr>
                                                <tr>
                                                  <td>Ke Rekening</td>
                                                  <td>:  No  Rekening <?php echo $header_transaksi->rekening_pembayaran ?></td>
                                                </tr>
                                                <tr>
                                                  <td>Catatan</td>
                                                  <td>: <?php echo $header_transaksi->catatan ?></td>
                                                </tr>
                                                 
                                                 
                                                 
                                              </tbody>
                                            </table>
                                            <hr>

                                          <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>KODE</th>
                                                <th>NAMA PRODUK</th>
                                                <th>JUMLAH</th>
                                                <th>HARGA</th>
                                                <th>SUB TOTAL</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                               <?php $i=1; foreach($transaksi as $t) { ?>           
                                                <tr>
                                                  <td><?php echo $i++ ?></td>
                                                  <td><?php echo $t->kode ?></td>
                                                  <td><?php echo $t->nama ?></td>
                                                  <td><?php echo number_format($t->jumlah) ?></td>
                                                  <td><?php echo number_format($t->harga) ?></td>
                                                  <td><?php echo number_format($t->total_harga) ?></td>
                                             

                                                </tr>
                                              <?php } ?>
                                            </tbody>
                                          </table>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                   
                </div>
            </div>
        </div>
     




