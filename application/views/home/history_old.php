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
        <!-- e-pasien font -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custome.css">       
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
            <div class="col-md-12">
                <table class="table table-responsive"> 
                    <tr>
                        <td>No Registrasi</td>
                        <td style="width:200px">Tgl Registrasi</td>
                        <td>Waktu</td>
                        <td style="width:200px">Poliklinik</td>
                    </tr>                
                    <?php 
                        foreach($lisregister->hasil as $q){
                            echo'
                            <tr>
                                <td>'.$q->no_reg.'</td>
                                <td>'.tgl_lengkap($q->tgl_reg).'</td>
                                <td>'.waktu_24($q->waktu).'</td>
                                <td>'.$q->nama_sub_unit.'</td>                            
                            </tr>
                            ';
                        }                
                    ?>                
                </table>     
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
    
    </body>
</html>
<script type="text/javascript">
    var today= new Date();
    var endday= today+7;
    $("#datepicker2").datepicker({
        format : 'dd-mm-yyyy',
        startDate: today,        
        endDate: '+1d',        
        //maxDate: today,
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
        $.ajax({
            type: "get",
            url: "<?php echo base_url('home/getDokter') ?>",
            data: "poli=" + poli,
            success: function (data) {   
                //console.log(data);             
                $("#dokter").html(data);                 
            }
        });
    }
    
</script>
