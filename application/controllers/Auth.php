<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// chek_session();
    }
	
	function index(){
		if($this->session->userdata('status_login')==TRUE){
			redirect('home');
		}else{
			$this->load->view('auth/index');
		}		
	}

	function create_password(){
		$this->load->view('auth/create_password');
	}

	function reset_password(){
		$data['display']='none';
		$data['action']=site_url('reseted');
		$this->load->view('auth/reset_password',$data);
	}

	function action_userpasien(){
		$this->_regpasien_rules();
		if ($this->form_validation->run() == FALSE) {						
			$this->create_password();   
        } else {
			$data = array(
				'no_ktp'=>  $this->input->post('no_ktp',true),
				'no_rm'=>  $this->input->post('no_rm',true),
				'tgl_lahir'=>  tgl_db($this->input->post('tgl_lahir',true)),
				'email'=>  $this->input->post('email',true),
				'password'=>  $this->input->post('password',true),
			);
			$regpasien =$this->rest_model->reguserpasien($data);
			if($regpasien->ok ==true){
				$pesan = "Berhasil buat password, silahkan login!";
			 	$this->session->set_flashdata('success',$pesan);
				redirect('auth');
			}else{
				$this->session->set_flashdata('error',$regpasien->hasil);
				redirect('create');
			}
		}
	}

	function action_resetpass(){
		$this->session->sess_destroy();
		$this->_reset_rules();
		if ($this->form_validation->run() == FALSE) {						
			$this->reset_password();   
        } else {
			$dataposting = array(
				'no_ktp'=> $this->input->post('no_ktp',true),		
				'no_rm'=> $this->input->post('no_rm',true),
				'email'=> $this->input->post('email',true)
			);
			$resetpasswd =$this->rest_model->praResetPassword($dataposting);
			if($resetpasswd->ok ==true){
				$this->session->set_flashdata('success',$resetpasswd->hasil);
				$data['display']='show';
				$data['action']=site_url('generated');
				$this->load->view('auth/reset_password',$data);
			}else{
				$this->session->set_flashdata('error',$resetpasswd->hasil);
				$data['display']='none';
				$data['action']=site_url('reseted');
				$this->load->view('auth/reset_password',$data);
			}
		}
	}

	function action_generatepass(){
		$this->_reset_rules();
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {						
			$data['display']='show';
			$data['action']=site_url('generated');
			$this->load->view('auth/reset_password',$data);  
        } else {
			$dataposting = array(
				'no_ktp'=> $this->input->post('no_ktp',true),		
				'no_rm'=> $this->input->post('no_rm',true),
				'email'=> $this->input->post('email',true),
				'password'=>$this->input->post('password',true)
			);
			$resetpasswd =$this->rest_model->ResetNewPassword($dataposting);
			if($resetpasswd->ok ==true){
				$this->session->set_flashdata('success',$resetpasswd->hasil);
				redirect('auth');
			}else{
				$this->session->set_flashdata('error',$resetpasswd->hasil);
				$data['display']='none';
				$data['action']=site_url('reseted');
				$this->load->view('auth/reset_password',$data);
			}
		}
	}

	function registrasi(){
		$this->_set_rules();
		if ($this->form_validation->run() == FALSE) {						
			$this->index();   
        } else {
			$password=$this->input->post('password');			
			$data = array(
                'no_rm'=>  $this->input->post('username'),
                'password'=>$password,
			);
			$cek =$this->rest_model->loginpasien($data);
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
					'email'=>$cek->hasil->email,
					'status_login'=>TRUE
				);
				$this->session->set_userdata($session);	
				redirect('home');				
			}else{				
				$this->session->set_flashdata('error',$cek->pesan);
				$this->index();            
			}
        }
	}
	
	function logout() {
        $this->session->sess_destroy();
        redirect(site_url());
	}
	
	function _set_rules() {
        $this->form_validation->set_rules('username', 'User ID', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');     
        //$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>", "</div>");
	}
	
	function _regpasien_rules() {
        $this->form_validation->set_rules('no_ktp', 'No. KTP / NIK ', 'trim|required');
		$this->form_validation->set_rules('no_rm', 'No RM (Rekam Medis)', 'trim|required');     
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');  
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');      
	}
	
	function _reset_rules() {
		$this->form_validation->set_rules('no_ktp', 'No KTP/ NIK', 'trim|required');  
		$this->form_validation->set_rules('no_rm', 'No RM (Rekam Medis)', 'trim|required');     
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');    
    }
	
}