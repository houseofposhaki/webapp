<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
	}

	public function login()
	{
		$this->load->view('authentication/login');
	}

	public function loginchk()
	{
		if($this->input->post('signin'))
		{
			$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
			$userIp=$this->input->ip_address();
			$secret='6LdC17oUAAAAAOKef98iiavVv7tTIO4alZKTFuTe';
			$data = array(
				'secret' => "$secret",
				'response' => "$recaptchaResponse",
				'remoteip' =>"$userIp"
			);

			$verify = curl_init();
			curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
			curl_setopt($verify, CURLOPT_POST, true);
			curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($verify);
			$status= json_decode($response, true);
			
			if($status['success']=="1")
			{
				$username = $this->input->post('username');
				$password = base64_encode($this->input->post('password'));
				$this->db->select('*');
				$this->db->from('user');
				$this->db->where('username',$username);
				$this->db->where('password',$password);
				$query=$this->db->get();
				if ($query->num_rows() == 1) {
					$res = $query->result();
				} else {
					$res = "";
				}

			//$res = $query->result();
				if($res>0 || $res!='')
				{
					$session_data = array(
						'id' => $res[0]->id,
						'username' => $res[0]->username,
						'password' => $res[0]->password,
						'fullname' => $res[0]->fullname,
						'branchid' => $res[0]->branchid
					);
					$this->session->set_userdata('logged_in', $session_data);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('flashSuccess', 'Sorry Google Recaptcha Unsuccessful!!');
					redirect('');
				}

			}else{
				redirect('');
			}


		}

		
	}

	public function dashboard()
	{	
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('master/dashboard');
		$this->load->view('includes/footer');
	}

	public function logout()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$session_userdata = array(
			'username' => '',
			'password' => '',
			'fullname' => ''
		);
		$this->session->unset_userdata('logged_in',$session_userdata);
		redirect('','refresh');
	}


}
