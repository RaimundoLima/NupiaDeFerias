<?php
	class Projeto{
		private $id;
		private $nome;
		private $descricao;
		private $link;

		function __construct($nome, $descricao, $link, $id=0){
			$this->id = $id;
			$this->nome = $nome;
			$this->descricao = $descricao;
			$this->link = $link;
		}
	
		public function getId(){
			return $this->id;
		}

		public function getNome(){
			return $this->nome;
		}

		public function getDescricao(){
			return $this->descricao;
		}
		public function getLink(){
			return $this->link;
		}
	}
?>
