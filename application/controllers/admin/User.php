<?php



defined('BASEPATH') OR exit('No direct script access allowed');







class User extends CI_Controller {







	public function __construct()



	{



		parent::__construct();



		$this->load->model('Usermodel');



	}



	public function index()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('');



		}



	}







	public function add()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('');



		}



		$this->load->view('admin/includes/header');



		$this->load->view('admin/includes/aside');



		$this->load->view('admin/master/user/useradd');



		$this->load->view('admin/includes/footer');



	}







	public function employeelist()
	{	
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/user/employeelist');
		$this->load->view('admin/includes/footer');
	}


	public function list()
	{	
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/user/userlist');
		$this->load->view('admin/includes/footer');
	}

	public function customerlist()
	{	
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/user/customerlist');
		$this->load->view('admin/includes/footer');
	}







	public function save()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('');



		}



		if($this->input->post('save')) {



			$oldid = $this->input->post('oldid');



			$fullname = $this->input->post('fullname');

			$pincode = $this->input->post('pincode');

			$mobile = $this->input->post('mobile');

			$email = $this->input->post('email');

			$address = $this->input->post('address');



			$username = $this->input->post('username');



			$password = base64_encode($this->input->post('password'));



			$usertype = $this->input->post('usertype');



			$data=array(



				'fullname' => $fullname,

				'pincode' => $pincode,

				'mobile' => $mobile,


				'address' => $address,



				'username' => $username,



				'password' => $password,



				'usertype' => $usertype



			);







			if($oldid==0) {



				$this->db->insert('user',$data); 



				redirect('admin/userlist');



			} else {



				$this->db->where('id',$oldid);



				$this->db->update('user',$data);



				redirect('admin/userlist');



			}



		} else {



			$id = $this->uri->segment(4);



			$data['res'] = $this->db->query("select * from user where id='".$id."'")->result_array();

			$this->load->view('admin/includes/header');



			$this->load->view('admin/includes/aside');



			$this->load->view('admin/master/user/useradd',$data);



			$this->load->view('admin/includes/footer');



		}



	}



	public function userdelete()

	{

		if($this->session->userdata['logged_in']['id']!=true){

			redirect('');

		}

		$id = $this->uri->segment(4);

		$this->db->where('id',$id);

		$this->db->delete('user');

		redirect('admin/userlist');

	}





	// User permission //



	public function permissionlist()



	{	



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('');



		}



		$userid = $this->session->userdata['logged_in']['id'];



		$data['users'] = $this->Usermodel->get_user_permission_list($userid);



		$this->load->view('admin/includes/header');



		$this->load->view('admin/includes/aside');



		$this->load->view('admin/master/user/permissionlist',$data);



		$this->load->view('admin/includes/footer');



	}







	public function submitpermission()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('');



		}



		$id = $this->uri->segment(4);



		$data['res'] = $this->Usermodel->get_permission_details($id);



		$this->load->view('admin/includes/header');

		$this->load->view('admin/includes/aside');

		$this->load->view('admin/master/user/permissionadd',$data);



		$this->load->view('admin/includes/footer');



	}







	public function editpermission()



	{



		if($this->session->userdata['logged_in']['id']!=true){



			redirect('');



		}



		if($this->input->post('submit')) { 

			$oldid = $this->input->post('oldid');

			$homepage = $this->input->post('homepage');

			$adsbanner = $this->input->post('adsbanner');

			$categories = $this->input->post('categories');

			$post = $this->input->post('post');

			$comments = $this->input->post('comments');

			$contact = $this->input->post('contact');

			$joindoctor = $this->input->post('joindoctor');

			$subscriber = $this->input->post('subscriber');



			$data = array(

				'homepage' => $homepage,

				'adsbanner' => $adsbanner,

				'categories' => $categories,

				'post' => $post,

				'comments' => $comments,

				'contact' => $contact,

				'joindoctor' => $joindoctor,

				'subscriber' => $subscriber

			);

			$this->db->where('usertypeid',$oldid);

			$this->db->update('userpermission',$data);

			redirect('admin/permissionlist');



		}



	}





	// user status update //

	public function statinactive()

	{

		$userid=$this->uri->segment(4);

		$updatestatus="2";

		$data = array(

			'updatestatus' => $updatestatus

		);

		$this->db->where('id',$userid);

		$this->db->update('user',$data);

		redirect('admin/userlist');

	}



	public function statactive()

	{

		$userid=$this->uri->segment(4);

		$updatestatus="1";

		$data = array(

			'updatestatus' => $updatestatus

		);

		$this->db->where('id',$userid);

		$this->db->update('user',$data);

		redirect('admin/userlist');

	}



}



