<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Galleryadd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
    $this->load->model('Gallerymodel');
  }

  public function galleryadd()
  {
    $pageid = $this->uri->segment('4');
    $this->load->view('admin/includes/header');
    $this->load->view('admin/includes/aside');
    $this->load->view('admin/master/pages/galleryadd');
    $this->load->view('admin/includes/footer');
  }


  

  public function galleryedit()
  {
    $edit_id = $this->uri->segment('4');
    $this->load->view('admin/includes/header');
    $this->load->view('admin/includes/aside');
    $data['edit_data_image']= $this->Gallerymodel->edit_data_image($edit_id);
    $this->load->view('admin/master/pages/galleryedit',$data);
    $this->load->view('admin/includes/footer');
  }




  public function file_upload()
  {
    if($this->input->post('submit'))
    {         
      $schoolid = trim($this->input->post('schoolid'));
      $files = $_FILES;
      $count = count($_FILES['userfile']['name']);
      for($i=0; $i<$count; $i++)
      {
        $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
        $config['max_size'] = '2000000';
        $config['remove_spaces'] = true;
        $config['overwrite'] = false;
        $config['max_width'] = '';
        $config['max_height'] = '';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
        $fileName = $_FILES['userfile']['name'];
        $images[] = $fileName;
      }
      $fileName = implode(',',$images);
      $this->Gallerymodel->upload_image($this->input->post(),$fileName,$schoolid);
      $this->session->set_flashdata('msg', 'Content updated successfully');
      redirect('admin/blogs');
    }
  }



  
       public function edit_file_upload()
       {
              $files = $_FILES;
              if(!empty($files['userfile']['name'][0])){
              $count = count($_FILES['userfile']['name']);
              $user_id = $this->input->post('user_id');
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
                }
                  $fileName = implode(',',$images);
                  $this->Gallerymodel->edit_upload_image($user_id,$this->input->post(),$fileName);
                }else
                {
              $user_id = $this->input->post('user_id');
              $this->Gallerymodel->edit_upload_image($user_id,$this->input->post());
                }
               $this->session->set_flashdata('msg', 'Content updated successfully');
               redirect('admin/blogs');
        }




        public function deleteimage()
        {
           $deleteid = $this->uri->segment('4');
           $schoolid = $this->uri->segment('5');
           $this->db->delete('photos', array('id' => $deleteid)); 
           redirect('admin/Galleryadd/galleryedit/'.$schoolid);
        }







}