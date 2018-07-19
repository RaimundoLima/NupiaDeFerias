<?php

class Resumo {
	private $id;
	private $acao;
	private $titulo;
	private $ator;
	private $justificativa;
	private $objetivo;
	private $metodologia;
	private $resultadoEsperado;
	private $impactoEsperado;

	public function __construct($titulo, $acao, $ator, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id=0){
		$this->ator = $ator;
		$this->acao = $acao;
		$this->titulo = $titulo;
		$this->justificativa = $justificativa;
		$this->objetivo = $objetivo;
		$this->metodologia = $metodologia;
		$this->resultadoEsperado = $resultadoEsperado;
		$this->impactoEsperado = $impactoEsperado;
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	public function getAcao(){
		return $this->acao;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function getAtor(){
		return $this->ator;
	}
	public function getJustificativa(){
		return $this->justificativa;
	}
	public function getObjetivo(){
		return $this->objetivo;
	}
	public function getMetodologia(){
		return $this->metodologia;
	}
	public function getResultadoEsperado(){
		return $this->resultadoEsperado;
	}
	public function getImpactoEsperado(){
		return $this->impactoEsperado;
	}
}
?>
