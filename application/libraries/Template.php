<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Template {
 
		function show($view, $data=array()){
 
			$CI = & get_instance();
 
			// Carregar Menu
			$CI->load->view('template/header',$data);
 
			// Carregar Conteúdo
			$CI->load->view($view,$data);
 
			// Carregar Rodapé
			$CI->load->view('template/footer',$data);
 
			// Scripts
			$CI->load->view('template/scripts',$data);
		}

}
 
/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */