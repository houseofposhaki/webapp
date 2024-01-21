
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sectioncontent extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function section5post()
	{
		if($this->input->post('submit'))
		{
		$id = $this->input->post('id');
		$heading = $this->input->post('heading');
		$data = array(
			'heading' => $heading
		);
		$this->db->where('id',$id);
		$this->db->update('homepgsection',$data);
		redirect('admin/partner');
		}

	}

	
	public function section4post()
	{
		if($this->input->post('submit'))
		{
		$id = $this->input->post('id');
		$heading = $this->input->post('heading');
		$description = $this->input->post('description');
		$data = array(
			'heading' => $heading,
			'description' => $description,

		);
		$this->db->where('id',$id);
		$this->db->update('homepgsection',$data);
		redirect('admin/whtweoffer');
		}

	}
	
	public function section3post()
	{
		if($this->input->post('submit'))
		{
		$id = $this->input->post('id');
		$heading = $this->input->post('heading');
		$description = $this->input->post('description');
		$data = array(
			'heading' => $heading,
			'description' => $description,

		);
		$this->db->where('id',$id);
		$this->db->update('homepgsection',$data);
		redirect('admin/whywebest');
		}

	}
	
	public function section7post()
	{
		if($this->input->post('submit'))
		{
		$id = $this->input->post('id');
		$heading = $this->input->post('heading');
		$description = $this->input->post('description');
		$data = array(
			'heading' => $heading,
			'description' => $description,

		);
		$this->db->where('id',$id);
		$this->db->update('homepgsection',$data);
		redirect('admin/whychoseus');
		}

	}

	public function section6post()
	{
		if($this->input->post('submit'))
		{
		$id = $this->input->post('id');
		$heading = $this->input->post('heading');
		$description = $this->input->post('description');
		$desc2 = $this->input->post('desc2');
		$data = array(
			'heading' => $heading,
			'description' => $description,
			'desc2' => $desc2,

		);
		$this->db->where('id',$id);
		$this->db->update('homepgsection',$data);
		redirect('admin/bkapointment');
		}
	}

	public function bkapointment()
	{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$data['res'] = $this->db->query("select * from  homepgsection where id='6'")->result_array();
			$this->load->view('admin/master/pages/homepgsection6add',$data);
			$this->load->view('admin/includes/footer');
	}

	public function threeicons()
	{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$data['res'] = $this->db->query("select * from threeicons")->result_array();
			$this->load->view('admin/master/pages/threeiconslist',$data);
			$this->load->view('admin/includes/footer');

	}

	public function threeiconedit()
	{
		$id = $this->uri->segment(4);
			$data['res'] = $this->db->query("select * from threeicons where id='".$id."'")->result_array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/threeiconsadd',$data);
			$this->load->view('admin/includes/footer');
	}

	public function threeiconupdate()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if($this->input->post('save'))
		{
			$title = trim($this->input->post('title'));
			$description = trim($this->input->post('description'));
			$oldid = trim($this->input->post('oldid'));
			$oldiconimgae = trim($this->input->post('oldiconimgae'));
			
			if(!empty($_FILES['iconimgae']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['iconimgae']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('iconimgae')){
					$uploadData = $this->upload->data();
					$iconimgae = $uploadData['file_name'];
				}
			}else{
				$iconimgae = $oldiconimgae;
			}
			$data = array(
				'iconimgae' => $iconimgae, 
				'description' => $description, 
				'title' => $title 
			);
			
				$this->db->where('id',$oldid);
				$this->db->update('threeicons',$data);
				$this->session->set_flashdata('msg', 'Content Updated successfully');
				redirect('admin/threeicons');

		}

	}

	public function section2()
	{
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$data['res']= $this->db->query("select * from  aftrbannersection where id='1'")->result_array();
			$this->load->view('admin/master/pages/section2add',$data);
			$this->load->view('admin/includes/footer');
	}


	public function section2update()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if($this->input->post('save'))
		{
			$title = trim($this->input->post('title'));
			$head1 = trim($this->input->post('head1'));
			$head2 = trim($this->input->post('head2'));
			$head3 = trim($this->input->post('head3'));
			$head4 = trim($this->input->post('head4'));
			$head5 = trim($this->input->post('head5'));
			$head6 = trim($this->input->post('head6'));
			$btnname = trim($this->input->post('btnname'));
			$btnlink = trim($this->input->post('btnlink'));	
			$description = trim($this->input->post('description'));	
			$oldid = trim($this->input->post('oldid'));
			$oldicon1 = trim($this->input->post('oldicon1'));
			$oldicon2 = trim($this->input->post('oldicon2'));
			$oldicon3 = trim($this->input->post('oldicon3'));

			$oldicon4 = trim($this->input->post('oldicon4'));
			$oldicon5 = trim($this->input->post('oldicon5'));
			$oldicon6 = trim($this->input->post('oldicon6'));

			
			if(!empty($_FILES['icon1']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['icon1']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('icon1')){
					$uploadData = $this->upload->data();
					$icon1 = $uploadData['file_name'];
				}
			}else{
				$icon1 = $oldicon1;
			}
			if(!empty($_FILES['icon2']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['icon2']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('icon2')){
					$uploadData = $this->upload->data();
					$icon2 = $uploadData['file_name'];
				}
			}else{
				$icon2 = $oldicon2;
			}
			if(!empty($_FILES['icon3']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['icon3']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('icon3')){
					$uploadData = $this->upload->data();
					$icon3 = $uploadData['file_name'];
				}
			}else{
				$icon3 = $oldicon3;
			}


			if(!empty($_FILES['icon4']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['icon4']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('icon4')){
					$uploadData = $this->upload->data();
					$icon4 = $uploadData['file_name'];
				}
			}else{
				$icon4 = $oldicon4;
			}

			if(!empty($_FILES['icon5']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['icon5']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('icon5')){
					$uploadData = $this->upload->data();
					$icon5 = $uploadData['file_name'];
				}
			}else{
				$icon5 = $oldicon5;
			}

			if(!empty($_FILES['icon6']['name']))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['icon6']['name'];
                //Load upload library and initialize configuration
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('icon6')){
					$uploadData = $this->upload->data();
					$icon6 = $uploadData['file_name'];
				}
			}else{
				$icon6 = $oldicon6;
			}
			
			$data = array(
				'title' => $title, 
				'icon1' => $icon1, 
				'head1' => $head1, 
				'icon2' => $icon2, 
				'head2' => $head2, 
				'icon3' => $icon3, 
				'head3' => $head3, 
				'icon4' => $icon4, 
				'head4' => $head4, 
				'icon5' => $icon5, 
				'head5' => $head5, 
				'icon6' => $icon6, 
				'head6' => $head6, 
				'btnname' => $btnname, 
				'btnlink' => $btnlink, 
				'description' => $description 
			);
				$this->db->where('id',$oldid);
				$this->db->update('aftrbannersection',$data);
				$this->session->set_flashdata('msg', 'Content Updated successfully');
				redirect('admin/section2');
			

		}

	}
	




}