<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()

	{

		parent::__construct();

	}



	public function invoiceprint()
	{

		$this->load->view('admin/master/pages/invoiceprint');

	}


	public function approverefund()
	{
		$cartid = $this->uri->segment('4');
		$data = array('refundstatus'=>2);
		$this->db->where('id',$cartid);
		$this->db->update('cart',$data);
		redirect('admin/refundreqlist');
	}



	public function refundreqlist()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/refundreqlist');
		$this->load->view('admin/includes/footer');
	}


	public function orderlist()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/orderlist');
		$this->load->view('admin/includes/footer');
	}


	public function ordersearch()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if(!empty($this->input->post('startdate')))
		{
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$searchtype = $this->input->post('searchtype');
			$searchval = trim($this->input->post('searchval'));
			$data['postdate'] = array(
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			if($searchtype=="mobile")
			{
				$data['res'] = $this->db->query("select * from ordertbl where mobile='$searchval' and date between '$startdate' and '$enddate' ")->result_array();
			}elseif($searchtype=="orderno"){
				$data['res'] = $this->db->query("select * from ordertbl where orderno='$searchval' and date between '$startdate' and '$enddate' ")->result_array();
			}
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/ordersearch',$data);
			$this->load->view('admin/includes/footer');
		}else{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/ordersearch');
			$this->load->view('admin/includes/footer');

		}
		
	}




	public function datewisesearch()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if(!empty($this->input->post('startdate')))
		{
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$data['postdate'] = array(
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			
			$data['res'] = $this->db->query("select * from ordertbl where date between '$startdate' and '$enddate' ")->result_array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/datewisesearch',$data);
			$this->load->view('admin/includes/footer');
		}else{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/datewisesearch');
			$this->load->view('admin/includes/footer');

		}
		
	}





	public function frnchiseewisesearch()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if(!empty($this->input->post('startdate')))
		{
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$userid = $this->input->post('userid');

			$data['postdate'] = array(
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			
			$data['res'] = $this->db->query("select * from ordertbl where franchiseid='$userid' 
				and  date between '$startdate' and '$enddate' ")->result_array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/frnchiseewisesearch',$data);
			$this->load->view('admin/includes/footer');
		}else{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/frnchiseewisesearch');
			$this->load->view('admin/includes/footer');

		}
		
	}







	public function uploadorderlist()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/uploadorderlist');
		$this->load->view('admin/includes/footer');
	}




	public function pendingorderlist()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}

		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$data['res'] = $this->db->query("select * from ordertbl where ordstatus='Pending' order by id desc ")->result_array();
		$this->load->view('admin/master/pages/pendingorderlist',$data);
		$this->load->view('admin/includes/footer');

	}


	public function processinglist()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}

		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$data['res'] = $this->db->query("select * from ordertbl where ordstatus='Processing' order by id desc ")->result_array();
		$this->load->view('admin/master/pages/processinglist',$data);
		$this->load->view('admin/includes/footer');

	}



	






	public function assignprderlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/assignprderlist');

		$this->load->view('admin/includes/footer');

	}



	



}



