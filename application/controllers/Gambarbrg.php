<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarbrg extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_gambarbrg');
         $this->load->model('m_user');
        $this->load->model('m_barang');
        
    }
    


    public function index()
    {
        $data = array('title' => 'Gambar Barang',
                        'gambarbrg' =>$this->m_gambarbrg->get_all_data(),
                       'isi'=>'gambarbrg/v_indek_gambar'  ,
                    );
        
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
             
        
    }
    
        // Add a new item
     public function add($id_barang)
    {   
     $this->form_validation->set_rules(
     'keterangan', 
     'Keterangan Gambar Barang', 
     'required',
     array('required'=>'%s Mohon Untuk Mengisi !!'));
        

    
    if ($this->form_validation->run() == TRUE) {
        $config['upload_path'] = './assets/gambarbrg/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
        $config['max_size']     = '2000';
        $this->upload->initialize($config);
        $field_name = "gambar";

     if (!$this->upload->do_upload($field_name)) {
        $data = array('title' => 'Tambah Gambar Barang',
        'error_upload' => $this->upload->display_errors(),
        'barang' => $this->m_barang->get_data($id_barang),
        'gambar'=>$this->m_gambarbrg->get_gambar($id_barang),
        'isi'=>'gambarbrg/v_tambah_gambar',
    );

    $this->load->view('layout/v_wrapper_backend', $data, FALSE);

     }else{
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/gambarbrg/'. $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data =array(
                    'id_barang'=> $id_barang,
                    'keterangan' => $this->input->post('keterangan'),
                    'gambar' => $upload_data['uploads']['file_name'], 
            );
            $this->m_gambarbrg->add($data);
            $this->session->set_flashdata('pesan', 'Gambar Berhasil Di Tambahkan!');
            redirect('gambarbrg/add/' .$id_barang);
     }

} 

            $data = array(
                'title' => 'Tambah Gambar Barang',
                'barang' => $this->m_barang->get_data($id_barang),
                'gambar'=>$this->m_gambarbrg->get_gambar($id_barang),
                'isi'=>'gambarbrg/v_tambah_gambar',
            );

            $this->load->view('layout/v_wrapper_backend', $data, FALSE);

        }
    
     
        
    public function delete( $id_barang, $id_gambar )
    {

        //hapus gambar
        $gambar =  $this->m_gambarbrg->get_data($id_gambar); 
        if ($gambar->gambar != "") {
            unlink('./assets/gambarbrg/' . $gambar->gambar);
        }

        $data = array('id_gambar' => $id_gambar);   
        $this->m_gambarbrg->delete($data);
        $this->session->set_flashdata('pesan', 'Gambar Berhasil Di Hapus');
        redirect('gambarbrg/add/' . $id_barang);

         
    }
    
    
    /* End of file Controllername.php */
    
    

}

/* End of file Controllername.php */
       

?>