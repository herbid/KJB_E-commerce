<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

    public function register($data){

        
    $this->db->insert('pelanggan', $data);
        
    }

 
    public function detail($id_pelanggan){
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->row();
	}
	public function edit($data){
		
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}

	public function tot_belumbayar(){
		
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('status_order','0');
		$this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
		return $this->db->get()->num_rows(); 
	
	}
	public function tot_diproses(){
		
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('status_order','1');
		$this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
		return $this->db->get()->num_rows(); 
	
	}
	public function tot_dikirim(){
		
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('status_order','2');
		$this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
		return $this->db->get()->num_rows(); 
	
	}

	public function tot_selesai(){
		
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('status_order','3');
		$this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
		return $this->db->get()->num_rows(); 
	
	}
    
}

/* End of file ModelName.php */
