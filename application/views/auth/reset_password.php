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
                <form class="login101-form" action="<?=$action;?>" method="post">
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
                    <div class="wrap-input100 validate-input" data-validate = "Email">
                        <input type="email" class="input100" name="email" value="<?php echo set_value('email'); ?>" placeholder="Alamat Email" required oninvalid="this.setCustomValidity('Silahkan isi dengan Email yang valid!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <fieldset id="password" style="display:<?=$display;?>;">
                        <div class="wrap-input100 " data-validate = "Password">
                            <input autocomplete="off" id="Password" type="password" class="input100" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div> 
                    </fieldset>
                    <fieldset id="conf_password" style="display:<?=$display;?>">
                        <div class="wrap-input100 " data-validate = "confirm password">
                            <input autocomplete="off" id="ConfirmPassword" type="password" class="input100" name="confirm_password" placeholder="Konfirmasi Password" >
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>     
                    </fieldset>     
                                 
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn"  >
                            Reset Password
                        </button>                        
                    </div>   
                    <div class="text-center p-t-12">
                        <span class="txt0">
                            <strong class="txtbadag"><a href="<?php echo site_url('create');?>" class="txt0">Buat Password  <i class="fa fa-user" aria-hidden="true"></i></a></strong> |
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
<div class="modal modal-form tanggal-form">
    <div class="modal-dialog">
        <form class="form-horizontal form-dialog" role="form" id="form-modal" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Update Berita</h4>
                </div>
                <div class="modal-body">                    
                    <div class="box-body">
                        <div class="form-group category">
                            <label class="col-sm-3 control-label" for="category">Tanggal Posting</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="datetimepicker" name="tanggal" placeholder="">
                            </div>
                        </div>
                        <input type="hidden" class="form-control input-sm" id="id" name="id" placeholder="">
                    </div>
                    <div class="form-group" style="margin-top: 10px;padding: 10px 0;">
                        <div class="btn-group col-md-9 col-md-offset-3" id="container_upload">
                            <button onclick="update_tanggal(); return false;" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
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

$(document).ready(function(){
    disallowedChar();    
});

</script>

</html>
