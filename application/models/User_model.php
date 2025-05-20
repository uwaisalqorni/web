<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Users Data
    public function getUserData()
    {
        //$query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        //return $query->row_array();
		$id=$this->session->userdata('id');
		$query = "SELECT user.*, user_role.role FROM user LEFT JOIN user_role ON user.role_id = user_role.id WHERE user.id='$id'";
        return $this->db->query($query)->row_array();
		
    }
    public function getUserDataAll()
    {
        //$query = $this->db->get('user');
        //return $query->result_array();
		$query = "SELECT user.*, user_role.role FROM user LEFT JOIN user_role ON user.role_id = user_role.id";
        return $this->db->query($query)->result_array();
    }

    // Login
    public function userCheckLogin($username)
    {
        $this->db->where("username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
