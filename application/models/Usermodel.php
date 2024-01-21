<?php 

class Usermodel extends CI_Model {

	public function get_user_list()
	{

		$this->db->select('*,user.id');
		$this->db->from('user');
		$this->db->join('userrole','userrole.id=user.usertype');
		$this->db->where('user.id !=1');
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

	public function get_user_permission_list($userid)
	{
		$this->db->select('*');
		$this->db->from('userrole');
		$this->db->where('id!=',$userid);
		$qry = $this->db->get()->result();
		return $qry;
	}

	public function get_useredit_data($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$qry = $this->db->get()->result_array();
		return $qry;

	}


					// Permission Details //
	
	public function get_permission_details($id)
	{
		$this->db->select('*');
		$this->db->from('userpermission');
		$this->db->where('usertypeid',$id);
		$qry = $this->db->get()->result_array();
		return $qry;
	}				




}




?>