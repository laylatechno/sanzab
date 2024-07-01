<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*,
					  COUNT(pengguna.id_pengguna) AS total_pengguna');
	$this->db->from('pengguna');
	$this->db->group_by('pengguna.id_pengguna');
	$this->db->order_by('id_pengguna','desc');
	$query = $this->db->get();
	return $query->result();
}


public function total()
{
	$this->db->select('*,
					  COUNT(pengguna.id_pengguna) AS total_pengguna');
	$this->db->from('pengguna');
	 
	$this->db->order_by('id_pengguna','desc');
	$query = $this->db->get();
	return $query->result();
}


public function detail($id_pengguna)
{
	$this->db->select('*');
	$this->db->from('pengguna');
	$this->db->where('id_pengguna', $id_pengguna);
	$this->db->order_by('id_pengguna','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('pengguna',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_pengguna',$data['id_pengguna']);
	$this->db->delete('pengguna',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_pengguna',$data['id_pengguna']);
	$this->db->update('pengguna',$data);
	 
}



}