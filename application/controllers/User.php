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

		function produk(){
			$this->load->view('Templateuser/header');
			// $this->load->view('user/produk');
			// $this->load->view('Templateuser/footer');
		}
	}

 ?>