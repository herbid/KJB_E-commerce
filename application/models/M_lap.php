<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_lap extends CI_Model {

    public function laporan_hari($tanggal,$bulan,$tahun){

        
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');
        
        $this->db->where('DAY(penjualan.tanggal_beli)', $tanggal);
        
        $this->db->where('MONTH(penjualan.tanggal_beli)', $bulan);

        $this->db->where('YEAR(penjualan.tanggal_beli)', $tahun);

        return $this->db->get()->result();
        
    }

    public function laporan_bulan($bulan,$tahun){
       
        $status = "settlement";
       
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');
        
        
        $this->db->where('MONTH(penjualan.tanggal_beli)', $bulan);

        $this->db->where('YEAR(penjualan.tanggal_beli)', $tahun);
    
        $this->db->where('penjualan.status_bayar',$status);

        return $this->db->get()->result();
        
    }


    public function laporan_tahun($tahun){
       
        $status = "settlement";
        $this->db->select('*');
        
        $this->db->from('detail_penjualan');
        
        $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan', 'left');
        
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left');

        $this->db->where('YEAR(penjualan.tanggal_beli)', $tahun);
    
        $this->db->where('penjualan.status_bayar',$status);

        return $this->db->get()->result();
        
    }
}

/* End of file ModelName.php */

?>