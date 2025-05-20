<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Manage_model', 'manage');
		$this->load->model('Dashboard_model', 'dashboard');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();
        $data['profil'] = $this->dashboard->getProfil();

        //if ($this->input->post('keyword')) {
        //   $data['all_user']  = $this->manage->searchUserData();
        //}
        $this->load->view('myadmin/templates/header', $data);
        $this->load->view('myadmin/templates/sidebar', $data);
        $this->load->view('myadmin/templates/topbar', $data);
        $this->load->view('myadmin/dashboard/index', $data);
        $this->load->view('myadmin/templates/footer');
    }

    
}
