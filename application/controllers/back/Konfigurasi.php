<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->simple_login->cek_login_back();
  }
	public function index()
	{

		$konfigurasi=$this->Konfigurasi_model->listing();
    $pengguna=$this->Pengguna_model->listing();
		$valid = $this->form_validation;
	  $valid->set_rules('nama','Nama Website','required',
	      array('required' => '%s harus diisi'));

	   
	    if($valid->run()===FALSE){
	    $data = array('title' => 'Konfigurasi Website',
	    			  'konfigurasi' =>$konfigurasi,
               'pengguna' =>$pengguna,
	                  'isi' => 'back/konfigurasi/list'
	  );
	    $this->load->view('back/layout/wrapper', $data, FALSE);
	  }else{
	   $i=$this->input;
		
	$data = array(  'id_konfigurasi'=>$konfigurasi->id_konfigurasi,
					'nama' =>$i->post('nama'),
					'alamat' =>$i->post('alamat'),
					'kota' =>$i->post('kota'),
					'website' =>$i->post('website'),
					'email' =>$i->post('email'),
					'facebook' =>$i->post('facebook'),
					'instagram' =>$i->post('instagram'),
					'twitter' =>$i->post('twitter'),
					'youtube' =>$i->post('youtube'),
					'link' =>$i->post('link'),
					'wa' =>$i->post('wa'),
					'no_telp' =>$i->post('no_telp'),
					'rekening_1' =>$i->post('rekening_1'),
          'rekening_2' =>$i->post('rekening_2'),
          'rekening_3' =>$i->post('rekening_3'),
					'deskripsi_1' =>$i->post('deskripsi_1'),
					'deskripsi_2' =>$i->post('deskripsi_2'),
					'deskripsi_3' =>$i->post('deskripsi_3'),
          'footer' =>$i->post('footer'),
          ' pengguna' => $this->session->userdata('nama'),
					'keywords' =>$i->post('keywords'),
					'metateks' =>$i->post('metateks'),
					'tagline' =>$i->post('tagline')					 
				  );
		$this->Konfigurasi_model->edit($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
		redirect(base_url('back/konfigurasi'),'refresh');
			}
	}




	
// konfigurasi logo
  public function logo()
  {
  
  $konfigurasi=$this->Konfigurasi_model->listing();
  $valid = $this->form_validation;
    $valid->set_rules('nama','Nama Website','required',
      array('required' => '%s harus diisi'));   
    if($valid->run()){
      if(!empty($_FILES['logo']['name'])){

                $config['upload_path']          = './upload/konfigurasi/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('logo')){
       
     $data = array('title' => 'Konfigurasi logo',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/konfigurasi/list'
  );
   $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/konfigurasi/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/konfigurasi/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
    $i = $this->input;
    $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                  'nama'  => $i->post('nama'),
                  'logo' => $upload_data['uploads']['file_name']
                    );
      $this->Konfigurasi_model->edit($data);
      $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
     redirect('back/konfigurasi','refresh');
    }
  }else{
    $i = $this->input;
    $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                  'nama'  => $i->post('nama')
                  );
      $this->Konfigurasi_model->edit($data);
      $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
      redirect('back/konfigurasi','refresh');

  }
}
      $data = array('title' => 'Konfigurasi logo',
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/konfigurasi/list'
      );
   $this->load->view('back/layout/wrapper', $data, FALSE);
  }


  // konfigurasi icon
  public function icon()
  {
  
  $konfigurasi=$this->Konfigurasi_model->listing();
  $valid = $this->form_validation;
    $valid->set_rules('nama','Nama Website','required',
      array('required' => '%s harus diisi'));   
    if($valid->run()){
      if(!empty($_FILES['icon']['name'])){

                $config['upload_path']          = './upload/konfigurasi/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('icon')){
       
     $data = array('title' => 'Konfigurasi icon',
                  'konfigurasi' => $konfigurasi,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'back/konfigurasi/list'
  );
   $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());
    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/konfigurasi/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/konfigurasi/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
    $i = $this->input;
    $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                  'nama'  => $i->post('nama'),
                  'icon' => $upload_data['uploads']['file_name']
                    );
      $this->Konfigurasi_model->edit($data);
      $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
     redirect('back/konfigurasi','refresh');
    }
  }else{
    $i = $this->input;
    $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                  'nama'  => $i->post('nama')
                  );
      $this->Konfigurasi_model->edit($data);
      $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
      redirect('back/konfigurasi','refresh');

  }
}
      $data = array('title' => 'Konfigurasi icon',
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/konfigurasi/list'
      );
   $this->load->view('back/layout/wrapper', $data, FALSE);
  }


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */