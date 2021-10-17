<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 function __construct()
	{
		parent::__construct();
		$this->load->model('auth_m');
		$this->load->library('email');
    }

	public function index(){
	   
		$this->load->view('sales');
	}


	public function masuk(){
		chack_siap_login();
		$data['title'] = "Samudra2 | Masuk";
		$this->tamplate->load('tamplate_s','pelanggan/login_p',$data);
	}

	public function registrasi(){
 		$data['title'] = "Samudra2 | Registrasi";
		$this->tamplate->load('tamplate_s','pelanggan/daftar_p',$data);
	}
//email

	
///add userr

	public function add(){

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_pelanggan.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
		$this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|matches[password]',
		array('matches' => '%s Password Tidak Sesuai'));
 	
		$this->form_validation->set_message('required','%s Masih kosong Silahkan isi');
		$this->form_validation->set_message('min_length','%s Minimal 3 karakter');
		$this->form_validation->set_message('is_unique','%s  Sudah dipakai');

		if ($this->form_validation->run() == FALSE)
		{	
            $data['title'] = "Samudra | Register User";
			$this->tamplate->load('tamplate_s','pelanggan/daftar_p',$data);
		}
		else
		{
			$post = $this->input->post(null,TRUE);
			$token = base64_encode(random_bytes(32));
		//	var_dump($token);
			$email = $this->input->post('email');
			$user_token =[
				'email'=>$email,
				'token'=>$token,
				'date'=>time()
			];
			 $this->db->insert('tb_token',$user_token);
			 $this->auth_m->add($post);

			$this->_sendEmail($token,'verivikasi');

			if($this->db->affected_rows()>0){
				
                $this->session->set_flashdata('succses','Mohon Verivikasi Akun Anda dulu ( Cek Email Anda )');
			}
				echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
		}	
	}



	
	private function _sendEmail($token,$type){
        $config =[
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_user'=>'parjiman2001@gmail.com',
            'smtp_pass'=>'@Fauzi_17',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'charset'=>'utf-8',
            'newline'=>"\r\n"
        ];

        $this->email->initialize($config);
        $this->email->from('parjiman2001@gmail.com','Samudra PS II');
    //    $this->email->to('yudinaro99@gmail.com');
		$this->email->to($this->input->post('email'));
		if($type == 'verivikasi'){
			
					$this->email->subject('Aktivasi akun anda untuk Login');
					$this->email->message('<p style="font-size:14px; text-align: justify;text-justify: inter-word;"> <b><h1> Silahkan Verivikasi Dan Aktivasi Akun anda </b></h1><br>Untuk membantu melindungi Anda dari penyalahgunaan,
					<br> <img src="'.base_url().'assets/boost/images/logo/sp_logo_p.png"> <br> Kami  Meminta Anda membuktikan bahwa Anda bukan robot sebelum dapat membuat akun atau login.
					<br>Konfirmasi ekstra melalui Email ini membantu mencegah pelaku penyalah gunaan Akun <br> <h3><b>Samudra Ps 2<b/></h3></p><br> Klik untuk Aktivasi akun anda : <a href="'.base_url().
						'auth/verivikasi?email='.$this->input->post('email').'&token='.urlencode($token).'">Aktivasi Sekarang</a>');
					

		}if($type=='lupa'){
            $this->email->subject('Reset  Password Anda');
            $this->email->message('Klik untuk mengubah password anda : <a href="'.base_url().'auth/resetpass?email='.$this->input->post('email').'&token='.urlencode($token).'">Konfirmasi</a>');

        }

      if( $this->email->send()){
		  return true;
	  }else{
		    echo $this->email->print_debugger();
            die; 
	  }

    }

	public function verivikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_pelanggan',['email'=>$email])->row_array();

		if($user){
			$user_token=$this->db->get_where('tb_token',['token'=>$token])->row_array();   
             
			if($user_token){

				if(time() - $user_token['date']< (60 * 60 *24)){
					$aktivasi = '1';
					$this->db->set('aktivasi',$aktivasi);
					$this->db->where('email',$email);
					$this->db->update('tb_pelanggan',['email'=>$email]);


					$this->db->delete('tb_token',['email',$email]);
					$this->session->set_flashdata('succses',$email.' Email sudah terverivikasi ,Silahkan Login');
					redirect('auth/masuk');
				}else{
					$this->db->delete('tb_pelanggan',['email'=>$email]);
					$this->db->delete('tb_token',['email'=>$email]);

					echo "<script> alert(' Waktu Verivikasi Anda Sudah Habis ( Token Expired )'); </script>";
					echo "<script> window.location='".site_url('auth/masuk')."'; </script>";	
				}
                $this->session->set_userdata('reset_pass',$email);
              

            }else{
                echo "<script> alert(' Token Salah'); </script>";
				echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
                
            }

		}else{
			echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
			echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
		}
	}

	public function lupapass()
	{
		$data['title'] = "Samudra2 | Lupa Password";
		$this->tamplate->load('tamplate_s','pelanggan/lupapass',$data);
	}

	public function forgetpass(){

        
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == FALSE){
			$data['title'] = "Samudra2 | Lupa Password";
			$this->tamplate->load('tamplate_s','pelanggan/lupapass',$data);
        }else{
            $email= $this->input->post('email');
            $user = $this->db->get_where('tb_pelanggan',['email'=>$email])->row_array();
            if($user){

                $token = base64_encode(random_bytes(32));
                $user_token =[
                    'email'=>$email,
                    'token'=>$token,
                    'date'=>time()
                ];
                 	$this->db->insert('tb_token',$user_token);
                	$this->_sendEmail($token,'lupa');

                echo "<script> alert('Silahkan Cek Email Anda '); </script>";
				echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
				$this->session->set_flashdata('succses','Permohonan Diminta ( Silahkan Cek Email Anda )');

            }else{
       
                echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
				echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
				$this->session->set_flashdata('error',' Maaf Email Anda Tidak Terdaftar');
            }
        }
    }

	public function resetpass(){
        $email= $this->input->get('email');
        $token= $this->input->get('token');

        $user = $this->db->get_where('tb_pelanggan',['email'=>$email])->row_array();

        if($user){
            $user_token=$this->db->get_where('tb_token',['token'=>$token])->row_array();   
             
            if($user_token){
                $this->session->set_userdata('reset_pass',$email);
                $this->changepass();

            }else{
                echo "<script> alert(' Token Salah'); </script>";
                echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
                
            }
        }else{
                echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
				echo "<script> window.location='".site_url('auth/masuk')."'; </script>";
        }

    }

    public function changepass(){

        if(!$this->session->userdata('reset_pass')){
            redirect('auth/masuk');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('passcon', 'Konfirmasi Password','trim|required|matches[password]');
     
        if($this->form_validation->run() == FALSE){
			$data['title'] = "Samudra2 | Lupa Password";
			$this->tamplate->load('tamplate_s','pelanggan/passcon',$data);
        }else{

            $password = $this->input->post('password');
            $email = $this->session->userdata('reset_pass');


            $this->db->set('password',md5($password));
            $this->db->where('email',$email);
            $this->db->update('tb_pelanggan');
           	$this->session->unset_userdata('reset_pass');
          
            echo "<script> alert(' Password Sukses Di Ubah, Silahkan Login Dengan ( Password Baru )'); </script>";
            echo "<script> window.location='".site_url('auth/masuk')."'; </script>";

        }

      //  $params['password']=md5($post['password']);


    }



}