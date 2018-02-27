<?php

class Relatorio_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function buscar_todos_clientes(){
		return $this->db->get('tsistema_clientes')->result();
	}

	public function busca_clicpfcnpj($cli_nomerazaosocial){
		return $this->db->query("SELECT `cli_cpfcnpj` FROM `tsistema_clientes` WHERE `cli_nomerazaosocial` = '" . $cli_nomerazaosocial ."'")->row()->cli_cpfcnpj;
	}

	public function relatorio($clicpfcnpj, $date_inicial2, $date_final2){
		return $this->db->query("
				SELECT
					`tsistema_usuarios`.`usu_nome` `nume_usuario`, 
					`tsistema_clientes`.`cli_cpfcnpj` `cpf_cnpj`, 
					`tsistema_clientes`.`cli_nomerazaosocial` `nome_razao_social`, 
					`tauxiliar_meiocontato`.`meicon_descricao` `meio_contato`, 
					`tsistema_registrocontato`.`regcon_datadocontato` `data_contato`, 
					`tsistema_registrocontato`.`regcon_horadocontato` `hora_contato`, 
					`tsistema_registrocontato`.`regcon_descricao` `descricao`
				FROM `tsistema_registrocontato`
				LEFT JOIN `tsistema_usuarios`
				ON `tsistema_usuarios`.`usu_cpf` = `tsistema_registrocontato`.`TSistema_Usuarios_usu_cpf`
				LEFT JOIN `tsistema_clientes`
				ON `tsistema_clientes`.`cli_codigo` = `tsistema_registrocontato`.`TSistema_Clientes_cli_codigo`
				LEFT JOIN `tauxiliar_meiocontato`
				ON `tauxiliar_meiocontato`.`meicon_codigo` = `tsistema_registrocontato`.`TAuxiliar_MeioContato_meicon_codigo`
				WHERE `tsistema_clientes`.`cli_cpfcnpj` = (SELECT `cli_cpfcnpj` FROM `tsistema_clientes`WHERE `cli_cpfcnpj` = '" . $clicpfcnpj ."') AND `regcon_datadocontato` BETWEEN '" . $date_inicial2 ."' and '" . $date_final2 ."'
					");
	}
}