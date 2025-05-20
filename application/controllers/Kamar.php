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
        $data['title'] = 'Kamar';
		$data['poliklinik'] = $this->menu->Datakamar();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/datakamar', $data);
        $this->load->view('frontend/footer');
	}	
	public function dokter($id)
	{
        $id = encode_php_tags($id);
		$data['title'] = 'Kamar';
		$data['datakamar_id'] = $id;
		$data['kamar'] = $this->menu->Datakamar_Kamar($id);
		$result = $this->db->select('nama')->from('datakamar')->where('id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/kamar', $data);
        $this->load->view('frontend/footer');
	}
}
