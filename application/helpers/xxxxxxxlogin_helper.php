<?php
function is_logged_in()
{
    $CI = get_instance();
    if (!$CI->session->userdata('email')) {
        redirect('');
    } else {
        $role_id = $CI->session->userdata('role_id');
        $section = $CI->uri->segment(2);
        $querySection = $CI->db->get_where('user_section', ['section' => $section])->row_array();
        $section_id = $querySection['id'];

        $userAccess = $CI->db->get_where('user_access_section', ['role_id' => $role_id, 'section_id' => $section_id]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $section_id)
{
    $CI = get_instance();
    $CI->db->where('role_id', $role_id);
    $CI->db->where('section_id', $section_id);
    $result = $CI->db->get('user_access_section');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function active_check1($is_active, $id)
{
    $CI = get_instance();
    $CI->db->where('is_active', $is_active);
    $CI->db->where('id', $id);
    $result = $CI->db->get('user_menu');
    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function active_check($is_active)
{
    if ($is_active== 1) {
        return "checked='checked'";
    }
}

function active_check0($id)
{
    $CI = get_instance();
    $querySection = $CI->db->get_where('user_section', ['id' => $id])->row_array();
    $section_id = $querySection['is_active'];
    if ($section_id== 1) {
        return "checked='checked'";
    }
}
function active_check_YN($id)
{
    $CI = get_instance();
    $querySection = $CI->db->get_where('user_section', ['id' => $id])->row_array();
    $section_id = $querySection['is_active'];
    if ($section_id== 1) {
        return "Yes";
    }else{
		return "No";
	}
}
