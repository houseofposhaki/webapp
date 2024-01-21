<?php 

class Bookingmodel extends CI_Model {

	public function get_booking_list()
	{
		$this->db->select('booking.*,enquiry.*,booking.id as bkid');
		$this->db->from('booking');
		$this->db->join('enquiry','enquiry.queryid=booking.enquiryid');
		$this->db->order_by('booking.id', 'desc');
		$qry = $this->db->get()->result_array();
		return $qry;
	}

	public function get_booking_list_byuserid($userid)
	{
		$this->db->select('booking.*,enquiry.*,booking.id as bkid');
		$this->db->from('booking');
		$this->db->join('enquiry','enquiry.queryid=booking.enquiryid');
		$this->db->where('booking.userid',$userid);
		$qry = $this->db->get()->result_array();
		return $qry;
	}

	public function get_report_bydate_userwise($startdate,$enddate,$userid)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('bookingdate >=', $startdate);
		$this->db->where('bookingdate <=', $enddate);
		$this->db->where('userid',$userid);
		$qry = $this->db->get()->result();
		return $qry;
	}

	public function get_report_bydate_all($startdate,$enddate)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('bookingdate >=', $startdate);
		$this->db->where('bookingdate <=', $enddate);
		$qry = $this->db->get()->result();
		return $qry;
	}

	public function get_details_view($bookingid)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('bookingid',$bookingid);
		$qry = $this->db->get()->result_array();
		return $qry;
	}




}