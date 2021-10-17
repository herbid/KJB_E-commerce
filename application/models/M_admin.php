<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

public function total_barang(){
    return $this->db->get('barang')->num_rows();    

}
public function total_kategori(){
    return $this->db->get('kategori_barang')->num_rows();    

}
public function tot_pel(){
    return $this->db->get('pelanggan')->num_rows();    

}

// public function tot_pesanan_masuk(){ 
//     return $this->db->get('penjualan')->num_rows(); 
// }

public function tot_pesanan_masuk(){ 
    $query = $this->db->where('status_order', '0')->get('penjualan');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
    $query = $this->db->get()->result();
}

public function data_setting_lok(){
    
    $this->db->select('*');
    $this->db->from('setting');
    $this->db->where('id',1);
    return $this->db->get()->row();
    
}
public function edit($data){
    
    $this->db->where('id', $data['id']);
    $this->db->update('setting', $data);
  
}
public function pendapatan(){
//  $this->db->select('*');
//  $this->db->from('penjualan');
  
    $joko = date('Y');
    $status = "settlement";
    $order = "3";
    $this->db->select('DATE_FORMAT(penjualan.tanggal_beli,"%Y") as tahun,DATE_FORMAT(penjualan.tanggal_beli ,"%M") AS bulan,SUM(penjualan.total_bayar) as total');
    $this->db->from('penjualan');
    $this->db->where('YEAR(penjualan.tanggal_beli)',$joko);
    $this->db->where('penjualan.status_bayar',$status);
    $this->db->where('penjualan.status_order',$order);
    $this->db->group_by('MONTH(penjualan.tanggal_beli)');
    $query = $this->db->get()->result();
    return $query;
}


public function useraktif(){
    //  $this->db->select('*');
    //  $this->db->from('penjualan');
      
        $joko = date('Y');
         // $status = "settlement";
        // $order = "0";
        $this->db->select('DATE_FORMAT(pelanggan.tanggal,"%Y") as tahun,DATE_FORMAT(pelanggan.tanggal ,"%M") AS bulan_user,count(pelanggan.id_pelanggan) as total_user');
        $this->db->from('pelanggan');   
        $this->db->where('YEAR(pelanggan.tanggal)',$joko);
        // $this->db->where('penjualan.status_bayar',$status);
        // $this->db->where('penjualan.status_order',$order);
        $this->db->group_by('MONTH(pelanggan.tanggal)');
        $query = $this->db->get()->result();
        return $query;
    }
public function data_pelanggan(){
    
    $this->db->select('*');
      
      $this->db->from('pelanggan');

      $this->db->order_by('id_pelanggan', 'desc');
      return $this->db->get()->result();
  
}



}