<?php

class Registro_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Sao_Paulo");
		$this->load->model('Registro_Model', 'registro');

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }
	}

	public function cadastrar(){
		$this->load->view('template/cabecalho');
		$this->load->view('template/rodape');

		$listarmeiocontatos = $this->registro->buscarTodosContatos();
		$data['meio_contato'] = $listarmeiocontatos;

		$listaclientes = $this->registro->buscarTodosClientes();
		$data['cliente'] = $listaclientes;
	}

	public function cadastrar_salvar(){
		$this->form_validation->set_rules('cli_nomerazaosocial', 'Cliente', 'required');
		$this->form_validation->set_rules('meicon_descricao', 'Meio de contato', 'required');
		$this->form_validation->set_rules('regcon_datadocontato', 'Data do contato', 'required');
		$this->form_validation->set_rules('regcon_horadocontato', 'Hora do contato', 'required');
		$this->form_validation->set_rules('regcon_assuntodocontato', 'Assunto do contato', 'required');
		$this->form_validation->set_rules('regcon_descricao', 'Descrição', 'required');

		if($this->form_validation->run() === FALSE){
			$this->cadastrar();
		}else{
			$cli_nomerazaosocial = $this->input->post('cli_nomerazaosocial');
			$meicon_descricao = $this->input->post('meicon_descricao');
			$regcon_datadocontato = $this->input->post('regcon_datadocontato');
			$regcon_horadocontato = $this->input->post('regcon_horadocontato');
			$regcon_assuntodocontato = $this->input->post('regcon_assuntodocontato');
			$regcon_descricao = $this->input->post('regcon_descricao');
			$datenow_cadastro = date('Y-m-d H:i:s');

			$codigo_cli = $this->registro->busca_cli_codigo($cli_nomerazaosocial);

			$codigo_meicon = $this->registro->busca_meiconcodigo($meicon_descricao);
			
			$date = str_replace('/', '-', $regcon_datadocontato);
			$date2 = date('Y-m-d',strtotime($date));

			$codigo_login = $this->session->userdata('usu_codigo');
			$cpf_usu = $this->registro->busca_cpf_usu($codigo_login);

			$data = [
				'TSistema_Clientes_cli_codigo' => $codigo_cli,
				'TAuxiliar_MeioContato_meicon_codigo' => $codigo_meicon,
				'TSistema_Usuarios_usu_cpf' => $cpf_usu,
				'regcon_datadocontato' => $date2,
				'regcon_horadocontato' => $regcon_horadocontato,
				'regcon_assuntodocontato' => $regcon_assuntodocontato,
				'regcon_descricao' => $regcon_descricao,
				'regcon_datahorainclusao' => $datenow_cadastro
			];


			$retorno = $this->registro->cadastrar($data);

			if($retorno > 0){				
				echo "<script>
					alert('Registro cadastrado com sucesso!');
					window.location.href='cadastrar';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao cadastrar registro!');
					window.location.href='cadastrar';
					</script>";
			}
		}
	}

	public function consultarMeioContato(){

		$listarmeiocontatos = $this->registro->buscarTodosContatos();
		$data['meio_contato'] = $listarmeiocontatos;

		$listaclientes = $this->registro->buscarTodosClientes();
		$data['cliente'] = $listaclientes;

		$this->load->view('template/cabecalho');
		$this->load->view('registros/registro_cadastrar', $data);
		$this->load->view('template/rodape');
	}

	

}