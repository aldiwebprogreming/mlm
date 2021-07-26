<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-uVr7ZDVJbX1nP28v2KV2Do_-', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		
		// Required
		$harga = $this->input->post('harga');
		$nama_produk = $this->input->post('nama_produk');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $harga,
		  'quantity' => 1,
		  'name' =>$nama_produk,
		);

		

		// Optional
		$item_details = array ($item1_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $name,
		  'last_name'     => "",
		  'email'         => $email,
		  'phone'         => "",
		  // 'billing_address'  => $billing_address,
		  // 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

       public function finish()
    {

    	$name = $this->input->post('name');
    	$email = $this->input->post('email');
    	$nama_produk = $this->input->post('nama_produk');
    	$kode_produk = $this->input->post('kode_produk');
    	$nama_produk = $this->input->post('nama_produk');

    	$result = json_decode($this->input->post('result_data'), true);
    	// echo 'RESULT <br><pre>';
    	// var_dump($result);
    	// echo '</pre>' ;

    	$data = [
    		'order_id' => $result['order_id'],
    		'kode_produk' => $kode_produk,
    		'kode_user' => $this->input->post('kode_user'),
    		'nama_produk' => $nama_produk,
    		'name' => $name,
    		'email' => $email,
    		'total' => $result['gross_amount'],
    		'payment_type' => $result['payment_type'],
    		// 'bank' => $result['va_numbers'][0]['bank'],
    		// 'va_number' => $result['va_numbers'][0]['va_number'],
    		'pdf_url' => $result['pdf_url'],
    		'status_code' => $result['status_code'],
    	];

    	$input = $this->db->insert('tbl_transaksi', $data);

    	if ($input) {


            // input cashbeack 5%, 10%,
            $harga2 = $result['gross_amount'];
            $persen2 = 5 / 100;
            $ecash2 = $persen2 * $harga2;

             $data = [
                        'kode_user' => $this->input->post('kode_user'),
                        'jml_cash' => $ecash2
                        ,
                 ];

            $this->db->insert('tbl_cash', $data);
            // end


            // bonus vendor 0,2 setiap pembelian produk, persen bersifat dinamis dapat di ganti2
            $vendor = $this->db->get('tbl_register', 1)->row_array();
            $persen3 = 0.2 / 100;
            $data = [
                'kode_user' => $vendor['kode_user'],
                'jml_cash' => $persen3 * $result['gross_amount'],
            ];
            $this->db->insert('tbl_cash', $data);
            // end


    		$kode_user = $this->session->kode_user;
    		$dataku =  $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
    		$kode = $dataku['kode_jaringan'];
            $arr = explode (" ",$kode);
            $jm_arr = count($arr);



            if ($jm_arr  == 2) {

                 // $jm = 3;

                for ($i=0; $i < 2 ; $i++) { 

                    
                     if ($i == 0) {

                    $harga = $result['gross_amount'];
                    $persen = 1 / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }else{
                    $harga = $result['gross_amount'];
                    $persen = 0.5 / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }
                }
                
            }elseif ($jm_arr == 1) {
                $jm = 3;

                for ($i=0; $i < 1 ; $i++) { 
                   
                     if ($i == 0) {

                    $harga = $result['gross_amount'];
                    $persen = 1 / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }
                }
            } else {

              

                for ($i=0; $i < 3 ; $i++) { 

                    if ($i == 0) {

                    $harga = $result['gross_amount'];
                    $persen = 1 / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    } elseif ($i == 1) {
                         $harga = $result['gross_amount'];
                        $persen = 0.5 / 100 ;
                        $ecash = $persen * $harga;
                         $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    } else {
                         $harga =  $result['gross_amount'];
                        $persen = 0.1/ 100 ;
                        $ecash = $persen * $harga;

                         $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }
                   
                }
            }

    		redirect('ebunga/invoices');
    	}else {

    		echo "gagal";
    	}


    }

}
