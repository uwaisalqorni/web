<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Klinik extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
        $data['title'] = 'Dokter';
		$data['poliklinik'] = $this->menu->Poliklinik();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/poliklinik', $data);
        $this->load->view('frontend/footer');
	}	
	public function dokter($id)
	{
        $id = encode_php_tags($id);
		$data['title'] = 'Dokter';
		$data['poliklinik_id'] = $id;
		$data['dokter'] = $this->menu->Poliklinik_Dokter($id);
		$result = $this->db->select('nama')->from('poliklinik')->where('id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/dokter', $data);
        $this->load->view('frontend/footer');
	}
}
