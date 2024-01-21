<?php 
class Tourmodel extends CI_Model {
	
	public function get_tour_list()
	{
		$this->db->select('*');
		$this->db->from('tourpackage');
		$qry = $this->db->get()->result_array();
		return $qry;
	}

	public function get_tour_list_byuserid($userid)
	{
		$this->db->select('*');
		$this->db->from('tourpackage');
		$this->db->where('userid',$userid);
		$qry = $this->db->get()->result_array();
		return $qry;
	}

	public function get_tour_details($tourid)
	{
		$this->db->select('*');
		$this->db->from('tourpackage');
		//$this->db->join('itinery','tourpackage.id=itinery.pkgid');
		$this->db->where('tourpackage.id',$tourid);
		$qry = $this->db->get()->result_array();
		return $qry;
	}
	
	public function get_itinerary_details($tourid)
	{
	    $this->db->select('*');
		$this->db->from('itinery');
		$this->db->where('pkgid',$tourid);
		$qry = $this->db->get()->result_array();
		return $qry;
	}

	public function get_edit_data($editid)
	{
		$this->db->select('*');
		$this->db->from('tourpackage');
		$this->db->where('id',$editid);
		$qry = $this->db->get()->result_array();
		return $qry;
	}


    // Ajax function //
	public function fetch_hub_name($tourtypeval)
	{

	  $this->db->where('tourtype', $tourtypeval);
	  $query = $this->db->get('hub');
	  $output = '<option value="">-Select Hub-</option>';
	  foreach($query->result() as $row)
	  {
	   $output .= '<option value="'.$row->id.'">'.$row->hub.'</option>';
	  }
	  return $output;

	}
}