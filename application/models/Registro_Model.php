<?php

class Registro_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function cadastrar($data){
		$this->db->insert('tsistema_registrocontato', $data);

		return $this->db->affected_rows();
	}
	
	public function buscarTodosContatos(){
		return $this->db->get('tauxiliar_meiocontato')->result();
	}

	public function buscarTodosClientes(){
		return $this->db->get('tsistema_clientes')->result();
	}

	public function busca_cli_codigo($cli_nomerazaosocial){
		return $this->db->query("SELECT `cli_codigo` FROM `tsistema_clientes` Where `cli_nomerazaosocial` = '" . $cli_nomerazaosocial ."'")->row()->cli_codigo;
	}

	public function busca_meiconcodigo($meicon_descricao){
		return $this->db->query("SELECT `meicon_codigo` FROM `tauxiliar_meiocontato` Where `meicon_descricao` = '" . $meicon_descricao ."'")->row()->meicon_codigo;
	}

	public function busca_cpf_usu($codigo_login){
		return $this->db->query("SELECT `usu_cpf` FROM `tsistema_usuarios` Where `usu_codigo` = '" . $codigo_login ."'")->row()->usu_cpf;
	}
}