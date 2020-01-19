<?php

class Users_model extends CI_Model
{
	protected $table = 'tb_usuario';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 *
	 * @param $data Array de dados que será inserido.
	 * @return mixed
	 */
	public function insert($data)
	{
		$this->db->insert($this->table, $data);

		return $this->db->insert_id();
	}

	/**
	 * Alterar um registro de usuário.
	 * @param $id_usuario Id do registro que será alterado.
	 * @param $data Array de dados das colunas que serão atualizados.
	 */
	public function update($id_usuario, $data)
	{
		$this->db->where("id_usuario", $id_usuario);
		$this->db->update($this->table, $data);
	}

	/**
	 * Buscar todos os registros de usuários.
	 * @return mixed
	 */
	public function show_users()
	{
		$this->db->from($this->table)
			->order_by("tx_nome", "ASC");

		return $this->db->get()->result_array();
	}

	/**
	 * Busca informações do usuário pelo ID.
	 * @param $id ID do usuário.
	 * @return mixed
	 */
	public function show_info_user($id)
	{
		$this->db->from($this->table)
			->where("id_usuario", $id);

		$result = $this->db->get();
		return $result->row();
	}

	/**
	 * Buscar dados do usuário através do parametro de email.
	 *
	 * @param $tx_email E-mail no qual será verificado no banco.
	 * @return |null
	 */
	public function get_user_data($tx_email)
	{
		$this->db->select("id_usuario, tx_nome, tx_email, tx_senha, tx_status_2")
			->from($this->table)
			->where("tx_email", $tx_email)
			->where("tx_status_2", 1);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return NULL;
		}
	}

	/**
	 * Verificar se o usuario já existe no banco de dados.
	 * @param $field           coluna do banco a ser verificada.
	 * @param $value           valor da coluna no banco.
	 * @param null $id_usuario ID do registro a ser verificado.
	 * @return bool
	 */
	public function is_duplicated($field, $value, $id_usuario = NULL)
	{
		if (!empty($id_usuario)) {
			$this->db->where("id_usuario <>", $id_usuario);
		}
		$this->db->from($this->table);
		$this->db->where($field, $value);

		return $this->db->get()->num_rows() > 0;
	}
}
