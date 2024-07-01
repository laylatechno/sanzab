<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Galeri_model');
		$this->load->model('Konfigurasi_model');
		$this->load->model('Bayar_model');
		$this->load->model('Donasi_model');
		$this->load->helper('midtrans');
        $this->load->library('form_validation');

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
		$galeri = $this->Galeri_model->listing();
		$konfigurasi = $this->Konfigurasi_model->listing();
		$galeri_footer = $this->Galeri_model->listing_footer();
        $jenis_donasi = $this->Donasi_model->getJenisDonasi();
		  
		$data = [
            'title' => 'Donasi',
            'konfigurasi' => $konfigurasi,
            'galeri' => $galeri, 
            'galeri_footer' => $galeri_footer,
            'jenis_donasi' => $jenis_donasi,
            'isi' => 'donasi/index',
            'script' => 'donasi/script'
        ];

		$this->load->view('layout/wrapper', $data, FALSE);
	}

    public function payment_method()
    {
        if($this->input->is_ajax_request()){
            $amount = str_replace(',', '', $this->input->post('jumlah'));
            $trimName = trim($this->input->post('nama', true));
            $expName = explode(' ', $trimName);
            $email = $this->input->post('email', true);
            $keterangan = trim($this->input->post('keterangan', true));
            $phoneNumber = str_replace(' ', '', $this->input->post('nomor_handphone', true));
            $idJenisDonasi = $this->input->post('jenis_donasi', true);
            $jenisDonasi = $this->Donasi_model->findJenisDonasi($idJenisDonasi);

            $this->form_validation->set_data(['jenis_donasi' => $idJenisDonasi, 'jumlah' => $amount, 'keterangan' => $keterangan, 'nama' => $this->input->post('nama', true), 'nomor_handphone' => $phoneNumber, 'email' => $email]);
            $this->form_validation->set_rules('jenis_donasi', 'Jenis donasi', 'required', ['required' => '%s Harus diisi']);
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric', ['required' => '%s Harus diisi', 'numeric' => '%s yg dimasukkan tidak valid']);
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'min_length[5]|max_length[255]', ['min_length' => '%s minimal 5 karakter', 'max_length' => '%s maksimal 255 karakter']);
            $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|min_length[3]|max_length[100]', ['required' => '%s Harus diisi', 'min_length' => '%s minimal 3 karakter', 'max_length' => '%s maksimal 100 karakter']);
            $this->form_validation->set_rules('nomor_handphone', 'Nomor handphone', 'required|numeric|min_length[5]|max_length[20]', ['required' => '%s Harus diisi', 'numeric' => '%s yg dimasukkan tidak valid', 'min_length' => '%s minimal 5 karakter', 'max_length' => '%s maksimal 20 karakter']);
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email', ['required' => '%s Harus diisi', 'valid_email' => '%s tidak valid']);
    
            if ($this->form_validation->run() == FALSE){
                header('Content-Type: application/json; charset=utf-8');
                http_response_code(400);
                echo json_encode(
                    ['status' => false,
                    'errors' => [
                        'jenis_donasi' => str_replace(['<p>', '</p>'], '', form_error('jenis_donasi')),
                        'jumlah' => str_replace(['<p>', '</p>'], '', form_error('jumlah')),
                        'keterangan' => str_replace(['<p>', '</p>'], '', form_error('keterangan')),
                        'nama' => str_replace(['<p>', '</p>'], '', form_error('nama')),
                        'nomor_handphone' => str_replace(['<p>', '</p>'], '', form_error('nomor_handphone')),
                        'email' => str_replace(['<p>', '</p>'], '', form_error('email'))
                    ]
                ]);
            } else {
                try {
                    $this->db->trans_begin();
                    $dataDonasi = [
                        'id_jenis_donasi' => $this->input->post('jenis_donasi', true),
                        'nama_lengkap' => $trimName,
                        'nomor_handphone' => $phoneNumber,
                        'email' => $email,
                        'jumlah' => $amount,
                        'keterangan' => $this->input->post('keterangan', true),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ];

                    $this->Donasi_model->create($dataDonasi);
                    $idDonasi = $this->db->insert_id();

                    $firstName = '';
                    $lastName = '';

                    for ($i = 0; $i < count($expName); $i++) {
                        if ($firstName == '') {
                            if ($expName[$i] != '') {
                                $firstName = $expName[$i];
                            }
                        } elseif ($lastName == '') {
                            if ($expName[$i] != '') {
                                $lastName = $expName[$i];
                            }
                        } else {
                            break;
                        }
                    }

                    // Required
                    $transaction_details = [
                        'order_id' => 'BAZNASTSK-' . $idDonasi,
                        'gross_amount' => $amount, // no decimal allowed for creditcard
                    ];

                    // Optional
                    $item1_details = [
                        'id' => $jenisDonasi->id,
                        'price' => $amount,
                        'quantity' => 1,
                        'name' => $jenisDonasi->nama
                    ];

                    // Optional
                    $item_details = [$item1_details];

                    // Optional
                    $customer_details = [
                        'first_name'    => $firstName,
                        'last_name'     => $lastName,
                        'email'         => $email,
                        'phone'         => $phoneNumber,
                        'billing_address'  => [],
                        'shipping_address' => []
                    ];

                    // Data yang akan dikirim untuk request redirect_url.
                    $credit_card['secure'] = true;
                    //ser save_card true to enable oneclick or 2click
                    //$credit_card['save_card'] = true;

                    $time = time();
                    $custom_expiry = array(
                        'start_time' => date("Y-m-d H:i:s O", $time),
                        'unit' => 'hour', 
                        'duration'  => 2
                    );
                    
                    $transaction_data = array(
                        'transaction_details'=> $transaction_details,
                        'item_details'       => $item_details,
                        'customer_details'   => $customer_details,
                        'credit_card'        => $credit_card
                    );

                    error_log(json_encode($transaction_data));
                    $snapToken = $this->midtrans->getSnapToken($transaction_data);

                    $this->Donasi_model->update(['id' => $idDonasi, 'snap_token' => $snapToken]);

                    if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                    } else {
                        $this->db->trans_commit();
                    }

                    error_log($snapToken);
                    echo $snapToken;
                } catch (\Exception $e) {
                    header('Content-Type: application/json; charset=utf-8');
                    http_response_code(400);

                    $this->db->trans_rollback();
                    echo json_encode(['success' => false, 'message' => "Silahkan hubungi BAZNAS Kota Tasikmalaya"]);
                }
            }
        } else {
            show_404();
        }
    }

    public function delete()
    {
        if($this->input->is_ajax_request()){
            $this->Donasi_model->delete(['snap_token' => $this->input->post('snap_token', true)]);
        } else {
            show_404();
        }
    }

    public function finish()
    {
        if($this->input->is_ajax_request()){
            header('Content-Type: application/json; charset=utf-8');
            
            $orderId = explode('-', $this->input->post('data')['order_id']);
            $idDonasi = isset($orderId[1]) ? $orderId[1] : null;
            $postData = $this->input->post('data');

            $data['id'] = $idDonasi;
            $data['transaction_id'] = isset($postData['transaction_id']) ? $postData['transaction_id'] : null;
            $data['payment_type'] =  isset($postData['payment_type']) ? $postData['payment_type'] : null;
            $data['transaction_time'] =  isset($postData['transaction_time']) ? $postData['transaction_time'] : null;
            $data['transaction_status'] =  isset($postData['transaction_status']) ? $postData['transaction_status'] : null;
            $data['gross_amount'] =  isset($postData['gross_amount']) ? $postData['gross_amount'] : null;
            $data['payment_option_type'] =  isset($postData['payment_option_type']) ? $postData['payment_option_type'] : null;
            $data['pdf_url'] =  isset($postData['pdf_url']) ? $postData['pdf_url'] : null;

            $this->Donasi_model->update($data);

            $transData = $this->veritrans->status($this->input->post('data')['order_id']);

            if($transData){
                $this->Donasi_model->updateTransaksi($idDonasi, $transData);
            }

            echo json_encode(['success' => true, 'transaction_id' => $data['transaction_id']]);
        } else {
            show_404();
        }
    }

    public function success($transactionId = null)
    {
        if (!$transactionId) {
            show_404();
        }

        $donasi = $this->Donasi_model->findWhere(['transaction_id' => $transactionId]);
        
        if ($donasi) {
            $transData = $this->veritrans->status('BAZNASTSK-' . $donasi->id);

            if ($transData) {
                if ($donasi->transaction_status == 'pending') {
                    $this->Donasi_model->updateTransaksi($donasi->id, $transData);
                }
            }
            
            $galeri = $this->Galeri_model->listing();
            $konfigurasi = $this->Konfigurasi_model->listing();
            $galeri_footer = $this->Galeri_model->listing_footer();
            $jenis_donasi = $this->Donasi_model->getJenisDonasi();
            
            $data = [
                'title' => 'Donasi',
                'konfigurasi' => $konfigurasi,
                'galeri' => $galeri, 
                'galeri_footer' => $galeri_footer,
                'jenis_donasi' => $jenis_donasi,
                'isi' => 'donasi/success',
                'script' => 'donasi/success-script',
                'donasi' => $this->Donasi_model->findWhere(['transaction_id' => $transactionId])
            ];

            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            show_404();
        }
    }
}