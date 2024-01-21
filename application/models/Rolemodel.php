<?php 
class Rolemodel extends CI_Model {
	
	public function get_role_list()
	{
		$this->db->select('*');
		$this->db->from('userrole');
		$qry = $this->db->get()->result();
		return $qry;
	}

	public function get_role_details($id)
	{
		$this->db->select('*');
		$this->db->from('userrole');
		$this->db->where('id',$id);
		$qry = $this->db->get()->result_array();
		return $qry;
	}



}
?>