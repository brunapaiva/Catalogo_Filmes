<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Catalogo_system{
	
	
	function inicializacao(){
	
		$CI =& get_instance();
		$CI->load->library(array('session', 'form_validation','parser'));
		$CI->load->helper(array('array', 'url', 'text', 'form'));
	
	}
	
	function thumb($imagem=NULL, $largura=183, $altura=275, $geratag=TRUE){
		$CI =& get_instance();
		$CI->load->helper('file');
		$thumb = $imagem;
		$thumbinfo = get_file_info('./uploads/thumbs/'.$thumb);
		if ($thumbinfo!=FALSE):
			$retorno = base_url('uploads/thumbs/'.$thumb);
		else:
			$CI->load->library('image_lib');
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$imagem;
			$config['new_image'] = './uploads/thumbs/'.$thumb;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $largura;
			$config['height'] = $altura;
			$CI->image_lib->initialize($config);
			if ($CI->image_lib->resize()):
				$CI->image_lib->clear();
				$retorno = base_url('uploads/thumbs/'.$thumb);
			else:
				$retorno = FALSE;
			endif;
		endif;
		if ($geratag && $retorno != FALSE) $retorno = '<img src="'.$retorno.'" alt="" />';
		return $retorno;
	}
	
}

/* End of file catalogo_system.php */
/* Location: ./application/libraries/catalogo_system.php */
