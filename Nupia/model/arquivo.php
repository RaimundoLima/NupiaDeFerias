<?php
class Arquivo{
	private $id;
	private $acao;
	private $nome;
	private $documento;
	private $diretorio;

	function __construct($acao, $nome, $documento, $diretorio, $id=0){
		$this->id = $id;
		$this->acao = $acao;
		$this->nome = $nome;
		$this->documento = $documento;
		$this->diretorio = $diretorio;
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
}
?>
