<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login_back();
	 
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
      $this->db->query("UPDATE visitor SET hits=hits+1-1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
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
	// $pengguna = $this->Pengguna_model->listing();
	// $kontak = $this->Kontak_model->listing(); 
	$total_kontak = $this->Kontak_model->total();
	$total_pengguna = $this->Pengguna_model->total();
	$konfigurasi = $this->Konfigurasi_model->listing();
	$pengguna = $this->Pengguna_model->listing();

	$data = array('title'		=> 'Halaman Dashboard Admin',
				  'konfigurasi' => $konfigurasi,
				  'total_kontak' => $total_kontak,
				  'total_pengguna' => $total_pengguna,
				     'pengunjunghariini' => $pengunjunghariini,
                     'totalpengunjung' => $totalpengunjung,
                     'pengunjungonline' => $pengunjungonline,
                     'visitor' => $visitor,
	    		  'isi'			=> 'back/dashboard/list'
					);
	$this->load->view('back/layout/wrapper', $data, FALSE);
	}



public function resume()
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
      $this->db->query("UPDATE visitor SET hits=hits+1-1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
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
   // $pengguna = $this->Pengguna_model->listing();
   // $kontak = $this->Kontak_model->listing(); 
   $total_kontak = $this->Kontak_model->total();
   $total_pengguna = $this->Pengguna_model->total();
   $konfigurasi = $this->Konfigurasi_model->listing();
   $pengguna = $this->Pengguna_model->listing();

   $data = array('title'      => 'Halaman Resume Statistik',
              'konfigurasi' => $konfigurasi,
              'total_kontak' => $total_kontak,
              'total_pengguna' => $total_pengguna,
                 'pengunjunghariini' => $pengunjunghariini,
                     'totalpengunjung' => $totalpengunjung,
                     'pengunjungonline' => $pengunjungonline,
                     'visitor' => $visitor,
              'isi'        => 'back/dashboard/resume'
               );
   $this->load->view('back/layout/wrapper', $data, FALSE);
   }



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */