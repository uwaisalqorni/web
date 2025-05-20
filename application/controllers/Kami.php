<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kami extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
		$data['title'] = 'Sejarah';
		$data['sejarah'] = $this->menu->getSejarah();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/sejarah', $data);
        $this->load->view('frontend/footer');
	}
	public function sejarah()
	{
		$data['title'] = 'Sejarah';
		$data['sejarah'] = $this->menu->getSejarah();
        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/sejarah', $data);
        $this->load->view('frontend/footer');
	}
	public function visimisi()
	{
        $data['title'] = 'Visi Misi';
		$data['visimisi'] = $this->menu->getVisiMisi();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/visimisi', $data);
        $this->load->view('frontend/footer');
	}
	public function direksi()
	{
        $data['title'] = 'Direksi';
		$data['direksi'] = $this->menu->Direksi();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/direksi', $data);
        $this->load->view('frontend/footer');
	}
	public function kontak()
	{
        $data['title'] = 'Kontak Kami';
		$data['kontak'] = $this->menu->getProfil();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/kontak', $data);
        $this->load->view('frontend/footer');
	}



}
