<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controller {

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
				"",
			)
		);
		$this->template->show("restrict.php", $data);
	}
}