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

            $this->db->insert('my_table', $dados);


           // if ( ! write_file('./file.txt', $datastr)){
           //     echo "Não posso escrever no arquivo.";
           // }else{echo "ok!";}
            
           // redirect('Meucontroller');
        endif;
    }

    public function retrieve_data($sort='nome',$order='asc'){
    
        $this->db->order_by($sort, $order);
        $query = $this->db->get('my_table');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
        return null;
        }

    }

    
    
}
