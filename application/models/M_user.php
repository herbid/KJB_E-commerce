<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

  public function get_all_data(){
      
      $this->db->select('*');
      
      $this->db->from('user');

      $this->db->order_by('id_user', 'desc');
      return $this->db->get()->result();
   
  }

  public function add($data){
    
    $this->db->insert('user', $data);
    
  }
  
  public function edit($data){
    
      $this->db->where('id_user', $data['id_user']);
     $this->db->update('user', $data);
    
  }

  public function delete($data){
    
      $this->db->where('id_user', $data['id_user']);
     $this->db->delete('user', $data);
    
  }

  public function listing(){
		$query = $this->db->get('user');
		return $query->row();
	}

  public function detail($id_user){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
}

/* End of file ModelName.php */
