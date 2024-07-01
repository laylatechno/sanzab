<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model{

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

public function listing()
{
	$this->db->select('berita.*,
					  kategori_berita.nama_kategori_berita,
					  kategori_berita.slug_kategori_berita');
	$this->db->from('berita');
	$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
 
	$this->db->order_by('urutan','desc');
	$query = $this->db->get();
	return $query->result();
}
public function listing_home()
{
	$this->db->select('berita.*,
					  kategori_berita.nama_kategori_berita,
					  kategori_berita.slug_kategori_berita');
	$this->db->from('berita');
	$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
	$this->db->group_by('berita.id_berita');
	$this->db->order_by('urutan','desc');
	$this->db->limit(4);
	$query = $this->db->get();
	return $query->result();
}


public function listing_berita_rekomendasi()
	{
	$this->db->select('*');
	$this->db->from('berita');
	$this->db->where('berita.rekomendasi','Ya');
	$this->db->group_by('berita.id_berita');
	$this->db->order_by('id_berita','desc');
	$this->db->limit(20);
	$query = $this->db->get();
	return $query->result();
	}


	public function listing_berita_favorit()
	{
	$this->db->select('*');
	$this->db->from('berita');
	$this->db->where('berita.favorit','Ya');
	$this->db->group_by('berita.id_berita');
	$this->db->order_by('id_berita','desc');
	$this->db->limit(5);
	$query = $this->db->get();
	return $query->result();
	}


public function listing_kategori_berita()
	{
	$this->db->select('berita.*,
					  kategori_berita.nama_kategori_berita,
					  kategori_berita.slug_kategori_berita,
					 COUNT(kategori_berita.id_kategori_berita) AS total_kategori_berita');
	$this->db->from('berita');
	$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
 	$this->db->group_by('berita.id_kategori_berita');
	$this->db->order_by('id_berita','desc');
	$query = $this->db->get();
	return $query->result();
	}

public function berita($limit,$start, $keyword=null)
	{
	if ($keyword){
		$this->db->like('judul', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		 
		$this->db->or_like('keywords', $keyword);
			
	}
    $this->db->select('berita.*,
					  kategori_berita.nama_kategori_berita,
					  kategori_berita.slug_kategori_berita');
	$this->db->from('berita');

 
	$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');

	$this->db->where('berita.status','Publish');
	$this->db->group_by('berita.id_berita');
	$this->db->order_by('id_berita','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	return $query->result();
	}

public function kategori_berita($id_kategori_berita, $limit,$start)
	{
    $this->db->select('berita.*, 
    				 kategori_berita.nama_kategori_berita,
					  kategori_berita.slug_kategori_berita');
	$this->db->from('berita');

	 
	$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
	 
	$this->db->where('berita.status','Publish');
	$this->db->where('berita.id_kategori_berita', $id_kategori_berita);
	$this->db->group_by('berita.id_berita');
	$this->db->order_by('id_berita','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
	return $query->result();
}

public function read($slug)
{
    $this->db->select('berita.*,
					 kategori_berita.nama_kategori_berita,
					  kategori_berita.slug_kategori_berita');
	$this->db->from('berita');

	 
	$this->db->join('kategori_berita', 'kategori_berita.id_kategori_berita = berita.id_kategori_berita', 'left');
	$this->db->where('berita.status','Publish');
	$this->db->where('berita.slug',$slug);
	$this->db->group_by('berita.id_berita');
	$this->db->order_by('id_berita','desc');
 
	$query = $this->db->get();
	return $query->row();
}






// beckend


public function detail($id_berita)
{
	$this->db->select('*');
	$this->db->from('berita');
	$this->db->where('id_berita', $id_berita);
	$this->db->order_by('id_berita','desc');
	$query = $this->db->get();
	return $query->row();
}

public function tambah($data)
{
	$this->db->insert('berita',$data);
	 
}

public function delete($data)
{
	$this->db->where('id_berita',$data['id_berita']);
	$this->db->delete('berita',$data);
	 
}

public function edit($data)
{
	$this->db->where('id_berita',$data['id_berita']);
	$this->db->update('berita',$data);
	 
}


public function hitung_baca($slug)
{
	$this->db->set('hits','hits+1', FALSE);
	$this->db->where('slug',$slug);
	$this->db->update('berita');
}



}