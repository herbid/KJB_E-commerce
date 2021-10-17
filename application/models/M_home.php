<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

  public function get_all_data(){
      
      $this->db->select('*');
      
      $this->db->from('barang');

      $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori', 'left');

      $this->db->order_by('barang.id_barang', 'desc');

      // $this->db->limit($limit,$start);

      return $this->db->get()->result();
   
  }

  
  
  public function add_sale($post,$status,$metode,$tgl_pesan,$pdf){
    $params = array(
        'total_bayar'=>$post['all_total'],
        'kode_penjualan'=>$post['notr'],
        'paket'=>$post['paket'],
        'tanggal_beli'=>$tgl_pesan,
        'alamat'=>$post['alamat'],
        'nohp'=>$post['nohp'],
         'metode_pembayaran'=>$metode,
         'status_bayar'=>$status,
         'pdf'=>$pdf,
         'nama'=>$post['nama'],

        'sub_total'=>$post['sub_total'],
        'provinsi'=>$post['provinsi'],
        'kota'=>$post['kota'],
        'berat_total'=>$post['berat'],
        'estimasi'=>$post['estimasi'],
        'expedisi'=>$post['ekspedisi'],
        'ongkir'=>$post['ongkir_r'],

        'status_order'=>"0",
        // 'no_resi'=>"",

        'id_pelanggan'=> $this->session->userdata('id_pelanggan'),
    );
      $this->db->insert('penjualan',$params);    
       return $this->db->insert_id();
}

public function update_status($id_penjualan,$invoice,$pembayaran,$transaction_status){
    $value=[
        'invoice'=>$invoice,
        'pembayaran'=>$pembayaran,
        'status_bayar'=>$transaction_status,
    ];
    $this->db->where('kode_penjualan',$id_penjualan);
    $query = $this->db->update('penjualan',$value);
    return $query;
  }

  function add_sale_ditail($params){
    $this->db->insert_batch('detail_penjualan',$params);
}

public function del_cart($params = null){
  if($params !=null)
  {
      $this->db->where($params);
  }
  $this->db->delete('keranjang'); 

}
    public function cek_stts(){
      $this->db->select('penjualan.*,
      pelanggan.nama_pelanggan as nmp,
      pelanggan.nohp,
      pelanggan.email,');
      $this->db->from('penjualan');
      $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
      $this->db->where('penjualan.id_pelanggan',$this->session->userdata('id_pelanggan'));
      $cek=$this->db->get()->result();
  return $cek;
}
  public function detailbarang($id_barang){
      
    $this->db->select('barang.*,
    barang.nama_barang,
    kategori_barang.nama_kategori');
    
    $this->db->from('barang');

    
    $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori', 'left');

    $this->db->where('barang.id_barang', $id_barang);
    return $this->db->get()->row();

      
 
}


  public function get_all_data_kategori(){
      
    $this->db->select('*');
    
    $this->db->from('kategori_barang');

    $this->db->order_by('id_kategori', 'desc');

    return $this->db->get()->result();
 
}

  public function kategori($id_kategori){

    $this->db->select('*');
    
    $this->db->from('kategori_barang');

    $this->db->where('id_kategori', $id_kategori);

    return $this->db->get()->row();
 
  }
  public function get_all_data_barang($id_kategori){
      
    $this->db->select('*');
    
    $this->db->from('barang');

    $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori','left');

    $this->db->where('barang.id_kategori', $id_kategori);
    

    return $this->db->get()->result();


 
}

public function gambarbarang($id_barang){
  $this->db->select('*');
  $this->db->from('gambar');
  $this->db->where('id_barang', $id_barang);
  return $this->db->get()->result();
  


  
}

//jumlah item pada keranjang
public function get_nav(){
  $this->db->select('*');
  $this->db->from('keranjang');
  $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
  $query = $this->db->get();
  return $query->result();
}

//jumlah item pada keranjang
public function get_cart(){
  $this->db->select('keranjang.*,
  barang.nama_barang,
  barang.harga,
  barang.berat,
  barang.gambar');
  $this->db->from('keranjang');
  $this->db->join('barang','barang.id_barang = keranjang.id_barang','left');
  $this->db->where('keranjang.id_pelanggan', $this->session->userdata('id_pelanggan'));
  $query = $this->db->get();
  return $query->result();
}

public function pelanggan_k(){
  $this->db->select('*');
  $this->db->from('pelanggan');
  $this->db->where('pelanggan.id_pelanggan', $this->session->userdata('id_pelanggan'));
  $query = $this->db->get();
  return $query->result();

}
public function total_barang(){
  $this->db->select('COUNT(*) AS total');
  $this->db->from('barang');
  // $this->db->where('status_produk', 'Publish');

  $query = $this->db->get();
  return $query->row();

}
}