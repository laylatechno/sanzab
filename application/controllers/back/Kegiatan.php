<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {
public function __construct()
{
	parent::__construct();
  $this->load->model('Kegiatan_model');
  $this->load->model('Konfigurasi_model');
  $this->simple_login->cek_login_back();
}

  public function index()
  {
  	$kegiatan = $this->Kegiatan_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Halaman Kegiatan',
    				      'kegiatan' => $kegiatan,
                  'konfigurasi' => $konfigurasi,
    				      'isi' => 'back/kegiatan/list'
	);
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


  public function tambah()
  {
    $kegiatan = $this->Kegiatan_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();


    $valid = $this->form_validation;
   $valid->set_rules('urutan', 'Urutan', 'required|is_unique[kegiatan.urutan]',
        array('is_unique' => '%s sudah ada' ));



    if($valid->run()){
                $config['upload_path']          = './upload/kegiatan/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Kegiatan Baru',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/kegiatan/tambah'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/kegiatan/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/kegiatan/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
   
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

    $i = $this->input;
    $data = array('nama' => html_escape($i->post('nama')),  
                  'deskripsi' => html_escape($i->post('deskripsi')), 
                  'urutan' => html_escape($i->post('urutan')),  
                  'icon' => html_escape($i->post('icon')),  
                  'gambar' => html_escape($upload_data['uploads']['file_name']),
                  'tanggal_input' => date('Y-m-d H:i:s'),
                  'pengguna' => html_escape($this->session->userdata('nama')),
                               
                    );
      $this->Kegiatan_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
      redirect(base_url('back/kegiatan'),'refresh');
    }
  }
  // tampil awal ketika tambah
      $data = array('title' => 'Data Kegiatan Baru',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/kegiatan/tambah'
                 );
     $this->load->view('back/layout/wrapper', $data, FALSE);

}

 

    public function edit($id_kegiatan)
  {
   
  $kegiatan = $this->Kegiatan_model->detail($id_kegiatan);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('nama','Nama Kegiatan','required',
      array('required' => '%s harus diisi'));
  
    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/kegiatan/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Edit Data Kegiatan',
                  'konfigurasi' => $konfigurasi,
                  'kegiatan' => $kegiatan,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'dashboard/kegiatan/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/kegiatan/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/kegiatan/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 

    $i = $this->input;
 
           $data = array( 'id_kegiatan' => $id_kegiatan,
                  'nama' => html_escape($i->post('nama')),  
                  'deskripsi' => html_escape($i->post('deskripsi')), 
                  'urutan' => html_escape($i->post('urutan')),  
                  'icon' => html_escape($i->post('icon')),  
                  'gambar' => html_escape($upload_data['uploads']['file_name']),
                  'tanggal_input' => date('Y-m-d H:i:s'),
                  'pengguna' => html_escape($this->session->userdata('nama')),
                               
                    );
      $this->Kegiatan_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/kegiatan'),'refresh');
    }
  }else{
     $i = $this->input;
    
     $data = array('id_kegiatan' => $id_kegiatan,
                  'nama' => html_escape($i->post('nama')),  
                  'deskripsi' => html_escape($i->post('deskripsi')), 
                  'urutan' => html_escape($i->post('urutan')),  
                  'icon' => html_escape($i->post('icon')),  
                  
                  'pengguna' => html_escape($this->session->userdata('nama')),
                               
                    );
      $this->Kegiatan_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/kegiatan'),'refresh');

  }
}
     $data = array('title' => 'Edit Data Kegiatan',
                   'konfigurasi' => $konfigurasi,
                   'kegiatan' => $kegiatan,
                   'isi' => 'back/kegiatan/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  
  }


  public function delete($id_kegiatan)
  {
     $kegiatan =$this->Kegiatan_model->detail($id_kegiatan);
    unlink('./upload/kegiatan/'.$kegiatan->gambar);
    unlink('./upload/kegiatan/thumbs/'.$kegiatan->gambar);
     $data = array('id_kegiatan' => $id_kegiatan);
     $this->Kegiatan_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/kegiatan'),'refresh');

  }


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */