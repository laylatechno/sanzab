<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('faq');
	$this->db->order_by('id_faq','ASC');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_faq)
{
	$this->db->select('*');
	$this->db->from('faq');
	$this->db->where('id_faq', $id_faq);
	$this->db->order_by('id_faq','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('faq',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_faq',$data['id_faq']);
	$this->db->delete('faq',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_faq',$data['id_faq']);
	$this->db->update('faq',$data);
	 
}



}