<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('galeri');
	$this->db->order_by('id_galeri','desc');
	$query = $this->db->get();
	return $query->result();
}

public function listing_footer()
{
	$this->db->select('*');
	$this->db->from('galeri');
	$this->db->order_by('id_galeri','desc');
	$this->db->limit(6);
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_galeri)
{
	$this->db->select('*');
	$this->db->from('galeri');
	$this->db->where('id_galeri', $id_galeri);
	$this->db->order_by('id_galeri','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('galeri',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_galeri',$data['id_galeri']);
	$this->db->delete('galeri',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_galeri',$data['id_galeri']);
	$this->db->update('galeri',$data);
	 
}



}