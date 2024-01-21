<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Managepage extends CI_Controller {



	public function __construct()

	{

		parent::__construct();



	}


	public function itemdel()
    {
    	  $childrowid = $this->uri->segment('4');
    	  $maintblidis = $this->uri->segment('5');
    	  $this->db->where('id',$childrowid);
    	  $this->db->delete('productvarient');
    	  redirect('admin/Managepage/blogsave/'.$maintblidis);

    }


	public function add_row()
	{
		$slno = $this->input->post('a');
		$data['slno'] = $slno;
		$this->load->view('admin/master/pages/adstimeadd',$data);
		echo "<br>";
	}

	public function add_row_edit()
	{
		$slno = $this->input->post('a');
		$data['slno'] = $slno;
		$this->load->view('admin/master/pages/adstimeedit',$data);
		echo "<br>";
	}





		// review start //
	public function reviewlist()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/reviewlist');
		$this->load->view('admin/includes/footer');
	}

	public function reviewadd()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/pages/reviewadd');
		$this->load->view('admin/includes/footer');
	}


	public function reviewsave()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if($this->input->post('save'))
		{
			$cname = trim($this->input->post('cname'));
			$creview = trim($this->input->post('creview'));
			$oldid = trim($this->input->post('oldid'));
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


			$data = array(
				'cname' => $cname,
				'creview' => $creview,
				'featureimg' => $featureimg
			);
			if($oldid==0)
			{
				$this->db->insert('review',$data);
				$this->session->set_flashdata('msg', 'Content updated successfully');
				redirect('admin/reviewadd');
			}else{
				$this->db->where('id',$oldid);
				$this->db->update('review',$data);
				$this->session->set_flashdata('msg', 'Content deleted successfully');
				redirect('admin/reviewlist');
			}

		}else{
			$id = $this->uri->segment(4);
			$data['res'] = $this->db->query("select * from review where id='".$id."'")->result_array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/includes/aside');
			$this->load->view('admin/master/pages/reviewadd',$data);
			$this->load->view('admin/includes/footer');

		}
	}


	public function reviewdel()
	{
		$id = $this->uri->segment(4);
		$this->db->where('id',$id);
		$this->db->delete('review');
		$this->session->set_flashdata('del', 'Comment deleted successfully');
		redirect('admin/reviewlist');
	}



	// review end //






	public function thankmsg()
	{
		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/thankmsg');

		$this->load->view('admin/includes/footer');
	}


	public function assignorder()
	{
		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/assignorder');

		$this->load->view('admin/includes/footer');
	}



	public function assignsave()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}
		if($this->input->post('save'))
		{
			$franchiseid = trim($this->input->post('franchiseid'));
			$oldid = trim($this->input->post('oldid'));
			$data = array(
				'franchiseid' => $franchiseid
			);
			$this->db->where('id',$oldid);
			$this->db->update('ordertbl',$data);
			redirect('admin/orderlist');
		}
	}









	public function thankumsgupdate()
	{
		$omsg = $this->input->post('omsg');
		$smsg = $this->input->post('smsg');
		$data = array(
			'smsg' => $smsg,
			'omsg' => $omsg
		);
		$this->db->where('id','1');
		$this->db->update('thankumsg',$data);
		//echo $this->db->last_query(); 
		redirect('admin/thankmsg');
	}


	public function orderdetails()

	{

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/orderdetails');

		$this->load->view('admin/includes/footer');

	}



	public function pqrydel()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('bikeqry');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/productqrylist');

	}





	//comment section //

	public function comments()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from blogcomment 

			left join blog on blogcomment.blogid = blog.id

			")->result_array();

		$this->load->view('admin/master/pages/comments',$data);

		$this->load->view('admin/includes/footer');

	}



	public function commentdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('cmtid',$id);

		$this->db->delete('blogcomment');

		$this->session->set_flashdata('del', 'Comment deleted successfully');

		redirect('admin/comments');

	}



	// active



	public function commentactive()

	{

		$blogid = $this->uri->segment(4);

		$data = array(

			'blogstatus'=>'1'

		);

		$this->db->where('cmtid',$blogid);

		$this->db->update('blogcomment',$data);

		redirect('admin/comments');

	}

	// pending/ block

	public function commentdeactive()

	{

		$blogid = $this->uri->segment(4);

		$data = array(

			'blogstatus'=>'0'

		);

		$this->db->where('cmtid',$blogid);

		$this->db->update('blogcomment',$data);

		redirect('admin/comments');

	}











	//comment section end //





	// page content add start //





	public function pgcontentadd()

	{	

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$id=$this->uri->segment(4);

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['pgid'] = $id;

		$data['res'] = $this->db->query("select * from pgcontent where pgid='".$id."' ")->result_array();

		$this->load->view('admin/master/pages/pgcontentadd',$data);

		$this->load->view('admin/includes/footer');



	}





	public function pgcontentsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$pgid = trim($this->input->post('pgid'));

			$metaname = trim($this->input->post('metaname'));

			$metadesc = trim($this->input->post('metadesc'));

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

				'pgid' => $pgid, 

				'metaname' => $metaname, 

				'metadesc' => $metadesc, 

				'title' => $title, 

				'iconimgae' => $iconimgae, 

				'description' => $description 

			);

			if($oldid==0)

			{

				$this->db->insert('pgcontent',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/pagelist');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('pgcontent',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/pagelist');

			}



		}

	}





	// page content end //



	// create new page //



	public function productqrylist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from bikeqry order by id desc ")->result_array();

		$this->load->view('admin/master/pages/productqrylist',$data);

		$this->load->view('admin/includes/footer');

	}



	// user list //

	public function reguserlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from userregister order by id desc ")->result_array();

		$this->load->view('admin/master/pages/reguserlist',$data);

		$this->load->view('admin/includes/footer');

	}

	



	public function pagelist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from pages ")->result_array();

		$this->load->view('admin/master/pages/pagelist',$data);

		$this->load->view('admin/includes/footer');

	}



	

	

	public function createpage()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/createpage');

		$this->load->view('admin/includes/footer');

	}

	

	public function pagesave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$pgname = trim($this->input->post('pgname'));

			$homepgshowing = trim($this->input->post('homepgshowing'));

			// create slug url //

			$smalltxt = strtolower($pgname);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);



			$pgurl = trim($slug);

			$oldid = trim($this->input->post('oldid'));

			$data = array(

				'pgname' => $pgname, 

				'pgurl' => $pgurl, 

				'homepgshowing' => $homepgshowing

			);

			if($oldid==0)

			{

				$this->db->insert('pages',$data);

				$this->session->set_flashdata('msg','Content updated successfully');

				redirect('admin/createpage');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('pages',$data);

				$this->session->set_flashdata('msg','Content deleted successfully');

				redirect('admin/pagelist');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from pages where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/createpage',$data);

			$this->load->view('admin/includes/footer');



		}

	}



	



	public function pagedelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('pages');

		$this->session->set_flashdata('del', 'Page deleted successfully');

		redirect('admin/pagelist');

	}







	// create page end //



	//pgbanner //

	

	public function pgbannerlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from pgbanner ")->result_array();

		$this->load->view('admin/master/pages/pgbannerlist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function pgbanneradd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/pgbanneradd');

		$this->load->view('admin/includes/footer');

	}



	public function pgbannersave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$title = trim($this->input->post('title'));

			$description = trim($this->input->post('description'));
			//$position = trim($this->input->post('position'));

			$bannerurl = trim($this->input->post('bannerurl'));

			$pgid = trim($this->input->post('pgid'));

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

				'pgid' => $pgid, 

				'bannerurl' => $bannerurl, 

				'description' => $description, 
				//'position' => $position, 

				'title' => $title 

			);

			if($oldid==0)

			{

				$this->db->insert('pgbanner',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/pgbanneradd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('pgbanner',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/pgbanner');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from pgbanner where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/pgbanneradd',$data);

			$this->load->view('admin/includes/footer');



		}

	}

	

	public function pgbannersavedelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('pgbanner');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/pgbanner');

	}





	// sub categories //



	// pin code start //



	public function pincodelist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from pincode  ")->result_array();

		$this->load->view('admin/master/pages/pincodelist',$data);

		$this->load->view('admin/includes/footer');

	}





	public function pincodeadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/pincodeadd');

		$this->load->view('admin/includes/footer');

	}



	public function pincodesave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$pin = trim($this->input->post('pin'));

			$oldid = trim($this->input->post('oldid'));

			$data = array(

				'pin' => $pin,

			);

			if($oldid==0)

			{

				$this->db->insert('pincode',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/pincodeadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('pincode',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/pincodelist');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from pincode where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/pincodeadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}





	public function pincodedel()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('pincode');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/pincodelist');

	}



	// pin code end //


	//tax start //

	

	public function taxlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from taxtable order by id desc ")->result_array();

		$this->load->view('admin/master/pages/taxlist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function taxadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/taxadd');

		$this->load->view('admin/includes/footer');

	}







	public function taxsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$zipcode = trim($this->input->post('zipcode'));

			$taxcounty = trim($this->input->post('taxcounty'));

			$taxrate = trim($this->input->post('taxrate'));

			$oldid = trim($this->input->post('oldid'));


			$data = array(

				'zipcode' => $zipcode,

				'taxcounty' => $taxcounty, 

				'taxrate' => $taxrate 

			);

			if($oldid==0)

			{

				$this->db->insert('taxtable',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/taxadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('taxtable',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/taxlist');

			}


		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from taxtable where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/taxadd',$data);

			$this->load->view('admin/includes/footer');


		}

	}



	
	public function taxdel()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('taxtable');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/taxlist');

	}







	//tax end //





	public function parentcatlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from categories where parentid='0'  ")->result_array();

		//$data['pgconres'] = $this->db->query("select * from categories where parentid='0' ")->result_array();

		$this->load->view('admin/master/pages/parentcatlist',$data);

		$this->load->view('admin/includes/footer');

	}





	public function parentcatadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/parentcatadd');

		$this->load->view('admin/includes/footer');

	}





	public function parentcatsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$title = trim($this->input->post('title'));

			$description = trim($this->input->post('description'));

			$ispopular = trim($this->input->post('ispopular'));

			$srno = trim($this->input->post('srno'));

			$adscript = trim($this->input->post('adscript'));

		  // create slug url //

			$title1 = preg_replace( '/[^a-z0-9 ]/i', '', $title);

			$smalltxt = strtolower($title1);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);


			$slugurl = trim($slug);

		  // slug url end //  



			$oldid = trim($this->input->post('oldid'));

			

			$oldfeatureimg = trim($this->input->post('oldfeatureimg'));

			if(!empty($_FILES['featureimg']['name'] ))

			{


				$randno = rand();

				$config['upload_path'] = 'uploads/';

				$config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
				

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



			$data = array(

				'description' => $description,

				'slugurl' => $slugurl, 

				'title' => $title ,

				'ispopular' => $ispopular,

				'srno' => $srno,

				'adscript' => $adscript,

				'featureimg' => $featureimg, 

				'parentid' => "0"

			);

			if($oldid==0)

			{

				$this->db->insert('categories',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/parentcatadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('categories',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/parentcatlist');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from categories where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/parentcatadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}







	public function parentcatdel()

	{

		$id = $this->uri->segment(4);

		$checkres = $this->db->query("select * from categories where parentid!='$id' ")->result_array();
		if(!empty($checkres))
		{
			$this->session->set_flashdata('del', 'Category can not be deleted');
			
		}else{

		$this->db->where('id',$id);

		$this->db->delete('categories');

		$this->session->set_flashdata('del', 'category deleted successfully');

		}

		redirect('admin/parentcatlist');

	}





	// why  choose us //





	// coupon start //



	public function couponlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from coupon ")->result_array();

		$this->load->view('admin/master/pages/couponlist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function couponadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/couponadd');

		$this->load->view('admin/includes/footer');

	}



	public function couponsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$code = trim($this->input->post('code'));

			$discamt = trim($this->input->post('discamt'));

			$validto = trim($this->input->post('validto'));



			$oldid = trim($this->input->post('oldid'));

			$data = array(

				'code' => $code,

				'discamt' => $discamt,

				'validto' => $validto

			);

			if($oldid==0)

			{

				$this->db->insert('coupon',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/couponadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('coupon',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/couponlist');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from coupon where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/couponadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}

	// coupon end //



	// child cat list //



	public function childcatlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from childcat ")->result_array();

		$this->load->view('admin/master/pages/childcatlist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function childcatadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/childcatadd');

		$this->load->view('admin/includes/footer');

	}







	public function childcatsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$childcatname = trim($this->input->post('childcatname'));

			$subcatid = trim($this->input->post('subcatid'));

		  // create slug url //

			$title1 = preg_replace( '/[^a-z0-9 ]/i', '', $childcatname);

			$smalltxt = strtolower($title1);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);

			$slugurl = trim($slug);

		  // slug url end //  



			$oldid = trim($this->input->post('oldid'));

			$data = array(

				'childcatname' => $childcatname,

				'slugurl' => $slugurl, 

				'subcatid' => $subcatid 

			);

			if($oldid==0)

			{

				$this->db->insert('childcat',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/childcatadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('childcat',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/childcatlist');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from childcat where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/childcatadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}



	public function childcatdel()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('childcat');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/childcatlist');

	}

	// recent post start //

	public function recentpostlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from recentpost order by id desc ")->result_array();

		$this->load->view('admin/master/pages/recentpostlist',$data);

		$this->load->view('admin/includes/footer');

	}





	public function recentpostadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/recentpostadd');

		$this->load->view('admin/includes/footer');

	}



	public function recentpostsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))
		{
			date_default_timezone_set('America/New_York');
			$currentts =  date('Y-m-d H:i:s');
			$posttitle = trim($this->input->post('posttitle'));

			$oldid = trim($this->input->post('oldid'));

			$data = array(

				'posttitle' => $posttitle,

				'ts' => $currentts

			);

			if($oldid==0)

			{

				$this->db->insert('recentpost',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/recentpostadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('recentpost',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/recentpostlist');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from recentpost where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/recentpostadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}

	

	public function recentpostdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('recentpost');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/recentpostlist');

	}



//recent post end //

	// child cat end //

	

	public function categorieslist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from categories where parentid!='0' ")->result_array();

		$data['pgconres'] = $this->db->query("select * from homepgsection where id='7' ")->result_array();

		$this->load->view('admin/master/pages/categorieslist',$data);

		$this->load->view('admin/includes/footer');

	}





	public function categoriesadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/categoriesadd');

		$this->load->view('admin/includes/footer');

	}



	public function categoriessave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$title = trim($this->input->post('title'));

			$description = trim($this->input->post('description'));

			$ispopular = trim($this->input->post('ispopular'));

			$parentid = trim($this->input->post('parentid'));

			$adscript = trim($this->input->post('adscript'));



			$offer_daily_essentials = trim($this->input->post('offer_daily_essentials'));

			$special_ofr_zone = trim($this->input->post('special_ofr_zone'));

			$ofr_house_personalcare = trim($this->input->post('ofr_house_personalcare'));

			$offer_on_groceries = trim($this->input->post('offer_on_groceries'));
			$is_top = trim($this->input->post('is_top'));

		  // create slug url //

			$title1 = preg_replace( '/[^a-z0-9 ]/i', '', $title);

			$smalltxt = strtolower($title1);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);

			$slugurl = trim($slug);

		  // slug url end //  



			$oldid = trim($this->input->post('oldid'));

			$oldfeatureimg = trim($this->input->post('oldfeatureimg'));

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



					/*$this->resizeImageThubnail($uploadData['file_name']);

					$this->resizeImageBanner($uploadData['file_name']);*/

					$featureimg = $uploadData['file_name'];

				}

			}else{

				$featureimg = $oldfeatureimg;

			}

			$data = array(

				'description' => $description,

				'slugurl' => $slugurl, 

				'title' => $title ,

				'featureimg' => $featureimg,

				'ispopular' => $ispopular,

				'parentid' => $parentid,

				'offer_daily_essentials' => $offer_daily_essentials,

				'special_ofr_zone' => $special_ofr_zone,

				'ofr_house_personalcare' => $ofr_house_personalcare,

				'offer_on_groceries' => $offer_on_groceries,
				'is_top' => $is_top,

				'adscript' => $adscript

			);

			if($oldid==0)

			{

				$this->db->insert('categories',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/categoriesadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('categories',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/categories');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from categories where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/categoriesadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}

	

	public function categoriesdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('categories');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/categories');

	}



	// what we offer //

	

	public function bloglist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$userid = $this->session->userdata['logged_in']['id'];

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		//$data['res'] = $this->db->query("select * from product where userid='".$userid."' order by id desc ")->result_array();
		$data['res'] = $this->db->query("select * from product  order by id desc ")->result_array();

		$this->load->view('admin/master/pages/bloglist',$data);

		$this->load->view('admin/includes/footer');

	}





	public function blogadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/blogadd');

		$this->load->view('admin/includes/footer');

	}







	public function blogsave()

	{
		error_reporting(0);
		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$title = trim($this->input->post('title'));
			$gstpercent = trim($this->input->post('gstpercent'));
			$batchno = trim($this->input->post('batchno'));
			$expiredate = trim($this->input->post('expiredate'));

			$iconlogo = trim($this->input->post('iconlogo'));
			$shippingcost = trim($this->input->post('shippingcost'));
			$composition = trim($this->input->post('composition'));



			//$postslug = trim($this->input->post('slugurl'));

			$childcatid = trim($this->input->post('childcatid'));

			$brandid = trim($this->input->post('brandid'));

		  // create slug url //

			$titleis = preg_replace( '/[^a-z0-9 ]/i', '', $title);

			$smalltxt = strtolower($titleis);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);

		      //$slugurl = trim($postslug);

			$slugurl = $slug;

		  // slug url end //  



			$shortdesc = trim($this->input->post('shortdesc'));

			$tag = trim($this->input->post('tag'));

			// create slug url //

			$smalltxt = strtolower($tag);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);

			$tagurl = trim($slug);

		  // slug url end //  



			$metatitle = trim($this->input->post('metatitle'));

			$ageno = trim($this->input->post('ageno'));

			$colorid = trim($this->input->post('colorid'));

			$metadesc = trim($this->input->post('metadesc'));

			$description = trim($this->input->post('description'));

			$oldid = trim($this->input->post('oldid'));

			$oldiconlogo = trim($this->input->post('oldiconlogo'));

			$oldfeatureimg = trim($this->input->post('oldfeatureimg'));

			$isfeatured = trim($this->input->post('isfeatured'));
			$isbestsell = trim($this->input->post('isbestsell'));

			$iseditorpick = trim($this->input->post('iseditorpick'));

			$userid = trim($this->input->post('userid'));
			$commission = trim($this->input->post('commission'));





			//main cat id insert //

			if($this->input->post('maincatid'))

			{

				$maincatidcount = count($this->input->post('maincatid'));

				for($i=0;$i<$maincatidcount;$i++)

				{



					$maincatidarr[] = $this->input->post('maincatid')[$i];



				}

				$maincatiddata = implode(',',$maincatidarr); 

			}else{
				$maincatiddata = "";
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

			}else{
				$subcatiddata="";
			}

			// sub cat id data insert end //





			date_default_timezone_set('Asia/Kolkata');

			$postdate = trim($this->input->post('postdate'));

			$posttime = trim($this->input->post('posttime'));





			$normalprice = trim($this->input->post('normalprice'));

			$offerprice = trim($this->input->post('offerprice'));

			$sku = trim($this->input->post('sku'));

			$weight = trim($this->input->post('weight'));

			$stock = trim($this->input->post('stock'));
			$mandateprescription = trim($this->input->post('mandateprescription'));




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



					/*$this->resizeImageThubnail($uploadData['file_name']);

					$this->resizeImageBanner($uploadData['file_name']);*/

					$featureimg = $uploadData['file_name'];

				}

			}else{

				$featureimg = $oldfeatureimg;

			}


			//$gstinto = ($offerprice*$gstpercent);
			$gstvalue  = ($gstinto/100);






			$data = array(

				'metatitle' => $metatitle, 
				'gstvalue' => $gstvalue, 

				'metadesc' => $metadesc, 

				'iconlogo' => $iconlogo, 

				'ageno' => $ageno, 

				'colorid' => $colorid, 

				'featureimg' => $featureimg, 

				'title' => $title, 

				'shortdesc' => $shortdesc, 

				'description' => $description ,

				'slugurl' => $slugurl ,

				'tag' => $tag ,

				'tagurl' => $tagurl ,

				'childcatid' =>$childcatid,

				'brandid' =>$brandid,

				'postdate'=> $postdate,

				'isfeatured' => $isfeatured,
				
				'isbestsell' => $isbestsell,

				'iseditorpick' => $iseditorpick,
				'isactive' => 0,

				'maincatid' => $maincatiddata,

				'mandateprescription' => $mandateprescription,

				'subcatid' =>$subcatiddata,

				'normalprice' => $normalprice,

				'offerprice' => $offerprice,

				'sku' => $sku,
				'composition' => $composition,

				'weight' => $weight,

				'stock' => $stock,

				'userid' => $userid,
				'commission' => $commission,
				'gstpercent' => $gstpercent,

				'batchno' => $batchno,
				'expiredate' => $expiredate,
				'hsncode' => $this->input->post('hsncode'),
				'manufacture' => $this->input->post('manufacture'),
				'specialcatid' => $this->input->post('specialcatid')

			);


			

			if($oldid==0)

			{

				$this->db->insert('product',$data);

				//echo $this->db->last_query(); die;

				$insert_id = $this->db->insert_id();

				$lim = count($this->input->post('slno'));
				for($i=0;$i<$lim;$i++)
				{
					$itemid = $this->input->post('itemid')[$i];
					$color = $this->input->post('color')[$i];
					$size = $this->input->post('size')[$i];
					$stone = $this->input->post('stone')[$i];
					$datachild = array(
						'productid' => $insert_id,
						'color' => $color,
						'size' => $size,
						'stone' => $stone
					);

					if($itemid==0)
				  	{
				  		$this->db->insert('productvarient',$datachild);
				  	}else{
					  	$this->db->where('id',$itemid);
					  	$this->db->update('productvarient',$datachild);
				  	}

				}



				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/blogadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('product',$data);


				// chil;d data entry //
				$lim = count($this->input->post('slno'));
				for($i=0;$i<$lim;$i++)
				{
					$itemid = $this->input->post('itemid')[$i];
					$color = $this->input->post('color')[$i];
					$size = $this->input->post('size')[$i];
					$stone = $this->input->post('stone')[$i];
					$datachild = array(
						'productid' => $oldid,
						'color' => $color,
						'size' => $size,
						'stone' => $stone
					);

					if($itemid==0)
				  	{
				  		$this->db->insert('productvarient',$datachild);
				  	}else{
					  	$this->db->where('id',$itemid);
					  	$this->db->update('productvarient',$datachild);
				  	}

				}
				

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/blogs');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from product where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/blogadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}





	// resize function  for blogs image start //



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



	public function resizeImageBanner($filename)

	{

		$source_path2 =  'uploads/' . $filename;

		$target_path2 = 'uploads/blogdetails/';

		$config_manip2 = array(

			'image_library' => 'gd2',

			'source_image' => $source_path2,

			'new_image' => $target_path2,

			'maintain_ratio' => TRUE,

			'create_thumb' => TRUE,

			'width' => 1400,

			'height' => 480

		);



		$this->load->library('image_lib', $config_manip2);

		if (!$this->image_lib->resize()) {

			echo $this->image_lib->display_errors();

		}



		$this->image_lib->clear();

	}







   // resize function end //

	



	public function blogdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('product');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/blogs');

	}



	// blog draft //

	public function blogdraft()

	{

		$blogid = $this->uri->segment(4);

		$data = array(

			'isactive'=>'1'

		);

		$this->db->where('id',$blogid);

		$this->db->update('product',$data);

		redirect('admin/blogs');

	}



	// blog published //

	public function blogpublish()

	{

		$blogid = $this->uri->segment(4);

		$data = array(

			'isactive'=>'0'

		);

		$this->db->where('id',$blogid);

		$this->db->update('product',$data);

		redirect('admin/blogs');

	}




	// cat hide
	public function catdraft()
	{
		$catid = $this->uri->segment(4);
		$data = array(
			'is_show'=>'1'
		);
		$this->db->where('id',$catid);
		$this->db->update('categories',$data);
		redirect('admin/parentcatlist');
	}

	public function catpublish()
	{
		$catid = $this->uri->segment(4);
		$data = array(
			'is_show'=>'0'
		);
		$this->db->where('id',$catid);
		$this->db->update('categories',$data);
		redirect('admin/parentcatlist');
	}

	// sub cat hide show
	public function subcatdraft()
	{
		$catid = $this->uri->segment(4);
		$data = array(
			'is_show'=>'1'
		);
		$this->db->where('id',$catid);
		$this->db->update('categories',$data);
		redirect('admin/categories');
	}

	public function subcatpublish()
	{
		$catid = $this->uri->segment(4);
		$data = array(
			'is_show'=>'0'
		);
		$this->db->where('id',$catid);
		$this->db->update('categories',$data);
		redirect('admin/categories');
	}






	// why we best //

	

	public function whywebestlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['pgconres'] = $this->db->query("select * from homepgsection where id='3' ")->result_array();

		$data['res'] = $this->db->query("select * from whywebest ")->result_array();

		$this->load->view('admin/master/pages/whywebestlist',$data);

		$this->load->view('admin/includes/footer');

	}

	public function whywebestlistadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/whywebestlistadd');

		$this->load->view('admin/includes/footer');

	}



	public function whywebestlistsave()

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

			if($oldid==0)

			{

				$this->db->insert('whywebest',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/whywebestlistadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('whywebest',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/whywebest');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from whywebest where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/whywebestlistadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}



	public function whywebestlistdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('whywebest');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/whywebest');

	}





	// multi services //

	

	public function multiserviceslist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from multiservices ")->result_array();

		$this->load->view('admin/master/pages/multiserviceslist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function multiserviceadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/multiserviceadd');

		$this->load->view('admin/includes/footer');

	}



	public function multiservicesave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$servicename = trim($this->input->post('servicename'));

			$description = trim($this->input->post('description'));

			$oldid = trim($this->input->post('oldid'));

			$oldiconimgae = trim($this->input->post('oldiconimgae'));

			$oldfeatureimg = trim($this->input->post('oldfeatureimg'));



			$smalltxt = strtolower($servicename);

			$slug = preg_replace('#[ -]+#', '-', $smalltxt);



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

					$featureimg = $uploadData['file_name'];

				}

			}else{

				$featureimg = $oldfeatureimg;

			}

			$data = array(

				'iconimgae' => $iconimgae, 

				'featureimg' => $featureimg, 

				'servicename' => $servicename, 

				'url' => $slug, 

				'description' => $description

			);

			if($oldid==0)

			{

				$this->db->insert('multiservices',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/multiserviceadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('multiservices',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/multiservices');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from multiservices where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/multiserviceadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}

	public function multiservicedelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('multiservices');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/multiservices');

	}











	// partner start //

	public function partnerlist()

	{



		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['pgconres'] = $this->db->query("select * from homepgsection where id='5' ")->result_array();

		$data['res'] = $this->db->query("select * from partner ")->result_array();

		$this->load->view('admin/master/pages/partnerlist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function partneradd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/partneradd');

		$this->load->view('admin/includes/footer');

	}



	public function partnersave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$compnyname = trim($this->input->post('compnyname'));

			$oldid = trim($this->input->post('oldid'));

			$oldiconimgae = trim($this->input->post('oldiconimgae'));

			

			if(!empty($_FILES['iconimgae']['name']))

			{

				$randno = rand();

				$config['upload_path'] = 'uploads/';

				$config['allowed_types'] = 'jpg|jpeg|png|gif_webp';

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

				'compnyname' => $compnyname, 

			);

			if($oldid==0)

			{

				$this->db->insert('partner',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/partneradd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('partner',$data);

				$this->session->set_flashdata('msg', 'Content deleted successfully');

				redirect('admin/partner');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from partner where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/partneradd',$data);

			$this->load->view('admin/includes/footer');



		}

	}



	public function partnerdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('partner');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/partner');

	}

	// partner end //







	// booking process start 



	public function bookprocesslist()

	{



		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from bookingstep ")->result_array();

		$this->load->view('admin/master/pages/bookprocesslist',$data);

		$this->load->view('admin/includes/footer');

	}

	public function homecms()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$data['res'] = $this->db->query("select * from homecms where id='1'")->result_array();

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/homecms',$data);

		$this->load->view('admin/includes/footer');

	}





	public function googleads()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$data['res'] = $this->db->query("select * from googleads where id='1'")->result_array();

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/googleads',$data);

		$this->load->view('admin/includes/footer');

	}



	public function gadssave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$gcode = trim($this->input->post('gcode'));

			$oldid = trim($this->input->post('oldid'));

			

			$data = array(

				'gcode' => $gcode

			);

			

			$this->db->where('id','1');

			$this->db->update('googleads',$data);

			$this->session->set_flashdata('msg', 'Content updated successfully');

			redirect('admin/googleads');





		}else{

			$data['res'] = $this->db->query("select * from googleads where id='1'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/googleads',$data);

			$this->load->view('admin/includes/footer');



		}

	}















	public function homecmssave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$steptitle = trim($this->input->post('steptitle'));

			$stepdesc = trim($this->input->post('stepdesc'));





			$ganalytic = trim($this->input->post('ganalytic'));

			$metaname = trim($this->input->post('metaname'));

			$metatag = trim($this->input->post('metatag'));

			$metatitle = trim($this->input->post('metatitle'));

			$metadescription = trim($this->input->post('metadescription'));



			$content1 = trim($this->input->post('content1'));

			$content2 = trim($this->input->post('content2'));

			$content3 = trim($this->input->post('content3'));



			$button1 = trim($this->input->post('button1'));

			$link1 = trim($this->input->post('link1'));



			$button2 = trim($this->input->post('button2'));

			$link2 = trim($this->input->post('link2'));



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

				'ganalytic' => $ganalytic, 

				'steptitle' => $steptitle, 

				'stepdesc' => $stepdesc, 

				'metaname' => $metaname, 

				'metatag' => $metatag, 

				'metatitle' => $metatitle, 

				'metadescription' => $metadescription, 

				'content1' => $content1, 

				'content2' => $content2, 

				'content3' => $content3, 

				'button1' => $button1, 

				'link1' => $link1, 

				'button2' => $button2, 

				'link2' => $link2 



			);

			

			$this->db->where('id','1');

			$this->db->update('homecms',$data);

			$this->session->set_flashdata('msg', 'Content updated successfully');

			redirect('admin/homecms');





		}else{

			$data['res'] = $this->db->query("select * from homecms where id='1'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/homecms',$data);

			$this->load->view('admin/includes/footer');



		}

	}



	public function bookprocesssdelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('bookingstep');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/bookprocess');

	}





	// booking processend //











		// our mission start //





	public function ourmissionlist()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from ourmission ")->result_array();

		$this->load->view('admin/master/pages/ourmissionlist',$data);

		$this->load->view('admin/includes/footer');

	}



	public function ourmissionadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/pages/ourmissionadd');

		$this->load->view('admin/includes/footer');



	}



	public function ourmissionsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$missiontitle = trim($this->input->post('missiontitle'));

			$missiondesc = trim($this->input->post('missiondesc'));

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

				'missiontitle' => $missiontitle, 

				'missiondesc' => $missiondesc, 

			);

			if($oldid==0)

			{

				$this->db->insert('ourmission',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/ourmissionadd');

			}else{

				$this->db->where('id',$oldid);

				$this->db->update('ourmission',$data);

				$this->session->set_flashdata('msg', 'Content updated successfully');

				redirect('admin/ourmission');

			}



		}else{

			$id = $this->uri->segment(4);

			$data['res'] = $this->db->query("select * from ourmission where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');

			$this->load->view('admin/includes/aside');

			$this->load->view('admin/master/pages/ourmissionadd',$data);

			$this->load->view('admin/includes/footer');



		}

	}



	public function ourmissiondelete()

	{

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('ourmission');

		$this->session->set_flashdata('del', 'Content deleted successfully');

		redirect('admin/ourmission');

	}



		// our mission end //









	//service cms//

	public function serviceadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from  servicemain where id='1'")->result_array();

		$this->load->view('admin/master/pages/serviceadd',$data);

		$this->load->view('admin/includes/footer');

	}

	public function servicesave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$metaname = trim($this->input->post('metaname'));

			$metadesc = trim($this->input->post('metadesc'));

			$iconimgae = trim($this->input->post('iconimgae'));

			$contenthead1 = trim($this->input->post('contenthead1'));

			$contentdesc1 = trim($this->input->post('contentdesc1'));

			$contenthead2 = trim($this->input->post('contenthead2'));

			$contentdesc2 = trim($this->input->post('contentdesc2'));

			$contenthead3 = trim($this->input->post('contenthead3'));

			$contentdesc3 = trim($this->input->post('contentdesc3'));

			$oldid = trim($this->input->post('oldid'));



			$data = array(

				'metaname' => $metaname, 

				'metadesc' => $metadesc, 

				'iconimgae' => $iconimgae, 

				'contenthead1' => $contenthead1, 

				'contentdesc1' => $contentdesc1, 

				'contenthead2' => $contenthead2, 

				'contentdesc2' => $contentdesc2, 

				'contenthead3' => $contenthead3, 

				'contentdesc3' => $contentdesc3 

			);

			

			$this->db->where('id',$oldid);

			$this->db->update('servicemain',$data);

			$this->session->set_flashdata('msg', 'Content updated successfully');

			redirect('admin/service');



		}



	}





	// how to book start //



	public function howtobookadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from howtobook where id='1'")->result_array();

		$this->load->view('admin/master/pages/howtobook',$data);

		$this->load->view('admin/includes/footer');

	}



	public function howtobooksave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}



		if($this->input->post('save'))

		{

			$metaname = trim($this->input->post('metaname'));

			$metadesc = trim($this->input->post('metadesc'));

			$heading = trim($this->input->post('heading'));

			$description = trim($this->input->post('description'));

			$data = array(

				'metaname' => $metaname, 

				'metadesc' => $metadesc, 

				'heading' => $heading,

				'description' => $description

			);

			$this->db->where('id','1');

			$this->db->update('howtobook',$data);

			$this->session->set_flashdata('msg', 'Content updated successfully');

			redirect('admin/howtobook');

		}

	}

	// how to book end //





	// support start //



	public function supportadd()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from support where id='1'")->result_array();

		$this->load->view('admin/master/pages/supportadd',$data);

		$this->load->view('admin/includes/footer');

	}



	public function supportsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}



		if($this->input->post('save'))

		{

			$metaname = trim($this->input->post('metaname'));

			$metadesc = trim($this->input->post('metadesc'));

			$contentheadfirst = trim($this->input->post('contentheadfirst'));

			$contentfirst = trim($this->input->post('contentfirst'));

			$contentheadsecond = trim($this->input->post('contentheadsecond'));

			$contentsecond = trim($this->input->post('contentsecond'));

			$data = array(

				'metaname' => $metaname, 

				'metaname' => $metaname, 

				'contentheadfirst' => $contentheadfirst, 

				'contentfirst' => $contentfirst,

				'contentheadsecond' => $contentheadsecond,

				'contentsecond' => $contentsecond



			);

			$this->db->where('id','1');

			$this->db->update('support',$data);

			$this->session->set_flashdata('msg', 'Content updated successfully');

			redirect('admin/support');

		}

	}



	// support end //


	// email template //
	public function marketingemail()
	{	

		if($this->session->userdata['logged_in']['id']!=true){
			redirect('admin');
		}

		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$data['res'] = $this->db->query("select * from contactpg where id='1';")->result_array();
		$this->load->view('admin/master/pages/marketingemail',$data);
		$this->load->view('admin/includes/footer');

	}


	public function marketingmailsave()
	{
		if($this->input->post('mailsubject'))
		{
			$mailsubject = $this->input->post('mailsubject');
			$mailbody = $this->input->post('mailbody');

			$allusers = $this->db->query("select * from user where id!='1'")->result_array();
			foreach($allusers as $alluserrow)
			{
				$username = $alluserrow['username'].",";

				$frmemail = "cheapgunclub@gmail.com";
				$to = $username;
				$txt = $mailbody;
				$subject = $mailsubject;
				$headers = "From: ".$frmemail . "\r\n" ;
				mail($to,$subject,$txt,$headers);
			}

			
			$this->session->set_flashdata('msg', 'Content updated successfully');
			redirect('admin/marketingemail');


		}
	}


	//contact start //



	public function contactadd()

	{	

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$data['res'] = $this->db->query("select * from contactpg where id='1';")->result_array();

		$this->load->view('admin/master/pages/contactadd',$data);

		$this->load->view('admin/includes/footer');

	}



	public function contactsave()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('admin');

		}

		if($this->input->post('save'))

		{

			$metaname = trim($this->input->post('metaname'));

			$metadesc = trim($this->input->post('metadesc'));

			$pgtitle = trim($this->input->post('pgtitle'));

			$mapiframe = trim($this->input->post('mapiframe'));

			$address = trim($this->input->post('address'));

			$contactinfo = trim($this->input->post('contactinfo'));

			$contentarea2 = trim($this->input->post('contentarea2'));

			$email = trim($this->input->post('email'));

			$fburl = trim($this->input->post('fburl'));

			$twitterurl = trim($this->input->post('twitterurl'));

			$instaurl = trim($this->input->post('instaurl'));



			$data = array(

				'metaname' => $metaname, 

				'metadesc' => $metadesc, 

				'pgtitle' => $pgtitle, 

				'mapiframe' => $mapiframe, 

				'address' => $address, 

				'contactinfo' => $contactinfo, 

				'contentarea2' => $contentarea2,

				'email' => $email,

				'fburl' => $fburl,

				'twitterurl' => $twitterurl,

				'instaurl' => $instaurl



			);

			$this->db->where('id','1');

			$this->db->update('contactpg',$data);

			$this->session->set_flashdata('msg', 'Content updated successfully');

			redirect('admin/contact');



		}

	}



	//contact end //



}