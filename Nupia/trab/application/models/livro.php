<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Livro extends CI_Model{

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

            $this->db->insert('livro', $dados);


           // if ( ! write_file('./file.txt', $datastr)){
           //     echo "Não posso escrever no arquivo.";
           // }else{echo "ok!";}

           // redirect('Meucontroller');
        endif;
    }

    public function listar($sort='titulo',$order='asc'){

        $this->db->order_by($sort, $order);
        $query = $this->db->get('livro');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }

    public function pesquisar($dados=NULL,$sort='titulo',$order='asc'){

        $this->db->select('*');
        $this->db->from('livro');
        $this->db->where('titulo', $dados['titulo']);
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
        $query = $this->db->update('livro', $dados);
        }


     public function deletar($dados=NULL){

        $query = $this->db->where('id', $dados["id"]);
        $query = $this->db->delete('livro');

    }


}
