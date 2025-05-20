<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        //$this->load->model('Menu_model', 'menu');
        $this->load->model('Manage_model', 'manage');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->user->getUserData();

        $data['role'] = $this->manage->getUserRoleAll();
		$data['section'] = $this->manage->getUserMenuAll();

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/manage/role', $data);
            $this->load->view('myadmin/templates/footer', $data);
        } else {
            $role_name = $this->input->post('role');
            $data = [
                'role' => $role_name
            ];
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);

            if ($user_role->num_rows() < 1) {
                $this->db->insert('user_role', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Added!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('myadmin/manage/role');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role is exist!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('myadmin/manage/role');
            }
        }
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->manage->getUserRoleById($role_id);;
        $data['section'] = $this->manage->getUserMenuAll();

        $this->load->view('myadmin/templates/header', $data);
        $this->load->view('myadmin/templates/sidebar', $data);
        $this->load->view('myadmin/templates/topbar', $data);
        $this->load->view('myadmin/manage/role-access', $data);
        $this->load->view('myadmin/templates/footer', $data);
    }

    public function changeaccess()
    {
        $section_id = $this->input->post('sectionId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'section_id' => $section_id
        ];
        $result = $this->db->get_where('user_access_section', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_section', $data);
        } else {
            $this->db->delete('user_access_section', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed! 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

	function editrole($role_id){
		$role_name = $this->input->post('role');
		$this->db->set('role', $role_name);
        $this->db->where('id', $role_id);
        $this->db->update('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Role Success!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('myadmin/manage/role/');
    }

    public function deleterole($role_id)
    {
        $role = $this->manage->getUserRoleById($role_id);

        $this->db->delete('user_role', ['id' => $role_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">' . $role['role'] . ' role is deleted!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('myadmin/manage/role');
    }


    //---------> MANAGE MENU 
    public function section()
    {
        $data['title'] = 'Section Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['section'] = $this->db->get('user_section')->result_array();

        $this->form_validation->set_rules('section', 'Section', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/manage/section', $data);
            $this->load->view('myadmin/templates/footer', $data);
        } else {
            
            $data = [
                'section' => htmlspecialchars($this->input->post('section', true)),
                'urut' => htmlspecialchars($this->input->post('urut', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true))
            ];
            $this->db->insert('user_section', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New section added!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('myadmin/manage/section');
        }
    }
	
	function editsection($id){
		$this->db->set('section', $this->input->post('section'));
		$this->db->set('urut', $this->input->post('urut'));
		$this->db->set('is_active', $this->input->post('is_active'));
        $this->db->where('id', $id);
        $this->db->update('user_section');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Section Success!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('myadmin/manage/section/');
    }
	
    public function deletesection($id)
    {
        $section = $this->db->get_where('user_section', ['id' => $id])->row_array();

        $this->db->delete('user_section', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">' . $section['section'] . ' section is deleted!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('myadmin/manage/section');
    }

    public function menu()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // model
        $this->load->model('Manage_model', 'manage');
        $data['Menu'] = $this->manage->getMenu();
        $data['section'] = $this->db->get_where('user_section', array('is_active' => 1))->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/manage/menu', $data);
            $this->load->view('myadmin/templates/footer', $data);
        } else {
            $data = [
                'section_id' =>  htmlspecialchars($this->input->post('section_id', true)),
				'title' => htmlspecialchars($this->input->post('title', true)),
                'url' =>  htmlspecialchars($this->input->post('url', true)),
                'icon' =>  htmlspecialchars($this->input->post('icon', true)),
				'urut' => htmlspecialchars($this->input->post('urut', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true))
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu added!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('myadmin/manage/menu');
        }
    }
	
    public function editmenu($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['section'] = $this->db->get_where('user_section', array('is_active' => 1))->result_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array();

            $data_menu = [
                'section_id' => $this->input->post('section_id'),
				'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'urut' => $this->input->post('urut'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->set($data_menu);
            $this->db->where('id', $id);
            $this->db->update('user_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Menu Success!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('myadmin/manage/menu');
    }
	
    public function deletemenu($id)
    {
        $menu = $this->db->get_where('user_menu', ['id' => $id])->row_array();

        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"><strong>' . $menu['title'] . '</strong> Menu is deleted! 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('myadmin/manage/menu');
    }
	
	
	public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // model
        $this->load->model('Manage_model', 'manage');
        $data['Submenu'] = $this->manage->getsubmenu();
        $data['menu'] = $this->db->get_where('user_menu', array('url'=>'#','is_active' => 1))->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/manage/submenu', $data);
            $this->load->view('myadmin/templates/footer', $data);
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title', true)),
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
				'urut' => htmlspecialchars($this->input->post('urut', true)),
                'is_active' => htmlspecialchars($this->input->post('is_active', true))
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu added!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('myadmin/manage/submenu');
        }
    }
	public function editsubmenu($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', array('is_active' => 1))->result_array();
        $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $submenu_id])->row_array();
		
            $data_submenu = [
                'menu_id' => $this->input->post('menu_id'),
				'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'urut' => $this->input->post('urut'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->set($data_submenu);
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Submenu Success!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('myadmin/manage/submenu');
        
    }
	
    public function deletesubmenu($id)
    {
        $submenu = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"><strong>' . $submenu['title'] . '</strong> Submenu is deleted!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('myadmin/manage/submenu');
    }

	//---------> MANAGE USER 
    public function user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();
		$data['user_role'] = $this->db->get('user_role')->result_array();
        //if ($this->input->post('keyword')) {
        //    $data['all_user']  = $this->manage->searchUserData();
        //}
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email is already exists'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[15]|is_unique[user.username]', [
            'is_unique' => 'This username is already exists'
        ]);
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[3]|matches[password1]');
		

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/manage/user', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			$email = $this->input->post('email', true);
            $username = $this->input->post('username', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'username' => htmlspecialchars($username),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! New account has been created.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('myadmin/manage/user');
        }	
    }
	
	public function edituser($id)
    {
		$data['title'] = 'User Management';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();
		$data['user_role'] = $this->db->get('user_role')->result_array();
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('role_id', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/manage/user', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			//$id = $this->input->post('id');
			$name = $this->input->post('name');
			$role_id = $this->input->post('role_id');
            
			$this->db->set([
                'name' => $name,
                'role_id' => $role_id,
				'date_updated' => date('Y-m-d H:i:s')
            ]);
            $this->db->where('id', $id);
            $this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit User Success!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('myadmin/manage/user/');
        }	
    }
	
	public function changepassuser($id)
    {
		$data['title'] = 'User Management';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();
		$data['user_role'] = $this->db->get('user_role')->result_array();
		
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[3]');
        //$this->form_validation->set_rules('new_pass2', 'Confirm New Password', 'trim|required|min_length[3]|matches[new_pass1]');
		

			

		
		if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/manage/user', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			//$id = $this->input->post('id');
			$new_pass = $this->input->post('new_pass');
			//$new_pass2 = $this->input->post('new_pass2');
            
			// password ok
			$passwordHash = password_hash($new_pass, PASSWORD_DEFAULT);

			$this->db->set([
                'password' => $passwordHash,
				'date_updated' => date('Y-m-d H:i:s')
            ]);
			//$this->db->set('password', $passwordHash);
			$this->db->where('id', $id);
            $this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('myadmin/manage/user/');
        }	
    }
	
	public function deleteuser($id)
    {
		$user = $this->manage->getUserById($id);
		$this->db->set('is_delete', 1);
		$this->db->where('id', $id);
		$this->db->update('user');
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">' . $user['username'] . ' is deleted!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('myadmin/manage/user/');
    }
	
}
