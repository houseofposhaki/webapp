<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

	}





	public function productlist($slug,$id)

	{

		$this->load->view('front/includes/header');

		$this->load->view('front/productlist');

		$this->load->view('front/includes/footer');

	}





}