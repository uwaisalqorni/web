<?php
function is_logged_in()
{
    $CI = get_instance();
    if (!$CI->session->userdata('username')) {
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

function set_message($message, $tipe = true)
{
    $CI = get_instance();
    if ($tipe) {
        $CI->session->set_flashdata('message', "<div class='alert alert-success'><strong>SUCCESS!</strong> {$message} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    } else {
        $CI->session->set_flashdata('message', "<div class='alert alert-info'><strong>INFO!</strong> {$message} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
    }
}

function set_message_err($message)
{
    $CI = get_instance();
    $CI->session->set_flashdata('pesan', "<div class='alert alert-danger'><strong>ERROR!</strong> {$message} <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
}

function active2_check($is_active)
{
    if ($is_active== 1) {
        return "checked='checked'";
    }
}

function active_section0($id)
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



function active_check0($id)
{
    $CI = get_instance();
    $querySection = $CI->db->get_where('user_section', ['id' => $id])->row_array();
    $section_id = $querySection['is_active'];
    if ($section_id== 1) {
        return "checked='checked'";
    }
}

function urut_hari($hari)
{
    $CI = get_instance();
    if ($hari=="Senin") {
        return 1;
    } elseif ($hari=="Selasa") {
        return 2;
    } elseif ($hari=="Rabu") {
        return 3;
	} elseif ($hari=="Kamis") {
        return 4;
	} elseif ($hari=="Jumat") {
        return 5;
	} elseif ($hari=="Sabtu") {
        return 6;
	} else {
        return 7;
	}
}

