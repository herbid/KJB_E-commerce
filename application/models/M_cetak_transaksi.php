<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cetak_transaksi extends CI_Model {
	public function view_by_date($date){
		
        $status = "settlement";
       
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');

        $this->db->where('DATE(penjualan.tanggal_beli)', $date); // Tambahkan where tanggal nya

		$this->db->where('penjualan.status_bayar',$status);
        
		return $this->db->get()->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
		$status = "settlement";
       
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');

        $this->db->where('MONTH(penjualan.tanggal_beli)', $month); // Tambahkan where bulan

        $this->db->where('YEAR(penjualan.tanggal_beli)', $year); // Tambahkan where tahun
        
		$this->db->where('penjualan.status_bayar',$status);
        
		return $this->db->get()->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){

		$status = "settlement";
       
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');

        $this->db->where('YEAR(penjualan.tanggal_beli)', $year); // Tambahkan where tahun
        
		$this->db->where('penjualan.status_bayar',$status);

        return $this->db->get()->result();
	}
    
	public function view_all(){

		$status = "settlement";
       
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');

		$this->db->where('penjualan.status_bayar',$status);

        return $this->db->get()->result(); // Tampilkan semua data transaksi
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_beli) AS tahun'); // Ambil Tahun dari field tanggal_beli

        $this->db->from('penjualan'); // select ke tabel transaksi

        $this->db->order_by('YEAR(tanggal_beli)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
		
        $this->db->group_by('YEAR(tanggal_beli)'); // Group berdasarkan tahun pada field tanggal_beli
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}
