<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link href='<?php echo base_url(); ?>assets/images/favicon.png' rel='shortcut icon' type='image/x-icon'/>

    <title>Pendaftaran - Pasien RSUD Kraton</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/until.css">  
    <link href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/datepicker3.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datetimepicker.min.css" >
</head>
<body>        
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100"> 
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url(); ?>assets/images/rsudkraton.png">
                    <h4 class="text-center">RSUD KRATON</h4><br>
                    <h4 class="text-center">Kab. Pekalongan</h4>
                </div>
                <form class="login101-form" action="<?php echo site_url('created');?>" method="post">
                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>                    
                    <?php 
                    if (validation_errors() || $this->session->flashdata('error')){ 
                        ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden='true'>&times;</button>                       
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>    
                    <?php } ?>
                    <div class="wrap-input100 validate-input" data-validate = "No. KTP">
                        <input type="number" maxlength ="17" class="input100" name="no_ktp" value="<?php echo set_value('no_ktp'); ?>" placeholder="No. KTP /NIK" required oninvalid="this.setCustomValidity('Silahkan isi dengan No. KTP!')" oninput="this.setCustomValidity('');">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-reorder" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "No. RM">
                        <input type="number" maxlength ="7" class="input100" name="no_rm" value="<?php echo set_value('no_rm'); ?>" placeholder="No.RM (Rekam Medis)" required oninvalid="this.setCustomValidity('Silahkan isi dengan No. RM!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Tanggal Lahir">
                        <input type="text" maxlength ="10" class="input100" name="tgl_lahir" id="dateFrom2" value="<?php echo set_value('tgl_lahir'); ?>" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Silahkan isi dengan Tanggal Lahir Anda!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Email">
                        <input type="email" class="input100" name="email" value="<?php echo set_value('email'); ?>" placeholder="Alamat Email" required oninvalid="this.setCustomValidity('Silahkan isi dengan Email yang valid!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password">
                        <input autocomplete="off" id="Password" type="password" class="input100" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" required oninvalid="this.setCustomValidity('Silahkan isi password anda!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div> 
                    <div class="wrap-input100 validate-input" data-validate = "confirm password">
                        <input autocomplete="off" id="ConfirmPassword" type="password" class="input100" name="confirm_password" placeholder="Konfirmasi Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>                    
                    <div class="container-login100-form-btn">
                        <button type="submit" id="btnSubmit" class="login100-form-btn"  >
                            Buat Password
                        </button>                        
                    </div>   
                    <div class="text-center p-t-12">
                        <span class="txt0">
                            <strong class="txtbadag"><a href="<?php echo site_url('reset');?>" class="txt0">Lupa Password  <i class="fa fa-user" aria-hidden="true"></i></a></strong> |
                        </span>
                        <span class="txt0">
                            <strong class="txtbadag"> <a href="<?php echo site_url('auth');?>" class="txt0">Login <i class="fa fa-lock" aria-hidden="true"></i></a></strong>
                        </span>                           
                    </div>            
                    <div class="text-center txt0 p-t-100">                        
                            Powered By :
                            <a class="txt0 m-l-5" href="#">RSUD KRATON</a>                            
                        
                    </div>
                </form>
            </div>            
        </div>
    </div>  
</body>    
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/viewport-bug-workaround.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.min.js"></script>      
<script src="<?php echo base_url(); ?>assets/js/tilt.jquery.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/datepicker/locales/bootstrap-datepicker.id.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/js/input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript"> 
window.onload = function () {
    document.getElementById("Password").onchange = validatePassword;
    document.getElementById("ConfirmPassword").onchange = validatePassword;
}

function validatePassword(){
    var pass2=document.getElementById("ConfirmPassword").value;
    var pass1=document.getElementById("Password").value;
    if(pass1!=pass2){
        document.getElementById("ConfirmPassword").setCustomValidity("Passwords Tidak Sama, ulangi password lagi !");
    }else{
        document.getElementById("ConfirmPassword").setCustomValidity('');
    }            
}

function disallowedChar(form=""){
    $(form+' input,textarea').on('keypress', function (event) {
        var regex = new RegExp("^['\"`]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (regex.test(key)) {
           event.preventDefault();
           return false;
        }
    });
}
$('#dateFrom2').datepicker({
    dateFormat: 'dd-mm-yyyy',
    autoclose: true
}).inputmask('dd-mm-yyyy', {
    placeholder: 'dd-mm-yyyy',
    showMaskOnHover: true,
    showMaskOnFocus: true
});

$(document).ready(function(){
    disallowedChar();    
});

</script>

</html>
