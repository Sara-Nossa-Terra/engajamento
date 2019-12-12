<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("controle_acesso");
		$this->controle_acesso->controlar_logado();
	}

	public function index(){
		$data = array(
			"styles" => array(
				"",
			),
			"scripts" => array(
				"",
			)
		);
		$this->load->view('login', $data);
	}

	public function ajax_login(){

		if(!$this->input->is_ajax_request()){
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$form_login = $this->input->post("email");
		$form_senha = $this->input->post("senha");

		if(empty($form_login)){

			$json["status"] = 0;
			$json["error_list"]["#email"] = "Usu&aacute;rio n&atilde;o pode ser vazio!";

		}else{

			$this->load->model("users_model");
			$result = $this->users_model->get_user_data($form_login);

			if($result){

				if(password_verify($form_senha, $result->senha)){
					$this->session->set_userdata("nome", $result->nome);
					$this->session->set_userdata("email", $result->email);
				}else{
					$json["status"] = 0;
				}

			}else{
				$json["status"] = 0;
			}
			
			if($json["status"] == 0){
				$json["error_list"]["#senha"] = "Usu&aacute;rio e/ou senha incorretos!";
			}

		}

		echo json_encode($json);

	}

	public function logoff(){
		$this->session->sess_destroy();
		header('location: '.base_url().'login/');
	}

}
