<?php 
 	class Ator{
 		private $id;
 		private $nome;
 		private $tipo;
 		private $senha;
 		private $email;
 		private $codigo;
 		function __construct($nome, $tipo, $senha, $email, $codigo, $id=0){
 			$this->id = $id;
 			$this->nome = $nome;
 			$this->tipo = $tipo;
 			$this->senha = $senha;
 			$this->email = $email;
 			$this->codigo = $codigo;
 		}

 		public function getId(){
 			return $this->id;
 		}

 		public function getNome(){
 			return $this->nome;
 		}
 		public function getTipo(){
 			return $this->tipo;
 		}
 		public function getSenha(){
 			return $this->senha;
 		}
 		public function getEmail(){
 			return $this->email;
 		}
 		public function getCodigo(){
 			return $this->codigo;
 		}
 	}


  ?>