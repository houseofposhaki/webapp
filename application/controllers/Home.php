<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontmodel');
		$this->load->library("pagination");
	}	




	public function sendmail()
	{
		// echo $this->input->post('hidfiled') ;  die;
		if(!empty($this->input->post('hidfiled')))
		{

			die();
		}



		$contactres = $this->db->query("select * from  contactpg where id='1' ")->result_array();

		foreach($contactres as $contactrow)

		{

		   $merchantemail = $contactrow['email'];

		}




		
		if($this->input->post('name'))
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$msg = $this->input->post('msg');

			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'msg' => $msg
			);
			// echo "<pre>";
			// print_r($data);
			// die;
			// mail start //
			$to = $merchantemail;
			$txt = "You have got a email from ".$name."\n Contact no- ".$phone."\n Message -".$msg;
			$subject = "Contact Request Recieved".$name;
			$headers = "From: ".$email . "\r\n" ;
			mail($to,$subject,$txt,$headers);
			$this->session->set_flashdata('msg', 'Your contact info send  successfully');
			redirect('contact-us');
		}

	}




	public function tagfetch()
	{
		$res = $this->db->query("select distinct title from product ")->result_array();
		$data = array();
		if(!empty($res))
		{
			foreach($res as $row)
			{
				$data[] = $row['title'];
			}
			echo json_encode($data);
		}

	}


	public function itemfetch()
	{
		$res = $this->db->query("select * from product  ")->result_array();
		$data = array();
		if(!empty($res))
		{
			foreach($res as $row)
			{
				$data[] = $row['title'];
			}
			echo json_encode($data);
		}

	}



	public function pincodefetch()
	{
		$res = $this->db->query("select * from pincode  ")->result_array();
		$data = array();
		if(!empty($res))
		{
			foreach($res as $row)
			{
				$data[] = $row['pin'];
			}
			echo json_encode($data);
		}

	}


	public function search()
	{
		if(!empty($this->input->post('producttitle')))
		{
			$producttitle = trim($this->input->post('producttitle'));
			$qry =  "select * from product where title like '%$producttitle%' ";
			$data['pres'] = $this->db->query($qry)->result_array();

			/*$titleis = preg_replace( '/[^a-z0-9 ]/i', '', $producttitle);
			$smalltxt = strtolower($titleis);
			$slugurl = preg_replace('#[ -]+#', '-', $smalltxt);
			$pres = $this->db->query("select * from product where slugurl='".$slugurl."'")->result_array();

			if(!empty($pres))
			{
				$pslug = $pres[0]['slugurl'];
				$pid = $pres[0]['id'];
				redirect("p/details/".$pslug."/".$pid);
			}*/

			$this->load->view('front/includes/header');
			$this->load->view('front/searchresult',$data);
			$this->load->view('front/includes/footer');

		}
	}




	public function myaccount()
	{
		if(empty($this->session->userdata['logged_in']['id']))
		{
			redirect('securelogin');
		}
		$this->load->view('front/includes/header');
		$this->load->view('front/myaccount');
		$this->load->view('front/includes/footer');
	}


	public function prescriptionupload()
	{
		if(empty($this->session->userdata['logged_in']['id']))
		{
			redirect('securelogin');
		}
		$this->load->view('front/includes/header');
		$this->load->view('front/prescriptionupload');
		$this->load->view('front/includes/footer');

	}


	

	public function ordetails()
	{
		if(empty($this->session->userdata['logged_in']['id']))
		{
			redirect('securelogin');
		}
		$this->load->view('front/includes/header');
		$this->load->view('front/ordetails');
		$this->load->view('front/includes/footer');
	}


	public function accountupdate()
	{
		$userid = $this->input->post('userid');
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'mobile' => $this->input->post('mobile'),
			'address' => $this->input->post('address')
		);
		$this->db->where('id',$userid);
		$this->db->update('user',$data);
		redirect('myaccount');
	}

	public function orderhistory()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/orderhistory');
		$this->load->view('front/includes/footer');
	}




	public function catproductlist($slug,$id)
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/catproductlist');
		$this->load->view('front/includes/footer');
	}


	public function subcatproductlist()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/subcatproductlist');
		$this->load->view('front/includes/footer');
	}
	

	public function childcatproductlist($slug,$id)
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/childcatproductlist');
		$this->load->view('front/includes/footer');
	}
	

	public function ajaxPro()
	{
		$query = $this->input->get('query');
		$this->db->like('tagname', $query);
		$data = $this->db->get("blogtag")->result();
		echo json_encode( $data);
	}

	public function catupdate()
	{
		$blogres = $this->db->query("select * from blog ")->result_array();
		foreach($blogres as $blogrow)
		{
			$blogcatid =  $blogrow['catid'];
			$allcatres = $this->db->query("select * from categories where id ='".$blogcatid."' ")->result_array();
			$blogparentid = $allcatres[0]['parentid'];

			$updadate = array(
				'maincatid' => $blogparentid
			);
			$this->db->where('catid',$blogcatid);
			$this->db->update('blog',$updadate);

		}

	}
	

	public function index()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/home');
		$this->load->view('front/includes/footer');
	}


	

	public function signup()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/signup');
		$this->load->view('front/includes/footer');
	}


	public function selleregister()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/selleregister');
		$this->load->view('front/includes/footer');
	}

	



	public function securelogin()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/securelogin');
		$this->load->view('front/includes/footer');
	}





	/*public function index()
	{

		$this->load->view('front/includes/header');

		$config = array();
		
		$config['num_tag_open'] = '<li>'; 
		$config['num_tag_close'] = '</li>'; 
		$config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0);">'; 
		$config['cur_tag_close'] = '</a></li>'; 
		$config['next_link'] = 'Next'; 
		$config['prev_link'] = 'Prev'; 
		$config['next_tag_open'] = '<li class="pg-next">'; 
		$config['next_tag_close'] = '</li>'; 
		$config['prev_tag_open'] = '<li class="pg-prev">'; 
		$config['prev_tag_close'] = '</li>'; 
		$config['first_tag_open'] = '<li>'; 
		$config['first_tag_close'] = '</li>'; 
		$config['last_tag_open'] = '<li>'; 
		$config['last_tag_close'] = '</li>';

        $config["base_url"] = base_url() . "Home/index";
        $config["total_rows"] = $this->Frontmodel->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 1;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["blogrespagination"] = $this->Frontmodel->
            fetch_blogs($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

		$this->load->view('front/home',$data);

		$this->load->view('front/includes/footer');
	}*/

	public function usersubscribesave()
	{
		if($this->input->post('username'))
		{
			$username = $this->input->post('username');
			$userphone = $this->input->post('userphone');
			$useremail = $this->input->post('useremail');
			$data = array(
				'username' => $username,
				'userphone' => $userphone,
				'useremail' => $useremail
			);
			$this->db->insert('usersubscribe',$data);
			redirect('');
		}
	}



	public function signupsave()
	{
		if($this->input->post('username'))
		{
			$fullname = $this->input->post('fullname');
			$username = $this->input->post('username');
			$phone = $this->input->post('phone');
			$genotp =  mt_rand(100000, 999999);
			// check //
			$exusrname = $this->db->query("select * from user where username='".$username."'")->result_array();
			$exusrphone = $this->db->query("select * from user where phone='".$phone."'")->result_array();
			if(!empty($exusrname[0]['id']))
			{
				$this->session->set_flashdata('del', 'You have already register Please login..');
				redirect('signup');
			}
			if(!empty($exusrphone[0]['id']))
			{
				$this->session->set_flashdata('del', 'You have already register Please login..');
				redirect('signup');
			}
			$password = $this->input->post('password');
			$data = array(
				'fullname'=>$fullname,
				'username'=>$username,
				'phone'=>$phone,
				'usertype'=>"User",
				'otp' => $genotp,
				'password'=>base64_encode($password)
			);
			$this->db->insert('user',$data);


					            /*   // sms start //
									$username = "eamazonite";
									$apikey = "3cdd7c56-fced-48d7-bac6-109e69533b6e";
									$mobileNumber = $phone;
									$senderId = "MPSMOT";
									$message = "Your OTP is: ".$genotp." for register in Eamazonite";
									$smstype = "TRANS";
									$postData = array(
										'apikey' => $apikey,
										'numbers' => $mobileNumber ,
										'message' => $message ,
										'sendername' =>$senderId ,
										'smstype' => $smstype,
										'username' => $username,
									);
									$url="http://sms.ithubtechnology.com/sendSMS";
									$ch = curl_init();
									curl_setopt_array($ch, array(
										CURLOPT_URL => $url,
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_POST => true,
										CURLOPT_POSTFIELDS => $postData
									));
									curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
									$output = curl_exec($ch);
									if(curl_errno($ch))
									{
										echo 'error:' . curl_error($ch);
									}
									curl_close($ch);
									//sms end //


			$this->session->set_flashdata('msg', 'You have registered successfully. Please Login..');
			redirect('verifyotp');*/

			$this->session->set_flashdata('msg', 'You have registered successfully. Please Login..');
			redirect('securelogin');

		}

	}	


	// seller sign up save //
	public function sellersignupsave()
	{
		if($this->input->post('username'))
		{
			$fullname = $this->input->post('fullname');
			$username = $this->input->post('username');
			$pincode = $this->input->post('pincode');
			$phone = $this->input->post('phone');
			$genotp =  mt_rand(100000, 999999);
			// check //
			$exusrname = $this->db->query("select * from user where username='".$username."'")->result_array();
			$exusrphone = $this->db->query("select * from user where phone='".$phone."'")->result_array();
			if(!empty($exusrname[0]['id']))
			{
				$this->session->set_flashdata('del', 'You have already register Please login..');
				redirect('selleregister');
			}
			if(!empty($exusrphone[0]['id']))
			{
				$this->session->set_flashdata('del', 'You have already register Please login..');
				redirect('selleregister');
			}
			$password = $this->input->post('password');
			$data = array(
				'fullname'=>$fullname,
				'username'=>$username,
				'phone'=>$phone,
				'usertype'=>"Seller",
				'otp' => $genotp,
				'pincode' => $pincode,
				'password'=>base64_encode($password)
			);
			$this->db->insert('user',$data);


					               // sms start //
									$username = "eamazonite";
									$apikey = "3cdd7c56-fced-48d7-bac6-109e69533b6e";
									$mobileNumber = $phone;
									$senderId = "MPSMOT";
									$message = "Dear, Your OTP is: ".$genotp." for register in Eamazonite";
									$smstype = "TRANS";
									$postData = array(
										'apikey' => $apikey,
										'numbers' => $mobileNumber ,
										'message' => $message ,
										'sendername' =>$senderId ,
										'smstype' => $smstype,
										'username' => $username,
									);
									$url="http://sms.ithubtechnology.com/sendSMS";
									$ch = curl_init();
									curl_setopt_array($ch, array(
										CURLOPT_URL => $url,
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_POST => true,
										CURLOPT_POSTFIELDS => $postData
									));
									curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
									$output = curl_exec($ch);
									if(curl_errno($ch))
									{
										echo 'error:' . curl_error($ch);
									}
									curl_close($ch);
									//echo $output; 
									//sms end //


			$this->session->set_flashdata('msg', 'You have registered successfully. Please Login..');
			redirect('verifyotp');
		}

	}	




	public function verifyotp()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/verifyotp');
		$this->load->view('front/includes/footer');
	}


	public function otpverify()
	{
		if($this->input->post('otp'))
		{
			$otp = $this->input->post('otp');
			$res = $this->db->query("select * from user where otp='$otp' ")->result_array();
			if(!empty($res))
			{
				$usertype = $res[0]['usertype'];
				$data = array(
					'updatestatus' => '1'
				);
				$this->db->where('otp',$otp);
				$this->db->update('user',$data);
				if($usertype=="User")
				{
					redirect('securelogin');
				}elseif($usertype=="Seller"){
					redirect('sellerlogin');
				}
			}else{
				$this->session->set_flashdata('del', 'Wrong OTP');
				redirect('verifyotp');
			}
		}
	}






}