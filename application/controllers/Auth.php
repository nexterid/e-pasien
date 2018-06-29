<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
    }
	
	function index(){
		if($this->session->userdata('status_login')==TRUE){
			redirect('home');
		}else{
			$this->load->view('auth/index');
		}		
	}

	function registrasi(){
		$this->_set_rules();
		if ($this->form_validation->run() == FALSE) {						
			$this->index();   
        } else {
			$password=$this->input->post('password');	
			$passwd=substr($password,0,2).'-'.substr($password,2,2).'-'.substr($password,4);			
			$data = array(
                'no_RM'=>  $this->input->post('username'),
                'tgl_lahir'=>tgl_db($passwd),
			);
			$cek =$this->rest_model->sendpasien($data);
			//$cek=json_decode($login);	
			// var_dump($cek);		
			if($cek->ok==TRUE){
				if($cek->hasil->jns_kel=='0'){
					$jeniskel='Perempuan';
				}else{
					$jeniskel='Laki-Laki';
				}
				$session=array(
					'no_rm'=>$cek->hasil->no_RM,
					'nama_pasien'=>$cek->hasil->nama_pasien,
					'tgl_lahir'=>$cek->hasil->tgl_lahir,
					'alamat'=>$cek->hasil->alamat,
					'jenis_kel'=>$jeniskel,
					'tgl_lahir'=>tgl_lengkap($cek->hasil->tgl_lahir),
					'tempat_lahir'=>$cek->hasil->tempat_lahir,
					'no_telp'=>$cek->hasil->no_telp,
					'status_login'=>TRUE
				);
				$this->session->set_userdata($session);	
				redirect('home');				
			}else{				
				$this->session->set_flashdata('error',$cek->pesan);
				$this->index();
				//redirect(base_url());              
			}
        }
	}
	
	function logout() {
        $this->session->sess_destroy();
        redirect(site_url());
	}
	
	function _set_rules() {
        $this->form_validation->set_rules('username', 'User ID', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');     
        //$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>", "</div>");
    }
	
}