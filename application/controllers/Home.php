<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
    function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
    }
	
	function index(){
		if($this->session->userdata('status_login')=='login_diterima'){
			$date=date('d-m-Y');
			$date = strtotime($date);		
			$data['tanggal']=strtotime("+1 day", $date);			
			$data['poliklinik'] = $this->rest_model->getalltarifkarcis();	
			$data['cara_masuk'] = $this->rest_model->getallasalpasien();	
			$data['instansi'] = $this->rest_model->getallinstansirujukan();
			$data['penjamin'] = $this->rest_model->getallpenjaminpasien();
			$data['cara_bayar']=$this->rest_model->getcarabayar();
			$this->load->view('home/index',$data);
		}else{
			redirect('auth');
		}
		
	}
	
	function simpan(){		
		$this->_set_rules();
		if($this->form_validation->run()==TRUE){
			$kode='01'.date('dmy',strtotime($this->input->post('tgl_periksa',true)));
			$get_noreg=$this->rest_model->noReg($kode);
			if($get_noreg->ok==true){
				$idMax=$get_noreg->hasil->no_reg;					
				$noUrut =(int) substr($idMax,-4);				
				$noUrut++;
				$newID = $kode . sprintf("%04s", $noUrut);
			}else{
				$noUrut=1;
				$newID = $kode . sprintf("%04s", $noUrut);				
			}		
			$data=array(
				'no_reg'=>$newID,
				'no_RM'=>$this->input->post('no_rm',true),
				'no_telp'=>$this->input->post('no_telp',true),
				'tgl_reg'=>tgl_db($this->input->post('tgl_periksa',true)),
				'waktu'=>date('H:i:s'),
				'kd_asal_pasien'=>'1',			
				'kd_cara_bayar'=>$this->input->post('cara_bayar',true),
				'kd_sub_unit'=>$this->input->post('poliklinik',true),			
				'kd_pegawai'=>$this->input->post('dokter',true),
				'user_id'=>'000003'		
			);			
			if($this->input->post('cara_bayar')==3){
				$data['kd_penjamin']=$this->input->post('kd_penjamin',true);
			}			
			$insert=$this->rest_model->action_daftar($data); 	
			$respon=json_decode($insert);		
			if($respon->ok==TRUE){
				$getPoli=$this->rest_model->getNamaPoli($this->input->post('poliklinik',true));
				$pesan=$respon->pesan.'<br> No. Antrian anda : <strong>'.$respon->no_antrian.'</strong><br>Nama Poli : '.$getPoli->hasil->nama_sub_unit;
				$this->session->set_flashdata('success',$pesan);
				redirect('registered');			
			}else {				
				$getPoli=$this->rest_model->getNamaPoli($this->input->post('poliklinik',true));
				$pesan=$respon->pesan.'<br>Nama Poli : '.$getPoli->hasil->nama_sub_unit;
				$this->session->set_flashdata('error',$pesan);
				redirect('registered');
			}
		}else{
			$this->index();
		}

	}

	public function registered()	
	{
		$no_rm=trim($this->session->userdata('no_rm')," ");
		$data['lisregister']=$this->rest_model->getListRegister($no_rm);		
		$this->load->view('home/history',$data);
	}
	
	function getPasien($no_rm){
		$pasien =$this->rest_model->getPasien($no_rm);
		echo $pasien[0]->nama_pasien;
	}

	function getHargaPoli(){
		$kd_unit=$this->input->get('poli');
		if(!empty($kd_unit)){
			$tarif= $this->rest_model->getHargaPoli($kd_unit);
			echo rupiah($tarif->hasil->harga);
		}else{
			echo '';
		}
		
	}

	function getDokter(){
		$kd_unit=$this->input->get('poli');
		$tgl_reg=$this->input->get('tgl_reg');
		if(!empty($kd_unit)){
			$dokter= $this->rest_model->getDokterPoli($kd_unit,$tgl_reg);			
			if($dokter->ok==FALSE){	
				//echo $dokter->pesan;
				echo ' <select name="dokter"  disabled id="dokter" requered>';				
						echo' <option value="">'.$dokter->pesan.'</option>';	
						//var_dump($dokter->pesan);			
				echo '</select>';
			}else{
				//echo $dokter->hasil[0]->nama_pegawai;
				echo ' <select name="dokter" id="dokter">';					
						echo' <option value="'.$dokter->hasil[0]->Kd_Pegawai.'" >'.$dokter->hasil[0]->nama_pegawai.'</option>';
					
				echo '</select>';
			}
		}else{
			//echo '';
			echo ' <select name="dokter"  disabled  id="dokter">';				
					echo' <option value="" selected>- Dokter Klinik -</option>';				
			echo '</select>';
		}
		
	}

	function getPenjaminLain(){
		$kd_jenis=$this->input->get('jenis');
		if($kd_jenis=='3'){
			$penjaminlain= $this->rest_model->getPenjaminLain();
			echo ' <div class="form-select">
			<div class="icon"><i class="fa fa-tags" aria-hidden="true"></i></div>
			<select name="kd_penjamin" class="input-register" id="penjaminlain" >';				
				foreach($penjaminlain->hasil as $q){
					echo'<option value="'.$q->kd_penjamin.'">'.$q->nama_penjamin.'</option>';
				}				
			echo '</select>
			</div>';
			
		}else{
			echo '';
		}
		
	}

	public function testing()
	{
		$this->load->view('home/testing');
	}

	function _set_rules() {
        $this->form_validation->set_rules('no_telp', 'No Telpn/Hp', 'required|trim|numeric');
        $this->form_validation->set_rules('tgl_periksa', 'Tanggal Registrasi', 'required|trim');
        $this->form_validation->set_rules('poliklinik', 'Poliklinik', 'required|trim');
        $this->form_validation->set_rules('dokter', 'Dokter Poliklinik', 'required|trim');
		$this->form_validation->set_rules('cara_bayar', 'Jenis Pasien', 'required|trim');
        $this->form_validation->set_error_delimiters('<p class="text-red">', '</p>');
    }
	
}