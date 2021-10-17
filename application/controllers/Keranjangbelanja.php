<?php

// use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjangbelanja extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konfigurasi');
        $this->load->model('m_keranjang');
      
        
    }
      

    public function index(){
        $addkeranjang = $this->m_keranjang->get_all_cart(); 
        if ($addkeranjang==null) {
            redirect('home');
        }


        $data = array('title' => 'Keranjang Belanja',
        'barang' => $this->m_keranjang->get_all_cart(),

       'isi'=>'v_keranjangbelanja'  
    );

        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
                    
    }

    public function add(){
        $redirect_page= $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
            // 'options' => array('Size' => 'L', 'Color' => 'Red')
    );
    
    $this->cart->insert($data);
    
    redirect($redirect_page,'refresh');
    
    }


    function edit(){
	$data = $this->input->post(null, TRUE);
	if(isset($_POST['edit_c'])){
		$this->m_keranjang->edit_cart($data);

		if($this->db->affected_rows()>0){
			$params = array("success"=>true);
		}else{
			$params = array("success"=>false);
		}
		echo json_encode($params);
	}
    }
    
    public function update()
	{	
		$i = 1;
		foreach ($this->m_home->get_cart() as $items)
		{	
			$data = array(
				'id_keranjang' => $items['id_keranjang'],
				'qty'   => $this->input->post($i.'[qty]'),
			);
			$this->cart->update_cart_jml($data);
			$i++;
		}
		redirect('keranjangbelanja');	
	}


    public function delete()
    {
        $this->m_keranjang->dels();
     //   $this->db->empty_table('my_table');
    //    if($rowid){
	// 		// hapus per item
	// 		$this->cart->remove($rowid);
	// 		$this->session->set_flashdata('sukses', 'item berhasil dihapus');
	// 		redirect(base_url('keranjangbelanja'),'refresh');
	// 	}else{
			// Hapus all
			// $this->session->sess_destroy();
			// $this->session->set_flashdata('sukses', 'Keranjang belanja dikosongkan');
			redirect(base_url('keranjangbelanja'),'refresh');
		// }	
        
    }

    public function del($id){
        $this->m_keranjang->del($id);
	
            $error = $this->db->error();
            if($error['code']!=0){
                $this->session->set_flashdata('error','Data Tidak Dapat Dihapus ( Data Kategori Terpakai )');
            }
            else{
                $this->session->set_flashdata('succses','Barang Berhasil Di Hapus');
            }
                echo "<script> window.location='".site_url('keranjangbelanja')."'; </script>";
    }



    public function checkout(){
        $this->login_pelanggan->proteksi_halaman_login();
        $data = array(
                'title' =>'Checkout',
                'barang' => $this->m_keranjang->get_all_cart(),
                'isi'=>'v_checkout'  
        );

        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }


    public function proses_keranjang(){
    //    $cekbasket=$this->login_pelanggan->proteksi_halaman_login();

        // if ($cekbasket) {
        //         redirect(base_url('pelanggan/login'),'refresh');
        // $this->login_pelanggan->proteksi_halaman_login();

        $data = $this->input->post(null, TRUE);
        if ($this->session->userdata('id_pelanggan') == null) {
            echo json_encode(array('status'=> 'blmlogin'));
        //    alert("klklkl");
        }
		else if(isset($_POST['add_cart'])){
			
			$id_barang = $this->input->post('id_barang');
            
            
			$cek_add_in = $this->m_keranjang->get_cart(['keranjang.id_barang' => $id_barang])->num_rows();
            
            if($cek_add_in > 0) {

                
                $this->m_keranjang->update_cart_jml($data);
			}else{
				$this->m_keranjang->add_cart($data);
			}		if($this->db->affected_rows()>0){
                
				$params = array("success"=>true);
			}else{
				$params = array("success"=>false);
			}
			echo json_encode($params);

            
        }
           
       
     
            
          	
        

			

		
              
		}
        
    // }
    
}