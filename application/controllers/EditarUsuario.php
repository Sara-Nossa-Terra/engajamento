<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarUsuario extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("controle_acesso");
		$this->controle_acesso->controlar();
	}

	public function index()
	{
		$this->load->model("users_model");
		$id = $this->input->get("id");
		$user = $this->users_model->show_info_user($id);
		$data = array(
			"styles" => array(
				"public/personal_style/css/style.css",
			),
			"scripts" => array(
				"public/js/util.js",
				"public/js/usuario.js",
			),
			"user" => $user
		);
		$this->template->show("editar_usuario.php", $data);
	}

	public function ajax_editar_usuario()
	{

		if (!$this->input->is_ajax_request()) {
			exit("Nenhum acesso de script direto permitido!");
		}

		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$this->load->model("users_model");

		$data = $this->input->post();

		// RESGATANDO O ID DO USUÁRIO
		$id_usuario = $data["id_usuario"];

		// VALIDAÇÃO DOS CHECKBOX DE STATUS
		$status = (($this->input->post("tx_status_2")) ? 1 : 0);

		if (empty($data["tx_nome"])) {
			$json["error_list"]["#tx_nome"] = "Nome é obrigatório!";
		}

		if (empty($data["tx_email"])) {
			$json["error_list"]["#tx_email"] = "E-mail é obrigatório!";
		} else {
			if ($this->users_model->is_duplicated("tx_email", $data["tx_email"], $id_usuario)) {
				$json["error_list"]["#tx_email"] = "E-mail já existente!";
			}
		}

		if (!empty($json["error_list"])) {
			$json["tx_status"] = 0;
		} else {
			$data = [
				"tx_nome" => $data['tx_nome'],
				"tx_email" => $data['tx_email'],
				"nu_telefone" => $data['nu_telefone'],
				"tx_status_2" => $status
			];

			$this->users_model->update($id_usuario, $data);
		}
		echo json_encode($json);
	}

}
