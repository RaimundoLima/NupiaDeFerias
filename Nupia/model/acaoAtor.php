<?php 

class AcaoAtor{
	private $id;
	private $idAtor;
	private $idAcao;
	private $titulo;
	private $justificativa;
	private $objetivo;
	private $metodologia;
	private $resultadoEsperado;
	private $impactoEsperado;
	function __construct($idAtor, $idAcao, $titulo, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado, $id=0){
		
		$this->id = $id;
		$this->idAtor = $idAtor;
		$this->idAcao = $idAcao;
		$this->titulo = $titulo;
		$this->justificativa = $justificativa;
		$this->objetivo = $objetivo;
		$this->metodologia = $metodologia;
		$this->resultadoEsperado = $resultadoEsperado;
		$this->impactoEsperado = $impactoEsperado;
	}
	public function getId(){
		return $this->id;
	}

	public function getIdAtor(){
		return $this->idAtor;
	}

	public function getIdAcao(){
		return $this->idAcao;
	}

	public function getTitulo(){
		return $this->titulo;
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