<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('*');
	$this->db->from('bayar');
	$this->db->order_by('id_bayar','desc');
	$query = $this->db->get();
	return $query->result();
}

public function detail($id_bayar)
{
	$this->db->select('*');
	$this->db->from('bayar');
	$this->db->where('id_bayar', $id_bayar);
	$this->db->order_by('id_bayar','desc');
	$query = $this->db->get();
	return $query->row();
}
 
public function sudah_login ($email, $nama_bayar)
{
	 
	$this->db->select('*');
	$this->db->from('bayar');
	$this->db->where('email', $email);
	$this->db->where('nama_bayar', $nama_bayar);
	$this->db->order_by('id_bayar','desc');
	$query = $this->db->get();
	return $query->row();
	 
}

public function tambah($data)
{
	$this->db->insert('bayar',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_bayar',$data['id_bayar']);
	$this->db->delete('bayar',$data);
	 
}


public function edit($data)
{
	$this->db->where('id_bayar',$data['id_bayar']);
	$this->db->update('bayar',$data);
	 
}


public function login($email, $password)
{
	$this->db->select('*');
	$this->db->from('bayar');
	$this->db->where(array('email' =>$email,
						   'password' =>SHA1($password)));
	$this->db->order_by('id_bayar','desc');
	$query = $this->db->get();
	return $query->row();
}


	




}