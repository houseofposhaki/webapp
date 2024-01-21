<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {



	public function updateprofile()
	{
		if(!empty($this->input->post('userid')))
		{
			$userid = $this->input->post('userid');
			$oldfeatureimg = $this->input->post('oldfeatureimg');

			if(!empty($_FILES['featureimg']['name'] ))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['featureimg']['name'];
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('featureimg')){
					$uploadData = $this->upload->data();
					$featureimg = $uploadData['file_name'];
				}
			}else{
				$featureimg = $oldfeatureimg;
			}


			//sub cat id insert //
			if($this->input->post('subcatid'))
			{
				$subcatidcount = count($this->input->post('subcatid'));
				for($i=0;$i<$subcatidcount;$i++)
				{

					$subcatidarr[] = $this->input->post('subcatid')[$i];

				}
				$subcatiddata = implode(',',$subcatidarr); 
			}
			// sub cat id data insert end //

			$data = array(
				'usertype' => $this->input->post('usertype'),
				'fullname' => $this->input->post('fullname'),
				'address' => $this->input->post('address'),
				'state' => $this->input->post('state'),
				'distrcit' => $this->input->post('distrcit'),
				'block_or_post' => $this->input->post('block_or_post'),
				'pincode' => $this->input->post('pincode'),
				'username' => $this->input->post('username'),
				'subcatid' => $subcatiddata,

				'designation' => $this->input->post('designation'),
				'maincatid' => $this->input->post('maincatid'),
				'isgstreg' => $this->input->post('isgstreg'),
				'gstno' => $this->input->post('gstno'),
				'majorproductdetails' => $this->input->post('majorproductdetails'),
				'businesslife' => $this->input->post('businesslife'),
				'areacoverageid' => $this->input->post('areacoverageid'),
				'paymenttermid' => $this->input->post('paymenttermid'),

				'workignhours' => $this->input->post('workignhours'),
				'businessoffday' => $this->input->post('businessoffday'),
				'kycoption' => $this->input->post('kycoption'),
				'kycfile' => $this->input->post('kycfile'),
				'bankname' => $this->input->post('bankname'),
				'acownername' => $this->input->post('acownername'),
				'bankacno' => $this->input->post('bankacno'),
				'bankifsc' => $this->input->post('bankifsc'),
				'adminalertnote' => $this->input->post('adminalertnote'),
				'featureimg' => $featureimg
			);
/*
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			die;*/

			$this->db->where('id',$userid);
			$this->db->update('user',$data);
			$this->session->set_flashdata('success', 'Your profile has updated successfully and reviewd by admin approval.');
			redirect(base_url().'myprofile');

		}
	}





	public function otpverify()
	{
		error_reporting(0);
		if(!empty($this->input->post('mobile')))
		{
			$mobile = $this->input->post('mobile');
			$usertype = "Customer";
			$enquiryid = $this->input->post('enquiryid');
			$chkmobile  = $this->db->query("select * from user where mobile='$mobile' and isotpverify='1' order by id desc limit 1 ")->result_array();
			if(!empty($chkmobile))
			{
				$this->session->set_flashdata('del', 'This mobile number already registered with us.');
				redirect('signup');
			}else{

				//$otp = mt_rand(100000,999999); 
				$otp = "123456"; 
				$isotpverify = 0;
				$data = array(
					'isotpverify'=>$isotpverify,
					'mobile'=>$mobile,
					'usertype' => $usertype,
					'otp' =>$otp
				);


				/* for sms sending */
				$username = "econn";
				//$apikey = "67e0736f-bf13-463e-8dfe-c38bd3f3da0b";
				$mobileNumber =$mobile;
				$senderId = "EPSEBC";
				$message = "Your OTP for registration in ECON Building Centre is ".$otp." .This is valid for 5 mins.";
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
				/*curl_close($ch);
				echo $output;
				die;*/
				/*** sms sending end*****/




				$chkdata['res'] = array(
					'mobile' => $mobile,
					'otp' => $otp,
					'usertype' => $usertype,
					'enquiryid' => $enquiryid
				);

				$this->db->insert('user',$data);
				$this->load->view('front/includes/header');
				$this->load->view('front/verificationotp',$chkdata);
				$this->load->view('front/includes/footer');


			}
		}
	}


	public function verificationotp()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/includes/footer');
	}

	public function chkotp()
	{
		if(!empty($this->input->post('postotp')))
		{
			$postotp = $this->input->post('postotp');
			$currenturl = $this->input->post('currenturl');
			$postmobile = $this->input->post('postmobile');
			$usertype = $this->input->post('usertype');
			$enquiryid = $this->input->post('enquiryid');
			$chkotpres = $this->db->query("select * from user where mobile='$postmobile' and isotpverify='0' order by id desc limit 1 ")->result_array();
			if(!empty($chkotpres))
			{
				$dbotp = $chkotpres[0]['otp']; 
				$dbuserid = $chkotpres[0]['id'];
				if($postotp=$dbotp)
				{
					$updata = array(
						'isotpverify'=>'1',
						'iscompletedstep'=> '1',
						'usertype'=> $usertype,
						'isactive' => 0
					);
					$this->db->where('mobile',$postmobile);
					$this->db->where('otp',$dbotp);
					$this->db->update('user',$updata);

					$res = $this->db->query("select * from user where id='$dbuserid'")->result();
					$session_data = array(
						'dbuserid' => $dbuserid,
						'id' => $res[0]->id,
						'username' => $res[0]->username,
						'password' => $res[0]->password,
						'fullname' => $res[0]->fullname,
						'usertype' => $res[0]->usertype
					);
					$this->session->set_userdata('logged_in', $session_data);
					$dbuserid =  $this->session->userdata['logged_in']['dbuserid']; 
					if(!empty($currenturl))
					{
						redirect($currenturl);
					}else{
						redirect('/');
					}
					

				}

			}
			

		}
	}

	// step 22//

	public function step2()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/step2form');
		$this->load->view('front/includes/footer');
	}


	public function step2save()
	{

		if(!empty($this->input->post('userid')))
		{
			$userid = $this->input->post('userid');
			$data = array(

				'usertype' => $this->input->post('usertype'),
				'fullname' => $this->input->post('fullname'),
				'address' => $this->input->post('address'),
				'state' => $this->input->post('state'),
				'distrcit' => $this->input->post('distrcit'),
				'block_or_post' => $this->input->post('block_or_post'),
				'pincode' => $this->input->post('pincode'),
				'iscompletedstep'=> '2'

			);
			$this->db->where('id',$userid);
			$this->db->update('user',$data);
			redirect('step3');
		}


	}

	// step 3 //

	public function step3()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/step3form');
		$this->load->view('front/includes/footer');

	}


	public function step3save()
	{

		if(!empty($this->input->post('userid')))
		{
			$userid = $this->input->post('userid');
			//sub cat id insert //
			if($this->input->post('subcatid'))
			{
				$subcatidcount = count($this->input->post('subcatid'));
				for($i=0;$i<$subcatidcount;$i++)
				{

					$subcatidarr[] = $this->input->post('subcatid')[$i];

				}
				$subcatiddata = implode(',',$subcatidarr); 
			}
			// sub cat id data insert end //


			$data = array(

				'designation' => $this->input->post('designation'),
				'maincatid' => $this->input->post('maincatid'),
				'subcatid' => $subcatiddata,
				'isgstreg' => $this->input->post('isgstreg'),
				'gstno' => $this->input->post('gstno'),
				'majorproductdetails' => $this->input->post('majorproductdetails'),
				'businesslife' => $this->input->post('businesslife'),
				'areacoverageid' => $this->input->post('areacoverageid'),
				'paymenttermid' => $this->input->post('paymenttermid'),
				'iscompletedstep'=> '3'

			);

			$this->db->where('id',$userid);
			$this->db->update('user',$data);
			redirect('step4');
		}


	}


	// step 4 //
	public function step4()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/step4form');
		$this->load->view('front/includes/footer');

	}




	public function add_row_promoter()
	{
		$slno = $this->input->post('a');
		$data['slno'] = $slno;
		$this->load->view('front/promoteradd',$data);
		echo "<br>";
	}

	public function step4save()
	{	error_reporting(0);

		if(!empty($this->input->post('userid')))
		{
			$userid = $this->input->post('userid');

			if(!empty($_FILES['featureimg']['name'] ))
			{
				$randno = rand();
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $randno.$_FILES['featureimg']['name'];
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('featureimg')){
					$uploadData = $this->upload->data();
					$featureimg = $uploadData['file_name'];
				}
			}else{
				$featureimg = $oldfeatureimg;
			}


			// promoter insert //
			$lim = count($this->input->post('slno'));
			for($i=0;$i<$lim;$i++)
			{
				$promotername = $this->input->post('promotername')[$i];
				$professionofpromoter = $this->input->post('professionofpromoter')[$i];
				$promotermobile = $this->input->post('promotermobile')[$i];
				$datachild = array(
					'promotername' => $promotername,
					'professionofpromoter' => $professionofpromoter,
					'promotermobile' => $promotermobile,
					'userid' => $userid
				);
				$this->db->insert('professiondetails',$datachild);

			}

			$data = array(

				'workignhours' => $this->input->post('workignhours'),
				'businessoffday' => $this->input->post('businessoffday'),
				'kycoption' => $this->input->post('kycoption'),
				'kycfile' => $this->input->post('kycfile'),
				'bankname' => $this->input->post('bankname'),
				'acownername' => $this->input->post('acownername'),
				'bankacno' => $this->input->post('bankacno'),
				'bankifsc' => $this->input->post('bankifsc'),
				'featureimg' => $featureimg,
				'iscompletedstep'=> '4'

			);
			$this->db->where('id',$userid);
			$this->db->update('user',$data);
			redirect('step5');
		}


	}

	// step 5 //
	public function step5()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/step5form');
		$this->load->view('front/includes/footer');

	}






}