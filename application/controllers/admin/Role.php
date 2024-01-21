<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rolemodel');
	}
	public function index()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
	}

	// User permission start //
	public function list()
	{	
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$userid = $this->session->userdata['logged_in']['id'];
		$data['roles'] = $this->Rolemodel->get_role_list();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/role/rolelist',$data);
		$this->load->view('admin/includes/footer');
	}

	public function save()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		if($this->input->post('submit')) {
			$oldid = $this->input->post('oldid');
			$rolename = $this->input->post('rolename');
			$data = array(
				'rolename' => $rolename
			);
			if($oldid=="0") {
				$this->db->insert('userrole',$data);
				$insert_id = $this->db->insert_id();
				$data2 = array(
					'usertypeid' => $insert_id
				);
				$this->db->insert('userpermission',$data2);
				redirect('admin/role');
			} else {
				$this->db->where('id',$oldid);
				$this->db->update('userrole',$data);
				redirect('admin/role');
			}
		} else {
			$id = $this->uri->segment(4);
			$data['res'] = $this->Rolemodel->get_role_details($id);
		}
		$this->load->view('admin/includes/header');
		$this->load->view('admin/includes/aside');
		$this->load->view('admin/master/role/roleadd',$data);
		$this->load->view('admin/includes/footer');
	}

	/*public function delete()
	{
		if($this->session->userdata['logged_in']['id']!=true){
			redirect('');
		}
		$id = $this->uri->segment(4);
		$this->db->where('id',$id);
		$this->db->delete('userrole');
		redirect('admin/role');
	}*/
}