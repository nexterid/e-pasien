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
                <table clas='table'>
                    <tr>
                        <td width="120px">No. RM</td>
                        <td>:</td>
                        <td width="250px"><?php echo $no_rm; ?></td>
                        <td width="30px"></td>
                        <td width="120px">Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $jenis_kel;?></td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?php echo $nama_pasien; ?></td>
                        <td></td>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><?php echo $tempat_lahir;?></td>
                    </tr>
                    <tr>
                        <td style='vertical-align:top'>Alamat</td>
                        <td style='vertical-align:top'>:</td>
                        <td><?php echo $alamat; ?></td>
                        <td></td>
                        <td style='vertical-align:top'>Tanggal Lahir</td>
                        <td style='vertical-align:top'>:</td>
                        <td style='vertical-align:top'><?php echo $tgl_lahir;?></td>
                    </tr>
                </table>
                
            </div>
            <div class="clearfix"></div>
            <div class="wrap-login100">   
                <?php echo form_open('web/login_pasien','class="login100-form"')?>                   
                    <div class="wrap-input100 validate-input" data-validate = "No RM is required: 111111">
                         <input autocomplete="off" id="no_rm" type="number" class="input100" name="no_rm" value="" placeholder="No. Rekamedis" required oninvalid="this.setCustomValidity('Silahkan isi No. RM anda!')" oninput="this.setCustomValidity('')" >
                        <span class="focus-input100"></span>
                        
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Tgl Lahir is required">
                        <input autocomplete="off" id="datepicker" type="text" class="input100" name="tgl_lahir" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Silahkan isi Tanggal Lahir!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                    </div>   
                    <div class="wrap-input100 validate-input" data-validate = "Tgl Lahir is required">
                        <input autocomplete="off" id="datepicker" type="text" class="input100" name="tgl_lahir" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Silahkan isi Tanggal Lahir!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                    </div>   
                    <div class="wrap-input100 validate-input" data-validate = "Tgl Lahir is required">
                        <input autocomplete="off" id="datepicker" type="text" class="input100" name="tgl_lahir" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Silahkan isi Tanggal Lahir!')" oninput="this.setCustomValidity('')">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                    </div>   
                                     
                    
                    <div class="text-center p-t-12">
                        <span class="txt0">
                            Supported<strong class="txtbadag"><a href="#" class="txt0">  <i class="epus-font icon-telkom m-l-5" aria-hidden="true"></i></a></strong> |
                        </span>
                        <span class="txt0">
                            Compliance <strong class="txtbadag"> <a href="#" class="txt0"> <i class="epus-font icon-kemenkes m-l-5" aria-hidden="true"></i></a></strong> |
                        </span>
                            <span class="txt0">
                            Integrated <strong class="txtbadag"><a href="#" class="txt0">  <i class="epus-font icon-bpjs m-l-5" aria-hidden="true"></i> </a></strong> 
                        </span>
                    </div>
                    <div class="text-center txt0 p-t-100">                        
                            Powered By :
                            <a class="txt0 m-l-5" href="#">RSUD KRATON</a>                            
                        </a>
                    </div>
                </form>
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
        <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
        </script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script type="text/javascript">
 $(function () {
    $('#dateFrom').datepicker({
        changeMonth : true,
        changeYear  : true,
        showMonthAfterYear : true, 
        dateFormat: 'dd-mm-yyyy',
        autoclose: true
    }).inputmask('dd-mm-yyyy', {
            placeholder: 'dd-mm-yyyy',
            showMaskOnHover: true,
            showMaskOnFocus: true
    });
    $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
    $('#datepicker').datepicker({
        changeMonth : true,
        changeYear  : true,
        autoclose: true
    });
 });
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
        alert("Silahkan isi No. RM (Rekamedis) serta tanggal lahir anda!","warning");
    }
    return valid;
}
$(document).ready(function(){
        disallowedChar();    
});

</script>
    </body>
</html>
