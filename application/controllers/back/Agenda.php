<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
public function __construct()
{
	parent::__construct();
  $this->load->model('Agenda_model');
  $this->load->model('Konfigurasi_model');
  $this->simple_login->cek_login_back();
}

  public function index()
  {
  	$agenda = $this->Agenda_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Halaman Agenda',
    				      'agenda' => $agenda,
                  'konfigurasi' => $konfigurasi,
    				      'isi' => 'back/agenda/list'
	);
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


  public function tambah()
  {
    $agenda = $this->Agenda_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();


    $valid = $this->form_validation;
    $valid->set_rules('nama','Nama Agenda','required',
                array('required' => '%s harus diisi'));


    if($valid->run()){
                $config['upload_path']          = './upload/agenda/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Agenda Baru',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/agenda/tambah'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/agenda/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/agenda/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
   
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();

    $i = $this->input;
    $data = array('nama' => $i->post('nama'),  
                  'waktu_mulai' => $i->post('waktu_mulai'),
                  'waktu_selesai' => $i->post('waktu_selesai'),
                  'tempat' => $i->post('tempat'), 
                  'deskripsi' => $i->post('deskripsi'), 
                  'urutan' => $i->post('urutan'),  
                  'gambar' => $upload_data['uploads']['file_name'],
                  'tanggal_input' => date('Y-m-d H:i:s'),
                  'pengguna' => $this->session->userdata('nama'),
                               
                    );
      $this->Agenda_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
      redirect(base_url('back/agenda'),'refresh');
    }
  }
  // tampil awal ketika tambah
      $data = array('title' => 'Data Agenda Baru',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/agenda/tambah'
                 );
     $this->load->view('back/layout/wrapper', $data, FALSE);

}

 

  public function edit($id_agenda)
  {
   
  $agenda = $this->Agenda_model->detail($id_agenda);
  $konfigurasi = $this->Konfigurasi_model->listing();

  $valid = $this->form_validation;
  $valid->set_rules('nama','Nama Agenda','required',
      array('required' => '%s harus diisi'));
   // $valid->set_rules('password', 'Password', 'required');
  // $valid->set_rules('password2', 'Konfirmasi', 'required|matches[password]',
  // array('required' => '%s harus diisi',
  //       'matches' => 'Password tidak sama')
  // );

    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
 
                $config['upload_path']          = './upload/agenda/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
       $this->load->library('upload', $config);
     
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Agenda Edit',
                  'konfigurasi' => $konfigurasi,
                  'agenda' => $agenda,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/agenda/edit'
  );
      $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/agenda/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/agenda/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']=''; 
    $this->load->library('image_lib', $config);
    $this->image_lib->resize(); 
 
    $i = $this->input;
         $data = array('id_agenda' => $id_agenda,
                        'nama' => $i->post('nama'),  
                        'waktu_mulai' => $i->post('waktu_mulai'),
                        'waktu_selesai' => $i->post('waktu_selesai'),
                        'tempat' => $i->post('tempat'), 
                        'deskripsi' => $i->post('deskripsi'), 
                        'urutan' => $i->post('urutan'),  
                        'gambar' => $upload_data['uploads']['file_name'],
                        'pengguna' => $this->session->userdata('nama'),
                    );
      $this->Agenda_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
     redirect(base_url('back/agenda'),'refresh');
    }
  }else{
     $i = $this->input;
    
          $data = array('id_agenda' => $id_agenda,
                        'nama' => $i->post('nama'),  
                        'waktu_mulai' => $i->post('waktu_mulai'),
                        'waktu_selesai' => $i->post('waktu_selesai'),
                        'tempat' => $i->post('tempat'), 
                        'deskripsi' => $i->post('deskripsi'), 
                        'urutan' => $i->post('urutan'),  
                        'pengguna' => $this->session->userdata('nama'),
                    );
      $this->Agenda_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/agenda'),'refresh');

  }
}
     $data = array('title' => 'Data Agenda Edit',
                   'konfigurasi' => $konfigurasi,
                   'agenda' => $agenda,
                   'isi' => 'back/agenda/edit'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

  
  }



  public function delete($id_agenda)
  {
     $agenda =$this->Agenda_model->detail($id_agenda);
    unlink('./upload/agenda/'.$agenda->gambar);
    unlink('./upload/agenda/thumbs/'.$agenda->gambar);
     $data = array('id_agenda' => $id_agenda);
     $this->Agenda_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/agenda'),'refresh');

  }


}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */