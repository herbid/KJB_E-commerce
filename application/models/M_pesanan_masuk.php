<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model {

  public function pesanan(){
      
    $this->db->select('penjualan.*,

    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');

    $this->db->from('penjualan');
    
    $this->db->where('status_order=0');    

    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');

    $this->db->order_by('id_penjualan', 'desc');

    return $this->db->get()->result();
   
  }

  public function pesanan_diproses(){
      
    $this->db->select('penjualan.*,

    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');

    $this->db->from('penjualan');
    
    $this->db->where('status_order=1');    

    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');

    $this->db->order_by('id_penjualan', 'desc');

    return $this->db->get()->result();
   
  }

  public function pesanan_dikirim(){
      
    $this->db->select('penjualan.*,

    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');

    $this->db->from('penjualan');
    
    $this->db->where('status_order=2');    

    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');

    $this->db->order_by('id_penjualan', 'desc');

    return $this->db->get()->result();
   
  }

  public function pesanan_selesai(){
      
    $this->db->select('penjualan.*,

    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');

    $this->db->from('penjualan');
    
    $this->db->where('status_order=3');    

    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');

    $this->db->order_by('id_penjualan', 'desc');

    return $this->db->get()->result();
   
  }



 public function update_order( $data){
     
    $this->db->where('id_penjualan', $data['id_penjualan']);
    $this->db->update('penjualan', $data);

 }
 
}
