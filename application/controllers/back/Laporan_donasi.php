<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_donasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Donasi_model');
        $this->load->model('Konfigurasi_model');
        $this->load->helper('midtrans');
        $this->simple_login->cek_login_back();
    }

    public function index()
    {
        /** HAPUS DONASI YG GAGAL SNAP DAN TRANSAKSI */
        $failDonasi = $this->Donasi_model->getDonasi(['transaction_id' => null]);
        $arrId = [];

        foreach($failDonasi as $fd) {
            /** KUMPULKAN ID YG GAGAL SNAP MIDTRANS */
            if ($fd->snap_token == null && $fd->transaction_id == null) {
                $arrId[] = $fd->id;
            }

            /** KUMPULKAN ID YG TIDAK JADI TRANSAKSI LEBIH DARI 1 HARI */
            $interval = date_diff(date_create(date('Y-m-d H:i:s')), date_create($fd->created_at));

            if ($fd->transaction_id == null && $interval->format('%d') > 1) {
                $arrId[] = $fd->id;
            }
        }

        /** HAPUS BERDASARKAN ID YG DIKUMPULKAN */
        if (count($arrId) > 0) {
            $this->db->where_in('id', $arrId);
            $this->db->delete('donasi');
        }

        /** END HAPUS DONASI */

        $donasi = $this->Donasi_model->getDonasi(['transaction_status' => 'settlement'], 'id', 'desc');
        $konfigurasi = $this->Konfigurasi_model->listing();

        $data = array('title' => 'Laporan Donasi',
                      'donasi' => $donasi,
                      
                      'konfigurasi' => $konfigurasi,
                      'isi' => 'back/laporan-donasi/list'
                    );
    
        $this->load->view('back/layout/wrapper', $data, FALSE);
    }

    public function cetak()
    {
        $bayar = $this->Bayar_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();

        $data = array('title' => 'Data Bayar',
                      'bayar' => $bayar,
                  
                      'konfigurasi' => $konfigurasi,
                      );

        $this->load->view('back/bayar/cetak', $data, FALSE);
    }
}