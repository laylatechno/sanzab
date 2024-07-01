<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
public function __construct()
{
	parent::__construct();
  $this->load->model('Galeri_model');
  $this->load->model('Konfigurasi_model');
  $this->simple_login->cek_login_back();
}

  public function index()
  {
  	$galeri = $this->Galeri_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Halaman Galeri',
    				      'galeri' => $galeri,
                  'konfigurasi' => $konfigurasi,
    				      'isi' => 'back/galeri/list'
	);
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


  public function tambah()
  {
    $galeri = $this->Galeri_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();


    $valid = $this->form_validation;
    $valid->set_rules('nama','Nama Galeri','required',
                array('required' => '%s harus diisi'));


    if($valid->run()){
                $config['upload_path']          = './upload/galeri/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Galeri Baru',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/galeri/tambah'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/galeri/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/galeri/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
   
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

    $i = $this->input;
    $data = array('nama' => $i->post('nama'),  
                  'deskripsi' => $i->post('deskripsi'), 
                  'urutan' => $i->post('urutan'),  
                  'gambar' => $upload_data['uploads']['file_name'],
                  'tanggal_input' => date('Y-m-d H:i:s'),
                  'pengguna' => $this->session->userdata('nama'),
                               
                    );
      $this->Galeri_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
      redirect(base_url('back/galeri'),'refresh');
    }
  }
  // tampil awal ketika tambah
      $data = array('title' => 'Data Galeri Baru',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/galeri/tambah'
                 );
     $this->load->view('back/layout/wrapper', $data, FALSE);

}

 

  public function edit($id_galeri)
  {
   
  $galeri = $this->Galeri_model->detail($id_galeri);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('nama','Nama Galeri','required',
      array('required' => '%s harus diisi'));
   // $valid->set_rules('password', 'Password', 'required');
  // $valid->set_rules('password2', 'Konfirmasi', 'required|matches[password]',
  // array('required' => '%s harus diisi',
  //       'matches' => 'Password tidak sama')
  // );

    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/galeri/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Galeri Edit',
                  'konfigurasi' => $konfigurasi,
                  'galeri' => $galeri,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'dashboard/galeri/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/galeri/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/galeri/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 
 
    $i = $this->input;
         $data = array('id_galeri' => $id_galeri,
                        'nama' => $i->post('nama'),  
                        'deskripsi' => $i->post('deskripsi'),  
                        'urutan' => $i->post('urutan'),
                        'gambar' => $upload_data['uploads']['file_name'],
                        'pengguna' => $this->session->userdata('nama'),
                    );
      $this->Galeri_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/galeri'),'refresh');
    }
  }else{
     $i = $this->input;
    
     $data = array('id_galeri' => $id_galeri,
                  'nama' => $i->post('nama'),  
                  'deskripsi' => $i->post('deskripsi'), 
                  'urutan' => $i->post('urutan'), 
                  'pengguna' => $this->session->userdata('nama'),
                    );
      $this->Galeri_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/galeri'),'refresh');

  }
}
     $data = array('title' => 'Data Galeri Edit',
                   'konfigurasi' => $konfigurasi,
                   'galeri' => $galeri,
                   'isi' => 'back/galeri/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

  
  }



  public function delete($id_galeri)
  {
     $galeri =$this->Galeri_model->detail($id_galeri);
    unlink('./upload/galeri/'.$galeri->gambar);
    unlink('./upload/galeri/thumbs/'.$galeri->gambar);
     $data = array('id_galeri' => $id_galeri);
     $this->Galeri_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/galeri'),'refresh');

  }


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */