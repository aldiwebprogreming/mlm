<?php 

	/**
	 * 
	 */
	class User extends CI_Controller
	{
		
		function __construct()
		{
			
			parent:: __construct();
		}

		function index(){
			$this->load->view('Templateuser/header');
			$this->load->view('user/index');
			$this->load->view('Templateuser/footer');
		}

		function add_member(){

		}
	}

 ?>