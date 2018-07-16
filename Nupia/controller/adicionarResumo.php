<?php 
	include("../model/resumo.php");
	include("controller.php");
	$idAcao = $_POST["idacao"];
	$titulo = $_POST["titulo"];
	$autor = $_POST["autor"];
	$justificativa = $_POST["justificativa"];
	$objetivo = $_POST["objetivo"];
	$metodologia = $_POST["metodologia"];
	$resultadoEsperado = $_POST["resultadoesperado"];
	$impactoEsperado = $_POST["impactoesperado"];
	$resumo = new Resumo($idAcao, $titulo, $autor, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
	adicionarResumo($resumo);
 ?>