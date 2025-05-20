<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Video extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
	}
	
	public function index()
	{
		$data['title'] = 'Video';
		$data['video'] = $this->menu->Video();
		$this->load->view('frontend/header', $data);
        $this->load->view('frontend/video', $data);
        $this->load->view('frontend/footer');
	}
	
}