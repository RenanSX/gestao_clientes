<?php

class Cliente_Controller extends CI_Controller{
	//cria o construtor e carrega a model alterando o nome para futuras chamadas
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Sao_Paulo");
		$this->load->model('Cliente_Model', 'clientes');

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }	
	}

	public function buscarAtividade(){
		$ramoatividades = $this->clientes->buscarTodasAtividades();
		$data['ramo_atividade'] = $ramoatividades;

		$this->load->view('template/cabecalho');
		$this->load->view('clientes/cliente_cadastrar', $data);
		$this->load->view('template/rodape');
	}

	//carrega as views
	public function cadastrar(){
		$this->load->view('template/cabecalho');
		$this->load->view('clientes/cliente_cadastrar');
		$this->load->view('template/rodape');
	}

	public function cadastrar_salvar(){
		$this->form_validation->set_rules('cli_cpfcnpj', 'CPF ou CNPJ', 'required|is_unique[tsistema_clientes.cli_cpfcnpj]');
		$this->form_validation->set_rules('cli_nomerazaosocial', 'Nome razão social', 'required');
		$this->form_validation->set_rules('cli_endereco', 'Endereço', 'required');
		$this->form_validation->set_rules('cli_endereco_numero', 'Endereço número', 'required');
		$this->form_validation->set_rules('cli_endereco_complemento', 'Endereço complemento', 'required');
		$this->form_validation->set_rules('cli_telefonecomercial', 'Telefone Comercial', 'required');
		$this->form_validation->set_rules('cli_telefonecelular', 'Telefone Celular', 'required');
		$this->form_validation->set_rules('cli_nomedocontato', 'Nome contato', 'required');
		$this->form_validation->set_rules('cli_email', 'Email', 'required|is_unique[tsistema_clientes.cli_email]');
		$this->form_validation->set_rules('cli_site', 'Site' ,'required');
		$this->form_validation->set_rules('ramati_descricao', 'Ramo de atividade', 'required');

		if($this->form_validation->run() === FALSE){
			$this->cadastrar();
		}else{

			$cpfcnpj = $this->input->post('cli_cpfcnpj');
			$nomerazaosocial = $this->input->post('cli_nomerazaosocial');
			$endereco = $this->input->post('cli_endereco');
			$endereco_numero = $this->input->post('cli_endereco_numero');
			$endereco_complemento = $this->input->post('cli_endereco_complemento');
			$telefonecomercial = $this->input->post('cli_telefonecomercial');
			$telefonecelular = $this->input->post('cli_telefonecelular');
			$nomedocontato = $this->input->post('cli_nomedocontato');
			$email = $this->input->post('cli_email');
			$site = $this->input->post('cli_site');
			$ramatidescricao = $this->input->post('ramati_descricao');
			$datenow_cadastro = date('Y-m-d H:i:s');

			$codigo_ramati =  $this->clientes->busca_ramati_descricao($ramatidescricao);

			$codigo_login = $this->session->userdata('usu_codigo');

			$cpf_usu = $this->clientes->busca_usu_cpf($codigo_login);
			
			//var_dump($cpf_usu);
			//exit();

			$data = [
				'TAuxiliar_RamoAtividade_ramati_codigo' => $codigo_ramati,
				'Tsistema_Usuarios_usu_cpf' => $cpf_usu,
				'cli_cpfcnpj' => $cpfcnpj,
				'cli_nomerazaosocial' => $nomerazaosocial,
				'cli_endereco' => $endereco,
				'cli_endereco_numero' => $endereco_numero,
				'cli_endereco_complemento' => $endereco_complemento,
				'cli_telefonecomercial' => $telefonecomercial,
				'cli_telefonecelular' => $telefonecelular,
				'cli_nomedocontato' => $nomedocontato,
				'cli_datahorainclusao' => $datenow_cadastro, 
				'cli_email' => $email,
				'cli_site' => $site				
			];		


			$retorno = $this->clientes->cadastrar($data);

			
			if($retorno >0){
				echo "<script>
					alert('Cliente cadastrado com sucesso!');
					window.location.href='cadastrar';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao cadastrar cliente!');
					window.location.href='cadastrar';
					</script>";
			}		
		}
	}


	public function consultar(){

		$listaclientes = $this->clientes->buscarTodos();

		$data['cliente'] = $listaclientes;

		$this->load->view('template/cabecalho');
		$this->load->view('clientes/cliente_consultar', $data);
		$this->load->view('template/rodape');	
	}

	public function alterar($id){
		$cliente = $this->clientes->buscarCodigo($id);

		if(!empty($cliente)){

			$data['cliente'] = $cliente;

			$this->load->view('template/cabecalho');
			$this->load->view('clientes/cliente_alterar', $data);
			$this->load->view('template/rodape');
		}else{
			echo "Cliente não existe!";
		}
	}

	public function alterar_salvar($id){

		$cli_email = $this->clientes->cli_email($id);
	    if($this->input->post('cli_email') != $cli_email) {
	       $this->form_validation->set_rules('cli_email', 'Email', 'required|is_unique[tsistema_clientes.cli_codigo]');
	    }

    	$cli_cpfcnpj = $this->clientes->cli_cpfcnpj($id);
	    if($this->input->post('cli_cpfcnpj') != $cli_cpfcnpj) {
	      $this->form_validation->set_rules('cli_cpfcnpj', 'CPF', 'required|is_unique[tsistema_clientes.cli_cpfcnpj]');
	    }

		$this->form_validation->set_rules('cli_nomerazaosocial', 'Nome razão social', 'required');
		$this->form_validation->set_rules('cli_endereco', 'Endereço', 'required');
		$this->form_validation->set_rules('cli_endereco_numero', 'Endereço número', 'required');
		$this->form_validation->set_rules('cli_endereco_complemento', 'Endereço complemento', 'required');
		$this->form_validation->set_rules('cli_telefonecomercial', 'Telefone Comercial', 'required');
		$this->form_validation->set_rules('cli_telefonecelular', 'Telefone Celular', 'required');
		$this->form_validation->set_rules('cli_nomedocontato', 'Nome contato', 'required');
		$this->form_validation->set_rules('cli_site', 'Site' ,'required');

		if($this->form_validation->run() === FALSE){
			$this->alterar($id);
		}else{

			$cpfcnpj = $this->input->post('cli_cpfcnpj');
			$nomerazaosocial = $this->input->post('cli_nomerazaosocial');
			$endereco = $this->input->post('cli_endereco');
			$endereco_numero = $this->input->post('cli_endereco_numero');
			$endereco_complemento = $this->input->post('cli_endereco_complemento');
			$telefonecomercial = $this->input->post('cli_telefonecomercial');
			$telefonecelular = $this->input->post('cli_telefonecelular');
			$nomedocontato = $this->input->post('cli_nomedocontato');
			$email = $this->input->post('cli_email');
			$site = $this->input->post('cli_site');
			$datenow_alteracao = date('Y-m-d H:i:s');

			$data = [
				'cli_cpfcnpj' => $cpfcnpj,
				'cli_nomerazaosocial' => $nomerazaosocial,
				'cli_endereco' => $endereco,
				'cli_endereco_numero' => $endereco_numero,
				'cli_endereco_complemento' => $endereco_complemento,
				'cli_telefonecomercial' => $telefonecomercial,
				'cli_telefonecelular' => $telefonecelular,
				'cli_nomedocontato' => $nomedocontato,
				'cli_datahoraultimaalteracao' => $datenow_alteracao,
				'cli_email' => $email,
				'cli_site' => $site
			];

			$retorno = $this->clientes->alterar($data, $id);

			if($retorno > 0){
				echo "<script>
					alert('Cliente alterado com sucesso!');
					window.location.href = '" . base_url() . "cliente/alterar/$id';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao alterar cliente!');
					window.location.href = '" . base_url() . "cliente/alterar/$id';
					</script>";
			}
		}
	}

	public function excluir($id){
		$retorno = $this->clientes->excluir($id);

		if($retorno > 0){
			echo "<script>
					alert('Cliente excluído com sucesso!');
					window.location.href = '" . base_url() . "cliente/consultar';
					</script>";
		}else{
			echo "<script>
					alert('Erro ao excluir cliente!');
					window.location.href = '" . base_url() . "cliente/consultar';
					</script>";
		}

	}
}
