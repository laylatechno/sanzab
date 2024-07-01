<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('string');
		$this->load->model('Donasi_model');
  }

  public function index()
  {
      $ip    = $this->input->ip_address(); // Mendapatkan IP user
      $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
      $waktu = time(); //
      $timeinsert = date('l, h:i:s A');
        
      // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
      $s = $this->db->query("SELECT * FROM visitor WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
      $ss = isset($s)?($s):0;
        
       
      // Kalau belum ada, simpan data user tersebut ke database
      if($ss == 0){
      $this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
      }
       
      // Jika sudah ada, update
      else{
      $this->db->query("UPDATE visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
      }
       
        
      $pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
       
      $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
       
      $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
       
      $bataswaktu = time() - 300;
       
      $pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
        
       
      $data['pengunjunghariini']=$pengunjunghariini;
      $data['totalpengunjung']=$totalpengunjung;
      $data['pengunjungonline']=$pengunjungonline;

      $visitor = $this->Visitor_model->listing();
      $listing_berita_favorit = $this->Berita_model->listing_berita_favorit();
      $team = $this->Team_model->listing();
      $konfigurasi = $this->Konfigurasi_model->listing();
      $galeri = $this->Galeri_model->listing();
      $galeri_footer = $this->Galeri_model->listing_footer();
      $layanan = $this->Layanan_model->listing();
      $agenda = $this->Agenda_model->listing();
      $slide = $this->Slide_model->listing();
      $statistik = $this->Statistik_model->listing();
      $berita = $this->Berita_model->listing_home();
      $summaryDonasi = $this->Donasi_model->summaryDonasi();
      $data = array('title'   => 'Baznas Kota Tasik',  
                    'team' => $team,
                    'statistik' => $statistik,
                    'agenda' => $agenda,
                    'berita' => $berita,
                    'galeri' => $galeri,
                    'galeri_footer' => $galeri_footer,
                    'slide' => $slide,
                    'konfigurasi'   => $konfigurasi, 
                    'layanan'      => $layanan,
                    'visitor' => $visitor,
                    'pengunjunghariini' => $pengunjunghariini,
                    'totalpengunjung' => $totalpengunjung,
                    'pengunjungonline' => $pengunjungonline,
                    'listing_berita_favorit'      => $listing_berita_favorit, 
                    'isi'        => 'home/list',
                    'sum_donasi' => $summaryDonasi
            );
    $this->load->view('layout/wrapper', $data, FALSE);
  }
 

public function download()
{
    $galeri = $this->Galeri_model->listing();
  $download = $this->Download_model->listing();
  $slide = $this->Slide_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();  
    $galeri_footer = $this->Galeri_model->listing_footer();
 
  $data = array('title'   => 'Halaman Download',
          'konfigurasi' => $konfigurasi, 
                  'download' => $download,
                   'galeri_footer' => $galeri_footer,
                  'galeri'      => $galeri, 
                  'slide' => $slide,
          'isi'     => 'download/list'
          );
  $this->load->view('layout/wrapper', $data, FALSE);
}



  

  

}
