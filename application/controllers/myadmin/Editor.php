<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        //$this->load->model('Menu_model', 'menu');
        $this->load->model('Manage_model', 'manage');
        $this->load->model('Sejarah_model', 'sejarah');
		//$this->load->library('upload');
    }
	public function index()
    {
        $data['title'] = 'Editor';
        // model
        $data['user'] = $this->user->getUserData();
        //$this->load->view('myadmin/editor/editor', $data);
		
		$this->load->view('myadmin/templates/header', $data);
        $this->load->view('myadmin/templates/sidebar', $data);
        $this->load->view('myadmin/templates/topbar', $data);
        $this->load->view('myadmin/editor/index', $data);
        $this->load->view('myadmin/templates/footer');
		
    }
	
	public function edit0()
    {

        $data['title'] = 'Edit Sejarah';
        // model
		
        $data['sejarah'] = $this->sejarah->getSejarah();

        $this->form_validation->set_rules('subjudul', 'Subjudul', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == false) {
			$this->load->view('myadmin/templates/header', $data);
        $this->load->view('myadmin/templates/sidebar', $data);
        $this->load->view('myadmin/templates/topbar', $data);
        $this->load->view('myadmin/editor/edit', $data);
        $this->load->view('myadmin/templates/footer');
		
        } else {
            $subjudul = $this->input->post('subjudul');
            $deskripsi = $this->input->post('deskripsi');

			// cek jika gambar diubah
            $upload_img = $_FILES['image']['name'];

            if ($upload_img) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_img = $data['sejarah']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_img);
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image', $new_img);
                } else {
                    echo $this->upload->display_errors();
                }
            }
			
            $this->db->set([
                'subjudul' => $subjudul,
                'deskripsi' => $deskripsi
            ]);
            $this->db->where('id', 1);
            $this->db->update('sejarah');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('myadmin/editor/edit');
        }
    }
	
	public function edit()
    {

        $data['title'] = 'Edit Sejarah';
        // model
		$data['user'] = $this->user->getUserData();
        $data['sejarah'] = $this->sejarah->getSejarah();

        $this->form_validation->set_rules('subjudul', 'Subjudul', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/editor/edit', $data);
            $this->load->view('myadmin/templates/footer');
        } else {
            $subjudul = $this->input->post('subjudul');
            $deskripsi = $this->input->post('deskripsi');
			
			$config['upload_path'] = './assets/img/sejarah/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['sejarah']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/sejarah/' . $old_img);
                    }
					
					$this->db->set([
						'subjudul' => $subjudul,
						'deskripsi' => $deskripsi,
						'image' => $gambar
					]);
					$this->db->where('id', 1);
					$this->db->update('sejarah');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
					redirect('myadmin/editor');
			
				}else{
						echo $this->upload->display_errors();
				}
						 
			}else{
				$this->db->set([
					'subjudul' => $subjudul,
					'deskripsi' => $deskripsi
				]);
				$this->db->where('id', 1);
				$this->db->update('sejarah');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
				redirect('myadmin/editor');
			}
		

            
        }
    }
	
	public function page()
    {
        $data['menu'] = 'Edit';
		$data['title'] = 'Edit2';
        // model
        $data['user'] = $this->user->getUserData();
        //$this->load->view('myadmin/editor/editor', $data);
		
		$this->load->view('myadmin/templates/header', $data);
        $this->load->view('myadmin/templates/sidebar', $data);
        $this->load->view('myadmin/templates/topbar', $data);
        $this->load->view('myadmin/editor/page', $data);
        $this->load->view('myadmin/templates/footer');
		
    }
	
	
	
	
}
