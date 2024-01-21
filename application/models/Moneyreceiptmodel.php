<?php 

class Moneyreceiptmodel extends CI_Model {

	

	public function get_recpt_list()

	{

		$this->db->select('*,moneyrcpt.id as mrid');

		$this->db->from('moneyrcpt');

		$this->db->join('enquiry','enquiry.queryid=moneyrcpt.enquiryid');

		$this->db->order_by("moneyrcpt.id","desc");

		$qry = $this->db->get()->result();

		return $qry;

	}



	public function get_recpt_list_byuserid($userid)

	{

		$this->db->select('*,moneyrcpt.id as mrid');

		$this->db->from('moneyrcpt');

		$this->db->join('enquiry','enquiry.queryid=moneyrcpt.enquiryid');

		$this->db->where('moneyrcpt.userid',$userid);

		$this->db->order_by("moneyrcpt.id","desc");

		$qry = $this->db->get()->result();

		return $qry;

	}



	public function get_singleuser_data($userid)

	{

		$this->db->select('*');

		$this->db->from('user');

		$this->db->where('id',$userid);

		$qry = $this->db->get()->result();

		return $qry;

	}



	public function get_moneyrcpt_res($id)

	{

		$this->db->select('*');

		$this->db->from('moneyrcpt');

		$this->db->where('id',$id);

		$qry = $this->db->get()->result_array();

		return $qry;

	}



	public function get_moneyrcpt_details($id)

	{



		$this->db->select('*');

		$this->db->from('moneyrcpt');

		$this->db->where('id',$id);

		$qry = $this->db->get()->result_array();

		return $qry;



	}



	public function get_report_bydate($startdate,$enddate,$userid)

	{

		/*$this->db->select('*');

		$this->db->from('moneyrcpt');

		$this->db->where('createon >=', $startdate);

		$this->db->where('createon <=', $enddate);

		$this->db->where('userid',$userid);

		$qry = $this->db->get()->result();

		return $qry;*/



		$qry = "SELECT * FROM moneyrcpt WHERE createon BETWEEN '".$startdate."' AND '".$enddate."' ";

		if($userid)

		{

			$qry .= "AND userid='".$userid."'";

		}

		$res = 	$this->db->query($qry)->result();

		return $res;





	}



	public function getqrydetails($queryid)

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->where('queryid', $queryid);

		$qry = $this->db->get()->result_array();

		return $qry;

	}



	public function get_print_res($id)

	{

		$this->db->select('*,moneyrcpt.userid as muserid');

		$this->db->from('moneyrcpt');

		$this->db->join('enquiry','moneyrcpt.enquiryid = enquiry.queryid');

		$this->db->where('moneyrcpt.id',$id);

		$qry = $this->db->get()->result();

		return $qry;

	}





	public function get_mrcpt_details($id)

	{

		$this->db->select('*,moneyrcpt.userid as muserid');

		$this->db->from('moneyrcpt');

		$this->db->join('enquiry','moneyrcpt.enquiryid = enquiry.queryid');

		$this->db->where('moneyrcpt.id',$id);

		$qry = $this->db->get()->result();

		return $qry;



	}



}

?>