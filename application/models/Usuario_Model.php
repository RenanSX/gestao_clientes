<?php

class Usuario_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function cadastrar($data){
		$this->db->insert('tsistema_usuarios', $data);

		return $this->db->affected_rows();
	}

	public function alterar($data, $id){
		$this->db->where('usu_codigo', $id);
		$this->db->update('tsistema_usuarios', $data);
	
		return $this->db->affected_rows();
	}

	public function excluir($id){
		$this->db->where('usu_codigo', $id);
		$this->db->delete('tsistema_usuarios');
	
		return $this->db->affected_rows();
	}

	public function buscarTodos(){
		return $this->db->get('tsistema_usuarios')->result();
	}

	public function buscarCodigo($id){
		return $this->db->get_where('tsistema_usuarios', array('usu_codigo' => $id))->row();
	}

	public function busca_usu_codigo($id){
		return $this->db->get_where('tsistema_usuarios', array('usu_codigo' => $id))->row()->usu_codigo;
	}

	public function busca_usu_email($id){
		return $this->db->get_where('tsistema_usuarios', array('usu_codigo' => $id))->row()->usu_email;
	}

	public function busca_usu_cpf($id){
		return $this->db->get_where('tsistema_usuarios', array('usu_codigo' => $id))->row()->usu_cpf;
	}

}