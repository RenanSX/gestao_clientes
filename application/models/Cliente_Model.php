<?php

class Cliente_Model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function cadastrar($data){
		$this->db->insert('tsistema_clientes', $data);

		return $this->db->affected_rows();
	}

	public function cadastrar_atividade($data_atividade){
		$this->db->insert('tauxiliar_ramoatividade', $data_atividade);
		return $this->db->affected_rows();
	}

	public function alterar($data, $id){
		$this->db->where('cli_codigo', $id);
		$this->db->update('tsistema_clientes', $data);

		return $this->db->affected_rows();
	}

	public function excluir($id){
		$this->db->where('cli_codigo', $id);
		$this->db->delete('tsistema_clientes');
	
		return $this->db->affected_rows();
	}

	public function buscarTodos(){
		return $this->db->get('tsistema_clientes')->result();
	}

	public function buscarCodigo($id){
		return $this->db->get_where('tsistema_clientes', array('cli_codigo' => $id))->row();		
	}

	public function buscarTodasAtividades(){
		return $this->db->get('tauxiliar_ramoatividade')->result();
	}

	public function busca_ramati_descricao($ramatidescricao){
		return $this->db->query("SELECT `ramati_codigo` FROM `tauxiliar_ramoatividade` WHERE `ramati_descricao` = '" . $ramatidescricao ."'")->row()->ramati_codigo;
	}

	public function busca_usu_cpf($codigo_login){
		return $this->db->query("SELECT `usu_cpf` FROM `tsistema_usuarios` Where `usu_codigo` = '" . $codigo_login ."'")->row()->usu_cpf;
	}

	public function cli_email($id){
		return $this->db->get_where('tsistema_clientes', array('cli_codigo' => $id))->row()->cli_email;		
	}

	public function cli_cpfcnpj($id){
		return $this->db->get_where('tsistema_clientes', array('cli_codigo' => $id))->row()->cli_cpfcnpj;	
	}

	public function buscar_ramo_descricao($ramatidescricao){
		return $this->db->query("SELECT `tauxiliar_ramoatividade`.`ramati_descricao` `Ramo atividade`
			FROM `tsistema_clientes`
			LEFT JOIN `tauxiliar_ramoatividade`
			ON `tauxiliar_ramoatividade`.`ramati_codigo` =  `tsistema_clientes`.`TAuxiliar_RamoAtividade_ramati_codigo`
			WHERE `TAuxiliar_RamoAtividade_ramati_codigo` = '" . $ramatidescricao ."'");
	}
}