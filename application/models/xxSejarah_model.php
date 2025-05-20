<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah_model extends CI_Model
{
	// ImageSlider
	//public function getImageSlider()
    //{
    //    $query = "SELECT * FROM slider WHERE is_delete=0";
    //    return $this->db->query($query)->result_array();
    //}
	
	// Profil/Umum
    //public function getProfil()
    //{
    //    $query = $this->db->get_where('profil', ['id' => 1]);
    //    return $query->row_array();
    //}
	
	// Sejarah
    public function getSejarah()
    {
        $query = $this->db->get_where('sejarah', ['id' => 1]);
        return $query->row_array();
		
    }
}
