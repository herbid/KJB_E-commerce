<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konfigurasi');
     
        
    }

    public function index()
    {
        $konfigurasi 	= $this->m_konfigurasi->listing();
        $data = array('title' => 'About',
                        'konfigurasi' => $konfigurasi,
                       'isi'=>'v_about',  
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
                    
    }


    

}

/* End of file Controllername.php */



?>