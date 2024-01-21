<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pages extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

	}





	// All cms page //



	public function catslug()

	{

		$alltag=$this->db->query("select * from blogtag")->result_array();

		foreach($alltag as $allrow)

		{

			$tag =  $allrow['tagname'];

			$tagid =$allrow['id']; 

			  $smalltxt = strtolower($tag);

		      $slug = preg_replace('#[ -]+#', '-', $smalltxt);

		      $tagurl = trim($slug);



		      $data = array(

		      	'tagslug' => $tagurl

		      );



		      $this->db->where('id',$tagid);

		      $this->db->update('blogtag',$data);

		}

	}



	public function aboutus()

	{



		// sitemap insert code start //

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   

		$url = "https://";   

		else  

		$url = "http://";   

		$url.= $_SERVER['HTTP_HOST'];   

		$url.= $_SERVER['REQUEST_URI'];    



		$chkurlexist = $this->db->query("select * from sitemapurl where mapurl='".trim($url)."' ")->result_array();

		if(!empty($chkurlexist))

		{

			$exurl =  $chkurlexist[0]['id'];

		}else{

			$exurl = "0";

		}

		

		if($exurl=="0")

		{

			$data = array(

				'mapurl' => $url

			);

			$this->db->insert('sitemapurl',$data);

		}



		// sitemap insert code end  //



		$data['pgres'] = $this->db->query("select * from  pgcontent where pgid='7'")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/cmspage',$data);

		$this->load->view('front/includes/footer');



	}





	public function terms()

	{



		// sitemap insert code start //

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   

		$url = "https://";   

		else  

		$url = "http://";   

		$url.= $_SERVER['HTTP_HOST'];   

		$url.= $_SERVER['REQUEST_URI'];    



		$chkurlexist = $this->db->query("select * from sitemapurl where mapurl='".trim($url)."' ")->result_array();

		if(!empty($chkurlexist))

		{

			$exurl =  $chkurlexist[0]['id'];

		}else{

			$exurl = "0";

		}

		

		if($exurl=="0")

		{

			$data = array(

				'mapurl' => $url

			);

			$this->db->insert('sitemapurl',$data);

		}



		// sitemap insert code end  //



		$data['pgres'] = $this->db->query("select * from  pgcontent where pgid='8'")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/cmspage',$data);

		$this->load->view('front/includes/footer');



	}





	public function disclaimers()

	{

		// sitemap insert code start //

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   

		$url = "https://";   

		else  

		$url = "http://";   

		$url.= $_SERVER['HTTP_HOST'];   

		$url.= $_SERVER['REQUEST_URI'];    



		$chkurlexist = $this->db->query("select * from sitemapurl where mapurl='".trim($url)."' ")->result_array();

		if(!empty($chkurlexist))

		{

			$exurl =  $chkurlexist[0]['id'];

		}else{

			$exurl = "0";

		}

		

		if($exurl=="0")

		{

			$data = array(

				'mapurl' => $url

			);

			$this->db->insert('sitemapurl',$data);

		}



		// sitemap insert code end  //



		$data['pgres'] = $this->db->query("select * from  pgcontent where pgid='9'")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/cmspage',$data);

		$this->load->view('front/includes/footer');



	}



	public function privacy()

	{



		// sitemap insert code start //

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   

		$url = "https://";   

		else  

		$url = "http://";   

		$url.= $_SERVER['HTTP_HOST'];   

		$url.= $_SERVER['REQUEST_URI'];    



		$chkurlexist = $this->db->query("select * from sitemapurl where mapurl='".trim($url)."' ")->result_array();

		if(!empty($chkurlexist))

		{

			$exurl =  $chkurlexist[0]['id'];

		}else{

			$exurl = "0";

		}

		

		if($exurl=="0")

		{

			$data = array(

				'mapurl' => $url

			);

			$this->db->insert('sitemapurl',$data);

		}



		// sitemap insert code end  //



		$data['pgres'] = $this->db->query("select * from  pgcontent where pgid='6'")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/cmspage',$data);

		$this->load->view('front/includes/footer');



	}




	public function help()
	{

		$data['pgres'] = $this->db->query("select * from  pgcontent where pgid='6'")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/cmspage',$data);

		$this->load->view('front/includes/footer');



	}







	public function sitemap()

	{

		$this->load->view('front/includes/header');

		$this->load->view('front/sitemap');

		$this->load->view('front/includes/sitempfooter');

		

	}















	// all cms page end //



























































	public function blogcomment()

	{

		if($this->input->post('email'))

		{

			$blogid = trim($this->input->post('blogid'));

			$name = trim($this->input->post('name'));

			$email = trim($this->input->post('email'));

			$subject = trim($this->input->post('subject'));

			$message = trim($this->input->post('message'));

			$today =date('Y-m-d');

			$data = array(

				'blogid'=>$blogid,

				'name'=>$name,

				'email'=>$email,

				'subject'=>$subject,

				'message'=>$message,

				'date' => $today

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



	public function tag()

	{

		//$data['res'] = $this->db->query("select * from blog where slugurl='".$url."'")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/tag');

		$this->load->view('front/includes/footer');



	}



	// more news start //



	public function morenews($url)

	{

		

		$this->load->view('front/includes/header');

		$this->load->view('front/morenews');

		$this->load->view('front/includes/footer');



	}



	// all topics //



	public function more()

	{

		

		$this->load->view('front/includes/header');

		$this->load->view('front/more');

		$this->load->view('front/includes/footer');



	}



	public function alltopics()

	{

		

		$this->load->view('front/includes/header');

		$this->load->view('front/alltopics');

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



	// category wise all news //







	public function singlenews($postdate,$slugurl)

	{





		// sitemap insert code start //

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   

		$url = "https://";   

		else  

		$url = "http://";   

		$url.= $_SERVER['HTTP_HOST'];   

		$url.= $_SERVER['REQUEST_URI'];    



		$chkurlexist = $this->db->query("select * from sitemapurl where mapurl='".trim($url)."' ")->result_array();

		if(!empty($chkurlexist))

		{

			$exurl =  $chkurlexist[0]['id'];

		}else{

			$exurl = "0";

		}

		

		if($exurl=="0")

		{

			$data = array(

				'mapurl' => $url

			);

			$this->db->insert('sitemapurl',$data);

		}



		// sitemap insert code end  //



		$data['res'] = $this->db->query("select * from blog where postdate='".$postdate."' and 

			slugurl='".$slugurl."'")->result_array();



		

		$data2=$this->db->query("select * from blog where postdate='".$postdate."' and 

			slugurl='".$slugurl."'")->result_array();

		if(!empty($data2[0]['id']))

		{

			$blogid =  $data2[0]['id'];

			$exreadcount =  $data2[0]['readcount'];

			if($exreadcount=="0")

			{

				$readcountis = "1";

			}else{

				$readcountis=($exreadcount+1);

			}



			$data3upd = array(

			'readcount' => $readcountis

			);



			$this->db->where('id',$blogid);

			$this->db->update('blog',$data3upd);

		}



		



		



		$this->load->view('front/includes/header');

		$this->load->view('front/singlenews',$data);

		$this->load->view('front/includes/footer');



	}



	//category wise news //

	public function catnews($catslug)

	{

		/*$catdata = $this->db->query("select * from categories where slugurl='".$catslug."'")->result_array();

		if(!empty($catdata)) {

		$catprmaryid =  $catdata[0]['id'];

		}*/

		//$subcat['subcatres'] = $this->db->query("select * from categories where parentid='".$catprmaryid."'")->result_array();



		// sitemap insert code start //

		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   

		$url = "https://";   

		else  

		$url = "http://";   

		$url.= $_SERVER['HTTP_HOST'];   

		$url.= $_SERVER['REQUEST_URI'];    



		$chkurlexist = $this->db->query("select * from sitemapurl where mapurl='".trim($url)."' ")->result_array();

		if(!empty($chkurlexist))

		{

			$exurl =  $chkurlexist[0]['id'];

		}else{

			$exurl = "0";

		}

		

		if($exurl=="0")

		{

			$data = array(

				'mapurl' => $url

			);

			$this->db->insert('sitemapurl',$data);

		}



		// sitemap insert code end  //



		$this->load->view('front/includes/header');

		$this->load->view('front/categorywisenews');

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

	

	

	public function subscribe()

	{



		$data['res'] = $this->db->query("select * from contactpg")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/subscribe',$data);

		$this->load->view('front/includes/footer');



	}





	public function subscribenewletter()

	{

		if($this->input->post('email'))

		{

			$email = $this->input->post('email');

			$chkemail = $this->db->query("select * from subscribemail where email='".$email."'")->result_array();

			if(!empty($chkemail[0]['id']))

			{

				$this->session->set_flashdata('del', 'Email Id already exists');

				redirect('subscribe');

			}else{

				$data  = array(

					'email' => $email

				);

				$this->db->insert('subscribemail',$data);

				$this->session->set_flashdata('success', 'You have successfully subscribed our newsletter');

				redirect('subscribe');

			}

		}

	}



	public function contact()

	{



		$data['res'] = $this->db->query("select * from contactpg")->result_array();

		$this->load->view('front/includes/header');

		$this->load->view('front/contact',$data);

		$this->load->view('front/includes/footer');



	}





	public function subscribenewsletter()

	{



		$this->load->view('front/includes/header');

		$this->load->view('front/subscribenewsletter');

		$this->load->view('front/includes/footer');



	}





	public function subscribesave()

	{



		if($this->input->post('email'))

		{

			$name = $this->input->post('name');

			$email = $this->input->post('email');

			$data= array(

				'name' => $name,

				'email' => $email

			);

			$this->db->insert('subscribe',$data);

			$this->session->set_flashdata('msg', 'You have subscribed our newsletter successfully');

			redirect('subscribenewsletter');

		}



	}





	



	





	public function sendemail()

	{



		

			$name =  $this->input->post('name');

			$email =  $this->input->post('email');

			$phone =  $this->input->post('phone');

			$msg =  $this->input->post('message');

      		$txt = "You have got a email from ".$name."\n Contact no- ".$phone."\n Message -".$msg;



         	$to_email = "techsj04@gmail.com";

   

         //Load email library 

         $this->load->library('email'); 

   

         $this->email->from($from_email,$name); 

         $this->email->to($to_email);

         $this->email->subject('Contact Information'); 

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