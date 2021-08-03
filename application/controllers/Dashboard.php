<?php 

    /**
     * 
     */
    class Dashboard extends CI_Controller
    {
        
        function __construct()
        {
           parent:: __construct();
           if ($this->session->userdata('name') == NULL) {
                redirect('ebunga/login');
            }
           $this->load->library('form_validation');
            $this->load->model('m_data');
        }

    function dashboard(){

    $email = $this->session->email;
    $this->db->where('email', $email);
    $this->db->where('status_code', 201);
    $data['jml_invo'] = $this->db->get('tbl_transaksi')->num_rows();
     $this->load->view('template/header2');
     $this->load->view('dashboard/index', $data);
     $this->load->view('template/footer');
    }

    function tambah_member(){


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

                $data['jr'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

             $this->load->view('template/header2');
             $this->load->view('dashboard/tambah_member', $data);
             $this->load->view('template/footer');

         }else {

             $kode = rand(1, 100000);
             $kode_user = "Ebunga-".$kode;

                 $data = [
                     'kode_user' => $kode_user,
                     'name' => $this->input->post('nama'),
                     'username' => $this->input->post('username'),
                     'email' => $this->input->post('email'),
                     'no_telp' => $this->input->post('no_telp'),
                     'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
                     'status' => 0,
                     'kode_jaringan' =>  $this->input->post('kode_founder')."".$this->input->post('kode_jaringan') ,
                     'kode_rule' => $this->input->post('kode_founder'),
                 ];

                 $email = $this->input->post('email');
                 $nama = $this->input->post('nama');
                 // $this->sendEmail($email, $nama, $kode_user);

                 $input = $this->db->insert('tbl_register', $data);
                  $this->session->set_flashdata('message', 'swal("Sukses!!", "Anda Berhasil Mendaftar", "success");');
                         redirect('/ebunga/member'); 

         }



    }


     public function logout(){
        $this->session->unset_userdata('kode_user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('username');

        redirect('ebunga/login ');
    } 


    function produk(){
       
        $data['produk'] = $this->m_data->get('tbl_produk');
        $this->load->view('template/header2');
        $this->load->view('dashboard/produk', $data);
        $this->load->view('template/footer');
    }


    function detail_produk($kode){

        $data['det'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode])->row_array();
         $data['produk'] = $this->m_data->get('tbl_produk');
        $this->load->view('template/header2');
        $this->load->view('dashboard/detail', $data);
        $this->load->view('template/footer');
    }


    function invoices(){
        $data['invo'] = $this->db->get_where('tbl_transaksi',['email'=>$this->session->email])->result_array();

        $data['produk'] = $this->db->get('tbl_produk')->result_array();

        $this->load->view('template/header2');
        $this->load->view('dashboard/invoices', $data);
        $this->load->view('template/footer');

    }

    function jaringan(){

        $kode_jaringan = $this->session->kode_user;

        $data['jml_row'] = $this->db->get('tbl_register')->num_rows();

        // $this->db->like('kode_jaringan', $kode_jaringan);
        // $data['jaringan'] = $this->db->get_where('tbl_register', ['kode_rule' => $kode_jaringan])->result_array();     

        $data['jaringan']  = $this->db->get('tbl_register')->result_array();
       
        $data['produk'] = $this->m_data->get('tbl_produk');
        $this->load->view('template/header2');
        $this->load->view('dashboard/jaringan', $data);
        $this->load->view('template/footer');

    }

     function produk_anda(){

        $invo = $this->db->get_where('tbl_transaksi',['email'=>$this->session->email])->row_array();
        if ($invo == null) {
        $data['produk_anda'] = 0;
            
        }else{
        $kode_produk = $invo['kode_produk'];
        $data['produk_anda'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->result_array();

    }

        $data['produk'] = $this->db->get('tbl_produk')->result_array();
        $this->load->view('template/header2');
        $this->load->view('dashboard/get_produk', $data);
        $this->load->view('template/footer');
    }


    function ecash(){

        $kode_user = $this->session->kode_user;
        $this->db->select_sum('jml_cash');
        $data['jml'] = $this->db->get_where('tbl_cash',['kode_user' => $kode_user])->row_array();

        $data['produk'] = $this->m_data->get('tbl_produk');
        $this->load->view('template/header2');
        $this->load->view('dashboard/ecash', $data);
        $this->load->view('template/footer');
    }


    function cashback(){
        $this->load->view('templateAdmin/header');
        $this->load->view('dashboard/cashback', $data);
        $this->load->view('templateAdmin/footer');
    }


    function sms(){
         $email_api = urlencode("alldii1956@gmail.com");
        $passkey_api = urlencode("Hm123123");
        $no_hp_tujuan = urlencode("083138184143");
        $isi_pesan = urlencode("Coba kirim SMS");

        $url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
        $result = file_get_contents($url);
        $data = explode("~~~", $result);

        echo $data[0]; //1=SUKSES, selain itu GAGAL
        echo $data[1]; //Jumlah Nomor Tujuan Valid
        echo $data[2]; //Jumlah Nomor Tujuan yang dapat dikirim SMS
        echo $data[3]; //Total Kredit yang digunakan
        echo $data[4]; //Sisa Kredit
        echo $data[5]; //Jenis Paket SMS (1=SMS Gratis, 0=SMS Reguler/SMS Center/SMS Masking
    }


    }

 ?>