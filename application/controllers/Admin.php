<?php 	
	
 /**
  * 
  */
 class Admin extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent:: __construct();
 		$this->load->library('form_validation');
 	}


 	function index(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/index');
 		$this->load->view('templateAdmin/footer');
 	}

 	function data_produk(){

 		$data['produk'] = $this->db->get('tbl_produk')->result_array();

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/data_produk', $data);
 		$this->load->view('templateAdmin/footer');

 	}
 	function tambah_produk(){


 		 $this->form_validation->set_rules('judul_produk', 'judul produk', 'required|trim');
 		 $this->form_validation->set_rules('ket_produk', 'keterangan produk', 'required|trim');
 		 $this->form_validation->set_rules('harga_produk', 'harga produk', 'required|trim');
 		   $this->form_validation->set_rules('jml_voucher', 'jumlah voucher', 'required|trim');
 		   $this->form_validation->set_rules('nilai_voucher', 'nilai voucher', 'required|trim');
 		  

  if ($this->form_validation->run() == false) {
 	
 		// kode produk
 		 $kode = rand(1, 100000);
       	 $data['kd_produk'] = "PR-".$kode;
         // kode voucher
         $kode2 = rand(1, 100000);
         $data['kd_voucher'] = "PTB".$kode2;

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/tambah_produk', $data);
 		$this->load->view('templateAdmin/footer');

 	} else {

 		$data = [
 			'kode_produk' => $this->input->post('kd_produk'),
 			'judul_produk' => $this->input->post('judul_produk'),
 			'keterangan_produk' => $this->input->post('ket_produk'),
 			'harga' => $this->input->post('harga_produk'),
 			'nilai_voucher' => $this->input->post('nilai_voucher'),
 			'jumlah_voucher' => $this->input->post('jml_voucher'),
 			'kode_voucher' => $this->input->post('kd_voucher'),
 		];

 		$input = $this->db->insert('tbl_produk', $data);

 		if ($input == true) {
 			echo "berhasil";
 		}else{
 			echo "gagal";
 		}
 	}

 	}


 	function data_member(){



 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/data_member');
 		$this->load->view('templateAdmin/footer');

 	}

 	function tambah_member(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/tambah_member');
 		$this->load->view('templateAdmin/footer');

 	}

 	function seting_member(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/seting_member');
 		$this->load->view('templateAdmin/footer');

 	}

 	function total_ecash(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/total_ecash');
 		$this->load->view('templateAdmin/footer');
 	}

 	function seting_ecash(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/seting_ecash');
 		$this->load->view('templateAdmin/footer');
 	}


 	function data_admin(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/data_admin');
 		$this->load->view('templateAdmin/footer');
 	}

 	function tambah_admin(){

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/tambah_admin');
 		$this->load->view('templateAdmin/footer');
 	}





 }


 ?>