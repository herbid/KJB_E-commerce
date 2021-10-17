<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function login_user ($username,$password){

    $this->db->select('*');
    
    $this->db->from('user');
    
    $this->db->where(array('username'=>$username, 'password'=>$password));
    
    return 
    $this->db->get()->row();
    
    }

    public function login_pelanggan ($email,$password){
        $aktif = '1';
        
        $this->db->select('*');
        
        $this->db->from('pelanggan');
        
        $this->db->where(array('email'=>$email, 'password'	=> SHA1($password) ));

        $this->db->where('is_active ',$aktif);
        
        $query = $this->db->get();
		return $query->row();
        
        }

        public function get_pelanggan ($id=null){

            $this->db->from('pelanggan');

            if($id !=null){
                $this->db->where('id_pelanggan',$id);
            }
            $query = $this->db->get();
            return $query;
            
            }
     
 
}

/* End of file ModelName.php */

