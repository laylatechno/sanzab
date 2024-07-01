<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_back();
	 
	}

	public function index()
	{
	 
	$konfigurasi = $this->Konfigurasi_model->listing();
	$team = $this->Team_model->listing();

	$data = array('title'		=> 'Data Team',
				  'konfigurasi' => $konfigurasi,
				  'team' 	=> $team,
	    		 'isi'			=> 'back/team/list'
					);
	$this->load->view('back/layout/wrapper', $data, FALSE);
	}


	 public function tambah()
  {
    $team = $this->Team_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();


    $valid = $this->form_validation;
    $valid->set_rules('email', 'Email', 'required|valid_email|is_unique[team.email]',
				array('is_unique' => '%s sudah terdaftar' ));
    $valid->set_rules('urutan', 'Urutan', 'required|is_unique[team.urutan]',
        array('is_unique' => '%s sudah ada' ));
     
	   
    if($valid->run()){
                $config['upload_path']          = './upload/team/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Team Baru',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/team/tambah'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/team/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/team/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
   
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

    $i = $this->input;
   $data = array('nama' => html_escape($i->post('nama')),  
                  'no_telp' => html_escape($i->post('no_telp')),  
                  'email' => html_escape($i->post('email')),  
                  'gambar' => html_escape($upload_data['uploads']['file_name']),
                  'alamat' => html_escape($i->post('alamat')), 
                  'jabatan' => html_escape($i->post('jabatan')),  
                  'deskripsi' => html_escape($i->post('deskripsi')), 
                  'motto' => html_escape($i->post('motto')), 
                  'instagram' => html_escape($i->post('instagram')), 
                  'facebook' => html_escape($i->post('facebook')), 
                  'urutan' => html_escape($i->post('urutan')), 
                  'tanggal_input' => date('Y-m-d H:i:s'),
                  'pengguna' => html_escape($this->session->userdata('nama')),             
                    );
      $this->Team_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
      redirect(base_url('back/team'),'refresh');
    }
  }
  // tampil awal ketika tambah
      $data = array('title' => 'Data Team Baru',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/team/tambah'
                 );
     $this->load->view('back/layout/wrapper', $data, FALSE);

}



  public function edit($id_team)
  {
   
  $team = $this->Team_model->detail($id_team);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('nama','Nama Team','required',
      array('required' => '%s harus diisi'));
  
    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/team/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Edit Data Team',
                  'konfigurasi' => $konfigurasi,
                  'team' => $team,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'dashboard/team/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/team/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/team/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 
 
    $i = $this->input;
          $data = array('id_team' => $id_team,
                        'nama' => html_escape($i->post('nama')),  
                        'no_telp' => html_escape($i->post('no_telp')),  
                        'email' => html_escape($i->post('email')),  
                        'gambar' => html_escape($upload_data['uploads']['file_name']),
                        'alamat' => html_escape($i->post('alamat')), 
                        'jabatan' => html_escape($i->post('jabatan')),  
                        'deskripsi' => html_escape($i->post('deskripsi')), 
                        'motto' => html_escape($i->post('motto')), 
                        'instagram' => html_escape($i->post('instagram')), 
                        'facebook' => html_escape($i->post('facebook')), 
                        'urutan' => html_escape($i->post('urutan')), 
                        'tanggal_input' => date('Y-m-d H:i:s'),
                        'pengguna' => html_escape($this->session->userdata('nama'))
                    );
      $this->Team_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/team'),'refresh');
    }
  }else{
     $i = $this->input;
    
      $data = array('id_team' => $id_team,
                        'nama' => html_escape($i->post('nama')),  
                        'no_telp' => html_escape($i->post('no_telp')),  
                        'email' => html_escape($i->post('email')),   
                        'alamat' => html_escape($i->post('alamat')), 
                        'jabatan' => html_escape($i->post('jabatan')),  
                        'deskripsi' => html_escape($i->post('deskripsi')), 
                        'motto' => html_escape($i->post('motto')), 
                        'instagram' => html_escape($i->post('instagram')), 
                        'facebook' => html_escape($i->post('facebook')), 
                        'urutan' => html_escape($i->post('urutan')), 
                        'tanggal_input' => date('Y-m-d H:i:s'),
                        'pengguna' => html_escape($this->session->userdata('nama'))
                    );
      $this->Team_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/team'),'refresh');

  }
}
     $data = array('title' => 'Edit Data Team',
                   'konfigurasi' => $konfigurasi,
                   'team' => $team,
                   'isi' => 'back/team/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  
  }


  public function delete($id_team)
  {
     $team =$this->Team_model->detail($id_team);
    unlink('./upload/team/'.$team->gambar);
    unlink('./upload/team/thumbs/'.$team->gambar);
     $data = array('id_team' => $id_team);
     $this->Team_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/team'),'refresh');

  }



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */

