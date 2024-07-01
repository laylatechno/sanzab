<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	

	public function masuk()
	{
		$email= htmlspecialchars($this->input->post('email', true));
		$password= htmlspecialchars($this->input->post('password', true));
		$pengguna= html_escape($this->db->get_where('pengguna', ['email' => $email])->row_array());
 
		if($pengguna){
	 
			if($pengguna['aktif']=='Aktif'){
			 
				if(password_verify($password, html_escape($pengguna['password']))){
				 
					$data =[
						'email' => $pengguna['email'],
						'level' => $pengguna['level'],
						'id_pengguna' => $pengguna['id_pengguna'],
						'gambar' => $pengguna['gambar'], 
						'nama' => $pengguna['nama']
					];
					$this->session->set_userdata($data);
					 if($pengguna['level']=='Admin'){
					 	redirect('back/dashboard','refresh');
					 }else{
					 	$this->session->set_flashdata('pesan','<div class="alert alert-danger">anda bukan admin </div>');
					 	redirect('auth','refresh');
					 } 
				}else{   
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password salah </div>');
						redirect('auth','refresh');
				}
			}else{  
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Email belum aktif, segera lakukan aktivasi</div>');
					redirect('auth','refresh');
			}
		}else{  
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Email belum pernah terdaftar</div>');
				redirect('auth','refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Anda <b>Berhasil</b> Logout. Terima kasih</div>');
		redirect('auth','refresh');
	}

	 

	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */