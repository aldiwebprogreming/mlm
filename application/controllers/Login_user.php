<?php 

	/**
	 * 
	 */
	class Login_user extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->library('form_validation');
		}

		function index(){
			$this->load->view('user/login');

 		if ($this->input->post('login')) {
 			
 		$this->form_validation->set_rules('email','email','required|trim');
		$this->form_validation->set_rules('password','password','required|trim');

		if ($this->form_validation->run()== False) {
			
			$this->load->view('user/login');
			
		}else {

			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			$cek = $this->db->get_where('tbl_register', array('email' => $email))->row_array();
			if ($cek['email'] == $email) {

				if ($cek['status'] == 1) {
				

				if (password_verify($pass, $cek['password'])) {


					
					 $data = [
                        'email' => $cek['email'],
                        'name' => $cek['name'],
                        'username' => $cek['username'],
                        'kode_user' => $cek['kode_user'],
                       
                    ];
                    $this->session->set_userdata($data);
                   		redirect('ptberkah/home');
				} else{

					$this->session->set_flashdata('message', 'swal("Password salah", "Mohon cek password anda", "warning");');
                    redirect('ptberkah/login');
				}

				}else{

					$this->session->set_flashdata('message', 'swal("Anda belum verifkasi email ", "Mohon untuk verifkasi email", "error");');
                    redirect('ptberkah/login');

				}

			}else{
				$this->session->set_flashdata('message', 'swal("Akun anda tidak terdaftar", "Mohon untuk mendaftar", "error");');
                    redirect('ptberkah/login');
			}

		}

 		
		}

	}

		function logout(){


		$this->session->unset_userdata('name');
			
			redirect('ptberkah/login');
		}
	}
 ?>