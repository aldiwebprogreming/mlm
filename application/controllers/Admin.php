<?php 	
	
 /**
  * 
  */
 class Admin extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent:: __construct();
 		if ($this->session->userdata('username_admin') == NULL) {
				redirect('dashboard/login');
			}
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

 	

 	function detail_produk($kode_produk){
 		$data['produk'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();
 		
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/detail_produk', $data);
 		$this->load->view('templateAdmin/footer');

 	}

 	function edit_produk($produk){
		$data['produk'] = $this->db->get_where('tbl_produk',['kode_produk' => $produk])->row_array();

		$this->form_validation->set_rules('judul_produk', 'judul produk', 'required|trim');
 		 $this->form_validation->set_rules('ket_produk', 'keterangan produk', 'required|trim');
 		 $this->form_validation->set_rules('harga_produk', 'harga produk', 'required|trim');
 		   $this->form_validation->set_rules('jml_voucher', 'jumlah voucher', 'required|trim');
 		   $this->form_validation->set_rules('nilai_voucher', 'nilai voucher', 'required|trim');
 		   if ($this->form_validation->run() == false) {
 		
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/edit_produk', $data);
 		$this->load->view('templateAdmin/footer'); 	

 		} else{

 				$data = [
 			
 			'judul_produk' => $this->input->post('judul_produk'),
 			'keterangan_produk' => $this->input->post('ket_produk'),
 			'harga' => $this->input->post('harga_produk'),
 			'nilai_voucher' => $this->input->post('nilai_voucher'),
 			'jumlah_voucher' => $this->input->post('jml_voucher'),
 			
 		];

 		$kode_produk = $this->input->post('kd_produk');

 		$this->db->where('kode_produk', $kode_produk);
		$this->db->update('tbl_produk', $data);
		
		$this->session->set_flashdata('message', 'swal("Sukses!!", "Data berhasil diubah", "success");');
		redirect("dashboard/produk");

 		}	
 	}

 	function hapus_produk($produk){
 		$this->db->delete('tbl_produk', array('kode_produk' => $produk));
 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Produk berhasil dihapus", "success");');
           redirect('dashboard/produk'); 
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
 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Produk berhasil ditambahkan", "success");');
           redirect('dashboard/produk'); 
 		}else{
 			$this->session->set_flashdata('message', 'swal("Gagal!!", "Produk gagal ditambahkan ", "error");');
           redirect('dashboard/tambah-produk'); 
 		}
 	}

 	}


 	function data_member(){

 		$data['member'] = $this->db->get('tbl_register')->result_array();

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/data_member', $data);
 		$this->load->view('templateAdmin/footer');

 	}

 	function detail_member($member){
 		$data['member'] = $this->db->get_where('tbl_register',['kode_user' => $member])->row_array();
 		
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/detail_member', $data);
 		$this->load->view('templateAdmin/footer');
 	}

 	function hapus_member($member){
 		$this->db->delete('tbl_register', array('kode_user' => $member));
 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Member berhasil dihapus", "success");');
           redirect('dashboard/member'); 
 	}

 	function tambah_member(){
	
	$this->form_validation->set_rules('name', 'name', 'required|trim');
	$this->form_validation->set_rules('username', 'username', 'required|trim');
	$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[tbl_register.email]', [
            'is_unique' => 'This email has already registered!']);
	$this->form_validation->set_rules('no_telp', 'nomor telp', 'required|trim');

	$this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[5]|matches[pass2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
              ]);
	 $this->form_validation->set_rules('pass2', 'konfirmasi password', 'required|trim|matches[pass1]');

	if ($this->form_validation->run() == false) {
		$kode = rand(1, 100000);
        $data['kode_user'] = "Ebunga-".$kode;

        $data['vendor'] = $this->db->get('tbl_register',1)->row_array();

		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/tambah_member', $data);
 		$this->load->view('templateAdmin/footer');
	}else {

		$data = [

			'kode_user' => $this->input->post('kd_member'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
			'status' => 1,
			'kode_jaringan' => $this->input->post('kd_vendor'),
			'kode_rule' => $this->input->post('kd_vendor'),


		];


		$input = $this->db->insert('tbl_register', $data);
		if ($input) {
			$this->session->set_flashdata('message', 'swal("Sukses!!", "Member berhasil ditambahkan", "success");');
           redirect('dashboard/member'); 
		} else {
			$this->session->set_flashdata('message', 'swal("Gagal!!", "Member gagal ditambahkan", "success");');
           redirect('dashboard/tambah-member'); 
		}
	}

 		

 	}

 	function seting_member(){

 		$data['member'] = $this->db->get('tbl_register')->result_array();

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/seting_member', $data);
 		$this->load->view('templateAdmin/footer');

 	}

 	function detail_setmember($member){
 		$data['member'] = $this->db->get_where('tbl_register',['kode_user' => $member])->row_array();
 		
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/detailset_member', $data);
 		$this->load->view('templateAdmin/footer');

 		$kirim = $this->input->post('kirim');
 		if (isset($kirim)) {
 			$data = [

 				'lider' => $this->input->post('lider'),

 			];

 			$lider = $this->input->post('lider');
 			$cek = $this->db->get_where('tbl_register', ['lider' => $lider])->row_array();
 			if ($cek == true) {
 				$this->session->set_flashdata('message', 'swal("Gagal!!", "Lider sudah terdaftar", "warning");');
           redirect('dashboard/seting-member'); 
 			}else {

 				$this->db->where('kode_user', $member);
				$this->db->update('tbl_register', $data);
				$this->session->set_flashdata('message', 'swal("Sukses!!", "Lider berhasil terdaftar", "success");');
           redirect('dashboard/seting-member'); 
 			}
 		}

 	}

 	function hapus_lider($member){

 		$data = [
 			'lider' => '',
 		];

 		$this->db->where('kode_user', $member);
		$this->db->update('tbl_register', $data);
 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Lider berhasil dihapus", "success");');
          redirect('dashboard/seting-member'); 

 	}

 	function jaringan(){
 		$data['jaringan'] = $this->db->get('tbl_register')->result_array();
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/jaringan', $data);
 		$this->load->view('templateAdmin/footer');

 	}

 	function total_ecash(){

 		$this->db->select_sum('jml_cash');
        $data['jml'] = $this->db->get('tbl_cash')->row_array();

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/total_ecash', $data);
 		$this->load->view('templateAdmin/footer');
 	}

 	function seting_ecash(){
 		 $data['level'] = $this->db->get('tbl_level')->result_array();
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/seting_ecash', $data);
 		$this->load->view('templateAdmin/footer');
 		$action = $this->input->post('kirim');

 		if (isset($action)) {
 			
 			$arr = $this->input->post('level');
 			$id = $this->input->post('id');
 			$jm = count($arr);
 			for ($i=0; $i < $jm ; $i++) { 
 				
 				echo $arr[$i];
			// $this->db->where('id', $id[$i]);
			// $this->db->update('tbl_level', $data);
			// redirect("dashboar/");
 			}
 		}
 	}

 	function edit_level(){
 		$action = $this->input->post('kirim');

 		if (isset($action)) {
 			
 			$arr = $this->input->post('level');
 			$id = $this->input->post('id');
 			$jm = count($arr);
 			for ($i=0; $i < $jm ; $i++) { 
 				
 				$data = [
 					'jml_level' => $arr[$i],
 				];

			$this->db->where('id', $id[$i]);
			$this->db->update('tbl_level', $data);
			
 			}
 			$this->session->set_flashdata('message', 'swal("Sukses!!", "Data berhasil diubah", "success");');
 			redirect("dashboard/seting-ecash");
 		}


 	}


 	function data_admin(){

 		$data['admin'] = $this->db->get('tbl_admin')->result_array();
		$this->load->view('templateAdmin/header');
		$this->load->view('admin/data_admin', $data);
		$this->load->view('templateAdmin/footer');
	
 		
 	}

 	function tambah_admin(){

 		$this->form_validation->set_rules('username', 'username', 'required|trim');
 		$this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[5]|matches[pass2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
              ]);
	 	$this->form_validation->set_rules('pass2', 'konfirmasi password', 'required|trim|matches[pass1]');

	if ($this->form_validation->run() == false) {

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/tambah_admin');
 		$this->load->view('templateAdmin/footer');

 	}else{


	 		$data = [
	 			'usernam' => $this->input->post('username'),
	 			'pass' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
	 			'rule' => $this->input->post('rule') 
	 		];

	 		$input = $this->db->insert('tbl_admin', $data);
	 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Admin berhasil ditambahkan", "success");');
           redirect('dashboard/admin'); 

	 	}

	 }

	 function vendor(){
	 	$data['vendor'] = $this->db->get('tbl_vendor', 1)->row_array();
	 	
	 	$this->load->view('templateAdmin/header');
	 	$this->load->view('admin/vendor', $data);
	 	$this->load->view('templateAdmin/footer');

	 	if ($this->input->post('update')) {
	 		
	 		$data = [
	 			'bonus_vendor' => $this->input->post('bonus'),
	 		];

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
			$this->db->update('tbl_vendor', $data);

			$this->session->set_flashdata('message', 'swal("Sukses!!", "Bonus vendor berhasil update", "success");');
           redirect('dashboard/vendor'); 

	 	}
	 }

	 function update_vendor(){
	 	$this->load->view('templateAdmin/header');
	 	$this->load->view('admin/update_vendor');
	 	$this->load->view('templateAdmin/footer');
	 }



 }


 ?>