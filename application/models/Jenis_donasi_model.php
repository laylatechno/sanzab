<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_donasi_model extends CI_Model {
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'jenis_donasi';
    }

    public function getJenisDonasi($where = null, $orderBy = null, $orderDesc = null)
    {
        $this->db->select('*');
        $this->db->from($this->table);

        if ($where != null) {
            $this->db->where($where);
        }

        if ($orderBy != null && $orderDesc) {
            $this->db->order_by($orderBy, $orderDesc);
        }
        
        return $this->db->get()->result();
    }

    public function findWhere($where)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);

        return $this->db->get()->row();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }
    
    public function delete($data)
    {
        $this->db->delete($this->table, $data);
    }
}