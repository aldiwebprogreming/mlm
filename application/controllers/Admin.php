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

 		$data['voucher'] = $this->db->get('tbl_voucher')->result_array();
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/edit_produk', $data);
 		$this->load->view('templateAdmin/footer'); 	

 		} else{
 			
 			$jenis_vc = $this->db->get_where('tbl_voucher',['id' => $this->input->post('jenis_voucher')])->row_array();

 				$data = [
 			
 			'judul_produk' => $this->input->post('judul_produk'),
 			'keterangan_produk' => $this->input->post('ket_produk'),
 			'harga' => $this->input->post('harga_produk'),
 			'jenis_voucher' => $jenis_vc['name'],
 			'nilai_voucher' => $this->input->post('nilai_voucher'),
 			'jumlah_voucher' => $this->input->post('jml_voucher'),
 			'bonus' => $this->input->post('bonus'),
 			'tgl_terbit' => $this->input->post('tgl_terbit'),
 			'tgl_batasterbit' => $this->input->post('batas_terbit'),
 			
 		];

 		$kode_produk = $this->input->post('kd_produk');

 		$this->db->where('kode_produk', $kode_produk);
		$this->db->update('tbl_produk', $data);

		$data = [
 			
 			'name_voucher' => $jenis_vc['name'],
 			'nilai_voucher' => $this->input->post('nilai_voucher'),
 			'tgl_terbit' => $this->input->post('tgl_terbit'),
 			'tgl_batasterbit' => $this->input->post('batas_terbit'),
 			
 		];

 		$this->db->where('kode_produk', $kode_produk);
		$this->db->update('tbl_list_voucherproduk', $data);
		
		$this->session->set_flashdata('message', 'swal("Sukses!!", "Data berhasil diubah", "success");');
		redirect("dashboard/produk");

 		}	
 	}

 	function hapus_produk($produk){
 		$this->db->delete('tbl_produk', array('kode_produk' => $produk));
 		$this->db->delete('tbl_list_voucherproduk', array('kode_produk' => $produk));

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

         $data['voucher'] = $this->db->get('tbl_voucher')->result_array();
         $data['jenis'] = $this->db->get('tbl_jenis_produk')->result_array();

        $terbit            = date("d-m-Y");
		$setahun        = mktime(0,0,0,date("n"),date("j")+365,date("Y"));
		$batas        = date("d-m-Y", $setahun);
		$data['terbit'] = $terbit;
		$data['batas'] = $batas;


		$data['harga_naikvoucher'] = $this->db->get('tbl_harga_naik_voucher')->row_array();

 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/tambah_produk', $data);
 		$this->load->view('templateAdmin/footer');

 	} else {

 		$jenis_vc = $this->db->get_where('tbl_voucher',['id' => $this->input->post('jenis_voucher')])->row_array();

 		$jenis_produk = $this->db->get_where('tbl_jenis_produk',['id' => $this->input->post('jenis_produk')])->row_array();

 		$data = [
 			'kode_produk' => $this->input->post('kd_produk'),
 			'judul_produk' => $this->input->post('judul_produk'),
 			'keterangan_produk' => $this->input->post('ket_produk'),
 			'harga' => $this->input->post('harga_produk'),
 			'jenis_produk' => $jenis_produk['jenis'],
 			'bonus_sponsor' => $this->input->post('bonus_s'),
 			'jenis_voucher' => $jenis_vc['name'],
 			'nilai_voucher' => $this->input->post('nilai_voucher'),
 			'jumlah_voucher' => $this->input->post('jml_voucher'),
 			'bonus_point' => $this->input->post('point'),
 			'tgl_terbit' => $this->input->post ('tgl_terbit'),
         	'tgl_batasterbit' => $this->input->post('batas_terbit'),
 			
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

 	function jenis_produk(){
 		$data['jenis'] = $this->db->get('tbl_jenis_produk')->result_array();
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/jenis_produk', $data);
 		$this->load->view('templateAdmin/footer');
 	}

 	function tambah_jenis_produk(){


		$this->form_validation->set_rules('jenis', 'jenis', 'required|trim');
		$this->form_validation->set_rules('point', 'point', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('templateAdmin/header');
	 		$this->load->view('admin/tambah_jenis_produk');
	 		$this->load->view('templateAdmin/footer');
		}else{
			$nama_jenis= $this->input->post('jenis');
			$slug = strtolower($nama_jenis);
			$slug_jp = str_replace(" ", "-", $slug);

			$data = [

				'jenis' => $this->input->post('jenis'),
				'slug_jenis' => $slug_jp,
				'bonus_point' => $this->input->post('point')

			];

			$input = $this->db->insert('tbl_jenis_produk', $data);
			$this->session->set_flashdata('message', 'swal("Sukses!!", "Jenis produk berhasil ditambahkan", "success");');
           redirect('dashboard/jenis-produk'); 

		}

 		
 	}

 	function edit_jenis_produk($id){
 		$this->form_validation->set_rules('jenis', 'jenis', 'required|trim');
 		$this->form_validation->set_rules('persen', 'persen', 'required|trim');
		if ($this->form_validation->run() == false) {
 		$data['jenis'] = $this->db->get_where('tbl_jenis_produk',['id' => $id])->row_array();
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/edit_jenis_produk', $data);
 		$this->load->view('templateAdmin/footer');
 		}else{

 			$nama_jenis= $this->input->post('jenis');
			$slug = strtolower($nama_jenis);
			$slug_jp = str_replace(" ", "-", $slug);

 			$data = [
 				'jenis' => $this->input->post('jenis'),
 				'slug_jenis' => $slug_jp,
 				'persen_bonus' => $this->input->post('persen'),
 			];

 			$this->db->where('id', $id);
			$this->db->update('tbl_jenis_produk', $data);
			$this->session->set_flashdata('message', 'swal("Sukses!!", "Jenis produk berhasil diubah", "success");');
           redirect('dashboard/jenis-produk'); 
 		}
 	}

 	function hapus_jenis_produk(){
 		$id = $this->input->get('id');
 		$this->db->delete('tbl_jenis_produk', array('id' => $id));
 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Jenis produk berhasil dihapus", "success");');
           redirect('dashboard/jenis-produk'); 
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
 			// proses pengecekan apakah data user ada data lider yang sama
 			$lider = $this->input->post('lider');
 			$cek = $this->db->get_where('tbl_register', ['lider' => $lider])->row_array();
 			if ($cek == true) {
 				$this->session->set_flashdata('message', 'swal("Gagal!!", "Lider sudah terdaftar", "warning");');
           redirect('dashboard/seting-member'); 
 			}else {
 				// prosese uddate data user menjadi lider di tbl_register
 				$this->db->where('kode_user', $member);
				$this->db->update('tbl_register', $data);
				// end

				

				// proses input data lider ke tbl_lider
				$data = [
					'kode_user' => $member,
					'name_lider' => $this->input->post('lider'),
				];



				$this->db->insert('tbl_lider', $data);
				// cek jumlah lider yang terdaftar

				$lider = $this->db->get('tbl_lider')->num_rows();

				if ($lider >= 2) {

					$data = [
						'bonus' => 0.05
					];
					$this->db->update('tbl_lider', $data);



					
				}
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

 		$this->db->delete('tbl_lider', array('kode_user' => $member));

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

 	function seting_referral(){
 		 $data['level'] = $this->db->get('tbl_level')->result_array();
 		$this->load->view('templateAdmin/header');
 		$this->load->view('admin/seting_referral', $data);
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

 	function set_hargavoucher(){
 		$data['set'] = $this->db->get('tbl_harga_naik_voucher')->result_array();
 		$this->load->view('templateAdmin/header');
        $this->load->view('admin/harga_naikvoucher', $data);
        $this->load->view('templateAdmin/footer');

        if ($this->input->post('edit')) {
        	
        	$data = [
        		'jenis_voucher' => $this->input->post('jenis_voucher'),
        		'naik_harga' => $this->input->post('naik_harga'), 
        	];

        	$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_harga_naik_voucher', $data);

			$this->session->set_flashdata('message', 'swal("Suksess", " Data berhasil diedit", "success");');
            redirect('admin/set_hargavoucher');


        }

 	}

 	function cashback(){

 		$data['cashback'] = $this->db->get('tbl_cashback')->result_array();
        $this->load->view('templateAdmin/header');
        $this->load->view('admin/set_cashback', $data);
        $this->load->view('templateAdmin/footer');

        $cek = $this->input->post('update');
		 		if (isset($cek)) {
		 			
		 		
		 		$data = [
		 			'cashback' => $this->input->post('bonus'),
		 		];

		 		$this->db->update('tbl_cashback', $data);
		 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Cashbacj berhasil diset", "success");');
          		 redirect('dashboard/set-cashback'); 
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

	 function data_voucher(){
	 	$data['voucher'] = $this->db->get('tbl_voucher')->result_array();
	 	$this->load->view('templateAdmin/header');
	 	$this->load->view('admin/data_voucher', $data);
	 	$this->load->view('templateAdmin/footer');
	 }

	 function tambah_voucher(){

	 	$this->form_validation->set_rules('name','name voucher','required|trim');
	 	$this->form_validation->set_rules('bonus','bonus sponsor','required|trim');
	 	$this->form_validation->set_rules('cashback','cashback','required|trim');

	 	if ($this->form_validation->run() == FALSE) {
		 	$this->load->view('templateAdmin/header');
		 	$this->load->view('admin/tambah_voucher');
		 	$this->load->view('templateAdmin/footer');
	 	}else{
	 		$nama_voucher = $this->input->post('name');
	 		$slug = strtolower($nama_voucher);
			$slug_vc = str_replace(" ", "-", $slug);

	 		$data = [
	 			'name' => $this->input->post('name'),
	 			'bonus_sponsor' => $this->input->post('bonus'),
	 			'bonus_cashback' => $this->input->post('cashback'),
	 			'slug_vc' => $slug_vc,
	 		];

	 		$this->db->insert('tbl_voucher', $data);
	 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Voucher berhasil ditambah", "success");');
           redirect('dashboard/voucher'); 
	 	}
	 			
	 	
	 }

	 function hapus_voucher(){

	 	$id = $this->input->get('id');
	 	
	 	$this->db->delete('tbl_voucher', array('id' => $id));
 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Voucher berhasil dihapus", "success");');
           redirect('dashboard/voucher'); 
	 }


	 function bonus(){
	 	$id = $this->input->get('id');
	 	$data['bonus'] = $this->db->get_where('tbl_voucher',['id' => $id])->row_array();
	 	$this->load->view('admin/bonus', $data);
	 }

	 function get_bonus_s(){
	 	$id = $this->input->get('id');
	 	$data['bonus_s'] = $this->db->get_where('tbl_voucher',['id' => $id])->row_array();
	 	$this->load->view('admin/bonus_s', $data);
	 }


	 function set_lider(){

	 		$data['setL'] = $this->db->get('tbl_lider', 1)->row_array();

	 		$this->load->view('templateAdmin/header');
		 	$this->load->view('admin/set_lider',$data);
		 	$this->load->view('templateAdmin/footer');
		 		$cek = $this->input->post('update');
		 		if (isset($cek)) {
		 			
		 		
		 		$data = [
		 			'bonus' => $this->input->post('bonus'),
		 		];

		 		$this->db->update('tbl_lider', $data);
		 		$this->session->set_flashdata('message', 'swal("Sukses!!", "Lider berhasil diset", "success");');
          		 redirect('dashboard/set-lider'); 
		 	}
	 	
	 }

	 function add_member(){
	 	$kode = rand(1, 100000);
        $data['kode_user'] = "Ebunga-".$kode;

        $data['voucher'] = $this->db->get('tbl_voucher')->result_array();

        $this->load->view('templateAdmin/header');
        $this->load->view('admin/add_member2', $data);
        $this->load->view('templateAdmin/footer');

    }

    function kirim(){
    		echo $this->input->post('nama');
        	echo $this->input->post('hp');
        	echo $this->input->post('alamat');
    }



    function get_produk(){


    	$data['register'] = [
    		'username' => $this->input->get('username'),
    		'email' => $this->input->get('email'),
    		'nohp' =>  $this->input->get('nohp'),
    		'pass1' => $this->input->get('pass1'),
    		'pass2' => $this->input->get('pass2'),
    		'kodeuser' => $this->input->get('kode_user'),
    	];

    	 $id = $this->input->get('id');
    	// echo $username = $this->input->get('username');
    	// echo $email = $this->input->get('email');
    	// echo $nohp = $this->input->get('nohp');
    	// echo $pass1 = $this->input->get('pass1');
    	// echo $pass2 = $this->input->get('pass2');

    	$data['getProduk'] = $this->db->get_where('tbl_produk', ['jenis_voucher' => $id])->result_array();

    	$this->load->view('admin/getProduk', $data);
    }



    function produkDet($kode){

    	$data['user'] = [
    		'kode_user' => $this->input->post('kodeuser'),
    		'username' => $this->input->post('username'),
    		'email' => $this->input->post('email'),
    	];

    	$data['detProduk'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode])->row_array();
    	$this->load->view('templateAdmin/header');
    	$this->load->view('admin/detPay', $data);
    	$this->load->view('templateAdmin/footer');


    }


    function get_bonus_point(){
    	$id = $this->input->get('id');
    	$data['point'] = $this->db->get_where('tbl_jenis_produk', ['id' => $id])->row_array();

    	$this->load->view('admin/gat_point', $data);
    	

    }


    function seting_paketVoucher(){

    	$this->load->view('templateAdmin/header');
    	$this->load->view('admin/setPaketVoucher');
    	$this->load->view('templateAdmin/footer');

    	if ($this->input->post('kirim')) {
    		$data = [

    			'nama_paket' => $this->input->post('jenis_paket'),
    			'voucher' => $this->input->post('voucher'),
    			'jml_voucher' => $this->input->post('jml_voucher'),
    			'tahun_1' => $this->input->post('tahun1'),
    			'tahun_2' => $this->input->post('tahun2'),
    			'tahun_3' => $this->input->post('tahun3'),
    			'tahun_4' => $this->input->post('tahun4'),
    			'tahun_5' => $this->input->post('tahun5'),

    		];

    		$input=$this->db->insert('tbl_setvoucher', $data);
    		$this->session->set_flashdata('message', 'swal("Sukses!!", "Voucher berhasil diset", "success");');
          		 redirect('admin/seting_paketVoucher'); 
    	}
    }


    function data_setvoucher(){
    	$data['data_set'] = $this->db->get('tbl_setvoucher')->result_array();
    	$this->load->view('templateAdmin/header');
    	$this->load->view('admin/dataSetPaketVouche', $data);
    	$this->load->view('templateAdmin/footer');
    }

    function hapus_setVocuher(){
    	$id = $this->input->get('id');
    	$this->db->where('id', $id);
		$this->db->delete('tbl_setvoucher');


    }


    function transaksi(){
    	$data['keranjang'] = $this->db->get('tbl_keranjang')->result_array();
    	$data['jml'] = $this->db->get('tbl_keranjang')->num_rows();
    	$this->load->view('templateAdmin/header');
    	$this->load->view('admin/data_keranjang', $data);
    	$this->load->view('templateAdmin/footer');
    }

    function transaksi_upgrade(){
    	$data['keranjang'] = $this->db->get('tbl_keranjang_upgrade')->result_array();
    	$data['jml'] = $this->db->get('tbl_keranjang_upgrade')->num_rows();
    	$this->load->view('templateAdmin/header');
    	$this->load->view('admin/data_keranjang_upgrade', $data);
    	$this->load->view('templateAdmin/footer');
    }


    function action_keranjang(){

    	if ($this->input->post('kirim')) {
    		
    		$kode_user = $this->input->post('kode_user');
    		$data_user = $this->db->get_where('tbl_keranjang',['kode_user' => $kode_user])->row_array();

    	    $data = [
    			
            'kode_user' => $data_user['kode_user'],
            'name' => $data_user['name'],
            'username' => $data_user['username'],
            'email' => $data_user['email'],
            'no_telp' => $data_user['no_telp'],
            'password' =>$data_user['password'],
            'pass2' =>$data_user['pass2'],
            'status' => 0,
            'kode_jaringan' => $data_user['kode_jaringan'],
            'kode_rule' => $data_user['kode_rule'],
            'lider' => $data_user['lider'],
            'kode_produk' => $data_user['kode_produk'],
            'jenis_voucher' => $data_user['jenis_voucher'],
            'jenis_paket' => $data_user['jenis_paket'],
            'bonus_sponsor' =>$data_user['bonus_sponsor'],
            'sc_code' =>$data_user['sc_code'],
            'status_update' =>$data_user['status_update'],
            'date_create' => date('Y-m-d'),
            'date_create_upgrade' =>'',


        ];

        $input = $this->db->insert('tbl_register', $data);
        if ($input == true) {

        $kode_produk = $data_user['kode_produk'];
        $prdk = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();

         $tgl   = date("Y-m-d");
         $tgl_terbit = mktime(0,0,0,date("n"),date("j")+365,date("Y"));
         $tgl_batasterbit = date("Y-m-d", $tgl_terbit);

         // prosese update paket vouhcer
        // jika ada inputan upgrade maka akan dijalankan
         $upgrade = $this->input->post('upgrade');
        if (isset($upgrade)) {
         		
         	$data = [

                'jenis_voucher' => $this->input->post('jenis_voucher'),
                'bonus_sponsor' => $this->input->post('bonus_sponsor'),
                'jenis_paket' =>  $this->input->post('jenis_produk'),
                'update_date' => date_default_timezone_get(),             
            ];

            $this->db->where('kode_user', $upgrade);
            $this->db->update('tbl_register', $data);

            $this->db->where('kode_member', $upgrade);
            $this->db->delete('tbl_list_voucherproduk');

            for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 

                $kode = rand(1, 100000);
                $kode_vc = "VCR-".$kode;
                  $data = [
                  'kode_member' => $upgrade,
                  'kode_produk' => $prdk['kode_produk'],
                  'name_voucher' => $prdk['jenis_voucher'], 
                  'nilai_voucher' => $prdk['nilai_voucher'],
                  'kode_voucher' => $kode_vc,
                  'tgl_terbit' => $tgl,
                  'tgl_batasterbit' => $tgl_batasterbit,  
                ];

                  $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                  
              } //for

               $cek_point = $this->db->get_where('tbl_bonus_point',['kode_member' => $upgrade])->row_array();

            if ($cek_point == true) {

                $data = [

                    'bonus_point' => $this->input->post('bonus_point'),
                ];
                
                $this->db->where('kode_member', $upgrade);
                $this->db->update('tbl_bonus_point', $data);
            } //cek poit 


            $this->session->set_flashdata('message', 'swal("Sukses!!", "Paket voucher anda berhasil diupgrade", "success");');
            redirect('admin/transaksi/')
;



        } //if isset upgrade/

        else{


     		$set_harga = $this->db->get('tbl_harga_naik_voucher')->row_array();

         	if ($data_user['jenis_paket'] == 'Paket Reseller Platinum') {
                for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
	                $kode = rand(1, 100000);
	                $kode_vc = "VCR-".$kode;
	                  $data = [
	                  'kode_member' =>$data_user['kode_user'],
	                  'kode_produk' => $prdk['kode_produk'],
	                  'name_voucher' => $prdk['jenis_voucher'], 
	                  'jenis_paket' => $prdk['jenis_produk'],
	                  'nilai_voucher' => $prdk['nilai_voucher'] ,
	                  'kode_voucher' => $kode_vc,
	                  'tgl_terbit' => $tgl,
	                  'tgl_batasterbit' => $tgl_batasterbit, 
	                  'status_voucher' => 'baru', 
	                ];

                  $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);     
                }

            }elseif ($data_user['jenis_paket'] == 'Paket Reseller Gold') {

	            for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
	                $kode = rand(1, 100000);
	                $kode_vc = "VCR-".$kode;
	                  $data = [
	                  'kode_member' => $data_user['kode_user'],
	                  'kode_produk' => $prdk['kode_produk'],
	                  'name_voucher' => $prdk['jenis_voucher'], 
	                  'jenis_paket' => $prdk['jenis_produk'],
	                  'nilai_voucher' => $prdk['nilai_voucher'],
	                  'kode_voucher' => $kode_vc,
	                  'tgl_terbit' => $tgl,
	                  'tgl_batasterbit' => $tgl_batasterbit, 
	                  'status_voucher' => 'baru', 
	                ];

                   $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                }

            }elseif ($data_user['jenis_paket'] == 'Paket Reseller Silver') {

            	for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
	                $kode = rand(1, 100000);
	                $kode_vc = "VCR-".$kode;
	                $data = [
	                  'kode_member' => $data_user['kode_user'],
	                  'kode_produk' => $prdk['kode_produk'],
	                  'name_voucher' => $prdk['jenis_voucher'], 
	                  'jenis_paket' => $prdk['jenis_produk'],
	                  'nilai_voucher' => $prdk['nilai_voucher'],
	                  'kode_voucher' => $kode_vc,
	                  'tgl_terbit' => $tgl,
	                  'tgl_batasterbit' => $tgl_batasterbit, 
	                  'status_voucher' => 'baru', 
	                ];

	                $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                }	


            }elseif ($data_user['jenis_paket'] == 'Paket Reseller Brown') {

            	for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
	                $kode = rand(1, 100000);
	                $kode_vc = "VCR-".$kode;
	                $data = [
	                  'kode_member' => $data_user['kode_user'],
	                  'kode_produk' => $prdk['kode_produk'],
	                  'name_voucher' => $prdk['jenis_voucher'], 
	                  'jenis_paket' => $prdk['jenis_produk'],
	                  'nilai_voucher' => $prdk['nilai_voucher'],
	                  'kode_voucher' => $kode_vc,
	                  'tgl_terbit' => $tgl,
	                  'tgl_batasterbit' => $tgl_batasterbit,
	                  'status_voucher' => 'baru',
	                ];

	                $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                }


            }else{

            	$get_set = $this->db->get_where('tbl_setvoucher',['nama_paket' => $this->input->post('jenis_produk')])->row_array();
                $kode_user = $data_user['kode_user'];
                $kode_produk = $prdk['kode_produk'];
                $voucher = $prdk['jenis_voucher'];
                $nilai_voucher = $prdk['nilai_voucher'];
                $jenis_paket = $data_user['jenis_paket'];

                $this->voucher($kode_user, $kode_produk, $voucher, $nilai_voucher, $jenis_paket,'baru');

            }

            
               	//proses hapus keranjang

               	$kode_user = $this->input->post('kode_user');
                $this->db->where('kode_user', $kode_user);
                $this->db->delete('tbl_keranjang');

              // input bonus point

	        	$data = [

	            'kode_member' => $data_user['kode_user'],
	            'kode_rule_member' =>$data_user['kode_rule'],
	            'bonus_point' => $prdk['bonus_point'],

	        	];

	            $input_point = $this->db->insert('tbl_bonus_point', $data);

	            if ($input_point) { 


	            	// input bonus level 

	            	$kode_user = $data_user['kode_user'];
		    		$dataku =  $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
		    		$kode = $dataku['kode_jaringan'];
		            $arr = explode (" ",$kode);
		            $jm_arr = count($arr);


		           if ($jm_arr == 2) {
		           	
		           		for ($i=0; $i < 2 ; $i++) { 
				           			
		                    if ($i == 0) {
			                    $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();
			                    $harga = $prdk['harga'];
			                    $persen = $level_1['jml_level'] / 100 ;
			                    $ecash = $persen * $harga;

			                    $data = [
			                        'kode_user' => $arr[$i],
			                        'jml_cash' => $ecash,
			                    ];

			                    $this->db->insert('tbl_cash', $data);
			                     $this->totalBonus($arr[$i]);
		                    }else{

					            $level_2 = $this->db->get_where('tbl_level',['name_level' => 'level 2'])->row_array();
			                    $harga = $prdk['harga'];
			                    $persen = $level_2['jml_level'] / 100 ;
			                    $ecash = $persen * $harga;

			                    $data = [
			                        'kode_user' => $arr[$i],
			                        'jml_cash' => $ecash,
			                    ];

			                    $this->db->insert('tbl_cash', $data);
			                     $this->totalBonus($arr[$i]);
		                    }
		           		}

		            }elseif ($jm_arr == 1) {
		            	for ($i=0; $i < 1 ; $i++) { 

		            		if ($i == 0) {

                    			$level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();

			                    $harga = $prdk['harga'];
			                    $persen = $level_1['jml_level'] / 100 ;
			                    $ecash = $persen * $harga;

			                    $data = [
			                        'kode_user' => $arr[$i],
			                        'jml_cash' => $ecash,
			                    ];

			                    $this->db->insert('tbl_cash', $data);
			                     $this->totalBonus($arr[$i]);
		                    }

		            	}
		            }else{
		            	for ($i=0; $i < 3 ; $i++) { 

		            		if ($i == 0) {
		            			
		            			$level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();
		            			$harga = $prdk['harga'];
				                $persen = $level_1['jml_level'] / 100 ;
				                $ecash = $persen * $harga;
							    $data = [
			                        'kode_user' => $arr[$i],
			                        'jml_cash' => $ecash,
			                    ];

			                    $this->db->insert('tbl_cash', $data);
			                     $this->totalBonus($arr[$i]);
		            		}elseif ($i == 1) {
		            			
		            			$level_2 = $this->db->get_where('tbl_level',['name_level' => 'level 2'])->row_array();
			                        $harga = $prdk['harga'];
			                        $persen = $level_2['jml_level']/ 100 ;
			                        $ecash = $persen * $harga;
			                    $data = [
			                        'kode_user' => $arr[$i],
			                        'jml_cash' => $ecash,
			                    ];
                    			$this->db->insert('tbl_cash', $data);
                    			 $this->totalBonus($arr[$i]);
		            		}else{
		            			$level_3 = $this->db->get_where('tbl_level',['name_level' => 'level 3'])->row_array();
			                        $harga = $prdk['harga'];
			                        $persen = $level_3['jml_level']/ 100 ;
			                        $ecash = $persen * $harga;
			                    $data = [
			                        'kode_user' => $arr[$i],
			                        'jml_cash' => $ecash,
			                    ];
                    			$this->db->insert('tbl_cash', $data);
                    			 $this->totalBonus($arr[$i]);
		            		}


		            	}
		            }

		           $this->bonus_baru($data_user['kode_user']);

		           $this->sendEmail($data_user['email'], $data_user['sc_code'], $data_user['pass2']);

		           // $this->totalBonus($data_user['kode_rule']);

	              $this->session->set_flashdata('message', 'swal("Sukses", "Member berhasil dipersetujui", "success");');
              
		           redirect('admin/transaksi/');

	            }else{

	              $this->session->set_flashdata('message', 'swal("Anda gagal mendaftarkan sponsor ", "mohon coba beberapa saat lagi", "error");');
                 redirect('admin/transaksi/');
	            }

           


         }



       } //if input == true


    	} //if keranjang

    }  //function

    function totalBonus($kode_user){
    	$kode_user = $kode_user;
    	$ref = $this->db->query("SELECT SUM(jml_cash) AS total_cash FROM tbl_cash WHERE kode_user = '$kode_user';")->row_array();

        $sponsor = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus FROM tbl_bonus_sponsor WHERE kode_user = '$kode_user';")->row_array();

        $lider = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus_lider FROM tbl_bonus_lider WHERE kode_user = '$kode_user';")->row_array();

        echo $total = $ref['total_cash'] + $sponsor['total_bonus'] + $lider['total_bonus_lider'];

        $data = [
        	'kode_member' => $kode_user,
        	'total_bonus' => $total,
        ];

        $cek = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_user])->row_array();

        if ($cek) {
        	
        	$this->db->where('kode_member', $kode_user);
        	$this->db->update('tbl_total_bonus', $data);
        }else{

        $this->db->insert('tbl_total_bonus' , $data);

    	}

    }


    function action_keranjang_upgrade(){
    	$kode_user = $this->input->post('kode_user');
    	$kode_produk = $this->input->post('kode_produk');
    	$prd = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();

    	$data = [
    		'kode_produk' => $kode_produk,
    		'jenis_voucher' => $prd['jenis_voucher'],
    		'jenis_paket' => $prd['jenis_produk'],
    		'bonus_sponsor' => $prd['bonus_sponsor'],
    		'date_create_upgrade' => date('Y-m-d'),

    	];

    	$this->db->where('kode_user', $kode_user);
    	$update = $this->db->update('tbl_register', $data);

    		
    	if ($update == true) {
    		
    		$cek = $this->db->get_where('tbl_bonus_point',['kode_member' => $kode_user])->row_array();

    		if ($cek) {
    			
    			$this->db->where('kode_member', $kode_user);
    			$update = $this->db->update('tbl_bonus_point', ['bonus_point' => $prd['bonus_point']]);

    			if ($update) {
    				
    				$this->db->where('kode_user', $kode_user);
    				$this->db->where('kode_produk', $kode_produk);
					$this->db->delete('tbl_keranjang_upgrade');

					// action tambah voucher upgrade untuk reseller

					
    			}

    		$this->action_upgrade_voucher($kode_user, $kode_produk);

			$this->session->set_flashdata('message', 'swal("Suksess", "Upgrade barhasil diproses", "success");');
             redirect('admin/transaksi_upgrade/');

    		}

    	}




    }




     function bonus_baru($kode_user){

        $kode_user = $kode_user;

        $data_rule = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
        $jaringan = $data_rule['kode_jaringan'];
        $array = explode (" ",$jaringan);

        $produk = $this->db->get_where('tbl_produk',['jenis_produk' => $data_rule['jenis_paket']])->row_array();


        $sponsor = 0;
        $persen = 0;

        foreach ($array as $cek_bonus) {
            
            $data = $this->db->get_where('tbl_register',['kode_user' => $cek_bonus])->row_array();

             $cek_persen = $data['bonus_sponsor'] - $persen;
             if ($cek_persen < 0) {
                 continue;
             } elseif ($data['bonus_sponsor'] == $sponsor ) {


                
                continue;


               
            }

            echo $data['username'].", ". $data['bonus_sponsor'] - $persen. "<br>";
            $bonuspushup = $data['bonus_sponsor'] - $persen;

             $sponsor = $data['bonus_sponsor'];
             $persen = $data['bonus_sponsor'];

         
            $jml =$bonuspushup/100;
            $hasil = $jml * $produk['harga'];
            $inputBonus = [

                'kode_user' => $data['kode_user'],
                'jml_bonus' => $hasil,
            ];

            $this->db->insert('tbl_bonus_sponsor', $inputBonus);
            $this->totalBonus($data['kode_user']);
             
        }


    }



    function voucher($kode_user, $kode_produk, $voucher, $nilai_voucher, $jenis_paket, $status){

     	// $set_harga = $this->db->get('tbl_harga_naik_voucher')->row_array();

        $paket = $jenis_paket;
        $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();

        $tahun1 = $data['tahun_1'];

        $tgl   = date("Y-m-d");
        $tgl_terbit = mktime(0,0,0,date("n"),date("j")+360,date("Y"));
        $tgl_batasterbit = date("Y-m-d", $tgl_terbit);

        for ($i=1; $i <= $tahun1 ; $i++) { 
           
            // echo $i. "/ ".  $tgl." | ".$tgl_batasterbit."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl,
              'tgl_batasterbit' => $tgl_batasterbit,
              'status_voucher' => $status,
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }

       
         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun2 = $data['tahun_2'];

        $tgl2   = $tgl_batasterbit;
        $tgl_terbit2 = mktime(0,0,0,date("n"),date("j")+730,date("Y"));
        $tgl_batasterbit2 = date("Y-m-d", $tgl_terbit2);

         for ($i=1; $i <= $tahun2 ; $i++) { 
            // echo $i. "/ ".  $tgl2." | ".$tgl_batasterbit2."<br>";
             $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl2,
              'tgl_batasterbit' => $tgl_batasterbit2,  
              'status_voucher' => $status,
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }

     
         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun3 = $data['tahun_3'];

        $tgl3   = $tgl_batasterbit2;
        $tgl_terbit3 = mktime(0,0,0,date("n"),date("j")+1095,date("Y"));
        $tgl_batasterbit3 = date("Y-m-d", $tgl_terbit3);

         for ($i=1; $i <= $tahun3 ; $i++) { 
            // echo $i. "/ ".  $tgl3." | ".$tgl_batasterbit3."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' =>  $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl3,
              'tgl_batasterbit' => $tgl_batasterbit3,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun4 = $data['tahun_4'];

        $tgl4   = $tgl_batasterbit3;
        $tgl_terbit4 = mktime(0,0,0,date("n"),date("j")+1460,date("Y"));
        $tgl_batasterbit4 = date("Y-m-d", $tgl_terbit4);

         for ($i=1; $i <= $tahun4 ; $i++) { 
            // echo $i. "/ ".  $tgl4." | ".$tgl_batasterbit4."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher ,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl4,
              'tgl_batasterbit' => $tgl_batasterbit4,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun5 = $data['tahun_5'];

        $tgl5   = $tgl_batasterbit4;
        $tgl_terbit5 = mktime(0,0,0,date("n"),date("j")+1825,date("Y"));
        $tgl_batasterbit5 = date("Y-m-d", $tgl_terbit5);

         for ($i=1; $i <= $tahun5 ; $i++) { 
            // echo $i. "/ ".  $tgl5." | ".$tgl_batasterbit5."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' =>  $nilai_voucher ,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl5,
              'tgl_batasterbit' => $tgl_batasterbit5,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }




    }


    function action_upgrade_voucher($kode_user, $kode_produk){
    	$kode_user = $kode_user;
    	$kode_produk = $kode_produk;



    	$produk = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();

    	$set_harga = $this->db->get('tbl_harga_naik_voucher')->row_array();
    	 $tgl   = date("Y-m-d");
         $tgl_terbit = mktime(0,0,0,date("n"),date("j")+365,date("Y"));
         $tgl_batasterbit = date("Y-m-d", $tgl_terbit);

    	if ($produk['jenis_produk'] == 'Paket Reseller Silver') {
    		
    		
    		for ($i=1; $i <= $produk['jumlah_voucher']  ; $i++) { 
                $kode = rand(1, 100000);
                $kode_vc = "VCR-".$kode;
                $data = [
                  'kode_member' => $kode_user,
                  'kode_produk' => $kode_produk,
                  'name_voucher' => $produk['jenis_voucher'],
                  'jenis_paket' => $produk['jenis_produk'], 
                  'nilai_voucher' => $produk['nilai_voucher'],
                  'kode_voucher' => $kode_vc,
                  'tgl_terbit' => $tgl,
                  'tgl_batasterbit' => $tgl_batasterbit,  
                  'status_voucher' => 'upgrade', 
                ];

                $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
            }
    	}elseif ($produk['jenis_produk'] == 'Paket Reseller Gold') {

    		for ($i=1; $i <= $produk['jumlah_voucher']  ; $i++) { 
                $kode = rand(1, 100000);
                $kode_vc = "VCR-".$kode;
                $data = [
                  'kode_member' =>  $kode_user,
                  'kode_produk' => $kode_produk, 
                  'name_voucher' => $produk['jenis_voucher'],  
                   'jenis_paket' => $produk['jenis_produk'],  
                  'nilai_voucher' => $produk['nilai_voucher'],
                  'kode_voucher' => $kode_vc,
                  'tgl_terbit' => $tgl,
                  'tgl_batasterbit' => $tgl_batasterbit,  
                  'status_voucher' => 'upgrade', 
                ];

                $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
            }
    		
    	}elseif ($produk['jenis_produk'] == 'Paket Reseller Platinum') {

    		for ($i=1; $i <= $produk['jumlah_voucher']  ; $i++) { 
                $kode = rand(1, 100000);
                $kode_vc = "VCR-".$kode;
                $data = [
                  'kode_member' =>  $kode_user,
                  'kode_produk' => $kode_produk, 
                  'name_voucher' => $produk['jenis_voucher'],  
                   'jenis_paket' => $produk['jenis_produk'], 
                  'nilai_voucher' => $produk['nilai_voucher'],
                  'kode_voucher' => $kode_vc,
                  'tgl_terbit' => $tgl,
                  'tgl_batasterbit' => $tgl_batasterbit,  
                  'status_voucher' => 'upgrade', 
                ];

                $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
            }
    		
    	}elseif ($produk['jenis_produk'] == 'Paket Reseller Brown') {

    		for ($i=1; $i <= $produk['jumlah_voucher']  ; $i++) { 
                $kode = rand(1, 100000);
                $kode_vc = "VCR-".$kode;
                $data = [
                  'kode_member' =>  $kode_user,
                  'kode_produk' => $kode_produk, 
                  'name_voucher' => $produk['jenis_voucher'],  
                  'nilai_voucher' => $produk['nilai_voucher'],
                  'kode_voucher' => $kode_vc,
                  'tgl_terbit' => $tgl,
                  'tgl_batasterbit' => $tgl_batasterbit,  
                  'status_voucher' => 'upgrade', 
                ];

                $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
            }
    		
    	}else{

    		$status_voucher = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user, 'status_voucher' => 'upgrade_1'])->row_array();

    		$status_voucher2 = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user, 'status_voucher' => 'upgrade_1'])->row_array();

    		$status_voucher3 = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user, 'status_voucher' => 'upgrade_2'])->row_array();


    		if ($status_voucher == false) {
    		$this->voucher2($kode_user, $kode_produk, $produk['jenis_voucher'], $produk['nilai_voucher'],$produk['jenis_produk'], 'upgrade_1' );
    		}elseif ($status_voucher2 == true) {
    			$this->voucher2($kode_user, $kode_produk, $produk['jenis_voucher'], $produk['nilai_voucher'],$produk['jenis_produk'], 'upgrade_2' );
    		}elseif($status_voucher3 == true){

    			$this->voucher2($kode_user, $kode_produk, $produk['jenis_voucher'], $produk['nilai_voucher'],$produk['jenis_produk'], 'upgrade_3' );
    		}

    		

    		 
    	}



    }


    function voucher2($kode_user, $kode_produk, $voucher, $nilai_voucher, $jenis_paket, $status){

    
        $paket = $jenis_paket;
        $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();

        $tahun1 = $data['tahun_1'];

        $tgl   = date("Y-m-d");
        $tgl_terbit = mktime(0,0,0,date("n"),date("j")+360,date("Y"));
        $tgl_batasterbit = date("Y-m-d", $tgl_terbit);

        for ($i=1; $i <= $tahun1 ; $i++) { 
           
            // echo $i. "/ ".  $tgl." | ".$tgl_batasterbit."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl,
              'tgl_batasterbit' => $tgl_batasterbit,
              'status_voucher' => $status,
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }

        $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun2 = $data['tahun_2'];

        $tgl2   = $tgl_batasterbit;
        $tgl_terbit2 = mktime(0,0,0,date("n"),date("j")+730,date("Y"));
        $tgl_batasterbit2 = date("Y-m-d", $tgl_terbit2);

         for ($i=1; $i <= $tahun2 ; $i++) { 
            // echo $i. "/ ".  $tgl2." | ".$tgl_batasterbit2."<br>";
             $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl2,
              'tgl_batasterbit' => $tgl_batasterbit2,  
              'status_voucher' => $status,
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }

     
         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun3 = $data['tahun_3'];

        $tgl3   = $tgl_batasterbit2;
        $tgl_terbit3 = mktime(0,0,0,date("n"),date("j")+1095,date("Y"));
        $tgl_batasterbit3 = date("Y-m-d", $tgl_terbit3);

         for ($i=1; $i <= $tahun3 ; $i++) { 
            // echo $i. "/ ".  $tgl3." | ".$tgl_batasterbit3."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' =>  $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl3,
              'tgl_batasterbit' => $tgl_batasterbit3,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun4 = $data['tahun_4'];

        $tgl4   = $tgl_batasterbit3;
        $tgl_terbit4 = mktime(0,0,0,date("n"),date("j")+1460,date("Y"));
        $tgl_batasterbit4 = date("Y-m-d", $tgl_terbit4);

         for ($i=1; $i <= $tahun4 ; $i++) { 
            // echo $i. "/ ".  $tgl4." | ".$tgl_batasterbit4."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher ,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl4,
              'tgl_batasterbit' => $tgl_batasterbit4,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun5 = $data['tahun_5'];

        $tgl5   = $tgl_batasterbit4;
        $tgl_terbit5 = mktime(0,0,0,date("n"),date("j")+1825,date("Y"));
        $tgl_batasterbit5 = date("Y-m-d", $tgl_terbit5);

         for ($i=1; $i <= $tahun5 ; $i++) { 
            // echo $i. "/ ".  $tgl5." | ".$tgl_batasterbit5."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' =>  $nilai_voucher ,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl5,
              'tgl_batasterbit' => $tgl_batasterbit5,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }





    }


    function sendEmail($email, $sc, $pass){

      
         $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aldiiit593@gmail.com',
            'smtp_pass' => 'jmgtfhyvdxqqiuyy',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('aldiiit593@gmail.com', 'PTB');
			$this->email->to($email);

			$this->email->subject('PTB');

			
			
			$get1 = file_get_contents(base_url("email/email.php?sc=$sc&&pass=$pass"));
	      			
			$this->email->message("$get1");

			if (!$this->email->send())
			show_error($this->email->print_debugger());
			else
			echo 'Your e-mail has been sent!';
	}









    // function upgrade_versi2(){

    // 	$this->db->get_where('tbl_list_voucherproduk',['kode_member' => $this->session->kode_user, 'status_voucher'])
    // }





 }


 ?>