<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {
	
public function __construct()
{
	parent::__construct();
	$this->load->database();
}

// Berikut script jika crud hanya satu 
public function listing()
{
	$query=$this->db->get('konfigurasi');
	return $query->row();
}
	// edit
public function edit($data){
$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
$this->db->update('konfigurasi',$data);	
}

 
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */