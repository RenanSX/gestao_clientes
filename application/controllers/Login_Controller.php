<?php

class Login_Controller extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("Login_Model", "login");

        if(!empty($_SESSION['usu_codigo']))
            redirect('home');
	}

	public function index() {

        $this->load->view('template/rodape');

        if($_POST) {
            $result = $this->login->logar($_POST);
            if(!empty($result)) {
                $data = [
                	'usu_codigo' => $result->usu_codigo,
                    'usu_cpf' => $result->usu_cpf,
                    'usu_nome' => $result->usu_nome,
                    'usu_acessarelatorio' => $result->usu_acessarelatorio
                ];

                $this->session->set_userdata($data);
           
                redirect('home');
            } else {
                $this->session->set_flashdata('flash_data', 'CPF ou senha informados incorretamente!');
                redirect('login');
            }
        }
 
        $this->load->view("login");
    }
}