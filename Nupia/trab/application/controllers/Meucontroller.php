<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meucontroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
    $this->load->helper('array');
    $this->load->library('form_validation');
    $this->load->model('Usuario','user');
		$this->load->model('Multa','mult');
		$this->load->model('Livro','liv');
		$this->load->model('Emprestimo','emp');
	}


	public function index(){

		$this->load->view('menucrud');
		$this->load->view('meu_formulario_view_crud');
	}

	public function adicionarUsuario(){

  	$dados = array('rg' => $this->input->post('rg'), 'email' => $this->input->post('email'), 'senha' => $this->input->post('senha'), 'endereco' => $this->input->post('enderecp'));
    $this->user->adicionar($dados);
    $this->index();
	}

	public function editarUsuario(){

		$dados = array('rg' => $this->input->post('rg'), 'email' => $this->input->post('email'), 'senha' => $this->input->post('senha'), 'endereco' => $this->input->post('enderecp'));
		$this->user->editar($dados);
		$this->load->view('menucrud');
		$this->load->view("apresentacao",$dados);
	}

	public function pesquisarUsuario(){
		$dados = elements(array('rg'),$this->input->post());
		$result['conteudo'] = $this->user->pesquisar($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function listarUsuario(){
		$result['conteudo'] = $this->user->listar();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function entrar(){
		if($this->input->post('email') =='ADMIN' and $this->input->post('senha') == 'ADMIN'){
			$this->session->set_userdata("usuario", $this->input->post('email'));
		}else{
			$dados = array('email' => $this->input->post('email'), 'senha' => $this->input->post('senha'));
			$this->user->entrar($dados);
		}
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}

	public function deleteUsuario(){
		$dados = elements(array('rg'), $this->input->get());
		$dados['conteudo'] = $this->user->delete($dados);
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}
	public function login(){
		$this->load->view("menucrud");
		$this->load->view("login");
	}

	public function adicionarLivro(){

		$dados = array('id' => $this->input->post('id'), 'titulo' => $this->input->post('titulo'), 'autor' => $this->input->post('autor'), 'quantidadeTotal' => $this->input->post('quantidadeTotal'), 'quantidadeDisponivel' => $this->input->post('quantidadeDisponivel'));
		$this->liv->adicionar($dados);
		$this->index();
	}

	public function editarLivro(){

		$dados = array('id' => $this->input->post('id'), 'titulo' => $this->input->post('titulo'), 'autor' => $this->input->post('autor'), 'quantidadeTotal' => $this->input->post('quantidadeTotal'), 'quantidadeDisponivel'=> $this->input->post('quantidadeDisponivel'));
		$this->liv->editar($dados);
		$this->load->view('menucrud');
		$this->load->view("apresentacao",$dados);
	}

	public function pesquisarLivro(){
		$dados = elements(array('id'),$this->input->post());
		$result['conteudo'] = $this->liv->pesquisar($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function listarLivro(){
		$result['conteudo'] = $this->liv->listar();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function deleteLivro(){
		$dados = elements(array('id'), $this->input->get());
		$dados['conteudo'] = $this->liv->delete($dados);
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}

	public function adicionarEmprestimo(){

		$dados = array('id' => $this->input->post('id'), 'idLivro' => $this->input->post('idLivro'), 'idUsuario' => $this->input->post('idUsuario'), 'dataDeRetirada' => $this->input->post('dataDeRetirada'), 'dataPrevisaoDeEntrega' => $this->input->post('dataDeEntrega'));
		$this->emp->adicionar($dados);
		$this->index();
	}

	public function editarEmprestimo(){

	  $dados = array('id' => $this->input->post('id'), 'idLivro' => $this->input->post('idLivro'), 'idUsuario' => $this->input->post('idUsuario'), 'dataDeRetirada' => $this->input->post('dataDeRetirada'), 'dataPrevisaoDeEntrega' => $this->input->post('dataDeEntrega'));
		$this->emp->editar($dados);
		$this->load->view('menucrud');
		$this->load->view("apresentacao",$dados);
	}

	public function pesquisarEmprestimo(){
		$dados = elements(array('id'),$this->input->post());
		$result['conteudo'] = $this->emp->pesquisar($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function pesquisarEmprestimoByLivro(){
		$dados = elements(array('idLivro'),$this->input->post());
		$result['conteudo'] = $this->emp->pesquisarByLivro($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function pesquisarEmprestimoByUsuario(){
		$dados = elements(array('idUsuario'),$this->input->post());
		$result['conteudo'] = $this->emp->pesquisarByUsuario($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function listarEmprestimo(){
		$result['conteudo'] = $this->emp->listar();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function deleteEmprestimo(){
		$dados = elements(array('id'), $this->input->get());
		$dados['conteudo'] = $this->emp->delete($dados);
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}

	public function adicionarMulta(){

		$dados = array('id' => $this->input->post('id'), 'idEmprestimo' => $this->input->post('idEmprestimo'), 'valor' => $this->input->post('valor'));
		$this->mult->adicionar($dados);
		$this->index();
	}

	public function editarMulta(){


		$this->mult->editar($dados);
		$this->load->view('menucrud');
		$this->load->view("apresentacao",$dados);
	}

	public function pesquisarMulta(){
		$dados = elements(array('id'),$this->input->post());
		$result['conteudo'] = $this->mult->pesquisar($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function pesquisarMultaByEmprestimo(){
		$dados = elements(array('idEmprestimo'),$this->input->post());
		$result['conteudo'] = $this->mult->pesquisarByLivro($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function listarMulta(){
		$result['conteudo'] = $this->mult->listar();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function deleteMulta(){
		$dados = elements(array('id'), $this->input->get());
		$dados['conteudo'] = $this->mult->delete($dados);
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}

	public function login(){
		$this->load->view("menucrud");
		$this->load->view("login");
	}


	public function cadastrar(){
		$this->load->view("menucrud");
		$this->load->view("cadastro");
	}

	public function logout(){
		session_destroy();
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}
/*	public function pag($value=null){
			if($value==null){
				$value=0
			}
			$reg_p_pagina = 1;
			if ($value <= $reg_p_pag) {
				$data['btnA'] = 'disabled';
			}else{
				$data['btnA'] = '';
			}
	} */
}
