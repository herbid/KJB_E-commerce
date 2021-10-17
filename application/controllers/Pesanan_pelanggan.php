<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class pesanan_pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $params = array('server_key' => 'SB-Mid-server-MucYqwJJoDgQ430_GtgRVGlb', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
        $this->load->model('m_pelanggan');
        $this->load->model('m_transaksi');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_konfigurasi');
        $this->load->model('m_auth');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->library('session');

        $cek_status = $this->m_home->cek_stts();
        
        foreach($cek_status as $value){
            $mdtrans = $this->midtrans->status($value->kode_penjualan);
            $id_penjualan = $mdtrans->order_id;
            $status_transaksi= $mdtrans->transaction_status;


            if(isset($mdtrans->store)){
                $invoice = $mdtrans->store;
                $pembayaran = $mdtrans->payment_code;
            }else{
                foreach($mdtrans->va_numbers as $boking){
                    $invoice = $boking->bank;
                    $pembayaran = $boking->va_number;
                }
            }
            // echo 'RESULT <br><pre>';
            // var_dump($mdtrans);
            // echo '</pre>' ;
        //   die;

            $this->m_transaksi->update_status($id_penjualan,$invoice,$pembayaran,$status_transaksi);
        }
    }
    

    public function index()
    {
        $data = array('title' => 'Pesanan Pelanggan',
                        
                       'isi'=>'v_pesanan_p',  
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
                    
    }

    public function pesanan(){
        $this->login_pelanggan->proteksi_halaman_login();
        $data = array(
            'title' => 'Pesanan',
            'belum_bayar'=>$this->m_transaksi->belum_bayar(),
            'diproses'=>$this->m_transaksi->diproses(),
            'dikirim'=>$this->m_transaksi->dikirim(),
            'diterima'=>$this->m_transaksi->diterima(),
            'isi'=>'v_pesanan'  
     );
     $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    

    public function detail_pesanan()
    {
        $data = array('title' => 'Detail Pesanan',
                        
                       'isi'=>'v_detail_pesanan',  
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
                    
    }


    public function diterima($id_penjualan){

        $data =array(
            'id_penjualan' => $id_penjualan,
         
            'status_order' => '3'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Diterima !');

        redirect('pesanan_pelanggan/pesanan');
    }
}
?>