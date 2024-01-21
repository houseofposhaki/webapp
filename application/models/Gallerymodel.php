<?php 

class Gallerymodel extends CI_Model {

	public function upload_image($inputdata,$filename,$blogid)
    {
      /*$this->db->insert('user', $inputdata); 
      $insert_id = $this->db->insert_id();*/
      if($filename!='' ){
      $filename1 = explode(',',$filename);
      foreach($filename1 as $file){
      $file_data = array(
      'image' => $file,
      'blogid' => $blogid
      );
      $this->db->insert('photos', $file_data);
      }
      }
    }


    public function edit_data_image($id)
    {
        $query=$this->db->query("select * from photos where blogid='".$id."'");
        return $query->result_array();
    }



    public function edit_upload_image($user_id,$inputdata,$filename ='')
    {


      if($filename!='' ){
      $filename1 = explode(',',$filename);
      foreach($filename1 as $file){
      $file_data = array(
      'image' => $file,
      'blogid' => $user_id
      );
      $this->db->insert('photos', $file_data);
      }
      }
    }





}