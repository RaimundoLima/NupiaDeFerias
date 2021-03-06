<?php

class Acao {
	private $id;
	private $eixo;
	private $projeto;
	private $titulo;
	private $tema;
	private $apresentacao;
	private $palavraChave;
	private $prevInicio;
	private $prevTermino;
	private $situacao;

	public function __construct($eixo, $projeto, $titulo, $tema, $apresentacao, $palavraChave, $prevInicio=NULL, $prevTermino=NULL, $situacao="0", $id=0){
		$this->eixo = $eixo;
		$this->projeto = $projeto;
		$this->titulo = $titulo;
		$this->tema = $tema;
		$this->apresentacao = $apresentacao;
		$this->palavraChave = $palavraChave;
		$this->prevInicio = $prevInicio;
		$this->prevTermino = $prevTermino;
		$this->situacao = $situacao;
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function getEixo(){
		return $this->eixo;
	}
	public function getProjeto(){
		return $this->projeto;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getTema(){
		return $this->tema;
	}
	public function getApresentacao(){
		return $this->apresentacao;
	}
	public function getPalavraChave(){
		return $this->palavraChave;
	}
	public function getPrevInicio(){
		return $this->prevInicio;
	}
	public function getPrevTermino(){
		return $this->prevTermino;
	}
	public function getSituacao(){
		return $this->situacao;
	}
}
?>
