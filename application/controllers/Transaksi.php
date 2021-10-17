<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaksi');
        
    }
    
    public function proses(){
		$data = $this->input->post(null, TRUE);

		if(isset($_POST['pay-button'])){
			// $id_detail_penjualan = "idp".date('y').random_string('alnum',8).date('md');
			$id_pejualan=$this->m_transaksi->add_sale($data);
			$cart = $this->m_transaksi->get_cart()->result();
			$row =[];

			foreach($cart as  $value){
				array_push($row,array(
					// 'id_detail_penjualan'=>$id_detail_penjualan,
					'id_penjualan' => $id_pejualan,
					'id_barang' => $value->id_barang,
					'jumlah' => $value->jumlah,
					'tanggal'=>$this->input->post('tgl'),
				));
			}
			$this->m_transaksi->add_sale_ditail($row);
			$this->m_transaksi->del_cart(['id_pelanggan'=>  $this->session->userdata('id_pelanggan')]);

			if($this->db->affected_rows()>0){
				$params = array("success"=>true);
			}else{
				$params = array("success"=>false);
			}
			echo json_encode($params);
		}
		
	}

}
       

?>