<?php

class Meio_Contato_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }
        
		$this->load->model('Meio_Contato_Model', 'meio_contatos');
	}

	public function cadastrar(){
		$this->load->view('template/cabecalho');
		$this->load->view('meio_contatos/meio_contato_cadastrar');
		$this->load->view('template/rodape');
	}

	public function cadastrar_salvar(){

		$this->form_validation->set_rules('meicon_descricao', 'Meio Contato', 'required');

		if($this->form_validation->run() === FALSE){
			$this->cadastrar();
		}else{

			$meicon_descricao = $this->input->post('meicon_descricao');

			$data = [
				'meicon_descricao' => $meicon_descricao
			];

			$retorno = $this->meio_contatos->cadastrar($data);

			if($retorno > 0){
				echo "<script>
					alert('Meio de contato cadastrado com sucesso!');
					window.location.href='cadastrar';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao cadastrar meio de contato!');
					window.location.href='cadastrar';
					</script>";
			}
		}
	}

	public function consultar(){
			$listarmeiocontatos = $this->meio_contatos->buscarTodos();

			$data['meio_contato'] = $listarmeiocontatos;

			$this->load->view('template/cabecalho');
			$this->load->view('meio_contatos/meio_contato_consultar', $data);
			$this->load->view('template/rodape');
		
	}

	public function excluir($id){

		$retorno = $this->meio_contatos->excluir($id);

		if($retorno > 0){
			echo "<script>
					alert('Meio de contato excluído com sucesso!');
					window.location.href = '" . base_url() . "meio_contato/consultar';
					</script>";
		}else{
			echo "<script>
					alert('Erro ao excluir meio de contato!');
					window.location.href = '" . base_url() . "meio_contato/consultar';
					</script>";
		}
	}

	public function alterar($id){
		$meicon_codigo = $this->meio_contatos->busca_meicon_codigo($id);

		if($meicon_codigo == $id){
			$meio_contato = $this->meio_contatos->buscarCodigo($id);

			$data['meio_contato'] = $meio_contato;

			$this->load->view('template/cabecalho');
			$this->load->view('meio_contatos/meio_contato_alterar', $data);
			$this->load->view('template/rodape');
		}else{
			echo "Meio de contato não existe!";
		}
}

	public function alterar_salvar($id){

		$this->form_validation->set_rules('meicon_descricao', 'Meio Contato', 'required');

		if($this->form_validation->run() === FALSE){
			$this->alterar($id);
		}else{

			$meicon_descricao = $this->input->post('meicon_descricao');

			$data = [
				'meicon_descricao' => $meicon_descricao
			];

			$retorno = $this->meio_contatos->alterar($data, $id);

			if($retorno > 0){
				echo "<script>
					alert('Meio de contato alterado com sucesso!');
					window.location.href = '" . base_url() . "meio_contato/alterar/$id';
					</script>";
			}else{
				echo "<script>
					alert('Meio de contato alterado com sucesso!');
					window.location.href = '" . base_url() . "meio_contato/alterar/$id';
					</script>";
			}
		}
	}
}