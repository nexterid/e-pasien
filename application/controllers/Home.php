<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
    function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
    }
	
	function index()
	{
		if($this->session->userdata('status_login')=='login_diterima'){				
			$data['tanggal']=$this->tglPeriksa();			
			$data['poliklinik'] = $this->rest_model->getalltarifkarcis();	
			$data['cara_masuk'] = $this->rest_model->getallasalpasien();	
			$data['instansi'] = $this->rest_model->getallinstansirujukan();
			$data['penjamin'] = $this->rest_model->getallpenjaminpasien();
			$data['cara_bayar']=$this->rest_model->getcarabayar();
			$data['jadwal']=$this->rest_model->getJadwalDokter($this->tglPeriksa());			
			$this->load->view('home/index',$data);			
		}else{
			redirect('auth');
		}
		
	}
	function tgl($tgl){
		echo tgl_db($tgl);
	}

	public function view_jadwal() { 
		$tgl=tgl_db($this->input->get('tgl'));		
		// var_dump($tgl);	 		
		$getdata = $this->rest_model->getJadwalDokter($tgl); 
		if($getdata->ok=="true"){
			foreach ($getdata->hasil as $q) {
				// $kualitas = $this->db->get_where('kualitas', array('kd_kualitas' => $q->kd_kualitas))->row();            
				 $query[] = array(                
					 'nama_sub_unit'=>$q->nama_sub_unit,               
					 'nama_pegawai' => $q->nama_pegawai,               
				 );
			 }		
			 $result = array('data' => $query);
			 echo json_encode($result);
		}else{
			echo json_encode($getdata->pesan);
		}       
        
	}
	
	// function cek_tglPeriksa($tgl)
	// {
	// 	$cek_libur =$this->rest_model->getAllHariLibur();
	// 	$libur= $cek_libur['hasil'];
	// 	$from = new DateTime($tgl);
	// 	foreach($libur as $h){
	// 		$holidayDays[] = $h['tgl_libur'];
	// 	}
	// 	$days = 1;
	// 	while ($days) {
	// 		in_array($from->format('Y-m-d'), $holidayDays) ? $from->modify('+1 day') : date('N',strtotime($from->modify('+1 day')))==7?$from->modify('+1 day'):0 ;
	// 	if (in_array($from->format('Y-m-d'), $holidayDays)) continue;
	// 		$dates[] = $from->format('Y-m-d');
	// 		$days--;
	// 	}
	// 	return array_shift($dates);
	// }

	function tglPeriksa()
	{
		$from=date('Y-m-d');	
		$tgl_periksa=$this->cek_tglPeriksa($from);	
		return $tgl_periksa;
	}
	
	function cek_tglPeriksa($from){
		$cek_libur =$this->rest_model->getAllHariLibur();
		$libur= $cek_libur['hasil'];
		$q = [];
		array_walk($libur, function($a) use (&$q) { $q[] = $a["tgl_libur"]; });
		do {
			$from = date("Y-m-d", strtotime($from)+86400);
		} 
		while(in_array($from, $q) || date("D", strtotime($from)) === "Sun");

		return $from;
	}

	function simpan(){
		$jamdaftar=date('H:i:s');
		if($jamdaftar >= "08:00:00" && $jamdaftar < "14.00"){
			$this->_set_rules();
			$tgl_periksa=tgl_db($this->input->post('tgl_periksa',true));
			$cek_libur=$this->rest_model->getHariLibur($tgl_periksa); 	
			if($this->form_validation->run()==false){
				$this->index();
			}else if($cek_libur->ok==true){			
				$pesan="Maaf Poli Tutup ".$cek_libur->hasil->keterangan;
				$this->session->set_flashdata('error',$pesan);
				redirect('registered');
			}else {			
				$kode='01'.date('dmy',strtotime($this->input->post('tgl_periksa',true)));
				$kode_tag='IRJ'.date('dmy',strtotime($this->input->post('tgl_periksa',true)));
				$get_noreg=$this->rest_model->noReg($kode);
				$get_nobukti=$this->rest_model->NoBukti($kode_tag);
				$get_tarif=$this->rest_model->getTarifKarcis($this->input->post('poliklinik'));
				if($get_noreg->ok==true){
					$idMax=$get_noreg->hasil->no_reg;					
					$noUrut =(int) substr($idMax,-4);				
					$noUrut++;
					$newID = $kode . sprintf("%04s", $noUrut);
				}else{
					$noUrut=1;
					$newID = $kode . sprintf("%04s", $noUrut);				
				}	
				if($get_nobukti->ok==true){
					$idMax=$get_nobukti->hasil->no_bukti;					
					$noUrut =(int) substr($idMax,-4);				
					$noUrut++;
					$no_bukti = $kode_tag . sprintf("%04s", $noUrut);
				}else{
					$noUrut=1;
					$no_bukti = $kode_tag . sprintf("%04s", $noUrut);		
				}
				$data=array(
					'no_reg'=>$newID,
					'kd_sub_unit'=>$this->input->post('poliklinik',true),
					'no_RM'=>$this->input->post('no_rm',true),
					'tgl_reg'=>tgl_db($this->input->post('tgl_periksa',true)),
					'waktu'=>date('H:i:s'),
					'user_id'=>'000003',
					'kd_pegawai'=>$this->input->post('dokter',true),
					'no_telp'=>$this->input->post('no_telp',true),
					'kd_cara_bayar'=>$this->input->post('cara_bayar',true),
					'kd_asal_pasien'=>'1',
					'kd_tarif'=>$get_tarif->hasil->kd_tarif,
					'no_bukti'=>$no_bukti,
					'hak_kelas'=>'0',
					'Rek_P'=>$get_tarif->hasil->Rek_P,
				);			
				if($this->input->post('cara_bayar')==3){
					$data['kd_penjamin']=$this->input->post('kd_penjamin',true);
				}	
				// var_dump($data);				
				$insert=$this->rest_model->action_daftar($data); 	
				$respon=json_decode($insert);			
				if($respon->ok==true){
					$getPoli=$this->rest_model->getNamaPoli($this->input->post('poliklinik',true));
					$pesan=$respon->pesan.'<br> No. Antrian anda : <strong>'.$respon->no_antrian.'</strong><br>Pendaftaran Poli : '.$getPoli->hasil->nama_sub_unit;
					$this->session->set_flashdata('success',$pesan);	
					$this->session->set_userdata('no_telp',$this->input->post('no_telp',true));				
					// var_dump($respon);		
					redirect('registered');				
				}else {	
					$getPoli=$this->rest_model->getNamaPoli($this->input->post('poliklinik',true));				
					$pesan=$respon->pesan.' untuk tanggal '.$this->input->post('tgl_periksa',true).'<br>Pendaftaran Pada Poli : '.$respon->nama_poli;
					$this->session->set_flashdata('error',$pesan);
					// var_dump($respon);
					redirect('registered');	
				}			
			}
		}else{	
			$pesan='<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Maaf Pendaftaran Hanya Bisa dilakukan dari jam 08.00 s/d 14.00 !
					</div>';		
			$this->session->set_flashdata('error_jam',$pesan);
			redirect('home');
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
			<select name="kd_penjamin" class="input-register" requered id="penjaminlain" >';	
				echo '<option value="">- Pilih Penjamin -</option>';			
				foreach($penjaminlain->hasil as $q){
					echo'<option value="'.$q->kd_penjamin.'">'.$q->nama_penjamin.'</option>';
				}				
			echo '</select>
			</div>';
			
		}else{
			echo '';
		}
		
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