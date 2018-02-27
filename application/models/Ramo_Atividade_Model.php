<?php

class Ramo_Atividade_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function cadastrar($data){
		$this->db->insert('tauxiliar_ramoatividade', $data);

		return $this->db->affected_rows();

	}

	public function excluir($id){
		$this->db->where('ramati_codigo', $id);
		$this->db->delete('tauxiliar_ramoatividade');

		return $this->db->affected_rows();
	}

	public function buscarTodos(){
		return $this->db->get('tauxiliar_ramoatividade')->result();
	}

	public function buscarCodigo($id){
		return $this->db->get_where('tauxiliar_ramoatividade', array('ramati_codigo' => $id))->row();
	}

	public function alterar($data, $id){
		$this->db->where('ramati_codigo', $id);
		$this->db->update('tauxiliar_ramoatividade', $data);

		return $this->db->affected_rows();
	}
}