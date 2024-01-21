<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['services'] = $this->db->query("select * from servicemain")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/services',$data);
		$this->load->view('front/includes/footer');
	}

}