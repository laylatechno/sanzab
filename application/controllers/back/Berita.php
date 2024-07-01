<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
public function __construct()
{
	parent::__construct();
  $this->load->model('Berita_model');
  $this->load->model('Kategori_berita_model');
  $this->load->model('Konfigurasi_model');
  $this->simple_login->cek_login_back();
}

  public function index()
  {
  	$berita = $this->Berita_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
    $kategori_berita = $this->Kategori_berita_model->listing();
    $data = array('title' => 'Halaman Berita',
    				      'berita' => $berita,
                  'kategori_berita' => $kategori_berita,
                  'konfigurasi' => $konfigurasi,
    				      'isi' => 'back/berita/list'
	);
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


  public function tambah()
  {
    $berita = $this->Berita_model->listing();
    $kategori_berita = $this->Kategori_berita_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();


    $valid = $this->form_validation;
    $valid->set_rules('judul','Judul Berita','required',
                array('required' => '%s harus diisi'));
    $valid->set_rules('urutan', 'Urutan', 'is_unique[berita.urutan]',
                array('is_unique' => '%s sudah ada' ));



    if($valid->run()){
                $config['upload_path']          = './upload/berita/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Berita Baru',
                  'konfigurasi' => $konfigurasi,
                  'kategori_berita' => $kategori_berita,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/berita/tambah'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/berita/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/berita/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
   
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
    $slug = url_title($this->input->post('judul'),'dash',TRUE);
    $i = $this->input;
    $data = array('id_kategori_berita' => $i->post('id_kategori_berita'), 
                  'slug' => $slug, 
                  'judul' => $i->post('judul'), 
                  'deskripsi' => $i->post('deskripsi'), 
                  'keywords' => $i->post('keywords'), 
                  'status' => $i->post('status'), 
                  'favorit' => $i->post('favorit'), 
                  'rekomendasi' => $i->post('rekomendasi'),
                  'urutan' => $i->post('urutan'), 
                  'gambar' => $upload_data['uploads']['file_name'],
                  'tanggal_input' => date('Y-m-d H:i:s'),
                   'hits' =>'1',
                  'pengguna' => $this->session->userdata('nama'),
                               
                    );
      $this->Berita_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
      redirect(base_url('back/berita'),'refresh');
    }
  }
  // tampil awal ketika tambah
      $data = array('title' => 'Data Berita Baru',
                   'konfigurasi' => $konfigurasi,
                   'kategori_berita' => $kategori_berita,
                   'isi' => 'back/berita/tambah'
                 );
     $this->load->view('back/layout/wrapper', $data, FALSE);

}

 

  public function edit($id_berita)
  {
   $kategori_berita = $this->Kategori_berita_model->listing();
  $berita = $this->Berita_model->detail($id_berita);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('judul','Nama Berita','required',
      array('required' => '%s harus diisi'));
 

    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/berita/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Berita Edit',
                  'konfigurasi' => $konfigurasi,
                  'berita' => $berita,
                  'kategori_berita' => $kategori_berita,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/berita/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/berita/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/berita/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 
    $slug = url_title($this->input->post('judul'),'dash',TRUE);
    $i = $this->input;
         $data = array('id_berita' => $id_berita,
                        'id_kategori_berita' => $i->post('id_kategori_berita'),  
                        'slug' => $slug,
                        'judul' => $i->post('judul'), 
                        'deskripsi' => $i->post('deskripsi'), 
                        'keywords' => $i->post('keywords'), 
                        'status' => $i->post('status'), 
                        'favorit' => $i->post('favorit'), 
                        'urutan' => $i->post('urutan'), 
                        'rekomendasi' => $i->post('rekomendasi'),
                        'gambar' => $upload_data['uploads']['file_name'],
                        'pengguna' => $this->session->userdata('nama')
                    );
      $this->Berita_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/berita'),'refresh');
    }
  }else{
    $slug = url_title($this->input->post('judul'),'dash',TRUE);
     $i = $this->input;
    
          $data = array('id_berita' => $id_berita,
                       'id_kategori_berita' => $i->post('id_kategori_berita'),  
                        'slug' => $slug,
                        'judul' => $i->post('judul'), 
                        'deskripsi' => $i->post('deskripsi'), 
                        'keywords' => $i->post('keywords'), 
                        'status' => $i->post('status'), 
                        'favorit' => $i->post('favorit'), 
                        'urutan' => $i->post('urutan'), 
                        'rekomendasi' => $i->post('rekomendasi'),
                        'pengguna' => $this->session->userdata('nama')
                    );
      $this->Berita_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/berita'),'refresh');

  }
}
     $data = array('title' => 'Data Berita Edit',
                   'konfigurasi' => $konfigurasi,
                   'berita' => $berita,
                   'kategori_berita' => $kategori_berita,
                   'isi' => 'back/berita/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

  
  }


  public function delete($id_berita)
  {
     $berita =$this->Berita_model->detail($id_berita);
    unlink('./upload/berita/'.$berita->gambar);
    unlink('./upload/berita/thumbs/'.$berita->gambar);
     $data = array('id_berita' => $id_berita);
     $this->Berita_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/berita'),'refresh');

  }


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */