<?php
class ArtigoExterno{
	private $id;
	private $acao;
	private $link;
	function __construct($acao="", $link="", $id=0){
		$this->id = $id;
		$this->acao=$acao;
		$this->link=$link;
	}

	public function getId(){
		return $this->id;
	}

	public function getAcao(){
		return $this->acao;
	}

	public function getLink(){
		return $this->link;
	}
}
 ?>
