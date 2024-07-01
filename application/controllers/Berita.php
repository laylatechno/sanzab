<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
 
  }

  // Tampilan awal untuk berita
  public function index()
  {
    
    $this->session->unset_userdata('keyword' );
     
    $konfigurasi = $this->Konfigurasi_model->listing();
    $berita = $this->Berita_model->listing();
    $listing_kategori_berita = $this->Berita_model->listing_kategori_berita();
    $listing_berita_rekomendasi = $this->Berita_model->listing_berita_rekomendasi();
    $galeri_footer = $this->Galeri_model->listing_footer();
    $listing_berita_favorit = $this->Berita_model->listing_berita_favorit();
    $galeri = $this->Galeri_model->listing();
     

    $this->load->library('pagination');

    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);

    } else{
      $data['keyword'] = $this->session->userdata('keyword');
    }
    
    $config['base_url'] = base_url().'berita/index/';
    $this->db->like('judul', $data['keyword'] );
    $this->db->from('berita');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['use_page_numbers'] = TRUE;
    $config['per_page'] = 6;
    $config['uri_segment'] = 3;
    $config['num_links'] = 3;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<span class="sr-only"><li class="disabled"><li class="active"><a href="#">';
    $config['last_tag_close'] = '</a></li></li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<div>';
    $config['next_tag_close'] = '</div>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<div>';
    $config['prev_tag_close'] = '</div>';
    $config['cur_tag_open'] = '<b>';
    $config['cur_tag_close'] = '</b>';
    $config['first_url'] = base_url().'/berita';
    
    $this->pagination->initialize($config);
    
    $page = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
    $berita = $this->Berita_model->berita($config['per_page'],$page, $data['keyword'] );

    $data = array('title' => 'Berita',
          'listing_kategori_berita' => $listing_kategori_berita,
          'listing_berita_rekomendasi' => $listing_berita_rekomendasi,
          'listing_berita_favorit' => $listing_berita_favorit,
          'galeri' => $galeri,
                   'galeri_footer' => $galeri_footer,
            'total_rows'  => $data['total_rows'],
          'pagin' => $this->pagination->create_links(),
            'berita' => $berita,
            'konfigurasi' => $konfigurasi,
             
            'isi'  => 'berita/list'
        );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

 
 public function kategori_berita($slug_kategori_berita)
  {
    $this->session->unset_userdata('keyword' );
     
    $kategori_berita = $this->Kategori_berita_model->read($slug_kategori_berita);
    $id_kategori_berita = $kategori_berita->id_kategori_berita;
    $konfigurasi = $this->Konfigurasi_model->listing();
    $listing_kategori_berita = $this->Berita_model->listing_kategori_berita();
    $listing_berita_rekomendasi = $this->Berita_model->listing_berita_rekomendasi();
    $galeri_footer = $this->Galeri_model->listing_footer();
     $listing_berita_favorit = $this->Berita_model->listing_berita_favorit();
     
    $galeri = $this->Galeri_model->listing();
     
    $this->load->library('pagination');
    
    
    $config['base_url'] = base_url().'berita/kategori_berita/'.$slug_kategori_berita.'/index/';
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['use_page_numbers'] = TRUE;
    $config['per_page'] = 2;
    $config['uri_segment'] = 5;
    $config['num_links'] = 5;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<span class="sr-only"><li class="disabled"><li class="active"><a href="#">';
    $config['last_tag_close'] = '</a></li></li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<div>';
    $config['next_tag_close'] = '</div>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<div>';
    $config['prev_tag_close'] = '</div>';
    $config['cur_tag_open'] = '<b>';
    $config['cur_tag_close'] = '</b>';
    $config['first_url'] = base_url().'/berita/kategori_berita/'.$slug_kategori_berita;
    
    $this->pagination->initialize($config);
    
    $page = ($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
    $berita = $this->Berita_model->kategori_berita($id_kategori_berita, $config['per_page'],$page);

  
    $data = array('title' => $kategori_berita->nama_kategori_berita,
            'konfigurasi' => $konfigurasi,
            'galeri' => $galeri,
            'total_rows'  => $data['total_rows'],
                     'galeri_footer' => $galeri_footer,
            'listing_kategori_berita' => $listing_kategori_berita,
            'listing_berita_rekomendasi' => $listing_berita_rekomendasi,
            'listing_berita_favorit' => $listing_berita_favorit,
            'berita' => $berita,
            'pagin' => $this->pagination->create_links(),
            'isi'  => 'berita/list'
        );
    $this->load->view('layout/wrapper', $data, FALSE);
  }

public function detail($slug)
  {
    $konfigurasi = $this->Konfigurasi_model->listing();
    $berita = $this->Berita_model->read($slug);
    $id_berita = $berita->id_berita;
    $listing_kategori_berita = $this->Berita_model->listing_kategori_berita();
    $listing_berita_rekomendasi = $this->Berita_model->listing_berita_rekomendasi();
    $listing_berita_favorit = $this->Berita_model->listing_berita_favorit();
    $baca_berita = $this->Berita_model->hitung_baca($slug);
     $galeri_footer = $this->Galeri_model->listing_footer();
    $galeri = $this->Galeri_model->listing();


    $data = array('title' => $berita->judul,
             'listing_kategori_berita' => $listing_kategori_berita,
          'listing_berita_rekomendasi' => $listing_berita_rekomendasi,
          'listing_berita_favorit' => $listing_berita_favorit,
            'konfigurasi' => $konfigurasi,
             'galeri_footer' => $galeri_footer,
            'galeri' => $galeri,
            'berita' => $berita,
            'baca_berita' => $baca_berita, 
            'isi'  => 'berita/detail'
        );
    $this->load->view('layout/wrapper', $data, FALSE);
  }


   


}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */