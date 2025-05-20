<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Manage_model', 'manage');
    }


    //---------> MANAGE USER 
    public function user()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->user->getUserData();
        $data['all_user'] = $this->user->getUserDataAll();

        if ($this->input->post('keyword')) {
            $data['all_user']  = $this->manage->searchUserData();
        }
        $this->load->view('Myadmin/templates/header', $data);
        $this->load->view('Myadmin/templates/sidebar', $data);
        $this->load->view('Myadmin/templates/topbar', $data);
        $this->load->view('Myadmin/manage/user', $data);
        $this->load->view('Myadmin/templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->user->getUserData();

        $data['role'] = $this->manage->getUserRoleAll();
		$data['section'] = $this->menu->getUserMenuAll();

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Myadmin/templates/header', $data);
            $this->load->view('Myadmin/templates/sidebar', $data);
            $this->load->view('Myadmin/templates/topbar', $data);
            $this->load->view('Myadmin/manage/role', $data);
            $this->load->view('Myadmin/templates/footer', $data);
        } else {
            $role_name = $this->input->post('role');
            $data = [
                'role' => $role_name
            ];
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);

            if ($user_role->num_rows() < 1) {
                $this->db->insert('user_role', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Added!</div>');
                redirect('myadmin/manage/role');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role is exist!</div>');
                redirect('myadmin/manage/role');
            }
        }
    }

    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->manage->getUserRoleById($role_id);;
        $data['section'] = $this->menu->getUserMenuAll();

        $this->load->view('Myadmin/templates/header', $data);
        $this->load->view('Myadmin/templates/sidebar', $data);
        $this->load->view('Myadmin/templates/topbar', $data);
        $this->load->view('Myadmin/manage/role-access', $data);
        $this->load->view('Myadmin/templates/footer', $data);
    }
    public function roleaccess0($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->manage->getUserRoleById($role_id);;
        $data['section'] = $this->menu->getUserMenuAll();

        //$this->load->view('Myadmin/templates/header', $data);
        //$this->load->view('Myadmin/templates/sidebar', $data);
        //$this->load->view('Myadmin/templates/topbar', $data);
        //$this->load->view('Myadmin/manage/role-access', $data);
        //$this->load->view('Myadmin/templates/footer', $data);
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
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Access Changed! </div>');
    }

    public function editrole($role_id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->user->getUserData();
        $data['role'] = $this->manage->getUserRoleById($role_id);;

        $this->form_validation->set_rules('role', 'Role Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Myadmin/templates/header', $data);
            $this->load->view('Myadmin/templates/sidebar', $data);
            $this->load->view('Myadmin/templates/topbar', $data);
            $this->load->view('Myadmin/manage/edit-role', $data);
            $this->load->view('Myadmin/templates/footer');
        } else {
            $role_name = $this->input->post('role');
            $user_role = $this->db->get_where('user_role', ['role' => $role_name]);
            if ($user_role->num_rows() < 1) {
                $this->db->set('role', $role_name);
                $this->db->where('id', $role_id);
                $this->db->update('user_role');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Role Success!</div>');
                redirect('myadmin/manage/role/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This role name is exist or same!</div>');
                redirect('myadmin/manage/editrole/' . $role_id);
            }
        }
    }

    public function deleterole($role_id)
    {
        $role = $this->manage->getUserRoleById($role_id);

        $this->db->delete('user_role', ['id' => $role_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $role['role'] . ' role is deleted!</div>');
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
            $this->load->view('Myadmin/templates/header', $data);
            $this->load->view('Myadmin/templates/sidebar', $data);
            $this->load->view('Myadmin/templates/topbar', $data);
            $this->load->view('Myadmin/menu/section', $data);
            $this->load->view('Myadmin/templates/footer', $data);
        } else {
            $this->db->insert('user_section', ['section' => $this->input->post('section')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New section added!</div>');
            redirect('myadmin/manage/section');
        }
    }
	
	public function editsection($section_id)
    {
        $data['title'] = 'Edit Section';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['section'] = $this->db->get_where('user_section', ['id' => $section_id])->row_array();

        $this->form_validation->set_rules('section', 'Menu Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Myadmin/templates/header', $data);
            $this->load->view('Myadmin/templates/sidebar', $data);
            $this->load->view('Myadmin/templates/topbar', $data);
            $this->load->view('Myadmin/menu/edit-section', $data);
            $this->load->view('Myadmin/templates/footer');
        } else {
            $section_name = $this->input->post('section');
            $getMenu = $this->db->get_where('user_section', ['section' => $section_name]);

            if ($getMenu->num_rows() < 1) {
                $this->db->set('section', $section_name);
                $this->db->where('id', $section_id);
                $this->db->update('user_section');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Menu Success!</div>');
                redirect('myadmin/manage/section');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Menu name is exist or same!</div>');
                redirect('myadmin/manage/editsection/' . $section_id);
            }
        }
    }

    public function deletesection($section_id)
    {
        $menu = $this->db->get_where('user_section', ['id' => $section_id])->row_array();

        $this->db->delete('user_section', ['id' => $section_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $section['section'] . ' section is deleted!</div>');
        redirect('myadmin/manage/section');
    }


    public function menu()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // model
        $this->load->model('Menu_model', 'menu');
        $data['Menu'] = $this->menu->getMenu();
        $data['section'] = $this->db->get('user_section')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('section_id', 'Section', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Myadmin/templates/header', $data);
            $this->load->view('Myadmin/templates/sidebar', $data);
            $this->load->view('Myadmin/templates/topbar', $data);
            $this->load->view('Myadmin/menu/menu', $data);
            $this->load->view('Myadmin/templates/footer', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'section_id' => $this->input->post('section_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu added!</div>');
            redirect('myadmin/manage/menu');
        }
    }

    

    public function editmenu($menu_id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['section'] = $this->db->get('user_section')->result_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('section_id', 'Section', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Myadmin/templates/header', $data);
            $this->load->view('Myadmin/templates/sidebar', $data);
            $this->load->view('Myadmin/templates/topbar', $data);
            $this->load->view('Myadmin/menu/edit-menu', $data);
            $this->load->view('Myadmin/templates/footer', $data);
        } else {
            $menu_name = $this->input->post('title');
			$is_active = $this->input->post('is_active');
			//if( $is_active= NULL ) {
			//	$is_active="Yes"; 
			//}else {
			//	$is_active="No"; 
			//}
			echo $is_active; 


            //$data_menu = [
            //    'title' => $menu_name,
            //    'section_id' => $this->input->post('section_id'),
            //    'url' => $this->input->post('url'),
            //    'icon' => $this->input->post('icon'),
            //    'is_active' => $is_active

            //];
            //$this->db->set($data_menu);
            //$this->db->where('id', $menu_id);
            //$this->db->update('user_menu');
            //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Menu Success!</div>');
            //redirect('myadmin/manage/menu');
        }
    }
    public function deletemenu($menu_id)
    {
        $menu = $this->db->get_where('user_menu', ['id' => $menu_id])->row_array();

        $this->db->delete('user_menu', ['id' => $menu_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $menu['menu'] . ' Menu is deleted!</div>');
        redirect('myadmin/manage/menu');
    }

    public function deletesubmenu0($submenu_id)
    {
        $submenu = $this->db->get_where('user_sub_menu', ['id' => $submenu_id])->row_array();

        $this->db->delete('user_sub_menu', ['id' => $submenu_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $submenu['menu'] . ' menu is deleted!</div>');
        redirect('myadmin/manage/submenu');
    }
}
