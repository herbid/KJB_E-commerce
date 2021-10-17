<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        $this->load->model('m_konfigurasi');
        $this->load->model('m_user');
        // $this->load->library(['nexmo']);
        
    }
    

    public function index()
    {
        $data = array('title' => 'Dashboard Admin',
                        'total_barang' => $this->m_admin->total_barang(),
                        'total_kategori' => $this->m_admin->total_kategori(),
                        'tot_pesanan_masuk' => $this->m_admin->tot_pesanan_masuk(),
                        'tot_pel'=>$this->m_admin->tot_pel(),
                        'useraktif'=> $this->m_admin->useraktif(),
                        'pendapatan'=> $this->m_admin->pendapatan(),
                        // 'user'=> $this->m_user->get_all_data(),
                       'isi'=>'v_admin'  
                    );
        
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
                    
    }


    public function nohp()
    {
        $data = array('title' => 'Dashboard Admin',
                        'total_barang' => $this->m_admin->total_barang(),
                        'total_kategori' => $this->m_admin->total_kategori(),
                        'tot_pesanan_masuk' => $this->m_admin->tot_pesanan_masuk(),
                        'tot_pel'=>$this->m_admin->tot_pel(),
                        'useraktif'=> $this->m_admin->useraktif(),
                        'pendapatan'=> $this->m_admin->pendapatan(),
                    //    'isi'=>'v_nohp_ver'  
                    );
        
                    $this->load->view('v_nohp_ver', $data, FALSE);
                    
    }

    public function vernohp(){
        $this->form_validation->set_rules('nohp', 'No Telepon', 'required', array(
            'required'=> '%s Silahkan isi Username terlebih dahulu !!'
        ));
    
        if ($this->form_validation->run() == false) {
            $data = array(	'title'		=> 'RESET Password',
                            'isi'		=> 'v_resetpass'
                    );
            $this->load->view('v_reset_user', $data, false);
        } else {
            $data = array(
                
                'nohp' => $this->input->post('nohp'),
            );
                                // send_sms
                $response = $this->nexmo->verify()->start([
                    'from'=>'codot',
                    'to' => '6289673363150',
                    'text' => 'asu world'
                    
                ]);

                
                if ($response === false) {
                    echo '<h1>Error</h1>';
                    var_dump($this->nexmo->get_error());
                } else {
                    echo '<h1>Success</h1>';
                    var_dump($response);
                }
                        }
    }

    public function set_lokasi()
    {

    $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required',array(
           'required' => '%s Mohon Di Isi Terlebih Dahulu !!'     
    ));

    $this->form_validation->set_rules('kota', 'Kota', 'required',array(
        'required' => '%s Mohon Di Isi Terlebih Dahulu !!'     
    ));

    $this->form_validation->set_rules('alamat', 'Alamat Toko', 'required',array(
    'required' => '%s Mohon Di Isi Terlebih Dahulu !!'     
    ));

    $this->form_validation->set_rules('nohp', 'No Telpon', 'required',array(
        'required' => '%s Mohon Di Isi Terlebih Dahulu !!'     
    ));
        
    if ($this->form_validation->run()==false ) {
        $data = array('title' => 'Setting',
                        'setting'=> $this->m_admin->data_setting_lok(),
                       'isi'=>'v_setting'  
                    );
        
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }else{
        $data = array(
            'id' => 1, 
            'lokasi' => $this->input->post('kota'),
            'nama_toko' => $this->input->post('nama_toko'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
    );    
    $this->m_admin->edit($data);
    $this->session->set_flashdata('pesan', 'Setting Berhasil Di Ubah!');
    redirect('admin/set_lokasi');
    }
              
    }

    public function pesanan_masuk(){

        $data = array('title' => 'Pesanan Masuk',
                        'pesanan'=>$this->m_pesanan_masuk->pesanan(),
                        'pesanan_diproses'=>$this->m_pesanan_masuk->pesanan_diproses(),
                        'pesanan_dikirim'=>$this->m_pesanan_masuk->pesanan_dikirim(),
                        'pesanan_selesai'=>$this->m_pesanan_masuk->pesanan_selesai(),
                        
                       'isi'=>'v_pesanan_masuk'  
                    );
        
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function konfirmasi($id_penjualan){

        $data =array(
            'id_penjualan' => $id_penjualan,
            'status_order' => '1'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Di Kemas !');

        redirect('admin/pesanan_masuk');
    }

    public function kirim($id_penjualan){

        $data =array(
            'id_penjualan' => $id_penjualan,
            'no_resi'=> $this->input->post('no_resi'),
            'status_order' => '2'
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan Di Kirim !');

        redirect('admin/pesanan_masuk');
    }

    public function data_pelanggan (){

        
        $data = array('title' => 'Data Pelanggan',
        
        'data_pelanggan'=>$this->m_admin->data_pelanggan(),
        
       'isi'=>'v_datapelanggan'  
    );

        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

}

/* End of file Controllername.php */
       

?>