<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        

    }

    // List all your items
    public function index( $offset = 0 )
    {
        $data = array('title' => 'User',
        'user'=> $this->m_user->get_all_data(),
        'isi'=>'user/v_user'  
     );

        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {   
        $valid = $this->form_validation;

		$valid->set_rules('nama_user','Nama lengkap','required',
				array(	'required'		=> '%s Harus Di Isi!'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[user.email]',
				array(	'required'		=> '%s Harus Di isi!',
						'valid_email'	=> '%s Tidak Valid!',
						'is_unique'		=> '%s Telah Terdaftar, Gunakan Email Lain!'));

		$valid->set_rules('username','Username','required|min_length[3]|max_length[32]|is_unique[user.username]',
				array(	'required'		=> '%s Harus Di isi!!',
						'min_length'	=> '%s Minimal 3 Karakter!',
						'max_length'	=> '%s Masksimal 32 Karakter!',
                        'is_unique'		=> '%s Telah Terdaftar, Gunakan Username Lain!',
						));

		$valid->set_rules('password','Password','required',
				array(	'required'		=> '%s Harus Di isi!'));


            if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";


            if (!$this->upload->do_upload($field_name)) {
                $data = array('title' => 'Tambah User',
          
                'error_upload' => $this->upload->display_errors(),
                'isi'=>'user/v_user_add',  
             );

         $this->load->view('layout/v_wrapper_backend', $data, FALSE);
		// masuk database
		}else{
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/gambar/'. $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nohp' => $this->input->post('nohp'),
            'level' => $this->input->post('level'),
            'gambar' => $upload_data['uploads']['file_name'], 
        );    
        $this->m_user->add($data);
        $this->session->set_flashdata('pesan', 'User Berhasil Di Tambahkan!');
        redirect('user' );
        }
    
        } 
        $data = array(
        	'title'		=> 'Tambah Pengguna',
            'isi'		=> 'user/v_user_add'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function edit($id_user = NULL )
    {
        $user = $this->m_user->detail($id_user);

    // validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_user','Nama lengkap','required',
				array(	'required'		=> '%s Harus Di Isi!'));

		$valid->set_rules('email','Email','required|valid_email',
				array(	'required'		=> '%s Harus Di isi!',
						'valid_email'	=> '%s Tidak Valid!',
						// 'is_unique'		=> '%s Telah Terdaftar, Gunakan Email Lain!'
                    ));

		$valid->set_rules('username','Username','required|min_length[3]|max_length[32]',
				array(	'required'		=> '%s Harus Di isi!!',
						'min_length'	=> '%s Minimal 3 Karakter!',
						'max_length'	=> '%s Masksimal 32 Karakter!',
                        // 'is_unique'		=> '%s Telah Terdaftar, Gunakan Username Lain!',
						));

		$valid->set_rules('password','Password','required',
				array(	'required'		=> '%s Harus Di isi!'));

            if ($this->form_validation->run() == true) {
                $config['upload_path'] = './assets/gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
                $config['max_size']     = '200000';
                $this->upload->initialize($config);
                $field_name = "gambar";

            if (!$this->upload->do_upload($field_name)) {
            $data = array('title' => 'Edit Barang',
            'user'		=> $user,
            'error_upload' => $this->upload->display_errors(),
            'isi'=>'user/v_user_edit'
             );
                    
            $this->load->view('layout/v_wrapper_backend', $data, false);
                // masuk database
                } else {
                     //hapus_gambar
       
            if ($user->gambar != "") {
                unlink('./assets/gambar/' .  $user->gambar);


            }
        //end hapus barang 
                    $upload_data = array('uploads' => $this->upload->data());
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/gambar/'. $upload_data['uploads']['file_name'];
                    $this->load->library('image_lib', $config);

         $data= array(
                'id_user'  => $id_user,
                'nama_user' => $this->input->post('nama_user'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nohp' => $this->input->post('nohp'),
                'level' => $this->input->post('level'),
                'gambar' => $upload_data['uploads']['file_name'],
        );
                    $this->m_user->edit($data);
                    $this->session->set_flashdata('pesan', 'User Berhasil Di Edit!');
                    redirect('user');
                }
         $data= array(
                 'id_user'  => $id_user,
                 'nama_user' => $this->input->post('nama_user'),
                 'username' => $this->input->post('username'),
                 'email' => $this->input->post('email'),
                 'password' => $this->input->post('password'),
                 'nohp' => $this->input->post('nohp'),
                 'level' => $this->input->post('level'),
            
            );
                        $this->m_user->edit($data);
                        $this->session->set_flashdata('pesan', 'User Berhasil Di Edit!');
                        redirect('user');     
            }
        $data = array(	'title'		=> 'Edit Pengguna',
						'user'		=> $user,
						'isi'		=> 'user/v_user_edit'
					);
                    
         $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    

    //Delete one item
    public function delete( $id_user = NULL )
    {
     $data= array(
                'id_user'  => $id_user);
     $this->m_user->delete($data);
     $this->session->set_flashdata('pesan', 'User Berhasil Di Hapus!');
        redirect('user');
            }
    
}

/* End of file User.php */
