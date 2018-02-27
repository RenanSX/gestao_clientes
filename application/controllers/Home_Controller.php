<?php

class Home_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }
	}

	public function index() {
        $this->load->view('template/cabecalho');
        $this->load->view('home');
        $this->load->view('template/rodape');
    }
 
    public function logout() {

    	$data = [
    	$this->session->userdata('usu_codigo'),
    	$this->session->userdata('usu_cpf'),
    	];
		
        $this->session->unset_userdata($data);
 		session_destroy();
        redirect('login');
    }
}