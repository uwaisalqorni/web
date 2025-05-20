<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Layanan extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}
	
	public function index()
	{
		$data['title'] = 'Layanan';
		$data['layanan'] = $this->menu->Layanan();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/layanan', $data);
        $this->load->view('frontend/footer');
	}
	public function pelayanan()
	{
        $data['title'] = 'Layanan';
		$data['pelayanan1'] = $this->menu->Layanan_Detail_Jenis(1,1);
		$data['pelayanan2'] = $this->menu->Layanan_Detail_Jenis(1,2);
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/pelayanan', $data);
        $this->load->view('frontend/footer');
	}
	public function instalasi()
	{
        $data['title'] = 'Layanan';
		$data['instalasi'] = $this->menu->Layanan_Detail_Jenis(2,1);
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/instalasi', $data);
        $this->load->view('frontend/footer');
	}
	public function fasum()
	{
        $data['title'] = 'Layanan';
		$data['fasum'] = $this->menu->Layanan_Detail_Jenis(3,1);
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/fasum', $data);
        $this->load->view('frontend/footer');
	}
}