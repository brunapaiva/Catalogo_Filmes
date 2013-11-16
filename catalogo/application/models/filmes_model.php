<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filmes_model extends CI_Model{
	

	
	public function get_all(){
		return $this->db->get('filmes');
	}
	
	public function do_upload($campo){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($campo)){
			return $this->upload->data();
		}else{
			return $this->upload->display_errors();
		}
	}
	
	public function inserir_filme($dados){
		
		if($dados != NULL){
			
			$this->db->insert('filmes', $dados);
			
			if ($this->db->affected_rows() > 0) {			
				return TRUE;
			} else{			
				return FALSE;
			}
			
		}
		
	}
	

}

/* End of file filmes_model.php */
/* Location: ./application/models/filmes_model.php */