<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NovoUsuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("controle_acesso");
		$this->controle_acesso->controlar();
	}

	public function index(){
		$data = array(
			"styles" => array(
				"public/personal_style/css/style.css",
			),
			"scripts" => array(
				"public/js/util.js",
				"public/js/usuario.js",
			)
		);
		$this->template->show("novo_usuario.php", $data);
	}

	public function ajax_novo_usuario(){

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("users_model");

		$data = $this->input->post();

		if(empty($data["nome"])){
			$json["error_list"]["#nome"] = "Nome é obrigatório!";
		}

		if(empty($data["email"])){
			$json["error_list"]["#email"] = "E-mail é obrigatório!";
		}else{
			if($this->users_model->is_duplicated("email", $data["email"])){
				$json["error_list"]["#email"] = "E-mail já existente!";
			}
		}

		if(empty($data["senha"])){
			$json["error_list"]["#senha"] = "Senha é obrigatória!";
		}

		if(!empty($json["error_list"])){
			$json["status"] = 0;
		}else{
			$data = [
				'nome' => $data["nome"],
				'email' => $data["email"],
				'senha' => password_hash($data["senha"], PASSWORD_DEFAULT),
				'telefone' => $data["telefone"],
				'status_2' => $data["status"]
			];
			$this->users_model->insert($data);
		}

		echo json_encode($json);

	}

}