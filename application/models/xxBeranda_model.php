<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{
    // Slider
    public function getSliderAll()
    {
		$this->db->order_by('urut', 'ASC');
		$query = $this->db->get_where('imageslider', ['is_delete' => 0]);
        return $query->result_array();
    }
	// Profil/Umum
    public function getProfil()
    {
		$query = $this->db->get_where('profil', ['id' => 1]);
        return $query->row_array();
    }
	
   
}
