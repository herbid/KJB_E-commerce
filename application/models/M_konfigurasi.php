<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfigurasi extends CI_Model {

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    // Listing
	public function listing(){
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}
    // Edit
    public function edit($data){
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('konfigurasi', $data);
    }

}

/* End of file M_konfigurasi.php */

?>