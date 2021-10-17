<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_lap');
         $this->load->model('m_user');
        
    }

    public function index()
    {
        $data = array('title' => 'Laporan Penjualan',
                        
                       'isi'=>'v_laporan'  
                    );
        
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                    
    }
    public function harian(){

        $tanggal =$this->input->post('tanggal');
        $bulan =$this->input->post('bulan');
        $tahun =$this->input->post('tahun');

        $data = array('title' => 'Laporan Harian',
                        'tanggal' => $tanggal,   
                        'bulan' => $bulan, 
                        'tahun' => $tahun,
                        'laporan' => $this->m_lap->laporan_hari($tanggal,$bulan,$tahun),      
                       'isi'=>'v_lapor_har'  
         );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
  
    public function bulanan(){

        $bulan =$this->input->post('bulan');
        $tahun =$this->input->post('tahun');

        $data = array('title' => 'Laporan Bulanan',
                        
                        'bulan' => $bulan, 
                        'tahun' => $tahun,
                        'laporan' => $this->m_lap->laporan_bulan($bulan,$tahun),      
                        'isi'=>'v_lapor_bul'  
         );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function tahunan(){

 
        $tahun =$this->input->post('tahun');

        $data = array('title' => 'Laporan Tahunan',
                        
                         
                        'tahun' => $tahun,
                        'laporan' => $this->m_lap->laporan_tahun($tahun),      
                        'isi'=>'v_lapor_tah'  
         );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
}

/* End of file Laporan.php */

?>