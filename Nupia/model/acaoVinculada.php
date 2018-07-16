<?php 

class AcaoVinculada{
	private $id;
	private $acao1;
	private $acao2;
	function __construct($acao1, $acao2, $id=0){
		$this->id = $id;
		$this->acao1=$acao1;
		$this->acao2=$acao2;
	}

	public function getId(){
		$this->id = $id;
	}

	public function getAcao1(){
		return $this->acao1;
	}

	public function getAcao2(){
		return $this->acao2;
	}
}



?>