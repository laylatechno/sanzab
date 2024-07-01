<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('statistik');
	$this->db->order_by('id_statistik','ASC');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_statistik)
{
	$this->db->select('*');
	$this->db->from('statistik');
	$this->db->where('id_statistik', $id_statistik);
	$this->db->order_by('id_statistik','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('statistik',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_statistik',$data['id_statistik']);
	$this->db->delete('statistik',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_statistik',$data['id_statistik']);
	$this->db->update('statistik',$data);
	 
}



}