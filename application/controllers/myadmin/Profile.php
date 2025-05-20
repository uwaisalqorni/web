<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        //$this->load->model('Menu_model', 'menu');
        $this->load->model('Manage_model', 'manage');
    }
    public function index()
    {
        $data['title'] = 'MyProfile';
		$data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        // model
        $data['user'] = $this->user->getUserData();
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/profile/index', $data);
		$this->load->view('myadmin/templates/footer', $data);
        
    }
	

    public function edit()
    {

        $data['title'] = 'MyProfile';
        // model
        $data['user'] = $this->user->getUserData();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/profile/edit', $data);
            $this->load->view('myadmin/templates/footer');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            // cek jika gambar diubah
            $upload_img = $_FILES['image']['name'];

            if ($upload_img) {
                $config['upload_path'] = './assets/img/user/';
				$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
				$config['max_size'] = '500'; // maksimal ukuran file 500kb
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_img = $data['user']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/user/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image', $new_img);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set([
                'name' => $name,
                'username' => $username
            ]);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button></div>');
            redirect('myadmin/profile');
        }
    }

    public function changepass()
    {
        $data['title'] = 'MyProfile';
        // model
        $data['user'] = $this->user->getUserData();

        $this->form_validation->set_rules('current_pass', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_pass1', 'New Password', 'trim|required|min_length[5]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Confirm New Password', 'trim|required|min_length[5]|matches[new_pass1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/profile/changepass', $data);
            $this->load->view('myadmin/templates/footer');
        } else {
            $currenPass = $this->input->post('current_pass');
            $newPass = $this->input->post('new_pass1');
            $userPass = $data['user'];

            if (!password_verify($currenPass, $userPass['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
                redirect('myadmin/profile/changepass');
            } else {
                if ($currenPass == $newPass) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password should not be same as current password!</div>');
                    redirect('myadmin/profile/changepass');
                } else {
                    // password ok
                    $passwordHash = password_hash($newPass, PASSWORD_DEFAULT);

                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button></div>');
                    redirect('myadmin/profile');
                }
            }
        }
    }
}
