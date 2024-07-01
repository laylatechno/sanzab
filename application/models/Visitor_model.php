<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('visitor');
	$this->db->order_by('ip','desc');
	$query = $this->db->get();
	return $query->result();
}

public function detail($ip)
{
	$this->db->select('*');
	$this->db->from('visitor');
	$this->db->where('ip', $ip);
	$this->db->order_by('ip','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('visitor',$data);
	 
}

public function delete($data)
{
	$this->db->where('ip',$data['ip']);
	$this->db->delete('visitor',$data);
	 
}

public function edit($data)
{
	$this->db->where('ip',$data['ip']);
	$this->db->update('visitor',$data);
	 
}



}