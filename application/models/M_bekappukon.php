<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

//proses login
public function login($post){
        $aktiv = '1';
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('email',$post['email']);
        $this->db->where('password',md5($post['password']));
        $this->db->where('aktivasi',$aktiv);

        $query = $this->db->get();
        return $query;

        
    }


//registrasi user
public function add($post){
    $id_pelanggan = "PLG".date('y').random_string('alnum',8).date('md');
        $params = [
            'id_pelanggan'=>$id_pelanggan,
            'nama'=> $post['nama'],
            'email'=> $post['email'],
            'password'=> md5($post['password']),
        ];
        $this->db->insert('tb_pelanggan',$params);
    }


//get data tabel pelanggan
 public function get($id=null){

        $this->db->from('tb_pelanggan');
        $this->db->order_by('nama','asc');
        if($id !=null){
            $this->db->where('id_pelanggan',$id);    
        }
        $query = $this->db->get();
        return $query;

    }


    public function edit($post){
        $params = [
           	'nama'=> $post['nama'],
            'nama_belakang'=> $post['nama_belakang'],
            'email'=> $post['email'],
            'jk'=> $post['jk'],
            'tgl_lahir'=> $post['tgl_lahir'],
            'no_telpon'=> $post['no_telpon'],
            'alamat'=> empty($post['alamat']) ? null : $post['alamat'],
            // 'password'=> empty($post['password']) ? null : md5($post['password']),
         
        ];
        if (!empty($post['provinsi'])){
            $params['provinsi']=$post['provinsi'];
        }
        if (!empty($post['kabupaten'])){
            $params['kabupaten']=$post['kabupaten'];
        }
        if (!empty($post['password'])){
            $params['password']=md5($post['password']);
        }
        
        $this->db->where('id_pelanggan',$post['id_pelanggan']);
        $this->db->update('tb_pelanggan',$params);
    }

}