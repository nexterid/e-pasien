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
	<title>E-Pasien RSUD KRATON</title>		
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/linearicons.css">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/css/main.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/datepicker3.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datetimepicker.min.css" >
	<!-- DATA TABLES -->
	<link href="<?php echo base_url(); ?>assets/lib/datatables/dataTables.bootstrap.css" rel="stylesheet">
	<style>
		p {
			margin-top: 0;
			margin-bottom: 1rem;
			color: brown;
		}
		
	</style>	
	</head>
	<body>
		<div class="main-wrapper-first">
			<header>
				
			</header>
		</div>
		<div class="main-wrapper2">			
			<div class="white-bg">					
					<div class="section-top-border">							
						<div class="row">
							<div class="col-md-10">
								<h3>Buat Password</h3>
								<p>(Untuk Pasien lama yang sudah punya No. RM )</p>
								<?php echo form_open('simpan','class="form"');?>
									<?php echo "<p class='text-danger' >" . $this->session->flashdata('error_jam') . "</p>" ?>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-reorder" aria-hidden="true"></i></div>
										<input type="text" name="ktp" id="ktp" value=""class="input-register" placeholder="No. KTP /NIK" required oninvalid="setCustomValidity('No. RM Pasien !')" oninput="setCustomValidity('')">										
										<?php echo form_error('no_rm'); ?>
									</div>   
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa  fa-user" aria-hidden="true"></i></div>
										<input type="text" name="no_rm" id="no_rm" value=""class="input-register" placeholder="No. RM" required oninvalid="setCustomValidity('No. RM Pasien !')" oninput="setCustomValidity('')">										
										<?php echo form_error('no_rm'); ?>
									</div>  									
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
										<input type="mail" name="email" id="email" value=""class="input-register" placeholder="Alamat Email" required oninvalid="setCustomValidity('No. RM Pasien !')" oninput="setCustomValidity('')">										
										<?php echo form_error('email'); ?>
									</div>  
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
										<input type="text" name="password" id="password" value=""class="input-register" placeholder="Password" required oninvalid="setCustomValidity('No Telpone Harus di Isi !')" oninput="setCustomValidity('')">										
										<?php echo form_error('password'); ?>
									</div>	
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
										<input type="text" name="password2" id="password2" value=""class="input-register" placeholder="Konfirmasi Password" required oninvalid="setCustomValidity('No Telpone Harus di Isi !')" oninput="setCustomValidity('')">										
										<?php echo form_error('password2'); ?>
									</div>
									<div class="mt-10 text-right">
										<button type="submit" name="submit" class="genric-btn success circle" >BUAT PASSWORD</button>										
										<a href="javascript:history.back()" class="genric-btn success circle">KEMBALI</a>
									</div>	
									
								</form>
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
            // "iDisplayLength":5,
			"scrollY": "200px",
			"scrollCollapse": true,
			"paging":         false,
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