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

		$this->load->view('admin/authentication/login');

	}



	public function loginchk()
	{
		if($this->input->post('username'))
		{
			$username = $this->input->post('username');
			$password = base64_encode($this->input->post('password'));
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$this->db->where('usertype',1);
			//$this->db->where('updatestatus','1');
			$query=$this->db->get();
			if ($query->num_rows() >= 1) {
				$res = $query->result();
				$session_data = array(
					'id' => $res[0]->id,
					'username' => $res[0]->username,
					'password' => $res[0]->password,
					'fullname' => $res[0]->fullname,
					'usertype' => $res[0]->usertype
				);
			$this->session->set_userdata('logged_in', $session_data);
 			$userid =  $this->session->userdata['logged_in']['id'];
 			$usertype =  $this->session->userdata['logged_in']['usertype'];
 			$data = $this->db->query("select * from user where id='".$userid."'")->result_array();
 			//$updatepass = $data[0]['updatepass'];
 				
				redirect('admin/dashboard');
				

			} else {
				$this->session->set_flashdata('loginFailed', 'Invalid Username/Password. Please try again.');
				redirect('admin');
			}
		} else {
			echo 'Not submitted successfully';
		}

	}


	



	public function dashboard()

	{	

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/dashboard');

		$this->load->view('admin/includes/footer');

	}

	// Reset password start//
	public function resetpass()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside_resetpass');
		$this->load->view('master/resetpassword');
		$this->load->view('admin/includes/footer');
	}

	public function resetpassuser()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/resetpassword');
		$this->load->view('admin/includes/footer');
	}

	public function updatepass()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->library('session');
		$userid = $this->input->post('userid');
		$password = trim(base64_encode($this->input->post('newpass')));	
		$updatepass = "1";	

		$oldpass = $this->db->query("select * from user where id='".$userid."' ")->result_array();
		$pass = $oldpass[0]['password'];
		$oldpassis = base64_decode($pass);
		$decodepassword = base64_decode($password);
		if($oldpassis == $decodepassword)
		{
			$this->session->set_flashdata('existpass','You entered a old password. Please enter a new password.'); 
			redirect('admin/resetpassword');
		}else{
		$data = array(
			'password' => $password,
			'updatepass' => $updatepass
		);
		$this->db->where('id',$userid);
		$this->db->update('user',$data);
		$session_userdata = array(
			'username' => '',
			'password' => '',
			'fullname' => ''
		);
		$this->session->unset_userdata('logged_in',$session_userdata);
		redirect('admin','refresh');
		}
	}


	// reset password end //

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

		redirect('admin','refresh');

	}

}

