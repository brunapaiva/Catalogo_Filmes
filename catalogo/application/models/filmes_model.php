<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filmes_model extends CI_Model{
	

	
	public function get_all(){
		return $this->db->get('filmes');
	}
	
	
	

}

/* End of file filmes_model.php */
/* Location: ./application/models/filmes_model.php */