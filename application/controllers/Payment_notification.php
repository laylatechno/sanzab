<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_notification extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Donasi_model');
		$this->load->helper('midtrans');

        $midtransConfig = [
            'server_key' => $this->config->item('midtrans_server_key'),
            'production' => $this->config->item('midtrans_production')
        ];

		$this->load->library('midtrans');
		$this->midtrans->config($midtransConfig);
        
		$this->load->library('veritrans');
		$this->veritrans->config($midtransConfig);
	}

	public function index()
	{
        $json_result = file_get_contents('php://input');
		$result = json_decode($json_result);

		if ($result) {
		    $transData = $this->veritrans->status($result->order_id);

            if($transData){
                $orderId = explode('-', $result->order_id);
                $idDonasi = isset($orderId[1]) ? $orderId[1] : null;

                $this->Donasi_model->updateTransaksi($idDonasi, $transData);
            }
		} else {
            show_404();
        }
    }
}