<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emprestimo extends CI_Model{

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

            $this->db->insert('emprestimo', $dados);


           // if ( ! write_file('./file.txt', $datastr)){
           //     echo "Não posso escrever no arquivo.";
           // }else{echo "ok!";}

           // redirect('Meucontroller');
        endif;
    }

    public function listar(){

        $query = $this->db->get('emprestimo');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }

    public function pesquisarByUsuario($dados=NULL){

        $this->db->select('*');
        $this->db->from('emprestimo');
        $this->db->where('idUsuario', $dados['idUsuario']);
        $this->db->order_by($sort, $order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }
    public function pesquisarByLivro($dados=NULL){

        $this->db->select('*');
        $this->db->from('emprestimo');
        $this->db->where('idLivro', $dados['idLivro']);
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
        $query = $this->db->where('id', $dados["id"]);
        $query = $this->db->update('emprestimo', $dados);
        }


     public function deletar($dados=NULL){

        $query = $this->db->where('id', $dados["id"]);
        $query = $this->db->delete('emprestimo');

    }

}
