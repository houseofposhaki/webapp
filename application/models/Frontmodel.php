<?php 
class Frontmodel extends CI_Model {

	public function record_count() {
        return $this->db->count_all("blog");
    }


     public function fetch_blogs($limit, $start) 
     {
        echo $limit; die;
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get("product");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   	 }


}