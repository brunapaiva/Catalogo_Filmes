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
					
				$this->catalogo_system->thumb($upload['file_name'], $largura=183, $altura=275, FALSE);
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

	public function listar_filmes(){
			
		$dados = array(
			
				'titulo' => 'Lista de filmes',
				'tela' => 'listagem_filmes',
			);
			
		$this->load->view('catalogo_view', $dados);
	}
	
	public function deletar(){
		
		$filme_id = $this->uri->segment(3);
		
		if($filme_id != NULL){
			
			$query = $this->filmes->getfilme_byid($filme_id);
			if ($query->num_rows() == 1) {
					
				$query = $query->row();
				$this->filmes->deleta_filme(array('id'=>$query->id), FALSE);
							
			} else {
					
				//mensagem de erro
					
			}
					
		}
		redirect(base_url());
	}
	
	public function editar(){
		
		$this->form_validation->set_rules('nome_filme', 'NOME_FILME', 'trim|required|');
		if($this->form_validation->run() == TRUE){
			$dados['nome_filme'] = $this->input->post('nome_filme', TRUE);
			$dados['link'] = $this->input->post('link');
			
			
			$this->filmes->altera_info($dados, array('id' => $this->input->post('id')));
			redirect(base_url());
		}
		
		$dados = array(
			
				'titulo' => 'Editar informações do filme',
				'tela' => 'editar_filmes',
			);
			
		$this->load->view('catalogo_view', $dados);
		
	}

	public function report(){
		
		$dados_filmes = $this->filmes->get_reportinfo();
	
		$html = '<div id="piechart_3d" class="grafico hidden-phone"></div>';
		$html_phone = '<div id="piechart_3d_phone" class="grafico-phone visible-phone"></div>';
		$js = '';
		
		$js .= '<script type="text/javascript">
     				google.load("visualization", "1", {packages:["corechart"]});
    				google.setOnLoadCallback(drawChart);
     				function drawChart() {';	
		$js .= "		var a = navigator.userAgent||navigator.vendor||window.opera;
							if(/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|mobile|o2|opera m(ob|in)i|palm( os)?|p(ixi|re)\/|plucker|pocket|psp|smartphone|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce; (iemobile|ppc)|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a)){
								
								var options = {
						          title: 'Relação de filmes por categoria',
						          is3D: true,
						          legend: 'none',
						          backgroundColor: '#DDDDDD',
						          titleTextStyle: {fontSize: 13},
						        };
								
							}else{
							
								var options = {
				          			title: 'Relação de filmes por categoria',
				         			is3D: true,
				         			backgroundColor: '#DDDDDD',
				         			titleTextStyle: {fontSize: 30},
				          
				       			 };
								
							}
						var data = google.visualization.arrayToDataTable([
							['Filmes', 'Número de filmes'],
	         		 		['Terror',     ".$dados_filmes['terror']."],
	         				['Ação',      ".$dados_filmes['acao']."],
	          				['Romance',  ".$dados_filmes['romance']."],
	          				['Animação',  ".$dados_filmes['animacao']."],
	       				]);
		       			
			
				        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
				        chart.draw(data, options);
						var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_phone'));
				        chart.draw(data, options);
		      		}
		    	</script>";
		
		$report = array(
			'html' => $html,
			'html_phone' => $html_phone,
			'js' => $js,
		);
		
		$dados = array(
			
				'titulo' => 'Reports ',
				'tela' => 'report',
				'report' => $report
			);
			
		$this->load->view('catalogo_view', $dados);
	}
	
}

/* End of file filmes.php */
/* Location: ./application/controllers/filmes.php */