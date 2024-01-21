<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Adminnewcontroller extends CI_Controller {

	public function __construct()

	{

		parent::__construct();

	}



	// order edit start //


	public function ordstatchcange()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/ordstatchcange');
		$this->load->view('admin/includes/footer');
	}

	public function updordstatus()
	{

		if(!empty($this->input->post('orderno')))
		{
			$ordstatus = $this->input->post('ordstatus');
			$orderno = $this->input->post('orderno');
			$data = array(
				'orderno' => $orderno,
				'ordstatus' => $ordstatus
			);
			$this->db->where('orderno',$orderno);
			$this->db->update('ordertbl',$data);
			redirect('admin/orderlist');
		}

	}

	

	public function itemdelcart()
    {
    	  $itemidis = $this->uri->segment('4');
    	  $orderno = $this->uri->segment('5');
    	  $this->db->where('id',$itemidis);
    	  $this->db->delete('cart');
    	  redirect('admin/Adminnewcontroller/editorder/'.$orderno);


    }


	 public function add_row_edit()
    {
    	$slno = $this->input->post('a');
    	$data['slno'] = $slno;
    	$this->load->view('admin/master/pages/adstimeedit',$data);
    	echo "<br>";
    }



    public function orderupdate()
    {

    	$cookie_name = "cartcookieposhaki";
		if(!empty($_COOKIE[$cookie_name]))
		{
			$cookievalis = $_COOKIE[$cookie_name];
		}else{
			$cookievalis = "";
		}

    	date_default_timezone_set('Asia/Kolkata');
    	$updatedate = date('Y-m-d H:i:s');
    	$orderno = $this->input->post('orderno');
    	$userid = $this->input->post('userid');
    	
    // 	 $lim = count($this->input->post('itemid'));
		  // for($i=0;$i<$lim;$i++)
		  // {
		  // 	$itemid = $this->input->post('itemid')[$i];
		  // 	$productid = $this->input->post('productid')[$i];
		  // 	$productprice = $this->input->post('productprice')[$i];
		  // 	$qty = $this->input->post('qty')[$i];
		  // 	$total = $this->input->post('total')[$i];
		  // 	$batch = $this->input->post('batch')[$i];
		  // 	$expdate = $this->input->post('expdate')[$i];


		  // 	//calculate commission //
				// $productres = $this->db->query("select * from product where id='$productid'")->result_array();
				// if(!empty($productres))
				// {
				// 	$pcompercent = $productres[0]['commission'];
				// 	$pinto = ($productprice*$pcompercent);
				// 	$pcomamt = ($pinto/100);
				// 	$ptotcomsion = ($pcomamt*$qty);
				// }


		  // 	$datachild = array(
		  // 		'productid' => $productid,
		  // 		'productprice' => $productprice,
		  // 		'qty' => $qty,
		  // 		'total' => $total,
		  // 		'batch' => $batch,
		  // 		'expdate' => $expdate,
		  // 		'pcompercent' => $pcompercent,
		  // 		'pcomamt' => $pcomamt,
		  // 		'ptotcomsion' => $ptotcomsion,
		  // 		'orderno' => $orderno,
		  // 		'status' => '1',
		  // 		'userid' => $userid,
		  // 		'cookievalis' => $cookievalis
		  // 	);
		  // 	if($itemid==0)
		  // 	{
		  // 		$this->db->insert('cart',$datachild);
		  // 	}else{
			 //  	$this->db->where('id',$itemid);
			 //  	$this->db->update('cart',$datachild);
		  // 	}


		  // }


		  // oreder table dta insert //

		  	$totqry = $this->db->query("select sum(total) as gtot from cart where orderno='$orderno' ")->result_array();
		  	if(!empty($totqry))
		  	{
		  		 $carttotal = $totqry[0]['gtot'];
		  	}

		  	$ordtbldata = array(
		  		'updatedate'=> $updatedate,
		  		'grandtot'=> $carttotal,
		  		'paidstatus' => $this->input->post('paidstatus'),
		  		'ordstatus' => $this->input->post('ordstatus'),
		  		'comment' => $this->input->post('comment'),
		  		'doctorname' => $this->input->post('doctorname'),
		  		'patientname' => $this->input->post('patientname'),
		  		'updatebyuserid' => $this->input->post('updatebyuserid'),
		  		'mobile' => $this->input->post('mobile'),
		  		'address' => $this->input->post('address'),
		  		'shipping_name' => $this->input->post('shipping_name'),
		  		'shipping_mobile' => $this->input->post('shipping_mobile'),
		  		'shipping_address' => $this->input->post('shipping_address'),
		  		'shipping_pincode' => $this->input->post('shipping_pincode')
		  	);
		  	$this->db->where('orderno',$orderno);
		  	$this->db->update('ordertbl',$ordtbldata);

		  	// order main tbl data insert end //


		  redirect('admin/orderlist');
    


    }








	public function itemfetch()
	{
		$res = $this->db->query("select * from product ")->result_array();
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


	public function itempriceget()
	{
		$productid = $this->input->post('productid');
		$res = $this->db->query("select * from product where id='$productid' ")->result_array();
		$data = array();
		if(!empty($res))
		{
			foreach($res as $row)
			{
				$data[] = $row['offerprice'];
			}
			echo json_encode($data);
		}

	}



	



	public function editorder()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/editordermain');
		$this->load->view('admin/includes/footer');
	}


	// order edit end //







	public function certificatelist()

	{



		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');



		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from achivements ")->result_array();

		$this->load->view('admin/master/pages/certificatelist',$data);

		$this->load->view('admin/includes/footer');



	}





	public function certificateadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/certificateadd');

		$this->load->view('admin/includes/footer');

	}





	public function certificatesave()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('admin');



		}



		if($this->input->post('save'))



		{



			$atitle = trim($this->input->post('atitle'));

			$oldid = trim($this->input->post('oldid'));

			$oldiconimgae = trim($this->input->post('oldiconimgae'));



			if(!empty($_FILES['iconimgae']['name']))



			{



				$randno = rand();

				$config['upload_path'] = 'uploads/';

				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';

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

				'atitle' => $atitle

			);



			if($oldid==0)



			{



				$this->db->insert('achivements',$data);



				$this->session->set_flashdata('msg', 'Content updated successfully');



				redirect('admin/certificateadd');



			}else{



				$this->db->where('id',$oldid);



				$this->db->update('achivements',$data);



				$this->session->set_flashdata('msg', 'Content deleted successfully');



				redirect('admin/certificatelist');



			}



		}else{



			$id = $this->uri->segment(4);



			$data['res'] = $this->db->query("select * from achivements where id='".$id."'")->result_array();



			$this->load->view('admin/includes/header');



			$this->load->view('admin/includes/aside');



			$this->load->view('admin/master/pages/certificateadd',$data);



			$this->load->view('admin/includes/footer');



		}



	}



	public function certificatedel()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('achivements');

		$this->session->set_flashdata('del', 'Comment deleted successfully');

		redirect('admin/certificatelist');

	}























	// =========================================  Achivements End ==================================== //





	// atribute option start //







	public function atributelist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');



		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from product_atribute ")->result_array();

		$this->load->view('admin/master/pages/atributelist',$data);

		$this->load->view('admin/includes/footer');

	}





	public function atributeadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/atributeadd');

		$this->load->view('admin/includes/footer');

	}



	public function attributesave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$atbuteoptionid = trim($this->input->post('atbuteoptionid'));

			$patributevalue = trim($this->input->post('patributevalue'));

			$oldid = trim($this->input->post('oldid'));

			$data = array(

				'atbuteoptionid' => $atbuteoptionid, 

				'patributevalue' => $patributevalue 



			);

			if($oldid==0)

			{

				$this->db->insert('product_atribute',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/atributeadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('product_atribute',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/atributelist');

			}

		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from product_atribute where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/atributeadd',$data);

			$this->load->view('admin/includes/footer');

		}



	}





	public function attributedel()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('product_atribute');

		$this->session->set_flashdata('del', 'Comment deleted successfully');

		redirect('admin/atributelist');

	}







	// atribute option end //











	



	public function brandlist()



	{



		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');



		}

		$this->load->view('admin/includes/header');



		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from brand ")->result_array();

		$this->load->view('admin/master/pages/brandlist',$data);

		$this->load->view('admin/includes/footer');



	}



	



	public function brandadd()

	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('admin');



		}



		$this->load->view('admin/includes/header');



		$this->load->view('admin/includes/aside');



		$this->load->view('admin/master/pages/brandadd');



		$this->load->view('admin/includes/footer');



	}







	public function branddel()



	{



		$id = $this->uri->segment(4);



		$this->db->where('id',$id);



		$this->db->delete(' brand');



		$this->session->set_flashdata('del', 'Comment deleted successfully');



		redirect('admin/brandlist');



	}









	public function brandsave()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('admin');



		}



		if($this->input->post('save'))



		{



			$bname = trim($this->input->post('bname'));



			$burl = trim($this->input->post('burl'));



			$oldid = trim($this->input->post('oldid'));



			$oldiconimgae = trim($this->input->post('oldiconimgae'));



			if(!empty($_FILES['iconimgae']['name']))



			{



				$randno = rand();



				$config['upload_path'] = 'uploads/';



				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';



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

				'bname' => $bname, 

				'burl' => $burl 



			);



			if($oldid==0)



			{



				$this->db->insert('brand',$data);



				$this->session->set_flashdata('msg', 'Content updated successfully');



				redirect('admin/brandadd');



			}else{



				$this->db->where('id',$oldid);



				$this->db->update('brand',$data);



				$this->session->set_flashdata('msg', 'Content deleted successfully');



				redirect('admin/brandlist');



			}







		}else{



			$id = $this->uri->segment(4);



			$data['res'] = $this->db->query("select * from brand where id='".$id."'")->result_array();



			$this->load->view('admin/includes/header');



			$this->load->view('admin/includes/aside');



			$this->load->view('admin/master/pages/brandadd',$data);



			$this->load->view('admin/includes/footer');







		}



	}





























}

?>