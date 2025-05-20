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
	
}