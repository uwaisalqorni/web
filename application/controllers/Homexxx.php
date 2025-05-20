<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // load view admin/home.php
        $this->load->view('frontend/header');
        $this->load->view('frontend/home');
        $this->load->view('frontend/footer');
	}
	public function detail()
	{
        // load view admin/home.php
        $this->load->view('frontend/header');
        $this->load->view('frontend/portofolio-detail');
        $this->load->view('frontend/footer');
	}
	public function beranda()
	{
        // load view admin/home.php
        $this->load->view('frontend/header');
        $this->load->view('frontend/beranda');
        $this->load->view('frontend/footer');
	}

}