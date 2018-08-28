<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->helper('array');
        $this->load->helper('file');
        $this->load->helper('url');

        //$this->load->library('database');

    }

    public function do_insert($dados=NULL){
    //    echo "entrei";
        if ($dados!=NULL):

           // $datastr=$dados["peca"] .",".$dados["quantidade"] . //",". $dados["preco"];
           // echo $datastr;

            $this->db->insert('automovel', $dados);


           // if ( ! write_file('./file.txt', $datastr)){
           //     echo "Não posso escrever no arquivo.";
           // }else{echo "ok!";}

           // redirect('Meucontroller');
        endif;
    }

    public function retrieve_data($sort='modelo',$order='asc'){

        $this->db->order_by($sort, $order);
        $query = $this->db->get('automovel');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }

    public function pesquisa($dados=NULL,$sort='modelo',$order='asc'){

        $this->db->select('*');
        $this->db->from('automovel');
        $this->db->like('modelo', $dados['modelo']);
        $this->db->order_by($sort, $order);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }
    public function pesquisaMaisBarato(){

        $this->db->select('min(preco) as preco');
        $this->db->from('automovel');
        $query = $this->db->get();
        $preco = $query->result();
        $this->db->select('*');
        $this->db->from('automovel');
        $this->db->where('preco', $preco[0]->preco);
        $query = $this->db->get();
        return $query->result();
    }
    public function pesquisaMaiorQuilometragem(){

      $this->db->select('max(quilometragem) as quilometragem');
      $this->db->from('automovel');
      $query = $this->db->get();
      $quilometragem = $query->result();
      $this->db->select('*');
      $this->db->from('automovel');
      $this->db->where('quilometragem', $quilometragem[0]->quilometragem);
      $query = $this->db->get();
      return $query->result();
    }
    public function pesquisaMenorQuilometragem(){

      $this->db->select('min(quilometragem) as quilometragem');
      $this->db->from('automovel');
      $query = $this->db->get();
      $quilometragem = $query->result();
      $this->db->select('*');
      $this->db->from('automovel');
      $this->db->where('quilometragem', $quilometragem[0]->quilometragem);
      $query = $this->db->get();
      return $query->result();
    }
    public function pesquisaCambio($dados=NULL){

        $this->db->select('*');
        $this->db->from('automovel');
        $this->db->where('cambio', $dados['cambio']);
        $query = $this->db->get();
        return $query->result();
    }
    public function pesquisaCombustivel($dados=NULL){

        $this->db->select('*');
        $this->db->from('automovel');
        $this->db->where('combustivel', $dados['combustivel']);
        $query = $this->db->get();
        return $query->result();
    }
    public function pesquisaCidade($dados=NULL){

        $this->db->select('*');
        $this->db->from('automovel');
        $this->db->where('cidade', $dados['cidade']);
        $query = $this->db->get();
        return $query->result();
    }
     public function update($dados=NULL){
        //var_dump($dados);exit;
        $query = $this->db->where('id', $dados["id"]);
        $query = $this->db->update('automovel', $dados);
        }


     public function delete($dados=NULL){

        $query = $this->db->where('id', $dados["id"]);
        $query = $this->db->delete('automovel');

    }



}
