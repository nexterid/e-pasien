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
								<?php 
								if(!empty($this->session->flashdata('success'))){
									echo '
									<div class="alert alert-success alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('success').'
									</div>';
								}else if(!empty($this->session->flashdata('error'))){
									echo '
									<div class="alert alert-danger alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->session->flashdata('error').'
									</div>';
								}            
								?>							
								<h3 class="mb-30">History</h3>								
								<table class="table table-responsive"> 
									<tr>
										<td>No Registrasi</td>
										<td style="width:200px">Tgl Registrasi</td>
										<td>Waktu</td>
										<td style="width:200px">Poliklinik</td>
									</tr>                
									<?php 
										if($lisregister->ok==false){
											echo '
											<tr>												
											</tr>';
										}else{
											foreach($lisregister->hasil as $q){
												echo'
												<tr>
													<td>'.$q->no_reg.'</td>
													<td>'.tgl_lengkap($q->tgl_reg).'</td>
													<td>'.waktu_24($q->waktu).'</td>
													<td>'.$q->nama_sub_unit.'</td>                            
												</tr>';
											}										
										}                
									?>                
								</table> 
								<a href="<?= site_url('home');?>" class="genric-btn btn-xs success circle">Back to home</a>    
		
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
</body>
</html>
