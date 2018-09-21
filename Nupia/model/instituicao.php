<?php
class Instituicao {

  private $id;
  private $nome;
  private $situacao;

  function __construct($nome="", $situacao="", $id=0){
    $this->nome = $nome;
    $this->situacao = $situacao;
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getSituacao(){
    return $this->situacao;
  }

}
 ?>
