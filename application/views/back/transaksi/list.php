 




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

                                     <table id="mytable"   >
                                      <thead>
                                      <tr>
                                         <th>NO</th>
                                          <th>PELANGGAN</th>
                                          <th>KODE</th>
                                          <th>TANGGAL TRANSAKSI</th>
                                          <th>JUMLAH TOTAL</th>
                                          <th>STATUS BAYAR</th>
                                          <th>KONFIRMASI ADMIN</th>
                                          <th width="10%">ACTION</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                         <?php $i=1; foreach($header_transaksi as $ht) { ?>          
                                        <tr>
                                          <td><?php echo $i++ ?></td>
                                          <td> <?php echo  $ht->nama ?> 
                                          <br><small>
                                            Telepon: <?php echo $ht->no_telp ?>
                                            <br> Email: <?php echo $ht->email ?>
                                             <br>Alamat  <br><?php echo nl2br($ht->alamat) ?>
                                          </small>
                                          </td>
                                          <td><?php echo $ht->kode_transaksi ?></td>
                                          <td><?php echo date('d-m-y',strtotime($ht->tanggal_transaksi)) ?></td>
                                          <td><?php echo number_format($ht->jumlah_transaksi) ?></td> 
                                           
                                          <td><?php echo $ht->status_bayar ?></td>
                                          <td><?php echo $ht->konfirmasi ?></td>
                                          <td>
                                          <div class="btn-group">
                                              
                                              
                                            <a href="<?php echo base_url('back/transaksi/detail/'.$ht->kode_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="<?php echo base_url('back/transaksi/cetak/'.$ht->kode_transaksi) ?>" target="_blank"  class="btn btn-primary btn-sm"><i class="fa fa-print"  ></i> Cetak</a>
                                              <a href="<?php echo base_url('back/transaksi/update/'.$ht->kode_transaksi) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check"></i> Konfirmasi</a>
                                            </div>
                                          </td>

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
     


