<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mutu extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
        $data['title'] = 'Mutu';
		$data['indikatormutu'] = $this->menu->IndikatorMutu();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/indikatormutu', $data);
        $this->load->view('frontend/footer');
	}
	
	public function tahun($tahun)
    {
		$tahun = encode_php_tags($tahun);
		//$tahun = 2018;
        $data['title'] = 'Indikator Mutu';
		$data['tahun'] = $tahun;
        $data['indikatormutu_tahun'] = $this->menu->Indikatormutu_Tahun($tahun);
		
		$result = $this->db->select('tahun')->from('indikatormutu')->where('tahun', $tahun)->limit(1)->get()->row();
		$data['tahun'] = $result->tahun;
		
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/indikatormututahun', $data);
        $this->load->view('frontend/footer');
	}
	
	public function detail($id)
    {
		$id = encode_php_tags($id);
        $data['title'] = 'Indikator Mutu';
		$data['id'] = $id;
        $data['indikatormutu_detail'] = $this->menu->Indikatormutu_Detail($id);
		
		$result = $this->db->select('nama')->from('indikatormutu_detail')->where('indikatormutu_id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/indikatormutudetail', $data);
        $this->load->view('frontend/footer');
	}
	
}