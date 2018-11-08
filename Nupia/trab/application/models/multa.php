<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multa extends CI_Model{

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

            $this->db->insert('multa', $dados);


           // if ( ! write_file('./file.txt', $datastr)){
           //     echo "Não posso escrever no arquivo.";
           // }else{echo "ok!";}

           // redirect('Meucontroller');
        endif;
    }

    public function listar(){

        $query = $this->db->get('multa');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }

    public function pesquisarByemprestimo($dados=NULL){

        $this->db->select('*');
        $this->db->from('multa');
        $this->db->where('idEmprestimo', $dados['idEmprestimo']);
        $this->db->order_by($sort, $order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }
    public function pesquisar($dados=NULL){

        $this->db->select('*');
        $this->db->from('multa');
        $this->db->where('id', $dados['id']);
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
        $query = $this->db->update('multa', $dados);
        }


     public function deletar($dados=NULL){

        $query = $this->db->where('id', $dados["id"]);
        $query = $this->db->delete('emprestimo');

    }

}
