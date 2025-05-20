<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Manage_model', 'manage');
    }

//---------> MENU IMAGE SLIDER 
	private function _validasi_imageslider()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('urut', 'Urut', 'required');
    }
    public function imageslider()
    {
        $data['title'] = 'Image Slider';
        $data['imageslider'] = $this->menu->ImageSlider();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/imageslider', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function imageslider_add()
    {
		$this->_validasi_imageslider();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Image Slider';
			$data['imageslider'] = $this->menu->ImageSlider();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/imageslider_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/imageslider/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['max_height'] = '700'; // maksimal tinggi gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'nama' => $nama,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_created' => $now
					];
					$this->db->insert('imageslider', $data);
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/imageslider');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/imageslider');
			} 
        }
	}
	public function imageslider_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_imageslider();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Image Slider';
			$data['imageslider'] = $this->menu->getImageSlider($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/imageslider_edit', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
			$data['imageslider'] = $this->menu->getImageSlider($id);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/imageslider/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['max_height'] = '700'; // maksimal tinggi gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['imageslider']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/imageslider/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('imageslider');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/imageslider');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
					'urut' => $urut,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('imageslider');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/imageslider');
			} 
        }
	}
	public function imageslider_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('imageslider');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/imageslider');
    }

//---------> MENU UMUM
	public function umum()
    {
        $data['title'] = 'Umum';
        // model
		$data['user'] = $this->user->getUserData();
        $data['profil'] = $this->menu->getProfil();

        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/menu/umum', $data);
            $this->load->view('myadmin/templates/footer');
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$detail = htmlspecialchars($this->input->post('detail', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$alamat = htmlspecialchars($this->input->post('alamat', true));
			$telp = htmlspecialchars($this->input->post('telp', true));
			$email = htmlspecialchars($this->input->post('email', true));
			$wa = htmlspecialchars($this->input->post('wa', true));
			$fb = htmlspecialchars($this->input->post('fb', true));
			$ig = htmlspecialchars($this->input->post('ig', true));
			$tw = htmlspecialchars($this->input->post('tw', true));
			$jmldokter = htmlspecialchars($this->input->post('jmldokter', true));
			$jmlperawat = htmlspecialchars($this->input->post('jmlperawat', true));
			$jmlkaryawan = htmlspecialchars($this->input->post('jmlkaryawan', true));
			$jmlpasien = htmlspecialchars($this->input->post('jmlpasien', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/umum/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['profil']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/umum/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'detail' => $detail,
						'deskripsi' => $deskripsi,
						'alamat' => $alamat,
						'telp' => $telp,
						'email' => $email,
						'wa' => $wa,
						'fb' => $fb,
						'ig' => $ig,
						'tw' => $tw,
						'image' => $gambar,
						'jmldokter' => $jmldokter,
						'jmlperawat' => $jmlperawat,
						'jmlkaryawan' => $jmlkaryawan,
						'jmlpasien' => $jmlpasien,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', 1);
					$this->db->update('profil');
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/umum');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
						'detail' => $detail,
						'deskripsi' => $deskripsi,
						'alamat' => $alamat,
						'telp' => $telp,
						'email' => $email,
						'wa' => $wa,
						'fb' => $fb,
						'ig' => $ig,
						'tw' => $tw,
						'jmldokter' => $jmldokter,
						'jmlperawat' => $jmlperawat,
						'jmlkaryawan' => $jmlkaryawan,
						'jmlpasien' => $jmlpasien,
						'user' => $user,
						'date_update' => $now
				]);
				$this->db->where('id', 1);
				$this->db->update('profil');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/umum');
			}    
        }
    }
	
//---------> MENU SEJARAH
	public function sejarah()
    {
        $data['title'] = 'Sejarah';
        // model
		$data['user'] = $this->user->getUserData();
        $data['sejarah'] = $this->menu->getSejarah();

        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/menu/sejarah', $data);
            $this->load->view('myadmin/templates/footer');
        } else {
            $judul = htmlspecialchars($this->input->post('judul', true));
			//$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$deskripsi = $this->input->post('deskripsi', true);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/sejarah/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
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
						'judul' => $judul,
						'deskripsi' => $deskripsi,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', 1);
					$this->db->update('sejarah');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/sejarah');
			
				}else{
						echo $this->upload->display_errors();
				}
						 
			}else{
				$this->db->set([
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', 1);
				$this->db->update('sejarah');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/sejarah');
			}    
        }
    }
	
//---------> MENU VISI MISI
	public function visimisi()
    {
        $data['title'] = 'Visi Misi';
        // model
		$data['user'] = $this->user->getUserData();
        $data['visimisi'] = $this->menu->getVisiMisi();

        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('visi', 'visi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('myadmin/templates/header', $data);
            $this->load->view('myadmin/templates/sidebar', $data);
            $this->load->view('myadmin/templates/topbar', $data);
            $this->load->view('myadmin/menu/visimisi', $data);
            $this->load->view('myadmin/templates/footer');
        } else {
            $judul = htmlspecialchars($this->input->post('judul', true));
			$visi = htmlspecialchars($this->input->post('visi', true));
			$misi = htmlspecialchars($this->input->post('misi', true));
			$motto = htmlspecialchars($this->input->post('motto', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/visimisi/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['visimisi']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/visimisi/' . $old_img);
                    }
					
					$this->db->set([
						'judul' => $judul,
						'visi' => $visi,
						'misi' => $misi,
						'motto' => $motto,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
						
					]);
					$this->db->where('id', 1);
					$this->db->update('visimisi');

					set_message('data berhasil disimpan');
				redirect('myadmin/menu/visimisi');
			
				}else{
					echo $this->upload->display_errors();
				}
						 
			}else{
				$this->db->set([
					'judul' => $judul,
					'visi' => $visi,
					'misi' => $misi,
					'motto' => $motto,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', 1);
				$this->db->update('visimisi');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/visimisi');
			}    
        }
    }
	
//---------> MENU DIREKSI
	private function _validasi_direksi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    }
    public function direksi()
    {
        $data['title'] = 'Direksi';
        $data['direksi'] = $this->menu->Direksi();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/direksi', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function direksi_add()
    {
		$this->_validasi_direksi();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Direksi';
			$data['direksi'] = $this->menu->Direksi();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/direksi_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $jabatan = htmlspecialchars($this->input->post('jabatan', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/direksi/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'nama' => $nama,
						'jabatan' => $jabatan,
						'image' => $gambar,
						'user' => $user,
						'date_created' => $now
					];
					$this->db->insert('direksi', $data);
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/direksi');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/direksi');
			} 
        }
	}
	public function direksi_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_direksi();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Direksi';
			$data['direksi'] = $this->menu->getDireksi($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/direksi_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $jabatan = htmlspecialchars($this->input->post('jabatan', true));
            //$id = htmlspecialchars($this->input->post('id', true));
			$data['direksi'] = $this->menu->getDireksi($id);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/direksi/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['direksi']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/direksi/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'jabatan' => $jabatan,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('direksi');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/direksi');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
					'jabatan' => $jabatan,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('direksi');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/direksi');
			} 
        }
	}
	public function direksi_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('direksi');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/direksi');
    }

//---------> MENU LAYANAN
	private function _validasi_layanan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    }
	public function layanan()
    {
        $data['title'] = 'Layanan';
        $data['layanan'] = $this->menu->Layanan();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/layanan', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function layanan_add()
    {
		$this->_validasi_layanan();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Layanan';
			$data['layanan'] = $this->menu->Layanan();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/layanan_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $icon = htmlspecialchars($this->input->post('icon', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'icon' => $icon,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('layanan', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/layanan');
        }
	}
	public function layanan_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_layanan();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Layanan';
			$data['layanan'] = $this->menu->getLayanan($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/layanan_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $icon = htmlspecialchars($this->input->post('icon', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'icon' => $icon,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('layanan');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/layanan'); 
        }
	}
	public function layanan_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('layanan');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/layanan');
    }
	
	private function _validasi_layanan_detail()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    }
	public function layanan_detail($id)
    {
		$id = encode_php_tags($id);
        $data['title'] = 'Layanan';
		$data['layanan_id'] = $id;
        $data['layanan_detail'] = $this->menu->Layanan_Detail($id);
		$data['user'] = $this->user->getUserData();
		
		$result = $this->db->select('nama')->from('layanan')->where('id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/layanan_detail', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function layanan_detail_add($id)
    {
		$id = encode_php_tags($id);
		$this->_validasi_layanan_detail();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Layanan';
			$data['layanan_id'] = $id;
			$data['user'] = $this->user->getUserData();
			
			$result = $this->db->select('nama')->from('layanan')->where('id', $id)->limit(1)->get()->row();
			$data['nama'] = $result->nama;
		
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/layanan_detail_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$layanan_id = htmlspecialchars($this->input->post('layanan_id', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $jenis = htmlspecialchars($this->input->post('jenis', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'layanan_id' => $layanan_id,
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'jenis' => $jenis,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('layanan_detail', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/layanan_detail/'.$layanan_id);
        }
	}
	public function layanan_detail_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_layanan_detail();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Layanan';
			$data['layanan_detail'] = $this->menu->getLayanan_Detail($id);
			$data['user'] = $this->user->getUserData();
			
			$result = $this->db->select('layanan_id')->from('layanan_detail')->where('id', $id)->limit(1)->get()->row();
			$data['layanan_id'] = $result->layanan_id;
			
			$result = $this->db->select('nama')->from('layanan')->where('id', $data['layanan_id'])->limit(1)->get()->row();
			$data['nama'] = $result->nama;
			
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/layanan_detail_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$layanan_id = htmlspecialchars($this->input->post('layanan_id', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$jenis = htmlspecialchars($this->input->post('jenis', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'jenis' => $jenis,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('layanan_detail');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/layanan_detail/'.$layanan_id);
        }
	}
	public function layanan_detail_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('layanan_detail');
		
		$result = $this->db->select('layanan_id')->from('layanan_detail')->where('id', $id)->limit(1)->get()->row();
		$layanan_id = $result->layanan_id;
		
		
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/layanan_detail/'.$layanan_id);
    }
	
//---------> MENU POLI KLINIK
	public function poliklinik()
    {
        $data['title'] = 'PoliKlinik';
        $data['poliklinik'] = $this->menu->Poliklinik();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/poliklinik', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function poliklinik_add()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'PoliKlinik';
			$data['poliklinik'] = $this->menu->Poliklinik();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/poliklinik_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('poliklinik', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/poliklinik');
        }
	}
	public function poliklinik_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PoliKlinik';
			$data['poliklinik'] = $this->menu->getPoliklinik($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/poliklinik_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('poliklinik');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/poliklinik'); 
        }
	}
	public function poliklinik_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('poliklinik');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/poliklinik');
    }	
	public function poliklinik_dokter($id)
    {
		$id = encode_php_tags($id);
        $data['title'] = 'PoliKlinik';
		$data['poliklinik_id'] = $id;
        $data['poliklinik_dokter'] = $this->menu->Poliklinik_Dokter($id);
		$data['user'] = $this->user->getUserData();
		
		$result = $this->db->select('nama')->from('poliklinik')->where('id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/poliklinik_dokter', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function poliklinik_dokter_add($id)
    {
		$id = encode_php_tags($id);
		$this->form_validation->set_rules('dokter_id', 'dokter_id', 'required');
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'PoliKlinik';
			$data['poliklinik_id'] = $id;
			$data['dokter'] = $this->menu->Dokter();
			$data['user'] = $this->user->getUserData();
			
			$result = $this->db->select('nama')->from('poliklinik')->where('id', $id)->limit(1)->get()->row();
			$data['nama'] = $result->nama;
			
			//$data['dokter'] = $this->db->get_where('dokter', ['is_delete' => 0])->result_array();
			
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/poliklinik_dokter_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$poliklinik_id = htmlspecialchars($this->input->post('poliklinik_id', true));
			$dokter_id = htmlspecialchars($this->input->post('dokter_id', true));
            $hari = htmlspecialchars($this->input->post('hari', true));
            $jam = htmlspecialchars($this->input->post('jam', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			$urut_hari=urut_hari($hari);
			
			$data = [
				'poliklinik_id' => $poliklinik_id,
				'dokter_id' => $dokter_id,
				'urut_hari'=>$urut_hari,
				'hari' => $hari,
				'jam' => $jam,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('poliklinik_dokter', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/poliklinik_dokter/'.$poliklinik_id);
        }
	}
	public function poliklinik_dokter_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('dokter_id', 'dokter_id', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PoliKlinik';
			$data['poliklinik_dokter'] = $this->menu->getPoliklinik_Dokter($id);
			$data['dokter'] = $this->menu->Dokter();
			$data['user'] = $this->user->getUserData();
						
			$result = $this->db->select('poliklinik_id')->from('poliklinik_dokter')->where('id', $id)->limit(1)->get()->row();
			$data['poliklinik_id'] = $result->poliklinik_id;
			
			$result = $this->db->select('nama')->from('poliklinik')->where('id', $data['poliklinik_id'])->limit(1)->get()->row();
			$data['nama'] = $result->nama;

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/poliklinik_dokter_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$poliklinik_id = htmlspecialchars($this->input->post('poliklinik_id', true));
			$dokter_id = htmlspecialchars($this->input->post('dokter_id', true));
            $hari = htmlspecialchars($this->input->post('hari', true));
            $jam = htmlspecialchars($this->input->post('jam', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			$urut_hari=urut_hari($hari);
			
			$this->db->set([
				'poliklinik_id' => $poliklinik_id,
				'dokter_id' => $dokter_id,
				'urut_hari'=>$urut_hari,
				'hari' => $hari,
				'jam' => $jam,
				'user' => $user,
				'date_update' => $now
				
			]);
			$this->db->where('id', $id);
			$this->db->update('poliklinik_dokter');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/poliklinik_dokter/'.$poliklinik_id);
        }
	}
	public function poliklinik_dokter_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('poliklinik_dokter');
		
		$result = $this->db->select('poliklinik_id')->from('poliklinik_dokter')->where('id', $id)->limit(1)->get()->row();
		$poliklinik_id = $result->poliklinik_id;
		
		
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/poliklinik_dokter/'.$poliklinik_id);
    }
	
	
	
//---------> MENU DOKTER
    private function _validasi_dokter()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
    }
	public function dokter()
    {
        $data['title'] = 'Dokter';
        $data['dokter'] = $this->menu->Dokter();
        //$data['jadwal'] = $this->menu->getJadwal();
		$data['user'] = $this->user->getUserData();
		
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/dokter', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function dokter_add()
    {
		$this->_validasi_dokter();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dokter';
			$data['dokter'] = $this->menu->Dokter();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/dokter_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $telp = htmlspecialchars($this->input->post('telp', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/dokter/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'nama' => $nama,
						'telp' => $telp,
						'image' => $gambar,
						'user' => $user,
						'date_created' => $now
					];
					$this->db->insert('dokter', $data);
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/dokter');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/dokter');
			} 
        }
	}
	public function dokter_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_dokter();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dokter';
			$data['dokter'] = $this->menu->getDokter($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/dokter_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $telp = htmlspecialchars($this->input->post('telp', true));
            //$id = htmlspecialchars($this->input->post('id', true));
			$data['dokter'] = $this->menu->getDokter($id);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/dokter/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['dokter']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/dokter/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'telp' => $telp,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('dokter');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/dokter');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
					'telp' => $telp,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('dokter');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/dokter');
			} 
        }
	}
	public function dokter_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('dokter');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/dokter');
    }
	public function dokter_jadwal($id)
    {
		$id = encode_php_tags($id);
        $data['title'] = 'Dokter';
		$data['dokter_id'] = $id;
        $data['dokter_jadwal'] = $this->menu->Dokter_Jadwal($id);
		$data['user'] = $this->user->getUserData();
		
		$result = $this->db->select('nama')->from('dokter')->where('id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/dokter_jadwal', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function dokter_jadwal_add($id)
    {
		$id = encode_php_tags($id);
		$this->form_validation->set_rules('poliklinik_id', 'poliklinik_id', 'required');
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dokter';
			$data['dokter_id'] = $id;
			$data['poliklinik'] = $this->menu->Poliklinik();
			$data['user'] = $this->user->getUserData();
			
			$result = $this->db->select('nama')->from('dokter')->where('id', $id)->limit(1)->get()->row();
			$data['nama'] = $result->nama;
			
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/dokter_jadwal_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$poliklinik_id = htmlspecialchars($this->input->post('poliklinik_id', true));
			$dokter_id = htmlspecialchars($this->input->post('dokter_id', true));
            $hari = htmlspecialchars($this->input->post('hari', true));
            $jam = htmlspecialchars($this->input->post('jam', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			$urut_hari=urut_hari($hari);
			
			$data = [
				'poliklinik_id' => $poliklinik_id,
				'dokter_id' => $dokter_id,
				'urut_hari'=>$urut_hari,
				'hari' => $hari,
				'jam' => $jam,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('poliklinik_dokter', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/dokter_jadwal/'.$dokter_id);
        }
	}
	public function dokter_jadwal_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('poliklinik_id', 'poliklinik_id', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dokter';
			$data['dokter_jadwal'] = $this->menu->getPoliklinik_Dokter($id);
			$data['poliklinik'] = $this->menu->Poliklinik();
			$data['user'] = $this->user->getUserData();
						
			$result = $this->db->select('dokter_id')->from('poliklinik_dokter')->where('id', $id)->limit(1)->get()->row();
			$data['dokter_id'] = $result->dokter_id;
			
			$result = $this->db->select('nama')->from('dokter')->where('id', $data['dokter_id'])->limit(1)->get()->row();
			$data['nama'] = $result->nama;

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/dokter_jadwal_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$poliklinik_id = htmlspecialchars($this->input->post('poliklinik_id', true));
			$dokter_id = htmlspecialchars($this->input->post('dokter_id', true));
            $hari = htmlspecialchars($this->input->post('hari', true));
            $jam = htmlspecialchars($this->input->post('jam', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			$urut_hari=urut_hari($hari);
			
			$this->db->set([
				'poliklinik_id' => $poliklinik_id,
				'dokter_id' => $dokter_id,
				'urut_hari'=>$urut_hari,
				'hari' => $hari,
				'jam' => $jam,
				'user' => $user,
				'date_update' => $now
				
			]);
			$this->db->where('id', $id);
			$this->db->update('poliklinik_dokter');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/dokter_jadwal/'.$dokter_id);
        }
	}
	public function dokter_jadwal_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('poliklinik_dokter');
		
		$result = $this->db->select('dokter_id')->from('poliklinik_dokter')->where('id', $id)->limit(1)->get()->row();
		$dokter_id = $result->dokter_id;
		
		
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/dokter_jadwal/'.$dokter_id);
    }

//---------> MENU LAYANAN
	private function _validasi_indikatormutu()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    }
	public function indikatormutu()
    {
        $data['title'] = 'Indikator Mutu';
        $data['indikatormutu'] = $this->menu->IndikatorMutu();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/indikatormutu', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	
	public function indikatormutu_add()
    {
		$this->_validasi_indikatormutu();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Indikator Mutu';
			$data['indikatormutu'] = $this->menu->IndikatorMutu();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/indikatormutu_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $periode = htmlspecialchars($this->input->post('periode', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
            $url = htmlspecialchars($this->input->post('url', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'periode' => $periode,
				'tahun' => $tahun,
				'url' => $url,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('indikatormutu', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/indikatormutu');
        }
	}
	public function indikatormutu_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_indikatormutu();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Indikator Mutu';
			$data['indikatormutu'] = $this->menu->getIndikatorMutu($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/indikatormutu_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $periode = htmlspecialchars($this->input->post('periode', true));
			$tahun = htmlspecialchars($this->input->post('tahun', true));
			$url = htmlspecialchars($this->input->post('url', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'periode' => $periode,
				'tahun' => $tahun,
				'url' => $url,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('indikatormutu');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/indikatormutu'); 
        }
	}
	public function indikatormutu_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('indikatormutu');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/indikatormutu');
    }
	
	public function indikatormutu_tahun($tahun)
    {
		$tahun = encode_php_tags($tahun);
        $data['title'] = 'Indikator Mutu';
		$data['tahun'] = $tahun;
        $data['indikatormutu_tahun'] = $this->menu->Indikatormutu_Tahun($tahun);
		$data['user'] = $this->user->getUserData();
		
		$result = $this->db->select('tahun')->from('indikatormutu')->where('tahun', $tahun)->limit(1)->get()->row();
		$data['tahun'] = $result->tahun;
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/indikatormutu_tahun', $data);
		$this->load->view('myadmin/templates/footer');
	}
	private function _validasi_indikatormutu_detail()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    }
	public function indikatormutu_detail($id)
    {
		$id = encode_php_tags($id);
        $data['title'] = 'Indikator Mutu';
		$data['indikatormutu_id'] = $id;
        $data['indikatormutu_detail'] = $this->menu->Indikatormutu_Detail($id);
		$data['user'] = $this->user->getUserData();
		
		$result = $this->db->select('nama, tahun')->from('indikatormutu')->where('id', $id)->limit(1)->get()->row();
		$data['nama'] = $result->nama;
		$data['tahun'] = $result->tahun;
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/indikatormutu_detail', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function indikatormutu_detail_add($id)
    {
		$id = encode_php_tags($id);
		$this->_validasi_indikatormutu_detail();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Indikator Mutu';
			$data['indikatormutu_id'] = $id;
			$data['user'] = $this->user->getUserData();
			
			$result = $this->db->select('nama')->from('indikatormutu')->where('id', $id)->limit(1)->get()->row();
			$data['nama'] = $result->nama;
		
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/indikatormutu_detail_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$indikatormutu_id = htmlspecialchars($this->input->post('indikatormutu_id', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$config['upload_path'] = './assets/img/mutu/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'indikatormutu_id' => $indikatormutu_id,
						'nama' => $nama,
						'deskripsi' => $deskripsi,
						'image' => $gambar,
						'urut' => $urut,
						'user' => $user,
						'date_created' => $now
						];
						$this->db->insert('indikatormutu_detail', $data);
						set_message('data berhasil disimpan');
						//redirect('myadmin/menu/indikatormutu_detail/'.$indikatormutu_id);
						redirect('myadmin/menu/indikatormutu');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/indikatormutu');
			} 
        }
	
	}
	public function indikatormutu_detail_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_indikatormutu_detail();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Indikator Mutu';
			$data['indikatormutu_detail'] = $this->menu->getIndikatormutu_Detail($id);
			$data['user'] = $this->user->getUserData();
			
			$result = $this->db->select('indikatormutu_id')->from('indikatormutu_detail')->where('id', $id)->limit(1)->get()->row();
			$data['indikatormutu_id'] = $result->indikatormutu_id;
			
			$result = $this->db->select('nama')->from('indikatormutu')->where('id', $data['indikatormutu_id'])->limit(1)->get()->row();
			$data['nama'] = $result->nama;
			
            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/indikatormutu_detail_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$indikatormutu_id = htmlspecialchars($this->input->post('indikatormutu_id', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			$data['indikatormutu_detail'] = $this->menu->getIndikatormutu_Detail($id);
			
			$config['upload_path'] = './assets/img/mutu/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['indikatormutu_detail']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/mutu/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'deskripsi' => $deskripsi,
						'image' => $gambar,
						'urut' => $urut,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('indikatormutu_detail');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/indikatormutu_detail/'.$indikatormutu_id);
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
					'deskripsi' => $deskripsi,
					'urut' => $urut,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('indikatormutu_detail');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/indikatormutu_detail/'.$indikatormutu_id);
			}
        }
	}
	
	public function indikatormutu_detail_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('indikatormutu_detail');
		
		$result = $this->db->select('indikatormutu_id')->from('indikatormutu_detail')->where('id', $id)->limit(1)->get()->row();
		$indikatormutu_id = $result->indikatormutu_id;
		
		
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/indikatormutu_detail/'.$indikatormutu_id);
    }
	
//---------> MENU FOTO KATEGORI
	public function foto_kategori()
    {
        $data['title'] = 'Foto';
        $data['foto_kategori'] = $this->menu->Foto_Kategori();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/foto_kategori', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function foto_kategori_add()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
        if ($this->form_validation->run() == false) {
			$data['title'] = 'Foto';
			$data['foto_kategori'] = $this->menu->Foto_Kategori();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/foto_kategori_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'urut' => $urut,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('foto_kategori', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/foto_kategori');
        }
	}
	public function foto_kategori_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Foto';
			$data['foto_kategori'] = $this->menu->getFoto_Kategori($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/foto_kategori_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'urut' => $urut,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('foto_kategori');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/foto_kategori'); 
        }
	}
	public function foto_kategori_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('foto_kategori');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/foto_kategori');
    }
	
//---------> MENU FOTO
	private function _validasi_foto()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('urut', 'Urut', 'required');
    }
    public function foto()
    {
        $data['title'] = 'Foto';
        $data['foto'] = $this->menu->Foto();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/foto', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function foto_add()
    {
		$this->_validasi_foto();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Foto';
			$data['foto'] = $this->menu->Foto();
			$data['foto_kategori'] = $this->menu->Foto_Kategori();
			$data['user'] = $this->user->getUserData();
			
			//$result = $this->db->select('nama')->from('dokter')->where('id', $id)->limit(1)->get()->row();
			//$data['nama'] = $result->nama;

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/foto_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$kategori_id = htmlspecialchars($this->input->post('kategori_id', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/foto/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'kategori_id' => $kategori_id,
						'nama' => $nama,
						'deskripsi' => $deskripsi,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_created' => $now
					];
					$this->db->insert('foto', $data);
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/foto');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/foto');
			} 
        }
	}
	public function foto_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_foto();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Foto';
			$data['foto'] = $this->menu->getFoto($id);
			$data['foto_kategori'] = $this->menu->Foto_Kategori();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/foto_edit', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			$kategori_id = htmlspecialchars($this->input->post('kategori_id', true));
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
			$data['foto'] = $this->menu->getFoto($id);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/foto/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['foto']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/foto/' . $old_img);
                    }
					
					$this->db->set([
						'kategori_id' => $kategori_id,
						'nama' => $nama,
						'deskripsi' => $deskripsi,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('foto');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/foto');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'kategori_id' => $kategori_id,
					'nama' => $nama,
					'deskripsi' => $deskripsi,
					'urut' => $urut,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('foto');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/foto');
			} 
        }
	}
	public function foto_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('foto');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/foto');
    }

//-------->FOTO2
private function _validasi_foto2()
{
	$this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('urut', 'Urut', 'required');
}
public function foto2()
{
	$data['title'] = 'Foto Pengaduan';
	$data['foto2'] = $this->menu->Foto2();
	$data['user'] = $this->user->getUserData();
	
	$this->load->view('myadmin/templates/header', $data);
	$this->load->view('myadmin/templates/sidebar', $data);
	$this->load->view('myadmin/templates/topbar', $data);
	$this->load->view('myadmin/menu/foto2', $data);
	$this->load->view('myadmin/templates/footer');
}
public function foto2_add()
{
	$this->_validasi_foto2();
	
	if ($this->form_validation->run() == false) {
		$data['title'] = 'Foto Pengaduan';
		$data['foto2'] = $this->menu->Foto2();
		// $data['foto_kategori'] = $this->menu->Foto_Kategori();
		$data['user'] = $this->user->getUserData();
		
		//$result = $this->db->select('nama')->from('dokter')->where('id', $id)->limit(1)->get()->row();
		//$data['nama'] = $result->nama;

		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/foto2_add', $data);
		$this->load->view('myadmin/templates/footer');
		
	} else {
		$id = htmlspecialchars($this->input->post('id', true));
		$nama = htmlspecialchars($this->input->post('nama', true));
		//$image = htmlspecialchars($this->input->post('image', true));
		//$urut = htmlspecialchars($this->input->post('urut', true));
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
		
		$config['upload_path'] = './assets/img/foto2/'; //path folder
		$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '500'; // maksimal ukuran file 500kb
		$config['max_width'] = '1200'; // maksimal lebar gambar
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$this->load->library('upload', $config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
				
				$data = [
					'id' => $id,
					'nama' => $nama,
					// 'deskripsi' => $deskripsi,
					// 'urut' => $urut,
					'image' => $gambar,
					'user' => $user,
					'date_created' => $now
				];
				$this->db->insert('foto2', $data);
				set_message('data berhasil disimpan');
				redirect('myadmin/menu/foto2');
			}else{
				echo $this->upload->display_errors();
			}	 
		}else{
			set_message('gagal simpan data', false);
			redirect('myadmin/menu/foto2');
		} 
	}
}
public function foto2_edit($id)
{
	$id = encode_php_tags($id);
	$this->_validasi_foto();

	if ($this->form_validation->run() == false) {
		$data['title'] = 'Foto2';
		$data['foto2'] = $this->menu->getFoto2($id);
		// $data['foto_kategori'] = $this->menu->Foto_Kategori();
		$data['user'] = $this->user->getUserData();

		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/foto2_edit', $data);
		$this->load->view('myadmin/templates/footer');
	} else {
		$id = htmlspecialchars($this->input->post('id', true));
		$nama = htmlspecialchars($this->input->post('nama', true));
		$image = htmlspecialchars($this->input->post('image', true));
		$urut = htmlspecialchars($this->input->post('urut', true));
		$data['foto2'] = $this->menu->getFoto2($id);
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
		
		$config['upload_path'] = './assets/img/foto/'; //path folder
		$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '500'; // maksimal ukuran file 500kb
		$config['max_width'] = '1200'; // maksimal lebar gambar
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		//$this->upload->initialize($config);
		$this->load->library('upload', $config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
				
				$old_img = $data['foto2']['image'];
				if ($old_img != 'default.jpg') {
					unlink(FCPATH . 'assets/img/foto2/' . $old_img);
				}
				
				$this->db->set([
					'id' => $id,
					'nama' => $nama,
					// 'deskripsi' => $deskripsi,
					// 'urut' => $urut,
					'image' => $gambar,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('foto2');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/foto2');
			}else{
				echo $this->upload->display_errors();
			}	 
		}else{
			$this->db->set([
				'id' => $id,
				'nama' => $nama,
				'image' => $image,
				'urut' => $urut,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('foto2');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/foto');
		} 
	}
}
public function foto2_delete($id)
{
	$user=$this->session->userdata('id');
	$now = date('Y-m-d H:i:s');
		
	$this->db->set([
		'user' => $user,
		'date_update' => $now,
		'is_delete' => 1
	]);
	$this->db->where('id', $id);
	$this->db->update('foto2');
		
	set_message('data berhasil dihapus', false);
	redirect('myadmin/menu/foto2');
}	
	
//---------> MENU VIDEO
	public function video()
    {
        $data['title'] = 'Video';
        $data['video'] = $this->menu->Video();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/video', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function video_add()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
        if ($this->form_validation->run() == false) {
			$data['title'] = 'Video';
			$data['video'] = $this->menu->Video();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/video_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$url = htmlspecialchars($this->input->post('url', true));
			$embed = htmlspecialchars($this->input->post('embed', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'url' => $url,
				'embed' => $embed,
				'urut' => $urut,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('video', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/video');
        }
	}
	public function video_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Video';
			$data['video'] = $this->menu->getVideo($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/video_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$url = htmlspecialchars($this->input->post('url', true));
			$embed = htmlspecialchars($this->input->post('embed', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'url' => $url,
				'embed' => $embed,
				'urut' => $urut,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('video');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/video'); 
        }
	}
	public function video_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('video');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/video');
    }	
	
//---------> MENU DOWNLOAD
	public function download()
    {
        $data['title'] = 'Download';
        $data['download'] = $this->menu->Download();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/download', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function download_add()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
        if ($this->form_validation->run() == false) {
			$data['title'] = 'Download';
			$data['download'] = $this->menu->Download();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/download_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$url = htmlspecialchars($this->input->post('url', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'url' => $url,
				'urut' => $urut,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('download', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/download');
        }
	}
	public function download_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Download';
			$data['download'] = $this->menu->getDownload($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/download_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$url = htmlspecialchars($this->input->post('url', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'url' => $url,
				'urut' => $urut,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('download');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/download'); 
        }
	}
	public function download_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('download');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/download');
    }

//---------> MENU TESTIMONI
	public function testimoni()
    {
        $data['title'] = 'Testimoni';
        $data['testimoni'] = $this->menu->Testimoni();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/testimoni', $data);
		$this->load->view('myadmin/templates/footer');
	}	
	public function testimoni_add()
    {
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		
        if ($this->form_validation->run() == false) {
			$data['title'] = 'Testimoni';
			$data['testimoni'] = $this->menu->Testimoni();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/testimoni_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$testimoni = htmlspecialchars($this->input->post('testimoni', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$data = [
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'testimoni' => $testimoni,
				'user' => $user,
				'date_created' => $now
			];
			$this->db->insert('testimoni', $data);
			set_message('data berhasil disimpan');
			redirect('myadmin/menu/testimoni');
        }
	}
	public function testimoni_edit($id)
    {
		$id = encode_php_tags($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Testimoni';
			$data['testimoni'] = $this->menu->getTestimoni($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/testimoni_edit', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$testimoni = htmlspecialchars($this->input->post('testimoni', true));
            $user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');

			$this->db->set([
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'testimoni' => $testimoni,
				'user' => $user,
				'date_update' => $now
			]);
			$this->db->where('id', $id);
			$this->db->update('testimoni');

			set_message('data berhasil disimpan');
			redirect('myadmin/menu/testimoni'); 
        }
	}
	public function testimoni_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('testimoni');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/testimoni');
    }

//---------> MENU ARTIKEL
	private function _validasi_artikel()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('urut', 'Urut', 'required');
    }
    public function artikel()
    {
        $data['title'] = 'Artikel';
        $data['artikel'] = $this->menu->Artikel();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/artikel', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function artikel_add()
    {
		$this->_validasi_artikel();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Artikel';
			$data['artikel'] = $this->menu->Artikel();
			//$data['artikel_kategori'] = $this->menu->Foto_Kategori();
			$data['user'] = $this->user->getUserData();
			
			//$result = $this->db->select('nama')->from('dokter')->where('id', $id)->limit(1)->get()->row();
			//$data['nama'] = $result->nama;

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/artikel_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			//$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$deskripsi = $this->input->post('deskripsi', true);
			$singkat=substr(strip_tags($deskripsi),0,50);
            $kesehatan = htmlspecialchars($this->input->post('kesehatan', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/artikel/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'nama' => $nama,
						'deskripsi' => $deskripsi,
						'singkat' => $singkat,
						'kesehatan' => $kesehatan,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_created' => $now
					];
					$this->db->insert('artikel', $data);
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/artikel');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/artikel');
			} 
        }
	}
	public function artikel_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_artikel();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Artikel';
			$data['artikel'] = $this->menu->getArtikel($id);
			//$data['artikel_kategori'] = $this->menu->Foto_Kategori();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/artikel_edit', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
			//$deskripsi = htmlspecialchars($this->input->post('deskripsi', true));
			$deskripsi = $this->input->post('deskripsi', true);
			$singkat=substr(strip_tags($deskripsi),0,50);
            $kesehatan = htmlspecialchars($this->input->post('kesehatan', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
			$data['artikel'] = $this->menu->getArtikel($id);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/artikel/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['artikel']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/artikel/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'deskripsi' => $deskripsi,
						'singkat' => $singkat,
						'kesehatan' => $kesehatan,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('artikel');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/artikel');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
					'deskripsi' => $deskripsi,
					'singkat' => $singkat,
					'kesehatan' => $kesehatan,
					'urut' => $urut,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('artikel');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/artikel');
			} 
        }
	}
	public function artikel_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('artikel');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/artikel');
    }

//---------> MENU REKANAN
	private function _validasi_rekanan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('urut', 'Urut', 'required');
        $this->form_validation->set_rules('asuransi', 'Asuransi', 'required');
    }
    public function rekanan()
    {
        $data['title'] = 'Rekanan';
        $data['rekanan'] = $this->menu->Rekanan();
		$data['user'] = $this->user->getUserData();
		
		$this->load->view('myadmin/templates/header', $data);
		$this->load->view('myadmin/templates/sidebar', $data);
		$this->load->view('myadmin/templates/topbar', $data);
		$this->load->view('myadmin/menu/rekanan', $data);
		$this->load->view('myadmin/templates/footer');
	}
	public function rekanan_add()
    {
		$this->_validasi_rekanan();
		
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Rekanan';
			$data['rekanan'] = $this->menu->Rekanan();
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/rekanan_add', $data);
			$this->load->view('myadmin/templates/footer');
			
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $asuransi = htmlspecialchars($this->input->post('asuransi', true));
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/rekanan/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['max_height'] = '700'; // maksimal tinggi gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$data = [
						'nama' => $nama,
						'asuransi' => $asuransi,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_created' => $now
					];
					$this->db->insert('rekanan', $data);
					set_message('data berhasil disimpan');
					redirect('myadmin/menu/rekanan');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				set_message('gagal simpan data', false);
				redirect('myadmin/menu/rekanan');
			} 
        }
	}
	public function rekanan_edit($id)
    {
		$id = encode_php_tags($id);
        $this->_validasi_rekanan();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Rekanan';
			$data['rekanan'] = $this->menu->getrekanan($id);
			$data['user'] = $this->user->getUserData();

            $this->load->view('myadmin/templates/header', $data);
			$this->load->view('myadmin/templates/sidebar', $data);
			$this->load->view('myadmin/templates/topbar', $data);
			$this->load->view('myadmin/menu/rekanan_edit', $data);
			$this->load->view('myadmin/templates/footer');
        } else {
			$nama = htmlspecialchars($this->input->post('nama', true));
            $urut = htmlspecialchars($this->input->post('urut', true));
            $asuransi = htmlspecialchars($this->input->post('asuransi', true));
			$data['rekanan'] = $this->menu->getrekanan($id);
			$user=$this->session->userdata('id');
			$now = date('Y-m-d H:i:s');
			
			$config['upload_path'] = './assets/img/rekanan/'; //path folder
			$config['allowed_types'] = 'jpg|png|gif'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '500'; // maksimal ukuran file 500kb
			$config['max_width'] = '1200'; // maksimal lebar gambar
			$config['max_height'] = '700'; // maksimal tinggi gambar
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

			//$this->upload->initialize($config);
			$this->load->library('upload', $config);
			if(!empty($_FILES['filefoto']['name']))
			{
				if ($this->upload->do_upload('filefoto'))
				{
					$gbr = $this->upload->data();
					$gambar=$gbr['file_name']; //Mengambil file name dari gambar yang diupload
					
					$old_img = $data['rekanan']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/rekanan/' . $old_img);
                    }
					
					$this->db->set([
						'nama' => $nama,
						'asuransi' => $asuransi,
						'urut' => $urut,
						'image' => $gambar,
						'user' => $user,
						'date_update' => $now
					]);
					$this->db->where('id', $id);
					$this->db->update('rekanan');

					set_message('data berhasil disimpan');
					redirect('myadmin/menu/rekanan');
				}else{
					echo $this->upload->display_errors();
				}	 
			}else{
				$this->db->set([
					'nama' => $nama,
					'asuransi' => $asuransi,
					'urut' => $urut,
					'user' => $user,
					'date_update' => $now
				]);
				$this->db->where('id', $id);
				$this->db->update('rekanan');

				set_message('data berhasil disimpan');
				redirect('myadmin/menu/rekanan');
			} 
        }
	}
	public function rekanan_delete($id)
    {
		$user=$this->session->userdata('id');
		$now = date('Y-m-d H:i:s');
			
		$this->db->set([
			'user' => $user,
			'date_update' => $now,
			'is_delete' => 1
		]);
		$this->db->where('id', $id);
		$this->db->update('rekanan');
			
		set_message('data berhasil dihapus', false);
		redirect('myadmin/menu/rekanan');
    }
	
	
	
}
