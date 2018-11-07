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
                
                <form class="login100-form" action="<?php echo site_url('register');?>" method="post">
                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>                    
                    <span class="login100-form-title">
                        <img src="<?php echo base_url(); ?>assets/images/logo-kab.png" alt="IMG">                        
                    </span>
                    <?php 
                        if (validation_errors() || $this->session->flashdata('error')){ 
                            echo'
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                       
                                    '.validation_errors().' '.$this->session->flashdata("error").'
                                </div> ';   
                        }else if($this->session->flashdata('success')){
                            echo'
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                       
                                    '.$this->session->flashdata("success").'
                                </div> ';  
                        }
                    ?>
                    <div class="wrap-input100 validate-input" data-validate = "No RM is required: 111111">
                        <input autocomplete="off" id="username" type="text" class="input100" name="username" value="" placeholder="Email / No. RM" required oninvalid="this.setCustomValidity('Silahkan isi User ID anda!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa  fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Tgl Lahir is required">
                        <input autocomplete="off" id="password" type="password" class="input100" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Silahkan isi password anda!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>                    
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn" onclick="return requiredCheckLogin(this);" >
                            Login
                        </button>                        
                    </div>   
                    <div class="text-center p-t-12">
                        <span class="txt0">
                            <strong class="txtbadag"><a href="<?php echo site_url('reset');?>" class="txt0">Lupa Password  <i class="fa fa-user" aria-hidden="true"></i></a></strong> |
                        </span>
                        <span class="txt0">
                            <strong class="txtbadag"> <a href="<?php echo site_url('create');?>" class="txt0">Buat Password <i class="fa fa-lock" aria-hidden="true"></i></a></strong>
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
<script type="text/javascript"> 
function alert(message, type='danger')
{
    switch(type){
        case 'success' :
            var title = "<b>Berhasil:</b><br>";
            var icon = "glyphicon glyphicon-thumbs-up";
            break;
        case 'info':
            var title = "<b>Informasi:</b><br>";
            var icon = "glyphicon glyphicon-info-sign";
            break;
        case 'warning':
            var title = "<b>Perhatian:</b><br>";
            var icon = "glyphicon glyphicon-warning-sign";
            break;
        default:
            var title = "<b>Gagal:</b><br>";
            var icon = "glyphicon glyphicon-warning-sign";
    }
    $.notify({
        
        icon: icon,
        title: title,
        message: message, 
    },{
        
        type: type,
        placement: {
            from: "top",
            align: "center"
        },
        mouse_over: "pause",
        z_index:1051,
        allow_duplicates: false,
    });
}

function disallowedChar(form="")
{
    $(form+' input,textarea').on('keypress', function (event) {
        var regex = new RegExp("^['\"`]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (regex.test(key)) {
           event.preventDefault();
           return false;
        }
    });
}

function requiredCheckLogin(obj)
{
    var valid = true;
    $(obj).parents('form').find('input[required],textarea[required],select[required]').each(function(){
        $(this).parent("div").removeClass("has-error");
        if($(this).val() == ""){
            $(this).parent("div").addClass("has-error");
            valid = false;
        }
    });
    if(!valid){
        alert("Silahkan isi user ID dan Password anda!","warning");
    }
    return valid;
}
$(document).ready(function(){
    disallowedChar();    
});

</script>

</html>
