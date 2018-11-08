<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('array');
        $this->load->helper('file');
        $this->load->helper('url');

        //$this->load->library('database');

    }

    public function adicionar($dados=NULL){
    //    echo "entrei";
        if ($dados!=NULL):

           // $datastr=$dados["peca"] .",".$dados["quantidade"] . //",". $dados["preco"];
           // echo $datastr;

            $this->db->insert('usuario', $dados);


           // if ( ! write_file('./file.txt', $datastr)){
           //     echo "Não posso escrever no arquivo.";
           // }else{echo "ok!";}

           // redirect('Meucontroller');
        endif;
    }

    public function listar($sort='nome',$order='asc'){

        $this->db->order_by($sort, $order);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }

    public function pesquisar($dados=NULL,$sort='nome',$order='asc'){

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('rg', $dados['rg']);
        $this->db->order_by($sort, $order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }
     public function editar($dados=NULL){
        //var_dump($dados);exit;
        $query = $this->db->where('rg', $dados["rg"]);
        $query = $this->db->update('usuario', $dados);
        }


     public function deletar($dados=NULL){

        $query = $this->db->where('rg', $dados["rg"]);
        $query = $this->db->delete('usuario');

    }

    public function entrar($dados=NULL){
      $this->db->from('usuario');
      $this->db->where('email', $dados["email"]);
      $this->db->where('senha', $dados["senha"]);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
         $usuario = $query->result();
         $this->session->set_userdata("usuario", $usuario[0]->user);
      }else{
        echo "erro no login";
      }
    }

}
