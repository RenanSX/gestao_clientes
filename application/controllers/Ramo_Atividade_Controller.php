<?php

class Ramo_Atividade_Controller extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if(empty($this->session->userdata('usu_codigo'))) {
            $this->session->set_flashdata('flash_data', 'Você não tem acesso');
            redirect('login');
        }

		$this->load->model('Ramo_Atividade_Model', 'ramo_atividade');
	}


	public function cadastrar(){
		$this->load->view('template/cabecalho');
		$this->load->view('ramo_atividades/atividade_cadastrar');
		$this->load->view('template/rodape');
	}

	public function cadastrar_salvar(){
		$this->form_validation->set_rules('ramati_descricao', 'Ramo de atividade', 'required');

		if($this->form_validation->run() === FALSE){
			$this->cadastrar();
		}else{
			$ramati_descricao = $this->input->post('ramati_descricao');

			$data = [
				'ramati_descricao' => $ramati_descricao
			];

			$retorno = $this->ramo_atividade->cadastrar($data);

			if($retorno > 0){
				echo "<script>
					alert('Ramo de atividade cadastrado com sucesso!');
					window.location.href='cadastrar';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao cadastrar ramo de atividade!');
					window.location.href='cadastrar';
					</script>";
			}
		}
		
	}


	public function consultar(){

		$listarramoatividades = $this->ramo_atividade->buscarTodos();

		$data['ramo_atividades'] = $listarramoatividades;

		$this->load->view('template/cabecalho');
		$this->load->view('ramo_atividades/atividade_consultar', $data);
		$this->load->view('template/rodape');
	}

	public function excluir($id){
		$retorno = $this->ramo_atividade->excluir($id);

		if($retorno > 0){
			echo "<script>
					alert('Ramo de atividade excluído com sucesso!');
					window.location.href = '" . base_url() . "ramo_atividade/consultar';
					</script>";
		}else{
			echo "<script>
					alert('Erro ao excluir ramo de atividade!');
					window.location.href = '" . base_url() . "ramo_atividade/consultar';
					</script>";
		}
	}

	public function alterar($id){
		$ramati_codigo = $this->db->query("SELECT `ramati_codigo` FROM `tauxiliar_ramoatividade` WHERE `ramati_codigo` = ".$id)->row()->ramati_codigo;
		
		if($ramati_codigo == $id){
			$ramo_atividade = $this->ramo_atividade->buscarCodigo($id);

			$data['ramo_atividades'] = $ramo_atividade;

			$this->load->view('template/cabecalho');
			$this->load->view('ramo_atividades/atividade_alterar', $data);
			$this->load->view('template/rodape');
		}else{
			echo "Ramo de atividade não existe!";
		}
	} 

	public function alterar_salvar($id){

		$this->form_validation->set_rules('ramati_descricao', 'Ramo de atividade', 'required');

		if($this->form_validation->run() === FALSE){
			$this->alterar($id);
		}else{
			$ramo_atividade = $this->input->post('ramati_descricao');

			$data = [
				'ramati_descricao' => $ramo_atividade
			];

			$retorno = $this->ramo_atividade->alterar($data, $id);

			if($retorno > 0){
				echo "<script>
					alert('Ramo de atividade alterado com sucesso!');
					window.location.href = '" . base_url() . "ramo_atividade/alterar/$id';
					</script>";
			}else{
				echo "<script>
					alert('Erro ao alterar ramo de atividade');
					window.location.href = '" . base_url() . "ramo_atividade/alterar/$id';
					</script>";
			}
		}
	}
}