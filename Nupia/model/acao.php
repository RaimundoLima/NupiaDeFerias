<?php

class Acao {
	private $id;
	private $resumo;
	private $eixo;
	private $projeto;
	private $titulo;
	private $tema;
	private $palavraChave;
	private $prevInicio;
	private $prevTermino;
	private $situacao;
	
	public function __construct($resumo, $eixo, $projeto, $titulo, $tema, $palavraChave, $prevInicio, $prevTermino, $situacao, $id=0){
		$this->resumo = $resumo;
		$this->eixo = $eixo;
		$this->projeto = $projeto;
		$this->titulo = $titulo;
		$this->tema = $tema;
		$this->palavraChave = $palavraChave;
		$this->prevInicio = $prevInicio;
		$this->prevTermino = $prevTermino;
		$this->situacao = $situacao;
		$this->id = $id;
	}
	public function getEixo(){
		return $this->eixo;
	}
	public function getResumo(){
		return $this->resumo;
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