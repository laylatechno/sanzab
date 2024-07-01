<!-- Cart -->

  <div class="cart_section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cart_container">
            <div class="cart_title"></div>
            <div class="cart_items">
              <ul class="cart_list">
                <li class="cart_item clearfix">
                  <br><br><br>
              
                    <div class="table-responsive">
                          <?php if($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';

                            } ?>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                     <th>Gambar</th>
                                     <th>Nama</th>
                                     <th>Harga</th>
                                     <th width="10%">Quantiti</th>
                                     <th>Total</th>
                                     <th>Update</th>
                                     <th>Hapus</th>             
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach($keranjang as $k) {
                                    $id_produk = $k['id'];
                                    $produk = $this->Produk_model->detail($id_produk);
                                    echo form_open(base_url('belanja/update_cart/'.$k['rowid']));
                                 ?>
                                <tr>
                                   <td><a href=""><img src="<?php echo base_url('upload/produk/thumbs/'.$produk->gambar) ?>" alt="<?php echo $k['name']  ?>"  class="img img-responsive img-thumbnail" width="100"></a></td>
                                     <td><a href=""><?php echo $k['name'] ?></a></td>
                                     <td><span class="amount">Rp. <?php echo number_format($k['price'],'0',',','.') ?></span></td>

                                     <td><input class="text-center" type="number" name="qty" value="<?php echo $k['qty'] ?>" style="width:70%;" ></td>

                                     <td>Rp. <?php 
                                    $sub_total = $k['price'] * $k['qty'];
                                    echo number_format($sub_total,'0',',','.') ?></td>
                                    <td class=""><button type="submit" value="submit" class="btn btn-sm"><i class="fa fa-check"></i></button></td>
                                     <td class=""><a href="<?php echo base_url('belanja/hapus1/'.$k['rowid']) ?>"><button type="submit" value="submit" class="btn btn-sm"><i class="fa fa-retweet"></i></a></td>
                                    
                                </tr>
                                 <?php  echo form_close();  }    ?>
                            </tbody>
                        </table>
                    </div>
  




                </li>
              </ul>
            </div>
            
            <!-- Order Total -->
            <div class="order_total">
              <div class="order_total_content text-md-right">
                <div class="float-right"><b>Order Total:</b></div><br>
                <div class="d-flex gr-total float-right"><h5>Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></h5></div>
              </div>
            </div>

            <div class="cart_buttons">
              <a href="<?php echo base_url('belanja/hapus') ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-retweet"></i> Hapus Keranjang</button></a>
              <a href="<?php echo base_url('home') ?>"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-chevron-circle-right"></i> Lanjut Belanja</button></a>
              <a href="<?php echo base_url('belanja/checkout') ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Checkout</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

   
<br>
   
<br>

 
<div class="cart_section" style="padding-top: 0px;">
  <div class="container">

    <div class="row">

      <div class="col-lg-10 offset-lg-1">
         <?php echo form_open(base_url('belanja/checkout'));
        $kode_transaksi=date('dmY').strtoupper(random_string('alnum',8))
         ?>

        <input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
        <input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
        <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
        <div class="cart_title">Data Pengiriman</div>
        <table class="table">
                 
                <thead>
                    <tr>
                        <th width="25%">Kode Transaksi</th>
                        <th> <input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required> </th>
                    </tr>
                    <tr>
                        <th width="25%">Nama Penerima</th>
                        <th> <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?php echo $pelanggan->nama ?>"required> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="<?php echo $pelanggan->email ?>"required> </td>
                    </tr>
                     
                    <tr>
                        <td>Telepon</td>
                        <td><input type="text" name="no_telp" class="form-control" placeholder="Masukkan Telepon" value="<?php echo $pelanggan->no_telp ?>"required> </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap"><?php echo $pelanggan->alamat ?></textarea> </td>
                    </tr>
                     
                     <tr>
                        <td>Catatan Belanja</td>
                        <td><textarea name="catatan" class="form-control" placeholder="Masukkan Catatan Belanja" value="<?php echo set_value('catatan') ?>" ></textarea> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Checkout sekarang</button>
                            <a href="<?php echo base_url('home') ?>" class="btn btn-danger btn-sm" name="reset"><i class="fa fa-retweet"></i> Kembali</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php echo form_close(); ?>


      </div>
    </div>
  </div>
</div>



 

<div class="container p-5">

  <div class="input-group">
   <div class="input-group-append">
      <span class="input-group-text">Berat</span>
    </div>
    <input type="number" value="1" min="1" class="form-control" id="berat" name="berat"> 
    <div class="input-group-append">
      <span class="input-group-text">Kg</span>
    </div>
  </div>

<div class="form-group">  
  
</div>

<p>Lokasi Asal :</p>
<div class="form-group">  
  <select class="form-control" id="sel1">
    <option value=""> Pilih Provinsi</option>            
  </select>
</div>

<div class="form-group">  
  <select class="form-control" id="sel2" disabled>
    <option value=""> Pilih Kota</option>            
  </select>
</div>

<p>Lokasi Tujuan :</p>


<div class="form-group">  
  <select class="form-control" id="sel11">
    <option value=""> Pilih Provinsi</option>            
  </select>
</div>

<div class="form-group">  
  <select class="form-control" id="sel22" disabled>
    <option value=""> Pilih Kota</option>            
  </select>
</div>

<div class="form-group">  
  <select class="form-control" id="kurir" disabled>
    <option value=""> Pilih Kurir</option>
    <option value="jne">JNE</option>
    <option value="tiki">TIKI</option>
    <option value="pos">POS Indonesia</option>
  </select>
</div>

 

<div id="hasil"></div>
 
 
<script type="text/javascript">
  
function getLokasi() {
  var $op = $("#sel1"), $op1 = $("#sel11");
  
  $.getJSON("provinsi", function(data){  
    $.each(data, function(i,field){  
    
       $op.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 
       $op1.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 

    });
    
  });
 
}

getLokasi();

$("#sel11").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#sel22 option:gt(0)').remove();
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#sel22").prop("disabled", true);
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#sel22").prop("disabled", false);
    getKota1(option);
  }
});


$("#sel1").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#sel2 option:gt(0)').remove();
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#sel2").prop("disabled", true);
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#sel2").prop("disabled", false);
    getKota(option);
  }
});




$("#sel22").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#kurir").prop("disabled", false);    
  }
});


$("#kurir").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  var origin = $("#sel2").val();
  var des = $("#sel22").val();
  var qty = $("#berat").val();

  if(qty==='0' || qty==='')
  {
    alert('null');
  }
  else if(option==='')
  {
    alert('null');        
  }
  else
  {                
    getOrigin(origin,des,qty,option);
  }
});


function getOrigin(origin,des,qty,cour) {
  var $op = $("#hasil"); 
  var i, j, x = "";
  
  $.getJSON("tarif/"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
    $.each(data, function(i,field){  

      for(i in field.costs)
      {
          x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : "+field.costs[i].description+"</p>";

           for (j in field.costs[i].cost) {
                x += field.costs[i].cost[j].value +"<br>"+field.costs[i].cost[j].etd+"<br>"+field.costs[i].cost[j].note;
            }
         
      }

      $op.html(x);

    });
  });
 
}


function getKota1(idpro) {
  var $op = $("#sel22"); 
  
  $.getJSON("kota/"+idpro, function(data){      
    $.each(data, function(i,field){  
    

       $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 

    });
    
  });
 
}

  

function getKota(idpro) {
  var $op = $("#sel2"); 
  
  $.getJSON("kota/"+idpro, function(data){      
    $.each(data, function(i,field){  
    

       $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 

    });
    
  });
 
}


</script>