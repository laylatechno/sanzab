<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_back(); 
	 
	}

	 

public function edit($id_pengguna)
  {
   
  $pengguna = $this->Pengguna_model->detail($id_pengguna);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('nama','Nama Pengguna','required',
      array('required' => '%s harus diisi'));
  
    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/pengguna/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Edit Data Pengguna',
                  'konfigurasi' => $konfigurasi,
                  'pengguna' => $pengguna,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'dashboard/profil/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/pengguna/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/pengguna/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 
 
    $i = $this->input;
         $data = array('id_pengguna' => $id_pengguna,
                        'nama' => html_escape($i->post('nama')),  
                        'no_telp' => html_escape($i->post('no_telp')),
                        'email' => html_escape($i->post('email')),  
                        'password' => html_escape(password_hash($i->post('password'),PASSWORD_DEFAULT)),
                        'gambar' => html_escape($upload_data['uploads']['file_name']),
                        'level' => html_escape($i->post('level')),  
                        'aktif' => html_escape($i->post('aktif')), 
                        'pengguna' => html_escape($this->session->userdata('nama'))
                    );
      $this->Pengguna_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/dashboard'),'refresh');
    }
  }else{
     $i = $this->input;
    
     $data = array('id_pengguna' => $id_pengguna,
          				'nama' => html_escape($i->post('nama')),  
                  'no_telp' => html_escape($i->post('no_telp')),  
                  'level' => html_escape($i->post('level')),
                  'email' => html_escape($i->post('email')),
                  'password' => html_escape(password_hash($i->post('password'),PASSWORD_DEFAULT)), 
                  'aktif' => html_escape($i->post('aktif')), 
                  'pengguna' => html_escape($this->session->userdata('nama'))
                    );
      $this->Pengguna_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/dashboard'),'refresh');

  }
}
     $data = array('title' => 'Edit Data Pengguna',
                   'konfigurasi' => $konfigurasi,
                   'pengguna' => $pengguna,
                   'isi' => 'back/profil/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  
  }


 



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */