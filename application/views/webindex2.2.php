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
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="<?php echo base_url();?>assets/css/workaround.css" type="text/css" rel="stylesheet">
        <!-- style login -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/until.css">      
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/select2.min.css">
        <link href="<?php echo base_url(); ?>assets/lib/datepicker/datepicker3.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">    
        <!-- e-pasien font -->
        <link href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
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
            <?php echo form_open('web/simpan')?>                
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <input id="no_telp" type="number" class="input-register" name="no_telp" value="" placeholder="No. Handphone" required oninvalid="this.setCustomValidity('Silahkan isi No. Hp anda!')" oninput="this.setCustomValidity('')" >
                    </div> 
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        <input id="datepicker2" type="text" class="input-register" name="tgl_periksa" value="" placeholder="Tanggal Perikas" required oninvalid="this.setCustomValidity('Silahkan isi Tanggal Periksa')" oninput="this.setCustomValidity('')">                    
                    </div>
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
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-copy" aria-hidden="true"></i>
                        </span>
                        <select name="cara_bayar" class="input-register" id="cara_bayar">
                            <option value="">- Cara Bayar -</option>
                            <?php 
                                foreach($cara_bayar as $q){
                                    echo '<option value="'.$q->kd_cara_bayar.'">'.$q->keterangan.'</option>';
                                }             
                            ?>    
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </span>
                        <select name="cara_masuk" class="input-register" id="cara_masuk" onchange='disableRujukan()'>
                            <option value="">- Cara Masuk -</option>
                            <?php 
                                foreach($cara_masuk as $q){
                                    echo '<option value="'.$q->kd_asal_pasien.'">'.$q->keterangan.'</option>';
                                }             
                            ?>    
                        </select>
                    </div>                           
            </div>
            <div class="col-md-6">
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        </span>
                        <input id="datepicker1" type="text" class="input-register" name="tgl_periksa" value="" placeholder="Tanggal Perikas" required oninvalid="this.setCustomValidity('Silahkan isi Tanggal Periksa')" oninput="this.setCustomValidity('')">                    
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-random" aria-hidden="true"></i>
                        </span>
                        <input id="no_rujukan" type="text" class="input-register" name="no_rujukan" value="" placeholder="Nomor Rujukan" required oninvalid="this.setCustomValidity('Nomor Rujukan')" oninput="this.setCustomValidity('')">                    
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-th-large" aria-hidden="true"></i>
                        </span>
                        <select name="nama_instansi" class="input-register" id="nama_instansi">
                            <option value="">- Nama Instansi -</option>    
                            <?php 
                                foreach($instansi as $q){
                                    echo '<option value="'.$kd_instansi.'">'.$q->nama_instansi.'</option>';
                                }             
                            ?>                             
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-user-md" aria-hidden="true"></i>
                        </span>
                        <select name="jenis_pasien" class="input-register" id="jenis_pasien"  onchange='disableJenisPasien()'>
                            <option value="">- Jenis Pasien -</option>
                            <option value="1">Umum</option>
                            <option value="0">Penjamin</option>                             
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-hdd-o" aria-hidden="true"></i>
                        </span>
                        <select name="penjamin" class="input-register" id="penjamin">     
                            <option value="">- Nama Penjamin -</option>  
                            <?php
                                foreach($penjamin as $q){
                                    echo' <option value='.$q->kd_sub_unit.'>'.$q->nama_sub_unit.'</option>';
                                }
                            ?>                                             
                        </select>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </span>
                        <input id="no_kartu" type="text" class="input-register" name="no_kartu" value="" placeholder="Nomor Kartu" >                    
                    </div>
                    <div class="wrap-input100 validate-input">
                        <span class="symbol-inputregister">
                            <i class="fa fa-eject" aria-hidden="true"></i>
                        </span>
                        <input id="hak_kelas" type="text" class="input-register" name="hak_kelas" value="" placeholder="Hak Kelas" >                    
                    </div>                             
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn" >
                    DAFTAR
                </button>
            </div>     
        </div>
    </div>
</div>      
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>        
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/viewport-bug-workaround.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>      
    <script src="<?php echo base_url(); ?>assets/js/tilt.jquery.min.js"></script>
        <!-- datepicker -->
    <script src="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/datepicker/locales/bootstrap-datepicker.id.js"></script>
        <!-- inputmask -->
    <script src="<?php echo base_url() ?>assets/lib/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url() ?>assets/lib/input-mask/jquery.inputmask.date.extensions.js"></script>           
    </body>
</html>
<script type="text/javascript">   
    $("#datepicker2").datepicker({
        minDate: '-5d',
        maxDate: '2',
        autoclose: true  
    });
    $(function () {
        $('#datepicker').datepicker({
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
            url: "<?php echo base_url('web/getHargaPoli') ?>",
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
        $.ajax({
            type: "get",
            url: "<?php echo base_url('web/getDokter') ?>",
            data: "poli=" + poli,
            success: function (data) {   
                //console.log(data);             
                $("#dokter").html(data);                 
            }
        });
    }
    
</script>
