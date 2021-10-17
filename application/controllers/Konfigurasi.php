<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konfigurasi');
         $this->load->model('m_user');
        
        
    }

    public function index()
    {
        $konfigurasi 	= $this->m_konfigurasi->listing();
		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','nama_website','required',
				array(	'required'		=> '%s Harus Di Isi!'));

		if($valid->run()===FALSE) {
		// End validasi
		$data = array(	'title'			=> 'Konfigurasi Website',
						'konfigurasi'	=> $konfigurasi,
						'isi'			=> 'konfigurasi/v_konfigurasi_umum'
					);
                    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
		// masuk database
		}else{
			$i 		= $this->input;
			$data 	= array('id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
							'namaweb'				=> $i->post('namaweb'),
		
							'email'					=> $i->post('email'),
							'telepon'				=> $i->post('telepon'),
							'alamat'				=> $i->post('alamat'),
							'facebook'				=> $i->post('facebook'),
							'instagram'				=> $i->post('instagram'),
							
							);
			$this->m_konfigurasi->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah Update.');
            redirect('konfigurasi  ');

			}
    }


    // Konfigurasi slider1 website
	public function slider_1(){
		$konfigurasi = $this->m_konfigurasi->listing();
		// validasi input
		$valid = $this->form_validation;
		$valid->set_rules('namaweb','Nama Website','required',
				array(	'required'		=> '%s Harus Di Isi!'));
                if ($this->form_validation->run() == TRUE) {
                    $config['upload_path'] = './assets/slider/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                    $config['max_size']     = '2000';
                    $this->upload->initialize($config);
                    $field_name = "slider_1";
            
                if (!$this->upload->do_upload($field_name)) {
                    $data = array('title' => 'Konfigurasi Slider Beranda 1 Website',
                        
                    'konfigurasi'	=> $konfigurasi,
				    'error'		=> $this->upload->display_errors(),
                    
                    'isi'=>'konfigurasi/slider_1',  
                 );
            
                    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                 }else{
                    //hapus_gambar
                    
                    if ($konfigurasi->slider_1 != "") {
                        unlink('./assets/slider/' . $konfigurasi->slider_1);
            
            
                    }
                    //end hapus barang 
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/slider/'. $upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);
            
                        $data =array(
                        'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
						'namaweb'		=> $this->input->post('namaweb'),
                        'slider_1' => $upload_data['uploads']['file_name'], 
                        );
                        $this->m_konfigurasi->edit($data);
                        $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                        redirect(base_url('konfigurasi/slider_1'),'refresh');
                         }
            
                        $data =array(
                            'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
							'namaweb'		=> $this->input->post('namaweb')	
                          
                            
                    );
                        $this->m_konfigurasi->edit($data);
                        $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                        redirect(base_url('konfigurasi/slider_1'),'refresh');
            
                    } 
			// end masuk database
			$data = array(	'title'		=> 'Konfigurasi Slider Beranda 1 Website',
							'konfigurasi'	=> $konfigurasi,
							'isi'		=> 'konfigurasi/slider_1'
						);
			 $this->load->view('layout/v_wrapper_backend', $data, FALSE);		
		}


        public function slider_2(){
            $konfigurasi = $this->m_konfigurasi->listing();
            // validasi input
            $valid = $this->form_validation;
            $valid->set_rules('namaweb','Nama Website','required',
                    array(	'required'		=> '%s Harus Di Isi!'));
                    if ($this->form_validation->run() == TRUE) {
                        $config['upload_path'] = './assets/slider/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                        $config['max_size']     = '2000';
                        $this->upload->initialize($config);
                        $field_name = "slider_2";
                
                    if (!$this->upload->do_upload($field_name)) {
                        $data = array('title' => 'Konfigurasi Slider Beranda 2 Website',
                            
                        'konfigurasi'	=> $konfigurasi,
                        'error'		=> $this->upload->display_errors(),
                        
                        'isi'=>'konfigurasi/slider_2',  
                     );
                
                        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                     }else{
                        //hapus_gambar
                        
                        if ($konfigurasi->slider_2 != "") {
                            unlink('./assets/slider/' . $konfigurasi->slider_2);
                
                
                        }
                        //end hapus barang 
                            $upload_data = array('uploads' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = './assets/slider/'. $upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);
                
                            $data =array(
                            'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                            'namaweb'		=> $this->input->post('namaweb'),
                            'slider_2' => $upload_data['uploads']['file_name'], 
                            );
                            $this->m_konfigurasi->edit($data);
                            $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                            redirect(base_url('konfigurasi/slider_2'),'refresh');
                             }
                
                            $data =array(
                                'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                                'namaweb'		=> $this->input->post('namaweb')	
                              
                                
                        );
                            $this->m_konfigurasi->edit($data);
                            $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                            redirect(base_url('konfigurasi/slider_2'),'refresh');
                
                        } 
                // end masuk database
                $data = array(	'title'		=> 'Konfigurasi Slider Beranda 1 Website',
                                'konfigurasi'	=> $konfigurasi,
                                'isi'		=> 'konfigurasi/slider_2'
                            );
                 $this->load->view('layout/v_wrapper_backend', $data, FALSE);		
            }
    
      public function slider_3(){
            $konfigurasi = $this->m_konfigurasi->listing();
            // validasi input
            $valid = $this->form_validation;
            $valid->set_rules('namaweb','Nama Website','required',
                    array(	'required'		=> '%s Harus Di Isi!'));
                    if ($this->form_validation->run() == TRUE) {
                        $config['upload_path'] = './assets/slider/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                        $config['max_size']     = '2000';
                        $this->upload->initialize($config);
                        $field_name = "slider_3";
                
                    if (!$this->upload->do_upload($field_name)) {
                        $data = array('title' => 'Konfigurasi Slider Beranda 1 Website',
                            
                        'konfigurasi'	=> $konfigurasi,
                        'error'		=> $this->upload->display_errors(),
                        
                        'isi'=>'konfigurasi/slider_3',  
                     );
                
                        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                     }else{
                        //hapus_gambar
                        
                        if ($konfigurasi->slider_3 != "") {
                            unlink('./assets/slider/' . $konfigurasi->slider_3);
                
                
                        }
                        //end hapus barang 
                            $upload_data = array('uploads' => $this->upload->data());
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = './assets/slider/'. $upload_data['uploads']['file_name'];
                            $this->load->library('image_lib', $config);
                
                            $data =array(
                            'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                            'namaweb'		=> $this->input->post('namaweb'),
                            'slider_3' => $upload_data['uploads']['file_name'], 
                            );
                            $this->m_konfigurasi->edit($data);
                            $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                            redirect(base_url('konfigurasi/slider_3'),'refresh');
                             }
                
                            $data =array(
                                'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                                'namaweb'		=> $this->input->post('namaweb')	
                              
                                
                        );
                            $this->m_konfigurasi->edit($data);
                            $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                            redirect(base_url('konfigurasi/slider_3'),'refresh');
                
                        } 
                // end masuk database
                $data = array(	'title'		=> 'Konfigurasi Slider Beranda 1 Website',
                                'konfigurasi'	=> $konfigurasi,
                                'isi'		=> 'konfigurasi/slider_3'
                            );
                 $this->load->view('layout/v_wrapper_backend', $data, FALSE);		
            }
    
            public function kontak(){
                $konfigurasi = $this->m_konfigurasi->listing();
                // validasi input
                $valid = $this->form_validation;
                $valid->set_rules('namaweb','Nama Website','required',
                        array(	'required'		=> '%s Harus Di Isi!'));
                        if ($this->form_validation->run() == TRUE) {
                            $config['upload_path'] = './assets/banner/';
                            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                            $config['max_size']     = '2000';
                            $this->upload->initialize($config);
                            $field_name = "kontak";
                    
                        if (!$this->upload->do_upload($field_name)) {
                            $data = array('title' => 'Konfigurasi banner Beranda 1 Website',
                                
                            'konfigurasi'	=> $konfigurasi,
                            'error'		=> $this->upload->display_errors(),
                            
                            'isi'=>'konfigurasi/kontak',  
                         );
                    
                            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                         }else{
                            //hapus_gambar
                            
                            if ($konfigurasi->kontak != "") {
                                unlink('./assets/banner/' . $konfigurasi->kontak);
                    
                    
                            }
                            //end hapus barang 
                                $upload_data = array('uploads' => $this->upload->data());
                                $config['image_library'] = 'gd2';
                                $config['source_image'] = './assets/banner/'. $upload_data['uploads']['file_name'];
                                $this->load->library('image_lib', $config);
                    
                                $data =array(
                                'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                                'namaweb'		=> $this->input->post('namaweb'),
                                'kontak' => $upload_data['uploads']['file_name'], 
                                );
                                $this->m_konfigurasi->edit($data);
                                $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                                redirect(base_url('konfigurasi/kontak'),'refresh');
                                 }
                    
                                $data =array(
                                    'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                                    'namaweb'		=> $this->input->post('namaweb')	
                                  
                                    
                            );
                                $this->m_konfigurasi->edit($data);
                                $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                                redirect(base_url('konfigurasi/kontak'),'refresh');
                    
                            } 
                    // end masuk database
                    $data = array(	'title'		=> 'Konfigurasi banner Beranda 1 Website',
                                    'konfigurasi'	=> $konfigurasi,
                                    'isi'		=> 'konfigurasi/kontak'
                                );
                     $this->load->view('layout/v_wrapper_backend', $data, FALSE);		
                }

                public function about(){
                    $konfigurasi = $this->m_konfigurasi->listing();
                    // validasi input
                    $valid = $this->form_validation;
                    $valid->set_rules('namaweb','Nama Website','required',
                            array(	'required'		=> '%s Harus Di Isi!'));
                            if ($this->form_validation->run() == TRUE) {
                                $config['upload_path'] = './assets/banner/';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                                $config['max_size']     = '2000';
                                $this->upload->initialize($config);
                                $field_name = "about";
                        
                            if (!$this->upload->do_upload($field_name)) {
                                $data = array('title' => 'Konfigurasi banner Beranda 1 Website',
                                    
                                'konfigurasi'	=> $konfigurasi,
                                'error'		=> $this->upload->display_errors(),
                                
                                'isi'=>'konfigurasi/about',  
                             );
                        
                                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                             }else{
                                //hapus_gambar
                                
                                if ($konfigurasi->about != "") {
                                    unlink('./assets/banner/' . $konfigurasi->about);
                        
                        
                                }
                                //end hapus barang 
                                    $upload_data = array('uploads' => $this->upload->data());
                                    $config['image_library'] = 'gd2';
                                    $config['source_image'] = './assets/banner/'. $upload_data['uploads']['file_name'];
                                    $this->load->library('image_lib', $config);
                        
                                    $data =array(
                                    'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                                    'namaweb'		=> $this->input->post('namaweb'),
                                    'about' => $upload_data['uploads']['file_name'], 
                                    );
                                    $this->m_konfigurasi->edit($data);
                                    $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                                    redirect(base_url('konfigurasi/about'),'refresh');
                                     }
                        
                                    $data =array(
                                        'id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                                        'namaweb'		=> $this->input->post('namaweb')	
                                      
                                        
                                );
                                    $this->m_konfigurasi->edit($data);
                                    $this->session->set_flashdata('pesan', 'Barang Berhasil Di Edit!');
                                    redirect(base_url('konfigurasi/about'),'refresh');
                        
                                } 
                        // end masuk database
                        $data = array(	'title'		=> 'Konfigurasi banner Beranda 1 Website',
                                        'konfigurasi'	=> $konfigurasi,
                                        'isi'		=> 'konfigurasi/about'
                                    );
                         $this->load->view('layout/v_wrapper_backend', $data, FALSE);		
                    }
}

/* End of file Konfigurasi.php */


?>