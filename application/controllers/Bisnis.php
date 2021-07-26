<?php 

	/**
	 * 
	 */
	class Bisnis extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->library('form_validation');
		}

		function index(){
			$this->load->view('template/header');
			$this->load->view('home/index');
			$this->load->view('template/footer');
		}

		function register(){
			 $this->form_validation->set_rules('nama', 'nama', 'required|trim');
			 $this->form_validation->set_rules('username', 'username', 'required|trim|max_length[5]');
			 $this->form_validation->set_rules('no_telp', 'no telp', 'required|trim');
			$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tbl_register.email]', [
            'is_unique' => 'This email has already registered!']);

			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
       		 ]);
        	$this->form_validation->set_rules('password2', 'konfirmasi password', 'required|trim|matches[password]');

        		if ($this->form_validation->run() == false) {

        			$this->load->view('template/header');
					$this->load->view('home/register');
					$this->load->view('template/footer');
        		}
        		else {

        			$kode = rand(1, 100000);
					$kode_user = "Ebunga-".$kode;
					
					$kd_founder = $this->db->get_where('tbl_register', array('kode_jaringan' => 'Ebunga-00001'))->row_array();
					$kode_founder = $kd_founder['kode_user'];

        			$data = [
        				'kode_user' => $kode_user,
        				'name' => $this->input->post('nama'),
        				'username' => $this->input->post('username'),
        				'email' => $this->input->post('email'),
        				'no_telp' => $this->input->post('no_telp'),
        				'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
        				'status' => 0,
        				'kode_jaringan' => $kode_founder,
        			];

        			$email = $this->input->post('email');
        			$nama = $this->input->post('nama');
        			$this->sendEmail($email, $nama, $kode_user);

        			$input = $this->db->insert('tbl_register', $data);
        			 $this->session->set_flashdata('message', 'swal("Sukses!!", "Anda Berhasil Mendaftar", "success");');
           				redirect('/ebunga/register'); 
        		}


			
		}

      function sendEmail($email, $nama, $kode_user){

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aldiiit593@gmail.com',
            'smtp_pass' => 'aldimantap123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('aldiiit593@gmail.com', 'ebunga bisnis');
			$this->email->to("$email");

			$this->email->subject('www.ebunga.com');

			
			
			$get1 = file_get_contents(base_url("email/email.php?nama=$nama&&kode=$kode_user"));
	      			

			$this->email->message("$get1");

			if (!$this->email->send())
			show_error($this->email->print_debugger());
			else
			echo 'Your e-mail has been sent!';
	}  	

	function verifikasi($kode){
		
		$data = [
			'status' => 1,
		];

		$this->db->where('kode_user', $kode);
		$this->db->update('tbl_register', $data);

		$cek = $this->db->get_where('tbl_register',  array('kode_user' => $kode))->row_array();
		$nama = $cek['name'];
		$usernama = $cek['username'];

		if ($cek['status'] == 1) {
			
				$data = [
                        'email' => $cek['email'],
                        'nama' => $nama,
                        'username' => $username, 
                        'kode_user' => $cek['kode_user'],
                    ];

                    $this->session->set_userdata($data);
                    redirect('ebunga/dashboard');
		}else {
			$this->session->set_flashdata('message', 'swal("Gagal!!", "anda gagal masuk", "warning");');
          redirect('/ebunga/register'); 

		}
		
	

	}

	function login(){

		$this->form_validation->set_rules('email','email','required|trim');
		$this->form_validation->set_rules('password','password','required|trim');

		if ($this->form_validation->run()== False) {
			$this->load->view('template/header');
			$this->load->view('home/login');
			$this->load->view('template/footer');
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
                   		redirect('ebunga/dashboard');
				} else{

					$this->session->set_flashdata('message', 'swal("Password salah", "Mohon cek password anda", "warning");');
                    redirect('ebunga/login');
				}

				}else{

					$this->session->set_flashdata('message', 'swal("Anda belum verifkasi email ", "Mohon untuk verifkasi email", "error");');
                    redirect('ebunga/login');

				}

			}else{
				$this->session->set_flashdata('message', 'swal("Akun anda tidak terdaftar", "Mohon untuk mendaftar", "error");');
                    redirect('ebunga/login');
			}

		}

		
	}


	// function dashboard(){

	// 	$this->load->view('template/header');
	// 	$this->load->view('dashboard/index');
	// 	$this->load->view('template/footer');
	// }

	// function tambah_member(){


	// 	$this->form_validation->set_rules('nama', 'nama', 'required|trim');
	// 		 $this->form_validation->set_rules('username', 'username', 'required|trim|max_length[5]');
	// 		 $this->form_validation->set_rules('no_telp', 'no telp', 'required|trim');
	// 		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tbl_register.email]', [
 //            'is_unique' => 'This email has already registered!']);

	// 		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
 //            'matches' => 'Password dont match!',
 //            'min_length' => 'Password too short!'
 //       		 ]);
 //        	$this->form_validation->set_rules('password2', 'konfirmasi password', 'required|trim|matches[password]');

 //        		if ($this->form_validation->run() == false) {

	// 			$this->load->view('template/header');
	// 			$this->load->view('dashboard/tambah_member');
	// 			$this->load->view('template/footer');

	// 		}else {

	// 			$kode = rand(1, 100000);
	// 				$kode_user = "Ebunga-".$kode;

 //        			$data = [
 //        				'kode_user' => $kode_user,
 //        				'name' => $this->input->post('nama'),
 //        				'username' => $this->input->post('username'),
 //        				'email' => $this->input->post('email'),
 //        				'no_telp' => $this->input->post('no_telp'),
 //        				'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
 //        				'status' => 0,
 //        			];

 //        			$email = $this->input->post('email');
 //        			$nama = $this->input->post('nama');
 //        			// $this->sendEmail($email, $nama, $kode_user);

 //        			$input = $this->db->insert('tbl_register', $data);
 //        			 $this->session->set_flashdata('message', 'swal("Sukses!!", "Anda Berhasil Mendaftar", "success");');
 //           				redirect('/ebunga/member'); 

	// 		}



	// }


	//  public function logout(){
 //        $this->session->unset_userdata('kode_user');
 //        $this->session->unset_userdata('email');
 //        $this->session->unset_userdata('name');
 //        $this->session->unset_userdata('username');

 //        redirect('ebunga/login ');
 //    } 


        		
	}

 ?>