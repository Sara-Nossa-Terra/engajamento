<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lideres extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library("controle_acesso");
		$this->controle_acesso->controlar();
	}

	public function index(){
		$this->load->model("users_model");
		$users = $this->users_model->show_users();
		$data = array(
			"styles" => array(
				"public/personal_style/css/datatables.min.css",
				"public/personal_style/css/style.css",
			),
			"scripts" => array(
				"public/js/util.js",
				"public/personal_style/js/datatables.min.js",
				"public/personal_style/js/datatables.js",
			),
			"users" => $users
		);
		$this->template->show("lideres.php", $data);
	}
}