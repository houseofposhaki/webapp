<?php 

class Webleadmodel extends CI_Model {

	public function get_travelquery_list()
	{
			$db2 = $this->load->database('database2', TRUE);
		  	
		  	$db2->select('*');
			$db2->from('sailt_db7_forms');
			$db2->where('form_post_id', '5599');
			$qry = $db2->get()->result_array();
			return $qry;
	}
}
?>