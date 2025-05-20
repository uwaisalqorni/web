<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_model extends CI_Model
{
    public function getUserRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }
	
	public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
	
    public function getUserRoleAll()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function searchUserData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }
	// MENU
	    public function getMenu()
    {
        $query = "SELECT user_menu.*, user_section.section FROM user_menu JOIN user_section ON user_menu.section_id = user_section.id";
        return $this->db->query($query)->result_array();
    }
	// MENU
	    public function getSubmenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.title as menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";
        return $this->db->query($query)->result_array();
    }
	

    public function showSection($role_id)
    {
        $queryMenu = "SELECT user_section.id, section FROM user_section JOIN user_access_section ON user_section.id = user_access_section.section_id WHERE user_section.is_active=1 AND user_access_section.role_id =  $role_id ORDER BY user_section.urut, user_access_section.section_id ASC";
        return $this->db->query($queryMenu)->result_array();
    }

    public function showMenu($sectionId)
    {
        $queryMenu = "SELECT * FROM user_menu  WHERE section_id = $sectionId AND is_active = 1 ORDER by user_menu.urut ASC";
        return $this->db->query($queryMenu)->result_array();
    }
	
	 public function showSubMenu($SubmenuId)
    {
        $querySubMenu = "SELECT * FROM user_sub_menu  WHERE menu_id = $SubmenuId AND is_active = 1 ORDER by user_sub_menu.urut ASC";
        return $this->db->query($querySubMenu)->result_array();
    }
	
    // User Menu
    public function getUserMenuAll()
    {
        $queryUserMenuAll = "SELECT * FROM user_section  WHERE id > 1 AND is_active=1";
        return $this->db->query($queryUserMenuAll)->result_array();
    }
}
