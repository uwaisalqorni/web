<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('myadmin/dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/auth_header');
            $this->load->view('myadmin/auth/login');
            $this->load->view('myadmin/templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // model
        $this->load->model('User_model', 'user');
        $user = $this->user->userCheckLogin($username);

        if ($user != null) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
						'id' => $user['id'],
                        'email' => $user['email'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
					redirect('myadmin/dashboard');
                    //if ($user['role_id'] == 1) {
                    //    redirect('myadmin/admin');
                    //} else {
                    //    redirect('myadmin/dashboard');
                    //}
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This account has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
		$id=$this->session->userdata('id');
		$this->db->set('last_login', 'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('user');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('myadmin/auth/blocked');
    }
	
	
	
	
	
	
	
    public function registration0000()
    {
        if ($this->session->userdata('username')) {
            redirect('myadmin/profile');
        }
        // rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already exists'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[15]|is_unique[user.username]', [
            'is_unique' => 'This username is already exists'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration Page';
            $this->load->view('myadmin/templates/auth_header', $data);
            $this->load->view('myadmin/auth/registration');
            $this->load->view('myadmin/templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $username = $this->input->post('username', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'username' => htmlspecialchars($username),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! your account has been created. Please activate your account.</div>');
            redirect('auth');
        }
    }


    public function changePassword0000()
    {
        if (!$this->session->userdata('reset-email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('myadmin/templates/auth_header', $data);
            $this->load->view('myadmin/auth/change-pass');
            $this->load->view('myadmin/templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login. </div>');
            redirect('auth');
        }
    }
}
