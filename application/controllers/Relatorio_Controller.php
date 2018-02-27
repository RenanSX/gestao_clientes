<?php

class Relatorio_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('Relatorio_Model', 'relatorio');

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }

        $teste = $this->session->userdata('usu_acessarelatorio');
        if($teste < 1){
        	$this->session->set_flashdata('flash_data', 'Você não tem acesso a aba de relatórios');
        	redirect('home');
        }
	}

	public function consultar_cliente(){
		$listaclientes = $this->relatorio->buscar_todos_clientes();

		$data['cliente'] = $listaclientes;

		$this->load->view('template/cabecalho');
		$this->load->view('relatorios/relatorio_cliente', $data);
		$this->load->view('template/rodape');
	}

	public function contato_cliente(){

		$listaclientes = $this->relatorio->buscar_todos_clientes();
		$data['cliente'] = $listaclientes;

		$this->load->view('template/cabecalho');
		$this->load->view('relatorios/relatorio_contato_cliente', $data);
		$this->load->view('template/rodape');	
	}

	public function consultar_contato_cliente(){
		
		$cli_nomerazaosocial = $this->input->post('cli_nomerazaosocial');
		$data_inicial = $this->input->post('regcon_datadocontato_inicial');
		$data_final = $this->input->post('regcon_datadocontato_final');

		$date_inicial1 = str_replace('/', '-', $data_inicial);
		$date_inicial2 = date('Y-m-d',strtotime($date_inicial1));

		$date_final1 = str_replace('/', '-', $data_final);
		$date_final2 = date('Y-m-d',strtotime($date_final1));


		$clicpfcnpj = $this->relatorio->busca_clicpfcnpj($cli_nomerazaosocial);

		$contato_registro = $this->relatorio->relatorio($clicpfcnpj, $date_inicial2, $date_final2);

		$data['registro_contato'] = $contato_registro->result();

		$this->load->view('template/cabecalho');
		$this->load->view('relatorios/relatorio_consulta_contato_cliente', $data);
		$this->load->view('template/rodape');	
	}

}