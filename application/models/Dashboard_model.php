<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    // Sejarah
    public function getProfil()
    {
        $query = $this->db->get_where('profil', ['id' => 1]);
        return $query->row_array();
    }
   
}
