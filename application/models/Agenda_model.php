<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('agenda');
	$this->db->order_by('id_agenda','desc');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_agenda)
{
	$this->db->select('*');
	$this->db->from('agenda');
	$this->db->where('id_agenda', $id_agenda);
	$this->db->order_by('id_agenda','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('agenda',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_agenda',$data['id_agenda']);
	$this->db->delete('agenda',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_agenda',$data['id_agenda']);
	$this->db->update('agenda',$data);
	 
}

public function read($nama)
{
    $this->db->select('*');
	$this->db->from('agenda');

	$this->db->where('agenda.nama',$nama);
	$this->db->group_by('agenda.id_agenda');
	$this->db->order_by('id_agenda','desc');
 
	$query = $this->db->get();
	return $query->row();
}





}