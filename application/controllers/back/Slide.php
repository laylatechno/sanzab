<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {
public function __construct()
{
	parent::__construct();
  $this->load->model('Slide_model');
  $this->load->model('Konfigurasi_model');
  $this->simple_login->cek_login_back();
}

  public function index()
  {
  	$slide = $this->Slide_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Halaman Slide',
    				      'slide' => $slide,
                  'konfigurasi' => $konfigurasi,
    				      'isi' => 'back/slide/list'
	);
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


  public function tambah()
  {
    $slide = $this->Slide_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();


    $valid = $this->form_validation;
    $valid->set_rules('nama','Nama Slide','required',
                array('required' => '%s harus diisi'));


    if($valid->run()){
                $config['upload_path']          = './upload/slide/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Slide Baru',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/slide/tambah'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/slide/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/slide/thumbs/'.$upload_data['uploads']['file_name'];
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
                  'kategori' => $i->post('kategori'),  
                  'gambar' => $upload_data['uploads']['file_name'],
                  'urutan' => $i->post('urutan'), 
                  'tanggal_input' => date('Y-m-d H:i:s'),
                  'pengguna' => $this->session->userdata('nama'),
                               
                    );
      $this->Slide_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
      redirect(base_url('back/slide'),'refresh');
    }
  }
  // tampil awal ketika tambah
      $data = array('title' => 'Data Slide Baru',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/slide/tambah'
                 );
     $this->load->view('back/layout/wrapper', $data, FALSE);

}

 

  public function edit($id_slide)
  {
   
  $slide = $this->Slide_model->detail($id_slide);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('nama','Nama Slide','required',
      array('required' => '%s harus diisi'));
   // $valid->set_rules('password', 'Password', 'required');
  // $valid->set_rules('password2', 'Konfirmasi', 'required|matches[password]',
  // array('required' => '%s harus diisi',
  //       'matches' => 'Password tidak sama')
  // );

    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/slide/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Slide Edit',
                  'konfigurasi' => $konfigurasi,
                  'slide' => $slide,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'dashboard/slide/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/slide/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/slide/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 
 
    $i = $this->input;
         $data = array('id_slide' => $id_slide,
                        'nama' => $i->post('nama'),  
                        'deskripsi' => $i->post('deskripsi'),  
                        'kategori' => $i->post('kategori'),  
                        'gambar' => $upload_data['uploads']['file_name'],
                        'urutan' => $i->post('urutan'), 
                        'pengguna' => $this->session->userdata('nama'),
                    );
      $this->Slide_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/slide'),'refresh');
    }
  }else{
     $i = $this->input;
    
     $data = array('id_slide' => $id_slide,
                  'nama' => $i->post('nama'),  
                  'deskripsi' => $i->post('deskripsi'),  
                  'kategori' => $i->post('kategori'),  
                  'urutan' => $i->post('urutan'), 
                  'pengguna' => $this->session->userdata('nama'),
                    );
      $this->Slide_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/slide'),'refresh');

  }
}
     $data = array('title' => 'Data Slide Edit',
                   'konfigurasi' => $konfigurasi,
                   'slide' => $slide,
                   'isi' => 'back/slide/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

  
  }



  public function delete($id_slide)
  {
     $slide =$this->Slide_model->detail($id_slide);
    unlink('./upload/slide/'.$slide->gambar);
    unlink('./upload/slide/thumbs/'.$slide->gambar);
     $data = array('id_slide' => $id_slide);
     $this->Slide_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/slide'),'refresh');

  }


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */