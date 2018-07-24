<?php 	
	class Eixo{
		private $id;
		private $nome;
		private $descricao;
		
		function __construct($nome, $descricao, $id=0){
			$this->id = $id;
			$this->nome = $nome;
			$this->descricao = $descricao;
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
	}

?>