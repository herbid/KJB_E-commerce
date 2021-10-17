<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');
         $this->load->model('m_user');
    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data = array('title' => 'Kategori',
        'kategori'=> $this->m_kategori->get_all_data(),
        'isi'=>'v_kategori'  
     );

        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori'),
            
    );    
    $this->m_kategori->add($data);
    $this->session->set_flashdata('pesan', 'kategori Berhasil Di Tambahkan!');
    redirect('kategori');
    }

    //Update one item
    public function edit($id_kategori = NULL )
    {
        $data = array(
            'id_kategori' => $id_kategori, 
            'nama_kategori' => $this->input->post('nama_kategori'),
            
    );    
    $this->m_kategori->edit($data);
    $this->session->set_flashdata('pesan', 'kategori Berhasil Di Edit!');
    redirect('kategori');
    }

    //Delete one item
    public function delete( $id_kategori = NULL )
    {
        $data= array('id_kategori'  => $id_kategori);
        $this->m_kategori->delete($data);
        $error=$this->db->error();
        if ($error['code']!=0) {
            $this->session->set_flashdata('error', 'Kategori Barang Sedang Di Gunakan!');
        }

        else  {
     
        $this->session->set_flashdata('pesan', 'Kategori Berhasil Di Hapus!');
       
        }

        redirect('kategori');
    }
}

/* End of file kategori.php */



?>