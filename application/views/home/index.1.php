<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->	
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nice-select.css">
	<link href="<?php echo base_url(); ?>assets/css/main.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/datepicker3.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datetimepicker.min.css" >
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
								<?php echo form_open('simpan');?>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<input type="text" name="no_telp" placeholder="No. Handphone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nomor Telepon'" required class="single-input">
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
										<input type="text" name="tgl_periksa" id="datepicker" value='<?php echo date('d-m-Y',$tanggal);?>' placeholder="Tanggal Perikas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
										<div class="form-select">
											<select name="poliklinik" id="poliklinik" required onchange='getHarga()'>
												<option value="">- Poliklinik -</option>
												<?php
													foreach($poliklinik as $q){
														echo' <option value='.$q->kd_sub_unit.'>'.$q->nama_sub_unit.'</option>';
													}
												?>
											</select>
											
										</div>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-dollar" aria-hidden="true"></i></div>
										<input id="tarif" type="text" class="single-input" name="tarif_poli" value="" readonly placeholder="Tarif Poliklinik" required >
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></div>
										<input id="dokter" type="text" class="single-input" name="dokter" value="" readonly placeholder="Dokter Poliklinik" required >
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="fa fa-copy" aria-hidden="true"></i></div>
										<div class="form-select">
											<select name="cara_bayar" class="input-register" id="cara_bayar" onchange='getPenjaminLain()'>
												<option value="">- Jenis Pasien -</option>                            
												<?php                             
													foreach($cara_bayar->hasil as $q){
														echo '<option value="'.$q->kd_cara_bayar.'">'.$q->keterangan.'</option>';
													}             
												?>    
											</select>
										</div>
									</div>
									<div class="input-group-icon mt-10" id="penjaminlain" >
										
                    				</div> 
									<div class="mt-10 text-right">
										<button type="submit" name="submit" class="genric-btn success circle" >DAFTAR</button>
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
<script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/datepicker/locales/bootstrap-datepicker.id.js"></script>
</body>
</html>
<script type="text/javascript">
    var today= new Date();
    var endday= today+7;
    $("#datepicker").datepicker({
        format : 'dd-mm-yyyy',
        startDate: today,        
        endDate: '+1d',        
        //maxDate: today,
        autoclose: true  
    });
    $(function () {
        $('#datepicker2').datepicker({
            changeMonth : true,
            changeYear  : true,
            autoclose: true
        });
    });
    $(function () {
        $('#datepicker1').datepicker({
            changeMonth : true,
            changeYear  : true,
            autoclose: true
        });
    });

    function disableRujukan() {
        var caraMasuk=$("#cara_masuk").val();
        if (caraMasuk == 1) {
            document.getElementById("datepicker1").disabled = true;
            document.getElementById("no_rujukan").disabled = true;
            document.getElementById("nama_instansi").disabled = true;
            //alert('ok');
        } else {            
            document.getElementById("datepicker1").disabled = false;
            document.getElementById("no_rujukan").disabled = false;
            document.getElementById("nama_instansi").disabled = false;
        }
    }

    function disableJenisPasien() {
        var jenisPasien=$("#jenis_pasien").val();
        if (jenisPasien == 1) {
            document.getElementById("penjamin").disabled = true;
            document.getElementById("no_kartu").disabled = true;
            document.getElementById("hak_kelas").disabled = true;
            //alert('ok');
        } else {            
            document.getElementById("penjamin").disabled = false;
            document.getElementById("no_kartu").disabled = false;
            document.getElementById("hak_kelas").disabled = false;
        }
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
        var tgl_reg = $("#datepicker").val();
        $.ajax({
            type: "get",
            url: "<?php echo base_url('home/getDokter') ?>",
            data: {
                "poli": poli,
                "tgl_reg" : tgl_reg
            },
            success: function (data) {   
                //console.log(data);             
                $("#dokter").val(data);                 
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