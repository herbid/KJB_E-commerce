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
        $params = array('server_key' => 'SB-Mid-server-MucYqwJJoDgQ430_GtgRVGlb', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('m_konfigurasi');
		$this->load->model('m_home');
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		
			$no_trans = $this->input->post('notr');
		$total = $this->input->post('all_total');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
	// Required
	$transaction_details = array(
		'order_id' => $no_trans,
		'gross_amount' => $total, // no decimal allowed for creditcard
	  );

	//   // Optional
	//   $item1_details = array(
	// 	'id' => 'a1',
	// 	'price' => 18000,
	// 	'quantity' => 3,
	// 	'name' => "Apple"
	//   );

	//   // Optional
	//   $item2_details = array(
	// 	'id' => 'a2',
	// 	'price' => 20000,
	// 	'quantity' => 2,
	// 	'name' => "Orange"
	//   );

	//   // Optional
	//   $item_details = array ($item1_details, $item2_details);



	  // Optional
	  $customer_details = array(
		'first_name'    => $nama,
		'last_name'     => "",
		'email'         => $email,
		'phone'         => $nohp,
		'billing_address'  => "",
		'shipping_address' => ""
	  );

	  // Data yang akan dikirim untuk request redirect_url.
	  $credit_card['secure'] = true;
	  //ser save_card true to enable oneclick or 2click
	  //$credit_card['save_card'] = true;

	  $time = time();
	  $custom_expiry = array(
		  'start_time' => date("Y-m-d H:i:s O",$time),
		  'unit' => 'day', 
		  'duration'  => 1
	  );
	  
	  $transaction_data = array(
		  'transaction_details'=> $transaction_details,
		  'item_details'       => "",
		  'customer_details'   => $customer_details,
		  'credit_card'        => $credit_card,
		  'expiry'             => $custom_expiry
	  );

	  error_log(json_encode($transaction_data));
	  $snapToken = $this->midtrans->getSnapToken($transaction_data);
	  error_log($snapToken);
	  echo $snapToken;
	}
	// public function finish()
    // {
	// 		$result = json_decode($this->input->post('result_data'));
	// 		echo 'RESULT <br><pre>';
	// 		var_dump($result);
	// 		echo '</pre>' ;

    // }

    public function finish()
    {
		$data = $this->input->post(null, TRUE);
    	$result = json_decode($this->input->post('result_data'),TRUE);
	

		$status = $result['transaction_status'];
		$metode = $result['payment_type'];
		$tgl_pesan = $result['transaction_time'];
		$pdf = $result['pdf_url'];

		$id_pejualan=$this->m_home->add_sale($data,$status,$metode,$tgl_pesan,$pdf);

		$cart = $this->m_home->get_cart();
		$row =[];

		foreach($cart as  $value){
			array_push($row,array(
				'id_penjualan' => $id_pejualan,
				'id_barang' => $value->id_barang,
				'jumlah' => $value->jumlah,
				'tanggal'=>$tgl_pesan,
			));
		}
			$this->m_home->add_sale_ditail($row);
			// echo 'RESULT <br><pre>';
			// var_dump($result);
			// echo '</pre>' ;
			// die;
			$this->m_home->del_cart(['id_pelanggan'=>  $this->session->userdata('id_pelanggan')]);
    
			echo"<script>alert('Transaksi Sukses');window.location='".site_url('pesanan_pelanggan/pesanan')."';</script>";
		
	

    }
	// public function token()
    // {
				
	// 	$no_trans = $this->input->post('kode_penjualan');
	// 	$total = $this->input->post('total_bayar');
	// 	$nama = $this->input->post('nama_pelanggan');
	// 	$email = $this->input->post('email');
	// 	$nohp = $this->input->post('nohp');
	// //	$kode_trx = $this->input->post('kode_trx');
	// 	// $ah = $this->input->post('ah');
	// 	// $email = $this->input->post('email');
	// 	// $nohp = $this->input->post('nohp');
	// 	// $nama = $this->input->post('nama');
	// 	// // Required
	// 	$transaction_details = array(
	// 	  'order_id' =>$no_trans,
	// 	  'gross_amount' =>$total, // no decimal allowed for creditcard
	// 	);

	// 	// Optional
	// 	$customer_details = array(
	// 	  'first_name'    => "$nama",
	// 	  'last_name'     => "",
	// 	  'email'         => $email,
	// 	  'phone'         => "$nohp",
	// 	  'billing_address'  => "",
	// 	  'shipping_address' => ""
	// 	);

	// 	// Data yang akan dikirim untuk request redirect_url.
    //     $credit_card['secure'] = true;
    //     //ser save_card true to enable oneclick or 2click
    //     //$credit_card['save_card'] = true;

    //     $time = time();
    //     $custom_expiry = array(
    //         'start_time' => date("Y-m-d H:i:s O",$time),
    //         'unit' => 'minute', 
    //         'duration'  => 2
    //     );
        
    //     $transaction_data = array(
    //         'transaction_details'=> $transaction_details,
    //         'item_details'       => "",
    //         'customer_details'   => $customer_details,
    //         'credit_card'        => $credit_card,
    //         'expiry'             => $custom_expiry
    //     );

	// 	error_log(json_encode($transaction_data));
	// 	$snapToken = $this->midtrans->getSnapToken($transaction_data);
	// 	error_log($snapToken);
	// 	echo $snapToken;
    // }

    // public function finish()
    // {


	// 		$data = $this->input->post(null, TRUE);
    // 	$result = json_decode($this->input->post('result_data'),TRUE);
	// 	$status = $result['transaction_status'];
	// 	$metode = $result['payment_type'];
	// 	$tgl_pesan = $result['transaction_time'];
	// 	$id_pejualan=$this->m_home->add_sale($data,$status,$metode,$tgl_pesan);

	// 	$cart = $this->m_home->get_cart()->result();
	// 	$row =[];

	// 	foreach($cart as  $value){
	// 		array_push($row,array(
	// 			'id_penjualan' => $id_pejualan,
	// 			'id_barang' => $value->id_barang,
	// 			'jumlah' => $value->jumlah,
	// 			'tanggal'=>$tgl_pesan,
	// 		));
	// 	}
	// 		$this->m_home->add_sale_ditail($row);
	// 		$this->m_home->del_cart(['id_pelanggan'=>  $this->session->userdata('id_pelanggan')]);
    
	// 		echo"<script>alert('Transaksi Sukses');window.location='".site_url('pelanggan/akunsaya')."';</script>";
		
	
	// 	// echo 'RESULT <br><pre>';
    // 	// var_dump($result);
    // 	// echo '</pre>' ;

	
    // }

   
}
