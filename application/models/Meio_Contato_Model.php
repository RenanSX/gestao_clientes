<?php

class Meio_Contato_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function cadastrar($data){
		$this->db->insert('tauxiliar_meiocontato', $data);

		return $this->db->affected_rows();
	}

	public function buscarCodigo($id){
		return $this->db->get_where('tauxiliar_meiocontato', array('meicon_codigo' => $id))->row();
	}

	public function buscarTodos(){
		return $this->db->get('tauxiliar_meiocontato')->result();
	}

	public function alterar($data, $id){
		$this->db->where('meicon_codigo', $id);
		$this->db->update('tauxiliar_meiocontato', $data);

		return $this->db->affected_rows();
	}

	public function excluir($id){
		$this->db->where('meicon_codigo', $id);
		$this->db->delete('tauxiliar_meiocontato');

		return $this->db->affected_rows();
	}

	public function busca_meicon_codigo($id){
		return $this->db->query("SELECT `meicon_codigo` FROM `tauxiliar_meiocontato` WHERE `meicon_codigo` = ".$id)->row()->meicon_codigo;
	}
}