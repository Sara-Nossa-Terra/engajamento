<?php

class Users_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($data){
		$this->db->insert("usuario", $data);

		return $this->db->insert_id();
	}

	public function update($form_id_usuario, $data){
		$this->db->where("id_usuario", $form_id_usuario);
		$this->db->update("usuario", $data);
	}

	public function show_users(){
		$this->db->from("usuario")
				 		 ->order_by("nome", "ASC");

		return $this->db->get()->result_array();
	}

	public function show_info_user($id){
		$this->db->from("usuario")
				 ->where("id_usuario", $id);

		$result = $this->db->get();
		return $result->row();
	}

	public function get_user_data($form_login){
		$this->db->select("id_usuario, nome, email, senha, status_2")
			 			 ->from("usuario")
			 			 ->where("email", $form_login)
			 			 ->where("status_2", 1);

	 	$result = $this->db->get();

	 	if($result->num_rows() > 0){
	 		return $result->row();
	 	}else{
	 		return NULL;
	 	}
	}

	public function is_duplicated($field, $value, $id_usuario = NULL){
		if(!empty($id_usuario)){
			$this->db->where("id_usuario <>", $id_usuario);
		}
		$this->db->from("usuario");
		$this->db->where($field, $value);

		return $this->db->get()->num_rows() > 0;
	}

}