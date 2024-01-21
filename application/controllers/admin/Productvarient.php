<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productvarient extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
    $this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
	}



	public function pvarientadd()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/pvarientadd');
		$this->load->view('admin/includes/footer');
	}


	public function pvarientsave()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if($this->input->post('save'))
		{
			$oldid = trim($this->input->post('oldid'));
			$oldfeatureimg = trim($this->input->post('oldfeatureimg'));
			$productid = trim($this->input->post('productid'));
			$userid = trim($this->input->post('userid'));
			$colorid = trim($this->input->post('colorid'));
			$sizeid = trim($this->input->post('sizeid'));
			$wightid = trim($this->input->post('wightid'));
			$qty = trim($this->input->post('qty'));
			$saleprice = trim($this->input->post('saleprice'));
			$offerprice = trim($this->input->post('offerprice'));
			$featureimg = trim($this->input->post('featureimg'));

			if(!empty($_FILES['featureimg']['name'] ))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['featureimg']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('featureimg')){
					$uploadData = $this->upload->data();

        			$this->resizeImageThubnail($uploadData['file_name']);
					$featureimg = $uploadData['file_name'];
				}
			}else{
				$featureimg = $oldfeatureimg;
			}

			
			$data = array(
				'productid' => $productid, 
				'userid' => $userid, 
				'colorid' => $colorid, 
				'sizeid' => $sizeid, 
				'wightid' => $wightid, 
				'qty' => $qty, 
				'saleprice' => $saleprice, 
				'offerprice' => $offerprice, 
				'featureimg' => $featureimg, 
			);
			//print_r($data);
			
			if($oldid==0)
			{
				$this->db->insert('productvarient',$data);
				//echo $this->db->last_query(); die;
				$insert_id = $this->db->insert_id();
				$this->session->set_flashdata('msg', 'Content updated successfully');
				redirect('admin/Productvarient/pvarientadd/'.$productid);
			}else{
				$this->db->where('id',$oldid);
				$this->db->update('productvarient',$data);
				$this->session->set_flashdata('msg', 'Content deleted successfully');
				redirect('admin/Productvarient/pvarientadd/'.$productid);
			}

		}else{
			$id = $this->uri->segment(4);
			$data['res'] = $this->db->query("select * from productvarient where id='".$id."'")->result_array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/pvarientadd/'.$id,$data);
			$this->load->view('admin/includes/footer');

		}
	}


	public function resizeImageThubnail($filename)
   {
      $source_path =  'uploads/' . $filename;
      $target_path = 'uploads/thumb/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
         // 'thumb_marker' => '_thumb',
          'width' => 540,
          'height' => 360
      );

      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }

      $this->image_lib->clear();
   }



   public function pvarienteditsave()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if($this->input->post('save'))
		{
			$oldid = trim($this->input->post('oldid'));
			$oldfeatureimg = trim($this->input->post('oldfeatureimg'));
			$productid = trim($this->input->post('productid'));
			$userid = trim($this->input->post('userid'));
			$colorid = trim($this->input->post('colorid'));
			$sizeid = trim($this->input->post('sizeid'));
			$wightid = trim($this->input->post('wightid'));
			$qty = trim($this->input->post('qty'));
			$saleprice = trim($this->input->post('saleprice'));
			$offerprice = trim($this->input->post('offerprice'));
			$featureimg = trim($this->input->post('featureimg'));

			if(!empty($_FILES['featureimg']['name'] ))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['featureimg']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('featureimg')){
					$uploadData = $this->upload->data();

        			$this->resizeImageThubnail($uploadData['file_name']);
					$featureimg = $uploadData['file_name'];
				}
			}else{
				$featureimg = $oldfeatureimg;
			}

			
			$data = array(
				'productid' => $productid, 
				'userid' => $userid, 
				'colorid' => $colorid, 
				'sizeid' => $sizeid, 
				'wightid' => $wightid, 
				'qty' => $qty, 
				'saleprice' => $saleprice, 
				'offerprice' => $offerprice, 
				'featureimg' => $featureimg, 
			);
			//print_r($data);
			
			
				$this->db->where('id',$oldid);
				$this->db->update('productvarient',$data);
				$this->session->set_flashdata('msg', 'Content deleted successfully');
				redirect('admin/Productvarient/pvarientadd/'.$productid);

		}
	}



	public function pvarientedit()
	{
			$id = $this->uri->segment(4);
			$data['res'] = $this->db->query("select * from productvarient where id='".$id."'")->result_array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/pvarientedit',$data);
			$this->load->view('admin/includes/footer');
	}




  }