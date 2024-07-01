
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Laporan Pesan Langganan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/laporan/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/laporan/css/main.css">
	<style type="text/css" media="screen">
		body{
	/* background-color: lightblue; */
	font-family: Berlin Sans FB;
		}
		
	</style>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table10">
					<img src="<?php echo base_url('upload/konfigurasi/'.$konfigurasi->icon) ?>" alt="" width="150">
					<br>
					<h3 class="text-center">Laporan Pesan Langganan</h3>
					<br>
					      <?php 
            if(isset($error)){
              echo '<p class="alert alert-warning">';
              echo $error;
              echo '</p>';
            }

            echo validation_errors('<div class="alert alert-success">','</div>');
            echo form_open_multipart(base_url('back/langganan/cetak_detail/'.$langganan->id_langganan),' class="form-horizontal"');
            ?>

					<table>
						<thead>
							<tr class="table100-head">
								<th class="">Email</th>
								<th class="">Tanggal Kirim</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class=""><?php echo $langganan->email ?></td>
									<td class=""><?php echo $langganan->tanggal_kirim ?></td>
								</tr>
				
								
						</tbody>
					</table>
					 <?php echo form_close(); ?>   
					<br>
					<h6><b><?php echo date ("D"); ?>, <?php echo date('d-m-y'); ?></b></h6>
					<br>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="<?php echo base_url()?>assets/laporan/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/laporan/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>assets/laporan/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/laporan/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/laporan/js/main.js"></script>

</body>
</html>