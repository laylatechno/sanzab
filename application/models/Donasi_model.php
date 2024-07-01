<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi_model extends CI_Model {
    protected $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'donasi';
    }

    public function getDonasi($where = null, $orderBy = null, $orderDesc = null)
    {
        $this->db->select($this->table . '.*, jenis_donasi.nama as jenis_donasi');
        $this->db->from($this->table);
        $this->db->join('jenis_donasi', 'jenis_donasi.id = donasi.id_jenis_donasi', 'left');

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
        $this->db->select($this->table . '.*, jenis_donasi.nama as nama_donasi');
        $this->db->from($this->table);
        $this->db->join('jenis_donasi', 'jenis_donasi.id = ' . $this->table . '.id_jenis_donasi', 'left');
        $this->db->where($where);

        return $this->db->get()->row();
    }

    public function getJenisDonasi($where = null, $orderBy = null, $orderDesc = null)
    {
        $this->db->select('*');
        $this->db->from('jenis_donasi');

        if ($where != null) {
            $this->db->where($where);
        }

        if ($orderBy != null && $orderDesc) {
            $this->db->order_by($orderBy, $orderDesc);
        }
        
        return $this->db->get()->result();
    }

    public function findJenisDonasi($id)
    {
        $this->db->select('*');
        $this->db->from('jenis_donasi');
        $this->db->where('id', $id);
        
        return $this->db->get()->row();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    public function delete($data)
    {
        $this->db->delete($this->table, $data);
    }
    
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($this->table, $data);
    }

    public function updateTransaksi($id, $data)
    {
        $updateData['id'] = $id;
        $updateData['transaction_status'] = isset($data->transaction_status) ? $data->transaction_status : null;
        $updateData['bank'] = isset($data->bank) ? $data->bank : null;
        $updateData['card_type'] = isset($data->card_type) ? $data->card_type : null;
        $updateData['payment_option_type'] = isset($data->payment_option_type) ? $data->payment_option_type : null;
        $updateData['shopeepay_reference_number'] = isset($data->shopeepay_reference_number) ? $data->shopeepay_reference_number : null;
        $updateData['payment_code'] = isset($data->payment_code) ? $data->payment_code : null;
        $updateData['store'] = isset($data->store) ? $data->store : null;
        $updateData['expiry_time'] = isset($data->expiry_time) ? $data->expiry_time : null;
        $updateData['currency'] = isset($data->currency) ? $data->currency : null;
        $updateData['settlement_time'] = isset($data->settlement_time) ? $data->settlement_time : null;
        
        $this->update($updateData);
    }

    public function summaryDonasi()
    {
        return $this->db->query('SELECT id, nama, slug, gambar, (SELECT SUM(jumlah) FROM donasi WHERE id_jenis_donasi = jenis_donasi.id AND transaction_status="settlement") as total FROM jenis_donasi')
                        ->result();
    }
}