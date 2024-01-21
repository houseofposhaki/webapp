<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

	}


	public function myorders()
	{
		if(empty($this->session->userdata['logged_in']['id']))
		{
			redirect('securelogin');
		}

		$this->load->view('front/includes/header');
		$this->load->view('front/myorders');
		$this->load->view('front/includes/footer');	

	}



	public function invoiceprint()
	{

		$this->load->view('admin/master/pages/invoiceprint');

	}


	public function returnreqpg()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/returnreqpg');
		$this->load->view('front/includes/footer');	
	}

	public function returnreq()
	{
		if(!empty($this->input->post('returnqty')))
		{
			$returnqty = $this->input->post('returnqty');
			$orderno = $this->input->post('orderno');
			$cartid = $this->input->post('cartid');
			$data = array('refundstatus'=>1,'returnqty'=>$returnqty);
			$this->db->where('id',$cartid);
			$this->db->update('cart',$data);
			redirect('Cart/orderdetails/'.$orderno);
		}
		
		
	}

	public function orderdetails()
	{

		$this->load->view('front/includes/header');
		$this->load->view('front/orderdetails');
		$this->load->view('front/includes/footer');	

	}

	public function details()
	{
		$this->load->view('front/includes/header');
		$this->load->view('front/details');
		$this->load->view('front/includes/footer');
	}

	public function razorPaySuccess()
	{ 
		if(!empty($this->session->userdata['logged_in']['id'])){
			$useridis = $this->session->userdata['logged_in']['id'];
		}else{
			$useridis = '';
		}
		$product_id = $this->input->post('product_id');
		$order_id = $this->input->post('order_id');
		$data = [
			'user_id' => $useridis,
			'payment_id' => $this->input->post('razorpay_payment_id'),
			'amount' => $this->input->post('totalAmount'),
			'product_id' => $this->input->post('product_id'),
			'order_id' => $this->input->post('order_id'),
		];

		// echo "<pre>";
		// print_r($data);
		$insert = $this->db->insert('payments', $data);
     // orders //
		$dataupd=array(
			'ispaid' => '1',
			'paymode' => 'Online'

		);
		$this->db->where('orderno',$order_id);
		$this->db->update('ordertbl',$dataupd);
    // redirect('thankyou');
		$arr = array('msg' => 'Payment successfully credited', 'status' => true);  
		echo json_encode($arr);
	}

	public function paysuccess()
	{
		if(empty($this->session->userdata['logged_in']['id']))
			{ redirect('securelogin') ; }
		$useridis = $this->session->userdata['logged_in']['id'];
		$orderid =  $this->uri->segment('3'); 
		// orders //
		$dataupd=array(
			'ispaid' => '0',
			'paymode' => 'COD'
		);
		$this->db->where('orderno',$orderid);
		$this->db->update('ordertbl',$dataupd);
    // redirect('thankyou');
		$this->load->view('front/includes/header');
		$this->load->view('front/thankyou');
		$this->load->view('front/includes/footer');

	}






	public function RazorThankYou()
	{
		// if(empty($this->session->userdata['logged_in']['id']))
		// 	{ redirect('securelogin') ; }
		$this->load->view('front/includes/header');
		$this->load->view('front/thankyou');
		$this->load->view('front/includes/footer');
	}
	

	public function paynow()
	{
		if(empty($this->session->userdata['logged_in']['id']))
			{ redirect('securelogin') ; }
		$this->load->view('front/includes/header');
		$this->load->view('front/paynow');
		$this->load->view('front/includes/footer');
	}


	public function thankyou($billno)
	{	
		
		$this->load->view('front/includes/header');
		$this->load->view('front/thankyou');
		$this->load->view('front/includes/footer');
	}


	public function removecart()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id',$id);
		$this->db->delete('cart');
		$this->session->set_flashdata('del', 'Content deleted successfully');
		redirect('cartlist');
	}




	public function ordersubmit()
	{
		// if(empty($this->session->userdata['logged_in']['id']))
		// 	{ redirect('securelogin') ; }
		if($this->input->post('grandtot'))
		{
			/*if($this->input->post('paymentmethod')=="cash")
			{
				echo "cash"; die;
			}*/
			$grandtot = $this->input->post('grandtot');
			$discountedprice = $this->input->post('discountedprice');
			$coupondiscountamt = $this->input->post('coupondiscountamt');
			$totmrp = $this->input->post('totmrp');
			$carttotal = $this->input->post('carttotal');
			$couponis = $this->input->post('couponis');
			$userid = $this->input->post('userid');
			$name = $this->input->post('name');
			$mobile = $this->input->post('mobile');
			$pincode = $this->input->post('pincode');
			$landmark = $this->input->post('landmark');
			$address = $this->input->post('address');
			$doctorname = $this->input->post('doctorname');
			$patientname = $this->input->post('patientname');
			$specialinstruction = $this->input->post('specialinstruction');
			$orderno = $this->input->post('orderno');
			$chkorderres = $this->db->query("select * from ordertbl order by id desc")->result_array();
			if(empty($chkorderres))
			{
				$orderno = "1001";
			}else{
				$orderno = ($chkorderres[0]['orderno']+1);
			}


			date_default_timezone_set('Asia/Kolkata');
			$ordts = date('Y-m-d');

			$data = array(
				'discountedprice' => $discountedprice,
				'totmrp' => $totmrp,
				'coupondiscountamt' => $coupondiscountamt,
				'doctorname' => $doctorname,
				'patientname' => $patientname,
				'carttotal' => $carttotal,
				'grandtot' => $grandtot,
				'couponis' => $couponis,
				'userid' => $userid,
				'name' => $name,
				'mobile' => $mobile,
				'pincode' => $pincode,
				'landmark' => $landmark,
				'address' => $address,
				'approvestatus' =>0,
				'specialinstruction' => $specialinstruction,
				'ordstatus' => 'New',
				'orderno' => $orderno,
				'date' => $ordts
			);

		
			$this->db->insert('ordertbl',$data);
			$dataupd = array(
				'status' =>'1',
				'orderno' => $orderno,
				'userid' => $userid
			);
			$where = "orderno is  NULL";
			$this->db->where($where);
			$this->db->update('cart',$dataupd);
			//redirect('paynow/'.$orderno."/".$userid);
			$paymentmethod = $this->input->post('paymentmethod');
			$email = $this->input->post('email');

            if($paymentmethod=="razorpay")
            { 
                $onlinePayData['postData'] = array( 
                  "orderId" => $orderno, 
                  "orderAmount" => $carttotal, 
                  "orderCurrency" => $this->input->post('orderCurrency'), 
                  "orderNote" =>"test", 
                  "customerName" => $name, 
                  "customerPhone" => $mobile, 
                  "customerEmail" => $email
                  // "returnUrl" => $this->input->post('returnUrl'), 
                  // "notifyUrl" => $this->input->post('notifyUrl'),
                );

                $this->load->view('front/includes/header');
                $this->load->view('front/onlinepay',$onlinePayData);
				$this->load->view('front/includes/footer');
            
            }else{

            redirect('thankyou/'.$orderno);

            }

		}
	}



	public function uploadordersubmit()
	{

		if(empty($this->session->userdata['logged_in']['id']))
			{ redirect('securelogin') ; }
		if($this->input->post('userid'))
		{
			$grandtot = $this->input->post('grandtot');
			$couponis = $this->input->post('couponis');
			$userid = $this->input->post('userid');
			$name = $this->input->post('name');
			$mobile = $this->input->post('mobile');
			$pincode = $this->input->post('pincode');
			$landmark = $this->input->post('landmark');
			$address = $this->input->post('address');
			$doctorname = $this->input->post('doctorname');
			$patientname = $this->input->post('patientname');
			$isupload = $this->input->post('isupload');
			$specialinstruction = $this->input->post('specialinstruction');
			$orderno = $this->input->post('orderno');
			$chkorderres = $this->db->query("select * from ordertbl order by id desc")->result_array();
			if(empty($chkorderres))
			{
				$orderno = "1001";
			}else{
				$orderno = ($chkorderres[0]['orderno']+1);
			}

			if(!empty($_FILES['featureimg']['name'] ))
			{
				$randno = rand();
				$config['upload_path'] = 'prescription/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|word';
				$config['file_name'] = $randno.$_FILES['featureimg']['name'];
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('featureimg')){
					$uploadData = $this->upload->data();
					$featureimg = $uploadData['file_name'];
				}
			}

			date_default_timezone_set('Asia/Kolkata');
			$ordts = date('Y-m-d H:i:s');
			$data = array(
				'grandtot' => $grandtot,
				'isupload' => $isupload,
				'couponis' => $couponis,
				'userid' => $userid,
				'name' => $name,
				'mobile' => $mobile,
				'pincode' => $pincode,
				'landmark' => $landmark,
				'address' => $address,
				'featureimg' => $featureimg,
				'approvestatus' =>0,
				'specialinstruction' => $specialinstruction,
				'ordstatus' => 'New',
				'orderno' => $orderno,
				'ts' => $ordts
			);
			
			$this->db->insert('ordertbl',$data);
			/*$dataupd = array(
				'status' =>'1',
				'orderno' => $orderno,
				'userid' => $userid
			);
			$where = "orderno is  NULL";
			$this->db->where($where);
			$this->db->update('cart',$dataupd);*/
			redirect('paynow/'.$orderno."/".$userid);
			//redirect('thankyou/'.$orderno);
		}
	}







	public function checkout()
	{
		if($this->input->post('grandtot'))
		{
			// if(empty($this->input->post('userid')))
			// {
			// 	redirect('securelogin');
			// }

			$grandtot = $this->input->post('grandtot');
			$couponis = $this->input->post('couponis');
			$userid = $this->input->post('userid');
			$discountedprice = $this->input->post('discountedprice');
			$coupondiscountamt = $this->input->post('coupondiscountamt');
			$totmrp = $this->input->post('totmrp');
			$carttotal = $this->input->post('carttotal');
			$data['res'] = array(
				'grandtot' => $grandtot,
				'couponis' => $couponis,
				'userid' => $userid,
				'discountedprice' => $discountedprice,
				'coupondiscountamt' => $coupondiscountamt,
				'totmrp' => $totmrp,
				'carttotal' => $carttotal
			);
			$this->load->view('front/includes/header');
			$this->load->view('front/deliveryaddress',$data);
			$this->load->view('front/includes/footer');
		}
	}

	public function applycoupon()
	{
		if($this->input->post('coupon'))
		{

			$coupon  = $this->input->post('coupon');
			$carttotal  = $this->input->post('carttotal');
			$today = date('Y-m-d');
			$chkcoupon = $this->db->query("select * from coupon where code='".trim($coupon)."' 
				and validto > '".$today."'  ")->result_array();
			if(!empty($chkcoupon))
			{
				$discamt = $chkcoupon[0]['discamt'];
				$discpp = ($carttotal*$discamt);
				$discdiv = ($discpp/100);
				$minusamt = ($carttotal - $discdiv);
				$data['decreseamt'] = array('minusamt'=>$minusamt,'couponcode' => $coupon,'dedcutionamt'=> $discdiv,'discpercent'=> $discamt,
					'carttotal'=>$carttotal);

				$this->session->set_flashdata('success', 'Coupon Code Applied');
				$this->load->view('front/includes/header');
				$this->load->view('front/cartlist',$data);
				$this->load->view('front/includes/footer');

			}else{
				$discamt = "";
				$this->session->set_flashdata('del', 'Invalid Coupon code!');
				redirect('cartlist');
			}


		}
	}


	public function updatecart()
	{
		if($this->input->post('qty'))
		{
			$cartid = $this->input->post('cartid');
			$productprice = $this->input->post('productprice');
			$qty = $this->input->post('qty');
			$total = ($qty*$productprice);
			$data = array(
				'productprice' => $productprice,
				'qty' => $qty,
				'total' => $total
			);
			$this->db->where('id',$cartid);
			$this->db->update('cart',$data);
			redirect('cartlist');
		}
	}



	public function updatecartajax()
	{
		$cartid = $this->uri->segment('3');
		$qty = $this->uri->segment('4');
		    // fetch cart details //

		$cartres = $this->db->query("select * from cart where id='$cartid'")->result_array();
		if(!empty($cartres))
		{

			$productprice = $cartres[0]['productprice'];
			$pcomamt = $cartres[0]['pcomamt'];
			$pgstvalue = $cartres[0]['pgstvalue'];
		}

		$itemtotal = ($productprice*$qty);
		$itemtotcommission = ($pcomamt*$qty);
		$itemtotgstvalue = ($qty*$pgstvalue);
		$cartdata = array(
			'qty' => $qty,
			'total' => $itemtotal,
			'ptotcomsion' => round($itemtotcommission,2),
			'ptotgstvalue' => round($itemtotgstvalue,2)
		);
		$this->db->where('id',$cartid);
		$this->db->update('cart',$cartdata);
		redirect('Cart/cartlist');

	}


	public function calcarttotal()
	{
		if($this->input->post('userid'))
		{
			
			$userid = $this->input->post('userid');
			$totqry = $this->db->query("select sum(total) as gtot from cart where userid='$userid' and status='0'  ")->result_array();
			if(!empty($totqry))
			{

				$carttotal = $totqry[0]['gtot'];
			}else{
				$carttotal = 0;
			}
			echo $carttotal;
		}

	}


	public function cartlist()
	{
			$this->load->view('front/includes/header');
			$this->load->view('front/cartlist');
			$this->load->view('front/includes/footer');
		/*if(empty($this->session->userdata['logged_in']['id']))
		{
			redirect('securelogin');
		}else{

			$this->load->view('front/includes/header');
			$this->load->view('front/cartlist');
			$this->load->view('front/includes/footer');
		}*/
	}

	public function addtocart()
	{
		$currenturl = $this->input->post('currenturl');
		
		if($this->input->post('productid'))
		{


			$cookie_name = "cartcookieposhaki";
			if(!empty($_COOKIE[$cookie_name]))
			{
				$cookievalis = $_COOKIE[$cookie_name];
			}else{
				$cookievalis = rand();
				setcookie($cookie_name, $cookievalis, time() + (86400 * 30), "/"); // 86400 = 1 day
			}
			if(!empty($this->session->userdata['logged_in']['id']))
			{
				$userid = $this->session->userdata['logged_in']['id'];

			}else{
				$userid='';
			}

			$productid = $this->input->post('productid');
			$productprice = $this->input->post('productprice');
			$postqty = $this->input->post('qty');
			if(!empty($postqty))
			{
				$qty = $postqty;
			}else{
				$qty = 1;
			}

			$producttotalis = ($qty*$productprice);

				//calculate commission //
			$productres = $this->db->query("select * from product where id='$productid'")->result_array();
			// if(!empty($productres))
			// {
			// 	$pcompercent = $productres[0]['commission'];
			// 	$pinto = ($productprice*$pcompercent);
			// 	$pcomamt = ($pinto/100);
			// 	$ptotcomsion = ($pcomamt*$qty);
			// 	$pgstvalue = $productres[0]['gstvalue'];
			// 	$ptotgstvalue = ($pgstvalue*$qty);

			// }


				//calculate commission end //

			$data = array(
				'userid' => $userid,
				'cookievalis'=> $cookievalis,
				'productid' => $productid,
				'productprice' => $productprice,
				'qty' => $qty,
				'total' => $producttotalis,
				'pcompercent' => $pcompercent,
				'pcomamt' => $pcomamt,
				'ptotcomsion' => $ptotcomsion,
				'pgstvalue' => $pgstvalue,
				'ptotgstvalue' => $ptotgstvalue
			);
			$this->db->insert('cart',$data);
			//redirect($currenturl);
			redirect('cartlist');


		}

		
	}



}