<?php
class Arquivo{
	private $id;
	private $acao;
	private $nome;
	private $documento;
	private $diretorio;
	private $tipo;

	function __construct($acao, $nome, $documento, $diretorio, $tipo="comum" $id=0){
		$this->id = $id;
		$this->acao = $acao;
		$this->nome = $nome;
		$this->documento = $documento;
		$this->diretorio = $diretorio;
		$this->tipo = $tipo;
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
	public function getDocumento(){
		return $this->documento;
	}
	public function getDiretorio(){
		return $this->diretorio;
	}
	public function getTipo(){
		return $this->tipo;
	}
}
?>
