<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('m_home');
        $this->load->model('m_konfigurasi');
    }
    

    public function index()
    {
        $site 		= $this->m_konfigurasi->listing();

		$konfigurasi = $this->m_konfigurasi->listing();
        $data = array('title' =>  $site->namaweb,
                        'barang' => $this->m_home->get_all_data(),
                        'kategori' => $this->m_home->get_all_data_kategori(),
                        'site'		=> $site,
                        'slider_1'	=> $konfigurasi->slider_1,
                        'slider_2'	=> $konfigurasi->slider_2,
                        'slider_3'	=> $konfigurasi->slider_3,
                        'konfigurasi'	=> $konfigurasi,
                       'isi'=>'v_home'  
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
                    
    }

    
  public function detailbarang($id_barang)
    {
        $data = array('title' => 'Detail barang',
                        'gambar' => $this->m_home->gambarbarang($id_barang),
                        'barang' => $this->m_home->detailbarang($id_barang),
                       'isi'=>'v_detailbarang' , 
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
                    
    }


    public function kategori_home()
    {

       	// Ambil data total
			$total				= $this->m_home->total_barang();
			// paginasi start
			$this->load->library('pagination');
			
			// $config['base_url'] 		= base_url().'home/kategori_home/';
			// $config['total_rows'] 		= $total->total;
			// $config['use_page_numbers']	= TRUE;
			// $config['per_page'] 		= 6;
			// $config['uri_segment'] 		= 3;
			// $config['num_links'] 		= 5;
			// $config['full_tag_open']	= '<ul class="pagination">';
			// $config['full_tag_close']	= '</ul>';
			// $config['first_link'] 		= 'First';
			// $config['first_tag_open'] 	= '<li>';
			// $config['first_tag_close'] 	= '</li>';
			// $config['last_link'] 		= 'Last';
			// $config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
			// $config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
			// $config['next_link'] 		= '&gt;';
			// $config['next_tag_open'] 	= '<div>';
			// $config['next_tag_close'] 	= '</div>';
			// $config['prev_link'] 		= '&lt;';
			// $config['prev_tag_open'] 	= '<div>';
			// $config['prev_tag_close'] 	= '</div>';
			// $config['cur_tag_open'] 	= '<b>';
			// $config['cur_tag_close'] 	= '</b>';
			// $config['first_url']		=base_url().'/home/kategori_home/';

			// $this->pagination->initialize($config);
			// // Ambill data produk nya
			// $page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
			// $barang 	= $this->m_home->get_all_data($config['per_page'], $page);

			// //pagination end


        $data = array('title' => 'Kategori Barang',
                        'barang' => $this->m_home->get_all_data(),
                         // 'barang'			=> $barang,
						// 'pagin'				=> $this->pagination->create_links(),
                        'kategori' => $this->m_home->get_all_data_kategori(),

                       'isi'=>'v_kategori_front'  
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
              
    } 

}

/* End of file Controllername.php */
       

?>