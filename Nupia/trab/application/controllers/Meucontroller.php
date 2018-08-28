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


	public function index(){

		$this->load->view('menucrud');
		$this->load->view('meu_formulario_view_crud');
	}

	public function savedata(){

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

		$this->load->library('upload', $config);


		//if($this->form_validation->run()){
         //  var_dump($this->upload->do_upload('foto'));
           if ($this->upload->do_upload('foto')){
            	$get_image = base_url().$config['upload_path'].$_FILES['foto']['name'];
            	$dados = array('modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'), 'quilometragem' => $this->input->post('quilometragem'), 'cambio' => $this->input->post('cambio'), 'combustivel' => $this->input->post('combustivel'),'cor' => $this->input->post('cor'), 'foto' => $get_image, 'ano' => $this->input->post('ano'), 'cidade' => $this->input->post('cidade'));
            	$this->cr->do_insert($dados);
            }else {
							$dados = array('modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'), 'quilometragem' => $this->input->post('quilometragem'), 'cambio' => $this->input->post('cambio'), 'combustivel' => $this->input->post('combustivel'),'cor' => $this->input->post('cor'), 'ano' => $this->input->post('ano'), 'cidade' => $this->input->post('cidade'));
            	$this->cr->do_insert($dados);
            }
     	//}
        $this->index();// apresenta ambas as telas novamente.
	}

	public function retrievedata(){
		$dados['conteudo'] = $this->cr->retrieve_data();
		$this->load->view("menucrud");
		$this->load->view("apresentacao",$dados);
	}

	public function pesquisa(){
		$dados = elements(array('modelo'),$this->input->post());
		$result['conteudo'] = $this->cr->pesquisa($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function pesquisaMaisBarato(){
		$result['conteudo'] = $this->cr->pesquisaMaisBarato();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function pesquisaMaiorQuilometragem(){
		$result['conteudo'] = $this->cr->pesquisaMaiorQuilometragem();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function pesquisaMenorQuilometragem(){
		$result['conteudo'] = $this->cr->pesquisaMenorQuilometragem();
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function pesquisaCambio(){
		$dados = elements(array('cambio'),$this->input->post());
		$result['conteudo'] = $this->cr->pesquisaCambio($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function pesquisaCombustivel(){
		$dados = elements(array('combustivel'),$this->input->post());
		$result['conteudo'] = $this->cr->pesquisaCombustivel($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}
	public function pesquisaCidade(){
		$dados = elements(array('cidade'),$this->input->post());
		$result['conteudo'] = $this->cr->pesquisaCidade($dados);
		$this->load->view("menucrud");
		$this->load->view("apresentacao", $result);
	}

	public function update(){
		//var_dump($this->input->post());exit;
		//id	modelo	marca	quilometragem	cambio	combusivel	cor	foto	ano	cidade
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

		$this->load->library('upload', $config);
		//var_dump($this->upload->do_upload('foto'));
		if($this->upload->do_upload('foto')){
			// $get_image = base_url().$config[''].$_FILES['foto']['name'];
			$get_image = base_url().$config['upload_path'].$_FILES['foto']['name'];
            $dados = array('id'=> $this->input->post('id'), 'modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'), 'quilometragem' => $this->input->post('quilometragem'), 'cambio' => $this->input->post('cambio'), 'combustivel' => $this->input->post('combustivel'), 'cor' => $this->input->post('cor'), 'foto' => $get_image, 'ano' => $this->input->post('ano'), 'cidade' => $this->input->post('cidade'));
            	$dados['conteudo'] = $this->cr->update($dados);
			$this->load->view("menucrud");
			$this->load->view("meu_formulario_view_crud");

		}else{

			$dados = array('id'=> $this->input->post('id'), 'modelo' => $this->input->post('modelo'), 'marca' => $this->input->post('marca'), 'quilometragem' => $this->input->post('quilometragem'), 'cambio' => $this->input->post('cambio'), 'combustivel' => $this->input->post('combustivel'), 'cor' => $this->input->post('cor'), 'ano' => $this->input->post('ano'), 'cidade' => $this->input->post('cidade'));
            	$dados['conteudo'] = $this->cr->update($dados);
			$this->load->view("menucrud");
			$this->load->view("meu_formulario_view_crud");

		}
    }



	public function delete(){
		$dados = elements(array('id'), $this->input->get());
		$dados['conteudo'] = $this->cr->delete($dados);
		$this->load->view("menucrud");
		$this->load->view("meu_formulario_view_crud");
	}
}
