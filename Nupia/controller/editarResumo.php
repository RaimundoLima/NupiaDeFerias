<?php 
	include("../model/resumo.php");
	include("controller.php");
	$idResumo = $_POST["idResumo"];
	$titulo = $_POST["titulo"];
	$autor = $_POST["autor"];
	$justificativa = $_POST["justificativa"];
	$objetivo = $_POST["objetivo"];
	$metodologia = $_POST["metodologia"];
	$resultadoEsperado = $_POST["resultadoesperado"];
	$impactoEsperado = $_POST["impactoesperado"];
	editarResumo($idResumo, $titulo, $autor, $justificativa, $objetivo, $metodologia, $resultadoEsperado, $impactoEsperado);
 ?>