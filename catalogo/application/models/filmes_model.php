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

		public function getfilme_byid($id = NULL){
		
		if ($id != NULL) {
			
			$this->db->where('id', $id);
			$this->db->limit(1);
			
			return $this->db->get('filmes');
			
		} else {
			return FALSE;
		}	
	}
	
	public function deleta_filme($condicao = NULL, $redir = TRUE){
		
		if($condicao != NULL && is_array($condicao)){
			
			$this->db->delete('filmes', $condicao);
			
			if ($this->db->affected_rows() > 0) {
				
				//mensagem de sucesso
				
			} else {
				
				//mensagem de erro
				
			}
			
			if($redir) redirect(current_url());
			
		}
		
	}
	
	public function altera_info($dados = NULL, $condicao = NULL){
		
		if($dados != NULL && is_array($condicao)){
			
			$this->db->update('filmes', $dados, $condicao);
			
			if ($this->db->affected_rows() > 0) {
				
				//mensagem ok
				
			} else{
				
				//erro
				
			}	
		}
		
	}
	

}

/* End of file filmes_model.php */
/* Location: ./application/models/filmes_model.php */