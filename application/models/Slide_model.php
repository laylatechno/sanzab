<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('slide');
	$this->db->order_by('urutan','desc');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_slide)
{
	$this->db->select('*');
	$this->db->from('slide');
	$this->db->where('id_slide', $id_slide);
	$this->db->order_by('id_slide','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('slide',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_slide',$data['id_slide']);
	$this->db->delete('slide',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_slide',$data['id_slide']);
	$this->db->update('slide',$data);
	 
}



}