<!DOCTYPE html>
<html lang="id" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->	
	<link href='<?php echo base_url(); ?>assets/images/favicon.png' rel='shortcut icon' type='image/x-icon'/>
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Home E-Pasien RSUD KRATON</title>		
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/linearicons.css">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/css/main.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/datepicker3.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datetimepicker.min.css" >
	<!-- DATA TABLES -->
	<link href="<?php echo base_url(); ?>assets/lib/datatables/dataTables.bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="main-wrapper-first">
			<header>
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="">
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="<?php echo base_url();?>">Home</a>
									<a href="<?php echo base_url('registered');?>">History</a>
									<a href='<?php echo base_url('auth/logout');?>'>Logout</a>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			
		</div>
		<div class="main-wrapper">			
			<div class="white-bg">
					<div class="section-top-border">							
						<div class="row">
							<div class="col-md-6">
								<table clas='table'>
									<tr>
										<td width="120px">No. RM</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('no_rm'); ?></td>                        
									</tr>
									<tr>                        
										<td>Nama Pasien</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('nama_pasien'); ?></td>
									</tr>
									<tr>
										<td style='vertical-align:top'>Alamat</td>
										<td style='vertical-align:top'>:</td>
										<td><?php echo $this->session->userdata('alamat'); ?></td>
									</tr>
								</table>
							</div>
							<div class="col-md-6">
								<table clas='table'>
									<tr>
										<td width="120px">Jenis Kelamin</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('jenis_kel');?></td>                    
									</tr>
									<tr>
										<td>Tempat Lahir</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('tempat_lahir');?></td>
									</tr>
									<tr>
										<td style='vertical-align:top'>Tanggal Lahir</td>
										<td style='vertical-align:top'>:</td>
										<td style='vertical-align:top'><?php echo $this->session->userdata('tgl_lahir');?></td>
									</tr>                    
								</table>
							</div>
							
						</div>
					</div>
					<div class="section-top-border">							
						<div class="row">
							<div class="col-md-6">
								<h3 class="mb-30">Registrasi</h3>
								<?php echo form_open('simpan','class="form"');?>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<input type="text" name="no_telp" id="no_telp" value="<?php echo $this->session->userdata('no_telp'); ?>"class="input-register" placeholder="No. Handphone" required oninvalid="setCustomValidity('No Telpone Harus di Isi !')" oninput="setCustomValidity('')">										
										<?php echo form_error('no_telp'); ?>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
										<input type="text" name="tgl_periksa" class="input-register" id="tgl_periksa" readonly placeholder="Tanggal Periksa" value="<?= tgl_balik($tanggal);?>">
										<?php echo form_error('tgl_periksa'); ?>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
										<div class="form-select">
											<select name="poliklinik" class="input-register" id="poliklinik" onchange='getHarga()' required oninvalid="setCustomValidity('Poli Harus di Isi !')" oninput="setCustomValidity('')">
												<option value="">- Poliklinik -</option>
												<?php
													foreach($poliklinik as $q){
														echo' <option value='.$q->kd_sub_unit.'>'.$q->nama_sub_unit.'</option>';
													}
												?>
											</select>
											
										</div>
									</div>
									<?php echo form_error('poliklinik'); ?>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-dollar" aria-hidden="true"></i></div>
										<input id="tarif" type="text" class="input-register" name="tarif_poli" value="" readonly placeholder="Tarif Poliklinik" >
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></div>
										<select name="dokter" class="input-register" id="dokter" >
											<option value="">- Dokter Klinik -</option>
										</select>  
									</div>
									<?php echo form_error('dokter'); ?>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-copy" aria-hidden="true"></i></div>
										<div class="form-select">
											<select name="cara_bayar" class="input-register" id="cara_bayar" onchange='getPenjaminLain()' required oninvalid="setCustomValidity('Jenis Pasien Harus di Isi !')" oninput="setCustomValidity('')">
												<option value="">- Jenis Pasien -</option>                            
												<?php                             
													foreach($cara_bayar->hasil as $q){
														echo '<option value="'.$q->kd_cara_bayar.'">'.$q->keterangan.'</option>';
													}             
												?>    
											</select>
										</div>
									</div>
									<?php echo form_error('cara_bayar'); ?>
									<div class="input-group-icon mt-10" id="penjaminlain" >
										
                    				</div> 
									<div class="mt-10 text-right">
										<input type="hidden" name="no_rm" value="<?php echo $this->session->userdata('no_rm');?>">
										<button type="submit" name="submit" class="genric-btn success circle" >DAFTAR</button>
									</div>
								</form>
							</div>
							<div class="col-md-6">
								<h3 class="mb-30">Jadwal Dokter, <?= nama_hari($tanggal).' '.tgl_lengkap($tanggal);?></h3>
								<div class="form-row">
									<div class="col-5">
										<input type="text" name="tgl_jadwal" id="tgl_jadwal" class="form-control" placeholder="Tanggal Jadwal dokter" value="<?= tgl_balik($tanggal);?>" >
									</div>									
									<div class="col-5">
										<input type="search" class="form-control" placeholder="Pencarian poli / dokter" id="searchInput">
									</div>
								</div>  
								<table class="table table-responsive" id="mytable" >
									<thead>
										<tr>
											<th style="width:200px">Nama Poli</th>
											<th style="width:300px">Nama Dokter</th>
										</tr>
									</thead>
									<tdbody>
									</tdbody>									
								</table>								
							</div>
						</div>
					</div>					
			</div>
			
		</div>
	</div>
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script> 		
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>	
<script src="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/datepicker/locales/bootstrap-datepicker.id.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/lib/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/datatables/dataTables.bootstrap.js"></script>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
		jadwalDokter();
    });	
   
	$('#tgl_jadwal').datepicker({autoclose: true })
		.on('changeDate', function(e){
		jadwalDokter();
	});
	
	function jadwalDokter(){
		var tgl = $("#tgl_jadwal").val();
        $.fn.dataTable.ext.errMode = 'throw';
        $('#mytable').dataTable({							
			"bLengthChange": false,	
			"sDom": "<t><'row'<p i>>",		
			"ordering": false,
			"info":     false,
            "Processing": true,
            "ServerSide": true,
            "iDisplayLength":5,
            "bDestroy": true,
			"oLanguage": {
				"sLengthMenu": "_MENU_ ",
				"sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries",
				"sZeroRecords": "Tidak ada jadwal dokter",
                "sEmptyTable": "No data available in table"               
			},			     
            "ajax": {
				"url": "<?php echo base_url('home/view_jadwal'); ?>",				
				"type": "GET",
                "data": {
                    'tgl': tgl
                }
			},
            "columns": [                               
                {"mData": "nama_sub_unit"},
                {"mData": "nama_pegawai"},
            ]
		});
		oTable = $('#mytable').DataTable();  
			$('#searchInput').keyup(function(){
				oTable.search($(this).val()).draw() ;
		});    
	}

    function getHarga(){
        var poli = $("#poliklinik").val();
        $.ajax({
            type: "get",
            url: "<?php echo base_url('home/getHargaPoli') ?>",
            data: "poli=" + poli,
            success: function (data) {   
                //console.log(data);             
                $("#tarif").val(data); 
                {
                    getDokter();
                }
            }
        });
    }
    function getDokter(){
        var poli = $("#poliklinik").val();
        var tgl_reg = $("#tgl_periksa").val();
        $.ajax({
            type: "get",
            url: "<?php echo base_url('home/getDokter') ?>",
            data: {
                "poli": poli,
                "tgl_reg" : tgl_reg
            },
            success: function (data) {   
                //console.log(data);             
                $("#dokter").html(data);                 
            }
        });
    }

    function getPenjaminLain(){
        var jenis = $("#cara_bayar").val();
        $.ajax({
            type: "get",
            url: "<?php echo base_url('home/getPenjaminLain') ?>",
            data: "jenis=" + jenis,
            success: function (data) {   
                //console.log(data);             
                $("#penjaminlain").html(data);                 
            }
        });
    }
    
</script>