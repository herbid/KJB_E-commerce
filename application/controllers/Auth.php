<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
       

        $this->load->model('m_konfigurasi');
        $this->load->model('m_pelanggan');
        $this->load->model('m_transaksi');
        $this->load->model('m_auth');
        $this->load->library('email');
        

        
    }
    


    public function login_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required',array(
            'required'=> '%s Silahkan isi Username terlebih dahulu !!'
        ));
        
        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required'=> '%s Silahkan Password isi terlebih dahulu !!'
        ));

        if ($this->form_validation->run()==TRUE){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username,$password);
        }
            $data = array('title' => 'Login User',
            // 'isi'=>'v_login_user'  
         );

            $this->load->view('v_login_user', $data, FALSE);
        }



        private function _sendEmail($token,$type){
            $config =[
                'protocol'=>'smtp',
                'smtp_host'=>'ssl://smtp.googlemail.com',
                'smtp_user'=>'kusumajayabatik362@gmail.com',
                'smtp_pass'=>'condro123',
                'smtp_port'=>465,
                'mailtype'=>'html',
                'charset'=>'utf-8',
                'newline'=>"\r\n"
            ];
    
            $this->email->initialize($config);
            $this->email->from('kusumajayabatik362@gmail.com','Kusuma Jaya Batik');
              // $this->email->to('yudinaro99@gmail.com');
            $this->email->to($this->input->post('email'));
            if($type == 'verifikasi'){
                
                        $this->email->subject('Aktivasi akun anda untuk Login');
                        $this->email->message('<p style="font-size:14px; text-align: justify;text-justify: inter-word;"> <b><h1> Silahkan verifikasi Dan Aktivasi Akun anda </b></h1><br>Untuk membantu melindungi Anda dari penyalahgunaan,
                        <br> <img src="'.base_url().'assets\gambar\kjb.png"> <br> Kami  Meminta Anda membuktikan bahwa Anda bukan robot sebelum dapat membuat akun atau login.
                        <br>Konfirmasi ekstra melalui Email ini membantu mencegah pelaku penyalah gunaan Akun <br> <h3><b>KJB<b/></h3></p><br> Klik untuk Aktivasi akun anda : <a href="'.base_url().
                            'pelanggan/verifikasi?email='.$this->input->post('email').'&token='.urlencode($token).'">Aktivasi Sekarang</a>');
                        
    
            }
            if($type=='lupa'){
                $this->email->subject('Reset  Password Anda, jaga kerahasiaan kode anda ');
                $this->email->message('Klik untuk mengubah password Dari Admin : <a href="'.base_url().'auth/resetpass?email='.$this->input->post('email').'&token='.urlencode($token).'">Konfirmasi</a>');
    
            }
    
          if( $this->email->send()){
              return true;
          }else{
                echo $this->email->print_debugger();
                die; 
          }
    
        }

        public function reset_password()
        {	
    
            $data = array (		'title'		=> 'Reset Password',							
                                'isi'		=> 'v_reset_user'	
                        );
                        $this->load->view('v_reset_user', $data, FALSE);
    
        }
    
        public function forgetpass(){
    
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    
            if($this->form_validation->run() == FALSE){
                $data = array (	'title'		=> 'RESET Password',							
                                'isi'		=> 'v_resetpass'	
                        );
                        $this->load->view('v_reset_user', $data, FALSE);
            }else{
                $email= $this->input->post('email');
                $user = $this->db->get_where('user',['email'=>$email])->row_array();
                if($user){
    
                    $token = base64_encode(random_bytes(32));
                    $user_token =[
                        'email'=>$email,
                        'token'=>$token,
                        'date'=>time()
                    ];
                         $this->db->insert('token_p',$user_token);
                        $this->_sendEmail($token,'lupa');
    
                    echo "<script> alert('Permohonan Diminta ( Silahkan Cek Email Anda )'); </script>";
                    echo "<script> window.location='".site_url('auth/login_user')."'; </script>";
                    $this->session->set_flashdata('notif','  Silahkan Cek Email Anda ');
    
                }else{
           
                    echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
                    echo "<script> window.location='".site_url('auth/login_user')."'; </script>";
                    $this->session->set_flashdata('error',' Maaf Email Anda Tidak Terdaftar');
                }
            }
        }
    
        public function resetpass(){
            $email= $this->input->get('email');
            $token= $this->input->get('token');
    
            $user = $this->db->get_where('user',['email'=>$email])->row_array();
    
            if($user){
                $user_token=$this->db->get_where('token_p',['token'=>$token])->row_array();   
                 
                if($user_token){
                    $this->session->set_userdata('reset_pass',$email);
                    $this->changepass();
    
                }else{
                    echo "<script> alert('Token Salah'); </script>";
                    echo "<script> window.location='".site_url('auth/login_user')."'; </script>";
                    
                }
            }else{
                    echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
                    echo "<script> window.location='".site_url('auth/login_user')."'; </script>";
            }
    
        }
    
        public function changepass(){
    
            if(!$this->session->userdata('reset_pass')){
                redirect('auth/login_user');
            }
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password1]');
            $this->form_validation->set_rules('password1', 'Repeat Password', 'trim|required|min_length[3]|matches[password]');
            // $this->form_validation->set_rules('v_gantipass', 'Konfirmasi Password','trim|required|matches[password]');
         
            if($this->form_validation->run() == FALSE){
                $data = array (	'title'		=> 'RESET Password',							
                                'isi'		=> 'v_recover_password'	
                        );
                        $this->load->view('v_recover_password', $data, FALSE);
    
            }else{
    
                $password = $this->input->post('password');
                $email = $this->session->userdata('reset_pass');
    
    
                $this->db->set('password',$password);
                $this->db->where('email',$email);
                $this->db->update('user');
                   $this->session->unset_userdata('reset_pass');
              
                echo "<script> alert(' Password Berhasil Di Ubah, Silahkan Login Dengan  Password Baru '); </script>";
                echo "<script> window.location='".site_url('auth/login_user')."'; </script>";
    
            }
    
          //  $params['password']=SHA1($post['password']);
    
    
        }


        public function logout_user(){

            $this->user_login->logout();
    }
}

/* End of file Controllername.php */
