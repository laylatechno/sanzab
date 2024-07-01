<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

    public $table = 'kontak';
    public $id = 'id_kontak';
    public $order = 'DESC';



public function listing()
{
	$this->db->select('*,
					  COUNT(kontak.id_kontak) AS total_kontak');
	$this->db->from('kontak');
	$this->db->group_by('kontak.id_kontak');
	$this->db->order_by('id_kontak','desc');
	$query = $this->db->get();
	return $query->result();
}


public function total()
{
	$this->db->select('*,
					  COUNT(kontak.id_kontak) AS total_kontak');
	$this->db->from('kontak');
	 
	$this->db->order_by('id_kontak','desc');
	$query = $this->db->get();
	return $query->result();
}


public function detail($id_kontak)
{
	$this->db->select('*');
	$this->db->from('kontak');
	$this->db->where('id_kontak', $id_kontak);
	$this->db->order_by('id_kontak','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('kontak',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_kontak',$data['id_kontak']);
	$this->db->delete('kontak',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_kontak',$data['id_kontak']);
	$this->db->update('kontak',$data);
	 
}

   function total_rows($q = NULL) {
    $this->db->like('id_kontak', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('subjek', $q);
	$this->db->or_like('no_telp', $q);
	$this->db->or_like('isi', $q);
	$this->db->or_like('tanggal_kirim', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

}