<?php

class Usuario_Controller extends CI_Controller{

	//cria o construtor e carrega a model alterando o nome para futuras chamadas
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Sao_Paulo");
		$this->load->model('Usuario_Model', 'usuarios');
	}

	//carrega as views
	public function cadastrar(){
		$this->load->view('usuarios/usuario_cadastrar');		
		$this->load->view('template/rodape');
	}

	//função para cadastrar os inputs da view, sendo transformada em array e passada como parametro na função da model
	public function cadastrar_salvar(){

		$this->form_validation->set_rules('usu_cpf', 'CPF', 'required|is_unique[tsistema_usuarios.usu_cpf]');
		$this->form_validation->set_rules('usu_nome', 'Nome', 'required');
		$this->form_validation->set_rules('usu_email', 'E-mail', 'required|is_unique[tsistema_usuarios.usu_email]');
		$this->form_validation->set_rules('usu_senha', 'Senha', 'required');

		if($this->form_validation->run() === FALSE){
			$this->cadastrar();
		}else{
			$cpf = $this->input->post('usu_cpf');
			$nome = $this->input->post('usu_nome');
			$email = $this->input->post('usu_email');
			$senha = $this->input->post('usu_senha');
			$ativo = ($this->input->post('usu_ativo') === 'on');
			$administrador = ($this->input->post('usu_acessarelatorio') === 'on');
			$datenow_cadastro = date('Y-m-d H:i:s');

			$data = [
			'usu_cpf' => $cpf,
			'usu_nome' => $nome,
			'usu_email' => $email,
			'usu_senha' => $senha,
			'usu_ativo' => $ativo,
			'usu_datahorainclusao' => $datenow_cadastro,
			'usu_acessarelatorio' => $administrador
			];

			$retorno = $this->usuarios->cadastrar($data);

			if($retorno > 0){
				echo "<script>
					alert('Usuário cadastrado com sucesso!');
					window.location.href='cadastrar';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao cadastrar usuário!');
					window.location.href='cadastrar';
					</script>";
			}
		}	
	}

	//
	public function consultar(){

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }

		$teste = $this->session->userdata('usu_acessarelatorio');
        if($teste < 1){
        	$this->session->set_flashdata('flash_data', 'Você não tem acesso a consultar usuários');
        	redirect('home');
        }

		$listarusuarios = $this->usuarios->buscarTodos();

		$data['usuarios'] = $listarusuarios;		

		$this->load->view('template/cabecalho');
		$this->load->view('usuarios/usuario_consultar', $data);
		$this->load->view('template/rodape');		
	}


	//apenas chama a função do model, como parametro ele recebe o id da url
	public function excluir($id){

		$retorno = $this->usuarios->excluir($id);

		if($retorno > 0){
			echo "<script>
					alert('Usuário excluído com sucesso!');
					window.location.href = '" . base_url() . "usuario/consultar';
					</script>";
		}else{
			echo "<script>
					alert('Erro ao excluir usuário!');
					window.location.href = '" . base_url() . "usuario/consultar';
					</script>";
		}
	}

	public function alterar($id){

		$usu_codigo = $this->usuarios->busca_usu_codigo($id);
		;

		if( $usu_codigo === $id){
			$usuario  = $this->usuarios->buscarCodigo($id);

			$data['usuario'] = $usuario;

			$this->load->view('template/cabecalho');
			$this->load->view('usuarios/usuario_alterar', $data);
			$this->load->view('template/rodape');
			}else{
				echo "Usuario nao existe";
			}
		}

	public function alterar_salvar($id){

		$usu_email = $this->usuarios->busca_usu_email($id);
		    if($this->input->post('usu_email') != $usu_email) {
		       $this->form_validation->set_rules('usu_email', 'Email', 'required|is_unique[tsistema_usuarios.usu_email]');
		    }
		    
	    $usu_cpf = $this->usuarios->busca_usu_cpf($id);
		    if($this->input->post('usu_cpf') != $usu_cpf) {
		      $this->form_validation->set_rules('usu_cpf', 'CPF', 'required|is_unique[tsistema_usuarios.usu_cpf]');
		    }

		$this->form_validation->set_rules('usu_nome', 'Nome', 'required');
		$this->form_validation->set_rules('usu_senha', 'Senha', 'required');

		if($this->form_validation->run() === FALSE){
			$this->alterar($id);
		}else{
			$cpf = $this->input->post('usu_cpf');
			$nome = $this->input->post('usu_nome');
			$email = $this->input->post('usu_email');
			$senha = $this->input->post('usu_senha');
			$ativo = ($this->input->post('usu_ativo') === 'on');
			$administrador = ($this->input->post('usu_acessarelatorio') === 'on');

			$data = [
			'usu_cpf' => $cpf,
			'usu_nome' => $nome,
			'usu_email' => $email,
			'usu_senha' => $senha,
			'usu_ativo' => $ativo,
			'usu_acessarelatorio' => $administrador
			];

			$retorno = $this->usuarios->alterar($data, $id);

			if($retorno > 0){
				echo "<script>
					alert('Usuário alterado com sucesso!');
					window.location.href = '" . base_url() . "usuario/alterar/$id';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao alterar usuário!');
					window.location.href = '" . base_url() . "usuario/alterar/$id';
					</script>";
			}
		}
	}
}