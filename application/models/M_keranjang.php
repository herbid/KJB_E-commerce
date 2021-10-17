<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_keranjang extends CI_Model {

public function add_cart($data){
    $query = $this->db->query("SELECT MAX(id_keranjang) AS no_tran FROM keranjang");
       
    if($query->num_rows()>0){
        $row = $query->row();
        $no_tran = ((int)$row->no_tran) + 1;
    }else{
       $no_tran ="1";
    }
    $params = array(
        'id_keranjang'=> $no_tran,
        'id_barang' => $data['id_barang'],
        'jumlah' => $data['jumlah'],
        'total' => ($data['harga'] * $data['jumlah']),
        'total_berat' => ($data['berat'] * $data['jumlah']),
        'id_pelanggan'=>$this->session->userdata('id_pelanggan'),
    );  
    $this->db->insert('keranjang',$params); 
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

function update_cart_jml($post){
    $sql = "UPDATE keranjang SET
            jumlah = jumlah + '$post[jumlah]',
            total ='$post[harga]'*jumlah,
            total_berat ='$post[berat]'*jumlah
            WHERE id_barang = '$post[id_barang]'";
            $this->db->query($sql);
}

function edit_cart($post){
    $params = array(
        'jumlah'=>$post['jumlah'],
    );
    $this->db->where('id_keranjang',$post['id_keranjang']);
    $this->db->update('keranjang',$params);
}



public function get_all_cart(){
    $this->db->select('keranjang.*,
    barang.nama_barang,
    barang.harga,
    barang.berat,
    barang.gambar,');
    $this->db->from('keranjang');
    $this->db->join('barang','barang.id_barang = keranjang.id_barang','left');
    $this->db->where('keranjang.id_pelanggan', $this->session->userdata('id_pelanggan'));
    $query = $this->db->get();
    return $query->result();
  }

  public function del($id){
      $this->db->where('id_keranjang',$id);
      $this->db->delete('keranjang');
  }
  public function delkontollllll(){
    $this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'));
    $this->db->delete('keranjang');
  }

}