<?php

class AcaoAtor{
	private $id;
	private $ator;
	private $acao;
	function __construct($ator, $acao, $id=0){
		$this->id = $id;
		$this->ator = $ator;
		$this->acao = $acao;
	}
	public function getId(){
		return $this->id;
	}

	public function getAtor(){
		return $this->ator;
	}

	public function getAcao(){
		return $this->acao;
	}
}

?>
