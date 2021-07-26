<?php 

	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
		}

		function index(){
			$this->load->view('admin/login');

 		if ($this->input->post('login')) {
 			
 			$username = $this->input->post('username');
 			$cek = $this->db->get_where('tbl_admin',['usernam' => $username])->row_array();
 			if ($cek == true) {
 				
 				if (password_verify($this->input->post('password'), $cek['pass'])) {
 					$data = [
 						'username_admin' => $username,
 						'rule' => $cek['rule'],
 					];

 					$this->session->set_userdata($data);
 					
					redirect("dashboard/home");


 				}else{
 					$this->session->set_flashdata('message', 'swal("Gagal!!", "Password salah", "warning");');
					redirect("dashboard/login");
 				}
 			}
 			else{
 					$this->session->set_flashdata('message', 'swal("Gagal!!", "Username salah", "warning");');
					redirect("dashboard/login");
 				}
 		}
 		
		}

		function logout(){


		$this->session->unset_userdata('username');
			
			redirect('dashboard/login');
		}
	}
 ?>