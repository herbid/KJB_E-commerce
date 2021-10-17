<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {


    public function add_sale($post){
        $params = array(
            'estimasi'=>$post['estimasi'],
            'ongkir'=>$post['ongkir_r'],
            'total_bayar'=>$post['all_total'],
            'berat_total'=>$post['berat'],
            'sub_total'=>$post['sub_total'],
            'kode_penjualan'=>$post['notr'],
            'kota'=>$post['kota'],
            'provinsi'=>$post['provinsi'],
            'expedisi'=>$post['ekspedisi'],
            'paket'=>$post['paket'],
            'tanggal_beli'=>$post['tgl'],
            'alamat'=>$post['alamat'],
            'nohp'=>$post['nohp'],
            // 'nama'=>$post['nama'],
            // 'metode_pembayaran'=>$metode,
            // 'status_bayar'=>$status,
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

    public function get_cart($params =null){
        $this->db->select('*');
        $this->db->from('keranjang');
        if($params !=null){
            $this->db->where($params);
        }
        $this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
        $query = $this->db->get();
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
    public function del($id){
      $this->db->where('id_keranjang',$id);
      $this->db->delete('keranjang');
  }


  public function belum_bayar(){
    $this->db->select('penjualan.*,
    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');
    $this->db->from('penjualan');
    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
    $this->db->where('penjualan.id_pelanggan',$this->session->userdata('id_pelanggan'));
    $this->db->where('status_order=0');
    $this->db->order_by('id_penjualan', 'desc');
    $cek=$this->db->get()->result();
    return $cek;
  }

  public function diproses(){
    $this->db->select('penjualan.*,
    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');
    $this->db->from('penjualan');
    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
    $this->db->where('penjualan.id_pelanggan',$this->session->userdata('id_pelanggan'));
    $this->db->where('status_order=1');
    $this->db->order_by('id_penjualan', 'desc');
    $cek=$this->db->get()->result();
    return $cek;
  }

  public function dikirim(){
    $this->db->select('penjualan.*,
    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');
    $this->db->from('penjualan');
    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
    $this->db->where('penjualan.id_pelanggan',$this->session->userdata('id_pelanggan'));
    $this->db->where('status_order=2');
    $this->db->order_by('id_penjualan', 'desc');
    $cek=$this->db->get()->result();
    return $cek;
  }

  public function diterima(){
    $this->db->select('penjualan.*,
    pelanggan.nama_pelanggan as nmp,
    pelanggan.nohp,
    pelanggan.email,');
    $this->db->from('penjualan');
    $this->db->join('pelanggan','penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
    $this->db->where('penjualan.id_pelanggan',$this->session->userdata('id_pelanggan'));
    $this->db->where('status_order=3');
    $this->db->order_by('id_penjualan', 'desc');
    $cek=$this->db->get()->result();
    return $cek;
  }

}