<?php

class Login_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function logar($data){
		$this->db->where('usu_cpf', $data['usu_cpf']);
		$this->db->where('usu_senha', $data['usu_senha']);

		return $this->db->get('tsistema_usuarios')->row();
	}

	function __destruct() {
        $this->db->close();
    }
}