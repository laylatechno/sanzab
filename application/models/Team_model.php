<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*,
					  COUNT(team.id_team) AS total_team');
	$this->db->from('team');
	$this->db->group_by('team.id_team');
	$this->db->order_by('id_team','desc');
	$query = $this->db->get();
	return $query->result();
}


public function total()
{
	$this->db->select('*,
					  COUNT(team.id_team) AS total_team');
	$this->db->from('team');
	 
	$this->db->order_by('id_team','desc');
	$query = $this->db->get();
	return $query->result();
}


public function detail($id_team)
{
	$this->db->select('*');
	$this->db->from('team');
	$this->db->where('id_team', $id_team);
	$this->db->order_by('id_team','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('team',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_team',$data['id_team']);
	$this->db->delete('team',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_team',$data['id_team']);
	$this->db->update('team',$data);
	 
}



}