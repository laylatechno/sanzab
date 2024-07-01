<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Jenis_donasi_model');
      $this->load->model('Donasi_model');
      $this->simple_login->cek_login_back();
    }

    public function index()
    {
        $donasi = $this->Jenis_donasi_model->getJenisDonasi();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $data = array('title' => 'Master Data Donasi',
                      'donasi' => $donasi,
                      'konfigurasi' => $konfigurasi,
                      'isi' => 'back/donasi/list'
                    );

        $this->load->view('back/layout/wrapper', $data, FALSE);
    }

    public function tambah()
    {
        $konfigurasi = $this->Konfigurasi_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('nama', 'Nama Donasi', 'required', array('required' => '%s harus diisi'));

        if($valid->run()){
            $upload_path = './upload/donasi/';
            $upload_thumb_path = './upload/donasi/thumbs/';

            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }

            if (!is_dir($upload_thumb_path)) {
                mkdir($upload_thumb_path, 0777, TRUE);
            }

            $config['upload_path']          = $upload_path;
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;
          
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){
                $data = array('title' => 'Data Donasi Baru',
                                'konfigurasi' => $konfigurasi,
                                'error' => $this->upload->display_errors(),
                                'isi' => 'back/donasi/tambah'
                              );
                $this->load->view('back/layout/wrapper', $data, FALSE);
            } else {
                $upload_data=array('uploads'=>$this->upload->data());

                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_path . $upload_data['uploads']['file_name'];
                // gambar versi kecilpindahkan
                $config['new_image']= $upload_thumb_path . $upload_data['uploads']['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 200;
                $config['height']       = 200;
                $config['thumb_marker']='';
              
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $slug = url_title($this->input->post('nama'),'dash',TRUE);
                $i = $this->input;
                $data = array('slug' => $slug,
                              'nama' => $i->post('nama'),
                              'keterangan' => $i->post('keterangan'),
                              'gambar' => $upload_data['uploads']['file_name'],
                              'created_at' => date('Y-m-d H:i:s'),
                              'updated_at' => date('Y-m-d H:i:s')
                            );

                $this->Jenis_donasi_model->create($data);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
                redirect(base_url('back/donasi'),'refresh');
            }
        }

        // tampil awal ketika tambah
        $data = array('title' => 'Data Donasi Baru',
                      'konfigurasi' => $konfigurasi,
                      'isi' => 'back/donasi/tambah'
                    );

        $this->load->view('back/layout/wrapper', $data, FALSE);
    }

    public function edit($id_donasi)
    {
        $donasi = $this->Jenis_donasi_model->findWhere(['id' => $id_donasi]);
        $konfigurasi = $this->Konfigurasi_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama Donasi', 'required', array('required' => '%s harus diisi'));
 

        if($valid->run()){
            if(!empty($_FILES['gambar']['name'])){
                
                $upload_path = './upload/donasi/';
                $upload_thumb_path = './upload/donasi/thumbs/';

                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, TRUE);
                }

                if (!is_dir($upload_thumb_path)) {
                    mkdir($upload_thumb_path, 0777, TRUE);
                }

                $config['upload_path']          = $upload_path;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
          
                $this->load->library('upload', $config);
        
                if ( ! $this->upload->do_upload('gambar')) {
                    $data = array('title' => 'Data Donasi Edit',
                                  'konfigurasi' => $konfigurasi,
                                  'donasi' => $donasi,
                                  'error' => $this->upload->display_errors(),
                                  'isi' => 'back/donasi/edit'
                                );

                    $this->load->view('back/layout/wrapper', $data, FALSE);
                } else {
                    $upload_data=array('uploads'=>$this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $upload_path . $upload_data['uploads']['file_name'];
                    // gambar versi kecilpindahkan
                    $config['new_image']= $upload_thumb_path . $upload_data['uploads']['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 200;
                    $config['height']       = 200;
                    $config['thumb_marker']=''; 
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize(); 
                    $slug = url_title($this->input->post('judul'),'dash',TRUE);
                    $i = $this->input;
                    $data = array('id' => $id_donasi,
                                    'slug' => $slug,
                                    'nama' => $i->post('nama'),
                                    'keterangan' => $i->post('keterangan'),
                                    'gambar' => $upload_data['uploads']['file_name'], 
                                    'updated_at' => date('Y-m-d H:i:s')
                                );

                      $this->Jenis_donasi_model->update($data);
                      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
                      redirect(base_url('back/donasi'),'refresh');
                }
            } else {
                $slug = url_title($this->input->post('nama'),'dash',TRUE);
                $i = $this->input;
                $data = array('id' => $id_donasi,
                              'slug' => $slug,
                              'nama' => $i->post('nama'), 
                              'keterangan' => $i->post('keterangan'), 
                              'updated_at' => date('Y-m-d H:i:s')
                          );

                $this->Jenis_donasi_model->update($data);
                $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
                redirect(base_url('back/donasi'),'refresh');
            }
        }

        $data = array('title' => 'Data Donasi Edit',
                      'konfigurasi' => $konfigurasi,
                      'donasi' => $donasi,
                      'isi' => 'back/donasi/edit'
                    );
        $this->load->view('back/layout/wrapper', $data, FALSE);
    }

    public function delete($id_donasi)
    {
        $donasi = $this->Jenis_donasi_model->findWhere(['id' => $id_donasi]);
        $guestDonation = $this->Donasi_model->getDonasi(['id_jenis_donasi' => $id_donasi]);

        if ($guestDonation) {
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus');  
            return redirect(base_url('back/donasi'),'refresh');
        }

        unlink('./upload/berita/' . $donasi->gambar);
        unlink('./upload/berita/thumbs/' . $donasi->gambar);

        $data = array('id' => $id_donasi);
        $this->Jenis_donasi_model->delete($data);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
        redirect(base_url('back/donasi'),'refresh');
    }
}