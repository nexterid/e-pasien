<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <link rel="shortcut icon" type="image/png" href="images/favicon.png">

        <title>Pendaftaran - Pasien RSUD Kraton</title>
         <!-- Bootstrap core CSS -->
         <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <!-- style login -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/datepicker3.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datetimepicker.min.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/message.css">    
        <!-- e-pasien font -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <body>
        
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login1">
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
        
        <div class="wrap-register"> 
            <div class="col-md-6">            
            <?php echo form_open('simpan');?>
                       
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <input id="no_telp" type="number" class="input-register" name="no_telp" value="" required placeholder="No. Handphone"  oninvalid="this.setCustomValidity('Silahkan isi No. Hp anda!')" oninput="this.setCustomValidity('')" >                        
                    </div>
                    <?php echo form_error('no_telp');?>  
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input id="datepicker" type="text" class="input-register" name="tgl_periksa" value='<?php echo date('d-m-Y',$tanggal);?>' placeholder="Tanggal Perikas" required oninvalid="this.setCustomValidity('Silahkan isi Tanggal Periksa')" oninput="this.setCustomValidity('')">                                            
                    </div>
                    <?php echo form_error('tgl_periksa');?>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-medkit" aria-hidden="true"></i>
                        </span>
                        <select name="poliklinik" class="input-register" id="poliklinik" required onchange='getHarga()'>
                            <option value="">- Poliklinik -</option>
                            <?php
                            foreach($poliklinik as $q){
                                echo' <option value='.$q->kd_sub_unit.'>'.$q->nama_sub_unit.'</option>';
                            }
                            ?>
                        </select>                        
                    </div>
                    <?php echo form_error('poliklinik');?>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                        </span>
                        <input id="tarif" type="text" class="input-register" name="tarif_poli" value="" readonly placeholder="Tarif Poliklinik" required >                        
                    </div>                    
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-stethoscope" aria-hidden="true"></i>
                        </span>
                        <select name="dokter" class="input-register" id="dokter">
                           <option value="">- Dokter Klinik -</option>
                        </select>                        
                    </div>
                    <?php echo form_error('dokter');?>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-copy" aria-hidden="true"></i>
                        </span>
                        <select name="cara_bayar" class="input-register" id="cara_bayar" onchange='getPenjaminLain()'>
                            <option value="">- Jenis Pasien -</option>                            
                            <?php                             
                                foreach($cara_bayar->hasil as $q){
                                    echo '<option value="'.$q->kd_cara_bayar.'">'.$q->keterangan.'</option>';
                                }             
                            ?>    
                        </select>                        
                    </div> 
                    <div class="wrap-input100 validate-input" id='penjaminlain'>
                                                                     
                    </div> 
                    <?php echo form_error('cara_bayar');?>                   
                    <div class="container-login100-form-btn">
                        <input type="hidden" name="no_rm" value="<?php echo $this->session->userdata('no_rm');?>">
                        <button type="submit" name="submit" class="login100-form-btn" >
                            DAFTAR
                        </button>
                    </div>                           
            </div>
           
            
        </div>
    </div>
</div>      
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>        
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/viewport-bug-workaround.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script> 
        <!-- datepicker -->
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
