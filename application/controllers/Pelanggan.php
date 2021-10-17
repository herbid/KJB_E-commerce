<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // $params = array('server_key' => 'SB-Mid-server-MucYqwJJoDgQ430_GtgRVGlb', 'production' => false);
		// $this->load->library('midtrans');
		// $this->midtrans->config($params);

        $this->load->model('m_konfigurasi');
        $this->load->model('m_pelanggan');
        $this->load->model('m_transaksi');
        $this->load->model('m_auth');
        $this->load->library('email');
        

        // $cek_status = $this->m_home->cek_stts();
        
        // foreach($cek_status as $value){
        //     $mdtrans = $this->midtrans->status($value->kode_penjualan);
        //     $id_penjualan = $mdtrans->order_id;
        //     $status_transaksi= $mdtrans->transaction_status;


        //     if(isset($mdtrans->store)){
        //         $invoice = $mdtrans->store;
        //         $pembayaran = $mdtrans->payment_code;
        //     }else{
        //         foreach($mdtrans->va_numbers as $boking){
        //             $invoice = $boking->bank;
        //             $pembayaran = $boking->va_number;
        //         }
        //     }
        //     // echo 'RESULT <br><pre>';
        //     // var_dump($mdtrans);
        //     // echo '</pre>' ;
        // //   die;

        //     $this->m_transaksi->update_status($id_penjualan,$invoice,$pembayaran,$status_transaksi);
        // }

        
    }
    

    public function register()
    {

        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelangan', 'required',array(
            'required' => '%s Mohon Di Isi Terlebih Dahulu !!'     
        ));
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email|required|is_unique[pelanggan.email]',array(
            'required' => '%s Mohon Di Isi Terlebih Dahulu !!',
            'is_unique' => '%s Mohon Maaf E-mail Sudah Tersedia !!'     
        ));
        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required' => '%s Mohon Di Isi Terlebih Dahulu !!'     
        ));
        $this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]',array(
            'required' => '%s Mohon Di Isi Terlebih Dahulu !!',
            'matches' => '%s Password Tidak Sama !!'        
        ));
        $this->form_validation->set_rules('nohp', 'No Telepon', 'required',array(
            'required' => '%s Mohon Di Isi Terlebih Dahulu !!'
            // 'is_unique' => '%s Mohon Maaf E-mail Sudah Tersedia !!'     
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required',array(
            'required' => '%s Mohon Di Isi Terlebih Dahulu !!'    
        ));
            
        if ($this->form_validation->run()==false ) {
            
            $data = array(
                'title' => 'Registrasi Pelanggan ',
                'isi'=>'v_register'  
         );

        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        }else{
            // $id_pelanggan = "plg".date('y').random_string('alnum',8).date('md');
            $data = array(
                // 'id_pelanggan'=>$id_pelanggan,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => SHA1($this->input->post('password')),
                'nohp' => $this->input->post('nohp'),
                'alamat' => $this->input->post('alamat'), 
                'tanggal'=> date('Y-m-d H:i:s'),
                'is_active'=>0,       
              
        );   
        $token = base64_encode(random_bytes(32));
		//	var_dump($token);
		$email = $this->input->post('email'); 

        $user_token =[
            'email'=>$email,
            'token'=>$token,
            'date'=>time()
        ];
        $this->db->insert('token_p',$user_token);
        $this->m_pelanggan->register($data);

        $this->_sendEmail($token,'verifikasi');


        if($this->db->affected_rows()>0){
				
            $this->session->set_flashdata('pesan','Mohon verifikasi Akun Anda Dan Cek Email Anda ');
        }
            echo "<script> window.location='".site_url('pelanggan/login')."'; </script>";
        // $this->session->set_flashdata('pesan', 'Registrasi berhasil.');
        // redirect('pelanggan/register');
        }                
    }

    public function login(){
        $this->form_validation->set_rules('email', 'E-mail', 'required',array(
            'required'=> '%s Silahkan isi terlebih dahulu !!'
        ));
        
        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required'=> '%s Silahkan isi terlebih dahulu !!'
        ));

        if ($this->form_validation->run()==TRUE){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->login_pelanggan->login($email,$password);
        }
            
        $data = array(
            'title' => 'Login Pelanggan ',
            'isi'=>'v_login_pelanggan'  
     );
     $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function logout(){
        $this->login_pelanggan->logout();

    }
 public function profil()
    {
        // ambil data login id_pelanggan dari SESSION
        
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->m_pelanggan->detail($id_pelanggan);
        

        // validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_pelanggan','Nama','required',
                array(	'required'		=> '%s Harus Di Isi!'));

        $valid->set_rules('alamat','Alamat','required',
                array(	'required'		=> '%s Harus Di Isi!'));

        $valid->set_rules('nohp','Nomor Telepon','required',
                array(	'required'		=> '%s Harus Di Isi!'));

        if($valid->run()===FALSE) {
        // End validasi


        $data = array('title' => 'Profil',
                      'pelanggan'=> $pelanggan,
                      'tot_belumbayar' => $this->m_pelanggan->tot_belumbayar(),
                      'tot_diproses' => $this->m_pelanggan->tot_diproses(),
                      'tot_dikirim' => $this->m_pelanggan->tot_dikirim(),
                      'tot_selesai' => $this->m_pelanggan->tot_selesai(),
                    'isi'=>'v_profil',  
                    );
        
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);


        
        } else{
        $i = $this->input;

        // Kalo password lebih dari 6 karakter maka password diganti
        if(strlen($i->post('password'))) {
            $data = array(	'id_pelanggan'		=>$id_pelanggan,
                            'nama_pelanggan'	=> $i->post('nama_pelanggan'),
                            'password'			=> $i->post('password'),
                            'nohp'		    	=> $i->post('nohp'),
                            'alamat'			=> $i->post('alamat'),
                        );
        }else{
            // kalo password kurang dari 6 tidak diganti
            $data = array(	'id_pelanggan'		=>$id_pelanggan,
                            'nama_pelanggan'	=> $i->post('nama_pelanggan'),
                            'nohp'		    	=> $i->post('nohp'),
                            'alamat'			=> $i->post('alamat'),
                        );
        }
        $this->m_pelanggan->edit($data);
        $this->session->set_flashdata('sukses', 'Update profil berhasil.');
        redirect(base_url('pelanggan/profil'),'refresh');
        }        
    }

    public function akunsaya(){
        $this->login_pelanggan->proteksi_halaman_login();
        $data = array(
            'title' => 'Login Pelanggan ',
            'isi'=>'v_akun'  
     );
     $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
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
        $this->email->from('kusumajayabatik362@gmail.com','KJB  Aktivasi  Akun');
    //    $this->email->to('yudinaro99@gmail.com');
		$this->email->to($this->input->post('email'));
		if($type == 'verifikasi'){
			
					$this->email->subject('Aktivasi akun anda untuk Login');
					$this->email->message('<p style="font-size:14px; text-align: justify;text-justify: inter-word;"> <b><h1> Silahkan verifikasi Dan Aktivasi Akun anda </b></h1><br>Untuk  Melindungi Kepentingan Keamana Anda,
					<br> <img src="'.base_url().'assets\gambar\kjb.png"> <br> Kami  Meminta Anda membuktikan bahwa Anda Adalah User Asli Dari Email Tersebut Sebelum Melakukab Login.
					<br>Konfirmasi ekstra melalui Email ini membantu mencegah penyalahgunaan Akun <br> <h3><b>Kusuma Jaya Batik<b/></h3></p><br> Klik untuk Aktivasi akun anda : <a href="'.base_url().
						'pelanggan/verifikasi?email='.$this->input->post('email').'&token='.urlencode($token).'">Aktivasi Akun Sekarang</a>');
					

		}
        if($type=='lupa'){
            $this->email->subject('Reset  Password Anda, jaga kerahasiaan kode anda !');
            $this->email->message('Klik untuk mengubah password anda : <a href="'.base_url().'pelanggan/resetpass?email='.$this->input->post('email').'&token='.urlencode($token).'">Konfirmasi</a>');

        }

      if( $this->email->send()){
		  return true;
	  }else{
		    echo $this->email->print_debugger();
            die; 
	  }

    }

    public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('pelanggan',['email'=>$email])->row_array();

		if($user){
			$user_token=$this->db->get_where('token_p',['token'=>$token])->row_array();   
             
			if($user_token){

				if(time() - $user_token['date']< (60 * 60 *24)){
					$aktivasi = '1';
					$this->db->set('is_active',$aktivasi);
					$this->db->where('email',$email);
					$this->db->update('pelanggan',['email'=>$email]);


					$this->db->delete('token_p',['email',$email]);
					$this->session->set_flashdata('succses',$email.' Email sudah terverifikasi ,Silahkan Login');
					redirect('pelanggan/login');
				}else{
					$this->db->delete('pelanggan',['email'=>$email]);
					$this->db->delete('token_p',['email'=>$email]);

					echo "<script> alert(' Waktu verifikasi Anda Sudah Habis ( Token Expired )'); </script>";
					echo "<script> window.location='".site_url('pelanggan/register')."'; </script>";	
				}
                $this->session->set_userdata('reset_pass',$email);
              

            }else{
                echo "<script> alert(' Token Salah'); </script>";
				echo "<script> window.location='".site_url('pelanggan/register')."'; </script>";
                
            }

		}else{
			echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
			echo "<script> window.location='".site_url('pelanggan/register')."'; </script>";
		}
	}

    public function reset_password()
	{	

		$data = array (		'title'		=> 'Reset Password',							
                            'isi'		=> 'v_resetpass'	
					);
                    $this->load->view('layout/v_wrapper_frontend', $data, FALSE);

	}

    public function forgetpass(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == FALSE){
			$data = array (	'title'		=> 'RESET Password',							
                            'isi'		=> 'v_resetpass'	
					);
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        }else{
            $email= $this->input->post('email');
            $user = $this->db->get_where('pelanggan',['email'=>$email])->row_array();
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
				echo "<script> window.location='".site_url('pelanggan/login')."'; </script>";
				$this->session->set_flashdata('pesan','  Silahkan Cek Email Anda ');

            }else{
       
                echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
				echo "<script> window.location='".site_url('pelanggan/login')."'; </script>";
				$this->session->set_flashdata('error',' Maaf Email Anda Tidak Terdaftar');
            }
        }
    }

    public function resetpass(){
        $email= $this->input->get('email');
        $token= $this->input->get('token');

        $user = $this->db->get_where('pelanggan',['email'=>$email])->row_array();

        if($user){
            $user_token=$this->db->get_where('token_p',['token'=>$token])->row_array();   
             
            if($user_token){
                $this->session->set_userdata('reset_pass',$email);
                $this->changepass();

            }else{
                echo "<script> alert('Token Salah'); </script>";
                echo "<script> window.location='".site_url('pelanggan/login')."'; </script>";
                
            }
        }else{
                echo "<script> alert(' Maaf Email Anda Tidak Terdaftar'); </script>";
				echo "<script> window.location='".site_url('pelanggan/login')."'; </script>";
        }

    }

    public function changepass(){

        if(!$this->session->userdata('reset_pass')){
            redirect('pelanggan/login');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        // $this->form_validation->set_rules('v_gantipass', 'Konfirmasi Password','trim|required|matches[password]');
     
        if($this->form_validation->run() == FALSE){
			$data = array (	'title'		=> 'RESET Password',							
                            'isi'		=> 'v_gantipass'	
					);
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        }else{

            $password = $this->input->post('password');
            $email = $this->session->userdata('reset_pass');


            $this->db->set('password',SHA1($password));
            $this->db->where('email',$email);
            $this->db->update('pelanggan');
           	$this->session->unset_userdata('reset_pass');
          
            echo "<script> alert(' Password Berhasil Di Ubah, Silahkan Login Dengan  Password Baru '); </script>";
            echo "<script> window.location='".site_url('pelanggan/login')."'; </script>";

        }

      //  $params['password']=SHA1($post['password']);


    }


    
}