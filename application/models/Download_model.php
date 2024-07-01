<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('download');
	$this->db->order_by('id_download','desc');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_download)
{
	$this->db->select('*');
	$this->db->from('download');
	$this->db->where('id_download', $id_download);
	$this->db->order_by('id_download','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('download',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_download',$data['id_download']);
	$this->db->delete('download',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_download',$data['id_download']);
	$this->db->update('download',$data);
	 
}



}