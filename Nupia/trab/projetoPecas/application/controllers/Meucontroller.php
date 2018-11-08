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
        $this->load->model('Crud','cr');
	}


	public function index()
	{   

		$this->load->view('menucrud');
		$this->load->view('meu_formulario_view_crud');
	}

	public function savedata()
	{
	
		$this->form_validation->set_rules('nome','PEÇA','trim|required|max_length[50]|ucwords');

		$this->form_validation->set_rules('quantidade','QUANTIDADE', 'is_numeric|required');

		$this->form_validation->set_rules('preco','PRECO', 'is_numeric|required');


		
		$this->form_validation->set_message('required','O campo %s não pode ser vazio.');

		$this->form_validation->set_message('is_numeric','O campo %s deve ser decimal ou inteiro');


		if($this->form_validation->run()){			
            $dados = elements(array('nome','quantidade','preco'),$this->input->post());  	
            print_r($dados);
            $this->cr->do_insert($dados);
        }

        $this->index();// apresenta ambas as telas novamente.

	}

	public function retrievedata(){
		$dados['conteudo'] = $this->cr->retrieve_data();
		$this->load->view("menucrud");
		$this->load->view("apresentacao",$dados);
	}


}
