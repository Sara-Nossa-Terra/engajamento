<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controle_acesso{

	public function controlar(){

		$CI = &get_instance();

		if(empty($CI->session->userdata("email"))){
			header('location: '.base_url());
		}

	}

	public function controlar_logado(){

		$CI = &get_instance();

		if(!empty($CI->session->userdata("email"))){
			header('location: '.base_url().'restrict/');
		}
		
	}

}