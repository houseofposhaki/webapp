<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}


	public function doctors()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$data['res'] = $this->db->query("select * from doctorsubscribe ")->result_array();
		$this->load->view('admin/master/pages/doctorlist',$data);
		$this->load->view('admin/includes/footer');

	}

	public function subscriber()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$data['res'] = $this->db->query("select * from usersubscribe ")->result_array();
		$this->load->view('admin/master/pages/subscriberlist',$data);
		$this->load->view('admin/includes/footer');
	}


}