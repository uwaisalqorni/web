<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['imageslider'] = $this->menu->ImageSlider();
		$data['profil'] = $this->menu->getProfil();
		$data['layanan'] = $this->menu->Layanan();
		$data['poliklinik'] = $this->menu->Poliklinik();
		$data['testimoni'] = $this->menu->Testimoni();
		$data['rekanan'] = $this->menu->Rekanan();
		
		setlocale(LC_ALL, 'id-ID', 'id_ID');
		//echo strftime("%A, %d %B %Y");
		$hari=strftime("%A");
		$data['dokterhariini'] = $this->menu->Dokter_Hari_Ini($hari);
        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/beranda', $data);
        $this->load->view('frontend/footer');
	}
	public function beranda()
	{
        $data['title'] = 'Beranda';
		$data['imageslider'] = $this->menu->ImageSlider();
		$data['profil'] = $this->menu->getProfil();
		$data['layanan'] = $this->menu->Layanan();
		$data['poliklinik'] = $this->menu->Poliklinik();
		$data['testimoni'] = $this->menu->Testimoni();
		$data['rekanan'] = $this->menu->Rekanan();
		
		setlocale(LC_ALL, 'id-ID', 'id_ID');
		//echo strftime("%A, %d %B %Y");
		$hari=strftime("%A");
		$data['dokterhariini'] = $this->menu->Dokter_Hari_Ini($hari);
        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/beranda', $data);
        $this->load->view('frontend/footer');
	}
	public function detail()
	{
        // load view admin/home.php
        $this->load->view('frontend/header');
        $this->load->view('frontend/portofolio-detail');
        $this->load->view('frontend/footer');
	}
	

}