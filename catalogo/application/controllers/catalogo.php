<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->library('catalogo_system');
	    $this->load->model('filmes_model', 'filmes');
		$this->catalogo_system->inicializacao();
		
	}
	
	public function index(){
		
		$this->carrega_home();
		
		
	}
	
	public function carrega_home(){
	
			
			$dados = array(
			
				'titulo' => 'Bem vindo ao Catálogo de filmes',
				'tela' => 'catalogo_home'
				
			);
				
			$this->load->view('catalogo_view', $dados);
			
	}
	
}

/* End of file catalogo.php */
/* Location: ./application/controllers/catalogo.php */