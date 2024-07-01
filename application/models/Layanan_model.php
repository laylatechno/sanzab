<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('layanan');
	$this->db->order_by('id_layanan','ASC');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_layanan)
{
	$this->db->select('*');
	$this->db->from('layanan');
	$this->db->where('id_layanan', $id_layanan);
	$this->db->order_by('id_layanan','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('layanan',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_layanan',$data['id_layanan']);
	$this->db->delete('layanan',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_layanan',$data['id_layanan']);
	$this->db->update('layanan',$data);
	 
}



}