<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Foto extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
        $data['title'] = 'Foto';
		$data['kategori'] = $this->menu->Foto_Kategori();
		$data['foto'] = $this->menu->Foto();

		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/foto', $data);
        $this->load->view('frontend/footer');
	}

	
}