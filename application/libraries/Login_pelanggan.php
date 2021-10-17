<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pelanggan
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_auth');
        
    }

    public function login($email,$password){

        $cek= $this->ci->m_auth->login_pelanggan($email,$password);
        



        if($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email = $cek->email;
            // $level = $cek->level;
            $id_pelanggan = $cek->id_pelanggan;
            //session
            
           
            $this->ci->session->set_userdata('id_pelanggan',$id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan',$nama_pelanggan);
            $this->ci->session->set_userdata('email',$email);
            $this->ci->session->set_userdata('id_pelanggan',$id_pelanggan);
            
            // redirect('home');
            redirect(base_url('home'),'refresh');
            // $password = $cek->password;
        }else{
            //cek pengecekan login
           
           $this->ci->session->set_flashdata('error','Email Atau Password Anda Salah !!');
           redirect('pelanggan/login');
           


        }

    }
    function user_login(){
        $this->ci->load->model('m_auth');
        $id_pelanggan = $this->ci->session->userdata('id_pelanggan');
        $user_data= $this->ci->m_auth->get_pelanggan($id_pelanggan)->row();
        return $user_data;
    }
    public function proteksi_halaman_login(){
        if ( $this->ci->session->userdata('nama_pelanggan')== '') {
            $this->ci->session->set_flashdata('error','Anda Belum Login !!');
            redirect('pelanggan/login');
        }
    } 
       public function logout(){
        
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('nama_pelanggan');
        $this->ci->session->unset_userdata('email');
  
        $this->ci->session->set_flashdata('pesan','Anda Berhasil Logout !!');
        redirect('pelanggan/login');
       } 

}

/* End of file User_login.php */
