<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('kategori_berita');
	$this->db->order_by('id_kategori_berita','desc');
	$query = $this->db->get();
	return $query->result();
}
public function read($slug_kategori_berita)
{
	$this->db->select('*');
	$this->db->from('kategori_berita');
	$this->db->where('slug_kategori_berita', $slug_kategori_berita);
	$this->db->order_by('id_kategori_berita','desc');
	$query = $this->db->get();
	return $query->row();
}

public function detail($id_kategori_berita)
{
	$this->db->select('*');
	$this->db->from('kategori_berita');
	$this->db->where('id_kategori_berita', $id_kategori_berita);
	$this->db->order_by('id_kategori_berita','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('kategori_berita',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
	$this->db->delete('kategori_berita',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
	$this->db->update('kategori_berita',$data);
	 
}



}