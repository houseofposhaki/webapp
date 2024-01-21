<?php























defined('BASEPATH') OR exit('No direct script access allowed');















































class Front extends CI_Controller {















































	public function __construct()























	{























		parent::__construct();























		$this->load->model('Frontmodel');























		$this->load->library("pagination");























	}















































	public function signup()























	{























		$this->load->view('front/includes/header');























		$this->load->view('front/signup');























		$this->load->view('front/includes/footer');























	}















	public function sendotp()



	{



		error_reporting(0);



		if(!empty($this->input->post('mobile')))



		{



			$mobile = $this->input->post('mobile');



			$res = $this->db->query("select * from user where mobile='$mobile' and isotpverify='1'  ")->result_array();



			if(!empty($res))



			{



				$userid = $res[0]['id'];



				//$loginotp = mt_rand(100000,999999); 



				$loginotp = "123456"; 



				$senddata['res'] = array(



					'mobile' => $mobile,



					'otp' => $loginotp



				);



				$otpdata = array('otp'=> $loginotp);















				/* for sms sending */



				$username = "econn";



				//$apikey = "67e0736f-bf13-463e-8dfe-c38bd3f3da0b";



				$mobileNumber =$mobile;



				$senderId = "ECNIND";



				$message = "Your login OTP in ECON Building Centre is ".$loginotp." This is valid for 5 mins.";



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



					//echo 'error:' . curl_error($ch);



				}



				// curl_close($ch);



				// echo $output;



				// die;



				/*** sms sending end*****/



				$this->db->where('id',$userid);



				$this->db->update('user',$otpdata);



				$this->load->view('front/includes/header');



				$this->load->view('front/loginotp',$senddata);



				$this->load->view('front/includes/footer');



			}else{



				$this->session->set_flashdata('del', 'Mobile Number does not exist or Your prifile is pending for approval');



				redirect('securelogin');



			}







		}







	}































































	public function securelogin()























	{























		$this->load->view('front/includes/header');























		$this->load->view('front/securelogin');























		$this->load->view('front/includes/footer');























	}















































	/* chk login */






















public function loginchk()

	{


		if($this->input->post('username'))





		{





			$username = $this->input->post('username');
			$requrl = $this->input->post('requrl');





			$password = base64_encode($this->input->post('password'));





			$this->db->select('*');





			$this->db->from('user');





			$this->db->where('username',$username);





			$this->db->where('password',$password);





			//$this->db->where('updatestatus','1');





			$query=$this->db->get();





			if ($query->num_rows() >= 1) {





				$res = $query->result();





				$session_data = array(





					'id' => $res[0]->id,





					'username' => $res[0]->username,





					'password' => $res[0]->password,





					'fullname' => $res[0]->fullname,





					'branchid' => $res[0]->branchid,





					'usertype' => $res[0]->usertype





				);







			$this->session->set_userdata('logged_in', $session_data);





 			$userid =  $this->session->userdata['logged_in']['id'];





 			$usertype =  $this->session->userdata['logged_in']['usertype'];





			redirect($requrl);

		//	redirect('admin/dashboard');





			} else {





				$this->session->set_flashdata('loginFailed', 'Invalid Username/Password. Please try again.');





				$this->session->set_flashdata('del', 'Wrong username or password !.');





				redirect('securelogin');





			}





		} else {





			echo 'Not submitted successfully';





		}





	}





















	/* chk login */















































	public function securelogout()



	{







		$session_userdata = array(



			'id' => '',



			'username' => '',



			'password' => '',



			'fullname' => ''







		);







		$this->session->unset_userdata('logged_in',$session_userdata);



		redirect('securelogin');



	}































































































	public function signupsave()























	{























		if($this->input->post('username'))























		{























			$fullname = $this->input->post('fullname');























			$username = $this->input->post('username');























			// check //























			$exusrname = $this->db->query("select * from user where username='".$username."'")->result_array();























			if(!empty($exusrname[0]['id']))























			{























				$this->session->set_flashdata('del', 'You have already register Please login..');























				redirect('signup');























			}























			$password = $this->input->post('password');























			$data = array(























				'fullname'=>$fullname,























				'username'=>$username,























				'password'=>base64_encode($password)























			);























			$this->db->insert('user',$data);























			$this->session->set_flashdata('msg', 'You have registered successfully. Please Login..');























			redirect('securelogin');























		}























	}















































	







































































	public function index()























	{















































		// sitemap insert code start //























		/*if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   























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























		}*/















































		// sitemap insert code end  //







































































		$this->load->view('front/includes/header');























		$this->load->view('front/home');























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















































	public function doctorjoinsave()























	{























		if($this->input->post('doctorname'))























		{























			$doctorname = $this->input->post('doctorname');























			$doctorphone = $this->input->post('doctorphone');























			$doctoremail = $this->input->post('doctoremail');























			$doctorliscno = $this->input->post('doctorliscno');























			$data = array(























				'doctorname' => $doctorname,























				'doctorphone' => $doctorphone,























				'doctoremail' => $doctoremail,























				'doctorliscno' => $doctorliscno























			);























			$this->db->insert('doctorsubscribe',$data);























			redirect('');























		}























	}















































}