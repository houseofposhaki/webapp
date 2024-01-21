<?php 



class Enquirymodel extends CI_Model {



	public function get_enquiry_list()

	{



		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->join('user','enquiry.userid=user.id');

		$this->db->where('status',0);

		$this->db->order_by("enquiry.id","desc");

		$qry = $this->db->get()->result();

		return $qry;

	}



	public function get_enquiry_listall_cancel()

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->join('user','enquiry.userid=user.id');

		$this->db->where('status',1);

		$this->db->order_by("enquiry.id","desc");

		$qry = $this->db->get()->result();

		return $qry;



	}







	public function get_enquiry_list_byuserid($userid)

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->join('user','enquiry.userid=user.id');

		$this->db->where('enquiry.userid',$userid);

		$this->db->where('status',0);

		$this->db->order_by("enquiry.id","desc");

		$qry = $this->db->get()->result();

		return $qry;

	}



	public function get_enquiry_list_byuserid_cancel($userid)

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->join('user','enquiry.userid=user.id');

		$this->db->where('enquiry.userid',$userid);

		$this->db->where('status',1);

		$this->db->order_by("enquiry.id","desc");

		$qry = $this->db->get()->result();

		return $qry;

	}





	public function get_enquiry_data($id)

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->where('id',$id);

		$qry = $this->db->get()->result_array();

		return $qry;

	}



	/*public function get_report_bydate_userwise($startdate,$enddate,$userid)

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->join('user','enquiry.userid=user.id');

		$this->db->where('enquiry.createdate >=', $startdate);

		$this->db->where('enquiry.createdate <=', $enddate);

		$this->db->where('enquiry.userid',$userid);

		$qry = $this->db->get()->result();

		return $qry;

	}*/



	public function get_report_bydate_all($useridis,$status,$startdate,$enddate)

	{

		$query = "SELECT * FROM enquiry WHERE createdate BETWEEN '".$startdate."' AND '".$enddate."' ";

		if(isset($status))

		{

			 $query .= "AND status='".$status."'";

		}

		if(isset($useridis) && !empty($useridis))

		{

			 $query .= "AND userid='".$useridis."'";

		}

		$res = 	$this->db->query($query)->result();

		//echo $this->db->last_query();

		//print_r($res);

		//die;



		/*$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->join('user','enquiry.userid=user.id');

		$this->db->where('enquiry.createdate >=', $startdate);

		$this->db->where('enquiry.createdate <=', $enddate);

		$qry = $this->db->get()->result();

		return $qry;*/

		return $res;

	}



	public function get_enquiry_details($queryid)

	{

		$this->db->select('*');

		$this->db->from('enquiry');

		$this->db->where('queryid',$queryid);

		$qry = $this->db->get()->result_array();

		return $qry;

	}



}









?>