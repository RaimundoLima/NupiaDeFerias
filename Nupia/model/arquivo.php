<?php
class Arquivo{
	private $id;
	private $acao;
	private $nome;

	function __construct($acao, $nome, $id=0){
		$this->id = $id;
		$this->acao = $acao;
		$this->nome = $nome;
	}
	public function getId(){
		return $this->id;
	}
	public function getAcao(){
		return $this->acao;
	}
	public function getNome(){
		return $this->nome;
	}
}

?>
