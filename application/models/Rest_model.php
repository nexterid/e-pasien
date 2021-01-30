<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_model extends CI_Model {

    var $API ="";

    public function __construct() {
        parent::__construct();
        $this->API="http://10.10.11.2";
    }

    public function sendpasien($data)
    {
        $result=json_decode($this->curl->simple_post($this->API.'/sendpasien',$data,array(CURLOPT_BUFFERSIZE => 10)));
        return $result;
    }

    public function loginpasien($data)
    {
        $result=json_decode($this->curl->simple_post($this->API.'/loginpasien',$data,array(CURLOPT_BUFFERSIZE => 10)));
        return $result;
    }

    public function reguserpasien($data)
    {
        $result=json_decode($this->curl->simple_post($this->API.'/reguserpasien',$data,array(CURLOPT_BUFFERSIZE => 10)));
        return $result;
    }

    public function praResetPassword($data)
    {
        $result=json_decode($this->curl->simple_post($this->API.'/pasien/reset/password',$data,array(CURLOPT_BUFFERSIZE => 10)));
        return $result;
    }

    public function ResetNewPassword($data)
    {
        $result=json_decode($this->curl->simple_post($this->API.'/pasien/generate/password',$data,array(CURLOPT_BUFFERSIZE => 10)));
        return $result;
    }
    
    public function getalltarifkarcis()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getalltarifkarcis'));
        return $result;
    }

    public function getallasalpasien()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getallasalpasien'));
        return $result;
    }

    public function getallinstansirujukan()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getallinstansirujukan'));
        return $result;
    }

    public function getallpenjaminpasien()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getallpenjaminpasien'));	
        return $result;
    }

    public function getcarabayar()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getcarabayar/0'));
        return $result;
    }

    public function getPasien($no_rm)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getPasien/'.$no_rm));
        return $result;
    }

    public function getHargaPoli($kd_unit)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/gethargatarifkarcis/'.$kd_unit));
        return $result;
    }

    public function getDokterPoli($kd_unit,$tgl_reg)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getdokterpengganti/'.$kd_unit.'/'.$tgl_reg));
        return $result;
    }

    public function noReg($kode)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getcodereg/'.$kode));
        return $result;
    }

    public function action_daftar($data)
    {
        $result=$this->curl->simple_post($this->API.'/sendregister', $data,array(CURLOPT_BUFFERSIZE => 10));
        return $result;
    }

    public function getPenjaminLain()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getpenjaminlain'));
        return $result;
    }

    public function getListRegister($no_rm)
    {      
        $result=json_decode($this->curl->simple_get($this->API.'/getlistregister/'.$no_rm));        
        return $result;
    }

    public function getNamaPoli($kd_unit)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getsubunit/'.$kd_unit));
        return $result;
    }

    public function getHariLibur($tgl_periksa)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getharilibur/'.$tgl_periksa));
        return $result;
    }

    public function getTarifKarcis($kd_poli)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/gettarifkarcis/'.$kd_poli));
        return $result;
    }

    public function NoBukti($kode_tag)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getnotagihan/'.$kode_tag));
        return $result;
    }

    public function getAllHariLibur()
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getallharilibur'),true);
        return $result;
    }

    public function getJadwalDokter($tgl_periksa)
    {
        $result=json_decode($this->curl->simple_get($this->API.'/getjadwaldokter/'.$tgl_periksa));
        return $result;
    }

    

}