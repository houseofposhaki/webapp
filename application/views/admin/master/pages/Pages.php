<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function blogcomment()
	{
		if($this->input->post('email'))
		{
			$blogid = trim($this->input->post('blogid'));
			$name = trim($this->input->post('name'));
			$email = trim($this->input->post('email'));
			$subject = trim($this->input->post('subject'));
			$message = trim($this->input->post('message'));
			$data = array(
				'blogid'=>$blogid,
				'name'=>$name,
				'email'=>$email,
				'subject'=>$subject,
				'message'=>$message
			);
			$blogdetails = $this->db->query("select * from blog where id='".$blogid."'")->result_array();
			$blogurl = $blogdetails[0]['slugurl'];
			$this->db->insert('blogcomment',$data);
         	$this->session->set_flashdata("msg","Your comment sent successfully."); 
			redirect('post/'.$blogurl);
		}


	}


	public function categories($url)
	{
		$data['res'] = $this->db->query("select * from categories where slugurl='".$url."'")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/categorydetails',$data);
		$this->load->view('front/includes/footer');

	}


	public function blogdetails($url)
	{
		$data['res'] = $this->db->query("select * from blog where slugurl='".$url."'")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/blogdetails',$data);
		$this->load->view('front/includes/footer');

	}

	// service page strat //

	public function servpg($url)
	{
		$data['res'] = $this->db->query("select * from multiservices where url='".$url."'")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/servpage',$data);
		$this->load->view('front/includes/footer');

	}



	// service page end //

	public function cmspg($url)
	{
		$pagedata = $this->db->query("select * from pages where pgurl='".$url."'")->result_array();
		$data['pgsingle'] = $this->db->query("select * from pages where pgurl='".$url."'")->result_array();
		$pgid = $pagedata[0]['id'];
		$data['pgres'] = $this->db->query("select * from pgcontent where pgid='".$pgid."'")->result_array();
		$data['banneres'] = $this->db->query("select * from pgbanner where pgid='".$pgid."'")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/cmspage',$data);
		$this->load->view('front/includes/footer');

	}
	public function howtobook()
	{
		$data['howtobkres'] = $this->db->query("select * from howtobook")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/howtobook',$data);
		$this->load->view('front/includes/footer');
	}


	public function support()
	{
		$data['res'] = $this->db->query("select * from support")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/support',$data);
		$this->load->view('front/includes/footer');
	}



	public function brands()
	{
		$data['res'] = $this->db->query("select * from partner")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/brands',$data);
		$this->load->view('front/includes/footer');
	}
	

	public function contact()
	{

		$data['res'] = $this->db->query("select * from contactpg")->result_array();
		$this->load->view('front/includes/header');
		$this->load->view('front/contact',$data);
		$this->load->view('front/includes/footer');

	}


	public function sendemail()
	{

		$email  = $this->db->query("select * from  contactpg")->result_array();
		$toemailis = $email[0]['email'];

		
			$from_email =  $this->input->post('email');
			$name =  $this->input->post('name');
			$phone =  $this->input->post('phone');
			$msg =  $this->input->post('msg');
      		$txt = "You have got a email from ".$name."\n Contact no- ".$phone."\n Message -".$msg;

         	$to_email = "avi.brahma@gmail.com";
         	$to_email = $toemailis;
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email,$name); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message($txt); 
   
         //Send mail 
         if($this->email->send()) 
         {
         $this->session->set_flashdata("msg","Email sent successfully."); 
         redirect('contact');
     	 }
         else{
         $this->session->set_flashdata("msg","Error in sending Email."); 
     	}
        // $this->load->view('email_form'); 

		 
	}



	public function homesendemail()
	{

		$email  = $this->db->query("select * from  contactpg")->result_array();
		$toemailis = $email[0]['email'];

		
			$from_email =  $this->input->post('email');
			$name =  $this->input->post('name');
			$phone =  $this->input->post('phone');
			$date =  $this->input->post('date');
			$msg =  $this->input->post('msg');
      		$txt = "You have got a email from ".$name."\n Contact no- ".$phone."\n Message -".$msg;

         	$to_email = "avi.brahma@gmail.com";
         	$to_email = $toemailis;
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email,$name); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message($txt); 
   
         //Send mail 
         if($this->email->send()) 
         {
         $this->session->set_flashdata("msg","Email sent successfully."); 
         redirect('');
     	 }
         else{
         $this->session->set_flashdata("msg","Error in sending Email."); 
     	}
        // $this->load->view('email_form'); 

		 
	}


}