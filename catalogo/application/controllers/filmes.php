<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filmes extends CI_Controller {


	public function __construct(){
		
		parent::__construct();
		$this->load->library('catalogo_system');
		$this->catalogo_system->inicializacao();
		$this->load->model('filmes_model', 'filmes');
	}
	
	public function index(){
		
		$this->cadastrar_filme();
		
	}
	
	public function cadastrar_filme(){
			
		$this->form_validation->set_rules('nome_filme', 'NOME_FILME', 'trim|required|');
		if($this->form_validation->run() == TRUE){
			$dados['nome_filme'] = $this->input->post('nome_filme', TRUE);
			$dados['categoria'] = $this->input->post('categoria');
			$dados['link'] = $this->input->post('link');
			
			$upload = $this->filmes->do_upload('arquivo');
			
			if (is_array($upload) && $upload['file_name'] != ''){
					
				$this->slider_system->thumb($upload['file_name'], $largura=183, $altura=275, FALSE);
				$dados['url_image'] = $upload['file_name'];
				if($this->filmes->inserir_filme($dados)){
					redirect(base_url());
				}
			}
		}
		
		$dados = array(
				'titulo' => 'Cadastrar filmes',
				'tela' => 'cad_filme'
		);
			
		$this->load->view('catalogo_view', $dados);
		
	}
	
}

/* End of file filmes.php */
/* Location: ./application/controllers/filmes.php */