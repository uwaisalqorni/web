<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Foto2 extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
        $data['title'] = 'Foto2';
		//$data['kategori'] = $this->menu->Foto_Kategori();
		$data['foto2'] = $this->menu->Foto2();

		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/foto2', $data);
        $this->load->view('frontend/footer');
	}

	
}
