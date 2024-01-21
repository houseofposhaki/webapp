<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function list()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$userid = $this->session->userdata['logged_in']['id'];
		$usertype = $this->session->userdata['logged_in']['usertype'];
		$this->db->select('*');
		$this->db->from('payer');
		$data['res'] = $this->db->get()->result_array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/payer/payerlist',$data);
		$this->load->view('admin/includes/footer');
	}

	public function add()
	{
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/payer/payeradd');
		$this->load->view('admin/includes/footer');
	}

	public function save()
	{
		if($this->input->post('payername'))
		{
			$payername = $this->input->post('payername');
			$payeraddress = $this->input->post('payeraddress');
			$payerphone = $this->input->post('payerphone');
			$oldid = $this->input->post('oldid');
			$data = array(
				'payername' => $payername,
				'payeraddress' => $payeraddress,
				'payerphone' => $payerphone
			);
			if($oldid==0){
			$this->db->insert('payer',$data);
			redirect('Payer/list');
			}else{
				$this->db->where('id',$oldid);
				$this->db->update('payer',$data);
				redirect('Payer/list');
			}

		}else{
			$id = $this->uri->segment(4);
			$this->db->select('*');
			$this->db->from('payer');
			$this->db->where('id',$id);
			$data['getres'] = $this->db->get()->result_array(); 
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/payer/payeradd',$data);
			$this->load->view('admin/includes/footer');

		}

	}



	/* Report */
	public function datewise()
	{
		if($this->session->userdata['logged_in']['id']!=true){
		redirect('');
		}

		if($this->input->post('submit')) {
			//$userid = $this->session->userdata['logged_in']['id'];	
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$data['postdate'] = array(
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			$this->db->select('*');
			$this->db->from('debit');
			$this->db->join('project','debit.projectid=project.id');
			$this->db->where('debit.date>=',$startdate);
			$this->db->where('debit.date<=',$enddate);
			$data['res'] = $this->db->get()->result();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/debit/datewisedebit',$data);
		} else {
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/debit/datewisedebit');
		}
	}


	public function projectwise()
	{
		if($this->session->userdata['logged_in']['id']!=true){
		redirect('');
		}

		if($this->input->post('submit')) {
			//$userid = $this->session->userdata['logged_in']['id'];	
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$data['postdate'] = array(
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			$this->db->select('*');
			$this->db->from('debit');
			$this->db->join('project','debit.projectid=project.id');
			$this->db->where('debit.date>=',$startdate);
			$this->db->where('debit.date<=',$enddate);
			$data['res'] = $this->db->get()->result();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/debit/projectwise',$data);
		} else {
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/debit/projectwise');
		}

	}



}