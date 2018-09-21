<?php

class AtorInstituicao{
	private $id;
	private $ator;
	private $instituicao;
	function __construct($ator="", $instituicao="", $id=0){
		$this->id = $id;
		$this->ator = $ator;
		$this->instituicao = $instituicao;
	}
	public function getId(){
		return $this->id;
	}

	public function getAtor(){
		return $this->ator;
	}

	public function getInstituicao(){
		return $this->instituicao;
	}
}

?>
