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

             $this->load->view('template/header2');
             $this->load->view('dashboard/tambah_member');
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
                     'kode_jaringan' => $this->input->post('kode_founder'),
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

        $this->load->view('template/header');
        $this->load->view('dashboard/invoices', $data);
        $this->load->view('template/footer');

    }

    function jaringan(){

        $kode_jaringan = $this->session->kode_user;
        $data['jaringan'] = $this->db->get_where('tbl_register',['kode_jaringan' => $kode_jaringan])->result_array();

        // var_dump($data);
          $data['produk'] = $this->m_data->get('tbl_produk');
        $this->load->view('template/header2');
        $this->load->view('dashboard/jaringan', $data);
        $this->load->view('template/footer');

    }


    }

 ?>